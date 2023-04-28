@extends('layouts.app')
@section('title', $questionnaire->title)
@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$questionnaire->title}}</div>
                {!! Form::model($questionnaire, ['method' => 'PATCH', 'url' =>
                "questionnaires/status/$questionnaire->id"]) !!}
                {{ Form::label('status', 'Update status of your questionnaire') }}
                {{ Form::select('status', ['live' => 'Live', 'development' => 'Development'], null, ['class' => 'form-control']) }}
                {!!Form::Submit('Change Mode', ['class' => 'btn btn-primary form-control'])!!}
                {!!Form::close()!!}
                <div class="card mt-4">
                    <div class="card-body">
                        @foreach ($questionnaire->questions as $question)
                        <!-- <div class="card-body"> -->
                        <ul class="list-group">
                            <li class="list-group-item mt-4">{{ $question->question }} :</li>
                            @foreach ($question->openResponses as $response)
                            <li class="list-group-item"><small>{{ $response->response }}</small></li>
                            @endforeach
                        </ul>
                        @if($question->type === 'multiChoice')

                        <ul class="list-group">
                            @foreach($question->choices as $choice)
                            <li class="list-group-item">{{$choice->choice}}
                                ({{ $choice->multiChoiceResponses()->count() }})</li>
                            @endforeach
                        </ul>
                        @endif
                        @endforeach
                    </div>
                    <a class="text-white btn btn-primary" href="/questionnaires/{{$questionnaire->id}}/questions/create">Create Question</a>
                    
                    @if($questionnaire->status === 'live')
                    <a href="/questionnaires/{{$questionnaire->id}}/responses/create">http://localhost:8000/questionnaires/{{$questionnaire->id}}/responses/create</a>
                    <small class="text-muted">Share this link to get your responses.</small>
                    @else
                        <p class="text-danger">Turn your questionnaires mode to live to get a shareable link</p>
                    @endif
                    
                    <ul class="list-group">
                        <div class="card-header">Responders To Your Questionnaire</div>
                        @foreach($responders as $responder)
                        <li class="list-group-item">{{$responder->name}}</li>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['responders.destroy', $responder->id]]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection