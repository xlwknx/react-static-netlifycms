var slider = $('.home-slider').bxSlider({
	onSlideBefore: function onSlideBefore (el, prev, next) {
		$('.home-features-feature').removeClass('hide');
		$('.home-features .active').addClass('hide');
		$('.f' + next).addClass('hide');
		$('.f' + next + '.active').removeClass('hide');
	},

	onSliderLoad: function onSliderLoad () {
		$('.home-slider-slide:not(.bx-clone)').removeClass('hide');
	}
});

$('.home-features-feature').on('click', function () {
	slider.goToSlide($(this).data('index'));
});

var tabs = new CodeTabs('.code-tabs');
tabs.selectSection('php').selectTab('encrypt');

initTabs();
$('pre code').each(function(i, block) {
	hljs.highlightBlock(block);
});

function initTabs () {
	var tabLinks = $('[data-tab-show]');
	var tabContainers = $('[data-tab]');

	tabLinks.on('click', showTab);

	function showTab () {
		var $el = $(this);
		var tab = $el.data('tab-show');

		tabLinks.removeClass('active');
		$el.addClass('active');

		hide(tabContainers);
		show(tabContainers.filter('[data-tab=' + tab + ']'));
	}

	function show ($el) {
		$el.removeClass('hide');
	}

	function hide ($el) {
		$el.addClass('hide');
	}
}
