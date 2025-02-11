<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
// Template Name:company-event-single
get_header();
?>

<?php $post_id = get_the_ID();?>
<?php $pageTitle = get_the_title($post_id);?>

<div class = "c-title__wrap">
  <div class = "l-content--percent">
    <h3 class = "c-title__wrap--section u-mb100">
      <span class = "c-title--section">Event</span>
      <span class = "c-title__slash">&nbsp;/&nbsp;</span>
      <span class = "c-title--sectionJp">各社からのイベント情報</span>
    </h3>

    <ul class = "p-bread__list">
      <li class = "p-bread__list__item"><a class = "p-bread__list__link" href = "<?php echo esc_url (home_url() ); ?>">ホーム</a>&nbsp;>&nbsp;</li>
      <li class = "p-bread__list__item"><a class = "p-bread__list__link" href = "<?php echo esc_url (home_url('event-company/') ); ?>">各社からのイベント情報</a>&nbsp;>&nbsp;</li>
      <li class = "p-bread__list__item"><?php echo esc_html($pageTitle); ?></li>
    </ul>
  </div>
</div>

<main class = "p-event">
  <div class = "l-content--lg">

    <!-- <ul class = "c-term__list">
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
            <a class = "c-term__item__link <?php if($pageTitle === get_the_title()):?> u-current <?php endif;?>" href = "<?php the_permalink(); ?>">
              <?php the_title(); ?>
            </a>
          </li>
          <?php endwhile;
        endif;
      wp_reset_postdata();?>
      <li class = "c-term__item">
        <a class = "c-term__item__link" href = "<?php echo esc_url (home_url('smilebuilders') ); ?>">
          スマイルビルダーズ
        </a>
      </li>
    </ul>

    <ul class = "p-top__comEvent__list u-mb100">
      <div id='js-iemiru-cms-index-page'></div>
      <script src='<?php the_field('js_url_event'); ?>' defer></script>
    </ul> -->

    <h3 class = "p-company-event__ttl"><?php echo esc_html($pageTitle); ?></h3>

    <div class = "p-content__list__labelWrap">
      <?php $type = get_field('event-type');?>
      <?php if($type):?>
        <?php if (!($type === '選択してください')):?>
          <p class = "p-content__list__label--type"><?php echo esc_html($type)?><p>
        <?php endif; ?>
      <?php endif; ?>
    </div>

    <dl class = "p-company-event__detail__dl">
      <dt class = "p-company-event__detail__dt">開催日:</dt>
      <dd class = "p-company-event__detail__dd">
        <?php
          $start = get_field('start');
          $end = get_field('end');?> 
        <?php if ($start):?>
          <?php echo esc_html($start);?>
        <?php endif; ?>
          
        <?php if ($end):?>
          ～<?php echo esc_html($end);?>
        <?php endif; ?>

        <?php if(!($start||$end)):?>
          開催中
        <?php endif; ?>
      </dd>
    </dl>
    <dl class = "p-company-event__detail__dl">
      <dt class = "p-company-event__detail__dt">開催時間:</dt>
      <dd class = "p-company-event__detail__dd">
        <?php
          $startTime = get_field('start-time');
          $endTime = get_field('end-time');?> 
        <?php if ($startTime):?>
          <?php echo esc_html($startTime);?>
        <?php endif; ?>
          
        <?php if ($endTime):?>
          ～<?php echo esc_html($endTime);?>
        <?php endif; ?>
      </dd>
    </dl>
    <dl class = "p-company-event__detail__dl u-mb100"">
      <?php $eventAddress = get_field('event-address');?>
        <dt class = "p-company-event__detail__dt">開催場所:</dt>
        <dd class = "p-company-event__detail__dd">
          <?php if ($eventAddress):?>
            <?php echo esc_html($eventAddress);?>
        </dd>
      <?php endif; ?>
    </dl>

    <a href = "#booking" class = "c-button--jp p-company-event__reserve">予約する</a>

    <?php $adImg = get_field('event-ad-img');?>
      <?php if ($adImg):?>
        <div class = "p-company-event__adImg__wrap">
          <img src = "<?php echo esc_url($adImg);?>">
        </div>
    <?php endif; ?>

    <?php $desc = get_field('description');?>
      <?php if ($desc):?>
        <p class = "p-company-event__desc">
          <?php echo wp_kses_post($desc);?>
        </p>
      <?php endif; ?>
    <div class = "p-company-event__bookingWrap" id = "booking">
      <?php
        $booking = get_field('booking'); 
        if ($booking) {
          echo do_shortcode($booking); 
        } 
      ?>
    </div>
    
    <?php $map = get_field('googlemap');?>
    <?php if ($map):?>
      <div class = "p-company-event__map">
        <?php echo ($map);?>
      </div>
    <?php endif; ?>
    
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

<?php get_footer(); ?>