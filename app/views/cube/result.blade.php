@extends('layouts.application')

<div class="container">
	<h1>Code Challenge</h1>
	<h2>Cube Summation</h2>

	<h3>Results:</h3>
	<div class="jumbotron col-md-4">
		@foreach ($results as $result)
			{{ $result }} <br>
		@endforeach
	</div>
	<div class="col-md-12">
		{{ HTML::link('/', 'Back', ['class' => 'btn btn-primary']) }}
	</div>
	
</div>
