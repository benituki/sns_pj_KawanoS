//ドロップダウンの設定を関数でまとめる
// function mediaQueriesWin(){
// 	var width = $(window).width();
	
// 	if(width <= 768) {//横幅が768px以下の場合 $(".accordion>a").off('click');	//accordionクラスがついたaタグのonイベントを複数登録を避ける為offにして一旦初期状態へ
// 		$(".accordion>a").on('click', function() {//accordionクラスがついたaタグをクリックしたら
// 			var parentElem =  $(this).parent();// aタグから見た親要素のliを取得し
// 			$(parentElem).toggleClass('active');//矢印方向を変えるためのクラス名を付与して
// 			$(parentElem).children('ul').stop().slideToggle(600);//liの子要素のスライドを開閉させる※数字が大きくなるほどゆっくり開く
// 			return false;//リンクの無効化
// 		});
// 	}else{//横幅が768px以上の場合
// 		$(".accordion>a").off('click');//accordionクラスがついたaタグのonイベントをoff(無効)にし
// 		$(".accordion").removeClass('active');//activeクラスを削除
// 		$('.accordion').children('ul').css("display","");//スライドトグルで動作したdisplayも無効化にする
// 	}
// }

// ページがリサイズされたら動かしたい場合の記述
// $(window).resize(function() {
// 	mediaQueriesWin();/* ドロップダウンの関数を呼ぶ*/
// });

// ページが読み込まれたらすぐに動かしたい場合の記述
// $(window).on('load',function(){
// 	mediaQueriesWin();/* ドロップダウンの関数を呼ぶ*/
// });

// $ (function() {
//     $(".drawer").click (function() {
//       $(".drawer-list").slideToggle();
//     });
//   });

// $ (function() {
// 	$(".drawer").on("click", function()
// 	{
// 		$(".drawer").not(this).removerClass("open");
// 		$(".drawer").not(this).next().slideUp(200);
// 		$(this).toggleClass("open");
// 		$(this).next().slideToggle(200);
// 	});
// });

// アコーディオンメニュー
const parentMenu = document.querySelectorAll(".menu > li > a");
for (let i = 0; i < parentMenu.length; i++) {
	parentMenu[i].addEventListener("click", function(e){
		e.preventDefault();
		this.classList.toggle("active");
		this.nextElementSibling.classList.toggle("active");
	})
}

// アコーディオンメニュー終わり

$(function(){
    // 編集ボタン(class="js-modal-open")が押されたら発火
    $('.js-modal-open').on('click',function(){
        // モーダルの中身(class="js-modal")の表示
        $('.js-modal').fadeIn();
        // 押されたボタンから投稿内容を取得し変数へ格納
        var post = $(this).attr('post');
        // 押されたボタンから投稿のidを取得し変数へ格納（どの投稿を編集するか特定するのに必要な為）
        var post_id = $(this).attr('post_id');

        // 取得した投稿内容をモーダルの中身へ渡す
        $('.modal_post').text(post);
        // 取得した投稿のidをモーダルの中身へ渡す
        $('.modal_id').val(post_id);
        return false;
    });

    // 背景部分や閉じるボタン(js-modal-close)が押されたら発火
    $('.js-modal-close').on('click',function(){
        // モーダルの中身(class="js-modal")を非表示
        $('.js-modal').fadeOut();
        return false;
    });
});

