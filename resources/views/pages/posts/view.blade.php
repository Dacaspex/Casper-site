@extends('layouts.main')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/viewPost.css') }}">
@endsection

@section('content')

<!-- Main content of home page -->
<div class="wrapper">
	<div class="row">
		<div class="post-column">
			<h1>{{ $post->title }}</h1>
			<h6>{{ $post->created_at }}</h6>
			<p>
				{!! nl2br(e($post->body)) !!}
			</p>
		</div>
	</div>
</div>

@endsection
