<?php 
function wazeka_scripts(){

  wp_enqueue_script('jquery');
  //slick
  wp_enqueue_script('slick-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js', array('jquery'), '1.9.0', true);
  //vegas
  wp_enqueue_script('vegas-script', 'https://cdnjs.cloudflare.com/ajax/libs/vegas/2.4.4/vegas.min.js', array('jquery'), '2.4.4', true);
  //fancy-box
  wp_enqueue_script('fancy-box','https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js',array('jquery'),'3.5.7', true);
  wp_enqueue_script(
  'wazeka-common',
  get_template_directory_uri() .'/dist/js/main.js',
  array(),
  '1.0.0',
  true
  );
  if ( is_front_page()) {
    wp_enqueue_script(
      'wazeka-top',
      get_template_directory_uri() .'/dist/js/top.js',
      array(),
      '1.0.0',
      true
    ); 
  } 
  if (is_singular('exhibition')|| is_singular('company-event')){
    wp_enqueue_script(
      'wazeka-exhibition',
      get_template_directory_uri() .'/dist/js/exhibition.js',
      array(),
      '1.0.0',
      true
    ); 
  } 
  if (is_singular('company-event')){
    wp_enqueue_script(
      'wazeka-company-event',
      get_template_directory_uri() .'/dist/js/company.js',
      array(),
      '1.0.0',
      true
    ); 
  } 
  if (is_page('smilebuilders')){
    wp_enqueue_script(
      'wazeka-smilebuilders',
      get_template_directory_uri() .'/dist/js/smilebuilders.js',
      array(),
      '1.0.0',
      true
    ); 
  } 
 

  
  // defer属性を付与する
  wp_script_add_data('wazeka-common', 'defer', true);
  wp_script_add_data('wazeka-top', 'defer', true);
  wp_script_add_data('wazeka-exhibition', 'defer', true);
  wp_script_add_data('wazeka-company-event', 'defer', true);

  //css読み込み
  wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/src/style.css', array(), '1.0.0' );
  //vegas
  wp_enqueue_style('vegas-style', 'https://cdnjs.cloudflare.com/ajax/libs/vegas/2.5.4/vegas.css', array(), '2.5.4');
  //slick
  wp_enqueue_style( 'slick-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css', array(), '1.9.0' );
  wp_enqueue_style( 'slick-carousel-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css', array(), '1.9.0' );
  //fancy-box
  wp_enqueue_style( 'fancy-box-css', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css', array(), '3.5.7' );
}

add_action('wp_enqueue_scripts','wazeka_scripts');

//サムネイル有効化
function irodori_theme(){
  add_theme_support('post-thumbnails');
}

add_action('after_setup_theme','irodori_theme');

//the_archive_titleで表示されるアーカイブという記述を削除
function remove_archive_prefix($title) {
  return preg_replace('/^アーカイブ: /', '', $title);
}
add_filter('get_the_archive_title', 'remove_archive_prefix');

//the_archive_titleで表示されるspanタグを削除
function remove_archive_span_tag($title) {
  return strip_tags($title); // タグを削除して返す
}
add_filter('get_the_archive_title', 'remove_archive_span_tag');

//search.phpで検索結果の表示のためのループはメインクエリ、メインループを使用するので、制御したい場合は、
//サブループを使用せずに、functions.phpでフィルターフックを使用する
//seach.phpの結果表示をカスタム投稿タイプblogに制限する
/*function custom_search_filter($query) {
  if ($query->is_search && !is_admin()) {
      $query->set('post_type', array('blog'));
  }
  return $query;
}
add_filter('pre_get_posts', 'custom_search_filter');*/

//seach.phpでページネーションが使用できるようにpagedを設定する。
//1ページの表示件数を3件に設定する
function custom_search_pagination($query) {
  if ($query->is_search && !is_admin()) {
      $query->set('posts_per_page', 5); // 1ページあたりの投稿数
      $query->set('paged', get_query_var('paged') ? get_query_var('paged') : 1);
  }
  return $query;
}
add_filter('pre_get_posts', 'custom_search_pagination');

//the_excerptで表示される文字数を20文字に設定
function custom_excerpt_length( $length ) {
  return 20; // 20文字に設定する場合
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

//アドミンバーが表示されたときの余白を消す
if ( is_admin_bar_showing() ) {
  // Add inline styles to the head to adjust the body's margin-top
  add_action( 'wp_head', function() {
      echo '<style type="text/css">
          body {
              margin-top: -32px !important;
          }
          @media screen and (max-width: 768px) {
              body {
                  margin-top: -45.99px !important;
              }
          }
      </style>';
  });
}



//自動出力されるｐタグを出力させない
function custom_remove_paragraph_from_content( $content ) {
  $content = preg_replace( '/<p>/', '', $content );
  $content = preg_replace( '/<\/p>/', '', $content );
  return $content;
}
add_filter( 'the_content', 'custom_remove_paragraph_from_content' );

add_filter( 'show_admin_bar', '__return_false' );


//デフォルトの投稿を削除
function remove_default_post_type()
{
  remove_menu_page('edit.php'); // 投稿メニューを削除
}
add_action('admin_menu', 'remove_default_post_type');


function add_menu_order_support_to_all_post_types() {
  $post_types = get_post_types(array('public' => true), 'names'); // 公開されている全投稿タイプを取得

  foreach ($post_types as $post_type) {
      add_post_type_support($post_type, 'page-attributes'); // 各投稿タイプに順序付けを追加
  }
}
add_action('init', 'add_menu_order_support_to_all_post_types');





// 20241225 KengakuCloud埋込 START
// ショートコードで指定された KCイベントのカレンダーを読み込む関数
function kc_calendar($atts)
{
  $id = mb_substr($atts[0], -5);
  $gtag_id = "";
  if($atts[1]){
	$gtag_id = $atts[1];
  }

  return '<!-- KengakuCloudカレンダー埋込 start -->'
  . '<script>'
  . 'function kccalender(event_url, target_id, gtag_id) {'
    . 'window.addEventListener("load", function() {'
      . 'try {'
        . 'var src_str = event_url + "/calendar?mode=iframe";'
        . 'var base = document.getElementById(target_id);'
        . 'var obj = document.createElement("iframe");'
        . 'obj.setAttribute("frameBorder", "0");'
        . 'obj.setAttribute("width", "660");'
        . 'obj.setAttribute("height", "810");'
        . 'obj.setAttribute("aria-hidden", "false");'
        . 'obj.setAttribute("tabindex", "0");'
        . 'obj.setAttribute("loading", "lazy");'

        . 'var uri = new URL(window.location.href);'
        . 'var backPath = uri.href;'
        . 'var hostname = uri.hostname;'
        . 'var ipAddressPattern = /^\d+\.\d+\.\d+\.\d+$/;'
        . 'if (ipAddressPattern.test(hostname)) {'
          . 'hostname = "ip";'
        . '}'
        . 'src_str = src_str + "&kc_source=" + hostname + "&utm_store_kc=true";'

        . 'if(gtag_id) {'
          . 'const clientIdPromise = new Promise(resolve => {'
            . 'gtag("get", gtag_id, "client_id", resolve);'
          . '});'
          . 'const sessionIdPromise = new Promise(resolve => {'
            . 'gtag("get", gtag_id, "session_id", resolve);'
          . '});'
          . 'Promise.all([clientIdPromise, sessionIdPromise]).then(function(ret) {'
            . 'if(ret[0] && ret[1]) {'
              . 'const linkParams = "client_id=" + ret[0] + "&session_id=" + ret[1];'
              . 'src_str = src_str + "&" + linkParams;'
            . '}'
          . '}).catch(() => {'
            . 'console.log("Promise.all error");'
          . '}).finally(() => {'
            . 'obj.setAttribute("src", src_str);'
            . 'base.appendChild(obj);'
          . '});'
        . '} else {'
          . 'obj.setAttribute("src", src_str);'
          . 'base.appendChild(obj);'
        . '}'
      . '} catch(error) {'
        . 'console.error(error);'
        . 'obj.setAttribute("src", src_str);'
        . 'base.appendChild(obj);'
      . '}'
    . '});'
  . '}'
  . '</script>'
  . '<style>'
  . '.kc-calendar-wrapper .kc-calendar-title {'
    . 'border-top: 1px solid #ddd;'
    . 'border-bottom: 1px solid #ddd;'
    . 'line-height: 1.5;'
    . 'padding: 12px 0 10px;'
    . 'margin: 0 auto;'
    . 'text-align: center;'
    . 'font-size: 18px;'
    . 'display: flex;'
    . 'justify-content: center;'
    . 'align-items: center;'
    . 'max-width: 640px;'
  . '}'  
  . '.kc-calendar-wrapper .kc-calendar-title span {'
    . 'width: 20px;'
    . 'height: 24px;'
    . 'margin-right: 6px;'
  . '}'  
  . '.kc-calendar-wrapper iframe {'
    . 'width: 100%;'
  . '}'
  . '.kc-calendar{'
    .  'text-align: center;'
    .  'background: transparent;'
    .  'height: 770px;'
  .'}'
  . '.kc-calendar-wrapper{'
    . 'max-width: 830px;'
    . 'width: 100%;'
    . 'margin:0 auto 160px;'
    . 'padding:60px 20px 0;'
    . 'background: #fff;'
  .'}'
  .'@media screen and (max-width: 768px){'
    .'.kc-calendar{'
      .'margin-left: auto;'
      .'margin-right: auto;'
    .'}'
  .'}'
  .'@media screen and (max-width: 640px){'
    .'.kc-calendar{'
      .'height: 760px;'
    .'}'
    .'.kc-calendar iframe{'
      .'height: 760px;'
    .'}'
  .'}'
  . '</style>'

  . '<div class="kc-calendar-wrapper"><p class="kc-calendar-title"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Free 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. --><path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" style="fill:#333;"/></svg></span>予約可能日時</p>'
  . '<div id="kc-calendar' . $id . '" class="kc-calendar"></div></div>'
  . '<script>'
  . 'kccalender("' . $atts[0] . '", "kc-calendar' . $id . '", "' . $gtag_id . '");'
  . '</script>'
  . '<!-- KengakuCloudカレンダー埋込 end -->';
}
add_shortcode('kccal', 'kc_calendar');
// 20241225 KengakuCloud埋込 END


















  

















