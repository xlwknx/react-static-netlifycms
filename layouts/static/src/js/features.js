'use strict';

function initFAQ() {
  const $items = $('[data-vs-faq-item]');
  const $links = $('[data-vs-faq-link]');
  const $header = $('[data-vs-sticky-header]');

  initActive(getItemByHash());

  $(window).on('hashchange', function(event) {
    initActive(getItemByHash());
  });

  $links.on('click', function(event) {
    event.preventDefault();

    const $link = $(event.currentTarget);
    const $item = $link.parents('[data-vs-faq-item]');
    const hash = $link.attr('data-vs-faq-link');

    if (location.hash === hash) {
      toggleActive($item);
    } else {
      location.hash = hash;
    }
  });

  function setActive($item) {
    $item.length && $item.addClass('active');
  }

  function toggleActive($item) {
    $item.length && $item.toggleClass('active');
  }

  function scrollTo($item) {
    $item.length && $('html, body').animate({scrollTop: ($item.offset().top - $header.height())}, 'fast');
  }

  function getItemByHash() {
    return $items.has('[data-vs-faq-link$="' + location.hash + '"]');
  }

  function initActive($item) {
    setActive($item);
    scrollTo($item);
  }
}

function init() {
  initFAQ();
}

export default {
  init: init
}