<?php
  session_start();
  require_once "../DB/mydb.php";

  //商品の行動に関するクラス
  class GoodsFunc{

    //$nameMenu商品の名前、何個買うかの数字で在庫をアップデート
    function SetUpdateBalance($nameMenu, $numMenu){
    try {

		//商品の在庫を取る
        $pdo            = db_connect();
        $sql            = "SELECT * FROM goods WHERE menu_name = :menuname";

        $stt            = $pdo->prepare($sql);
        $stt->bindValue(':menuname',        $nameMenu);
        $stt->execute();
        $row            = $stt->fetch(PDO::FETCH_ASSOC);

        //在庫がない場合
        if($row['menu_balance'] < 0){

          print "<script>alert('在庫がありません.');</script>";
          print "<script>history.go(-1);</script>";

        }else {
		//在庫がある場合
			
			//入力した数より在庫が少ない場合
			if($row['menu_balance'] - $numMenu < 0){

				print "<script>alert('�ｴ・椪 ・ｬ・�・� ・・慣・壱共.');</script>";
				print "<script>history.go(-1);</script>";

			}else {

            //在庫が十分なら入力されている数字に当たる在庫の数を減らす
				$newbalance = $row['menu_balance'] - $numMenu;
				$sql        = "UPDATE goods SET menu_balance=:newbalance WHERE menu_name=:menuname";
				$stt        = $pdo->prepare($sql);
				$stt->bindValue(':newbalance',  $newbalance);
				$stt->bindValue(':menuname',    $nameMenu);
				$stt->execute();
			}
        }

      } catch (Exception $e) {
        $e->getMessage();
      }
    }

    //カートに商品を入れるクラス
    function SetInputCart($nameMenu, $numMenu, $imgMenu, $priceMenu){
		try {
			$userId      = $_SESSION['userid'];
			$pdo         = db_connect();

			$inputTime   = Date('Y-m-d H:i:s',time());

			$sql         = "INSERT INTO inputCart(inputmenu_id,   inputmenu_name,   inputmenu_num,
												  inputmenu_date, inputmenu_img,    inputmenu_price)";
			$sql        .= "VALUES ('$userId',      '$nameMenu',    '$numMenu',
									'$inputTime',   '$imgMenu',     '$priceMenu')";

			$stt         = $pdo->prepare($sql);
			$stt->execute();

			// inputCart table(structure)
			// inputmenu_id varchar(20) NOT NULL,
			// inputmenu_name varchar(100) NOT NULL,
			// inputmenu_num int NOT NULL,
			// inputmenu_date datetime NOT NULL,
			// inputmenu_img varchar(100) NOT NULL
			// inputmenu_price int NOT NULL,
		} catch (Exception $e) {
			$e->getMessage();
		}
    }

    //在庫を元に戻す
    function backbalance($menu_name, $menu_num){
	     
		//保存されている数字を取ってそこにカートに保存されている商品の数字を加える
		try {
			//goods
			// menu_name varchar(100) NOT NULL,
      		// menu_img varchar(500) NOT NULL,
			// menu_price int NOT NULL,
      		// menu_balance int NOT NULL,
			// menu_calorie varchar(100) NOT NULL,
			// menu_explain varchar(500)
			$pdo = db_connect();
			$sql = "SELECT menu_balance FROM goods WHERE menu_name = :menuname";
			$stt = $pdo->prepare($sql);
			$stt->bindValue(':menuname',$menu_name);
			$stt->execute();
			$result = $stt->rowCount();

			if($result){
			  $row = $stt->fetch(PDO::FETCH_ASSOC);
			  $newbalance = $row['menu_balance'] + $menu_num;

			  $sql = "update goods set menu_balance = $newbalance WHERE menu_name = '$menu_name'";

			  $stt = $pdo->prepare($sql);
			  $stt->execute();

			}
		  } catch (Exception $e) {
			$e->getMessage();
		  }
	}

    //商品を削除する
	//historyというのは？
    function deletehistory($buymenu_name, $buymenu_num){
      require_once "../DB/mydb.php";
      try {

        $id = $_SESSION['userid'];
        // buymenu_id varchar(20) NOT NULL,
        // buymenu_name varchar(100) NOT NULL,
        // buymenu_num int NOT NULL,
        // buymenu_date datetime NOT NULL,
        // buymenu_img varchar(500) NOT NULL,
        // buymenu_price int NOT NULL
        $pdo = db_connect();

        $sql = "DELETE FROM buyhistory	WHERE buymenu_id	= '$id' 
										AND buymenu_name	= '$buymenu_name' 
										AND buymenu_num		= $buymenu_num";

        $stt = $pdo->prepare($sql);
        $stt->execute();

      } catch (Exception $e) {
        $e->getMessage();
      }
    }

    //新たに商品を登録する
    function SetNewGoods($nameMenu,     $imgMenu,   $priceMenu,   $balanceMenu,
                         $calorieMenu,  $explainMenu){
		try {
			$pdo    = db_connect();

			$sql    = "INSERT INTO goods(menu_name,     menu_img,     menu_price,
										 menu_balance,  menu_calorie, menu_explain)";
			$sql   .= "VALUES('$nameMenu',      '$imgMenu',       '$priceMenu',
							  '$balanceMenu',   '$calorieMenu',   '$explainMenu')";

			$stt    = $pdo->prepare($sql);
			$stt->execute();
			$result = $stt->rowCount();

			if($result){
			  print "<script>alert('・・宙 ・ｱ・・・・｣・)</script>";
			  print "<script>location.replace('../index.php');</script>";
			}

			// goods tabel(structure)
			// menu_name varchar(100) NOT NULL,
			// menu_img varchar(500) NOT NULL,
			// menu_price int NOT NULL,
			// menu_balance int NOT NULL,
			// menu_calorie varchar(100) NOT NULL,
			// menu_explain varchar(500)

		  } catch (Exception $e) {
			$e->getMessage();
		  }
		}//end of SetNewGoods Function
	  }//end of GoodsFunc Class
?>
