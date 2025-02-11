<?php
  // Template Name: contact
  get_header();
?>

<div class = "c-title__wrap">
  <div class = "l-content--percent">
    <h3 class = "c-title--section u-mb50">
      CONTACT&nbsp;/&nbsp;
      <span class = "c-title--sectionJp">
        お問い合わせ
      </span>
    </h3>
    <p class = "c-title__txt u-mb20">スマイル・ビルダーズへのお問合せはこちらよりお願い致します。</p>
    <ul class = "p-bread__list">
      <li class = "p-bread__list__item"><a class = "p-bread__list__link" href = "<?php echo esc_url (home_url() ); ?>">ホーム</a>&nbsp;>&nbsp;</li>
      <li class = "p-bread__list__item">お問い合わせ</li>
    </ul>
  </div>
</div>
<main class="p-contact">
  <div class = "l-content--percent">
    <div class="p-contact__form">
      <?php echo do_shortcode('[mwform_formkey key="12"]'); ?>
    </div>
  </div>
</main>
<?php
  get_footer();
?>