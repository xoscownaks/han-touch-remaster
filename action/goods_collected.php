<?php
//�S�Ă̏��i��SESSION�ɕۑ����遨�S�Ẵy�[�W�Ńf�[�^����������
//HACK:���i���ǉ�����鎟��ɂ��̏��i�ɓ�����R�[�h�������Ȃ���΂Ȃ�Ȃ����C���K�v
	session_start();

	if(isset($_POST['coke_num'])){
		if(is_numeric($_POST['coke_num'])){

			print "<script>alert('���i����܂���')</script>";
			$_SESSION['coke_num'] = $_POST['coke_num'];
			print "<script>window.close();</script>";

		}else{

			print "<script>alert('��������͂��Ă�������');</script>";
			print "<script>history.go(-1)</script>";

		}
	}

  if(isset($_POST['sprite_num'])){
		if(is_numeric($_POST['sprite_num'])){
			print "<script>alert('�E�E���E�E�E��E�습�E�다.')</script>";
      $_SESSION['sprite_num'] = $_POST['sprite_num'];
      print "<script>window.close();</script>";
		}else{
      print "<script>history.go(-1)</script>";
		}
  }

	if(isset($_POST['burger1_num'])){
		if(is_numeric($_POST['burger1_num'])){
			print "<script>alert('�E�E���E�E�E��E�습�E�다.')</script>";
      $_SESSION['burger1_num'] = $_POST['burger1_num'];
      print "<script>window.close();</script>";
		}else{
			print "<script>alert('�E��E�를 �E�E�����세�E�E);</script>";
    	print "<script>history.go(-1)</script>";
		}
  }

	if(isset($_POST['burger2_num'])){
		if(is_numeric($_POST['burger2_num'])){
			print "<script>alert('�E�E���E�E�E��E�습�E�다.')</script>";
      $_SESSION['burger2_num'] = $_POST['burger2_num'];
    	print "<script>window.close();</script>";
		}else{
			print "<script>alert('�E��E�를 �E�E�����세�E�E);</script>";
      print "<script>history.go(-1)</script>";
		}
	}

	if(isset($_POST['burger3_num'])){
		if(is_numeric($_POST['burger3_num'])){
			print "<script>alert('�E�E���E�E�E��E�습�E�다.')</script>";
      $_SESSION['burger3_num'] = $_POST['burger3_num'];
      print "<script>window.close();</script>";
		}else{
			print "<script>alert('�E��E�를 �E�E�����세�E�E);</script>";
      print "<script>history.go(-1)</script>";
		}
	}

 	if(isset($_POST['burger4_num'])){
		if(is_numeric($_POST['burger4_num'])){
			print "<script>alert('�E�E���E�E�E��E�습�E�다.')</script>";
      $_SESSION['burger4_num'] = $_POST['burger4_num'];
      print "<script>window.close();</script>";
		}else{
			print "<script>alert('�E��E�를 �E�E�����세�E�E);</script>";
      print "<script>history.go(-1)</script>";
		}
	}
?>
