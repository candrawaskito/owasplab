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
		      	<a class="navbar-brand" href="{{ URL::route('home') }}">OWASP LAB</a>
		    </div>
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      	<ul class="nav navbar-nav navbar-right">
			        @if(Auth::check())
						<li><a href="{{ URL::route('dashboard-logout') }}">Keluar</a></li>
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