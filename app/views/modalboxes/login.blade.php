<div class="modal" id="loginModal">
	<h1 id='modalTitle'>Login</h1>
	{{ Form::open(array('url' => '/login')); }}
		<input type="text" class="modalInputField" id="username" placeholder="USERNAME" required>
		<input type="password" class="modalInputField" id="password" placeholder="PASSWORD" required>
	<div class="modalButtonContainer">
		{{ Form::submit('Login', array('class' => 'modalSubmitBtn')) }}
		<span class='modalORText'>OR</span>
		<a href="/login/facebook" class='facebookLoginBtn'>LOGIN WITH FACEBOOK</a>
	</div>
	{{ Form::close(); }}
</div>