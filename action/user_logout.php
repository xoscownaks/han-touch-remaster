<?php
//���O�A�E�g����php
  session_start();
  //�S�Ă�SESSION�̏����폜����
  function logout(){
    session_destroy();
  }

  //logout�{�^�������Ǝ��s�ƃ��C���y�[�W�ɖ߂�
  if(isset($_POST['logout'])){
		print "<script>alert('�E�그�E�E��')</script>";
		logout();
		print "<script>location.replace('../index.php');</script>";
  }

?>
