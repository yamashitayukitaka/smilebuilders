<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
// Template Name: exhibition
get_header();
?>

<div class = "c-title__wrap">
  <div class = "l-content--percent">

    <h3 class = "c-title__wrap--section u-mb100">
      <span class = "c-title--section">Exhibition hall</span>
      <span class = "c-title__slash">&nbsp;/&nbsp;</span>
      <span class = "c-title--sectionJp">展示場一覧</span>
    </h3>

    <ul class = "p-bread__list">
      <li class = "p-bread__list__item"><a class = "p-bread__list__link" href = "<?php echo esc_url (home_url('') ); ?>">ホーム</a>&nbsp;>&nbsp;</li>
      <li class = "p-bread__list__item">展示場一覧</li>
    </ul>

  </div>
</div>

<main class = "p-exhibition">
  <div class = "l-content--percent">
    <p class = "p-exhibition__txt">
      誰でも気軽に行ける
    </p>
    <p class = "p-exhibition__txt--large">
      「住まいのテーマパーク」
    </p>
    <ul class = "p-exhibition__list">
      <?php
      $exs = array(
      'post_type' => 'exhibition',
      'posts_per_page' =>-1,
      'order' => 'ASC',
      'orderby'=>'menu_order',
      );?>
      <?php $exLoop = new WP_Query($exs);?>
        <?php if ($exLoop->have_posts()): ?>
        <?php while ($exLoop->have_posts()) : $exLoop->the_post();?>
          <li class = "p-exhibition__list__item u-opacity js-up">
            <a href = "<?php the_permalink(); ?>" class = "p-exhibition__list__link">
              <figure class = "p-exhibition__list__thumbWrap">
                <img src = "<?php the_field('exThumb'); ?>" class = "p-exhibition__list__thumb">
                <!--
                <span class = "p-exhibition__list__logo">
                  <img src = "<?php the_field('logo'); ?>" class = "p-exhibition__list__logoImg">
                </span>
                -->
              </figure>
              <p class = "p-exhibition__list__thumbTtl"><?php the_title(); ?></p>
              <span class ="c-button--arrow p-exhibition__list__arrow"></span>
            </a>
          </li>
          <?php endwhile;
        endif;
      wp_reset_postdata();?>
    </ul>
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

<?php get_footer(); ?>