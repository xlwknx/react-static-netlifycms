'use strict';

function initFAQ() {
  const questionList = $('[data-faq-question]');
  const answerList = $('[data-faq-answer]');

  questionList.click(function() {
    questionList.removeClass('active');
    answerList.removeClass('active');
    $(this).addClass('active');
  })
}

function init() {
  //initFAQ();
}

export default {
  init: init
}