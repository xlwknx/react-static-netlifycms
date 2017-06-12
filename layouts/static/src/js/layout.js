'use strict';

function initNavigation() {
  const openButton = $('[data-vs-sideNav-open]');
  const closeButton = $('[data-vs-sideNav-close]');
  const target = $('[data-vs-sideNav-target]');
  const overlay = $('[data-vs-sideNav-overlay]');
  const body = $('body');

  openButton.click(openNav);
  closeButton.click(closeNav);
  overlay.click(closeNav);

  function openNav() {
    body.css('overflow', 'hidden');
    overlay.toggleClass('expanded');
    target.toggleClass('expanded');
  }

  function closeNav() {
    body.css('overflow', '');
    target.toggleClass('expanded');
    overlay.toggleClass('expanded');
  }
}

function init() {
  initNavigation();
}

export default {
  init: init
}