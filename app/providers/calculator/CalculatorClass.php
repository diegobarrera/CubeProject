<?php namespace App\Providers\Calculator;

class CalculatorClass {
	
	/**
	* Array of ReaderClass Objects
	* @var array
	*/
	private $insctructions;

    /**
	* Array of Integers with the response
	* @var array
	*/
	private $responses;
    
    /**
	* Constructor
	*
	*/
    //public function __constructor(){
    //}

	/**
	* Calculate the instructions given
	* @param instructions
	*/
    public function read($instructions){
    	$reader = new Io\ReaderClass();
    	$self = new CalculatorClass();
    	$self->setInstructions( $reader->become_readable($instructions) );
    	return $self;
    }

	/**
	* Calculate the instructions given
	* @param instructions
	*/
    public function calculate(){
    	$response = array();
    	$instructions = $this->getInstructions();
    	foreach ($instructions as $instruction) {
    		$matrix = new Matrix\MatrixClass($instruction->getNumberDimensions());
    		foreach ($instruction->getTesTcases() as $operation) {
    			$result = $matrix->calculate_operation($operation);
    			if ($result!=='UPDATED') array_push($response, $result);
    		}
    	}    	
    	$this->setResponses($response);
    	return $this;
    }

	
    public function setInstructions($instructions){
    	$this->instructions = $instructions;
    }

    public function setResponses($response){
    	$this->responses = $response;
    }

    public function getResponses(){
    	return $this->responses;
    }
    
    public function getInstructions(){
    	return $this->instructions;
    }
}
