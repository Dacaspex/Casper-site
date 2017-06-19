@extends('layouts.main')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
@endsection

@section('content')

<!-- Main content of home page -->
<div class="wrapper">
	<div class="login-form">
		<h2>Login</h2>
		<form action="/login" method="post">
			{{ csrf_field() }}
			<input type="text" name="name" placeholder="Name" />
			<input type="password" name="password" placeholder="Password" />
			<input type="submit" name="submit" value="Login" class="btm btn-success">
		</form>
	</div>
</div>

@endsection
