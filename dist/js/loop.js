(function($){ 
  $('.js-houseSlider').slick({ //{}を入れる
    infinite: true,
    slidesToShow: 4,
    centerMode: true,   
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed:0, 
    speed:5000,
    cssEase: 'linear', 
    pauseOnHover: false,
    arrows:false,
    dots:false,
    responsive: [
      {
          breakpoint: 1400,
          settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              
          }
      },
      {
        breakpoint:768,
        settings: {
            slidesToShow:2,
            slidesToScroll: 3,
            infinite: true,
        }
      },
      {
        breakpoint:400,
        settings: {
            slidesToShow:1,
            slidesToScroll: 3,
            infinite: true,
        }
      },
    ]
  });

//kengakucroudからのデータにslickを付与するため遅らせないとslickが動作しない
setTimeout(function(){
  $('.js-topEventSlider').slick({ //{}を入れる
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 3,
    centerMode: true,   
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed:0, 
    speed:5000,
    cssEase: 'linear', 
    pauseOnHover: true,
    arrows:false,
    dots:false,
    responsive: [
      {
          breakpoint: 1400,
          settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              
          }
      },
      {
        breakpoint:768,
        settings: {
            slidesToShow:2,
            slidesToScroll: 3,
            infinite: true,
        }
      },
      {
        breakpoint:400,
        settings: {
            slidesToShow:1,
            slidesToScroll: 3,
            infinite: true,
        }
      },
    ]
  });
  $('.index-page__events-event').css({
    'background': '#fff',
  });
  $('#content .slick-slide').css({
    'margin-left':'3%'
  });
},2000);


  
})(jQuery);