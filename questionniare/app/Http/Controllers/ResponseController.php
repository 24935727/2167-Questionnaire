<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;
use App\Responder;
use App\OpenResponse;
use App\MultiChoiceResponse;

class ResponseController extends Controller
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
    public function create(Questionnaire $questionnaire)
    {
        return view('responses.create', compact('questionnaire'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = request()->validate([
            'mc_responses.*.choice_id' => 'required',
            'mc_responses.*.question_id' => 'required',
            'oe_response.*.response' => 'required',
            'oe_response.*.question_id' => 'required',
            'responder.name' => 'required',
            'responder.email' => 'required|email',
            'questionnaire_id' => 'required',
        ]);
    
        $responder = Responder::create([
            'name' => $data['responder']['name'],
            'email' => $data['responder']['email'],
            'questionnaire_id' => $data['questionnaire_id']
        ]);

        foreach ($data['oe_response'] as $openResponse) {
            // $question = Question::findOrFail($openResponse['question_id']);
            $Response = OpenResponse::create([
                'response' => $openResponse['response'],
                'questionnaire_id' => $data['questionnaire_id'],
                'question_id' => $openResponse['question_id'],
                'responder_id' => $responder->id,
            ]);
        }
        foreach ($data['mc_responses'] as $mc_response) {
            $choiceResponse = MultiCHoiceResponse::create([
                'choice_id' => $mc_response['choice_id'],
                'questionnaire_id' => $data['questionnaire_id'],
                'question_id' => $mc_response['question_id'],
                'responder_id' => $responder->id,
            ]);
        }
        
        return redirect()->route('responses.show');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Questionnaire $questionnaire)
    {
        
        return view('responses.show', compact('questionnaire'));
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
    public function destroy(Responder $responder)
    {
        $responder->delete();
        return redirect()->back();
    }
}
