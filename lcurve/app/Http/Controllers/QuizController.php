<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Task;
use App\QuizzQuestion;
use App\QuizzQuestionOption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $quizzes = Quiz::all();

        return view('quizzes.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $quiz_id=$request->quiz_id;
        $relations=$request->relations;
        return view('quizzes.create',compact('quiz_id'),$relations);//retun to view to create a quizz by providing a topic
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task=Task::find($request->invisible);//find the id of a task

        $quiz=Quiz::Create([]);////create quizz
        $quiz->task()->save($task);

        $questions = QuizzQuestion::where('id', $request->question_id)->limit($request->ammount)->get();
        foreach ($questions as $question) {
            $question->options = QuizzQuestionOption::where('question_id', $question->id)->inRandomOrder()->get();//find question option for each questions
        }
        foreach ($questions as $question) {
            $question->quizzes()->attach($question->id);
        }

        return redirect()->route('tasks.index');

        }







    /**
     * Display the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
}
