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

function init() {
  initNavigation();
}

export default {
  init: init
}