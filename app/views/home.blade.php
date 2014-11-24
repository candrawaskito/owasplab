@extends('layout.account')

@section('content')
	<div class="box-login">
		<div class="text-center">
			<h3>{{ HTML::image('img/logo.png') }} SIMULASI OWASP UAD</h3>
			<hr>
			<h3>LOGIN</h3>
			<hr>
		</div>
		<form action="{{ URL::route('akun-masuk-post') }}" method="post">
			<div class="form-group">
				<input type="text" name="nim"{{ (Input::old('nim')) ? ' value="' . Input::old('nim') . '"' : '' }} class="form-control" placeholder="NIM">
				@if($errors->has('nim'))
					{{ $errors->first('nim') }}
				@endif
			</div>

			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Password">
				@if($errors->has('password'))
					{{ $errors->first('password') }}
				@endif
			</div>

			<div class="form-group">
				<input type="checkbox" name="remember" id="remember">
				<label for="remember">
					Remember me
				</label>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">
				{{ Form::token() }} LOGIN
				</button>
				<a class="btn btn-warning" href="{{ URL::route('akun-daftar') }}">
				REGISTER
				</a>
			</div>
		</form>
	</div>
@stop