<?php
//新しい商品を登録するため情報を整理するPHP
  require_once "../DB/mydb.php";
  require_once "goodsAction.php";

  $menu_name = $_POST['menu_name'];
    
  try {
    $pdo = db_connect();
    $sql = "SELECT * FROM goods WHERE menu_name='$menu_name'";
    $stt = $pdo->prepare($sql);
    $stt->execute();
    $result = $stt->rowCount();
    //既存の商品の中と比べて同じ商品がある場合
    if($result){

      print "<script>alert('・ｴ・ｸ ・ｴ・ｬ﨑俯株 ・・宙・・笈・､.')</script>";
      print "<script>history.go(-1)</script>";

    }//既存の商品の中と比べて同じ商品がない場合
    else {
		//ファイルの情報をを無事に取ったら
		if(isset($_FILES['uploadfile']) && !$_FILES['uploadfile']["error"]){
			//イメージファイルのtypeを限定させてイメージのファイルかどうか判断
			$imageKind = array ('image/jpeg', 'image/JPG', 'image/jpg', 'image/PNG', 'image/png');
			if(in_array($_FILES['uploadfile']['type'], $imageKind)){

				$filename = $_FILES['uploadfile']['name'];
				$filepath = $_FILES['uploadfile']['tmp_name'];
				$location = "../src/".$filename;
				move_uploaded_file($filepath,$location);

				$menu_name = $_POST['menu_name'];
				$menu_img = "src/".$filename;

			}//end of if(in_array($_FILES['uploadfile']['type'], $imageKind)
			else {
			  print "<script>alert('ファイルのタイプが正しくない')</script>";
			  print "<script>history.go(-1)</script>";
			}//end of if(in_array($_FILES['uploadfile']['type'], $imageKind) else
      }//end of if(isset($_FILES['uploadfile']) && !$_FILES['uploadfile']["error"])
    }//end of else
    $menu_price = $_POST['menu_price'];
    $menu_img = "src/".$filename;
    $menu_balance = $_POST['menu_balance'];
    $menu_calorie = $_POST['menu_calorie']."kcal";
    $menu_explain = $_POST['menu_explain'];

    $goodsfunc = new goodsfunc();

	//整理した情報で商品を実際DBに登録する
    $goodsfunc->inputNewGoods(	$menu_name,　	$menu_img,　	$menu_price,　
								$menu_balance,	$menu_calorie,	$menu_explain);

  } catch (Exception $e) {
		$e->getMessage();
  }//end of try~catch


?>
