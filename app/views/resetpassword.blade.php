@extends('layout.main')

@section('content')

	<script>
    	videojs.options.flash.swf = "video-js.swf";
  	</script>

	<div class="well">
		<h3><strong>Reset Password dengan SqlMap</strong></h3>
		<hr>
		<p>Tutorial Reset Password Wordpress menggunakan SqlMap ini bertujuan untuk mendapatkan hak akses untuk login kedalam website yang didamana kita tidak mempunyai hak akses password untuk login.</p>
		<p>Setelah kita mendapatkan informasi username, password, dan email pada website yang vurlnerable, maka kita bisa login ke dalam website tersebut. Tetapi berbeda dengan wordpress karena wordpress mempunyai sistem Enkripsi password yang sedikit berbeda dengan enkripsi password yang sering kita gunakan yaitu MD5. Kita bisa untuk mempelajari cara Enkripsi itu berjalan dan kita bisa membuat Decrypt untuk itu.</p>
		<p>Tetapi disini saya akan memberikan sebuah tutorial agar kita bisa login ke dalam website tanpa harus membuat decrypt dari password yang telah kita temukan.</p>

		<p>Lihat dan pelajari video dibawah ini, happy hacking :D</p>

		<hr>
		<h3>VIDEO</h3>
		<hr>

		<iframe width="100%" height="465" src="//www.youtube.com/embed/1G6wDoL8llo" frameborder="0" allowfullscreen></iframe>

	</div>
@stop