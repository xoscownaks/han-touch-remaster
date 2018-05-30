<?php
//掲示板の内容を表示するPHP
	require_once "../DB/mydb.php";

	//DBから取ったデータをreturn
	function boardResult(){
		try {

			$pdo = db_connect();

			$sql = "SELECT * FROM board ORDER BY board_num desc";

			$stt = $pdo->prepare($sql);
			$stt->execute();

		} catch (Exception $e) {
			$e->getMessage();
		}
		return $stt;
	}
?>
