<?php

namespace App\Http\Controllers;

use App\Http\Requests\OptionRequest;
use App\Http\Requests\OptionsRequest;
use App\Http\Requests\UpdateOptionsRequest;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = Option::paginate(15);

        return view('options.index')->with([
            'options' => $options,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Question::all();

        return view('options.create')->with([
            'questions' => $questions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OptionRequest $request)
    {
        // dd($request->validated());
        $option = Option::create($request->validated());

        return $this->index('options.index')->with([
            'message_success' => 'Option added to database.',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $option)
    {
        $questions = Question::all();

        return view('options.edit')->with([
            'option' => $option,
            'questions' => $questions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OptionRequest $request, Option $option)
    {
        $option = $request->option;

        $option->fill($request->validated());
        $option->save();

        return redirect()
        ->route('options.index')
        ->with([
            'success' => 'Option '.$option->id.' updated in database.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
        $oldOption = $option->option_name;

        $option->delete();

        return redirect()
        ->route('options.index')
        ->with([
            'success' => 'option '.$oldOption.' was deleted',
        ]);
    }
}
