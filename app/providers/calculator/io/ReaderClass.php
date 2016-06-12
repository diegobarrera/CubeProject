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
	    			$readed_line =  $group_test_cases->become_readable_testcase($line);
	    			if ($readed_line != []){ 
	    				array_push( $temp_test_cases, $readed_line);
	    			}
	    			else{ 
	    				return null;
	    			}
	    		}
	    		$group_test_cases->setTestCases($temp_test_cases);
	    		$i += $group_test_cases->getNumberInstructions();
	    		array_push($all_test_cases, $group_test_cases);
    	}
    	return $all_test_cases;
    }

    /**
    * Receives and array and return a hashmap with the array positions and values
    * @return operation
    */
    public function become_readable_testcase($test_case){    	
    	$type = $test_case[0];
  		$operation = [];
		if($type == "UPDATE" && $this->validate_test_case($test_case)){
			$operation = array(
				'operation' => 'UPDATE',
				'x' => ((int)$test_case[1]) - 1,
				'y' => ((int)$test_case[2]) - 1,
				'z' => ((int)$test_case[3]) - 1,
				'value' => (int)$test_case[4],
			);
		}
		elseif ($type == "QUERY" && $this->validate_test_case($test_case)) {
			$operation = array(
				'operation' => 'QUERY',
				'x1' => ((int)$test_case[1]) - 1,
				'y1' => ((int)$test_case[2]) - 1,
				'z1' => ((int)$test_case[3]) - 1,
				'x2' => ((int)$test_case[4]) - 1,
				'y2' => ((int)$test_case[5]) - 1,
				'z2' => ((int)$test_case[6]) - 1,
			);
		}
		return $operation;
    }

    /**
    * Validates if the test case has the correct values
    * @return bool
    */
    public function validate_test_case($test_case){
    	$type = $test_case[0];
  		$operation = [];
  		$N = $this->getNumberDimensions();
  		$M = $this->getNumberInstructions();
  		if (!($N >= 1 && $N <= 100)) {
  			return false;
  		}
  		if (!($M >= 1 && $M <= 1000)) {
  			return false;
  		}
		if($type == "UPDATE"){
			if (count($test_case) != 5) {
				return false; 
			}
			$x = (int)$test_case[1];
			$y = (int)$test_case[2];
			$z = (int)$test_case[3];
			$value = (int)$test_case[4];
			if (!($x >= 1 && $x <= $N || $y >= 1 && $y <= $N || $z >= 1 && $z <= $N || $value >= -10^9 && $value <= 10^9)) {
				return false;
			}
		}
		elseif ($type == "QUERY"){
				if (count($test_case) != 7) {
					return false; 
				}
				$x1 = (int)$test_case[1];
				$y1 = (int)$test_case[2];
				$z1 = (int)$test_case[3];
				$x2 = (int)$test_case[4];
				$y2 = (int)$test_case[5];
				$z2 = (int)$test_case[6];
				if (!($x1 >= 1 && $x1 <= $N || $y1 >= 1 && $y1 <= $N || $z1 >= 1 && $z1 <= $N || $x2 >= 1 && $x2 <= $N || $y2 >= 1 && $y2 <= $N || $z2 >= 1 && $z2 <= $N )) {
					return false;
				}
		} else {
			return false;
		}
    	return true;
    }
}
