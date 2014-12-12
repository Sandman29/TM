@extends('_master')

@section('title')
	Add a new book
@stop

@section('head')

@stop

@section('content')

	<h1>Add a new category name</h1>

	{{ Form::open(array('url' => '/category/create')) }}


		{{ Form::label('name','Category Name') }}
		{{ Form::text('name'); }}

		{{ Form::submit('Add'); }}

	{{ Form::close() }}

@stop