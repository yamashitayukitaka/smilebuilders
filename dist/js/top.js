(function($){ 

//WordPressのページで正しい高さを取得できない問題は
//JavaScriptの実行タイミングやページのレンダリング順序が原因
//であることが多いです。ページが完全に読み込まれる前にスクリプト
//が実行されると、正しい要素の高さや幅を取得できないことがあります。
//この問題を解決するためにloadイベントリスナーを使用して、
//ページが完全に読み込まれた後にスクリプトを実行することが一般的です。
//defer属性を使用してスクリプトを読み込んでいる場合でも、正しい高さが取得できない
//理由はいくつか考えられます。defer属性を持つスクリプトは、ページのパースが完了した後
//に実行されますが、画像やビデオなどのメディア要素の読み込みが完了しているとは限りません。

//主な原因
//メディア要素の読み込み:
//ページのパースが完了しても、画像やビデオなどのメディア要素の読み込み
//がまだ完了していない場合があります。このため、offsetWidthやoffsetHeightが
//正確に取得できないことがあります。

//動的なコンテンツの読み込み:
//JavaScriptや他のリソースによって動的にコンテンツが変更される場合、
//defer属性だけではその変更をキャッチできないことがあります。

//最初の読み込み時に正しく要素の幅や高さを取得できない場合、
//要素がまだ完全にレンダリングされていない可能性があります。
//この問題を解決するために、loadイベントを使用することが考えられます。
//DOMContentLoadedはDOMの構築が完了したことを示しますが、
//loadイベントはすべてのリソース（画像やスタイルシートなど）
//が完全に読み込まれた後に発火します。
 
  window.addEventListener("load", function(){
    const eventTxt = document.querySelector('.p-top__event__txt').offsetWidth;
    const mvHeight = document.querySelector('.p-top__mv__videoWrap').offsetHeight;
    document.documentElement.style.setProperty(
      "--eventTxt",
      eventTxt + "px"
    );
    document.documentElement.style.setProperty(
      "--mvHeight",
      mvHeight + "px"
    );
  });

  window.addEventListener("resize", function () {
    const eventTxt = document.querySelector('.p-top__event__txt').offsetWidth;
    const mvHeight = document.querySelector('.p-top__mv__videoWrap').offsetHeight;
    document.documentElement.style.setProperty(
      "--eventTxt",
      eventTxt + "px"
    );
    document.documentElement.style.setProperty(
      "--mvHeight",
      mvHeight + "px"
    );
  });

  /*
  window.addEventListener('load', function () {
    var video = document.getElementById('js-topVideo');

    // Attempt to play the video with sound
    video.play().then(() => {
        // Video playback started
        setTimeout(() => {
          video.muted = false;
      }, 2000);
    }).catch(error => {
        // Auto-play was prevented
        // Mute the video and attempt to play again
        video.muted = true;
        video.play();
    });

    // Unmute the video on window load
    window.onload = function() {
        video.muted = false;
      };
    });*/
  
  $(window).scroll(function (){
    const scroll = $(window).scrollTop();
    const windowHeight = $(window).height();
    if (scroll >= windowHeight / 2){
      $('.js-overlay').addClass('u-overlayColor');
    }else{
      $('.js-overlay').removeClass('u-overlayColor');
    }
  }); 
  

  function videoSize(){
    $(window).scroll(function (){
    const scroll = $(window).scrollTop();
    const windowHeight = $(window).height();
    const eventElement = $('.p-top__event');
    const eventTop = eventElement.offset().top;
    const eventBottom = eventTop + eventElement.outerHeight(); // 底部の位置を計算
    const windowWidth = $(window).width();
    //offset() メソッドで取得できるのは .top と .left で、 .bottom は取得できません。
    if (scroll >= eventBottom - windowHeight) {
        $('.p-top__mv__videoWrap').css('width', '150%');
        //$('.p-top__mv__videoWrap').css('height', '100vh');
        if(windowWidth < 1400){
          $('.p-top__mv__videoWrap').css('width', '150%');
        }
        if(windowWidth < 1300){
          $('.p-top__mv__videoWrap').css('width', '200%');
        }
        if(windowWidth < 768){
          $('.p-top__mv__videoWrap').css('width', '300%');
        }
        if(windowWidth < 520){
          $('.p-top__mv__videoWrap').css('width', '400%');
        }
        if(windowWidth < 380){
          $('.p-top__mv__videoWrap').css('width', '500%');
        }
        if(windowWidth < 300){
          $('.p-top__mv__videoWrap').css('width', '700%');
        }
    } else {
      $('.p-top__mv__videoWrap').css('width', '100%');
      //$('.p-top__mv__videoWrap').css('height', 'initial');
      //リサイズした後にスクロールを戻したとき、mvHeightが取得できていないので、
      //取得する
      const mvHeight = document.querySelector('.p-top__mv__videoWrap').offsetHeight;
      document.documentElement.style.setProperty(
        "--mvHeight",
        mvHeight + "px"
      );
    }
  });
}

videoSize();

$(window).resize(function() {
  videoSize();
});


/*
$(document).ready(function() {
  $('.index-page__events-event').each(function() {
    var $this = $(this); // 現在の要素をjQueryオブジェクトとして取得
    var url = $this.attr('href'); // href属性からURLを取得
  
    // URLが存在し、かつ'smilebuildershiraya'を含むかどうかをチェック
    if (url && url.includes('smilebuildershiraya')) {
        // 現在の要素を指定したクラスの要素の最初に移動
        $('#content').prepend($this);
    }
  });
});*/

// $(document).ready(function() {
//   var count = 1;
//   $('.index-page__events-event').each(function() {
//     var $this = $(this); // 現在の要素をjQueryオブジェクトとして取得
//     var url = $this.attr('href'); // href属性からURLを取得
//     // URLが存在し、かつ'smilebuildershiraya'を含むかどうかをチェック
//     if (url && url.includes('smilebuildershiraya')) {
//         // 現在の要素を指定したクラスの要素の最初に移動
//         $('#content').prepend($this);
//     }else {
//       count++; 
//       // 9番目以降の要素を非表示にする
//       if (count > 9) {
//         $this.remove();
//       }
//     }
//   });
// });

/*
$(function() {
  $.ajax({
      url: 'http://ichikawa0701.local/exhibition/%e4%b8%80%e6%9d%a1%e5%b7%a5%e5%8b%99%e5%ba%97/', // AJAXリクエストのURL
      method: 'GET', // リクエストメソッド
      dataType: 'html' // レスポンスのデータ型
  })
  .done(function(response) {
      // 通信成功時
      var $response = $(response); // 取得したHTMLをjQueryオブジェクトに変換
      var $specificElement = $response.find('.p-exhibition__single');
      $('#content').html($specificElement);
  })
  .fail(function(jqXHR, textStatus, errorThrown) {
      // 通信失敗時
      console.error('通信失敗:', textStatus, errorThrown);
      $('#content').html('<p>データの取得に失敗しました。</p>'); // エラーメッセージを表示
  })
  .always(function() {
      // 通信成功・失敗問わず
      console.log('通信完了');
  });
});*/




})(jQuery);