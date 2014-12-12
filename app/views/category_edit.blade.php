@extends('_master')

@section('title')
	Edit
@stop

@section('head')

@stop

@section('content')

	<h1>Edit</h1>
	<h2>{{{ $category['name'] }}}</h2>

	{{---- EDIT -----}}
	{{ Form::open(array('url' => '/category/edit')) }}

		{{ Form::hidden('id',$category['id']); }}

		<div class='form-group'>
			{{ Form::label('name','Name') }}
			{{ Form::text('name',$category['name']); }}
		</div>

		{{ Form::submit('Save'); }}

	{{ Form::close() }}



@stop