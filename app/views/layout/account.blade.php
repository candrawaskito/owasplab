<!DOCTYPE html>
<html lang="en">
<head>
	<title>OWASP LAB</title>
	{{ HTML::style('css/bootstrap.min.css') }}
	{{ HTML::style('css/style.css') }}
</head>
<body>
	
	<!-- start:content -->
	<div class="container">
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
	</div>
	<!-- end:content -->

	<!-- start:javascript -->
	{{ HTML::script('js/jquery-1.11.1.min.js') }}
	{{ HTML::script('js/bootstrap.min.js') }}
	{{ HTML::script('js/themes.js') }}
	<!-- end:javascript -->

</body>
</html>