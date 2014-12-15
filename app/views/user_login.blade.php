@extends('_master')

@section('title')
	Log in
@stop

@section('content')


<h1>Log in</h1>

{{ Form::open(array('url' => '/login')) }}

    {{ Form::label('email') }}
    {{ Form::text('email','larry@gmail.com') }}

    {{ Form::label('password') }} (larry1234)
    {{ Form::password('password') }}

    {{ Form::submit('Submit') }}

{{ Form::close() }}
@stop