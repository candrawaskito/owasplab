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

Route::get('/index.php', array(
	'as'	=> 'home',
	'uses'	=>	'HomeController@home'
));

Route::get('/', array(
	'as'	=> 'home',
	'uses'	=>	'HomeController@home'
));

Route::get('/user/{username}', array(
	'as'	=>	'profile-user',
	'uses'	=>	'ProfileController@user'
));

/*
|	Authenticated group
*/

Route::group(array('before'	=>	'auth'), function(){

	/*
	|	CSRF protection group
	*/
	Route::group(array('before' => 'csrf'), function(){

		/*
		|	Change Password (POST)
		*/
		Route::post('/akun/ganti-password', array(
			'as'	=>	'akun-ganti-password-post',
			'uses'	=>	'AccountController@postChangePassword'
		));

	});

	/*
	|	DASHBOARD (GET)
	*/

	Route::get('/dashboard', array(
		'as'	=>	'dashboard',
		'uses'	=>	'AdminController@getDashboard'
	));

	/*
	|	DASH USER (GET)
	*/

	Route::get('/dashuser', array(
		'as'	=>	'dashuser',
		'uses'	=>	'HomeController@getDashuser'
	));


	/*
	|	Change Password (GET)
	*/

	Route::get('/akun/ganti-password', array(
		'as'	=>	'akun-ganti-password',
		'uses'	=>	'AccountController@getChangePassword'
	));

	/*
	|	Dashboard Logout (GET)
	*/

	Route::get('/dashboard/logout', array(
		'as'	=>	'dashboard-logout',
		'uses'	=>	'AdminController@getAdminLogout'
	));

	/*
	|	Sign Out (GET)
	*/

	Route::get('/akun/keluar', array(
		'as'	=>	'akun-keluar',
		'uses'	=>	'AccountController@getSignOut'
	));

	// user
	Route::resource('user', 'UserController');

	Route::get('/dashboard/user', array(
		'as'	=> 'dashboard-user',
		'uses'	=>	'UserController@index'
	));

	Route::get('/dashboard/daftar', array(
		'as'	=>	'dashboard-daftar',
		'uses'	=>	'UserController@create'
	));

	Route::get('/dashuser/simulasi', array(
		'as'	=>	'dashuser-simulasi',
		'uses'	=>	'HomeController@getSimulasi'
	));

	Route::get('/dashuser/tutorial', array(
		'as'	=>	'dashuser-tutorial',
		'uses'	=>	'HomeController@getTutorial'
	));

	Route::get('/dashuser/tutorial/sqlinjection', array(
		'as'	=>	'sql-injection',
		'uses'	=>	'HomeController@getSqlInjection'
	));

	Route::get('/dashuser/tutorial/lfi', array(
		'as'	=>	'lfi',
		'uses'	=>	'HomeController@getLfi'
	));

	Route::get('/dashuser/tutorial/reset-password',	array(
		'as'	=> 	'reset-password',
		'uses'	=>	'HomeController@getResetPassword'
	));

	// Tutorial

	Route::get('dashuser/tutorial', array(
		'as'	=>	'index-tutorialdash',
		'uses'	=>	'TutorialController@indexDash'
	));

	Route::get('dashboard/tutorial', array(
		'as'	=> 'index-tutorial',
		'uses'	=> 'TutorialController@index'
	));

	Route::get('dashboard/tutorial/create', array(
		'as' 	=> 'create-tutorial', 
		'uses' 	=> 'TutorialController@create'
	));

	Route::post('dahsboard/tutorial/create', array(
		'as'	=>	'post-create-tutorial',
		'uses'	=>	'TutorialController@postCreate'
	));

	Route::get('dashuser/tutorial/view/{id}', array(
		'as'	=> 	'view-tutorial',
		'uses'	=>	'TutorialController@view'
	));

	Route::get('dahsboard/tutorial/edit/{id}', array(
		'as'	=>	'edit-tutorial',
		'uses'	=>	'TutorialController@edit'
	));

	Route::put('dahsboard/tutorial/putEdit/{id}', array(
		'as'	=>	'put-edit-tutorial',
		'uses'	=>	'TutorialController@putEdit'
	));

	Route::get('dahsboard/tutorial/delete/{id}', array(
		'as'	=>	'delete-tutorial',
		'uses'	=>	'TutorialController@delete'
	));

});

/* 
|	Unauthenticated group
*/
Route::group(array('before' => 'guest'), function(){

	/*
	|	CSRF protection group
	*/
	Route::group(array('before' => 'csrf'),	function(){

		/*
		|	Create Account (POST)
		*/
		Route::post('/akun/daftar', array(
			'as'	=>	'akun-daftar-post',
			'uses'	=>	'AccountController@postCreate'
		));

		/*
		|	Sign In (POST)
		*/
		Route::post('/akun-masuk', array(
			'as'	=>	'akun-masuk-post',
			'uses'	=>	'AccountController@postSignIn'
		));

		/*
		|	LOGIN ADMIN (POST)
		*/
		Route::post('/index.php/admin/login-admin', array(
			'as'	=>	'admin-login-post',
			'uses'	=>	'AdminController@postLoginAdmin'
		));

		/*
		|	Forgot Password (POST)
		*/
		Route::post('/akun/lupa-password', array(
			'as'	=>	'akun-lupa-password-post',
			'uses'	=>	'AccountController@postForgotPassword'
		));
	});

	/*
	|	Forgot Password (GET)
	*/
	Route::get('/akun/lupa-password', array(
		'as'	=>	'akun-lupa-password',
		'uses'	=>	'AccountController@getForgotPassword'
	));

	Route::get('/akun/recover/{code}', array(
		'as'	=>	'akun-recover',
		'uses'	=>	'AccountController@getRecover'
	));

	/*
	|	Sign In (GET)
	*/

	Route::get('/akun/masuk', array(
		'as'	=>	'akun-masuk',
		'uses'	=>	'AccountController@getSignIn'
	));

	/*
	|	LOGIN ADMIN (GET)
	*/

	Route::get('/admin/login-admin', array(
		'as'	=>	'admin-login',
		'uses'	=>	'AdminController@getLoginAdmin'
	));

	/*
	|	Create Account (GET)
	*/
	Route::get('/akun/daftar', array(
		'as'	=>	'akun-daftar',
		'uses'	=>	'AccountController@getCreate'
	));

	/*
	|	ABOUT (GET)
	*/
	Route::get('/about', array(
		'as'	=>	'about',
		'uses'	=>	'HomeController@getAbout'
	));

	Route::get('/akun/activate/{code}', array(
		'as'	=> 	'akun-activate',
		'uses'	=>	'AccountController@getActivate'
	));

});


// Admin Routes

