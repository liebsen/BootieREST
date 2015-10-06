<?php namespace Controller;

class ApiController 
{
	public function index() 
	{
		$routes = \Bootie\App::$routes;
		
		return \Bootie\App::view('index',[
			'routes' => $routes
		]);
	}
}