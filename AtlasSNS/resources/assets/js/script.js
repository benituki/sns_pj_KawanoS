<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script>
{/* // アコーディオンメニューjs(2022/12/30) */}
jQuery(function ($) {
    $('.js-accordion-title').on('click', function () {
      /*クリックでコンテンツを開閉*/
      $(this).next().slideToggle(200);
      /*矢印の向きを変更*/
      $(this).toggleClass('open', 200);
    });
    
    });
</script>