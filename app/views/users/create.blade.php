@extends('master')

@section('content')

	{{ Form::open(array('url' =>'users')) }}</p>
		<p>{{ Form::label('username', 'Username:');}} {{ Form::text('username'); }}</p>
		<p>{{ Form::label('password', 'Password:'); }} {{ Form::password('password'); }}</p>
		<p>{{ Form::label('name', 'Name:'); }} {{ Form::text('name'); }}</p>
		<p>{{ Form::label('email', 'Email:'); }} {{ Form::text('email'); }}</p>
		<p>{{ Form::label('country', 'Country:'); }} {{ Form::text('country'); }}</p>
		<p>{{ Form::label('job', 'Job:'); }} {{ Form::text('job'); }}</p>
		<p>{{ Form::label('website', 'Website:'); }} {{ Form::text('website'); }}</p>
		<p>{{ Form::label('userStatus', 'UserStatus:'); }} {{ Form::text('userStatus', '1'); }}</p>
		<p>{{ Form::label('profilePicture', 'ProfilePic:'); }} {{ Form::text('profilePicture'); }}</p>

		{{ Form::submit('Create'); }}
	{{ Form::close() }}
@stop