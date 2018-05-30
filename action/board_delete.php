<?php
//掲示板のPOSTを消すphp

    require_once "../DB/mydb.php";
    session_start();

    $Bno = $_POST['bno'];

	//POSTを作成したユーザーのpasswordと入力したpasswordが一致したら削除
	//一致しないとしない
    try{
        $pdo    = db_connect();
        
        $DelPs  = $_POST['delete_check_password'];

        $sql    = "SELECT * FROM board	WHERE		board_num　=　:board_n
										AND		board_password　=　:board_ps";

        $stt = $pdo->prepare($sql);
        $stt->bindValue(':board_n',$Bno);
        $stt->bindValue(':board_ps',$DelPs);
        $stt->execute();
        $result = $stt->rowCount();

		//一致の場合削除する
        if($result && $_SESSION['password'] == $DelPs){

            $sql = "DELETE FROM board WHERE board_num=:board_n";

        }else{

            print "<script>alert('また入力してください');history.back();</script>";

        }
        $stt = $pdo->prepare($sql);
        $stt->bindValue(':board_n',$Bno);
        $stt->execute();
        $result = $stt->rowCount();

        if($result){

            print "<script>alert('削除完了')</script>";
            print ("<script>location.replace('../form/boardform.php');</script>");
        }
    }catch (Exception $e){
        $e->getMessage();
    }
