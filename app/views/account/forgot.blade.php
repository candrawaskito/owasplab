@extends('layout.main')

@section('content')
	<div class="box-lupa-password">
		<div class="text-center">
			<h3>RESET PASSWORD</h3>
		</div>
		<hr>
		<form action="{{ URL::route('akun-lupa-password-post') }}" method="post">
			<div class="form-group">
				<input type="text" name="email"{{ (Input::old('email')) ? ' value="' . e(Input::old('email')) . '"' : '' }} class="form-control" placeholder="Email">
				@if($errors->has('email'))
					{{ $errors->first('email') }}
				@endif
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block">
				{{ Form::token() }}
				RESET
				</button>
			</div>
		</form>
	</div>
@stop