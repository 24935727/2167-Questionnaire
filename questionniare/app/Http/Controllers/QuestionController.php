<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;
use App\Question;
use App\Choice;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Questionnaire $questionnaire)
    {
        // Returns the create view for the question and passes in $questionnaire through the compact to the view
        return view('questions.create', compact('questionnaire'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Question $question, Questionnaire $questionnaire)
    {        
        // Recieves and validates the data sent through the form  
        $data = request()->validate([
            'question' => 'required|max:50',
            'type' => 'required',
            'choices.*.choice' => 'required|max:50',
            'questionnaire_id' => 'required'
        ]);
        // Checks if an open question is being passed
        if(isset($data['question'])){

        // Eloquent query to create a new entry into the question table
        $question = Question::create([
            'question' => $data['question'],
            'type' => $data['type'],
            'questionnaire_id' => $data['questionnaire_id']
        ]);
    }
        // Checks if a multiple choice question is being passed
        if(isset($data['choices'])){

             
            $choicesData = [];
            // Loops through each choice that has been input and creates an array of choices with question id attached
            foreach($data['choices'] as $choice) {
                $choicesData[] = [
                    'choice' => $choice['choice'],
                    'question_id' => $question->id,
                ];
            }
            // Eloquent query to insert multiple entries into the database at the same time 
            Choice::insert($choicesData);
        }
        return redirect()->route('questions.create', ['questionnaire' => $questionnaire->id]);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
