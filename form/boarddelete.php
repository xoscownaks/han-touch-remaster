<?php
    $bNo = $_GET['bno'];

?>
<html>
<head>
<style>
    .main{
        vertical-align: middle;
    }
</style>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/indexcss.css">

</head>
<body>
<div id="header">
    <?php
        require_once "header0.php";
    ?>
</div>
<div id="menu">
    <?php
        require_once "menu0.php";
    ?>
</div>
<div id="body">
    <form name="delete_board" action="../action/deleteboard.php" method="post">
        <input type="hidden" name="bno" value="<?php echo $bNo?>">
        <div class="main">
            <label>・・ｰ・逸从 ・・･ : </label>
            <input type="password" name="delete_check_password" placeholder="・・ｰ・逸从 ・・･" required>
        </div>
            <input type="button" onclick="history.go(-1)" value="・､・懋ｰ・ｰ">
            <!--<a href="../action/deleteboard.php?bno="><input type="button"  value="嶹菩攤" "></a>-->
            <button type="submit">嶹菩攤</button>
    </form>
</div>
</body>
</html>