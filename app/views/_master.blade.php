<!DOCTYPE html>
<html>
<head>

	<title>@yield('title','Task Manager')</title>
	<meta charset='utf-8'>
	<link href="/main.css" rel="stylesheet" type="text/css">


	@yield('head')


</head>
<body>
	<div class="container">
	<h1>Task Manager</h1>

	@if(Session::get('flash_message'))
		<div class='flash-message'>{{ Session::get('flash_message') }}</div>
	@endif

	<nav>
		<ul>
		@if(Auth::check())
			<li><a href='/logout'>Log out {{ Auth::user()->email; }}</a></li>
			<br/>
			<li><a href='/task'>All Tasks</a></li>
			<ul>
				<li><a href='/task/completed-task'>Completed Tasks</a></li>
				<li><a href='/task/not-completed-tasks'>Not Completed Tasks</a></li>
			</ul>
			<li><a href='/category'>All Categories</a></li>
			<li><a href='/task/create'>+ Add Task</a></li>
			<li><a href='/category/create'>+ Add Category</a></li>
		@else
			<li><a href='/signup'>Sign up</a> or <a href='/login'>Log in</a></li>
		@endif
		</ul>
	</nav>

	<a href='https://github.com/Sandman29/TM'>View on Github</a>

	@yield('content')


	</div>
</body>
</html>
