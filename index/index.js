$(document).on('ready', function () {
	$(".lazy").slick({
		lazyLoad: 'ondemand',
		infinite: true,
		accessibility: true,
		autoplay: true,
		autoplaySpeed: 2500,
		speed: 1000,
		pauseOnHover: true,
		arrows: true,
		responsiveTo: 'window'
	});
});
