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
        // dd(request()->all());
        

        $data = request()->validate([
            'question' => 'required|max:50',
            'type' => 'required',
            'choices.*.choice' => 'required|max:50',
            'questionnaire_id' => 'required'
        ]);
        if(isset($data['question'])){

        
        $question = Question::create([
            'question' => $data['question'],
            'type' => $data['type'],
            'questionnaire_id' => $data['questionnaire_id']
        ]);
    }

        if(isset($data['choices'])){

             
            $choicesData = [];

            foreach($data['choices'] as $choice) {
                $choicesData[] = [
                    'choice' => $choice['choice'],
                    'question_id' => $question->id,
                ];
            }

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
