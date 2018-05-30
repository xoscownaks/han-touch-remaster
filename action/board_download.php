<?php
//サーバに保存されているファイルをダウンロードするPHP
//$_GET['dow']はファイルの名前
  if(isset($_GET['dow'])){
    //経路
    $file = "C:xampp/htdocs/hangiphp/shoppingmall/upload/".$_GET['dow'];

    //ダウンロードの実行する種類、ダウンロードするデータのタイプの設定
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));

    //cashの使用について
    header("Expires: 0");
    header('Cache-Control: must-revalidate');
    header('Pragma:public');

	//ファイルを読んでtxt, imgはそのまま見せる
    header('Content-Length : '.filesize($file));
    readfile($file);
    exit;

  }else{
    print "<script>alert('失敗')</script>";
    exit;
  }
?>
