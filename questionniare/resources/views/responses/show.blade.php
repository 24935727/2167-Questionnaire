@extends('layouts.app')
@section('title', $questionnaire->title)

@section('content')
<div class="container-fluid d-flex align-items-center justify-content-center">
		<div class="text-center">
			<h1>Thank you for taking the questionnaire</h1>
			<button class="btn btn-primary"><a href="/" class="text-white">Click here to return home</a></button>
		</div>
	</div>
@endsection