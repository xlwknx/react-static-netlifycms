'use strict';

function initFAQ() {
  const $questionList = $('[data-faq-question]');
  const $answerList = $('[data-faq-answer]');

  var $activeQuestion = $questionList.first();
  var $activeAnswer = $answerList.first();

  if ($answerList.filter(location.hash).length) {
    $activeQuestion = getLinkByHash(location.hash);
    $activeAnswer = getTextByHash(location.hash);
  }

  updateActive($activeQuestion, $activeAnswer);

  // Events
  $(window).on('hashchange', function(event) {
    //event.preventDefault();
    updateActive(getLinkByHash(location.hash), getTextByHash(location.hash));
  });

  // Helpers
  function updateActive($link, $text) {
    if ($link.length && $text.length) {
      resetActive();
      setActive($link, $text);

      //window.scrollTo(0, $text.offset().top);
    }
  }

  function resetActive() {
    $questionList.removeClass('active');
    $answerList.removeClass('active');
  }

  function setActive($link, $text) {
    $link.addClass('active');
    $text.addClass('active');
  }

  function getLinkByHash(hash) {
    return $questionList.filter('[href$="' + hash + '"]');
  }

  function getTextByHash(hash) {
    return $answerList.filter(hash);
  }
}

function init() {
  initFAQ();
}

export default {
  init: init
}