<?php
  session_start();
  require_once "../DB/mydb.php";

  //���i�̍s���Ɋւ���N���X
  class GoodsFunc{

    //$nameMenu���i�̖��O�A���������̐����ō݌ɂ��A�b�v�f�[�g
    function SetUpdateBalance($nameMenu, $numMenu){
    try {

		//���i�̍݌ɂ����
        $pdo            = db_connect();
        $sql            = "SELECT * FROM goods WHERE menu_name = :menuname";

        $stt            = $pdo->prepare($sql);
        $stt->bindValue(':menuname',        $nameMenu);
        $stt->execute();
        $row            = $stt->fetch(PDO::FETCH_ASSOC);

        //�݌ɂ��Ȃ��ꍇ
        if($row['menu_balance'] < 0){

          print "<script>alert('�݌ɂ�����܂���.');</script>";
          print "<script>history.go(-1);</script>";

        }else {
		//�݌ɂ�����ꍇ
			
			//���͂��������݌ɂ����Ȃ��ꍇ
			if($row['menu_balance'] - $numMenu < 0){

				print "<script>alert('���E�� �E��E��E� �E�E���E�다.');</script>";
				print "<script>history.go(-1);</script>";

			}else {

            //�݌ɂ��\���Ȃ���͂���Ă��鐔���ɓ�����݌ɂ̐������炷
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

    //�J�[�g�ɏ��i������N���X
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

    //�݌ɂ����ɖ߂�
    function backbalance($menu_name, $menu_num){
	     
		//�ۑ�����Ă��鐔��������Ă����ɃJ�[�g�ɕۑ�����Ă��鏤�i�̐�����������
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

    //���i���폜����
	//history�Ƃ����̂́H
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

    //�V���ɏ��i��o�^����
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
			  print "<script>alert('�E�E�� �E��E�E�E�E��E)</script>";
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
