<?php
// Template Name: 404
if (! defined('ABSPATH')) exit;
get_header();

$url = 'https://smile-builders-system.com/api/events/publish';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{}');

$response = curl_exec($ch);
curl_close($ch);

$publishEvents = json_decode($response, true);
$smileEvents = [];
$nonSmileEvents = [];
if (json_last_error() === JSON_ERROR_NONE && is_array($publishEvents)) {
  foreach ($publishEvents as $event) {
    if (isset($event['companyName']) && $event['companyName'] === 'スマイルビルダーズ') {
      $smileEvents[] = $event;
    } elseif (isset($event['companyName'])) {
      $nonSmileEvents[] = $event;
    }
  }
}
?>

<main class="p-top">
  <section class="p-top__mv">
    <span class="p-top__mv__overlay js-overlay"></span>
    <video autoplay muted loop playsinline class="p-top__mv__videoWrap" id="js-topVideo">
      <!-- playsinlineを付与しないとPCで自動再生されるがSPで自動再生されない -->
      <!-- playsinline は、HTML5 の <video> 要素で使用される属性で、主にモバイルデバイスでの動画再生に関係します。 -->
      <source src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/video/video03.mp4" type="video/mp4"
        class="p-top__mv__video">
      お使いのブラウザは、動画タグをサポートしていません。
    </video>
  </section>


  <section class="p-top__parallax">
    <section class="p-top__event">
      <div class="l-content--percent">
        <h3 class="c-title__wrap--section u-mb100">
          <span class="c-title--section">Event</span>
          <span class="c-title__slash">&nbsp;/&nbsp;</span>
          <span class="c-title--sectionJp">イベント情報</span>
        </h3>

        <p class="p-top__event__txt">
          スマイルビルダーズでは、
          <br>小さなお子様連れのお客様が
          <br class="u-none__pc--md">
          ご来場いただきやすいよう
          <br>各種設置・サービスをご用意しています。
        </p>

        <div class="p-content__list__wrap u-mb100">
          <ul class="p-content__list u-mb100">
            <?php
            foreach ($smileEvents as $event) {
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
        </div>

        <a href="<?php echo esc_url(home_url('/')); ?>event-company/company-term/smilebuilders" class="c-button--more">
          VIEW MORE
        </a>
      </div>
    </section>
    <section class="p-top__exhibition">
      <h3 class="c-title__wrap--section u-mb100 l-content--percent">
        <span class="c-title--section">Exhibition hall</span>
        <span class="c-title__slash">&nbsp;/&nbsp;</span>
        <span class="c-title--sectionJp">展示場案内</span>
      </h3>

      <p class="p-top__exhibition__txt l-content--percent">
        たくさんのモデルハウスが
        <br class="u-none__pc--lg">立ち並ぶ住宅展示場。
        <br>各ハウスメーカーの特色や
        <br class="u-none__pc--lg">最新設備を無料で見学・体感でき、
        <br>カタログやネットを見るよりも
        <br class="u-none__pc--lg">家づくりのイメージが
        <br class="u-none__pc--lg">広がります。
      </p>
      <ul class="p-content__list  p-top__house__list js-houseSlider">
        <?php
        $exs = array(
          'post_type' => 'exhibition',
          'posts_per_page' => -1,
        ); ?>
        <?php $exLoop = new WP_Query($exs); ?>
        <?php if ($exLoop->have_posts()): ?>
          <?php while ($exLoop->have_posts()) : $exLoop->the_post(); ?>
            <li class="p-content__listItem--top u-opacity js-up">
              <a href="<?php the_permalink(); ?>" class="p-content__listLink">
                <figure class="p-content__listThumb__wrap">
                  <img src="<?php the_field('exThumb'); ?>" class="p-content__listThumb">
                </figure>
                <!--
                <div class = "p-content__listLogo">
                  <img src = "<?php the_field('logo'); ?>" class = "p-content__listLogoImg">
                  <p class = "p-content__listCopy"><?php the_field('mainCopy'); ?></p>
                </div>
                -->
                <p class="p-exhibition__list__thumbTtl"><?php the_title(); ?></p>
                <span class="c-button--arrow p-content__list__arrow"></span>
              </a>
            </li>
        <?php endwhile;
        endif;
        wp_reset_postdata(); ?>
      </ul>
      <a class="c-button--more u-mb100" href="<?php echo esc_url(home_url()); ?>/exhibition/">
        VIEW MORE
      </a>
    </section>
    <section class="p-top__companyEvent">
      <div class="l-content--percent">
        <h3 class="c-title__wrap--section u-mb100">
          <span class="c-title--section">Event</span>
          <span class="c-title__slash">&nbsp;/&nbsp;</span>
          <span class="c-title--sectionJp">各社からのイベント情報</span>
        </h3>
      </div>
      <ul class="l-content--percent p-content__list u-mb100">
        <?php
        foreach ($nonSmileEvents as $event) {
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


      <!-- <ul class = "l-content--percent p-top__comEvent__list u-mb100">
      202411/15山下コメントアウト1 <div id='js-iemiru-cms-index-page'></div>202411/15山下コメントアウト1ここまで-->
      <script src='https://www.ie-miru.jp/cms/yoyaku/smilebuildershiraya.js' defer></script>
      <!--202411/15山下コメントアウト2<script src = "<?php echo esc_url(get_template_directory_uri()); ?>/dist/js/event.js" defer></script>202411/15山下コメントアウト2ここまで -->
      </ul>

      <!--
      <ul class = "l-content--percent p-top__comEvent__list">
        <?php
        $coms = array(
          'post_type' => $postType, // カスタム投稿タイプのスラッグ
          'tax_query' => array(
            array(
              'taxonomy' => $tax, // タクソノミーのスラッグ
              'field'    => 'slug',
              'terms'    => $target, // 特定のタームのスラッグ
              'operator' => 'NOT IN'
            ),
          ),
          'orderby' => 'date', // 日付で並び替え
          'order' => 'DESC', // 降順で新しい投稿を表示
          'posts_per_page' => 8,
        ); ?>
        <?php $comLoop = new WP_Query($coms); ?>
          <?php if ($comLoop->have_posts()): ?>
          <?php while ($comLoop->have_posts()) : $comLoop->the_post(); ?>
            
            <li class = "u-opacity js-up u-mb100 p-top__comEvent__listItem">
              <a href = "<?php the_field('iemiru'); ?>" class = "p-content__listLink">

                <figure class = "p-content__listThumb__wrap">
                  <img src = "<?php the_field('companyEventImg'); ?>" class = "p-content__listThumb">
                </figure>
             
                <div class = "p-content__listInfo u-p10">
                  <p class = "p-content__listTtl u-mb20">
                    <?php the_title(); ?>
                  </p>

                  <?php
                  $taxonomyFirst = 'event-type';
                  $eventType = wp_get_post_terms(get_the_ID(), $taxonomyFirst); //現在の投稿の紐ずくタームを取得する。
                  //wp_get_post_termsは配列で取得するので、得られるタームが一つであっても、
                  //０を指定する必要がある
                  $taxonomySec = 'reception-type';
                  $receiptType = wp_get_post_terms(get_the_ID(), $taxonomySec);
                  ?>

                  <div class = "u-mb20">
                    
                    <?php if (get_field('eventType')): ?>
                      <p class = "p-company-event__type"><?php echo esc_html($eventType[0]->name); ?></P>
                    <?php endif; ?>

                    <?php if (get_field('receiptType')): ?>
                      <p class = "p-company-event__type"><?php echo esc_html($receiptType[0]->name); ?></P>
                    <?php endif; ?>
                    
                    <?php $open = get_field('open'); ?>

                  </div>
                  
                  <p class = "p-content__list__address">
                    <?php the_field('companyEventAddress'); ?>
                  </p>

                  <time class = "p-content__list__startDay">
                    <?php the_field('comEventStartDay'); ?>
                  </time>
                  
                  <?php if (get_field('comEventEndDay')): ?>
                    <time class = "p-content__list__endDay">
                      ～&nbsp;<?php the_field('comEventEndDay'); ?>
                    </time>
                  <?php endif; ?>

                  <?php if ($open): ?>
                    <p class = "p-content__list__open">開催中</p>
                  <?php endif; ?>

                  <div class = "p-content__list__timeWrap">
                    <time class = "p-content__list__startTime">
                      <?php the_field('comEventStartTime'); ?>
                    </time>

                    <?php if (get_field('comEventEndTime')): ?>
                      <time class = "p-content__list__endTime">
                        ～<?php the_field('comEventEndTime'); ?>
                      </time>
                    <?php endif; ?>
                  </div>
                </div>
                <span class = "c-button--arrow p-content__list__arrow"></span>
              </a>
            </li>
            

          <?php endwhile;
          endif;
          wp_reset_postdata(); ?>
        
      </ul>
      -->

      <a class="c-button--more" href="<?php echo esc_url(home_url()); ?>/event-company/">
        VIEW MORE
      </a>
    </section>

    <section class="p-top__insta">
      <div class="l-content--percent u-mb100">

        <h3 class="c-title__wrap--section">
          <span class="c-title--section">Instagram</span>
          <span class="c-title__slash">&nbsp;/&nbsp;</span>
          <span class="c-title--sectionJp">SNS</span>
        </h3>
        <p class="p-content__txt">
          各ハウスメーカーの特色や
          <br class="u-none__pc--lg">最新設備を無料で見学・体感でき、
          <br>カタログやネットを見るよりも
          <br class="u-none__pc--lg">家づくりのイメージが
          <br class="u-none__pc--lg">広がります。
        </p>

        <?php echo do_shortcode('[instagram-feed feed=3]'); ?>

      </div>

      <a class="c-button--more" href="https://www.instagram.com/smilebuilders.aira.hiraya/">
        VIEW MORE
      </a>

    </section>
    <section class="p-top__blueprint">
      <div class="p-top__blueprint__content">
        <span class="p-top__blueprint__logo js-up u-opacity">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/common/logo@2x.png">
        </span>
        <figure class="p-top__blueprint__img js-up u-opacity">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/common/smile-map02.png">
        </figure>
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
    </section>
  </section>
</main>
<?php get_footer(); ?>