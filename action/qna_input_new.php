<?php
//QNA��POST��DB�ɓ���邽�ߐ^�񒆂�php
  require_once "QNAAction.php";

  $QNAAction  = new QNAAction();
  $title      = $_POST['title'];
  $content    = $_POST['content'];

  //�V����POST��o�^
  $QNAAction->inputValueToDb($title,$content);
?>
