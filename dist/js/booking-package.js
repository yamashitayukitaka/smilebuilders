(function($){ 
  $('.p-company-event__bookingWrap').click(function() {
    const calenderHeight = document.getElementById('booking-package_calendarPage').offsetHeight;
    const headerHeight = document.getElementById("js-measure").offsetHeight;
    const target = $(this).offset().top - headerHeight + calenderHeight - 100; 
    $('html, body').animate({ scrollTop: target },0); // 0 はアニメーションの時間（ミリ秒）
  });
})(jQuery);