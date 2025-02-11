(function($){ 
  setTimeout(function() {
    $('.js-comEvSlider').slick({ //{}を入れる
      autoplay: true, //「オプション名: 値」の形式で書く
      dots:true, //複数書く場合は「,」でつなぐ
      slidesToShow:1,
      arrows:false,
      autoplaySpeed: 3000,
      pauseOnHover:false,
      dots:true,
      fade:true,
    });
  }, 2000); 
})(jQuery);