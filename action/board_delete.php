<?php
//�f����POST������php

    require_once "../DB/mydb.php";
    session_start();

    $Bno = $_POST['bno'];

	//POST���쐬�������[�U�[��password�Ɠ��͂���password����v������폜
	//��v���Ȃ��Ƃ��Ȃ�
    try{
        $pdo    = db_connect();
        
        $DelPs  = $_POST['delete_check_password'];

        $sql    = "SELECT * FROM board	WHERE		board_num�@=�@:board_n
										AND		board_password�@=�@:board_ps";

        $stt = $pdo->prepare($sql);
        $stt->bindValue(':board_n',$Bno);
        $stt->bindValue(':board_ps',$DelPs);
        $stt->execute();
        $result = $stt->rowCount();

		//��v�̏ꍇ�폜����
        if($result && $_SESSION['password'] == $DelPs){

            $sql = "DELETE FROM board WHERE board_num=:board_n";

        }else{

            print "<script>alert('�܂����͂��Ă�������');history.back();</script>";

        }
        $stt = $pdo->prepare($sql);
        $stt->bindValue(':board_n',$Bno);
        $stt->execute();
        $result = $stt->rowCount();

        if($result){

            print "<script>alert('�폜����')</script>";
            print ("<script>location.replace('../form/boardform.php');</script>");
        }
    }catch (Exception $e){
        $e->getMessage();
    }
