import 'babel-core/external-helpers';
import $ from 'jquery';
window.jQuery = $;
window.$ = $;

import 'bootstrap-styl/js/affix';
//import 'bootstrap-styl/js/alert';
//import 'bootstrap-styl/js/button';
import 'bootstrap-styl/js/carousel';
import 'bootstrap-styl/js/collapse';
//import 'bootstrap-styl/js/dropdown';
//import 'bootstrap-styl/js/modal';
//import 'bootstrap-styl/js/tooltip';
//import 'bootstrap-styl/js/popover';
import 'bootstrap-styl/js/scrollspy';
//import 'bootstrap-styl/js/tab';
import 'bootstrap-styl/js/transition';

$(document).on('ready', () => {
  let $body = $(window.document.body);
  //let $win = $(window);
  //let $header = $body.find('header');
  //let scrolledHeaderClass = 'scrolled';
  let $affixDocsMenu = $('[data-ui="affix-docs"]');
  let $affixDocsMenuPlaceholder = $('[data-ui="menu-items-wrapper"]');
  let affixDocsMenuInitialWidth = $affixDocsMenu.css('width');
  let $affixDocsMenuTrigger = $('[data-ui="affix-docs-trigger"]');
  let extraTopOffset = 20;
  let scrollToTarget = (href = null) => {
    if (href) {
      let target = $(href);

      if (target.length > 0) {
        let targetOffsetTop = target.offset().top - extraTopOffset - 20;
        $('html, body').animate({ scrollTop: targetOffsetTop, easing: 'easeOutQuint' }, 500);
      } else {
        console.warn('The target menu item did not found, check your HTML structure.');
      }
    }
  };

  // find and crop menu from docs
  let $docMenu = $affixDocsMenuTrigger.find('ul').first();
  if ($docMenu.length > 0) {
    let $docMenuAppend = $docMenu.clone();
    $docMenu.addClass('col-xs-48 hidden-lg menu-doc');
    $affixDocsMenuPlaceholder.append($docMenuAppend.wrap('<div class="menu-items-wrapper"></div>').css('display', ''));
  }

  // fix initial width, when already affixed
  setTimeout(() => {
    if ($affixDocsMenu.hasClass('affix')) {
      $affixDocsMenu.removeClass('affix');

      // calculate the native width to use it when affixed
      setTimeout(() => {
        $affixDocsMenu.css({ width: affixDocsMenuInitialWidth = $affixDocsMenu.css('width') });
        $affixDocsMenu.addClass('affix');
      }, 0);
    }
  }, 0);

  $affixDocsMenu.affix({
    offset: {
      top: () => $affixDocsMenuTrigger.offset().top - extraTopOffset,
      bottom: parseInt($('footer').css('height')) + 55
    }
  });

  $affixDocsMenu.on('affix.bs.affix', () => {
    $affixDocsMenu.css({
      width: affixDocsMenuInitialWidth
    });
  });

  //$win.on('scroll', () => {
  //  if ($body.scrollTop() === 0) {
  //    $header.removeClass(scrolledHeaderClass);
  //  } else if (!$header.hasClass(scrolledHeaderClass)) {
  //    $header.addClass(scrolledHeaderClass);
  //  }
  //
  //  $affixDocsMenu.affix('checkPosition');
  //
  //  // cleanup width, when affix already removed
  //  if (!$affixDocsMenu.hasClass('affix')) {
  //    $affixDocsMenu.css({ width: '' });
  //  }
  //});

  // immediately navigate to location hash
  scrollToTarget(window.location.hash);

  // fix links for developers pages
  $('.docs-content a[href^="#"], .docs-menu a[href^="#"]').on('click', (e) => {
    e.preventDefault();
    scrollToTarget($(e.currentTarget).attr('href'));
  });

  // patch the scrollspy to support not modified github docs
  $.fn.scrollspy.Constructor.prototype.refresh = function() {
    this.selector = '.docs-menu a';
    var that = this;
    var offsetMethod = 'offset';
    var offsetBase = 0;

    this.offsets = [];
    this.targets = [];
    this.scrollHeight = this.getScrollHeight();

    if (!$.isWindow(this.$scrollElement[0])) {
      offsetMethod = 'position';
      offsetBase = this.$scrollElement.scrollTop();
    }

    this.$body
    .find(this.selector)
    .map(function() {
      var $el = $(this);
      var href = $el.data('target') || $el.attr('href');
      var $href = /^#./.test(href) && $('[id~="' + (href[0] === '#' ? href.replace('#', '') : href) + '"]');

      return ($href
        && $href.length
        && $href.is(':visible')
        && [[$href[offsetMethod]().top + offsetBase, href]]) || null
    })
    .sort(function(a, b) {
      return a[0] - b[0];
    })
    .each(function() {
      that.offsets.push(this[0]);
      that.targets.push(this[1]);
    })
  };

  setTimeout(() => {
    $(document.body).scrollspy({ target: '.docs-menu a', offset: 200 });
  }, 700);
});