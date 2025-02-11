<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="index, follow" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Shippori+Antique+B1&family=Shippori+Mincho&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP&display=swap" rel="stylesheet">
  <link href="https://fonts.cdnfonts.com/css/kozuka-gothic-pr6n" rel="stylesheet">
  
  <?php wp_head(); ?>
  <!-- google search consol -->
  <meta name="google-site-verification" content="oW5FsPmRM2hQqx2lYf7Iejg9-USDKHlco0o-CfzcsBA" />
  
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-TMZJETXY0Q"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-TMZJETXY0Q');
	</script>
</head>

<body>
  <div id="u-loading">
		<div class="u-spinner">
      <img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/common/logo@2x.png">
		</div>
	</div>

  <header id="js-measure" class="l-header">
  <div class="js-headerAnime l-header__content">
  <div class="l-header__content__inner l-content--percent">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="l-header__logo">
      <h1>
        <?php if (is_front_page()): ?>
          <img
            src="<?php echo get_template_directory_uri(); ?>/dist/img/common/logo@2x.png"
            alt="<?php echo $default_page_title; ?>"
            class="u-none__mobile--lg l-header__logo__img"
          >
          <img
            src="<?php echo get_template_directory_uri(); ?>/dist/img/common/logo-white.png"
            alt="<?php echo $default_page_title; ?>"
            class="u-none__pc--lg l-header__logo__img"
          >
        <?php elseif(is_404()):?>
          <img
            src="<?php echo get_template_directory_uri(); ?>/dist/img/common/logo@2x.png"
            alt="<?php echo $default_page_title; ?>"
            class="u-none__mobile--lg l-header__logo__img"
          >
          <img
            src="<?php echo get_template_directory_uri(); ?>/dist/img/common/logo-white.png"
            alt="<?php echo $default_page_title; ?>"
            class="u-none__pc--lg l-header__logo__img"
          >
        <?php else: ?>
          <img
            src="<?php echo get_template_directory_uri(); ?>/dist/img/common/logo-white.png"
            alt="<?php echo $default_page_title; ?>"
            class="l-header__logo__img"
          >
        <?php endif; ?>
      </h1>
    </a>

    <nav class="c-navigation u-none__mobile--xxl">
      <ul class="c-navigation__list">
        <li class="c-navigation__list__item">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="c-navigation__list__link">TOP<span class="c-navigation__list__jp">トップ</span></a>
        </li>
        <li class="c-navigation__list__item">
          <a href="<?php echo esc_url(home_url('/')); ?>exhibition/" class="c-navigation__list__link">EXHIBITIONHALL<span class="c-navigation__list__jp">展示場案内</span></a>
        </li>
        <!-- <li class="c-navigation__list__item">
          <a href = "<?php echo esc_url(home_url('/')); ?>event-company/company-term/smilebuilders/" class="c-navigation__list__link">EVENT<span class="c-navigation__list__jp">イベント情報</span></a>
        </li> -->
        <li class="c-navigation__list__item">
          <a href="<?php echo esc_url(home_url('/')); ?>event-company/" class="c-navigation__list__link">EVENT<span class="c-navigation__list__jp">展示場イベント一覧</span></a>
        </li>
        <li class="c-navigation__list__item">
          <a href="<?php echo esc_url(home_url('/')); ?>reserve/" class="c-navigation__list__link">RESERVATION<span class="c-navigation__list__jp">来場予約</span></a>
        </li>
        <li class="c-navigation__list__item">
          <a href="<?php echo esc_url(home_url('/')); ?>contact/" class="c-navigation__list__link">CONTACT<span class="c-navigation__list__jp">お問い合わせ</span></a>
        </li>
        <li class="c-navigation__list__item">
          <a href="<?php echo esc_url(home_url('/')); ?>access/" class="c-navigation__list__link">ACCESS<span class="c-navigation__list__jp">アクセス</span></a>
        </li>
      </ul>
    </nav>
  </div>
</div>

    <div class = "p-hamburger__fixedNav">
      <div class = "p-hamburger__menu__wrap">
        <p class = "p-hamburger__menu">
          MENU
        </p>
        <div id="js-openHamburger" class = "p-hamburger__button">
          <span class="p-hamburger__button__line"></span>
          <span class="p-hamburger__button__line"></span>
          <span class="p-hamburger__button__line"></span>
        </div>
      </div>
      
      <div class = "p-hamburger__fixedNav__buttonWrap">
        <a data-fancybox data-type="iframe" data-src="<?php echo esc_url (get_template_directory_uri() ); ?>/dist/video/video03.mp4" href="javascript:;" class = "c-button--jpSmall u-none__mobile--lg">
          CM動画を再生する
        </a>
        <ul class = "p-hamburger__fixedNav__snsList">
          <li class = "p-hamburger__fixedNav__snsItem"><a href = "https://page.line.me/489odzve?openQrModal=true"><img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/common/line.png"></a></li>
          <li class = "p-hamburger__fixedNav__snsItem"><a href = "https://www.instagram.com/smilebuilders.aira.hiraya/"><img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/common/instagram.png"></a></li>
          <li class = "p-hamburger__fixedNav__snsItem"><a href = "https://www.youtube.com/@smile-builders.hiraya"><img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/common/youtube.png"></a></li>
        </ul>
        <div class = "p-hamburger__fixedNav__bottomWrap">
          <a href = "<?php echo esc_url(home_url("/")); ?>reserve/" class = "p-hamburger__fixedNav__button">来場予約</a>
          <a href = "<?php echo esc_url(home_url("/")); ?>contact/" class = "p-hamburger__fixedNav__button">お問い合わせ</a>
          <a href="<?php echo esc_url(home_url('/')); ?>event-company/" class = "p-hamburger__fixedNav__button">イベント</a>
          <a href="<?php echo esc_url(home_url("/")); ?>/exhibition"  class = "p-hamburger__fixedNav__button">展示場案内</a>
        </div>
      </div>
    </div>
    <div id="js-hamburger" class="p-hamburger">
      <div class="p-hamburger__nav" id = "js-hamburger__nav">
        <ul class="p-hamburger__nav__list">
          <li class="p-hamburger__nav__item">
            <a href="<?php echo esc_url(home_url()); ?>" class="p-hamburger__nav__link">TOP<span class = "p-hamburger__nav__jp">トップ</span></a>
          </li>
          <li class="p-hamburger__nav__item">
            <a href="<?php echo esc_url(home_url("/")); ?>exhibition/" class="p-hamburger__nav__link">EXHIBITIONHALL<span class = "p-hamburger__nav__jp">展示場案内</span></a>
          </li>
          <!-- <li class="p-hamburger__nav__item">
            <a href="<?php echo esc_url(home_url('/')); ?>event-company/company-term/smilebuilders" class="p-hamburger__nav__link">EVENT<span class = "p-hamburger__nav__jp">イベント情報</span></a> 
          </li> -->
          <li class="p-hamburger__nav__item">
            <a href="<?php echo esc_url(home_url("/")); ?>event-company/" class="p-hamburger__nav__link">EVENT<span class = "p-hamburger__nav__jp">展示場イベント一覧</span></a>
          </li>
          <li class="p-hamburger__nav__item">
            <a href="<?php echo esc_url(home_url("/")); ?>reserve/" class="p-hamburger__nav__link">RESERVATION<span class = "p-hamburger__nav__jp">来場予約</span></a>
          </li>
          <li class="p-hamburger__nav__item">
            <a href="<?php echo esc_url(home_url('/')); ?>contact/" class="p-hamburger__nav__link">CONTACT<span class = "p-hamburger__nav__jp">お問い合わせ</span></a>
          </li>
          <li class="p-hamburger__nav__item">
            <a href="<?php echo esc_url(home_url('/')); ?>access/" class="p-hamburger__nav__link">ACCESS<span class = "p-hamburger__nav__jp">アクセス</span></a>
          </li>
        </ul>
        <ul class = "p-hamburger__fixedNav__snsList--open u-mb50">
          <li class = "p-hamburger__fixedNav__snsItem"><a href = "https://page.line.me/489odzve?openQrModal=true"><img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/common/line.png"></a></li>
          <li class = "p-hamburger__fixedNav__snsItem"><a href = "https://www.instagram.com/smilebuilders.aira.hiraya/"><img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/common/instagram.png"></a></li>
          <li class = "p-hamburger__fixedNav__snsItem"><a href = "https://www.youtube.com/@smile-builders.hiraya"><img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/common/youtube.png"></a></li>
        </ul>
        <a data-fancybox data-type="iframe" data-src="<?php echo esc_url (get_template_directory_uri() ); ?>/dist/video/video03.mp4" href="javascript:;" class = "c-button--jp u-marginAuto">
          CM動画を再生する
        </a>
      </div>
    </div>
  </header>

  <?php if ( ! is_front_page() && ! is_404() ): ?>
    <style>
      body{
        padding-top: var(--headerHeight);
      }
      .l-header {
          background:#231815;
      }
      .c-navigation__list__link{
        color:#fff !important;
      }
      .c-navigation__list__jp{
        color:#fff !important;
      }
    </style>
  <?php endif; ?>
  

  
