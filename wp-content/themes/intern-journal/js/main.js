$(function() {
  const $asides = $('aside:not(.interviewer)');

  function placeAsideToTopOfPrevSibling(i, e) {
    $el = $(e);
    $el.addClass('aside__positioned');

    $prev = $el.prev('*:not(aside)');

    if (!$prev[0]) {
      return;
    }
    const prevOffsetTop = parseInt($prev.position().top, 10);
    const prevPaddingTop = parseInt($prev.css('paddingTop'), 10);
    $el.css('top', (prevOffsetTop + prevPaddingTop) + 'px');
  }

  function plaseAsides() {
    $asides.each(placeAsideToTopOfPrevSibling);
  }

  const ro = new ResizeObserver(plaseAsides);
  ro.observe(document.querySelector('.article, .block-article .column'));
});