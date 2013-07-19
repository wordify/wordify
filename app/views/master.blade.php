<!doctype html>
<html>
	<head>
		<title>Wordify - Make your words become real!</title>
		<link href="/css/home.css" rel="stylesheet" type="text/css">
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

		<div id="relatedPeople" align="left">
			@yield('relatedPeople')
		</div>

		<div id="container">
			@yield('inputWord')

			<div id="words">
				@yield('words')
			</div>
		</div>
	</body>
</html>

	