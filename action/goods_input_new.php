<?php
//�V�������i��o�^���邽�ߏ��𐮗�����PHP
  require_once "../DB/mydb.php";
  require_once "goodsAction.php";

  $menu_name = $_POST['menu_name'];
    
  try {
    $pdo = db_connect();
    $sql = "SELECT * FROM goods WHERE menu_name='$menu_name'";
    $stt = $pdo->prepare($sql);
    $stt->execute();
    $result = $stt->rowCount();
    //�����̏��i�̒��Ɣ�ׂē������i������ꍇ
    if($result){

      print "<script>alert('�E��E� �E��E����는 �E�E���E�E���E�.')</script>";
      print "<script>history.go(-1)</script>";

    }//�����̏��i�̒��Ɣ�ׂē������i���Ȃ��ꍇ
    else {
		//�t�@�C���̏����𖳎��Ɏ������
		if(isset($_FILES['uploadfile']) && !$_FILES['uploadfile']["error"]){
			//�C���[�W�t�@�C����type�����肳���ăC���[�W�̃t�@�C�����ǂ������f
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
			  print "<script>alert('�t�@�C���̃^�C�v���������Ȃ�')</script>";
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

	//�����������ŏ��i������DB�ɓo�^����
    $goodsfunc->inputNewGoods(	$menu_name,�@	$menu_img,�@	$menu_price,�@
								$menu_balance,	$menu_calorie,	$menu_explain);

  } catch (Exception $e) {
		$e->getMessage();
  }//end of try~catch


?>
