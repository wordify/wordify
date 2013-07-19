<!doctype html>
<html>
	<head>
		<title>Wordify - Make your words become real!</title>
		<!-- CSS files -->
		{{ HTML::style('css/home.css'); }}
	</head>
	<body>
				<!-- Modal box -->
		<div class="modal_container">
				@include('modalboxes.login')
				@include('modalboxes.register')
		</div>
		<nav id="topNavigation">
			<ul id="topBtnUL">
				@if(Auth::check())
					<li><a href="{{ URL::route('user_logout') }}">Log out</a></li>
				@else
					<li><a href='#' id='loginButton'>Login</a></li>
					<li><a href='#' id='createUserButton'>Register</a></li>
				@endif
			</ul>
		</nav>

		<div id="container">
			@yield('content')
		</div>
	</body>

		<!-- Js files -->
		{{ HTML::script("js/jquery.js"); }}
		{{ HTML::script("js/home.js");}}
</html>

	