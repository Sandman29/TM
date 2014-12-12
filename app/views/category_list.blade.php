@extends('_master')

@section('title')
	All Tasks
@stop

@section('content')
	<h1>All Categories</h1>



	

	@foreach($categories as $category)
		<section class='task'>
			<h2>{{ $category['id'] }} {{ $category['name'] }}</h2>
		</section>
	@endforeach

@stop