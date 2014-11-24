@extends('layout.admin')

@section('content')
	<div id="dashboard">
		<div class="row">
			<div class="col-lg-12">
				<ul class="nav nav-pills">
			      	<li><a href="{{ URL::route('dashboard') }}">Dashboard</a></li>
			      	<li class="active"><a href="{{ URL::route('dashboard-user') }}">User List</a></li>
			      	<li><a href="{{ URL::route('dashboard-daftar') }}">Tambah User</a></li>
			    </ul>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-lg-12">
				<div class="well">
					<h3>Semua User</h3>
					<hr>
					@if(Session::has('message'))
						<div class="alert alert-info">{{ Session::get('message') }}</div>
					@endif
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<td>ID</td>
								<td>NIM</td>
								<td>Username</td>
								<td>Name</td>
								<td>Email</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody>
							@foreach($user as $key => $u)
								<tr>
									<td>{{ $u->id }}</td>
									<td>{{ $u->nim }}</td>
									<td>{{ $u->username }}</td>
									<td>{{ $u->name }}</td>
									<td>{{ $u->email }}</td>
									<td>
										{{ Form::open(array('url' => 'user/' . $u->id, 'class' => 'pull-right')) }}
											{{ Form::hidden('_method', 'DELETE') }}
											{{ Form::submit('Delete', array('class' => 'btn btn-danger btn-xs')) }}
										{{ Form::close() }}

										<a href="{{ URL::to('user/' . $u->username) }}" class="btn btn-success btn-xs">Show</a>
										<a href="{{ URL::to('user/' . $u->id . '/edit') }}" class="btn btn-info btn-xs">Edit</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

@stop