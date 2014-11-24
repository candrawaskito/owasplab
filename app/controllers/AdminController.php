<?php

class AdminController extends BaseController{

	public function getLoginAdmin()
	{
		return View::make('admin.signin');
	}

	public function postLoginAdmin()
	{
		$validator = Validator::make(Input::all(),
			array(
				'nim'	=>	'required',
				'password'	=>	'required'
			)
		);

		if($validator->fails())
		{
			// Redirecet to the sign in page
			return 	Redirect::route('admin-login')
					->withErrors($validator)
					->withInput();
		}
		else
		{

			$remember = (Input::has('remember')) ? true : false;

			// Attemp user sign in
			$auth = Auth::attempt(array(
				'nim'	=> Input::get('nim'),
				'password'	=> Input::get('password'),
				'active'	=> 1,
				'id'		=>	1
			), $remember);

			if($auth){
				// redirect to the intended page
				return Redirect::intended('/dashboard');
			}
			else
			{
				return 	Redirect::route('admin-login')
						->with('global', 'Email/passsword salah, atau akun tidak active');
			}
		}

		return 	Redirect::route('admin-login')
				->with('global', 'There was a problem signin you in');
	}

	public function getDashboard()
	{
		return View::make('admin.dashboard');
	}

	public function getAdminLogout()
	{
		Auth::logout();
		return Redirect::route('home');
	}

}