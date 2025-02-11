<?php
if (! defined('ABSPATH')) exit;
// Template Name:event-company
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

    <h3 class="c-title__wrap--section u-mb100">
      <span class="c-title--section">Event</span>
      <span class="c-title__slash">&nbsp;/&nbsp;</span>
      <span class="c-title--sectionJp">各社からのイベント情報</span>
    </h3>

    <ul class="p-bread__list">
      <li class="p-bread__list__item"><a class="p-bread__list__link"
          href="<?php echo esc_url(home_url()); ?>">ホーム</a>&nbsp;>&nbsp;</li>
      <li class="p-bread__list__item">各社からのイベント情報</li>
    </ul>

  </div>
</div>


<main class="p-event">
  <div class="l-content--percent">
    <!--20241225 追加 KengakuCloud埋込 start-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/css/kcevents.css">
    <div id="kcapp" v-cloak>
        <all-events></all-events>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16"></script>
    <script src="https://unpkg.com/axios@1.0.0/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-simple-spinner@1.2.8/dist/vue-simple-spinner.min.js"></script>
    <script type="application/javascript" src="<?php echo get_template_directory_uri(); ?>/dist/js/kcevents.js?20241225"></script>
    <!--20241225 追加 KengakuCloud埋込 end-->

    <!--20241225 削除 KengakuCloud埋込 start-->
    <?php
    /*

    <!-- 2024/11/16山下コメントアウト<ul class = "c-term__list">
      <li class = "c-term__item--all">
        <a class = "c-term__item__link u-current" href = "<?php echo esc_url(get_post_type_archive_link('event-company')); ?>">
          すべて
        </a>
      </li>

      <?php
      $args = array(
        'post_type' => 'event-company',
        'posts_per_page' => -1,
        'orderby'        => 'date', // 並び替え基準: 日付
        'order'          => 'DESC',
      ); ?>

      <?php $myQuery = new WP_Query($args); ?>
      <?php if ($myQuery->have_posts()): ?>
        <?php while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
          <li class = "c-term__item">
            <a class = "c-term__item__link" href = "<?php the_permalink(); ?>">
              <?php the_title(); ?>
            </a>
          </li>
          <?php endwhile;
      endif;
      wp_reset_postdata(); ?>
      <li class = "c-term__item">
        <a class = "c-term__item__link" href = "<?php echo esc_url(home_url('smilebuilders')); ?>">
          スマイルビルダーズ
        </a>
      </li>
    </ul> -->
    <?php $tax = 'company-term'; ?>
    <?php $companys = get_terms(
      $tax,
      [
        'hide_empty' => false,
        'orderby' => 'id',
        'order' => 'ASC',
      ]
    ); ?>
    <ul class="c-term__list">
      <li class="c-term__item--all">
        <a class="c-term__item__link u-current"
          href="<?php echo esc_url(get_post_type_archive_link('event-company')); ?>">
          すべて
        </a>
      </li>
      <?php foreach ($companys as $company) : ?>
        <li class="c-term__item">
          <a class="c-term__item__link" href="<?php echo esc_url(get_term_link($company)); ?>">
            <?php echo esc_html($company->name); ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>

    <!--2024/11/16山下追加-->
    <ul class="p-content__list u-mb100">
      <?php
      foreach ($publishEvents as $event) {
      ?>
        <a class="index-page__events-event is-vertical" href="<?php echo $event['link']; ?>">
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
      <?php } ?>
    </ul>
    <!--山下追加ここまで-->


    <ul class="p-top__comEvent__list u-mb100">
      <div id='js-iemiru-cms-index-page'></div>2024/11/15山下コメントアウト1ここまで
      <!--  <script src='https://www.ie-miru.jp/cms/yoyaku/smilebuildershiraya.js' defer></script> -->
      <!--この行のみが市川さんによってコメントアウトされていた-->
      <!-- <script src = "<?php echo esc_url(get_template_directory_uri()); ?>/dist/js/event.js" defer></script> 山下コメントアウト2024/11/16 -->
    </ul>

    */
    ?>
    <!--20241225 削除 KengakuCloud埋込 end-->


    <a href="<?php echo esc_url(home_url('')); ?>" class="c-button--jp p-content__button">
      TOPに戻る
    </a>

  </div>

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