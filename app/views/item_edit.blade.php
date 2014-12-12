@extends('_master')

@section('title')
	Edit
@stop

@section('head')

@stop

@section('content')

	<h1>Edit</h1>
	<h2>{{{ $item['task'] }}}</h2>

	{{---- EDIT -----}}
	{{ Form::open(array('url' => '/task/edit')) }}

		{{ Form::hidden('id',$item['id']); }}

		<div class='form-group'>
			{{ Form::label('task','Task') }}
			{{ Form::text('task',$item['task']); }}
		</div>

		
		<div class='form-group'>
			{{ Form::label('due_date','Due Date (mm/dd/yy)') }}
			{{ Form::text('due_date',$item['due_date']); }}
		</div>


		{{ Form::submit('Save'); }}

	{{ Form::close() }}



@stop