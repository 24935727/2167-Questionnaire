@extends('layouts.app')
@section('title', 'Create A Questionnaire')

@section('content')
<div class="container-fluid">
{!!Form::open(['route' => 'questionnaire.store'])!!}
<div class="form-group">
    {!!Form::label('title', 'Title:')!!}
    {!!Form::text('title', null, ['class' => 'form-control', 'id' => 'title'])!!}
    <div class="form-group">
    {{ Form::label('ethics_statement', 'Ethics Statement') }}
    {{ Form::select('ethics_statement', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control']) }}
</div>
    {{Form::hidden('user_id', auth()->user()->id) }}
    {{Form::hidden('status', 'live')}}
    {!!Form::submit('Create Questionnaire', ['class' => 'btn btn-primary form-control'])!!}

</div>
{!!Form::close()!!}
</div>

@endsection



