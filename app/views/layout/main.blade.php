<!DOCTYPE html>
<html lang="en">
<head>
	<title>OWASP LAB</title>
	{{ HTML::style('css/bootstrap.min.css') }}
	{{ HTML::style('css/style.css') }}
  	{{ HTML::style('video-js.css') }}
  	{{ HTML::style('video.js') }}
</head>
<body>
	
	<!-- start:content -->
	<div class="container" id="main">
		<h3>{{ HTML::image('img/logo.png') }} <strong>SIMULASI OWASP UAD</strong></h3>
		@include('layout.navigation')
		<div class="row">
			<div class="col-lg-12">
				@if(Session::has('global'))
					<p class="alert alert-success">{{ Session::get('global') }}</p>
				@endif
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				@yield('content')
			</div>
		</div>
		<footer>
			<p>
				Copyright 2014 &copy; OWASP LAB Universitas Ahmad Dahlan
			</p>
		</footer>
	</div>
	<!-- end:content -->

	<!-- start:javascript -->
	{{ HTML::script('js/jquery-1.11.1.min.js') }}
	{{ HTML::script('js/bootstrap.min.js') }}
	{{ HTML::script('js/themes.js') }}
	<!-- end:javascript -->

</body>
</html>