{{ HTML::style('css/bootstrap.min.css') }}
{{ HTML::style('css/style.css') }}

<div class="box-login">
	<div class="text-center">
		<h3>LOGIN ADMINISTRATOR</h3>
	</div>
	<hr>
	<form action="{{ URL::route('admin-login-post') }}" method="post">

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
			<button type="submit" class="btn btn-primary btn-block">
			{{ Form::token()  }}LOGIN
			</button>
		</div>
	</form>
</div>