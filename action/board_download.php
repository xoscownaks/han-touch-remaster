<?php
//�T�[�o�ɕۑ�����Ă���t�@�C�����_�E�����[�h����PHP
//$_GET['dow']�̓t�@�C���̖��O
  if(isset($_GET['dow'])){
    //�o�H
    $file = "C:xampp/htdocs/hangiphp/shoppingmall/upload/".$_GET['dow'];

    //�_�E�����[�h�̎��s�����ށA�_�E�����[�h����f�[�^�̃^�C�v�̐ݒ�
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));

    //cash�̎g�p�ɂ���
    header("Expires: 0");
    header('Cache-Control: must-revalidate');
    header('Pragma:public');

	//�t�@�C����ǂ��txt, img�͂��̂܂܌�����
    header('Content-Length : '.filesize($file));
    readfile($file);
    exit;

  }else{
    print "<script>alert('���s')</script>";
    exit;
  }
?>
