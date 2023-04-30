@extends('layouts.app')
@section('title', $questionnaire->title)
@section('content')
@if($questionnaire->status === 'live')
{!! Form::open(['url' => "questionnaires/{$questionnaire->id}/response", 'class' => 'form']) !!}

    @foreach($questionnaire->questions as $i => $question)
        <div class="form-group">
            @if($question->type === 'open')
                {!! Form::label("oe_response[$i][response]", $question->question, ['class' => 'form-label', ]) !!}
                {!! Form::text("oe_response[$i][response]", null, ['class' => 'form-control', 'id' => "openResponse_$i"]) !!} 
                {!! Form::hidden("oe_response[$i][question_id]", $question->id) !!}
            @else
                {!! Form::label("responses[$i][choice_id]", $question->question, ['class' => 'form-label']) !!}
                <ul class="list-unstyled">
                    @foreach($question->choices as $i => $choice)
                        <li>
                            <div class="form-check">
                                {!! Form::radio("mc_responses[$question->id][choice_id]", $choice->id, null, ['class' => 'form-check-input', 'id' => "choice_$i"]) !!}
                                {!! Form::label("mc_responses[$question->id][choice_id]", $choice->choice, ['class' => 'form-check-label']) !!}
                            </div>
                        </li>
                    @endforeach
                    
                </ul>
                {!! Form::hidden("mc_responses[$question->id][question_id]", $question->id) !!}
                @error('responses.' . $i . 'choice_id')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            @endif
        </div>
    @endforeach 
    
    <div class="form-group">
        {!! Form::label('responder[name]', 'Enter your Name: ', ['class' => 'form-label']) !!}
        {!! Form::text('responder[name]', null, ['class' => 'form-control', 'id' => "responder_name"]) !!}
    </div>
    
    <div class="form-group">
        {!! Form::label('responder[email]', 'Enter your Email: ', ['class' => 'form-label']) !!}
        {!! Form::email('responder[email]', null, ['class' => 'form-control', 'id' => "responder_email"]) !!}
    </div>
    
    <div class="form-group">
        {!!Form::hidden('questionnaire_id', $questionnaire->id) !!}
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    </div>
    @if(strtolower($questionnaire->ethics_statement) === 'yes')
    <p>All responses will be kept confidential and will only be used for research purposes. Your name will not be included in any reports or publications resulting from this study, and we will take every measure to ensure that your privacy is protected.

Participation in this study is voluntary, and you may withdraw at any time. There are no known risks or benefits to participating in this study.
By clicking "submit" on this questionnaire, you acknowledge that you have read and understand this ethics statement and agree to participate in this study.</p>
    @else
    <p>This questionnaire is not protected by an ethics statement</p>
    @endif
{!! Form::close() !!}
@else
<h1>This questionnaire is not available right now.</h1>

@endif
@endsection