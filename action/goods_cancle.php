<?php
//�J�[�g�ɓ��ꂽ���i��������PHP
  require_once "goodsAction.php";

  $nameMenu     = $_POST['menu_name'];
  $numMenu      =  $_POST['menu_num'];

  //���i�̓���Ɋւ���N���X
  $goods_func   = new goodsfunc();

  //�݌ɂ����炷�O�ɖ߂�
  $goods_func->backbalance($nameMenu, $numMenu);

  //�J�[�g���珤�i������
  $goods_func->deletehistory($nameMenu, $numMenu);

  print "<script>history.go(-1)</script>";
?>
