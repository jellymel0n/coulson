$('.grid').isotope({
  // options
  itemSelector: '.grid-item',
  layoutMode: 'fitRows'
});

// init Isotope
var $grid = $('.grid').isotope({
  // options
});
// filter items on button click
$('.filter-button-group').on( 'click', 'button', function() {
  var $this = $(this);
  $this.parents('.button-group').children().removeClass('active');
  $this.addClass('active');
  var filterValue = $(this).attr('data-filter');
  $grid.isotope({ filter: filterValue });
});

// var $container = $('#container');
// // init
// $container.isotope({
// // options
// itemSelector: '.archive-project-container',
// masonry: {
// columnWidth: 480,
// isFitWidth: true
// }
// });