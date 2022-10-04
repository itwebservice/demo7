$(document).ready(function () {
  //TOP SEARCH BAR
  $(".header-search-box").on("click", function () {
    $(".header-search-body").addClass("header-select-show");
  });

  //TOP SEARCH BAR REMOVE
  $(".header-search-select").mouseleave(function () {
    $(".header-search-body.header-select-show").removeClass(
      "header-select-show"
    );
  });

  // TOP SEARCH BOX ADD
  $(".header-sidebar span").on("click", function () {
    $(".header-search-content").addClass("header-search-bar-show");
  });

  // TOP SEARCH BOX REMOVE
  $(".header-search-content span").on("click", function () {
    $(".header-search-content").removeClass("header-search-bar-show");
  });

  //SIDE BAR
  $(".header-sidebar i").on("click", function () {
    $(".sidebar-content").addClass("sidebar-show");
  });

  //SIDE BAR REMOVE
  $(".header-search-close i").on("click", function () {
    $(".sidebar-content").removeClass("sidebar-show");
  });
  AOS.init();

  //ALL SECTION TITLE COMM-ANIMATION
  $(".comm-tit-ani").each(function () {
    var _tit1 = $(this).offset().top + $(this).outerHeight() - 50;
    var _titcom = $(window).scrollTop() + $(window).height();
    if (_titcom >= _tit1) {
      $(this).addClass("ani-tit");
    }
  });
  $(".destination-slider").slick({
    slidesToShow: 2,
    slidesToScroll: 2,
    infinite: true,
    speed: 1000,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
  $(".testimonials-slider").slick({
    slidesToShow: 2,
    slidesToScroll: 2,
    infinite: true,
    speed: 1000,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
  $(".tourism-card-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    speed: 1000,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  $(".home-landing-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    speed: 1000,
    autoplay: true,
    autoplaySpeed: 2000,
    arrows: false,
    responsive: [
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  $('button[data-toggle="tab"]').on("click", function () {
    $(".tourism-card-slider").slick("setPosition");
  });

  //RESPONSIVE MENU BUTTON
  $(".left-menu i").on("click", function () {
    $(".left-menu-content").toggleClass("menuact");
  });

  //ADD SUB MENU & REMOVE
  $(".left-menu-item .left-menu-link-arrow").on("click", function () {
    $(".left-menu-submenu").toggleClass("left-submenu-show");
  });

  //ON WINDOW SCROOL FUNCTION
  $(window).on("scroll", function () {
    //COMMON VARIABLE FOR WINDOW SCROLL
    var _topval = $(window).scrollTop();

    //MENU FIXED ACTIVE

    if (_topval >= 150) {
      $(".header").addClass("header-sticy");
    } else {
      $(".header").removeClass("header-sticy");
    }
  });
});
