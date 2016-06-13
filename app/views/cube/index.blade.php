@extends('layouts.application')

<div class="container">
    <h1>Code Challenge</h1>
    <h2>Cube Summation</h2>
    <div class="col-md-6">    
	    <h3>Input:</h3>
	    {{ Form::open(array('action' => 'CubeController@calculate', 'method' => 'post')) }}
	        {{ Form::textarea('instructions') }}
	        <br><br>
	        {{Form::submit('Calculate', ['class' => 'btn btn-large btn-primary'])}}
	    {{ Form::close() }}
	</div>
	<div class="col-md-1"></div>
    <div class="col-md-3">
    	<p>
	    	Here is an example of the input:
	    	<div class="jumbotron">
	    		2<br>
				4 5<br>
				UPDATE 2 2 2 4<br>
				QUERY 1 1 1 3 3 3<br>
				UPDATE 1 1 1 23<br>
				QUERY 2 2 2 4 4 4<br>
				QUERY 1 1 1 3 3 3<br>
				2 4<br>
				UPDATE 2 2 2 1<br>
				QUERY 1 1 1 1 1 1<br>
				QUERY 1 1 1 2 2 2<br>
				QUERY 2 2 2 2 2 2<br>
	    	</div>
    	</p>
    </div>

</div>
