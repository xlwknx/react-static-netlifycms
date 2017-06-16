'use strict';

import Tilt from 'vanilla-tilt';

import Layout from 'js/layout';
import Features from 'js/features';

$(document).ready(function () {
  const pageName = $('[data-vs-page]').data('vs-page');

  Layout.init();

  switch (pageName) {
    case 'features':
      Features.init();
      break;
  }
});



