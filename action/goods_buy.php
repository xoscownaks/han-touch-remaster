<?php
//�����͏��i���J�[�g�ɓ����PHP
  require_once "goodsAction.php";
  
	//���[�U�[�����i�̉����������߂ē����{�^������������
	if(isset($_POST['inputNum']) && is_numeric($_POST['num'])){

		print "<script>alert('�E�E���E�E�E��E�습�E�다.');</script>";

		$numMenu    = $_POST['num'];
		$nameMenu   = $_POST['menu_name'];
		$imgMenu    = $_POST['menu_img'];
		$priceMenu  = $_POST['menu_price'];
		$goods_func = new goodsfunc();

		//�J�[�g�ɓ��ꂽ��݌ɂ����炷
		$goods_func->SetUpdateBalance($nameMenu, $numMenu);

		//�J�[�g�ɏ��i������
		$goods_func->SetInputCart($nameMenu, $numMenu, $imgMenu, $priceMenu);

		print "<script>history.go(-1);</script>";

	}else {

		print "<script>alert('�E��E�를 �E�E�����세�E�E);</script>";
		print "<script>history.go(-1);</script>";

	}	

?>
