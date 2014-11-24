<nav class="navbar navbar-default navbar-static-top" role="navigation">
	<div class="container">
	  	<div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
		      	</button>
		    </div>
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      	<ul class="nav navbar-nav">
			        @if(Auth::check())
			        	<li><a href="{{ URL::route('dashuser') }}">Home</a></li>
			        	<li><a href="{{ URL::route('dashuser-simulasi') }}">Simulasi</a></li>
			        	<li><a href="{{ URL::route('dashuser-tutorial') }}">Tutorial</a></li>
						<li><a href="{{ URL::route('akun-keluar') }}">Keluar</a></li>
						<li><a href="{{ URL::route('akun-ganti-password') }}">Ganti Password</a></li>
					@else
						<li><a href="{{ URL::route('about') }}">About</a></li>
						<li><a href="{{ URL::route('akun-masuk') }}">Masuk</a></li>
						<li><a href="{{ URL::route('akun-daftar') }}">Daftar</a></li>
						<li><a href="{{ URL::route('akun-lupa-password') }}">Lupa Password</a></li>
					@endif
		      	</ul>
		    </div>
	  	</div>
	</div>
</nav>