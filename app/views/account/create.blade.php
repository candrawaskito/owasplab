@extends('layout.account')

@section('content')
	<div class="box-daftar">
		<div class="text-center">
			<h3>{{ HTML::image('img/logo.png') }} SIMULASI OWASP UAD</h3>
			<hr>
			<h3>DAFTAR</h3>
			<hr>
		</div>
		<form action="{{ URL::route('akun-daftar-post') }}" method="post">
			<div class="form-group">
				<input type="text" name="nim"{{ (Input::old('nim')) ? ' value="'  . e(Input::old('nim')) .'"' : '' }} class="form-control" placeholder="NIM">
				@if($errors->has('nim'))
					{{ $errors->first('nim') }}
				@endif
			</div>

			<div class="form-group">
				<input type="text" name="username"{{ (Input::old('username')) ? ' value="'  . e(Input::old('username')) .'"' : '' }} class="form-control" placeholder="Username">
				@if($errors->has('username'))
					{{ $errors->first('username') }}
				@endif
			</div>

			<div class="form-group">
				<input type="text" name="name"{{ (Input::old('name')) ? ' value="'  . e(Input::old('name')) .'"' : '' }} class="form-control" placeholder="NAMA">
				@if($errors->has('name'))
					{{ $errors->first('name') }}
				@endif
			</div>

			<div class="form-group">
				<input type="text" name="email"{{ (Input::old('email')) ? ' value="'  . e(Input::old('email')) .'"' : '' }} class="form-control" placeholder="Email">
				@if($errors->has('email'))
					{{ $errors->first('email') }}
				@endif
			</div>		

			<div class="form-group">
				<input type="password" name="password"{{ (Input::old('password')) ? ' value="'  . e(Input::old('password')) .'"' : '' }} class="form-control" placeholder="Password">
				@if($errors->has('password'))
					{{ $errors->first('password') }}
				@endif
			</div>

			<div class="form-group">
				<input type="password" name="password_again"{{ (Input::old('password_again')) ? ' value="'  . e(Input::old('password_again')) .'"' : '' }} class="form-control" placeholder="Password Lagi">
				@if($errors->has('password_again'))
					{{ $errors->first('password_again') }}
				@endif
			</div>

			<div class="form-group">
				<button class="btn btn-info btn-block" type="submit">
				{{ Form::token(); }}
				DAFTAR
				</button>
			</div>
		</form>
	</div>
@stop