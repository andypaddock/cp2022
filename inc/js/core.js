//@prepros-prepend mixitup.min.js
//@prepros-prepend mixitup-pagination.js
//@prepros-prepend jquery.magnific-popup.js
//@prepros-prepend slick.min.js
//@prepros-prepend readmore.js
//@prepros-prepend scrollreveal.js

jQuery(document).ready(function($) {

 /* ADD CLASS ON SCROLL*/

 $(window).scroll(function() {
  var scroll = $(window).scrollTop();

  if (scroll >= 100) {
    $("body").addClass("scrolled");
  } else {
    $("body").removeClass("scrolled");
  }
});

// ========== Controller for lightbox elements

$('.parent').magnificPopup({
  delegate: 'a.lightbox-gallery',
  type: 'image',
  gallery: {
    enabled: true
  }
});


/* TABBED CONTENT */

$(document).ready(function () {
  if ($('.tabbed-section').length) {
    $(".tabbed-section__head--tab:nth-child(1)").addClass("active");
    $(".tabbed-section__body--item:nth-child(1)").addClass("visible");
  }
});

$(".tabbed-section__head--tab").click(function (e) {
  var selectedTab = $(this).attr("data-tab");
  $(".tabbed-section__head--tab.active").removeClass('active');
  $(this).addClass('active');
  $(".tabbed-section__body--item.visible").removeClass('visible');
  $(".tabbed-section__body--item." + selectedTab).addClass('visible');
});

// ============ Carousels
 
// $(".testimonial-carousel").owlCarousel({
//   loop:true,
//   margin:48,
//   center:true,
//   nav:true,
//   dots:false,
//   items:1,
//   autoplay:true,
//     autoplayTimeout:6000,
//     autoplayHoverPause:true,
// });

// $(".fadeOut").owlCarousel({
//   loop:true,
//   margin:48,
//   center:true,
//   nav:false,
//   dots:false,
//   items:1,
//   animateOut: 'fadeOut',
//   autoplay:true,
//     autoplayTimeout:4000,
//     autoplayHoverPause:true,
// });

// $(".large-advert").owlCarousel({
//   loop:true,
//   margin:48,
//   center:true,
//   nav:false,
//   dots:false,
//   video:true,
//   items:1,
//   autoplay:true,
//     autoplayTimeout:6000,
//     autoplayHoverPause:true,
// });


new Readmore('article', {
  speed: 150,
  collapsedHeight: 105,
});



// SIDEBAR MOBILEMENU

$(document).ready(function() {

  function toggleSidebar() {
    $(".navbutton").toggleClass("active");
    $("main").toggleClass("move-to-left");
    $(".sidebar-item").toggleClass("active");
  }

  $(".navbutton").on("click tap", function() {
    toggleSidebar();
  });

  // $(document).keyup(function(e) {
  //   if (e.keyCode === 27) {
  //     toggleSidebar();
  //   }
  // });

});






// ACCORDIAN SINGLE ITEM ONLY

$(document).ready(function() {
  $('.block__title').click(function(event) {
    $(this).toggleClass('active').next().slideToggle(300);
      if($('.block__title').hasClass('one')){
          $('.block__title').not($(this)).removeClass('active');
          $('.block__text').not($(this).next()).slideUp(300);
      }
      
  });

});

// $(document).ready(function(){
//   $('.block__title').click(function() {
//       $(this).next().toggle('slow');
//       return false;
//   }).next().hide();
// });





const sections = document.querySelectorAll('.onview');

// Using Intersection Observer ↓

const observerConfig = {
  root: null,
  rootMargin: '600px 0px 0px',
  threshold: 0.1
};

const observer = new IntersectionObserver((entries, observer) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
    } else {
      entry.target.classList.remove('visible');
    }
  });
}, observerConfig);

sections.forEach(section => {
  observer.observe(section);
});

var containerEl = document.querySelector('.filter-grid');
var mixer;

if (containerEl) {
    mixer = mixitup(containerEl, {
         
    });
}


$(".pop-link").click(function(){
  var id = $(this).attr('id');
  $('.' + id)[0].play();
});



$(".popup__close").click(function(){
  var id = $(this).attr('id');
  $('.' + id)[0].pause();
});

var slideLeft = {
  distance: '40px',
  origin: 'left',
  opacity: 0.0,
reset:true,
duration: 1000,
delay:250,
mobile:false,
};
var slideRight = {
  distance: '40px',
  origin: 'right',
  opacity: 0.0,
reset:true,
duration: 1000,
mobile:false,
};
var slideDown = {
  distance: '40px',
  origin: 'top',
  opacity: 0.0,
reset:true,
duration: 1000,
mobile:false,
};
var slideUp = {
  distance: '40px',
  origin: 'bottom',
  opacity: 0.0,
reset:true,
duration: 1000,
mobile:false,
};
var tileDown = {
  distance: '40px',
  origin: 'top',
  opacity: 0.0,
reset:true,
duration: 1000,
mobile:false,
interval:40,
};

ScrollReveal().reveal('.fmleft', slideLeft);
ScrollReveal().reveal('.fmtop', slideDown);
ScrollReveal().reveal('.fmbottom', slideUp);
ScrollReveal().reveal('.fmright', slideRight);
ScrollReveal().reveal('.tile', tileDown);


var vid = document.getElementById("advertvideo");
function playVid() {vid.play();}
function pauseVid() {vid.pause();}

ScrollReveal().reveal('video', {
  beforeReveal: playVid ,
  beforeReset: pauseVid,
  reset: true,
  mobile:false,
});


$(document).ready(function() {

  var Mwidth = 960; // mobile devices
  if ($(window).width() > Mwidth) {
      var headerHeight = $('.top-navbar').height();
      $(window).on('scroll', {
              TopPrev: 0
          },
          function() {
              var TopCurrent = $(window).scrollTop();
              //check if user is scroll up
              if (TopCurrent < this.TopPrev) {
                  //if scroll up
                  if (TopCurrent > 0 && $('.top-navbar').hasClass('fixed-menu')) {
                      $('.top-navbar').addClass('visible-scroll-up');
                  } else {
                      $('.top-navbar').removeClass('visible-scroll-up fixed-menu');
                  }
              } else {
                  //if scroll down
                  $('.top-navbar').removeClass('visible-scroll-up');
                  if (TopCurrent > headerHeight && !$('.top-navbar').hasClass('fixed-menu')) $('.top-navbar').addClass('fixed-menu');
              }
              this.TopPrev = TopCurrent;
          });
  }
});

// SLICK SLIDER

$('.single-slider--blocks').slick();

$('.experience-blocks').slick();

$('.triple-blocks').slick({
  centerMode: true,
  centerPadding: '200px',
  slidesToShow: 1,
  arrows: false,
  focusOnSelect: true,
});





}); //Don't remove ---- end of jQuery wrapper




// var mixer = mixitup('.filter-grid');