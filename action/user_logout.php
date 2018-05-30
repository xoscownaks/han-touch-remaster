<?php
//ログアウトするphp
  session_start();
  //全てのSESSIONの情報を削除する
  function logout(){
    session_destroy();
  }

  //logoutボタン押すと実行とメインページに戻る
  if(isset($_POST['logout'])){
		print "<script>alert('・懋ｷｸ・・寃')</script>";
		logout();
		print "<script>location.replace('../index.php');</script>";
  }

?>
