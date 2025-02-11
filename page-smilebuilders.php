<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
// Template Name: event
get_header();
?>

<div class = "c-title__wrap">
  <div class = "l-content--percent">
    <h3 class = "c-title__wrap--section u-mb100">
      <span class = "c-title--section">Event</span>
      <span class = "c-title__slash">&nbsp;/&nbsp;</span>
      <span class = "c-title--sectionJp">スマイルビルダーズ&nbsp;イベント情報</span>
    </h3>

    <ul class = "p-bread__list">
      <li class = "p-bread__list__item"><a class = "p-bread__list__link" href = "<?php echo esc_url (home_url('') ); ?>">ホーム</a>&nbsp;>&nbsp;</li>
      <li class = "p-bread__list__item">スマイルビルダーズ</li>
    </ul>

  </div>
</div>
<main class = "p-event">
  <div class = "l-content--percent">
  <!--2024山下コメントアウト1
    <ul class = "c-term__list">
      <li class = "c-term__item--all">
        <a class = "c-term__item__link" href = "<?php echo esc_url (get_post_type_archive_link('event-company')); ?>">
          すべて
        </a>
      </li>

      <?php
      $args = array(
        'post_type' => 'event-company',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby'=>'menu_order',
      );?>

      <?php $myQuery = new WP_Query($args);?>
      <?php if ($myQuery->have_posts()): ?>
        <?php while ($myQuery->have_posts()) : $myQuery ->the_post();?>
          <li class = "c-term__item">
            <a class = "c-term__item__link" href = "<?php the_permalink(); ?>">
              <?php the_title(); ?>
            </a>
          </li>
          <?php endwhile;
        endif;
      wp_reset_postdata();?>
      <li class = "c-term__item">
        <a class = "c-term__item__link u-current" href = "<?php echo esc_url (home_url('smilebuilders') ); ?>">
          スマイルビルダーズ
        </a>
      </li>
    </ul>

    <ul class = "p-top__comEvent__list u-mb100">
      <div id='js-iemiru-cms-index-page'></div>
      <script src='https://www.ie-miru.jp/cms/yoyaku/smilebuildershiraya.js' defer></script>　2024山下コメントアウトここまで-->
<!-- 		<script src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/js/event.js" defer></script> --> <!--この行は市川さんによってコメントアウトされていた-->
    <!--2024山下コメントアウト2</ul>024山下コメントアウト2ここまで-->

    <a href = "<?php echo esc_url (home_url('') ); ?>" class =  "c-button--jp p-content__button">
        TOPに戻る
    </a>

  </div>

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
    <li class = "c-companySlider__list__item"><img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/company-slider/logo.svg" class = "c-companySlider__list__img--svg"></li>
  </ul>
</main>
<?php get_footer();?>

