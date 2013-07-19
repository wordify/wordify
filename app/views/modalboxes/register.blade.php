<div class="modal" id="loginModal">
	<h1 id='modalTitle'>Create user</h1>
	{{ Form::open(array('url' => '/')); }}
		{{ Form::text('username', 'USERNAME')) }}
		{{ Form::password('password') }}
		{{ Form::text('name', 'FULL NAME') }}
		{{ Form::email('email', 'EMAIL') }}
		{{ Form::submit('Create User', array('class' => 'modalSubmitBtn')) }}
	{{ Form::close(); }}
</div>