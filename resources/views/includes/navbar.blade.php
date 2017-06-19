<!-- Navbar snippet to be included on every page-->
<div class="head">
	<nav>
		<a href="/" class="brand">
			<span>Casper</span>
			@if (Auth::check())
				<span class="text-success">: logged in</span>
			@endif
		</a>
		<ul class="navbar">
			<li><a href="/">Home</a></li>
			<li><a href="#">Blog</a></li>
			<li><a href="#">Contact</a></li>
			@if (Auth::check())
				<li><a href="/logout">Logout</a></li>
			@endif
		</ul>
		<a href="javascript:void(0)" onclick="toggleMobileNavigation()" class="mobile-nav-icon" toggled="false"><i class="fa fa-bars fa-lg"></i></a>
	</nav>
</div>
