<?php
//���O�C�����邽�߂�PHP
  session_start();
  require_once "../DB/mydb.php";

  //ID�Apassword�Ŋ����ɂ��邩�ǂ����m�F����
  try {
    $pdo = db_connect();
    $sql = "SELECT * FROM members where id=:id AND password=:password";
    $stt = $pdo->prepare($sql);
    $stt->bindValue(':id',$_POST['id']);
    $stt->bindValue(':password',$_POST['password']);
    $stt->execute();
    $result = $stt->rowCount();
    $row = $stt->fetch(PDO::FETCH_ASSOC);

    //DB�ɂȂ����O�C�����Ȃ�
    if(!$result){

        print ("<script>window.alert('ID�܂���password���m�F���ĉ�����');
        history.go(-1);
        </script>");

    }//end of if(!$result)
    else{
        //DB�ɂ��郍�O�C�����Ȃ�
        $db_pass = $row['password'];
        print $_POST['password'];
        print $db_pass;

        if($_POST['password'] == $db_pass){
			print ("<script>alert('���O�C������')</script>");

			$_SESSION['userid'] = $_POST['id'];
			$_SESSION['password'] = $_POST['password'];

			print ("<script>location.replace('../index.php');</script>");
        }//end of if($_POST['password'] == $db_pass)
    }//end of if(!$result) else
  } catch (PDOException $e) {
    $e->getMessage();
  }

?>
