$("#slideshow > div:gt(0)").hide();

setInterval(function() {
  $('#slideshow > div:first')
    .fadeOut(900)
    .next()
    .fadeIn(900)
    .end()
    .appendTo('#slideshow');
}, 3000);