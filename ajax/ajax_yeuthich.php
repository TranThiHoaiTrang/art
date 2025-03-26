<?php
	include "ajax_config.php";
	ob_start();
	$idpro = (isset($_POST['idpro']) && $_POST['idpro'] > 0) ? htmlspecialchars($_POST['idpro']) : 0;
	$id_user = (isset($_POST['id_user']) && $_POST['id_user'] > 0) ? htmlspecialchars($_POST['id_user']) : 0;
    $yeuthich = $_POST['yeuthich'];

	$pro_yt = $d->rawQueryOne("select * from #_member_yeuthich where id_user = ? and id_product = ?", array($id_user, $idpro));

	// $session = session_id();
	if(!empty($pro_yt)){
		$a = $d->rawQuery("update #_member_yeuthich set yeuthich = ? where id_user = ? and id_product = ?",array($yeuthich,$id_user, $idpro));
	}else{
		$a = $d->rawQuery("insert into #_member_yeuthich (id_user, id_product, yeuthich) values (?,?,?)", [$id_user, $idpro, $yeuthich]);;
	}
	
?>
