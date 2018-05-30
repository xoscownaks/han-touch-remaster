<?php
//カートに入れた商品を取り消すPHP
  require_once "goodsAction.php";

  $nameMenu     = $_POST['menu_name'];
  $numMenu      =  $_POST['menu_num'];

  //商品の動作に関するクラス
  $goods_func   = new goodsfunc();

  //在庫を減らす前に戻る
  $goods_func->backbalance($nameMenu, $numMenu);

  //カートから商品を消す
  $goods_func->deletehistory($nameMenu, $numMenu);

  print "<script>history.go(-1)</script>";
?>
