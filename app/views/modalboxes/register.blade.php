<div class="modal" id="registerModal">
	<h1 id='modalTitle'>Create user</h1>
	{{ Form::open(array('url' => '/users/')); }}
		{{ Form::text('username', 'USERNAME') }}
		{{ Form::password('password') }}
		{{ Form::text('name', 'FULL NAME') }}
		{{ Form::email('email', 'EMAIL') }}
		{{ Form::submit('Create User', array('class' => 'modalSubmitBtn')) }}
	{{ Form::close(); }}
</div>