(function($){ // 画面の高さとヘッダーの高さをカスタムプロパティに入れておく（スマホのアドレスバー対策）
const height = window.innerHeight;
const headerHeight = document.getElementById("js-measure").offsetHeight;
const btnWrapHeight = document.querySelector(".p-hamburger__fixedNav__bottomWrap").offsetHeight;
const sidebar = document.querySelector('.p-hamburger__fixedNav').offsetWidth;
document.documentElement.style.setProperty("--windowHeight", height + "px");
document.documentElement.style.setProperty(
  "--headerHeight",
  headerHeight + "px"
);
document.documentElement.style.setProperty(
  "--sidebar",
  sidebar + "px"
);
document.documentElement.style.setProperty(
  "--btnWrap",
  btnWrapHeight + "px"
);

window.addEventListener("resize", function () {
  const height = window.innerHeight;
  const headerHeight = document.getElementById("js-measure").offsetHeight;
  const btnWrapHeight = document.querySelector(".p-hamburger__fixedNav__bottomWrap").offsetHeight;
  const sidebar = document.querySelector('.p-hamburger__fixedNav').offsetWidth;
  document.documentElement.style.setProperty("--windowHeight", height + "px");
  document.documentElement.style.setProperty(
    "--headerHeight",
    headerHeight + "px"
  );

  document.documentElement.style.setProperty(
    "--sidebar",
    sidebar + "px"
  );
  document.documentElement.style.setProperty(
    "--btnWrap",
    btnWrapHeight + "px"
  );
});



$("a[href^='#']").on("click", function () {
  const href = $(this).attr("href");
  const target = $(href == "#" || href == "" ? "html" : href);
  const position = target.offset().top - headerHeight - 20; //ヘッダの高さ分位置をずらす
  $("html, body").animate({ scrollTop: position }, 550, "swing");
  return false;
});

/*ハンバーガーメニュー*/

$('#js-openHamburger').click(function(){
  $('#js-hamburger').toggleClass('show');
  $(this).toggleClass('open');
  /*setTimeout(function() {
    $('#js-hamburger__nav').toggleClass('navOpen');
  });*/
});

$(window).scroll(function (){
  const scroll = $(window).scrollTop();
  const windowHeight = $(window).height();
  if (scroll >= windowHeight){
    $('.js-appear').css('display','block');
  }else{
    $('.js-appear').css('display','none');
  }
});

/*
window.addEventListener("resize", function () {
  const width = $(window).width();
  if(width > 1200){
    $('#js-hamburger').removeClass('show');
    $('#js-openHamburger').removeClass('open')
    $('#js-hamburger__nav').removeClass('navOpen');
  }
});
*/

$('.js-companySlider').slick({ //{}を入れる
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
        breakpoint: 1200,
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


$('.js-companySlider--reverse').slick({ //{}を入れる
  infinite: true,
  slidesToShow: 4,
  centerMode: true,   
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed:0, 
  speed:5000,
  cssEase: 'linear', 
  pauseOnHover: false,
  rtl:true,
  arrows:false,
  dots:false,
  responsive: [
    {
        breakpoint: 1200,
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

//ふわっと浮かぶ
function fadeAnime(){
  $('.js-up').each(function(){ //fadeUpTriggerというクラス名が
    var elemPos = $(this).offset().top-50;//要素より、50px上の
    var scroll = $(window).scrollTop();
    var windowHeight = $(window).height();
    if (scroll >= elemPos - windowHeight){
    $(this).addClass('u-up');// 画面内に入ったらfadeUpというクラス名を追記
    }else{
    $(this).removeClass('u-up');// 画面外に出たらfadeUpというクラス名を外す
    }
  });
}

// 画面をスクロールをしたら動かしたい場合の記述
$(window).scroll(function (){
  fadeAnime();/* アニメーション用の関数を呼ぶ*/
});// ここまで画面をスクロールをしたら動かしたい場合の記述

$(window).resize(function (){
  fadeAnime();
});

setTimeout(function() {
fadeAnime();/* アニメーション用の関数を呼ぶ*/
// ここまで画面が読み込まれたらすぐに動かしたい場合の記述
}, 2000);



window.addEventListener("load", function(){
//ローディングアニメーション
  const spinner = document.getElementById('u-loading');
  //setTimeout(function() {
  spinner.classList.add('loaded');
  //},2000);
});

$('[data-fancybox]').fancybox({
  loop : true, // 複数画像の際に最初と最後をループさせる
  toolbar : false, // ツールバーの表示・非表示
  smallBtn : true, // 小さいCloseボタンの表示
  keyboard : true, // キーボード操作を有効にするか
  arrows : true, // 矢印の表示
  iframe : { // iframeの処理
  preload : false //iframeのプリロード
  }
});

function kengakuResponsive(){
  //windowWidth の値がリサイズ時に更新させるためにスコープ内でwindow幅を取得する。
  const windowWidth = $(window).width();
  $('#js-iemiru-cms-index-page').css({
    'width': '100%',
  });

  $('#iemiru-cms-index-page').css({
    'width': '100%',
    'display': 'flex',
    'flex-wrap': 'wrap',
    'gap': '4%',
    'max-width' :'initial',
  });

  $('.index-page__events-event').css({
    'width': '22%',
    'align-items': 'center',
    'flex-direction': 'column',
    'display': 'flex',
    'padding': '0',
    'background':'#fff',
    'border-radius':'initial',
  });

  if(windowWidth < 1025){
    $('.index-page__events-event').css({
      'width': '48%',
    });
  }

  $('#content .index-page__events-event').css({
    'width': '100%',
    'align-items': 'center',
    'flex-direction': 'column',
    'display': 'flex',
    'padding': '0',
    'background':'#fff',
    'border-radius':'initial',
  });

  $('#content .slick-list').css({
    'width': '100%',
    'padding':'0% !important',
  });

  $('#content .slick-slide').css({
    'margin-left':'10px'
  });

  $('.index-page__events-event-image-wrapper').css({
    'width': '100%',
    'aspect-ratio': '5/4',
  });

  $('.index-page__events-event-image').css({
    'width': '100%',
    'height': '100%',
    'background-position': 'center center',
    'background-repeat': 'no-repeat',
    'background-size': 'cover',
  });

  $('.index-page__events-event-content').css({
    'padding': '1rem',
    'margin-left': 'initial',
    'width': '100%',
  });

  $('.index-page__events-event-labels').css({
    'display': 'flex',
    'justify-content': 'center',
    'gap':'2%',
    'margin-bottom': '10px',
    'flex-wrap':'wrap',
  });

  $('.index-page__events-event-name').css({
    'overflow': 'initial',
    'white-space':'initial',
    'text-overflow': 'initial',
    'text-align': 'center',
    'font-family': 'YuGothic, "Yu Gothic", sans-serif',
    'font-weight':'bold',
    'font-size': '2rem',
    'line-height': '1.2',
    'height': 'initial',
    'color': '#464545',
    'margin-bottom':'10px',
  });

  $('.index-page__events-event-address').css({
    'font-family': 'YuGothic, "Yu Gothic", sans-serif',
    'font-weight':'bold',
    'line-height': ' 1.2',
    'height': 'initial',
    'color': '#464545',
    'text-align': 'center',
    'font-size': '14px',
  });

  if(windowWidth < 768){
    $('.index-page__events-event-address').css({
      'font-size': '12px',
    });
  }

  $('.index-page__events-event-company').css({
    'font-family': 'YuGothic, "Yu Gothic", sans-serif',
    'font-weight':'bold',
    'line-height': ' 1.2',
    'height': 'initial',
    'color': '#464545',
    'text-align': 'center',
    'font-size': '14px',
    'padding-bottom': '10px',
  });

  if(windowWidth < 768){
    $('.index-page__events-event-company').css({
      'font-size': '12px',
    });
  }

  $('.label').css({
    'font-family': 'YuGothic, "Yu Gothic", sans-serif',
    'font-weight': 'bold',
    'line-height': '1.2',
    'height': 'initial',
    'background': '#7D7D7D',
    'font-size': '1.6rem',
    'color': '#fff !important',
    'padding': '5px 10px',
    'white-space': 'nowrap',
    'margin-bottom':'5px'
  });

  $('.label-yoyaku').css({
    'background': '#fff',
    'border': '1px solid #737373',
  });

  $('.label-event').css({
    'color': '#fff',
});

  $('.index-page__events-event-date').css({
    'text-align': 'center',
    'font-weight': 'bold',
    'color': 'red',
    'margin-bottom':'5px',
    'font-size':'14px',
    'line-height':'1.3em',
    'font-family': 'YuGothic, "Yu Gothic", sans-serif',
  });

  $('.index-page__events-event-description').css({
    'display': 'none',
  });
}  

//kengakucroudからデータを取得しているのでDOMが完全に読み込まれてからでないとcssが適応されないので
//$(document).ready(function()スコープで囲む
$(document).ready(function() {
  kengakuResponsive();
});

$(window).resize(function() {
  kengakuResponsive();
  $('.index-page__events-event').css({
    'background': '#fff',
  });
});


})(jQuery);


