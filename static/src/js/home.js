'use strict';

function initPageMsg() {
  const msgObj = {
    $target: $('[data-vs-pageMsg-target]'),
    $closeButton: $('[data-vs-pageMsg-close]'),
  };

  msgObj.$closeButton.click(closeMsg);

  function closeMsg() {
    msgObj.$target.toggleClass('collapsed');
  }
}

function init() {
  initPageMsg();
}

export default {
  init: init
}