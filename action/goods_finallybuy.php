<?php
//�J�[�g�ōw������{�^���������Ǝ��s�����php
//�J�[�g�ŏ��i���폜����
  require_once "../DB/mydb.php";

  $menu_id = $_POST['id'];

  try {
    // buymenu_id varchar(20) NOT NULL,
    // buymenu_name varchar(100) NOT NULL,
    // buymenu_num int NOT NULL,
    // buymenu_date datetime NOT NULL,
    // buymenu_img varchar(500) NOT NULL,
    // buymenu_price int NOT NULL
    $pdo = db_connect();

    $sql = "DELETE FROM buyhistory WHERE buymenu_id = '$menu_id'";

    $stt = $pdo->prepare($sql);
    $stt->execute();

    print "<script>alert('�E��E� �E��E�')</script>";
    print "<script>location.replace('../index.php');</script>";

  } catch (Exception $e) {

    $e->getMessage();

  }

?>
