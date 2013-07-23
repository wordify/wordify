<!doctype html>
<html>
	<head>
		<title>Wordify - Make your words become real!</title>
		<!-- CSS files -->
		{{ HTML::style('css/home.css'); }}
	</head>
	<body>
		<div class="loggedInUserId {{ Auth::user()->id }}"></div>

				<!-- Modal box -->
		<div class="modal_container">
				@include('modalboxes.login')
				@include('modalboxes.register')
		</div>
		<nav id="topNavigation">
			<ul id="topBtnUL">
				@if(Auth::check())
					<li><a href="{{ URL::to('logout') }}">Log out</a></li>
				@else
					<li><a href='#' id='loginButton'>Login</a></li>
					<li><a href='#' id='createUserButton'>Register</a></li>
				@endif
			</ul>
		</nav>


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

		<!-- Js files -->
		{{ HTML::script("js/jquery.js"); }}
		{{ HTML::script("js/home.js"); }}
		{{ HTML::script("js/keypressHandler.js"); }}
</html>

	