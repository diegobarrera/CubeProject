<?php namespace App\Providers\Calculator;

use Illuminate\Support\ServiceProvider;

class CalculatorServiceProvider extends ServiceProvider {

	/**
    * Register the service provider.
    *
    * @return void
    */
	public function register() {
		// Register 'calculatorclass' instance container to CalculatorClass object
		$this->app['calculatorclass'] = $this->app->share(function ($app) {
                return new CalculatorClass;
        });

        // Shortcut
        $this->app->booting(function(){
           $loader = \Illuminate\Foundation\AliasLoader::getInstance();
           $loader->alias('CalculatorClass', 'App\Providers\Calculator\Facades\CalculatorClass');
        });        
	}
}
