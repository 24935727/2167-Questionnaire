@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" id="Dashboard">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <div class="card mt-4">
                        <div class="card-header">My Questionnaires</div>
                            <div class="card-body">
                             @foreach($questionnaires as $questionnaire)
                                <li><a href="/questionnaires/{{$questionnaire->id}}">{{ $questionnaire->title }}</a></li>
                             @endforeach
                            </div>
                    </div>

                    </div>
                    <a class="btn btn-primary text-white" href="questionnaire/create" id="createQuestionnaireLink">Create a Questionnaire</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
