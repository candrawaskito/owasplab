<?php 

class AccountController extends BaseController{

	public function getSignIn()
	{
		return View::make('account.signin');
	}

	public function postSignIn()
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
			return 	Redirect::route('akun-masuk')
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
				'active'	=> 1
			), $remember);

			if($auth){
				// redirect to the intended page
				return Redirect::intended('/index.php/dashuser');
			}
			else
			{
				return 	Redirect::route('index.php/akun-masuk')
						->with('global', 'Email/passsword salah, atau akun tidak active');
			}
		}

		return 	Redirect::route('akun-masuk')
				->with('global', 'Ada masalah untuk masuk ke akun');
	}

	public function getSignOut()
	{
		Auth::logout();
		return Redirect::route('index.php/home');
	}

	public function getCreate()
	{
		return View::make('account.create');
	}

	public function postCreate()
	{
		$validator = Validator::make(Input::all(), 
			array(
				'nim'				=> 'required|max:10|unique:users',
				'username'			=> 'required|max:20|min:4|unique:users',
				'name'				=> 'required',
				'email'				=> 'required|email|unique:users',
				'password'			=> 'required|min:6',
				'password_again'	=> 'required|same:password'
		));

		if ($validator->fails()) {
			return Redirect::route('akun-daftar')
					->withErrors($validator)
					->withInput();
		}
		else
		{
			// Create Account
			$nim		=	Input::get('nim');
			$username	= 	Input::get('username');
			$name		=	Input::get('name');
			$email		=	Input::get('email');
			$password 	=	Input::get('password');

			// Activation Code
			$code = str_random(60);

			$user = User::create(array(
				'nim'		=>	$nim,
				'username'	=>	$username,
				'name'		=>	$name,
				'email'		=>	$email,
				'password'	=>	Hash::make($password),
				'code'		=>	$code,
				'active'	=>	0
			));	

			if($user){
				// Send email
				Mail::send('emails.auth.activate', array(
					'link'	=> URL::route('akun-activate', $code),
					'username' 	=> $username), function($message) use ($user){
					$message->to($user->email, $user->username)->subject('Aktifkan akunmu');
				});

				return 	Redirect::route('home')
						->with('global', 'Akun mu sudah dibuat! Kami mengirimkan email aktivasi ke email anda!!');
			}
		}
	}

	// fungsi untuk mengaktifkan akun
	public function getActivate($code){
		$user = User::where('code', '=', $code)->where('active', '=', 0);

		if($user->count()){
			$user = $user->first();

			// Update user to active state
			$user->active 	= 1;
			$user->code 	= 0;

			if($user->save()){
				return  Redirect::route('home')
						->with('global', 'Activated!, Kamu dapat login sekarang!');
			}
		}

		return 	Redirect::route('home')
				->with('global', 'Kami tidak dapat mengaktifkan akun anda. Coba lagi.');
	}

	public function getChangePassword()
	{
		return View::make('account.password');
	}

	public function postChangePassword()
	{
		$validator = Validator::make(Input::all(),
			array(
				'old_password' 		=> 	'required',
				'password'			=> 	'required|min:6',
				'password_again'	=>	'required|same:password'
			)
		);

		if($validator->fails()){
			// redirect
			return 	Redirect::route('akun-ganti-password')
					->withErrors($validator);
		}
		else
		{
			// change password
			$user = User::find(Auth::user()->id);

			$old_password = Input::get('old_password');
			$password 	=	 Input::get('password');

			if(Hash::check($old_password, $user->getAuthPassword())){
				// pass user provided match
				$user->password = Hash::make($password);

				if($user->save()){
					return Redirect::route('home')
							->with('global', 'Success, passwordmu sudah di ganti');
				}
			}
			else
			{
				return Redirect::route('akun-ganti-password')
						->with('global', 'Password lama mu salah');
			}
		}

		return Redirect::route('akun-ganti-password')
				->with('global', 'Password kamu tidak dapat diganti');
	}

	public function getForgotPassword()
	{
		return View::make('account.forgot');
	}

	public function postForgotPassword()
	{
		$validator = Validator::make(Input::all(), 
			array(
				'email'	=> 'required|email'
			)
		);

		if($validator->fails()){
			return  Redirect::route('akun-ganti-password')
					->withErrors($validator)
					->withInput();
		}
		else{
			// change password
			$user = User::where('email', '=', Input::get('email'));

			if($user->count()){
				$user 						=	$user->first();

				// Generate a new code and password
				$code 						= 	str_random(60);
				$password 					= 	str_random(10);

				$user->code 				= $code;
				$user->password_temp		= Hash::make($password);

				if($user->save()) {
					Mail::send('emails.auth.forgot', array('link' => URL::route('akun-recover', $code), 'username' => $user->username, 'password' => $password), function($message) use ($user) {
						$message->to($user->email, $user->username)->subject('Your new password');
					});

					return  Redirect::route('home')
							->with('global', 'Kami mengirimkan password baru mu ke email!');
				}
			}
		}

		return  Redirect::route('akun-lupa-password')
				->with('global', 'Tidak dapat meminta password baru');
	}

	public function getRecover($code){
		$user = User::where('code', '=', $code)
				->where('password_temp', '!=', '');

		if($user->count()){
			$user = $user->first();

			$user->password 		= $user->password_temp;
			$user->password_temp 	= '';
			$user->code 			= '';

			if($user->save()) {
				return Redirect::route('home')
						->with('global', 'Akun mu sudah di recover!!'); 	
			}
		}

		return Redirect::route('home')
				->with('global', 'Tidak dapat merecover akun mu');
	}

}