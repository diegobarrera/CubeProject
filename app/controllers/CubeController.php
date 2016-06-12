<?php

class CubeController extends BaseController {

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
		$calculator->calculate();
		print_r($calculator->getResponses());
	}

}
