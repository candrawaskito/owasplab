@extends('layout.main')

@section('content')

	<script>
    	videojs.options.flash.swf = "video-js.swf";
  	</script>

	<div class="well">
		<h3>Local File Inclusion (LFI)</h3>
		<hr>
		<p>LFI (Local File Inclusion) adalah sebuah lubang pada site di mana attacker bisa mengakses semua file di dalam server dengan hanya melalui URL.</p>
		<hr>
		<h4>Penjelasan</h4>
		fungsi-fungsi yang dapat menyebabkan LFI/RFI:


		Code:
		<pre>
		include();
		include_once();
		require();
		require_once();

		Dengan syarat pada konfigurasi php di server:
		allow_url_include = on
		allow_url_fopen = on
		magic_quotes_gpc = off
		</pre>

		contoh:
		<br>
		Misalkan kita punya file index.php dengan content kodenya seperti ini,

		<br><br>
		Code:
		<pre>
		include "../$_GET[imagefile]";
		</pre>

		Misal $imagefile=image.php<br>
		Mungkin di url akan terlihat seperti ini bentuknya

		<br><br>
		Code:
		<pre>
		http://www.[target].com/index.php?imagefile=image.php
		maka script ini akan menampilkan halaman image.php. 
		</pre>


		<p>Disini attacker akan dapat melakukan LFI karena variable imagefile di include begitu saja tanpa menggunakan filter. Misalnya attacker ingin mengakses file passwd yang ada pada server, maka dia akan mencoba memasukan seperti ini ../../../../../../../../../etc/passwd dengan jumlah "../" itu tergantung dari kedalaman folder tempat file index.php tersebut. Dengan begitu isi file passwd akan ditampilkan di browser. Kita bisa menggunakan metode menebak struktur folder dalam website target</p>
		<hr>
		
		<h3>VIDEO</h3>
		<hr>
		<iframe width="100%" height="465" src="//www.youtube.com/embed/9Ad0eNgZPrs" frameborder="0" allowfullscreen></iframe>

		

	</div>
@stop