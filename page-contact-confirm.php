<?php
  // Template Name: contact-confirm
  get_header();
?>

<?php if (is_page('contact-confirm')):?>
  <style>
    .c-form__input__wrap {
      padding:0 2rem;
      display:flex;
      align-items: center;
      background:#fff;
    }

    .u-white{
      color:#fff !important;
    }
  </style>
<?php endif; ?>

<div class = "c-title__wrap">
  <div class = "l-content--percent">
    <h3 class = "c-title--section u-mb50">
      CONTACT&nbsp;/&nbsp;
      <span class = "c-title--sectionJp">
        お問い合わせ
      </span>
    </h3>
    <p class = "c-title__txt u-mb20">スマイル・ビルダーズへのお問合せはこちらよりお願い致します。</p>
  </div>
</div>
<main class="p-contact">
  <div class = "l-content--percent">
    <div class="p-bread">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="p-bread__link">ホーム</a>
      <span class="p-bread__arrow">&gt;</span>
      <span class="p-bread__current">お問い合わせ</span>
    </div>
    <div class="p-contact__form">
      <?php echo do_shortcode('[mwform_formkey key="12"]'); ?>
    </div>
  </div>
</main>
<?php
  get_footer();
?>