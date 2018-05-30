<?php
//QNA‚ÌPOST‚ðDB‚É“ü‚ê‚é‚½‚ß^‚ñ’†‚Ìphp
  require_once "QNAAction.php";

  $QNAAction  = new QNAAction();
  $title      = $_POST['title'];
  $content    = $_POST['content'];

  //V‚µ‚¢POST‚ð“o˜^
  $QNAAction->inputValueToDb($title,$content);
?>
