@extends('_master')

@section('title')
	All Tasks
@stop

@section('content')
	<h1>All Items</h1>



	

	@foreach($items as $item)
		<section class='task'>
			<h2>{{ $item['id'] }} {{ $item['task'] }}</h2>
			
			Due Date: {{ $item['due_date'] }} Completion Date: {{$item['completion_date']}} 
			@if ($item['is_completed'] == '1')
				*Completed*
			@else
				*Not Completed*
			@endif
			<p>
				<a href='/book/edit/{{$item['id']}}'>Edit</a>
				<a href='/book/delete/{{$item['id']}}'>Delete</a>
			</p>
		</section>
	@endforeach

@stop