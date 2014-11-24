@extends('layout.main')

@section('content')
	<div class="well">
		<h3><strong>SIMULASI</strong></h3>
		<hr>
		<p>Silahkan download simulasi yang berbentuk .ISO di bawah ini. Gunakan VMWare ataupun VirtualBox untuk menjalankan Simulasi OWASP UAD ini. Dan juga bisa langsung melakukan start simulasi, untuk mencoba simulasi hacking. Happy Hacking :D</p>
		<hr>
		<div class="text-center">
			<a class="btn btn-info btn-sm" target="_blank" href="{{ URL::to('#') }}">Download ISO</a>
			<a class="btn btn-info btn-sm" target="_blank" href="{{ URL::to('http://192.168.56.101') }}">Start Simulasi</a>
		</div>
		<hr>
	</div>
@stop