'use strict';

function initFAQ() {
  const $questions = $('[data-vs-faq-question]');
  const $answers = $('[data-vs-faq-answer]');
  const $answerList = $('[data-vs-faq-answerList]');
  const $header = $('[data-vs-sticky-header]');

  var $activeQuestion = $questions.first();
  var $activeAnswer = $answers.first();

  if ($answers.filter(location.hash).length) {
    $activeQuestion = getLinkByHash(location.hash);
    $activeAnswer = getTextByHash(location.hash);
  }

  updateActive($activeQuestion, $activeAnswer);

  // Events
  $(window).on('hashchange', function(event) {
    updateActive(getLinkByHash(location.hash), getTextByHash(location.hash));
  });

  // Helpers
  function updateActive($link, $text) {
    if ($link.length && $text.length) {
      resetActive();
      setActive($link, $text);
    }

    window.scrollTo(0, ($answerList.offset().top - $header.height()));
  }

  function resetActive() {
    $questions.removeClass('active');
    $answers.removeClass('active');
  }

  function setActive($link, $text) {
    $link.addClass('active');
    $text.addClass('active');
  }

  function getLinkByHash(hash) {
    return $questions.filter('[href$="' + hash + '"]');
  }

  function getTextByHash(hash) {
    return $answers.filter(hash);
  }
}

function init() {
  initFAQ();
}

export default {
  init: init
}