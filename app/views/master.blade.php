<!doctype html>
<html>
	<head>
		<title>Wordify - Make your words become real!</title>
		<!-- CSS files -->
		{{ HTML::style('css/home.css'); }}
	</head>
	<body>
		<nav id="topNavigation">
			<ul id="topBtnUL">
				@if(Auth::check())
					<li><a href="{{ URL::route('user_logout') }}">Log out</a></li>
				@else
					<li><a href='#' id='loginButton'>Login</a></li>
					<li id="createUserButton">Register</li>
				@endif
			</ul>
		</nav>
		<div id="container">
			@yield('content')
		</div>

		<!-- Modal box -->
		<div class="modal_container">
			<div class="modal" id="loginModal">
			<h1 id='modalTitle'>Login</h1>
				Hello
			</div>
		</div>
	</body>

		<!-- Js files -->
		{{ HTML::script("js/jquery.js"); }}
		{{ HTML::script("js/home.js");}}
</html>

	