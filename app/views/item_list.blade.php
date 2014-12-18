@extends('_master')

@section('title')
	{{$title['name']}}
@stop

@section('content')
	<h1>{{$title['name']}} </h1>



	

	@foreach($items as $item)
		<section class='task'>
			<h2>{{ $item['task'] }}</h2>
			
			Due Date: {{ $item['due_date'] }} Completion Date: {{$item['completion_date']}} 
			@if ($item['is_completed'] == '1')
				*Completed*
			@else
				*Not Completed*
			@endif
			<p>
				<a href='/task/edit/{{$item['id']}}'>Edit</a>
				<a href='/task/delete/{{$item['id']}}'>Delete</a>
				@if ($item['is_completed'] != '1')
					<br/>
					<a href='/task/completed/{{$item['id']}}'>Mark as Completed</a>
				@endif
			</p>
		</section>
	@endforeach

@stop