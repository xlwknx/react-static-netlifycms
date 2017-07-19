'use strict';

import Tilt from 'vanilla-tilt';

import Layout from 'js/layout';
import Features from 'js/features';
import Articles from 'js/blog/articles';

$(document).ready(function () {
    const pageName = $('[data-vs-page]').data('vs-page');

    Layout.init();

    switch (pageName) {
        case 'features':
            Features.init();
            break;

        case 'articles':
            Articles.init();
            break;
    }
});



