<?php

class CubeController extends BaseController {

	protected $layout = 'layouts.application';
	
	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'CubeController@show');
	|
	*/

	public function show(){
		return View::make('hello');
	}

	public function calculate(){
		$request = Input::get('instructions');
		$calculator = CalculatorClass::read($request);
		if(null !== $calculator->getInstructions()){
		 	$calculator->calculate();
		 	return View::make('cube.result', [ "results" => $calculator->getResponses() ]);
		 } else {
		 	return View::make('cube.result', [ "results" => ["Invalid parameters"] ]);
		 }
		
	}

}
