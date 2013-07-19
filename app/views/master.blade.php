<!doctype html>
<html>
	<head>
		<title>Wordify - Make your words become real!</title>
		<!-- CSS files -->
		<link href="/css/home.css" rel="stylesheet" type="text/css">

		<!-- Js files -->
		<script src="/js/jquery.js"></script>
		<script src="/js/home.js"></script>
	</head>
	<body>
		<nav id="topNavigation">
			<ul id="topBtnUL">
				@if(Auth::check())
					<li><a href="{{ URL::route('user_logout') }}">Log out</a></li>
				@else
					<li id="loginButton">Login</li>
					<li id="createUserButton">Register</li>
				@endif
			</ul>
		</navn>
		<div id="container">
			@yield('content')
		</div>

		<!-- Modal box -->
		<div class="modal_container"></div>
	</body>
</html>

	