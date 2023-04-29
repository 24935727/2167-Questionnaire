@extends('layouts.app')
@section('title', $questionnaire->title)

@section('content')
{!!Form::open(['url' => "/questionnaires/$questionnaire->id/questions"])!!}
<fieldset id="fieldset"></fieldset>
<div id="questions"></div>
    {!!Form::hidden('questionnaire_id', $questionnaire->id) !!}

{!! Form::submit('Submit', ['class' => 'hidden btn btn-primary text-white"', 'id' => 'questionSubmit']) !!}
{!!Form::close()!!}
<button id="multiChoice" class="btn btn-primary text-white">Create a multiple choice question</button>
<button id="open" class="btn btn-primary text-white">Create a text question</button>
<a href="/questionnaires/{{$questionnaire->id}}" class="btn btn-primary text-white">Back to questionnaire</a></button>
<button id="choice" class="hidden">Add Choice</button>


<script src="{{ asset('js/main.js') }}"></script>
@endsection