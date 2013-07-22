<div class="modal" id="loginModal">
	<h1 id='modalTitle'>Login</h1>
	{{ Form::open(array('url' => '/login')); }}
		{{ Form::text('username', 'USERNAME', array('class' => 'loginUsername')) }}
		{{ Form::password('password', array('class' => 'loginPassword')) }}
		{{ Form::submit('Login', array('class' => 'modalSubmitBtn')) }}
	{{ Form::close(); }}
	OR
	<a href="/login/facebook">LOGIN WITH FACEBOOK</a>
</div>