var slider = $('.home-slider').bxSlider({
	onSlideBefore: function onSlideBefore (el, prev, next) {
		$('.home-features-feature').removeClass('hide');
		$('.home-features .active').addClass('hide');
		$('.f' + next).addClass('hide');
		$('.f' + next + '.active').removeClass('hide');
	}
});

$('.home-features-feature').on('click', function () {
	slider.goToSlide($(this).data('index'));
});
