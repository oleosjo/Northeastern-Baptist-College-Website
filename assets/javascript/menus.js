$(function() {

  $('.student-portal-button').on('click', function() {
    if ($('#wrapper').hasClass('show-student-portal')) {
      $('#wrapper').removeClass('show-student-portal');
      $('.student-portal-button').css('opacity', '1');

    } else {
      $('#wrapper').addClass('show-student-portal');
      $('.student-portal-button').css('opacity', '0.5');

    }
  });

  // $('#site-navigation > .menu-item').on('click', function(el) {
  //   el.addClass('menu-active');
  // });

  // if (localStorage.getItem('didMapAnimation')) {
  //   var element = document.getElementById("footer-map");
  //   element.setAttribute("class", "map-animation-finished");

  //     $('#footer-map').on('click', function() {
  //       var element = document.getElementById("footer-map");
  //       element.setAttribute("class", "");
  //       setTimeout(function() {
  //           element.setAttribute("class", "map-animation");
  //       }, 10);
  //     });
  // }

  // else {
  //     $('#footer-map').on('mouseover', function() {
  //       var element = document.getElementById("footer-map");
  //       element.setAttribute("class", "map-animation");

  //       localStorage.setItem('didMapAnimation', true);
  //     });
  // }

  $grid = $('.faculty-staff-boxes');

  $grid.isotope({
    itemSelector: '.contact-box',
    layoutMode: 'fitRows',
      getSortData: {
      name: '.name',
      order: '[data-order]'
    },
  });

  $('.filter-button-group').on( 'click', 'button', function() {

    $('.filter-button-group button').css('font-weight', 'normal');

    var filterValue = $(this).attr('data-filter');
    $(this).css('font-weight', 'bold');
    $grid.isotope({ filter: filterValue });
  });

  $grid.isotope({ sortBy: 'order' });

  $('#filter-faculty-staff').on('keyup', function() {
    console.log($('#filter-faculty-staff').val());
    var input = $('#filter-faculty-staff').val();
    $grid.isotope({ filter: function() {
        var name = $(this).find('.name').text();
        var re = new RegExp('.*' + input + '.*', "gi");
        return name.match(re);
      }  });
  });

});

