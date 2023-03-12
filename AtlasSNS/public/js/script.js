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

//編集画面モーダル
$(function(){ // if document is ready
	alert('hello world')
  });