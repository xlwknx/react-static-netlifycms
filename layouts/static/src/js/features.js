'use strict';

function initFAQ() {
  const questionList = $('[data-faq-question]');
  const answerList = $('[data-faq-answer]');

  var activeQuestion = questionList.first();

  if (answerList.filter(document.location.hash).length) {
    activeQuestion = questionList.filter('[href$="' + document.location.hash + '"]');
  }

  reset();
  set(activeQuestion);

  // Events
  // $(window).on('hashchange', function() {
  //
  // });

  questionList.click(function() {
    const question = $(this);

    reset();
    set(question);
  });

  // Helpers
  function reset() {
    questionList.removeClass('active');
    answerList.removeClass('active');
  }

  function set(question) {
    question.addClass('active');
    $(question.attr('href')).addClass('active');
  }
}

function init() {
  initFAQ();
}

export default {
  init: init
}