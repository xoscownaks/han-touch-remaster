<?php
//全ての商品をSESSIONに保存する→全てのページでデータを扱うため
//HACK:商品が追加される次第にその商品に当たるコードを書かなければならない→修正必要
	session_start();

	if(isset($_POST['coke_num'])){
		if(is_numeric($_POST['coke_num'])){

			print "<script>alert('商品入れました')</script>";
			$_SESSION['coke_num'] = $_POST['coke_num'];
			print "<script>window.close();</script>";

		}else{

			print "<script>alert('数字を入力してください');</script>";
			print "<script>history.go(-1)</script>";

		}
	}

  if(isset($_POST['sprite_num'])){
		if(is_numeric($_POST['sprite_num'])){
			print "<script>alert('・・宙・・・ｴ・們慣・壱共.')</script>";
      $_SESSION['sprite_num'] = $_POST['sprite_num'];
      print "<script>window.close();</script>";
		}else{
      print "<script>history.go(-1)</script>";
		}
  }

	if(isset($_POST['burger1_num'])){
		if(is_numeric($_POST['burger1_num'])){
			print "<script>alert('・・宙・・・ｴ・們慣・壱共.')</script>";
      $_SESSION['burger1_num'] = $_POST['burger1_num'];
      print "<script>window.close();</script>";
		}else{
			print "<script>alert('・ｫ・尖･ｼ ・・･﨑們┷・・);</script>";
    	print "<script>history.go(-1)</script>";
		}
  }

	if(isset($_POST['burger2_num'])){
		if(is_numeric($_POST['burger2_num'])){
			print "<script>alert('・・宙・・・ｴ・們慣・壱共.')</script>";
      $_SESSION['burger2_num'] = $_POST['burger2_num'];
    	print "<script>window.close();</script>";
		}else{
			print "<script>alert('・ｫ・尖･ｼ ・・･﨑們┷・・);</script>";
      print "<script>history.go(-1)</script>";
		}
	}

	if(isset($_POST['burger3_num'])){
		if(is_numeric($_POST['burger3_num'])){
			print "<script>alert('・・宙・・・ｴ・們慣・壱共.')</script>";
      $_SESSION['burger3_num'] = $_POST['burger3_num'];
      print "<script>window.close();</script>";
		}else{
			print "<script>alert('・ｫ・尖･ｼ ・・･﨑們┷・・);</script>";
      print "<script>history.go(-1)</script>";
		}
	}

 	if(isset($_POST['burger4_num'])){
		if(is_numeric($_POST['burger4_num'])){
			print "<script>alert('・・宙・・・ｴ・們慣・壱共.')</script>";
      $_SESSION['burger4_num'] = $_POST['burger4_num'];
      print "<script>window.close();</script>";
		}else{
			print "<script>alert('・ｫ・尖･ｼ ・・･﨑們┷・・);</script>";
      print "<script>history.go(-1)</script>";
		}
	}
?>
