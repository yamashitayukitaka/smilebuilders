<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
// Template Name: exhibition-single
get_header();
?>
<?php
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
//現在のページの遷移元のURLを取得する
$lootUrl = htmlspecialchars($referer);
$exUrl = home_url('exhibition/');
$reserveUrl = home_url('reserve/');?>

<main>
  <h2 class = "p-exhibition__company">
    <a href = "<?php the_field('HPurl'); ?>">
      <img src = "<?php the_field('logo'); ?>" class = "p-exhibition__company__img">
    </a>
  </h2>

  <?php if ( $lootUrl === $exUrl):?> 
    <ul class = "p-bread__list l-content--percent">
      <li class = "p-bread__list__item--black"><a class = "p-bread__list__link--black" href = "<?php echo esc_url (home_url('') ); ?>">ホーム</a>&nbsp;>&nbsp;</li>
      <li class = "p-bread__list__item--black"><a class = "p-bread__list__link--black" href = "<?php echo esc_url ($exUrl); ?>">展示場一覧&nbsp;>&nbsp;</a></li>
      <li class = "p-bread__list__item--black"><?php the_title(); ?></li>
    </ul>
  <?php elseif ($lootUrl === $reserveUrl):?>
    <ul class = "p-bread__list l-content--percent">
      <li class = "p-bread__list__item--black"><a class = "p-bread__list__link--black" href = "<?php echo esc_url (home_url('') ); ?>">ホーム</a>&nbsp;>&nbsp;</li>
      <li class = "p-bread__list__item--black"><a class = "p-bread__list__link--black" href = "<?php echo esc_url ($reserveUrl); ?>">来場予約一覧&nbsp;>&nbsp;</a></li>
      <li class = "p-bread__list__item--black"><?php the_title(); ?></li>
    </ul>
  <?php else:?>
    <ul class = "p-bread__list l-content--percent">
      <li class = "p-bread__list__item--black"><a class = "p-bread__list__link--black" href = "<?php echo esc_url (home_url('') ); ?>">ホーム</a>&nbsp;>&nbsp;</li>
      <li class = "p-bread__list__item--black"><?php the_title(); ?></li>
    </ul>
  <?php endif; ?>
  
  <section class = "p-exhibition__single">

  <div id='js-iemiru-cms-index-page'></div>
    

    <script src="<?php the_field('event_js_url'); ?>" defer></script>
    <div class = "p-exhibition__single__mvWrap u-mb100">
      
      <p class = "p-exhibition__copy">
        <?php the_field('mainCopy'); ?>
        <?php if(get_field('subCopy')): ?>
          <span class = "p-exhibition__copy__sub">
            <?php the_field('subCopy'); ?>
          </span>
        <?php endif; ?>
      </p>
      <?php if(get_field('exMv')): ?>
        <figure class = "p-exhibition__mainImg__wrap js-up u-opacity">
          <img src = "<?php the_field('exMv'); ?>" class = "p-exhibition__mainImg">
        </figure>
      <?php endif; ?>
    </div>

    <div class = "u-center u-mb50">
      <div class = "p-exhibition__descWrap u-opacity js-up">
        <?php if(get_field('exDesc')): ?>
          <p class = "p-exhibition__desc">
            <?php the_field('exDesc'); ?>
          </p>
        <?php endif; ?>
        <?php if(get_field('exLongDesc')): ?>
          <p class = "p-exhibition__longDesc">
            <?php the_field('exLongDesc'); ?>
          </p>
        <?php endif; ?>
      </div>
    </div>

    <ul class = "p-content__imgList l-content--percent js-flex">
      <?php $exImgs = get_field('exImgs') ;?>
        <?php if($exImgs):?>
          <?php foreach ($exImgs as $exImg):?>
            <li class = "p-content__imgList__item js-up u-opacity js-imgSize">
              <a data-fancybox ="exhibition" data-type="image" data-caption="" class = "p-content__imgList__link">
                <img src = "<?php echo esc_url($exImg['exImg']);?>" class = "p-content__imgList__img">
              </a>
            </li>
          <?php endforeach;?>
      <?php endif; ?>
    </ul>
    
    <div class = "u-mb200">
      <?php if(get_field('exVideo')): ?>
        <a data-fancybox data-type="iframe" data-src="<?php the_field('exVideo'); ?>" href="javascript:;" class = "p-exhibition__video__link js-up u-opacity">
          <video autoplay muted loop controls playsinline class = "js-video p-exhibition__video">
            <source src="<?php the_field('exVideo'); ?>" type="video/mp4">
              お使いのブラウザは、動画タグをサポートしていません。
          </video>
        </a>
      <?php endif; ?>
      
      <?php if(get_field('youtubeID')): ?>
        <a data-fancybox data-type="iframe" data-src="https://www.youtube.com/embed/<?php the_field('youtubeID'); ?>&enablejsapi=1&autoplay=1&loop=1" href="javascript:;" class ="p-exhibition__video__link u-opacity js-up">
          <iframe class="youtube-video" id = "youtube_player" width="100%" height="100%" src="https://www.youtube.com/embed/<?php the_field('youtubeID'); ?>&enablejsapi=1&autoplay=1&mute=1&loop=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </a>  
      <?php endif; ?>
    </div>

    <!--20241225 追加 KengakuCloud埋込 start -->
    <?php
    $event_url = get_field('event_url'); // ACFのフィールドからデータを取得
    echo do_shortcode('[kccal ' . $event_url . ']'); // ショートコードにパラメータを渡す
    ?>
    <!--20241225 追加 KengakuCloud埋込 end -->

    <!--20241225 削除 KengakuCloud埋込 start -->
    <?php 
    /*
    <!-- <div class = "l-content">
      <div id="kc-reservation-iframe" class="kc-reservation-iframe u-mb200">
        <h2 class="kc-reservation-title p-exhibition__calendar__ttl">モデルハウス見学予約</h2>
          
          <?php 
            $event_url = get_field('event_url'); 
            if(!empty($event_url)):
          ?>

          <iframe src="<?php echo esc_url($event_url);?>/calendar?mode=iframe" width="660" height="800" frameborder="0" style="border:0;" tabindex="0"  class = "p-exhibition__calendar"></iframe>

        </div>
        <script>
          // KengakuCloud予約カレンダーの位置を「住宅紹介動画はコチラから」の下に移動
          jQuery(function() {
              jQuery('#kc-reservation-iframe').insertAfter('.tcd-pb-row.row3');
          });
        </script>
        <?php
          endif;
        ?>
      </div>
    </div> -->
    */
    ?>
    <!--20241225 削除 KengakuCloud埋込 start -->


    <?php if(get_field('guide')): ?>
      <p class = "p-exhibition__guide__ttl">会社案内</p>
      <p class = "p-exhibition__guide">
        <?php the_field('guide'); ?>
      </p>
    <?php endif; ?>

    <div class = "p-exhibition__info__wrap l-content--percent">
      <div class = "p-exhibition__info">
        <?php if(get_field('exCom')): ?>
          <p class = "p-exhibition__info__comName">
            <?php the_field('exCom'); ?>
          </p>
        <?php endif; ?>
        <?php if(get_field('exPost')): ?>
          <p class = "p-exhibition__info__txt">
            〒<?php the_field('exPost'); ?>
          </p>
        <?php endif; ?>
        <?php if(get_field('exAddress')): ?>
          <address class = "p-exhibition__info__txt">
            <?php the_field('exAddress'); ?>
          </address>
        <?php endif; ?>

        <?php if(get_field('exTel')): ?>
          <tel class = "p-exhibition__info__num">
            &nbsp; TEL：<?php the_field('exTel'); ?>
          </tel>
        <?php endif; ?>
        <?php if(get_field('exFax')): ?>
          <p class = "p-exhibition__info__num">
            &nbsp; FAX：<?php the_field('exFax'); ?>
          </p>
        <?php endif; ?>
      </div>

      <table class = "p-exhibition__table">
        <tbody>
          <?php if(get_field('way')): ?>
            <tr>
              <th class = "p-exhibition__table__th">工法</th>
              <td  class = "p-exhibition__table__td"><?php the_field('way'); ?></td>
            </tr>
          <?php endif; ?>
          <?php if(get_field('1fSize')): ?>
            <tr>
              <th class = "p-exhibition__table__th">１F面積(㎡/坪)</th>
              <td  class = "p-exhibition__table__td"><?php the_field('1fSize'); ?></td>
            </tr>
          <?php endif; ?>
          <?php if(get_field('totalFloor')): ?>
            <tr>
              <th class = "p-exhibition__table__th">延床面積(㎡/坪)</th>
              <td  class = "p-exhibition__table__td"><?php the_field('totalFloor'); ?></td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
    <a class = "c-button--jp u-marginAuto" href = "<?php the_field('HPurl'); ?>">ホームページはこちら</a>
  </section>

  <section class = "c-companySlider">
    <ul class = "js-companySlider c-companySlider__list">
      <li class = "c-companySlider__list__item"><img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/company-slider/slide01@2x.png" class = "c-companySlider__list__img"></li>
      <li class = "c-companySlider__list__item"><img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/company-slider/slide02@2x.png" class = "c-companySlider__list__img"></li>
      <li class = "c-companySlider__list__item"><img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/company-slider/slide03@2x.png" class = "c-companySlider__list__img"></li>
      <li class = "c-companySlider__list__item"><img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/company-slider/slide04@2x.png" class = "c-companySlider__list__img"></li>
      <li class = "c-companySlider__list__item"><img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/company-slider/slide05@2x.png" class = "c-companySlider__list__img"></li>
    </ul>
    <ul class = "js-companySlider--reverse c-companySlider__list" dir= "rtl">
      <li class = "c-companySlider__list__item"><img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/company-slider/slide06@2x.png" class = "c-companySlider__list__img"></li>
      <li class = "c-companySlider__list__item"><img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/company-slider/slide07@2x.png" class = "c-companySlider__list__img"></li>
      <li class = "c-companySlider__list__item"><img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/company-slider/slide08@2x.png" class = "c-companySlider__list__img"></li>
      <li class = "c-companySlider__list__item"><img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/company-slider/slide09@2x.png" class = "c-companySlider__list__img"></li>
      <li class = "c-companySlider__list__item"><img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/company-slider/slide01@2x.png" class = "c-companySlider__list__img"></li>
    </ul>
  </section>
  
</main>

<?php get_footer(); ?>