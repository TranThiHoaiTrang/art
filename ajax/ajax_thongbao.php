<?php
	include "ajax_config.php";
	ob_start();
	$id = (isset($_POST['id']) && $_POST['id'] > 0) ? htmlspecialchars($_POST['id']) : 0;
	$check = (isset($_POST['check'])) ? htmlspecialchars($_POST['check']) : '';

	// $session = session_id();
	if($check == 'dadoc'){
		$a = $d->rawQuery("update #_thongbao_user set `check` = '1' where id = ? ",array($id));
	}else{
		$a = $d->rawQuery("delete from #_thongbao_user where id = '$id'");
	}
	
?>
