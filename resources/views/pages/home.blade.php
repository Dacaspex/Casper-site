@extends('layouts.main')

@section('css')
	<link rel="stylesheet" type="text/css" href="css/home.css">
@endsection

@section('content')

<!-- Welcome jumbotron -->
<div class="jumbotron">
	<canvas id="canvas"></canvas>
	<div class="wrapper">
		<div id="welcome-title">
			<div id="welcome-title-name">
				Hi, my name is <strong>Casper</strong>
			</div>
			<div id="welcome-title-sub">
				A programmer hobbyist, techincal computer science student
			</div>
		</div>
	</div>
</div>

<!-- Main content of home page -->
<div class="wrapper">
	<div class="row">
		<div class="post-column">
			@foreach ($posts as $post)
				<div class="post">
					<h2>
						<a class="post-link" href="/post/{{ $post->id }}">{{ $post->title }}</a>
					</h2>
					<h6 class="timestamp">
						{{ $post->created_at }}
					</h6>
					<span class="post-description">
						{{ $post->description }}
					</span>
				</div>
			@endforeach
		</div>
		<div class="sidebar">
			<div class="sidebar-about">
				<p>
					My name is Casper Smits. I'm currently studying Technical Computer Science at the university of Eindhoven. I work on various software projects in my spare time.
				</p>
				<hr />
			</div>
		</div>
	</div>
</div>

@endsection

@section('javascript')
<script src="{{ asset('js/jumbotron.js') }}"></script>
@endsection
