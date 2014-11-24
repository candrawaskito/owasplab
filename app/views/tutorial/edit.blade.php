@extends('layout.admin')

@section('content')

	<div id="dashboard">
		<div class="row">
			<div class="col-lg-4">
				<ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
			      	<li class="active"><a href="{{ URL::route('dashboard') }}">Dashboard</a></li>
			      	<li><a href="{{ URL::route('dashboard-user') }}">User List</a></li>
			      	<li><a href="{{ URL::route('index-tutorial') }}">Tutorial</a></li>
			    </ul>
			</div>
			<div class="col-lg-8">
				<div class="well">
					<h3>Edit Tutorial OWASP LAB</h3>
					<hr>
					
					@if($errors->has('judul'))
						<p class="alert alert-warning">{{ $errors->first('judul') }}</p>
					@endif
					@if($errors->has('isi'))
						<p class="alert alert-warning">{{ $errors->first('isi') }}</p>
					@endif

					{{ Form::model($tutorial, array('route' => array('put-edit-tutorial', $tutorial->id), 'method' => 'PUT')) }}
						<div class="form-group">
							{{ Form::label('judul', 'Judul') }}
						</div>

						<div class="form-group">
							{{ Form::text('judul', $tutorial->judul, array('class' => 'form-control')) }}
						</div>

						<div class="form-group">
							{{ Form::label('isi', 'Isi') }}
						</div>

						<div class="form-group">
							{{ Form::textarea('isi', $tutorial->isi, array('class' => 'form-control')) }}
						</div>

						<div class="form-group">
							{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}
						</div>
					{{ Form::close() }}
					<a href="{{ route('index-tutorial') }}">Kembali ke Tutorial</a>

				</div>
			</div>
		</div>
	</div>

@stop