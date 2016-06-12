<?php namespace App\Providers\Calculator\Io;

class ReaderClass {
	
	/**
	* Number of dimensions
	* @var int
	*/
	private $number_dimension;

	/**
	* Number of instructions received
	* @var int
	*/
	private $number_instructions;
    
    /**
	* Array of instructions
	* @var array
	*/
	private $test_cases;

    /**
	* Constructor
	*
	*/
    public function __construct(){
    	$this->number_dimension = 0;
    	$this->number_instructions = 0;
    	$this->test_cases = array();
    }

    public function getNumberDimensions(){
    	return $this->number_dimension;
    }
	
    public function setNumberDimensions($number_dimension){
    	$this->number_dimension = $number_dimension;
    }

	public function getNumberInstructions(){
    	return $this->number_instructions;
    }
	
	public function setNumberInstructions($number_instructions){
    	$this->number_instructions = $number_instructions;
    }

    public function getTestCases(){
    	return $this->test_cases;
    }
	
	public function setTestCases($test_cases){
    	$this->test_cases = $test_cases;
    }

    public function become_readable($instructions){
    	$all_test_cases = array();
    	$instructions = explode("\n", $instructions);

    	for ($i = 1; $i < count($instructions); $i++) { 
    			$group_test_cases = new ReaderClass();
    			$N_and_M = explode(" ", $instructions[$i]);
    			$group_test_cases->setNumberDimensions($N_and_M[0]);
    			$group_test_cases->setNumberInstructions($N_and_M[1]);
				$temp_test_cases = array();
				$current_line = $i + 1;
	    		for ($test_case = $current_line; $test_case < $group_test_cases->getNumberInstructions() + $current_line; $test_case++) { 
	    			$line = explode(" ",$instructions[$test_case]);
	    			array_push( $temp_test_cases, $this->become_readable_testcase($line) );
	    		}
	    		$group_test_cases->setTestCases($temp_test_cases);
	    		$i += $group_test_cases->getNumberInstructions();
	    		array_push($all_test_cases, $group_test_cases);
    	}
    	return $all_test_cases;
    }

    public function become_readable_testcase($test_case){    	
    	$type = $test_case[0];
  		$operation = [];
		if($type == "UPDATE"){
			$operation = array(
				'operation' => 'UPDATE',
				'x' => (int)$test_case[1],
				'y' => (int)$test_case[2],
				'z' => (int)$test_case[3],
				'value' => (int)$test_case[4],
			);
		}
		elseif ($type == "QUERY") {
			$operation = array(
				'operation' => 'QUERY',
				'x1' => (int)$test_case[1],
				'y1' => (int)$test_case[2],
				'z1' => (int)$test_case[3],
				'x2' => (int)$test_case[4],
				'y2' => (int)$test_case[5],
				'z2' => (int)$test_case[6],
			);
		}
		return $operation;
    }

}
