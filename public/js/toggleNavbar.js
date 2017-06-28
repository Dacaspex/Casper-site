var breakPointValue = 600;

/**
* This function toggles the navigation menu for mobile devices when the hamburger icon
* has been clicked. This is only when the screen is smaller than the breakPointValue.
*/
function toggleMobileNavigation() {

	if ($(window).width() < breakPointValue) {
		if ($('.mobile-nav-icon').attr('toggled') === 'false') {
			$('.mobile-nav-icon').attr('toggled', 'true');
			$('.navbar').css('display', 'block');
		} else {
			$('.mobile-nav-icon').attr('toggled', 'false');
			$('.navbar').css('display', 'none');
		}
	}

}
