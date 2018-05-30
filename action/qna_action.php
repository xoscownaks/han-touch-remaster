<?php
//QNAåfé¶î¬ÇÃã@î\ÇíËã`ÇµÇΩPHPÅiDBÇ∆ÇÃòAåãÅj
  session_start();
  require_once "../DB/mydb.php";
  //QNAåfé¶î¬ÇÃçÏìÆÇ…ä÷Ç∑ÇÈã@î\ÇÃÉNÉâÉX
  class QNAAction{

    //QNAåfé¶î¬Ç…êVÇµÇ¢POSTÇçÏê¨
    function inputValueToDb($title, $content){

      try {
        $pdo = db_connect();
        // qna_num int unsigned not null primary key auto_increment,
        // qna_title varchar(100) NOT NULL,
        // qna_content varchar(500) NOT NULL,
        // qna_date datetime NOT NULL,
        // qna_id varchar(50) NOT NULL,
        // qna_password varchar(50) NOT NULL
        $id = $_SESSION['userid'];
        $password = $_SESSION['password'];
        $date = Date('Y-m-d H:i:s');

        $sql = "INSERT INTO qnaboard(qna_num,   qna_title,  qna_content,
                                     qna_date,  qna_id,     qna_password)";
        $sql.=" VALUES (null, '$title', '$content', '$date', '$id','$password')";
        $stt = $pdo->prepare($sql);
        $stt->execute();
        $result = $stt->rowCount();

        if($result){
          print "<script>alert('ÅEÄ ÅE∞ÅE∞ ÅEÅE£ÅE)</script>";
          print "<script>location.replace('../form/QNAform.php');</script>";
        }
      } catch (Exception $e) {
        $e->getMessage();
      }
    }

    //QNAåfé¶î¬ÇÃëSÇƒÇÃpostÇèoóÕ
    function showQnaMain(){
      try {
        $pdo = db_connect();

        $sql = "SELECT * FROM qnaboard ORDER BY qna_num desc";
  			$stt = $pdo->prepare($sql);
  			$stt->execute();
      } catch (Exception $e) {
        $e->getMessage();
      }
      return $stt;
    }

    //QNAåfé¶î¬ÇÃÇ†ÇÈpostÇÃè⁄ÇµÇ¢èÓïÒå©ÇπÇÈ
    function showDetailQna($num){
      try {
        $pdo = db_connect();
        $sql = "SELECT * FROM qnaboard WHERE qna_num=$num";
        $stt = $pdo->prepare($sql);
        $stt->execute();
        $row = $stt->fetch(PDO::FETCH_ASSOC);

      } catch (Exception $e) {
        $e->getMessage();
      }
      return $row;
    }

    //Ç†ÇÈåfé¶î¬ÇÃÉäÉvÇå©ÇπÇÈ
    function comment($bno){
      try {
        $pdo = db_connect();
        // qna_num int NOT NULL,
        // comment varchar(500) NOT NULL,
        // comment_id varchar(50) NOT NULL,
        // commnet_date datetime NOT NULL
        $sql = "SELECT * FROM comment WHERE qna_num=$bno";
        $stt = $pdo->prepare($sql);
        $stt->execute();
        $row = $stt->fetchAll(PDO::FETCH_ASSOC);
      } catch (Exception $e) {
        $e->getMessage();
      }
      return $row;
    }
  }
?>
