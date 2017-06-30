@extends('layouts.main')

@section('css')
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<link rel="stylesheet" type="text/css" href="css/posts.css">
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
				A programmer hobbyist, Technical Computer Science student
			</div>
		</div>
	</div>
</div>

<!-- Main content of home page -->
<div class="wrapper">
	<div class="grid-container">
		<div class="row">
			@include('includes.postsIndex')
			<div class="col-2">
				<div class="sidebar-about">
					<p>
						My name is Casper Smits. I'm currently studying Technical Computer Science at the university of Eindhoven. I work on various software projects in my spare time.
					</p>
					<hr />
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('javascript')
<script src="{{ asset('js/jumbotron.js') }}"></script>
@endsection
