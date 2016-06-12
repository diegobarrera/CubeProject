<?php namespace App\Providers\Calculator\Matrix;


class MatrixClass{

	/**
	* Number of matrix of dimension
	* @var int
	*/
	private $dimension;
	
	/**
	* Array with the values
	* @var array
	*/
	private $values;

	function __construct($dimension){
		$this->dimension = $dimension;
		$this->values = array();
	}

	/**
	* Initialize a matrix with values of zero
	*
	*/
	private function intializer(){
		for ( $x = 0; $x < $this->dimension; $x++ ){
			for ( $y = 0; $y < $this->dimension; $y++ ){
				for ( $z = 0; $z < $this->dimension; $z++ ){
					$this->values[$x][$y][$z] = 0;
				}		
			}
		}
	}

	/**
	* Modifies the position on the x, y, z coordentas with the given value
	* Validates if the position x,y,z of the matrix exists
	*
	* @param int x 
	* @param int y
	* @param int z
	* @param int value
	*/
	public function setValues($x, $y, $z, $value){
		if(!isset($this->values[$x][$y][$z])){
			$this->intializer();
		}
		$this->values[$x][$y][$z] = $value;
	}

	/**
	* Get the position on the x, y, z coordentas
	* Validates if the position x,y,z of the matrix exists
	*
	* @param int x 
	* @param int y
	* @param int z	
	* @return int value
	*/
	public function getValues($x, $y, $z){
		if(isset($this->values[$x][$y][$z])){
			return $this->values[$x][$y][$z];
		}
		return null;
	}

	/**
	* Get number of dimensions
	*
	* @return int dimension
	*/
	public function getDimension(){
		return $this->$dimension;
	}
	
	/**
	* Calculates the sum of the value of blocks whose x coordinate is between x1 and x2 (inclusive), y coordinate between y1 and y2 (inclusive) and z coordinate between z1 and z2 (inclusive)
	*
	* @param int x1 
	* @param int y1
	* @param int z1
	* @param int x2 
	* @param int y2
	* @param int z2
	* @return int sum of matrix positions
	*/
	private function sum_positions($x1, $y1, $z1, $x2, $y2, $z2){
		$sum = 0;
		for ( $x = $x1; $x <= $x2; $x++ ){
			for ( $y = $y1; $y <= $y2; $y++ ){
				for ( $z = $z1; $z <= $z2; $z++ ){
					$sum += $this->getValues($x, $y, $z);
				}
			}
		}
		return $sum;
	}

	/**
	* Calculate the instructions
	* @param instructions
	*/
    public function calculate_operation($operation){
    	if($operation['operation'] === "UPDATE"){
    		$this->setValues($operation['x'],$operation['y'],$operation['z'], (int)$operation['value'] );
    		return 'UPDATED';
    	} elseif ($operation['operation'] === "QUERY"){
    		return $this->sum_positions($operation['x1'],$operation['y1'],$operation['z1'],$operation['x2'],$operation['y2'],$operation['z2']);
    	}
    }
}
