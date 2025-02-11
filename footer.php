<footer class="l-footer">
  <div class="l-footer__top js-appear">
    <a href="#" class="l-footer__top__link"></a>
  </div>
  <div class = "l-content--percent">
    <div class = "c-button__wrap u-mb100">
      <a href = "<?php echo esc_url (home_url('reserve') ); ?>" class = "c-button--jp">来場予約</a>
      <a href = "<?php echo esc_url (home_url('contact') ); ?>" class = "c-button--jp">お問い合わせ</a>
      <a href = "<?php echo esc_url (home_url('event-company') ); ?>" class = "c-button--jp">イベント情報</a>
    </div>
    <div class = "l-footer__inner">

      <div class="l-footer__logo">
        <a href = "<?php echo esc_url (home_url('') ); ?>" class = "l-footer__logo__link">
          <img
            src="<?php echo get_template_directory_uri(); ?>/dist/img/common/logo-white.png"
            alt="<?php echo $default_page_title; ?>"
          />
        </a>
      </div>

      <div class = "l-footer__info__wrap">
        <ul class = "l-footer__info">
          <li class = "l-footer__info__item">〒899-5241</li>
          <li class = "l-footer__info__item">鹿児島県<br class = "u-none__pc--md">姶良市加治木町木田<br class = "u-none__pc--md">2511-1</li>
          <li class = "l-footer__info__item">営業時間：10:00~18:00</li>
          <li class = "l-footer__info__item">定休日：水曜日</li>
        </ul>
        <ul class = "l-footer__info">
          <li class = "l-footer__info__item">FAX:0995-55-8818</li>
          <li class = "l-footer__info__item"> MAIL:info@smile-builders-hiraya.com</li>
          <li class = "l-footer__info__item">TEL:0995-55-8900</li>
        </ul>
      </div>

    </div>
    <!--
    <div class="l-footer__map js-up u-opacity">
      <?php the_field('GoogleMapUrl','option'); ?>
    </div>
    -->

    <div class = "l-footer__bottom">
      <p class="l-footer__bottom__copyright">
        Copyright © 2024 All rights reserved
      </p>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-simple-spinner@1.2.8/dist/vue-simple-spinner.min.js"></script>
<?php if ( is_singular('exhibition') ): ?>
  <script src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/js/youtubeApi.js" defer></script>
<?php elseif (is_singular('event-company') ): ?>
  <script src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/js/booking-package.js" defer></script>
<?php endif; ?>
<script src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/js/loop.js" defer></script>
<script src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/js/kcevents.js" defer></script>
<?php wp_footer(); ?>
</body>
</html>
