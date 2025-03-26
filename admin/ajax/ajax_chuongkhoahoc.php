<?php
global $d;
include __DIR__ . "/ajax_config.php";

	if(isset($_POST["id"]))
	{
		$table = (isset($_POST["table"])) ? htmlspecialchars($_POST["table"]) : '';
		$id = (isset($_POST["id"])) ? htmlspecialchars($_POST["id"]) : 0;
		$type = (isset($_POST["type"])) ? htmlspecialchars($_POST["type"]) : '';
		$row = null;


		if($id)
		{
			$row = $d->rawQuery("select tenvi, id from $table where id_khoahoc = '$id' and type = '$type' order by stt,id desc");
			// var_dump("select tenvi, id from $table where id_khoahoc = '$id' and type = '$type' order by stt,id desc");
		}
		// var_dump($row);
		$str = '<option value="0">Chọn chương khóa học</option>';
		if($row)
		{
			foreach($row as $v)
			{
				$str .= '<option value='.$v["id"].'>'.$v["tenvi"].'</option>';
			}
		}
		echo $str;
	}
?>