<?php
//���[�U�[���������邽�߂�PHP
  require_once "../DB/mydb.php";

  $user_id       = $_POST['id'];
  $user_password = $_POST['password'];

	try {
		$pdo = db_connect();

		//�����ɉ�������Ă��邩���m�F����
		$sql = "SELECT * FROM members WHERE id = :id";
		$stt = $pdo->prepare($sql);
		$stt->bindValue(':id',$user_id);
		$stt->execute();
		$checkidCount = $stt->rowCount();

		//�����ɑ��݂���Ă�����
		if($checkidCount){

				echo "<script>alert('���݂��Ă���ID�ł�');</script>";
				require_once "../form/join_form.php";

		}else {
			//�V�K���[�U�[�Ȃ�
			$sql = "INSERT INTO members VALUES(:id, :password)";
			$stt = $pdo->prepare($sql);
			$stt->bindValue(':id',$user_id);
			$stt->bindValue(':password',$user_password);
			$stt->execute();

			print "<script>alert('�����ł��B�܂����O�C�����Ă�������');</script>";
			print ("<script>location.replace('../index.php');</script>");
		}

	} catch (PDOException $e) {
		$e->getMessage();
	}
?>
