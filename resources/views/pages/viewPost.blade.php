@extends('layouts.main')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/viewPost.css') }}">
@endsection

@section('content')

<!-- Main content of home page -->
<div class="wrapper">
	<h1>{{ $post->title }}</h1>
</div>

@endsection