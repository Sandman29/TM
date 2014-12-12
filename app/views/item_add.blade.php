@extends('_master')

@section('title')
	Add a new book
@stop

@section('head')

@stop

@section('content')

	<h1>Add a new task item</h1>

	{{ Form::open(array('url' => '/task/create')) }}


		{{ Form::label('task','Task') }}
		{{ Form::text('task'); }}

		{{ Form::label('due_date', 'Due Date (mm/dd/yy)') }}
		{{ Form::text('due_date'); }}

		{{ Form::submit('Add'); }}

	{{ Form::close() }}

@stop