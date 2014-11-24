<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function home()
	{
		// Mail::send('emails.auth.test', array('name' => 'Owasp Lab'), function($message){
		// 	$message->to('owasplab@gmail.com', 'Owasp Lab')->subject('Test Email');
		// });

		return View::make('home');
	}

	public function getAbout()
	{
		return View::make('about');
	}

	public function getDashuser()
	{
		return View::make('dashuser');
	}

	public function getTutorial()
	{
		return View::make('tutorial');
	}

	public function getSimulasi()
	{
		return View::make('simulasi');
	}

	public function getSqlInjection()
	{
		return View::make('sqlinjection');
	}

	public function getLfi()
	{
		return View::make('lfi');
	}

	public function getResetPassword()
	{
		return View::make('resetpassword');
	}

}
