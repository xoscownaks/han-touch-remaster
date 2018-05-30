<?php
//掲示板でのリプ機能のPHP
  session_start();
  require_once "../DB/mydb.php";

  $comment_text =  $_POST['comment_text'];
  $qna_num      = $_POST['qna_num'];
  $id           = $_SESSION['userid'];
  $date         = Date('Y-m-d H:i:s');
  // qna_num int NOT NULL,
  // comment varchar(500) NOT NULL,
  // comment_id varchar(50) NOT NULL,
  // commnet_date datetime NOT NULL

  //入力したリプをDBに保存する
  try {
    $pdo    = db_connect();

    $sql    = "INSERT INTO comment( qna_num,		comment,			comment_id,		commnet_date )
							VALUES( '$qna_num',		'$comment_text',	'$id',			'$date' )";
    $stt    = $pdo->prepare($sql);
    $stt->execute();
    $result = $stt->rowCount();
    if($result){
      print "<script>alert('リプ完了')</script>";
      print "<script>history.go(-1)</script>";
    }

  } catch (Exception $e) {
    $e->getMessage();
  }

?>
