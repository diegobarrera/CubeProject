<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	/**
	* Response JSON helper
	*
	*/
	public static function to_json($body, $status_code = 200){
		return Response::json(array("results" => $body), $status_code);
	}
}
