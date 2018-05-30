<?php
//掲示板に新しいpostを登録する
	session_start();
	require_once "../DB/mydb.php";

	try {
		/*
		board_num int unsigned not null primary key auto_increment,
		board_title varchar(70) not null,
		board_content text not null,
		board_date datetime not null,
		board_id varchar(20) not null,
		board_password varchar(20) not null,
		board_file varchar(100)
		*/
		$pdo = db_connect();
		$sql = "INSERT INTO board(board_num,	board_title,		board_content,	board_date,
								　board_id,		board_password,		board_file)";
		$sql .= "VALUES(:num,:title,	:content,	:todaydate,	:id,	:password,	:file)";

		if(isset($_FILES['uploadfile']) && !$_FILES['uploadfile']["error"]){

			$fileName = $_FILES['uploadfile']['name'];
			$tmpName = $_FILES['uploadfile']['tmp_name'];

			$location = "C:xampp/htdocs/hangiphp/shoppingmall/upload/".$fileName;

			move_uploaded_file($tmpName,$location);

		}

		$stt = $pdo->prepare($sql);
		$id = $_SESSION['userid'];
		$password = $_SESSION['password'];
		$title = $_POST['title'];
		$content = $_POST['content'];
		$date = Date('Y-m-d H:i:s');

		$stt->bindValue(':num',null);
		$stt->bindValue(':title',$title);
		$stt->bindValue(':content',$content);
		$stt->bindValue(':todaydate',$date);
		$stt->bindValue(':id',$id);
		$stt->bindValue(':password',$password);
		$stt->bindValue(':file',$fileName);

		$stt->execute();

		$result = $stt->rowCount();

		if($result){

    		print "<script>alert('・・・・卓┳﨑們・・ｵ・壱共.')</script>";
    		print ("<script>location.replace('../form/boardform.php');</script>");

		}
	} catch (Exception $e) {
		$e->getMessage();
	}
?>
