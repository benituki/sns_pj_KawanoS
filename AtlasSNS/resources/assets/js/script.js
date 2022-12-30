// アコーディオンメニューjs(2022/12/30)
$('.menu-btn').click(function(){
  $(this).toggleClass('is-open');
  $(this).siblings('.menu').toggleClass('is-open');
});