/*global $, dotclear */
'use strict';

$(document).ready(function () {
  const bigfoot_data = dotclear.getData('bigfoot');
  let bigfoot_options = {
    anchorPattern: /(fn|footnote|note|wiki-footnote)[:\-_\d]/gi,
    footnoteTagname: 'p, li',
    numberResetSelector: '.post',
    scope: '.post',
  };
  if (bigfoot_data.style == 'bottom') {
    bigfoot_options.positionContent = false;
  }
  if (bigfoot_data.hover) {
    bigfoot_options.activateOnHover = true;
    bigfoot_options.deleteOnUnhover = true;
    bigfoot_options.hoverDelay = 500;
  }
  $.bigfoot(bigfoot_options);
});
