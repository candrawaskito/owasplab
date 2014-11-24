@extends('layout.main')

@section('content')
	<ul>
		<li><a href="{{ URL::to('user') }}">View all User</a></li>
		<li><a href="{{ URL::to('user/create') }}">Create a User</a></li>
	</ul>

	<hr>
	<h1>Create a User</h1>
	<hr>
	{{ HTML::ul($errors->all()) }}

	{{ Form::open(array('url' => 'user')) }}
		<div class="form-group">
			{{ Form::label('nim', 'NIM') }}
			{{ Form::text('nim', Input::old('nim'), array('class') => 'form-control') }}
		</div>

		<div class="form-group">
			{{ Form::label('username', 'Username') }}
			{{ Form::text('username', Input::old('username'), array('class') => 'form-control') }}
		</div>

		<div class="form-group">
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name', Input::old('name'), array('class') => 'form-control') }}
		</div>

		<div class="form-group">
			{{ Form::label('email', 'Email') }}
			{{ Form::text('email', Input::old('email'), array('class') => 'form-control') }}
		</div>
	{{ Form::close() }}
@stop