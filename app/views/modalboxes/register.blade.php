<div class="modal" id="registerModal">
	<h1 id='modalTitle'>Create user</h1>
	{{ Form::open(array('url' => '/users/')); }}
		<input type="text" id="username" name="username" class="modalCreateInputField" placeholder="USERNAME" required>
		<input type="password" id="password" name="password" class="modalCreateInputField" placeholder="PASSWORD" required>
		<input type="text" id="name" name="name" class="modalCreateInputField" placeholder="FULL NAME" required>
		<input type="email" id="email" name="email" clasS="modalCreateInputField" placeholder="EMAIL" required> 

	<div class="modalButtonContainer">
		{{ Form::submit('Create user', array('class' => 'modalSubmitBtn')) }}
		<span class='modalORText'>OR</span>
		<a href="/login/facebook" class='facebookLoginBtn'>LOGIN WITH FACEBOOK</a>
	</div>
	{{ Form::close(); }}
</div>