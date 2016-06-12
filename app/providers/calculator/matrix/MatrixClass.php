<?php namespace App\Providers\Calculator\Matrix;


class Matrix{

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
		$this->$values[$x][$y][$z] = $value;
	}

	/**
	* Get the position on the x, y, z coordentas
	* Validates if the position x,y,z of the matrix exists
	*
	* @param int x 
	* @param int y
	* @param int z	
	*/
	public function getValues($x, $y, $z){
		if(!isset($this->values[$x][$y][$z])){
			return $this->$values[$x][$y][$z];
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
}
