<?php namespace App\Providers\Calculator\Facades;

use Illuminate\Support\Facades\Facade;


class CalculatorClass extends Facade {
	
	/**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'calculatorclass'; }	
}
