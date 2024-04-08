/**
  * Theme Js file.
**/

// ===== Mobile responsive Menu ====

function ngo_organization_menu_open_nav() {
  jQuery(".sidenav").addClass('open');
}
function ngo_organization_menu_close_nav() {
  jQuery(".sidenav").removeClass('open');
}

// ===== Scroll to Top ====

jQuery(function($){
  $(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {
      $('#return-to-top').fadeIn(200);
    } else {
      $('#return-to-top').fadeOut(200);
    }
  });
  $('#return-to-top').click(function() {
    $('body,html').animate({
      scrollTop : 0
    }, 500);
  });
});

function ngo_organization_text_copyied() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}

// ===== Slider ====

jQuery('document').ready(function(){
  var owl = jQuery('#online-courses .owl-carousel');
    owl.owlCarousel({
    margin:20,
    nav: false,
    autoplay : true,
    lazyLoad: true,
    autoplayTimeout: 3000,
    loop: false,
    dots:true,
    navText : ['<i class="fa fa-chevron-left py-4 p-3" aria-hidden="true"></i>','<i class="fa fa-chevron-right py-4 p-3" aria-hidden="true"></i>'],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 4
      }
    },
    autoplayHoverPause : true,
    mouseDrag: true
  });
});

jQuery(function($){
  $(window).load(function() {
    $(".loader").delay(2000).fadeOut("slow");
  })
});

jQuery(window).scroll(function() {
  var data_sticky = jQuery('.menubar').attr('data-sticky');

  if (data_sticky == "true") {
    if (jQuery(this).scrollTop() > 1){
      jQuery('.menubar').addClass("stick_head");
    } else {
      jQuery('.menubar').removeClass("stick_head");
    }
  }
});
