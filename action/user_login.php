<?php
//ログインするためのPHP
  session_start();
  require_once "../DB/mydb.php";

  //ID、passwordで既存にあるかどうか確認する
  try {
    $pdo = db_connect();
    $sql = "SELECT * FROM members where id=:id AND password=:password";
    $stt = $pdo->prepare($sql);
    $stt->bindValue(':id',$_POST['id']);
    $stt->bindValue(':password',$_POST['password']);
    $stt->execute();
    $result = $stt->rowCount();
    $row = $stt->fetch(PDO::FETCH_ASSOC);

    //DBにないログイン情報なら
    if(!$result){

        print ("<script>window.alert('IDまたはpasswordを確認して下さい');
        history.go(-1);
        </script>");

    }//end of if(!$result)
    else{
        //DBにあるログイン情報なら
        $db_pass = $row['password'];
        print $_POST['password'];
        print $db_pass;

        if($_POST['password'] == $db_pass){
			print ("<script>alert('ログイン成功')</script>");

			$_SESSION['userid'] = $_POST['id'];
			$_SESSION['password'] = $_POST['password'];

			print ("<script>location.replace('../index.php');</script>");
        }//end of if($_POST['password'] == $db_pass)
    }//end of if(!$result) else
  } catch (PDOException $e) {
    $e->getMessage();
  }

?>
