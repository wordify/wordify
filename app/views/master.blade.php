<!doctype html>
<html>
	<head>
		<title>Wordify - Make your words become real!</title>
		<!-- CSS files -->
		{{ HTML::style('css/home.css'); }}
		{{ HTML::style('css/modal.css'); }}
	</head>
	<body>
		<div class="loggedInUserId 
			@if(Auth::check())
				{{ Auth::user()->id }}
			@endif
			">
		</div>

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
					<li id="loginButton"><a href='#'>Login</a></li>
					<li id="createUserButton"><a href='#'>Register</a></li>
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

	