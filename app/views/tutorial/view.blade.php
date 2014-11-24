@extends('layout.main')

@section('content')
		
	<div class="panel panel-default">
	  	<div class="panel-body">
	    	<h2>{{ $tutorial->judul }}</h2>
	    	<hr>
	    	<p>{{ $tutorial->isi }}</p>
	  	</div>
	</div>
	
@stop