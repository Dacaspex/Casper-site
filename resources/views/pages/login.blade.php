@extends('layouts.main')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
@endsection

@section('content')

<!-- Main content of home page -->
<div class="wrapper">
	<div class="login-form">
		<legend>Login</legend>
		{{ Form::open('login') }}
		{{ Form::text('username', '', array('placeholder' => 'Username')) }}
		{{ Form::password('password', '', array('placeholder' => 'password')) }}
		{{ Form::submit('Login') }}
		{{ Form::close() }}
	</div>
</div>

@endsection
