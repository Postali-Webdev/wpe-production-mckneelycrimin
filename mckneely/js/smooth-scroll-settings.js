// Caroufredsel code
	jQuery(document).ready(function() {

smoothScroll.init({
	selector: '[data-scroll]',
	selectorHeader: null, // Selector for fixed headers (must be a valid CSS selector) [optional]
	speed: 800, // Integer. How fast to complete the scroll in milliseconds
	easing: 'easeInOutCubic', // Easing pattern to use
	offset: 100, // Integer. How far to offset the scrolling anchor location in pixels
});
	
});