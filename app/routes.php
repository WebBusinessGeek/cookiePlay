<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


route::get('/store', function(){

	$newCookie = Cookie::make('keyName', 'valueName', 15);

	if(!$newCookie){

		return 'No cookie set';
	}
	else{

		return Response::make()->withCookie($newCookie);
	}

});


route::get('/check', function(){

	if(Cookie::has('keyName')){

		return 'True';
	}
	else{

		return 'No Cookie by that key';
	}

});


route::get('/retrieve', function(){

	if(Cookie::has('keyName')){

		return Cookie::get('keyName');
	}
	else{

		return 'No Cookie by that key';
	}
	
});



route::get('/remove', function(){

	if(Cookie::has('keyName')){

		$goneCookie = Cookie::forget('keyName');
		return Response::make()->withCookie($goneCookie);
	}
	else{

		return 'No Cookie by that key';
	}
});