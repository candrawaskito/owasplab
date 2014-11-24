@extends('layout.main')

@section('content')
	<div class="well">
		<h3>SQL Injection</h3>
		<hr>
		<p>SQL injection adalah serangan yang memanfaatkan kelalaian dari website yang mengijinkan user untuk menginputkan data tertentu tanpa melakukan filter terhadap malicious character. Inputan tersebut biasanya di masukan pada box search atau bagian-bagian tertentu dari website yang berinteraksi dengan database SQL dari situs tersebut. Perintah yang dimasukan para attacker biasanya adalah sebuah data yang mengandung link tertentu yang mengarahkan para korban ke website khusus yang digunakan para attacker untuk mengambil data pribadi korban.</p>
		<p>Untuk menginjeksi sebuah database bisa menggunakan cara manual dan juga menggunakan tools, disini saya menggunakan tools yang sangat terkenal dan ampuh. Tools ini opensource dan jika kalian menggunakan Backtrack OS atau Kali OS maka tools ini sudah pasti terinstall.</p>
		<p>Tools ini bernama SQLMap, SQLMap merupakan tools automatic untuk mengetest database apakah sebuah database tersebut dapat di injeksi atau tidak, feature yang terdapat didalam SQLMap ini sangat komplit dan juga beserta dukungan yang bagus dari vendornya.</p>
		<p>Untuk mempelajari lebih lanjut, silahkan menonton video tutorial dibawah ini , dan praktekan. Keep Legal Hacking :D</p>
		<hr>
		<h3>VIDEO</h3>
		<hr>
		<iframe width="100%" height="465" src="//www.youtube.com/embed/NpJSYJVjDHg" frameborder="0" allowfullscreen></iframe>
		<!-- <iframe width="560" height="315" src="//www.youtube.com/embed/gAmb0_o3ZUc" frameborder="0" allowfullscreen></iframe> -->

	</div>
@stop