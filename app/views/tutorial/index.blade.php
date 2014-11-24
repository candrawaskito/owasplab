@extends('layout.admin')

@section('content')

	<div id="dashboard">
		<div class="row">
			<div class="col-lg-12">
				<ul class="nav nav-pills">
			      	<li><a href="{{ URL::route('dashboard') }}">Dashboard</a></li>
			      	<li><a href="{{ URL::route('dashboard-user') }}">User List</a></li>
			      	<li class="active"><a href="{{ URL::route('index-tutorial') }}">Tutorial</a></li>
			    </ul>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-lg-12">
				<div class="well">
					<h3>List Tutorial OWASP LAB</h3>
					<hr>
					
					@if(Session::has('pesan'))
						<p class="alert alert-success"> {{ Session::get('pesan') }}</p>
					@endif
					@if($tutorial->count())
						<p><a href="{{ route('create-tutorial') }}" class="btn btn-primary btn-small">Tambah</a></p>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Judul</th>
									<th>Isi</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($tutorial as $tutor)
								<tr>					
									<td>{{ $tutor->judul }}</td>
									<td>{{ $tutor->isi }}</td>
									<td>
										<a href="{{ route('view-tutorial', $tutor->id) }}" class="label label-info">View</a> |
										<a href="{{ route('edit-tutorial', $tutor->id) }}" class="label label-info">Edit</a> | 
										<a href="{{ route('delete-tutorial', $tutor->id) }}" class="label label-danger">Hapus</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					@else
						<p>Anda belum memiliki isi pada tabel tutorial.</p>
						<p><a class="btn btn-primary btn-small" href="{{ route('create-tutorial') }}">Tambah</a></p>
					@endif

				</div>
			</div>
		</div>
	</div>

@stop