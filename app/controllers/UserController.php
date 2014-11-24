<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// get all mahasiswa 
		$user = User::all();

		// load the view and pass the nerds
		return View::make('user.index')
		       ->with('user', $user);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// load the create form (app/views/user/create.blade.php)
		return View::make('account.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// edit user 
		$user = User::find($id);

		// show the edit form and pass the user
		return View::make('user.edit')
		       ->with('user', $user);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//validate
		$rules = array(
			'username' 	=>	'required',
			'name'		=>	'required',
			'email'		=>	'required|email'
		);

		$validator = Validator::make(Input::all(), $rules);

		// proses edit
		if($validator->fails()){
			return  Redirect::to('user/' . $username . '/edit')
					->withErrors($validator)
					->withInput(Input::except('password'));
		}
		else{
			// store
			$user = User::find($id);
			$user->username 	= Input::get('username');
			$user->name 		= Input::get('name');
			$user->email 		= Input::get('email');
			$user->save();

			// redirect
			Session::flash('message', 'Successfully updated user!');
			return Redirect::to('user');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
		$user = User::find($id);
		$user->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the User');
		return Redirect::to('user');
	}


}
