<?php
if (! defined('ABSPATH')) exit;
// Template Name: reserve
get_header();

$url = 'https://smile-builders-system.com/api/events/publish';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{}');

$response = curl_exec($ch);
curl_close($ch);

$publishEvents = json_decode($response, true);

?>

<div class="c-title__wrap">
  <div class="l-content--percent">

    <h3 class="c-title--section">
      Reservation&nbsp;/&nbsp;
      <span class="c-title--sectionJp">
        来場予約
      </span>
    </h3>

    <ul class="p-bread__list">
      <li class="p-bread__list__item"><a class="p-bread__list__link"
          href="<?php echo esc_url(home_url()); ?>">ホーム</a>&nbsp;>&nbsp;</li>
      <li class="p-bread__list__item">会場予約一覧</li>
    </ul>

  </div>
</div>

<main class="p-exhibition">

  <div class="kc_form-note">
    <!--20241225 変更 KengakuCloud埋込 start-->
    <!-- <p class="kc_form-note__inner p-exhibition__bulk__txt">
      複数チェックして<br class="kc-sp"><span class="u-orange">「一括表示をする」ボタンをクリック</span>すると<br>
      一度に複数のモデルハウス予約ができて便利！
    </p> -->
    <p class="kc_form-note__inner p-exhibition__bulk__txt">
      複数チェックして<br class="kc-sp"><span class="u-orange">「一括予約をする」ボタンをクリック</span>すると<br>
      一度に複数のモデルハウス予約ができて便利！
    </p>
    <!--20241225 変更 KengakuCloud埋込 start-->
  </div>

  <!--20241225 追加 KengakuCloud埋込 start-->
  <script>
    function clickBtnReserve() {
      const arr1 = [];
      const chkhouse = document.kc_form.chkhouse;
      for (let i = 0; i < chkhouse.length; i++) {
          if (chkhouse[i].checked) {
              arr1.push(chkhouse[i].value);
          }
      }
      if (arr1.length == 0) return;

      const gtag_id = '';
      let linkParams = '';
      let urlstr = "https://www.ie-miru.jp/bulk_reserve/select_event?event_ids=" + arr1.join(',') + '&privacy_policy_eventer_id=5701';
      if (linkParams) {
          urlstr = urlstr + '&' + linkParams;
      }
      window.open(urlstr, '_blank');
    }
  </script>
  <!--20241225 追加 KengakuCloud埋込 end-->

    <!--20241225 変更 KengakuCloud埋込 start-->
    <!-- <form id="kc_form"> -->
    <form id="kc_form" name="kc_form">
    <!--20241225 変更 KengakuCloud埋込 start-->
    <ol id="project_list" class="clearfix p-exhibition__list l-content--percent">
      <?php
      $args = array(
        // 20241225 変更 KengakuCloud埋込 start
        // 'post_type' => 'event-company',
        'post_type' => 'exhibition',
        // 20241225 変更 KengakuCloud埋込 end
        'order' => 'ASC',
        'orderby' => 'id',
        // 20241225 削除 KengakuCloud埋込 start
        // 'post__in' => array(961, 932, 927, 935, 944, 949, 952, 1077, 1074,1080),
        // 20241225 削除 KengakuCloud埋込 end
      );

      $myQuery = new WP_Query($args);
      if ($myQuery->have_posts()):
        while ($myQuery->have_posts()): $myQuery->the_post(); ?>
          <li class="p-exhibition__list__item u-opacity js-up">
            <!-- <a href="<?php the_permalink(); ?>" class="p-exhibition__list__link"> -->
            <div class="p-exhibition__list__link">
              <figure class="p-exhibition__list__thumbWrap">
                <!--20241225 変更 KengakuCloud埋込 start-->
                <?php /*
                <img src="<?php the_field('reserve-thumb'); ?>" class="p-exhibition__list__thumb">
                */ ?>
                <img src="<?php the_field('exThumb'); ?>" class="p-exhibition__list__thumb">
                <!--20241225 変更 KengakuCloud埋込 end-->
              </figure>

              <?php /*
              // 20241225 削除 KengakuCloud埋込 start
              <?php $companyNames = wp_get_post_terms(get_the_ID(), 'company-term');
              if (!empty($companyNames) && !is_wp_error($companyNames)): ?>
                <?php $companyName = $companyNames[0]->name; ?>
                <p class="p-exhibition__list__thumbTtl">
                  <?php if ($companyName === 'Lifeplushome'): ?>
                    <?php echo esc_html('Life+Home'); ?>
                  <?php elseif ($companyName === 'NEO DESIGN HOME'): ?>
                    <?php echo esc_html('NEO Design Home'); ?>
                  <?php elseif ($companyName === 'アイランドホーム'): ?>
                    <?php echo esc_html('株式会社アイランドホーム'); ?>
                  <?php elseif ($companyName === 'ウッドペッカー'): ?>
                    <?php echo esc_html('Woodpecker Co .Ltd'); ?>
                  <?php elseif ($companyName === 'ケイエイツー'): ?>
                    <?php echo esc_html('ケイエイツー工務店'); ?>
                  <?php elseif ($companyName === '三洋ハウス'): ?>
                    <?php echo esc_html('三洋ハウス株式会社'); ?>
                  <?php elseif ($companyName === '旭住宅'): ?>
                    <?php echo esc_html('旭住宅株式会社'); ?>
                  <?php else: ?>
                    <?php echo esc_html($companyName); ?>
                  <?php endif; ?>
                </p>
              <?php endif; ?>
              // 20241225 削除 KengakuCloud埋込 end
              */ ?>

              <!--20241225 追加 KengakuCloud埋込 start-->
              <p class="p-exhibition__list__thumbTtl"><?php the_title(); ?></p>
              <!--20241225 追加 KengakuCloud埋込 end-->
            </div>
            <!-- </a> -->

            <div class="p-exhibition__bulk__inputWrap">
              <!--20241225 変更 KengakuCloud埋込 start-->
              <?php /*
              <input id="chkbox-<?php echo get_the_ID(); ?>" class="kc-chkbox-input p-exhibition__bulk__input"
              type="checkbox" value="<?php echo $companyName; ?>"> */ ?>

              <input id="chkbox-<?php echo get_the_ID(); ?>" class="kc-chkbox-input p-exhibition__bulk__input"
              type="checkbox" name="chkhouse" value="<?php echo get_field('event_id',get_the_ID()); ?>">
              <!--20241225 変更 KengakuCloud埋込 end-->
            </div>
          </li>
      <?php endwhile;
      endif;
      wp_reset_postdata(); ?>
    </ol>
  </form>

  <!--20241225 変更 KengakuCloud埋込 start-->
  <div class="kc-button-wrap u-mb150">
    <a href="#booking">
      <!-- <input class="kc-button c-button--jp u-marginAuto js-reseveBtn" type="button" value="一括表示をする"
        onclick="filterPosts()" /> -->
      <input class="kc-button c-button--jp u-marginAuto js-reseveBtn" type="button" value="一括予約をする"
      onclick="return clickBtnReserve()"/>
    </a>
  </div>
  <!--20241225 変更 KengakuCloud埋込 end-->

  <!--20241225 削除 KengakuCloud埋込 start-->
  <?php
  /*
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // 初期状態ですべての投稿を非表示にする
      const items = document.querySelectorAll('.p-reserve__list__item');
      items.forEach(item => item.style.display = 'none'); // 非表示
    });

    function filterPosts() {
      // チェックが入っているチェックボックスを取得
      const checkedBoxes = document.querySelectorAll('.kc-chkbox-input:checked');

      // チェックが入っているリストのIDを取得
      const checkedIds = Array.from(checkedBoxes).map(box => box.value);

      // 一度すべて非表示にしてから一致したものを表示
      const items = document.querySelectorAll('.p-reserve__list__item');

      items.forEach(item => {
        if (checkedIds.includes(item.id)) {
          item.style.display = 'block'; // 表示
        } else {
          item.style.display = 'none'; // 非表示
        }
      });
    }
  </script>


  <ul class="p-content__list u-mb100 p-reserve__list l-content--percent" id="booking">
    <?php
    foreach ($publishEvents as $event) {
    ?>
      <li class="p-reserve__list__item" id="<?php echo $event['companyName']; ?>">
        <a class="is-vertical" href="<?php echo $event['link']; ?>">
          <div class="p-content__list__adImgWrap">
            <img src="<?php echo $event['mainImg']; ?>">
          </div>
          <div class="index-page__events-event-content">
            <div class="p-content__list__labelWrap">
              <p class="p-content__list__label--type"><?php echo $event['type']; ?>
              <p class="p-content__list__label--reception"><?php echo $event['format']; ?>
            </div>
            <h4 class="index-page__events-event-name"><?php echo $event['title']; ?></h4>
            <p class="p-content__list__day"><?php echo $event['holdingPeriod']; ?></p>
            <p class="p-content__list__eventAddress"><?php echo $event['address']; ?></p>
            <p class="p-content__list__companyName"><?php echo $event['companyName']; ?></p>
          </div>
        </a>
      </li>
    <?php } ?>
  </ul>

  <section class="p-exhibition__blueprint__content">
    <span class="p-exhibition__blueprint__logo js-up u-opacity">
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/common/logo-white.png">
    </span>
    <figure class="p-exhibition__blueprint__img js-up u-opacity">
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/common/smile-map02.png" class="">
    </figure>
  </section>
  */
  ?>
  <!--20241225 削除 KengakuCloud埋込 end-->


  <ul class="js-companySlider c-companySlider__list">
    <li class="c-companySlider__list__item"><img
        src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/company-slider/slide01@2x.png"
        class="c-companySlider__list__img"></li>
    <li class="c-companySlider__list__item"><img
        src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/company-slider/slide02@2x.png"
        class="c-companySlider__list__img"></li>
    <li class="c-companySlider__list__item"><img
        src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/company-slider/slide03@2x.png"
        class="c-companySlider__list__img"></li>
    <li class="c-companySlider__list__item"><img
        src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/company-slider/slide04@2x.png"
        class="c-companySlider__list__img"></li>
    <li class="c-companySlider__list__item"><img
        src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/company-slider/slide05@2x.png"
        class="c-companySlider__list__img"></li>
  </ul>

  <ul class="js-companySlider--reverse c-companySlider__list" dir="rtl">
    <li class="c-companySlider__list__item"><img
        src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/company-slider/slide06@2x.png"
        class="c-companySlider__list__img"></li>
    <li class="c-companySlider__list__item"><img
        src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/company-slider/slide07@2x.png"
        class="c-companySlider__list__img"></li>
    <li class="c-companySlider__list__item"><img
        src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/company-slider/slide08@2x.png"
        class="c-companySlider__list__img"></li>
    <li class="c-companySlider__list__item"><img
        src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/company-slider/slide09@2x.png"
        class="c-companySlider__list__img"></li>
    <li class="c-companySlider__list__item"><img
        src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/company-slider/slide01@2x.png"
        class="c-companySlider__list__img"></li>
    <li class="c-companySlider__list__item"><img
        src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/company-slider/logo.svg"
        class="c-companySlider__list__img--svg"></li>
  </ul>
</main>

<?php get_footer(); ?>