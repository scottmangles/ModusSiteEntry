<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;
use App\Models\Result;
use App\Models\User;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Question::inRandomOrder()->take(5)->get();

       // dd($questions);

        return view('quizes.create')->with([
            'questions' => $questions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuizRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $options = Option::find(array_values($request->input('questions')));

       //dd($options->sum('points'));

        $result = Result::create([
            'total_points' => $options->sum('points'),
            'user_id' => auth()->id(),
        ]);

        if ($result->total_points == 5) {
            
            $user = User::find(auth()->id());

            $user->update([
                'induction_completed' => now(),
            ]);

            return redirect()
                ->route('dashboard')
                ->with([
                    'success' => "Congratulations you've passed your site induction"
                ]);

        } else {
            return redirect()
                ->route('dashboard')
                ->with([
                    'warning' => "You've failed your site induction questionnaire, you scored " . $options->sum('points') . " points, 5 correct answers are required to pass.  
                    Please complete the site induction before attempting to sign into site"
                    
                ]);
            
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuizRequest  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
}
