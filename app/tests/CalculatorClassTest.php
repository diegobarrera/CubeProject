<?php

class CalculatorClassTest extends TestCase {

	/**
	* @test
	*/
	public function invalid_number_parameters_update(){
		$request = "1\n3 2\nUPDATE 2 2 2\nQUERY 1 1 1 3 3 3";
		$calculator = CalculatorClass::read($request);
		$this->assertEquals(null, $calculator->calculate()->getResponses());	
	}

	/**
	* @test
	*/
	public function invalid_number_parameters_query(){
		$request = "1\n3 2\nUPDATE 2 2 2 3\nQUERY 2";
		$calculator = CalculatorClass::read($request);
		$this->assertEquals(null, $calculator->calculate()->getResponses());	
	}

	/**
	* @test
	*/
	public function invalid_T_variable(){
		$request = "60\n3 2\nUPDATE 2 2 2 4\nQUERY 1 1 1 3 3 3";
		$calculator = CalculatorClass::read($request);
		$this->assertEquals(null, $calculator->calculate()->getResponses());	
	}

	/**
	* @test
	*/
	public function invalid_N_variable(){
		$request = "1\n101 2\nUPDATE 2 2 2 4\nQUERY 1 1 1 3 3 3";
		$calculator = CalculatorClass::read($request);
		$this->assertEquals(null, $calculator->calculate()->getResponses());	
	}	

	/**
	* @test
	*/
	public function invalid_M_variable(){
		$request = "1\n100 2000\nUPDATE 2 2 2 4\nQUERY 1 1 1 3 3 3";
		$calculator = CalculatorClass::read($request);
		$this->assertEquals(null, $calculator->calculate()->getResponses());	
	}

	/**
	* @test
	*/
	public function validate_two_group_instructions(){
		$request = "2\n4 5\nUPDATE 2 2 2 4\nQUERY 1 1 1 3 3 3\nUPDATE 1 1 1 23\nQUERY 2 2 2 4 4 4\nQUERY 1 1 1 3 3 3\n2 4\nUPDATE 2 2 2 1\nQUERY 1 1 1 1 1 1\nQUERY 1 1 1 2 2 2\nQUERY 2 2 2 2 2 2";
		$calculator = CalculatorClass::read($request);
		$this->assertEquals([4,4,27,0,1,1], $calculator->calculate()->getResponses());	
	}

	/**
	* @test
	*/
	public function validate_one_group_instructions(){
		$request = "1\n3 2\nUPDATE 2 2 2 4\nQUERY 1 1 1 3 3 3";
		$calculator = CalculatorClass::read($request);
		$this->assertEquals([4], $calculator->calculate()->getResponses());	
	}
}
