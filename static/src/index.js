'use strict';

import 'vanilla-tilt';

import Layout from 'js/layout';
import Home from 'js/home';
import Features from 'js/features';
import Articles from 'js/blog/articles';
import Chat from 'js/chat';

$(document).ready(function () {
  const pageName = $('[data-vs-page]').data('vs-page');

  Layout.init();

  switch (pageName) {
    case 'home':
      Home.init();
      break;

    case 'features':
      Features.init();
      break;

    case 'articles':
      Articles.init();
      break;

    case 'chat':
      Chat.init();
  }
});



