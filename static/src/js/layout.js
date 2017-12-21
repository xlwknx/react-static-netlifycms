'use strict';

function initNavigation() {
  const navObj = {
    $openButton: $('[data-vs-sideNav-open]'),
    $closeButton: $('[data-vs-sideNav-close]'),
    $target: $('[data-vs-sideNav-target]'),
    $overlay: $('[data-vs-sideNav-overlay]'),
    $body: $('body')
  };

  navObj.$openButton.click(openNav);
  navObj.$closeButton.click(closeNav);
  navObj.$overlay.click(closeNav);

  function openNav() {
    navObj.$body.css('overflow', 'hidden');
    navObj.$overlay.toggleClass('expanded');
    navObj.$target.toggleClass('expanded');
  }

  function closeNav() {
    navObj.$body.css('overflow', '');
    navObj.$target.toggleClass('expanded');
    navObj.$overlay.toggleClass('expanded');
  }
}

function initStickyHeader() {
  const $header = $('[data-vs-sticky-header]');
  const position = $header.height() + 100;

  _initSticky($header, position);
}

function initStickyScrollToTop() {
  const $scrollToTopBtn = $('[data-vs-sticky-scrollToTop]');
  const position = $(document).height() / 10;

  $scrollToTopBtn.on('click', scrollToTop);
  _initSticky($scrollToTopBtn, position);

  function scrollToTop(event) {
    $(event.target).removeClass('pinned');
    $('html, body').animate({scrollTop: 0}, 'fast');
  }
}

function _initSticky($elem, position) {
  toggle($elem, position);
  $(window).on('scroll', toggle.bind(null, $elem, position));

  function toggle($elem, position) {
    const windowTop = $('body').scrollTop();

    if (windowTop >= position) {
      $elem.addClass('pinned');
    } else {
      $elem.removeClass('pinned');
    }
  }
}

function init() {
  initNavigation();
  initStickyHeader();
  initStickyScrollToTop();
}

export default {
  init: init
}