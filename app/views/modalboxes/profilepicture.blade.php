<div class="modal" id="profilepictureModal">
	<h1 id='modalTitle'>Profile Picture</h1>
	hello
	{{ Form::open(array('url' => '/image')); }}
		{{ Form::file('photo') }}
	{{ Form::close(); }}
</div>