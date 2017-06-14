<!DOCTYPE html>
<html>
	<head>
		<title>Casper</title>

		<!-- Meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/override.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/navbar.css') }}">

		<!-- Get page specific CSS -->
		@yield('css')

		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">

	</head>
	<body>

		<!-- Navbar -->
		@include('includes.navbar')

		<!-- Main content of the page -->
		@yield('content')

	</body>

	<!-- JavaScript files -->
	<script src="{{ asset('js/toggleNavbar.js') }}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
</html>