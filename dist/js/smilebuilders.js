(function($){ 
  
  $(document).ready(function() {
    $('.index-page__events-event').each(function() {
      var $this = $(this); // 現在の要素をjQueryオブジェクトとして取得
      var url = $this.attr('href'); // href属性からURLを取得
      // URLが存在し、かつ'smilebuildershiraya'を含むかどうかをチェック
      if (url && !(url.includes('smilebuildershiraya'))) {
          // 現在の要素を指定したクラスの要素の最初に移動
        $this.remove();
      }
    });
  });

})(jQuery);