<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
// Template Name: access
get_header();
?>

<div class = "c-title__wrap">
  <div class = "l-content--percent">
    <h3 class = "c-title--section">
      Access&nbsp;/&nbsp;
      <span class = "c-title--sectionJp">
        各社からのイベント情報
      </span>
    </h3>
    <ul class = "p-bread__list">
      <li class = "p-bread__list__item"><a class = "p-bread__list__link" href = "<?php echo esc_url (home_url() ); ?>">ホーム</a>&nbsp;>&nbsp;</li>
      <li class = "p-bread__list__item">アクセス</li>
    </ul>
  </div>
</div>
<main class= "p-access">
  <div class = "p-access__content">
  
    <div class="p-access__mapWrap js-up u-opacity">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13573.017706186498!2d130.6496124!3d31.7362556!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x353ef94b9b1eaa17%3A0x122f4fc93343c613!2z44K544Oe44Kk44Or44O744OT44Or44OA44O844K65ae26Imv57eP5ZCI5L2P5a6F5bGV56S65aC0!5e0!3m2!1sja!2sjp!4v1716444028777!5m2!1sja!2sjp" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    
    <dl>
      <dt class = "p-access__dt">スマイル・ビルダーズ姶良総合住宅展示場</dt>
      <dd class = "p-access__dd">〒899-5241 鹿児島県姶良市加治木町木田２５１１−１</dd>
      <dt class = "p-access__dt">【最寄り駅】</dt>
      <dd class = "p-access__dd">
        錦江 [JR日豊本線(佐伯～鹿児島中央)]
        <br>約480メートル　徒歩6分
      </dd>
      <dt class = "p-access__dt">【最寄りバス停】</dt>
      <dd class = "p-access__dd">
        須崎口１０号［鹿児島空港線・下り］
        <br>約530メートル　徒歩7分
      </dd>
    </dl>

  </div>
</main>
<?php get_footer(); ?>