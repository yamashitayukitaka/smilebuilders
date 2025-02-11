(function($){ 
  function videoControl(){
    $('.js-video').each(function(){ //fadeUpTriggerというクラス名が
      var elemPos = $(this).offset().top-50;//要素より、50px上の
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      const video = $(this).get(0)
      if (scroll >= elemPos - windowHeight){
        video.play();
      }else{
        video.pause();
      }
    });
  }
 
  $(window).scroll(function (){
    videoControl();
  });

  const Imgs = $('.js-imgSize');
  const ImgLength = Imgs.length;
  //console.log(ImgLength);
  //console.log(Imgs);
  for (var i = 0; i < ImgLength; i++) {
  //ImgLengthが4であれば、ループは0から3まで4回繰り返されます。
  //Javascriptのインデックス番号は0から始まる為0から3までで４回
    console.log(i);
    if (ImgLength === 1) {
      $(Imgs[i]).css('width', '65%');
      $('.js-flex').css( 'justify-content' ,'center');
    } else if(ImgLength % 2 === 0 && ImgLength <= 4){
      //a % bは、aをbで割った余りを返します。
      //したがって、ImgLength % 2は、ImgLengthを2で割った余りを返します。
      //偶数と奇数の定義
      //偶数は2で割り切れる数です。つまり、余りが0になります。
      //奇数は2で割ったときに余りが1になります。
      $(Imgs[i]).css('width', '45%');
      $(Imgs[i]).css('margin-left', '10%');
      $(Imgs[2]).css('margin-left', '0');
    }
    else if(ImgLength >= 3){
      $(Imgs[i]).css('width', '30%');
      $(Imgs[i]).css('margin-left', '5%');
      if(i % 3 === 0 ){
        $(Imgs[i]).css('margin-left', '0');
      }
    }
  }

  $('.event__calendar__hint').addClass('u-white');

 

})(jQuery);