'use strict';

import Tether from 'tether';

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
  const header = $('[data-vs-sticky-header]');

  if (header.length) {
    new Tether({
      element: header,
      target: 'body',
      attachment: 'top left',
      targetAttachment: 'top left',
      constraints: [
        {
          to: 'window',
          pin: true,
        }
      ],
      optimizations: {
        gpu: false
      }
    });
  }
}

function init() {
  initNavigation();
  initStickyHeader();
}

export default {
  init: init
}