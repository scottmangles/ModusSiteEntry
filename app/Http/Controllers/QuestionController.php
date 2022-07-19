<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view all questions')->only(['index']);
        $this->middleware('permission:create question')->only(['create']);
        $this->middleware('permission:store question')->only(['store']);
        $this->middleware('permission:show question')->only(['show']);
        $this->middleware('permission:edit question')->only(['edit']);
        $this->middleware('permission:update question')->only(['update']);
        $this->middleware('permission:delete question')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::paginate(15);

        // $deletedQuestions = Question::onlyTrashed()->get();

        return view('questions.index')->with([
            'questions' => $questions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        // dd($request->validated());
        $question = Question::create($request->validated());

        return redirect()
          ->route('questions.index')
          ->with(['success' => 'Question added to database.',
          ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //dd('show blade');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('questions.edit')->with([
            'question' => $question,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, Question $question)
    {
        //dd($request->validated());
        $question = $request->question;

        $question->fill($request->validated());
        $question->save();

        return redirect()
        ->route('questions.index')
        ->with([
            'success' => 'Question '.$question->id.' updated in database.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $oldQuestion = $question->question_name;

        //find if any options are related to question and abort
        $options = Option::where('question_id', $question->id)->get();

        //dd($options);

        if ($options->isNotEmpty()) {
            // dd("options for question id $question->id require deleting before question can be deleted");
            return redirect()
            ->route('questions.index')
            ->with([
                'warning' => 'options for question id '.$question->id.' require deleting before question can be deleted',
            ]);
        } else {
            $question->delete();

            return redirect()
            ->route('questions.index')
            ->with([
                'success' => 'Question '.$oldQuestion.' was deleted',
            ]);
        }
    }
}
