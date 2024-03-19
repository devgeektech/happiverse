$(document).ready(function () {
  $(".post-slider, .post-single-slider").slick({
    dots: false,
    arrows: true,
    infinite: true,
    speed: 400,
    autoplaySpeed: 4000,
    slidesToShow: 1,
  });

  $(".story-slider").slick({
    dots: false,
    arrows: true,
    infinite: false,
    speed: 100,
    slidesToShow: 1,
    variableWidth: true,
    slickGoTo: 0,
  });

  $(".plans-slider-s1 ").slick({
    dots: true,
    arrows: false,
    autoplay: true,
    infinite: true,
    speed: 400,
    autoplaySpeed: 4000,
    slidesToShow: 3,
    slidesToScroll: 1,
    centerMode: true,
    centerPadding: "0px",
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          centerPadding: "40px"
        }
      }
    ]
  });
  $(".plans-slider-s2").slick({
    dots: true,
    arrows: false,
    autoplay: true,
    infinite: true,
    speed: 400,
    autoplaySpeed: 4000,
    slidesToShow: 1,
    slidesToScroll: 1,
    centerMode: true,
    centerPadding: "60px",
    // responsive: [
    //   {
    //     breakpoint: 991,
    //     settings: {
    //       slidesToShow: 2,
    //     }
    //   },
    //   {
    //     breakpoint: 576,
    //     settings: {
    //       slidesToShow: 1,
    //       centerPadding: "40px"
    //     }
    //   }
    // ]
  });  
  $(".stroy-main-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
  });
  $(".product-img-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: true,
  });

  $(".create-acc-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: true,
    autoplay: false,
    adaptiveHeight: true,
    infinite: false,
  });
});
