<?php
//�f���̓��e��\������PHP
	require_once "../DB/mydb.php";

	//DB���������f�[�^��return
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
