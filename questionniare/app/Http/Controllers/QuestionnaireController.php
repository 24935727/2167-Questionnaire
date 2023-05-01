<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;
use App\MultiChoiceResponse;
use App\OpenResponse;
use App\Responder;
class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
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
        // Returns the questionnaire create view
        return view('questionnaire.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Recieves and validates the data sent through the form  

        $data = request()->validate([
            'title' => 'required|max:50',
            'ethics_statement' => 'required',
            'status' => 'required',
            'user_id' => 'required'
        ]);
        // eloquent query to create a new entry to the questionnaire table
        $questionnaire = Questionnaire::create($data);
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
        // loads the show view with the information from the tables with the data from the correct responder id
        $questionnaire = Questionnaire::with(['questions', 'multiChoiceResponses', 'openResponses'])->findOrFail($id);
        $responders = Responder::where('questionnaire_id', $id)->get();
        return view('questionnaire.show', compact('questionnaire','responders'));
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
        // updates the status of the entries that have the the correct questionnaire id 
        $questionnaire = Questionnaire::findOrFail($id);

        $questionnaire->update(['status' => $request->input('status')
    ]);

        return redirect()->back();
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
