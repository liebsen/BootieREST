<?php 

use \Bootie\App as App;

/* public */
App::route('/',			['uses' => 'Controller\ApiController@index']);
App::route('/posts', [ 'uses' => 'Controller\PostController@index']);
App::route('/posts/(\d+)', [ 'uses' => 'Controller\PostController@edit','before' => 'auth.admin']);
App::route('/posts/create', [ 'uses' => 'Controller\PostController@create','before' => 'auth.admin']);
App::route('/posts/store', [ 'uses' => 'Controller\PostController@store','method' => 'post','before' => 'auth.admin']);
App::route('/posts/delete/(\d+)', [ 'uses' => 'Controller\PostController@delete','method' => 'post','before' => 'auth.admin']);
App::route('/tags/relation/remove/(\d+)', [ 'uses' => 'Controller\TagController@remove_relation','method' => 'post','before' => 'auth.admin']);
App::route('/tags/relation/add/(\d+)', [ 'uses' => 'Controller\TagController@add_relation','before' => 'auth.admin','method' => 'post']);
App::route('/tags/post/(\d+)', [ 'uses' => 'Controller\TagController@tags','before' => 'auth.admin']);
App::route('/files/resize', [ 'uses' => 'Controller\FileController@resize','method' => 'post','before' => 'auth.admin']);
App::route('/files/upload', [ 'uses' => 'Controller\FileController@upload','before' => 'auth.admin']);
App::route('/files/order', [ 'uses' => 'Controller\FileController@order','method' => 'post','before' => 'auth.admin']);
App::route('/files/remove', [ 'uses' => 'Controller\FileController@destroy','method' => 'post','before' => 'auth.admin']);

/* public pages */
App::route('/(.*)', [ 'uses' => 'Controller\HomeController@page']);

/* filters */
App::filter('auth.admin',function(){
	if( ! session('user_id') || session('group') !== 'admin'){
		return redirect('/login','Your session has expired');
	}
});