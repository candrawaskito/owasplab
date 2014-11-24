<?php

class TutorialController extends BaseController {

	public function index() {

		$tutorial = Tutorial::all();
		return View::make('tutorial.index', compact('tutorial'));

	}

	public function indexDash(){

		$tutorial = Tutorial::all();
		return View::make('tutorial.tutor', compact('tutorial'));

	}

	public function create() {

		return View::make('tutorial.create');

	}

	public function postCreate() {

		$input = Input::all();

		$aturan = array(
			'judul' => 'required',
			'isi'	=>	'required',
		);

		$pesan = array(
			'judul.required' 	=> 'Inputan Judul wajib diisi.',
			'isi.required'		=>	'Inputan Isi wajib diisi'
		);

		$validasi = Validator::make($input, $aturan, $pesan);

		if($validasi->fails()) {
			return Redirect::back()->withErrors($validasi)->withInput();
		} else {

			$judul 	= 	Input::get('judul');
			$isi 	=	Input::get('isi');

			Tutorial::create(compact('judul', 'isi'));

			return Redirect::route('index-tutorial')->withPesan('Tutorial baru berhasil ditambahkan.');
		}
	}

	public function view($id){
		$tutorial = Tutorial::find($id);

		return View::make('tutorial.view', compact('tutorial'));
	}

	public function edit($id){

		$tutorial = Tutorial::find($id);

		return View::make('tutorial.edit', compact('tutorial'));
	}

	public function putEdit($id) {

		$input = Input::all();

		$aturan = array(
			'judul' => 	'required',
			'isi'	=>	'required',
		);

		$pesan = array(
			'judul.required' => 'Inputan Judul wajib diisi.',
			'isi.min' => 'Inputan Isi wajib diisi.'
		);

		$validasi = Validator::make($input, $aturan, $pesan);

		if($validasi->fails()) {

			return Redirect::back()->withErrors($validasi)->withInput();

		} else {

			$tutorial = Tutorial::find($id);

			$tutorial->judul	= Input::get('judul');
			$tutorial->isi 		= Input::get('isi');
			$tutorial->save();

			return Redirect::route('index-tutorial')->withPesan('Tutorial baru berhasil diedit.');
		}
	}

	public function delete($id) {

		Tutorial::find($id)->delete();

		return Redirect::back()->withPesan('Tutorial berhasil dihapus.');
	}
}