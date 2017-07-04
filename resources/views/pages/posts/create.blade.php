@extends('layouts.main')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/createPost.css') }}">
@endsection

@section('content')
<!-- Main content of home page -->
<div class="wrapper">
	<div class="row">

		<!-- TODO: Replace class name -->
		<div class="post-column">

			<!-- Show errors if present -->
			@if (count($errors) > 0)
				@foreach ($errors->all() as $error)
					<div class="alert">
						{{ $error }}
					</div>
				@endforeach
			@endif

			<!-- Create post form -->
			<form action="/posts" method="post">
				{{ csrf_field() }}
				<input type="text" name="title" value="" placeholder="Title" required/>
				<input type="text" name="description" value="" placeholder="Description" required/>
				<textarea name="body" rows="8" cols="80" placeholder="Body"></textarea>
				<input type="submit" name="submit" value="Publish" class="btn btn-success" />
			</form>
		</div>
	</div>
</div>
@endsection

@section('javascript')
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=h2tytkrqo6rot015o1rssrr3xfr82gbtnqpwr47pwyu75r8b"></script>
	<script>tinymce.init({ selector:'textarea' });</script>
@endsection
