<?php
  session_start();
  require_once "../DB/mydb.php";

  //¤•i‚Ìs“®‚ÉŠÖ‚·‚éƒNƒ‰ƒX
  class GoodsFunc{

    //$nameMenu¤•i‚Ì–¼‘OA‰½ŒÂ”ƒ‚¤‚©‚Ì”š‚ÅİŒÉ‚ğƒAƒbƒvƒf[ƒg
    function SetUpdateBalance($nameMenu, $numMenu){
    try {

		//¤•i‚ÌİŒÉ‚ğæ‚é
        $pdo            = db_connect();
        $sql            = "SELECT * FROM goods WHERE menu_name = :menuname";

        $stt            = $pdo->prepare($sql);
        $stt->bindValue(':menuname',        $nameMenu);
        $stt->execute();
        $row            = $stt->fetch(PDO::FETCH_ASSOC);

        //İŒÉ‚ª‚È‚¢ê‡
        if($row['menu_balance'] < 0){

          print "<script>alert('İŒÉ‚ª‚ ‚è‚Ü‚¹‚ñ.');</script>";
          print "<script>history.go(-1);</script>";

        }else {
		//İŒÉ‚ª‚ ‚éê‡
			
			//“ü—Í‚µ‚½”‚æ‚èİŒÉ‚ª­‚È‚¢ê‡
			if($row['menu_balance'] - $numMenu < 0){

				print "<script>alert('ú´E¬ E¬E E€ EEŠµEˆë‹¤.');</script>";
				print "<script>history.go(-1);</script>";

			}else {

            //İŒÉ‚ª\•ª‚È‚ç“ü—Í‚³‚ê‚Ä‚¢‚é”š‚É“–‚½‚éİŒÉ‚Ì”‚ğŒ¸‚ç‚·
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

    //ƒJ[ƒg‚É¤•i‚ğ“ü‚ê‚éƒNƒ‰ƒX
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

    //İŒÉ‚ğŒ³‚É–ß‚·
    function backbalance($menu_name, $menu_num){
	     
		//•Û‘¶‚³‚ê‚Ä‚¢‚é”š‚ğæ‚Á‚Ä‚»‚±‚ÉƒJ[ƒg‚É•Û‘¶‚³‚ê‚Ä‚¢‚é¤•i‚Ì”š‚ğ‰Á‚¦‚é
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

    //¤•i‚ğíœ‚·‚é
	//history‚Æ‚¢‚¤‚Ì‚ÍH
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

    //V‚½‚É¤•i‚ğ“o˜^‚·‚é
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
			  print "<script>alert('EE’ˆ E±EEEE£E)</script>";
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
