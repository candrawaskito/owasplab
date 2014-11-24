@extends('layout.main')

@section('content')
	<div class="box-reset">
		<div class="text-center">
			<h3>GANTI PASSWORD</h3>
		</div>
		<hr>
		<form action="{{ URL::route('akun-ganti-password-post') }}" method="post">
			<div class="form-group">
				<input type="password" name="old_password" class="form-control" placeholder="Password lama">
				@if($errors->has('old_password'))
					{{ $errors->first('old_password') }}
				@endif
			</div> 

			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Password Baru">
				@if($errors->has('password'))
					{{ $errors->first('password') }}
				@endif
			</div>

			<div class="form-group">
				<input type="password" name="password_again" class="form-control" placeholder="Password Baru Lagi">
				@if($errors->has('password_again'))
					{{ $errors->first('password_again') }}
				@endif
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block">
				{{ Form::token() }} Ganti Password
				</button>
			</div>
		</form>
	</div>
@stop