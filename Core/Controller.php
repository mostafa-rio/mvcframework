<?php

namespace Core;

/** Base Controller
*/
abstract class Controller {
	// parameters from the matched route
	protected $route_params = [];

	protected function after(){
		echo 'after';

	}

	public function __construct($route_params){
		$this->route_params = $route_params;
	}

	public function __call($name, $args)
	{
		$method = $name . 'Action';
		if (method_exists($this, $method)) {
			if($this->before() !== false ){
				call_user_func_array([$this, $method], $args);
				$this->after();
			}
		}else{
			// echo "Method $method note found in controller " . get_class($this);
			throw new \Exception("Method $method not found in controller" . get_class($this));
		}
	}

	protected function before()
	{
		echo 'before';	
	}
}