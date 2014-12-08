@extends('_master')

@section('title')
	Welcome to Task Manager
@stop

@section('head')

@stop

@section('content')
	

	{{ Form::open(array('url' => '/task', 'method' => 'GET')) }}

		{{ Form::label('query','Search') }}

		{{ Form::text('query'); }}

		{{ Form::submit('Search'); }}

	{{ Form::close() }}

@stop