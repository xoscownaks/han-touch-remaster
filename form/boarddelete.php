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
            <label>�E�E���E�호 �E�E�� : </label>
            <input type="password" name="delete_check_password" placeholder="�E�E���E�호 �E�E��" required>
        </div>
            <input type="button" onclick="history.go(-1)" value="�E��E�가�E�">
            <!--<a href="../action/deleteboard.php?bno="><input type="button"  value="���인" "></a>-->
            <button type="submit">���인</button>
    </form>
</div>
</body>
</html>