@extends('layout.admin')

@section('content')

	<div id="dashboard">
		<div class="row">
			<div class="col-lg-4">
				<ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
			      	<li><a href="{{ URL::route('dashboard') }}">Dashboard</a></li>
			      	<li><a href="{{ URL::route('dashboard-user') }}">User List</a></li>
			      	<li><a href="{{ URL::route('dashboard-daftar') }}">Tambah User</a></li>
			      	<li class="active"><a href="{{ URL::route('create-tutorial') }}">Tambah Tutorial</a></li>
			    </ul>
			</div>
			<div class="col-lg-8">
				<div class="well">
					<h3>Tambah Tutorial OWASP LAB</h3>
					<hr>
					@if($errors->has('judul'))
						<p class="alert alert-errors">{{ $errors->first('judul') }}</p>
					@endif
					@if($errors->has('isi'))
						<p class="alert alert-errors">{{ $errors->first('isi') }}</p>
					@endif

					{{ Form::open(array('route' => 'post-create-tutorial')) }}

						<div class="form-group">
							{{ Form::label('judul', "Judul") }}
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="judul" placeholder="Masukkan Judul">
						</div>
						<div class="form-group">
							{{ Form::label('isi', "Isi") }}
						</div>
						<div class="form-group">
							<textarea name="isi" cols="30" rows="10" class="form-control"></textarea>
						</div>
						<div class="form-group">
							{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
						</div>

					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>

@stop