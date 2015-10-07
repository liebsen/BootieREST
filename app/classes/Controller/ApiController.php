<?php namespace Controller;

class ApiController 
{
	static $layout = "default";
	
	public function index() 
	{
		$routes = \Bootie\App::$routes;

		return \Bootie\App::view('index',[
			'routes' => $routes
		]);
	}
}