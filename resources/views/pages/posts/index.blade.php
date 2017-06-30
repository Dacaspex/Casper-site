@extends('layouts.main')

@section('css')
	<link rel="stylesheet" type="text/css" href="css/posts.css">
@endsection

@section('content')
<div class="wrapper">
    @include('includes.postsIndex')
</div>
@endsection
