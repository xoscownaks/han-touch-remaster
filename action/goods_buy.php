<?php
//ここは商品をカートに入れるPHP
  require_once "goodsAction.php";
  
	//ユーザーが商品の何個買うか決めて入れるボタンを押したら
	if(isset($_POST['inputNum']) && is_numeric($_POST['num'])){

		print "<script>alert('・・宙・・・ｴ・們慣・壱共.');</script>";

		$numMenu    = $_POST['num'];
		$nameMenu   = $_POST['menu_name'];
		$imgMenu    = $_POST['menu_img'];
		$priceMenu  = $_POST['menu_price'];
		$goods_func = new goodsfunc();

		//カートに入れたら在庫を減らす
		$goods_func->SetUpdateBalance($nameMenu, $numMenu);

		//カートに商品を入れる
		$goods_func->SetInputCart($nameMenu, $numMenu, $imgMenu, $priceMenu);

		print "<script>history.go(-1);</script>";

	}else {

		print "<script>alert('・ｫ・尖･ｼ ・・･﨑們┷・・);</script>";
		print "<script>history.go(-1);</script>";

	}	

?>
