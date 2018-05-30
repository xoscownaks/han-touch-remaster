<?php
//ユーザーが加入するためのPHP
  require_once "../DB/mydb.php";

  $user_id       = $_POST['id'];
  $user_password = $_POST['password'];

	try {
		$pdo = db_connect();

		//既存に加入されているかを確認する
		$sql = "SELECT * FROM members WHERE id = :id";
		$stt = $pdo->prepare($sql);
		$stt->bindValue(':id',$user_id);
		$stt->execute();
		$checkidCount = $stt->rowCount();

		//既存に存在されていたら
		if($checkidCount){

				echo "<script>alert('存在しているIDです');</script>";
				require_once "../form/join_form.php";

		}else {
			//新規ユーザーなら
			$sql = "INSERT INTO members VALUES(:id, :password)";
			$stt = $pdo->prepare($sql);
			$stt->bindValue(':id',$user_id);
			$stt->bindValue(':password',$user_password);
			$stt->execute();

			print "<script>alert('成功です。またログインしてください');</script>";
			print ("<script>location.replace('../index.php');</script>");
		}

	} catch (PDOException $e) {
		$e->getMessage();
	}
?>
