@extends('layout.main')

@section('content')

		<h3>TUTORIAL OWASP LAB UAD</h3>
		<hr>
		
		<!--@foreach ($tutorial as $tutor)
			
			<div class="panel panel-default">
				<div class="panel-body">

				</div>
			</div>
	
		@endforeach-->

		<p>Kalian bisa membaca dan mempelajari tutorial yang ada di Website OWASP LAB UAD ini, semua tutorial yang ada disini merupakan tutorial yang legal dan bisa kalian praktekan tentunya dengan menggunakan server yang telah dibuat oleh OWASP LAB UAD, yang bisa kalian download disini <a href="{{ URL::route('dashuser-simulasi') }}">SIMULASI</a>. Kalian harus membaca Etika Hacking terlebih dahulu sebelum mempraktekan agar kalian berada di jalan yang benar :D</p>
		<hr>

		<a href="{{ URL::route('sql-injection') }}"><h4>BLIND SQL Injection</h4></a>
		<p>Blind SQL Ini adalah metode hacking yang memungkinkan seorang Attacker yang tidak sah untuk mengakses server database. Hal ini difasilitasi oleh sebuah kesalahan pengkodean umum: program menerima data dari klien dan mengeksekusi query SQL tanpa terlebih dahulu memvalidasi masukan klien. <a href="{{ URL::route('sql-injection') }}" class="label label-primary">Baca Selanjutnya</a></p>
		<hr>

		<a href="{{ URL::route('lfi') }}"><h4>LFI (Local File Inclusion)</h4></a>
		<p>LFI (Local File Inclusion) adalah sebuah lubang pada site di mana attacker bisa mengakses semua file di dalam server dengan hanya melalui URL. <a href="{{ URL::route('lfi') }}" class="label label-primary">Baca Selanjutnya</a></p>
		<hr>

		<a href="{{ URL::route('reset-password') }}"><h4>Rreset Password Wordpress dengan SQLMAP</h4></a>
		<p>LFI (Local File Inclusion) adalah sebuah lubang pada site di mana attacker bisa mengakses semua file di dalam server dengan hanya melalui URL. <a href="{{ URL::route('reset-password') }}" class="label label-primary">Baca Selanjutnya</a></p>
		<hr>

@stop