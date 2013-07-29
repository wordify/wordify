<!doctype html>
<html>
	<head>
		<title>Wordify - Make your words become real!</title>
		<!-- CSS files -->
		{{ HTML::style('css/home.css'); }}
		{{ HTML::style('css/modal.css'); }}
	</head>
	<body>
		<!-- Display errors that might occur -->
		@foreach($errors->all() as $error)
			</i><b>{{ $error }}<br /></b></i>
		@endforeach
		@if(Auth::check()) <div id="profileBox"></div> @endif
		<!--  -->
		<div class="loggedInUserId @if(Auth::check()){{ Auth::user()->id}} @endif">
		</div>

		<!-- Word, comment and notification trackers -->
		<div class="lastWordId 0"></div>
		<div class="lastCommentId 0"></div>
		<div class="lastNotificationId 0"></div>

		<!-- Modal box -->
		<div class="modal_container">
				@include('modalboxes.login')
				@include('modalboxes.register')
				@include('modalboxes.followed')
				@include('modalboxes.profilepicture');
		</div>
		<nav id="topNavigation">
			<ul id="topBtnUL">
				@if(Auth::check())
					<li><a href="{{ URL::to('logout') }}">Log out</a></li>
				@else
					<img src="/images/logo/Wordify-logo_50px.png" id="logo"/>
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

	