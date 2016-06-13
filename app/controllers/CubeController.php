<?php

class CubeController extends BaseController {

	protected $layout = 'layouts.application';

	/*
	|	Route::post('/cube_summation', 'CubeController@calculate');
	*/
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
