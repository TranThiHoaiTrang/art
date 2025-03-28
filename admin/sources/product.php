<?php
if (!defined('SOURCES')) die("Error");

/* Kiểm tra active product */
if (isset($config['product'])) {
	$arrCheck = array();
	foreach ($config['product'] as $k => $v) $arrCheck[] = $k;
	if (!count($arrCheck) || !in_array($type, $arrCheck)) $func->transfer("Trang không tồn tại", "index.php", false);
} else {
	$func->transfer("Trang không tồn tại", "index.php", false);
}

/* Cấu hình đường dẫn trả về */
$strUrl = "";
$arrUrl = array('id_list', 'id_cat', 'id_item', 'id_sub', 'id_brand');
if (isset($_POST['data'])) {
	$dataUrl = isset($_POST['data']) ? $_POST['data'] : null;
	if ($dataUrl) {
		foreach ($arrUrl as $k => $v) {
			if (isset($dataUrl[$arrUrl[$k]])) $strUrl .= "&" . $arrUrl[$k] . "=" . htmlspecialchars($dataUrl[$arrUrl[$k]]);
		}
	}
} else {
	foreach ($arrUrl as $k => $v) {
		if (isset($_REQUEST[$arrUrl[$k]])) $strUrl .= "&" . $arrUrl[$k] . "=" . htmlspecialchars($_REQUEST[$arrUrl[$k]]);
	}
	if (isset($_REQUEST['keyword'])) $strUrl .= "&keyword=" . htmlspecialchars($_REQUEST['keyword']);
}

switch ($act) {
		/* Man */
	case "man":
		get_items();
		$template = "product/man/items";
		break;
	case "add":
		$template = "product/man/item_add";
		break;
	case "edit":
	case "copy":
		if ((!isset($config['product'][$type]['copy']) || $config['product'][$type]['copy'] == false) && $act == 'copy') {
			$template = "404";
			return false;
		}
		get_item();
		$template = "product/man/item_add";
		break;
	case "save":
	case "save_copy":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	case "reset":
		reset_item();
		break;

		/* độ dày */
	case "man_doday":
		get_items_doday();
		$template = "product/doday/items";
		break;
	case "add_doday":
		$template = "product/doday/item_add";
		break;
	case "edit_doday":
		get_item_doday();
		$template = "product/doday/item_add";
		break;
	case "save_doday":
		save_item_doday();
		break;
	case "delete_doday":
		delete_item_doday();
		break;

		/* độ dày */
	case "man_chatlieu":
		get_items_chatlieu();
		$template = "product/chatlieu/items";
		break;
	case "add_chatlieu":
		$template = "product/chatlieu/item_add";
		break;
	case "edit_chatlieu":
		get_item_chatlieu();
		$template = "product/chatlieu/item_add";
		break;
	case "save_chatlieu":
		save_item_chatlieu();
		break;
	case "delete_chatlieu":
		delete_item_chatlieu();
		break;

		/* độ dày */
	case "man_loaivai":
		get_items_loaivai();
		$template = "product/loaivai/items";
		break;
	case "add_loaivai":
		$template = "product/loaivai/item_add";
		break;
	case "edit_loaivai":
		get_item_loaivai();
		$template = "product/loaivai/item_add";
		break;
	case "save_loaivai":
		save_item_loaivai();
		break;
	case "delete_loaivai":
		delete_item_loaivai();
		break;

		/* độ dày */
	case "man_muavu":
		get_items_muavu();
		$template = "product/muavu/items";
		break;
	case "add_muavu":
		$template = "product/muavu/item_add";
		break;
	case "edit_muavu":
		get_item_muavu();
		$template = "product/muavu/item_add";
		break;
	case "save_muavu":
		save_item_muavu();
		break;
	case "delete_muavu":
		delete_item_muavu();
		break;

		/* Size */
	case "man_size":
		get_items_size();
		$template = "product/size/items";
		break;
	case "add_size":
		$template = "product/size/item_add";
		break;
	case "edit_size":
		get_item_size();
		$template = "product/size/item_add";
		break;
	case "save_size":
		save_item_size();
		break;
	case "delete_size":
		delete_item_size();
		break;

		/* Color */
	case "man_mau":
		get_items_mau();
		$template = "product/mau/items";
		break;
	case "add_mau":
		$template = "product/mau/item_add";
		break;
	case "edit_mau":
		get_item_mau();
		$template = "product/mau/item_add";
		break;
	case "save_mau":
		save_item_mau();
		break;
	case "delete_mau":
		delete_item_mau();
		break;

		/* Brand */
	case "man_brand":
		get_brands();
		$template = "product/brand/brand";
		break;
	case "add_brand":
		$template = "product/brand/brand_add";
		break;
	case "edit_brand":
		get_brand();
		$template = "product/brand/brand_add";
		break;
	case "save_brand":
		save_brand();
		break;
	case "delete_brand":
		delete_brand();
		break;

		/* Brand */
	case "man_danhmuc":
		get_danhmucs();
		$template = "product/danhmuc/danhmuc";
		break;
	case "add_danhmuc":
		$template = "product/danhmuc/danhmuc_add";
		break;
	case "edit_danhmuc":
		get_danhmuc();
		$template = "product/danhmuc/danhmuc_add";
		break;
	case "save_danhmuc":
		save_danhmuc();
		break;
	case "delete_danhmuc":
		delete_danhmuc();
		break;

		/* Brand */
	case "man_danhmuc_cap":
		get_danhmuc_caps();
		$template = "product/danhmuc_cap/danhmuc_cap";
		break;
	case "add_danhmuc_cap":
		$template = "product/danhmuc_cap/danhmuc_cap_add";
		break;
	case "edit_danhmuc_cap":
		get_danhmuc_cap();
		$template = "product/danhmuc_cap/danhmuc_cap_add";
		break;
	case "save_danhmuc_cap":
		save_danhmuc_cap();
		break;
	case "delete_danhmuc_cap":
		delete_danhmuc_cap();
		break;

		/* List */
	case "man_list":
		get_lists();
		$template = "product/list/lists";
		break;
	case "add_list":
		$template = "product/list/list_add";
		break;
	case "edit_list":
		get_list();
		$template = "product/list/list_add";
		break;
	case "save_list":
		save_list();
		break;
	case "delete_list":
		delete_list();
		break;

		/* Cat */
	case "man_cat":
		get_cats();
		$template = "product/cat/cats";
		break;
	case "add_cat":
		$template = "product/cat/cat_add";
		break;
	case "edit_cat":
		get_cat();
		$template = "product/cat/cat_add";
		break;
	case "save_cat":
		save_cat();
		break;
	case "delete_cat":
		delete_cat();
		break;

		/* Item */
	case "man_item":
		get_loais();
		$template = "product/item/loais";
		break;
	case "add_item":
		$template = "product/item/loai_add";
		break;
	case "edit_item":
		get_loai();
		$template = "product/item/loai_add";
		break;
	case "save_item":
		save_loai();
		break;
	case "delete_item":
		delete_loai();
		break;

		/* Sub */
	case "man_sub":
		get_subs();
		$template = "product/sub/subs";
		break;
	case "add_sub":
		$template = "product/sub/sub_add";
		break;
	case "edit_sub":
		get_sub();
		$template = "product/sub/sub_add";
		break;
	case "save_sub":
		save_sub();
		break;
	case "delete_sub":
		delete_sub();
		break;

	case "update":
		update();
		break;

		/* Gallery */
	case "man_photo":
	case "add_photo":
	case "edit_photo":
	case "save_photo":
	case "delete_photo":
		include "gallery.php";
		break;

	default:
		$template = "404";
}


function update()
{
	global $d, $strUrl, $func, $curPage, $config, $com, $act, $type;
	die();
	$splistmenu = $d->rawQuery("select * from #_product1 where type ='sanpham' and hienthi > 0 order by id asc");

	foreach ($splistmenu as $key => $value) {
		$splist = $d->rawQueryOne("select * from #_product_list where type ='" . $type . "' and old_id=" . $value['id_danhmuc'] . " and hienthi > 0 order by stt,id desc");
		if ((int)$splist['id'] > 0) {
			$data['id_list'] = $splist['id'];
		} else {
			$data['id_list'] = 0;
		}

		$data['tenkhongdauvi'] = htmlspecialchars($value['tenkhongdau']);
		$data['tenvi'] = htmlspecialchars($value['ten']);
		$data['motavi'] = htmlspecialchars($value['mota']);
		$data['noidungvi'] = htmlspecialchars($value['noidung']);
		$data['photo'] = htmlspecialchars($value['photo']);
		$data['masp'] = htmlspecialchars($value['masp']);
		$data['gia'] = htmlspecialchars($value['gia']);
		$data['old_id'] = $value['id'];
		$data['luotxem'] = $value['luotxem'];
		$data['noibat'] = $value['spbanchay'];
		$data['stt'] = $value['stt'];
		$data['hienthi'] = $value['hienthi'];
		$data['type'] = $type;
		$data['ngaytao'] = time();
		$data['ngaysua'] = time();

		if ($d->insert('product', $data)) {
			$id_insert = $d->getLastInsertId();
			$dataSeo['titlevi'] = htmlspecialchars($value['title']);
			$dataSeo['keywordsvi'] = htmlspecialchars($value['keywords']);
			$dataSeo['descriptionvi'] = htmlspecialchars($value['description']);
			$dataSeo['idmuc'] = $id_insert;
			$dataSeo['com'] = $com;
			$dataSeo['act'] = 'man';
			$dataSeo['type'] = $type;
			$d->insert('seo', $dataSeo);
		} else {
			$func->dump($d->getLastError());
		}
	}
}

/* Get man */
function get_items()
{
	global $d, $func, $strUrl, $curPage, $items, $paging, $type;


	/*$gallery = $d->rawQuery("select * from #_gallery where type ='san-pham' and kind = 'man' and val ='san-pham' order by stt,id desc");
		foreach($gallery as $k => $v){
			$data['com']='product';
			$d->where('id', $v['id']);
			$d->update('gallery',$data);
		}*/

	$where = "";
	$idlist = (isset($_REQUEST['id_list'])) ? htmlspecialchars($_REQUEST['id_list']) : 0;
	$idcat = (isset($_REQUEST['id_cat'])) ? htmlspecialchars($_REQUEST['id_cat']) : 0;
	$iditem = (isset($_REQUEST['id_item'])) ? htmlspecialchars($_REQUEST['id_item']) : 0;
	$idsub = (isset($_REQUEST['id_sub'])) ? htmlspecialchars($_REQUEST['id_sub']) : 0;
	$idbrand = (isset($_REQUEST['id_brand'])) ? htmlspecialchars($_REQUEST['id_brand']) : 0;
	$id_danhmuc = (isset($_REQUEST['id_danhmuc'])) ? htmlspecialchars($_REQUEST['id_danhmuc']) : 0;
	$id_danhmuc_cap = (isset($_REQUEST['id_danhmuc_cap'])) ? htmlspecialchars($_REQUEST['id_danhmuc_cap']) : 0;

	if ($idlist) $where .= " and id_list=$idlist";
	if ($idcat) $where .= " and id_cat=$idcat";
	if ($iditem) $where .= " and id_item=$iditem";
	if ($idsub) $where .= " and id_sub=$idsub";
	if ($idbrand) $where .= " and id_brand=$idbrand";
	if ($id_danhmuc) $where .= " and id_danhmuc REGEXP '$id_danhmuc'";
	if ($id_danhmuc_cap) $where .= " and id_danhmuc_cap REGEXP '$id_danhmuc_cap'";
	if (isset($_REQUEST['keyword'])) {
		$keyword = htmlspecialchars($_REQUEST['keyword']);
		$where .= " and (tenvi LIKE '%$keyword%' or tenen LIKE '%$keyword%')";
	}
	// if (isset($_REQUEST['ngaybanhanh'])) {
	// 	$date_vanbang = explode("-", $_REQUEST['ngaybanhanh']);
	// 	$ngaytu = trim($date_vanbang[0]);
	// 	$ngayden = trim($date_vanbang[1]);
	// 	$ngaytu = strtotime(str_replace("/", "-", $ngaytu));
	// 	$ngayden = strtotime(str_replace("/", "-", $ngayden));
	// 	$where .= " and ngaybanhanh<=$ngayden and ngaybanhanh>=$ngaytu";
	// }

	$per_page = 20;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit " . $startpoint . "," . $per_page;
	$sql = "select * from #_product where type = ? $where order by id desc $limit";
	// var_dump($sql);
	$items = $d->rawQuery($sql, array($type));
	$sqlNum = "select count(*) as 'num' from #_product where type = ? $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum, array($type));
	$total = $count['num'];
	$url = "index.php?com=product&act=man" . $strUrl . "&type=" . $type;
	$paging = $func->pagination($total, $per_page, $curPage, $url);
}

/* Edit man */
function get_item()
{
	global $d, $func, $strUrl, $curPage, $item, $gallery, $type, $com, $act ,$faqDB;

	$id = 0;
	if (isset($_GET['id'])) $id = htmlspecialchars($_GET['id']);
	if (isset($_GET['id_copy'])) $id = htmlspecialchars($_GET['id_copy']);

	if (!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man&type=" . $type . $strUrl, false);

	$item = $d->rawQueryOne("select * from #_product where id = ? and type = ? limit 0,1", array($id, $type));

	$faqDB = $d->rawQuery("select * from #_cauhoi where idmuc = ? and type = ? ", array($id, $type));

	if (!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=product&act=man&type=" . $type . $strUrl, false);

	/* Lấy hình ảnh con */
	if ($act != 'copy') {
		$gallery = $d->rawQuery("select * from #_gallery where id_photo = ? and com = ? and type = ? and kind = ? and val = ? order by stt,id desc", array($id, $com, $type, 'man', $type));
	}
}

/* Save man */
function save_item()
{
	global $d, $strUrl, $func, $curPage, $config, $com, $act, $type;

	if (empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man&type=" . $type . $strUrl, false);

	/* Post dữ liệu */
	$data = (isset($_POST['data'])) ? $_POST['data'] : null;
	if ($data) {
		foreach ($data as $column => $value) {
			$data[$column] = $value;
		}
		
		if (isset($_POST['slugvi'])) $data['tenkhongdauvi'] = $func->changeTitle(htmlspecialchars($_POST['slugvi']));
		else $data['tenkhongdauvi'] = (isset($data['tenvi'])) ? $func->changeTitle($data['tenvi']) : '';
		if (isset($_POST['slugen'])) $data['tenkhongdauen'] = $func->changeTitle(htmlspecialchars($_POST['slugen']));
		else $data['tenkhongdauen'] = (isset($data['tenen'])) ? $func->changeTitle($data['tenen']) : '';

		// if (isset($config['product'][$type]['danhmuc']) && $config['product'][$type]['danhmuc'] == true) {
		// 	if (isset($_POST['danhmuc_group']) && ($_POST['danhmuc_group'] != '')) $data['id_danhmuc'] = implode("|", $_POST['danhmuc_group']);
		// 	else $data['id_danhmuc'] = "";
		// }
		// if (isset($config['product'][$type]['danhmuc_cap']) && $config['product'][$type]['danhmuc_cap'] == true) {
		// 	if (isset($_POST['danhmuc_cap_group']) && ($_POST['danhmuc_cap_group'] != '')) $data['id_danhmuc_cap'] = implode("|", $_POST['danhmuc_cap_group']);
		// 	else $data['id_danhmuc_cap'] = "";
		// }

		if (isset($config['product'][$type]['size']) && $config['product'][$type]['size'] == true) {
			if (isset($_POST['size_group']) && ($_POST['size_group'] != '')) $data['id_size'] = implode(",", $_POST['size_group']);
			else $data['id_size'] = "";
		}

		if (isset($config['product'][$type]['giangvien']) && $config['product'][$type]['giangvien'] == true) {
			if (isset($_POST['giangvien_group']) && ($_POST['giangvien_group'] != '')) $data['id_giangvien'] = implode(",", $_POST['giangvien_group']);
			else $data['id_giangvien'] = "";
		}

		if (isset($config['product'][$type]['doday']) && $config['product'][$type]['doday'] == true) {
			if (isset($_POST['doday_group']) && ($_POST['doday_group'] != '')) $data['id_doday'] = implode(",", $_POST['doday_group']);
			else $data['id_doday'] = "";
		}
		if (isset($config['product'][$type]['loaivai']) && $config['product'][$type]['loaivai'] == true) {
			if (isset($_POST['loaivai_group']) && ($_POST['loaivai_group'] != '')) $data['id_loaivai'] = implode(",", $_POST['loaivai_group']);
			else $data['id_loaivai'] = "";
		}
		if (isset($config['product'][$type]['chatlieu']) && $config['product'][$type]['chatlieu'] == true) {
			if (isset($_POST['chatlieu_group']) && ($_POST['chatlieu_group'] != '')) $data['id_chatlieu'] = implode(",", $_POST['chatlieu_group']);
			else $data['id_chatlieu'] = "";
		}
		if (isset($config['product'][$type]['muavu']) && $config['product'][$type]['muavu'] == true) {
			if (isset($_POST['muavu_group']) && ($_POST['muavu_group'] != '')) $data['id_muavu'] = implode(",", $_POST['muavu_group']);
			else $data['id_muavu'] = "";
		}

		if (isset($config['product'][$type]['mau']) && $config['product'][$type]['mau'] == true) {
			if (isset($_POST['mau_group']) && ($_POST['mau_group'] != '')) $data['id_mau'] = implode(",", $_POST['mau_group']);
			else $data['id_mau'] = "";
		}

		if (isset($config['product'][$type]['tags']) && $config['product'][$type]['tags'] == true) {
			if (isset($_POST['tags_group']) && ($_POST['tags_group'] != '')) $data['id_tags'] = implode(",", $_POST['tags_group']);
			else $data['id_tags'] = "";
		}

		$data['gia'] = (isset($data['gia']) && $data['gia'] != '') ? str_replace(",", "", $data['gia']) : 0;
		$data['giamoi'] = (isset($data['giamoi']) && $data['giamoi'] != '') ? str_replace(",", "", $data['giamoi']) : 0;
		$data['giathitruong'] = (isset($data['giathitruong']) && $data['giathitruong'] != '') ? str_replace(",", "", $data['giathitruong']) : 0;
		$data['giakm'] = (isset($data['giakm']) && $data['giakm'] != '') ? $data['giakm'] : 0;
		$data['hienthi'] = (isset($data['hienthi'])) ? 1 : 0;

		$data['type'] = $type;
		// var_dump($_POST);die();
		// Giá size
		$size_id = $_POST['idsize'];
		$a = str_replace(",","",$_POST['giasize']);
		for ($i=0; $i < count($a) ; $i++) { 
			$tong[] = $size_id[$i].'_'.$a[$i];
		}
		if(isset($_POST['giasize']) && ($_POST['giasize'] != '')) $data['giasize'] = implode("/", $tong);
		else $data['giasize'] = "";


		$idsize_mau = $_POST['idsize_mau'];
		$idmau = str_replace(",","",$_POST['idmau']);
		$giamau = str_replace(",","",$_POST['giamau']);
		for ($i=0; $i < count($giamau) ; $i++) { 
			$tong_mau[] = $idsize_mau[$i].'_'.$idmau[$i].'_'.$giamau[$i];
		}
		if(isset($_POST['giamau']) && ($_POST['giamau'] != '')) $data['giamau'] = implode("/", $tong_mau);
		else $data['giamau'] = "";

		// var_dump($data['giasize']);
		// var_dump($data['giamau']);
		// die();
	}

	// var_dump($data['giasize']);die();
	$savehere = (isset($_POST['save-here'])) ? true : false;
	$id = (isset($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;

	/* Post seo */
	if (isset($config['product'][$type]['seo']) && $config['product'][$type]['seo'] == true) {
		$dataSeo = (isset($_POST['dataSeo'])) ? $_POST['dataSeo'] : null;
		if ($dataSeo) {
			foreach ($dataSeo as $column => $value) {
				$dataSeo[$column] = htmlspecialchars($value);
			}
		}
	}



	// single photo
	if (!empty($_POST['single-photo'])) {
		$data['photo'] = $_POST['single-photo'];
	}

	if (!empty($_POST['single-photo1'])) {
		$data['photo1'] = $_POST['single-photo1'];
	}

	// single gallery
	$new_gallery = [];
	if (!empty($_POST['single-gallery'])) {
		$data['gallery'] = $_POST['single-gallery'];
		$new_gallery = explode(',', $_POST['single-gallery']);
	}

	if (isset($_FILES['file-taptin'])) {
		$file_name = $func->uploadName($_FILES['file-taptin']["name"]);
		if ($taptin = $func->uploadImage("file-taptin", $config['product'][$type]['file_type'], 'upload/file/', $file_name)) {
			$data['taptin'] = $taptin;
			$row = $d->rawQueryOne("select id, taptin from #_product where type = ? limit 0,1", array($type));
			if ($row['id']) $func->delete_file('upload/file/' . $row['taptin']);
		}
	}
	// var_dump($data);die();

	if (isset($config['product'][$type]['datduoc']) && $config['product'][$type]['datduoc'] == true) {
		$datafaqall = [];
		$count = $_POST['count_faq'];
		for ($i = 0; $i <= $count; $i++) {
			// var_dump('datafaq'.$i);
			// var_dump($_POST['datafaq'.$i]);
			$datafaq = (isset($_POST['datafaq'.$i])) ? $_POST['datafaq'.$i] : null;
			if ($datafaq) {
				foreach ($datafaq as $column => $value) {
					$datafaq[$column] = htmlspecialchars($value);
				}
				$datafaqall[] = $datafaq;
			}
			
		}
	}
	// die();
	if ($id && $act != 'save_copy') {

		$product_item = $d->get_by_id('product', $id);

		// update gallery
		$old_galleries = $product_item['gallery'];
		$old_galleries = explode(',', $old_galleries);

		$galleries = array_merge($old_galleries, $new_gallery);
		$galleries = implode(',', array_filter($galleries));
		$data['gallery'] = $galleries;


		$data['ngaysua'] = time();

		$data = $d->filter_data('product', $data);

		$d->where('id', $id);
		$d->where('type', $type);
		// var_dump($data);die();
		if ($d->update('product', $data)) {
			/* SEO */
			if (isset($config['product'][$type]['seo']) && $config['product'][$type]['seo'] == true) {
				$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?", array($id, $com, 'man', $type));

				$dataSeo['idmuc'] = $id;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'man';
				$dataSeo['type'] = $type;
				$d->insert('seo', $dataSeo);
			}

			/* FAQ */
			if (isset($config['product'][$type]['datduoc']) && $config['product'][$type]['datduoc'] == true) {
				$d->rawQuery("delete from #_cauhoi where idmuc = ? and type = ?", array($id,$type));

				foreach($datafaqall as $faqall){
					// var_dump($faqall);
					if(!empty($faqall['tenvi']) && !empty($faqall['noidungvi'])){
						foreach ($faqall as $column => $value) {
							$datafaq[$column] = htmlspecialchars($value);
						}
						$datafaq['idmuc'] = $id;
						$datafaq['type'] = $type;
						$datafaq['ngaytao'] = time();
						$d->insert('cauhoi', $datafaq);
					}
				}
				// die();
				
			}

			if ($savehere) $func->redirect("index.php?com=product&act=edit&type=" . $type . $strUrl . "&id=" . $id);
			else $func->redirect("index.php?com=product&act=man&type=" . $type . $strUrl);
		} else {
			if ($savehere) $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=edit&type=" . $type . $strUrl . "&id=" . $id, false);
			else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man&type=" . $type . $strUrl, false);
		}
	} else {

		$data['ngaytao'] = time();

		if ($d->insert('product', $data)) {
			$id_insert = $d->getLastInsertId();

			/* SEO */
			if (isset($config['product'][$type]['seo']) && $config['product'][$type]['seo'] == true) {
				$dataSeo['idmuc'] = $id_insert;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'man';
				$dataSeo['type'] = $type;
				$d->insert('seo', $dataSeo);
			}

			/* FAQ */
			if (isset($config['product'][$type]['datduoc']) && $config['product'][$type]['datduoc'] == true) {

				foreach($datafaqall as $faqall){
					if(!empty($faqall['tenvi']) && !empty($faqall['noidungvi'])){
						foreach ($faqall as $column => $value) {
							$datafaq[$column] = htmlspecialchars($value);
						}
						$datafaq['idmuc'] = $id_insert;
						$datafaq['type'] = $type;
						$datafaq['ngaytao'] = time();
						$d->insert('cauhoi', $datafaq);
					}
				}
				
			}

			/* Cập nhật hash khi upload multi */
			$hash = (isset($_POST['hash']) && $_POST['hash'] != '') ? addslashes($_POST['hash']) : null;
			if ($hash) {
				$d->rawQuery("update #_gallery set hash = ?, id_photo = ? where hash = ?", array('', $id_insert, $hash));
			}

			if ($act == 'save_copy') {
				if ($savehere) $func->redirect("index.php?com=product&act=edit&type=" . $type . $strUrl . "&id=" . $id_insert);
				else $func->redirect("index.php?com=product&act=man&type=" . $type . $strUrl);
			} else {
				if ($savehere) $func->redirect("index.php?com=product&act=edit&type=" . $type . $strUrl . "&id=" . $id_insert);
				else $func->redirect("index.php?com=product&act=man&type=" . $type . $strUrl);
			}
		} else {
			if ($act == 'save_copy') {
				if ($savehere) $func->transfer("Sao chép dữ liệu bị lỗi", "index.php?com=product&act=edit&type=" . $type . $strUrl . "&id=" . $id_insert, false);
				else $func->transfer("Sao chép dữ liệu bị lỗi", "index.php?com=product&act=man&type=" . $type . $strUrl, false);
			} else {
				if ($savehere) $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=edit&type=" . $type . $strUrl . "&id=" . $id_insert, false);
				else $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man&type=" . $type . $strUrl, false);
			}
		}
	}
}

/* Delete man */
function delete_item()
{
	global $d, $strUrl, $func, $curPage, $com, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if ($id) {
		/* Xóa SEO */
		$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?", array($id, $com, 'man', $type));

		/* Lấy dữ liệu */
		$row = $d->rawQueryOne("select id, photo from #_product where id = ? and type = ? limit 0,1", array($id, $type));

		if ($row['id']) {
			//$func->delete_file(UPLOAD_PRODUCT.$row['photo']);
			$d->rawQuery("delete from #_product where id = ?", array($id));

			/* Xóa gallery */
			$row = $d->rawQuery("select id, photo, taptin from #_gallery where id_photo = ? and kind = ? and com = ?", array($id, 'man', $com));

			if (count($row)) {
				foreach ($row as $v) {
					$func->delete_file(UPLOAD_PRODUCT . $v['photo']);
					$func->delete_file(UPLOAD_FILE . $v['taptin']);
				}

				$d->rawQuery("delete from #_gallery where id_photo = ? and kind = ? and com = ?", array($id, 'man', $com));
			}

			$func->redirect("index.php?com=product&act=man&type=" . $type . $strUrl);
		} else $func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man&type=" . $type . $strUrl, false);
	} elseif (isset($_GET['listid'])) {
		$listid = explode(",", $_GET['listid']);

		for ($i = 0; $i < count($listid); $i++) {
			$id = htmlspecialchars($listid[$i]);

			/* Xóa SEO */
			$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?", array($id, $com, 'man', $type));

			/* Lấy dữ liệu */
			$row = $d->rawQueryOne("select id, photo from #_product where id = ? and type = ? limit 0,1", array($id, $type));

			if ($row['id']) {
				//$func->delete_file(UPLOAD_PRODUCT.$row['photo']);
				$d->rawQuery("delete from #_product where id = ?", array($id));

				/* Xóa gallery */
				$row = $d->rawQuery("select id, photo, taptin from #_gallery where id_photo = ? and kind = ? and com = ?", array($id, 'man', $com));

				if (count($row)) {
					foreach ($row as $v) {
						$func->delete_file(UPLOAD_PRODUCT . $v['photo']);
						$func->delete_file(UPLOAD_FILE . $v['taptin']);
					}

					$d->rawQuery("delete from #_gallery where id_photo = ? and kind = ? and com = ?", array($id, 'man', $com));
				}
			}
		}

		$func->redirect("index.php?com=product&act=man&type=" . $type . $strUrl);
	} else $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man&type=" . $type . $strUrl, false);
}

function reset_item()
{
	global $d, $strUrl, $func, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;
	// var_dump($_GET['listid']);die();
	if ($id) {
		/* Lấy dữ liệu */
		$row = $d->rawQueryOne("select * from #_product where id = ? and type = ? limit 0,1", array($id, $type));

		if ($row['id']) {
			$data['stt'] = 0;
			$d->where('id', $row['id']);
			$d->where('type', $row['type']);
			$d->update('product', $data);

			$func->redirect("index.php?com=product&act=man&type=" . $type . $strUrl);
		} else $func->transfer("Reset dữ liệu bị lỗi", "index.php?com=product&act=man&type=" . $type . $strUrl, false);
	} elseif (isset($_GET['listid'])) {
		$listid = explode(",", $_GET['listid']);

		for ($i = 0; $i < count($listid); $i++) {
			$id = htmlspecialchars($listid[$i]);

			/* Lấy dữ liệu */
			$row = $d->rawQueryOne("select * from #_product where id = ? and type = ? limit 0,1", array($id, $type));
			$data['stt'] = 0;
			$d->where('id', $row['id']);
			$d->where('type', $row['type']);
			$d->update('product', $data);
		}

		$func->redirect("index.php?com=product&act=man&type=" . $type . $strUrl);
	} else $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man&type=" . $type . $strUrl, false);
}

/* Get size */
function get_items_size()
{
	global $d, $func, $curPage, $items, $paging, $type;

	$where = "";

	if (isset($_REQUEST['keyword'])) {
		$keyword = htmlspecialchars($_REQUEST['keyword']);
		$where .= " and (tenvi LIKE '%$keyword%' or tenen LIKE '%$keyword%')";
	}

	$per_page = 10;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit " . $startpoint . "," . $per_page;
	$sql = "select * from #_product_size where type = ? $where order by stt,id desc $limit";
	$items = $d->rawQuery($sql, array($type));
	$sqlNum = "select count(*) as 'num' from #_product_size where type = ? $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum, array($type));
	$total = $count['num'];
	$url = "index.php?com=product&act=man_size&type=" . $type;
	$paging = $func->pagination($total, $per_page, $curPage, $url);
}

/* Edit size */
function get_item_size()
{
	global $d, $func, $curPage, $item, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if (!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_size&type=" . $type, false);

	$item = $d->rawQueryOne("select * from #_product_size where id = ? limit 0,1", array($id));

	if (!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=product&act=man_size&type=" . $type, false);
}

/* Save size */
function save_item_size()
{
	global $d, $func, $curPage, $config, $type;

	if (empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_size&type=" . $type, false);

	/* Post dữ liệu */
	$data = (isset($_POST['data'])) ? $_POST['data'] : null;
	if ($data) {
		foreach ($data as $column => $value) {
			$data[$column] = htmlspecialchars($value);
		}

		$data['hienthi'] = (isset($data['hienthi'])) ? 1 : 0;
		$data['type'] = $type;
	}

	$id = (isset($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;

	if ($id) {
		$data['ngaysua'] = time();

		$d->where('id', $id);
		$d->where('type', $type);
		if ($d->update('product_size', $data)) $func->redirect("index.php?com=product&act=man_size&type=" . $type);
		else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_size&type=" . $type, false);
	} else {
		$data['ngaytao'] = time();

		if ($d->insert('product_size', $data)) $func->redirect("index.php?com=product&act=man_size&type=" . $type);
		else $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_size&type=" . $type, false);
	}
}

/* Delete size */
function delete_item_size()
{
	global $d, $func, $curPage, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if ($id) {
		$row = $d->rawQueryOne("select id from #_product_size where id = ? and type = ? limit 0,1", array($id, $type));

		if ($row['id']) {
			$d->rawQuery("delete from #_product_size where id = ? and type = ?", array($id, $type));
			$func->redirect("index.php?com=product&act=man_size&type=" . $type);
		} else $func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_size&type=" . $type, false);
	} elseif (isset($_GET['listid'])) {
		$listid = explode(",", $_GET['listid']);

		for ($i = 0; $i < count($listid); $i++) {
			$id = htmlspecialchars($listid[$i]);
			$row = $d->rawQueryOne("select id from #_product_size where id = ? and type = ? limit 0,1", array($id, $type));

			if ($row['id']) $d->rawQuery("delete from #_product_size where id = ? and type = ?", array($id, $type));
		}

		$func->redirect("index.php?com=product&act=man_size&type=" . $type);
	} else $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_size&type=" . $type, false);
}

/* Get size */
function get_items_doday()
{
	global $d, $func, $curPage, $items, $paging, $type;

	$where = "";

	if (isset($_REQUEST['keyword'])) {
		$keyword = htmlspecialchars($_REQUEST['keyword']);
		$where .= " and (tenvi LIKE '%$keyword%' or tenen LIKE '%$keyword%')";
	}

	$per_page = 10;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit " . $startpoint . "," . $per_page;
	$sql = "select * from #_product_doday where type = ? $where order by stt,id desc $limit";
	$items = $d->rawQuery($sql, array($type));
	$sqlNum = "select count(*) as 'num' from #_product_doday where type = ? $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum, array($type));
	$total = $count['num'];
	$url = "index.php?com=product&act=man_doday&type=" . $type;
	$paging = $func->pagination($total, $per_page, $curPage, $url);
}

/* Edit doday */
function get_item_doday()
{
	global $d, $func, $curPage, $item, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if (!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_doday&type=" . $type, false);

	$item = $d->rawQueryOne("select * from #_product_doday where id = ? limit 0,1", array($id));

	if (!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=product&act=man_doday&type=" . $type, false);
}

/* Save doday */
function save_item_doday()
{
	global $d, $func, $curPage, $config, $type;

	if (empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_doday&type=" . $type, false);

	/* Post dữ liệu */
	$data = (isset($_POST['data'])) ? $_POST['data'] : null;
	if ($data) {
		foreach ($data as $column => $value) {
			$data[$column] = htmlspecialchars($value);
		}

		$data['hienthi'] = (isset($data['hienthi'])) ? 1 : 0;
		$data['id_khoahoc'] = (isset($_POST['id_khoahoc'])) ? $_POST['id_khoahoc'] : '';
		$data['id_chuong_khoahoc'] = (isset($_POST['id_chuong_khoahoc'])) ? $_POST['id_chuong_khoahoc'] : '';
		$data['type'] = $type;
	}

	$id = (isset($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;

	if ($id) {
		$data['ngaysua'] = time();

		$d->where('id', $id);
		$d->where('type', $type);
		
		if ($d->update('product_doday', $data)) $func->redirect("index.php?com=product&act=man_doday&type=" . $type);
		else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_doday&type=" . $type, false);
	} else {
		$data['ngaytao'] = time();

		if ($d->insert('product_doday', $data)) $func->redirect("index.php?com=product&act=man_doday&type=" . $type);
		else $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_doday&type=" . $type, false);
	}
}

/* Delete doday */
function delete_item_doday()
{
	global $d, $func, $curPage, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if ($id) {
		$row = $d->rawQueryOne("select id from #_product_doday where id = ? and type = ? limit 0,1", array($id, $type));

		if ($row['id']) {
			$d->rawQuery("delete from #_product_doday where id = ? and type = ?", array($id, $type));
			$func->redirect("index.php?com=product&act=man_doday&type=" . $type);
		} else $func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_doday&type=" . $type, false);
	} elseif (isset($_GET['listid'])) {
		$listid = explode(",", $_GET['listid']);

		for ($i = 0; $i < count($listid); $i++) {
			$id = htmlspecialchars($listid[$i]);
			$row = $d->rawQueryOne("select id from #_product_doday where id = ? and type = ? limit 0,1", array($id, $type));

			if ($row['id']) $d->rawQuery("delete from #_product_doday where id = ? and type = ?", array($id, $type));
		}

		$func->redirect("index.php?com=product&act=man_doday&type=" . $type);
	} else $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_doday&type=" . $type, false);
}

/* Get size */
function get_items_chatlieu()
{
	global $d, $func, $curPage, $items, $paging, $type;

	$where = "";

	if (isset($_REQUEST['keyword'])) {
		$keyword = htmlspecialchars($_REQUEST['keyword']);
		$where .= " and (tenvi LIKE '%$keyword%' or tenen LIKE '%$keyword%')";
	}

	$per_page = 10;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit " . $startpoint . "," . $per_page;
	$sql = "select * from #_product_chatlieu where type = ? $where order by stt,id desc $limit";
	$items = $d->rawQuery($sql, array($type));
	$sqlNum = "select count(*) as 'num' from #_product_chatlieu where type = ? $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum, array($type));
	$total = $count['num'];
	$url = "index.php?com=product&act=man_chatlieu&type=" . $type;
	$paging = $func->pagination($total, $per_page, $curPage, $url);
}

/* Edit chatlieu */
function get_item_chatlieu()
{
	global $d, $func, $curPage, $item, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if (!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_chatlieu&type=" . $type, false);

	$item = $d->rawQueryOne("select * from #_product_chatlieu where id = ? limit 0,1", array($id));

	if (!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=product&act=man_chatlieu&type=" . $type, false);
}

/* Save chatlieu */
function save_item_chatlieu()
{
	global $d, $func, $curPage, $config, $type;

	if (empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_chatlieu&type=" . $type, false);

	/* Post dữ liệu */
	$data = (isset($_POST['data'])) ? $_POST['data'] : null;
	if ($data) {
		foreach ($data as $column => $value) {
			$data[$column] = htmlspecialchars($value);
		}

		$data['hienthi'] = (isset($data['hienthi'])) ? 1 : 0;
		$data['type'] = $type;
	}

	$id = (isset($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;

	if ($id) {
		$data['ngaysua'] = time();

		$d->where('id', $id);
		$d->where('type', $type);
		if ($d->update('product_chatlieu', $data)) $func->redirect("index.php?com=product&act=man_chatlieu&type=" . $type);
		else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_chatlieu&type=" . $type, false);
	} else {
		$data['ngaytao'] = time();

		if ($d->insert('product_chatlieu', $data)) $func->redirect("index.php?com=product&act=man_chatlieu&type=" . $type);
		else $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_chatlieu&type=" . $type, false);
	}
}

/* Delete chatlieu */
function delete_item_chatlieu()
{
	global $d, $func, $curPage, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if ($id) {
		$row = $d->rawQueryOne("select id from #_product_chatlieu where id = ? and type = ? limit 0,1", array($id, $type));

		if ($row['id']) {
			$d->rawQuery("delete from #_product_chatlieu where id = ? and type = ?", array($id, $type));
			$func->redirect("index.php?com=product&act=man_chatlieu&type=" . $type);
		} else $func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_chatlieu&type=" . $type, false);
	} elseif (isset($_GET['listid'])) {
		$listid = explode(",", $_GET['listid']);

		for ($i = 0; $i < count($listid); $i++) {
			$id = htmlspecialchars($listid[$i]);
			$row = $d->rawQueryOne("select id from #_product_chatlieu where id = ? and type = ? limit 0,1", array($id, $type));

			if ($row['id']) $d->rawQuery("delete from #_product_chatlieu where id = ? and type = ?", array($id, $type));
		}

		$func->redirect("index.php?com=product&act=man_chatlieu&type=" . $type);
	} else $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_chatlieu&type=" . $type, false);
}

/* Get size */
function get_items_loaivai()
{
	global $d, $func, $curPage, $items, $paging, $type;

	$where = "";

	if (isset($_REQUEST['keyword'])) {
		$keyword = htmlspecialchars($_REQUEST['keyword']);
		$where .= " and (tenvi LIKE '%$keyword%' or tenen LIKE '%$keyword%')";
	}

	$per_page = 10;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit " . $startpoint . "," . $per_page;
	$sql = "select * from #_product_loaivai where type = ? $where order by stt,id desc $limit";
	$items = $d->rawQuery($sql, array($type));
	$sqlNum = "select count(*) as 'num' from #_product_loaivai where type = ? $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum, array($type));
	$total = $count['num'];
	$url = "index.php?com=product&act=man_loaivai&type=" . $type;
	$paging = $func->pagination($total, $per_page, $curPage, $url);
}

/* Edit loaivai */
function get_item_loaivai()
{
	global $d, $func, $curPage, $item, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if (!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_loaivai&type=" . $type, false);

	$item = $d->rawQueryOne("select * from #_product_loaivai where id = ? limit 0,1", array($id));

	if (!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=product&act=man_loaivai&type=" . $type, false);
}

/* Save loaivai */
function save_item_loaivai()
{
	global $d, $func, $curPage, $config, $type;

	if (empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_loaivai&type=" . $type, false);

	/* Post dữ liệu */
	$data = (isset($_POST['data'])) ? $_POST['data'] : null;
	if ($data) {
		foreach ($data as $column => $value) {
			$data[$column] = htmlspecialchars($value);
		}

		$data['hienthi'] = (isset($data['hienthi'])) ? 1 : 0;
		$data['type'] = $type;
	}

	$id = (isset($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;

	if ($id) {
		$data['ngaysua'] = time();

		$d->where('id', $id);
		$d->where('type', $type);
		if ($d->update('product_loaivai', $data)) $func->redirect("index.php?com=product&act=man_loaivai&type=" . $type);
		else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_loaivai&type=" . $type, false);
	} else {
		$data['ngaytao'] = time();

		if ($d->insert('product_loaivai', $data)) $func->redirect("index.php?com=product&act=man_loaivai&type=" . $type);
		else $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_loaivai&type=" . $type, false);
	}
}

/* Delete loaivai */
function delete_item_loaivai()
{
	global $d, $func, $curPage, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if ($id) {
		$row = $d->rawQueryOne("select id from #_product_loaivai where id = ? and type = ? limit 0,1", array($id, $type));

		if ($row['id']) {
			$d->rawQuery("delete from #_product_loaivai where id = ? and type = ?", array($id, $type));
			$func->redirect("index.php?com=product&act=man_loaivai&type=" . $type);
		} else $func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_loaivai&type=" . $type, false);
	} elseif (isset($_GET['listid'])) {
		$listid = explode(",", $_GET['listid']);

		for ($i = 0; $i < count($listid); $i++) {
			$id = htmlspecialchars($listid[$i]);
			$row = $d->rawQueryOne("select id from #_product_loaivai where id = ? and type = ? limit 0,1", array($id, $type));

			if ($row['id']) $d->rawQuery("delete from #_product_loaivai where id = ? and type = ?", array($id, $type));
		}

		$func->redirect("index.php?com=product&act=man_loaivai&type=" . $type);
	} else $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_loaivai&type=" . $type, false);
}

/* Get size */
function get_items_muavu()
{
	global $d, $func, $curPage, $items, $paging, $type;

	$where = "";

	if (isset($_REQUEST['keyword'])) {
		$keyword = htmlspecialchars($_REQUEST['keyword']);
		$where .= " and (tenvi LIKE '%$keyword%' or tenen LIKE '%$keyword%')";
	}

	$per_page = 10;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit " . $startpoint . "," . $per_page;
	$sql = "select * from #_product_muavu where type = ? $where order by stt,id desc $limit";
	$items = $d->rawQuery($sql, array($type));
	$sqlNum = "select count(*) as 'num' from #_product_muavu where type = ? $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum, array($type));
	$total = $count['num'];
	$url = "index.php?com=product&act=man_muavu&type=" . $type;
	$paging = $func->pagination($total, $per_page, $curPage, $url);
}

/* Edit muavu */
function get_item_muavu()
{
	global $d, $func, $curPage, $item, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if (!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_muavu&type=" . $type, false);

	$item = $d->rawQueryOne("select * from #_product_muavu where id = ? limit 0,1", array($id));

	if (!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=product&act=man_muavu&type=" . $type, false);
}

/* Save muavu */
function save_item_muavu()
{
	global $d, $func, $curPage, $config, $type;

	if (empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_muavu&type=" . $type, false);

	/* Post dữ liệu */
	$data = (isset($_POST['data'])) ? $_POST['data'] : null;
	if ($data) {
		foreach ($data as $column => $value) {
			$data[$column] = htmlspecialchars($value);
		}

		$data['hienthi'] = (isset($data['hienthi'])) ? 1 : 0;
		$data['type'] = $type;
	}

	$id = (isset($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;

	if ($id) {
		$data['ngaysua'] = time();

		$d->where('id', $id);
		$d->where('type', $type);
		if ($d->update('product_muavu', $data)) $func->redirect("index.php?com=product&act=man_muavu&type=" . $type);
		else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_muavu&type=" . $type, false);
	} else {
		$data['ngaytao'] = time();

		if ($d->insert('product_muavu', $data)) $func->redirect("index.php?com=product&act=man_muavu&type=" . $type);
		else $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_muavu&type=" . $type, false);
	}
}

/* Delete muavu */
function delete_item_muavu()
{
	global $d, $func, $curPage, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if ($id) {
		$row = $d->rawQueryOne("select id from #_product_muavu where id = ? and type = ? limit 0,1", array($id, $type));

		if ($row['id']) {
			$d->rawQuery("delete from #_product_muavu where id = ? and type = ?", array($id, $type));
			$func->redirect("index.php?com=product&act=man_muavu&type=" . $type);
		} else $func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_muavu&type=" . $type, false);
	} elseif (isset($_GET['listid'])) {
		$listid = explode(",", $_GET['listid']);

		for ($i = 0; $i < count($listid); $i++) {
			$id = htmlspecialchars($listid[$i]);
			$row = $d->rawQueryOne("select id from #_product_muavu where id = ? and type = ? limit 0,1", array($id, $type));

			if ($row['id']) $d->rawQuery("delete from #_product_muavu where id = ? and type = ?", array($id, $type));
		}

		$func->redirect("index.php?com=product&act=man_muavu&type=" . $type);
	} else $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_muavu&type=" . $type, false);
}

/* Get color */
function get_items_mau()
{
	global $d, $func, $curPage, $items, $paging, $type;

	$where = "";

	if (isset($_REQUEST['keyword'])) {
		$keyword = htmlspecialchars($_REQUEST['keyword']);
		$where .= " and (tenvi LIKE '%$keyword%' or tenen LIKE '%$keyword%')";
	}

	$per_page = 10;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit " . $startpoint . "," . $per_page;
	$sql = "select * from #_product_mau where type = ? $where order by stt,id desc $limit";
	$items = $d->rawQuery($sql, array($type));
	$sqlNum = "select count(*) as 'num' from #_product_mau where type = ? $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum, array($type));
	$total = $count['num'];
	$url = "index.php?com=product&act=man_mau&type=" . $type;
	$paging = $func->pagination($total, $per_page, $curPage, $url);
}

/* Edit color */
function get_item_mau()
{
	global $d, $func, $curPage, $item, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if (!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_mau&type=" . $type, false);

	$item = $d->rawQueryOne("select * from #_product_mau where id = ? limit 0,1", array($id));

	if (!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=product&act=man_mau&type=" . $type, false);
}

/* Save color */
function save_item_mau()
{
	global $d, $func, $curPage, $config, $type;

	if (empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_mau&type=" . $type, false);

	/* Post dữ liệu */
	$data = (isset($_POST['data'])) ? $_POST['data'] : null;
	if ($data) {
		foreach ($data as $column => $value) {
			$data[$column] = htmlspecialchars($value);
		}

		$data['hienthi'] = (isset($data['hienthi'])) ? 1 : 0;
		$data['type'] = $type;
	}

	$id = (isset($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;

	if ($id) {
		if (isset($_FILES['file'])) {
			$file_name = $func->uploadName($_FILES['file']["name"]);
			if ($photo = $func->uploadImage("file", $config['product'][$type]['img_type_mau'], UPLOAD_COLOR, $file_name)) {
				$data['photo'] = $photo;
				$row = $d->rawQueryOne("select id, photo from #_product_mau where id = ? and type = ? limit 0,1", array($id, $type));
				if ($row['id']) $func->delete_file(UPLOAD_COLOR . $row['photo']);
			}
		}

		$data['ngaysua'] = time();

		$d->where('id', $id);
		$d->where('type', $type);
		if ($d->update('product_mau', $data)) $func->redirect("index.php?com=product&act=man_mau&type=" . $type);
		else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_mau&type=" . $type, false);
	} else {
		if (isset($_FILES['file'])) {
			$file_name = $func->uploadName($_FILES['file']["name"]);
			if ($photo = $func->uploadImage("file", $config['product'][$type]['img_type_mau'], UPLOAD_COLOR, $file_name)) {
				$data['photo'] = $photo;
			}
		}

		$data['ngaytao'] = time();

		if ($d->insert('product_mau', $data)) $func->redirect("index.php?com=product&act=man_mau&type=" . $type);
		else $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_mau&type=" . $type, false);
	}
}

/* Delete color */
function delete_item_mau()
{
	global $d, $curPage, $func, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if ($id) {
		$row = $d->rawQueryOne("select * from #_product_mau where id = ? and type = ? limit 0,1", array($id, $type));

		if ($row['id']) {
			$func->delete_file(UPLOAD_COLOR . $row['photo']);
			$d->rawQuery("delete from #_product_mau where id = ?", array($id));

			$func->redirect("index.php?com=product&act=man_mau&type=" . $type);
		} else $func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_mau&type=" . $type, false);
	} elseif (isset($_GET['listid'])) {
		$listid = explode(",", $_GET['listid']);

		for ($i = 0; $i < count($listid); $i++) {
			$id = htmlspecialchars($listid[$i]);
			$row = $d->rawQueryOne("select * from #_product_mau where id = ? and type = ? limit 0,1", array($id, $type));

			if ($row['id']) {
				$func->delete_file(UPLOAD_COLOR . $row['photo']);
				$d->rawQuery("delete from #_product_mau where id = ?", array($id));
			}
		}
		$func->redirect("index.php?com=product&act=man_mau&type=" . $type);
	} else $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_mau&type=" . $type, false);
}

/* Get list */
function get_lists()
{
	global $d, $func, $strUrl, $curPage, $items, $paging, $type;

	$where = "";

	if (isset($_REQUEST['keyword'])) {
		$keyword = htmlspecialchars($_REQUEST['keyword']);
		$where .= " and (tenvi LIKE '%$keyword%' or tenen LIKE '%$keyword%')";
	}

	$per_page = 10;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit " . $startpoint . "," . $per_page;
	$sql = "select * from #_product_list where type = ? $where order by stt,id desc $limit";
	$items = $d->rawQuery($sql, array($type));
	$sqlNum = "select count(*) as 'num' from #_product_list where type = ? $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum, array($type));
	$total = $count['num'];
	$url = "index.php?com=product&act=man_list&type=" . $type;
	$paging = $func->pagination($total, $per_page, $curPage, $url);
}

/* Edit list */
function get_list()
{
	global $d, $func, $strUrl, $curPage, $item, $gallery, $type, $com;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if (!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_list&type=" . $type . $strUrl, false);

	$item = $d->rawQueryOne("select * from #_product_list where id = ? and type = ? limit 0,1", array($id, $type));

	if (!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=product&act=man_list&type=" . $type . $strUrl, false);

	/* Lấy hình ảnh con */
	$gallery = $d->rawQuery("select * from #_gallery where id_photo = ? and com = ? and type = ? and kind = ? and val = ? order by stt,id desc", array($id, $com, $type, 'man_list', $type));
}

/* Save list */
function save_list()
{
	global $d, $strUrl, $func, $curPage, $config, $com, $type;

	if (empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_list&type=" . $type . $strUrl, false);

	/* Post dữ liệu */
	$data = (isset($_POST['data'])) ? $_POST['data'] : null;
	if ($data) {
		foreach ($data as $column => $value) {
			$data[$column] = htmlspecialchars($value);
		}

		if (isset($_POST['slugvi'])) $data['tenkhongdauvi'] = $func->changeTitle(htmlspecialchars($_POST['slugvi']));
		else $data['tenkhongdauvi'] = (isset($data['tenvi'])) ? $func->changeTitle($data['tenvi']) : '';
		if (isset($_POST['slugen'])) $data['tenkhongdauen'] = $func->changeTitle(htmlspecialchars($_POST['slugen']));
		else $data['tenkhongdauen'] = (isset($data['tenen'])) ? $func->changeTitle($data['tenen']) : '';
		$data['hienthi'] = (isset($data['hienthi'])) ? 1 : 0;
		$data['type'] = $type;
	}

	$id = (isset($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;

	/* Post seo */
	if (isset($config['product'][$type]['seo_list']) && $config['product'][$type]['seo_list'] == true) {
		$dataSeo = (isset($_POST['dataSeo'])) ? $_POST['dataSeo'] : null;
		if ($dataSeo) {
			foreach ($dataSeo as $column => $value) {
				$dataSeo[$column] = htmlspecialchars($value);
			}
		}
	}

	// single photo
	if (!empty($_POST['single-photo'])) {
		$data['photo'] = $_POST['single-photo'];
	}
	if (!empty($_POST['single-photo1'])) {
		$data['photo1'] = $_POST['single-photo1'];
	}
	if (!empty($_POST['single-photo2'])) {
		$data['photo2'] = $_POST['single-photo2'];
	}

	if ($id) {
		

		$data['ngaysua'] = time();

		$d->where('id', $id);
		$d->where('type', $type);
		if ($d->update('product_list', $data)) {
			/* SEO */
			if (isset($config['product'][$type]['seo_list']) && $config['product'][$type]['seo_list'] == true) {
				$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?", array($id, $com, 'man_list', $type));

				$dataSeo['idmuc'] = $id;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'man_list';
				$dataSeo['type'] = $type;
				$d->insert('seo', $dataSeo);
			}

			$func->redirect("index.php?com=product&act=man_list&type=" . $type . $strUrl);
		} else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_list&type=" . $type . $strUrl, false);
	} else {

		$data['ngaytao'] = time();

		if ($d->insert('product_list', $data)) {
			$id_insert = $d->getLastInsertId();

			/* SEO */
			if (isset($config['product'][$type]['seo_list']) && $config['product'][$type]['seo_list'] == true) {
				$dataSeo['idmuc'] = $id_insert;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'man_list';
				$dataSeo['type'] = $type;
				$d->insert('seo', $dataSeo);
			}

			/* Cập nhật hash khi upload multi */
			$hash = (isset($_POST['hash']) && $_POST['hash'] != '') ? addslashes($_POST['hash']) : null;
			if ($hash) {
				$d->rawQuery("update #_gallery set hash = ?, id_photo = ? where hash = ?", array('', $id_insert, $hash));
			}

			$func->redirect("index.php?com=product&act=man_list&type=" . $type . $strUrl);
		} else $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_list&type=" . $type . $strUrl, false);
	}
}

/* Delete list */
function delete_list()
{
	global $d, $strUrl, $func, $curPage, $com, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if ($id) {
		/* Xóa SEO */
		$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?", array($id, $com, 'man_list', $type));

		/* Lấy dữ liệu */
		$row = $d->rawQueryOne("select id, photo from #_product_list where id = ? and type = ? limit 0,1", array($id, $type));

		if ($row['id']) {
			$func->delete_file(UPLOAD_PRODUCT . $row['photo']);
			$d->rawQuery("delete from #_product_list where id = ?", array($id));

			/* Xóa gallery */
			$row = $d->rawQuery("select id, photo, taptin from #_gallery where id_photo = ? and kind = ? and com = ?", array($id, 'man_list', $com));

			if (count($row)) {
				foreach ($row as $v) {
					$func->delete_file(UPLOAD_PRODUCT . $v['photo']);
					$func->delete_file(UPLOAD_FILE . $v['taptin']);
				}

				$d->rawQuery("delete from #_gallery where id_photo = ? and kind = ? and com = ?", array($id, 'man_list', $com));
			}

			$func->redirect("index.php?com=product&act=man_list&type=" . $type . $strUrl);
		} else $func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_list&type=" . $type . $strUrl, false);
	} elseif (isset($_GET['listid'])) {
		$listid = explode(",", $_GET['listid']);

		for ($i = 0; $i < count($listid); $i++) {
			$id = htmlspecialchars($listid[$i]);

			/* Xóa SEO */
			$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?", array($id, $com, 'man_list', $type));

			/* Lấy dữ liệu */
			$row = $d->rawQueryOne("select id, photo from #_product_list where id = ? and type = ? limit 0,1", array($id, $type));

			if ($row['id']) {
				$func->delete_file(UPLOAD_PRODUCT . $row['photo']);
				$d->rawQuery("delete from #_product_list where id = ?", array($id));

				/* Xóa gallery */
				$row = $d->rawQuery("select id, photo, taptin from #_gallery where id_photo = ? and kind = ? and com = ?", array($id, 'man_list', $com));

				if (count($row)) {
					foreach ($row as $v) {
						$func->delete_file(UPLOAD_PRODUCT . $v['photo']);
						$func->delete_file(UPLOAD_FILE . $v['taptin']);
					}

					$d->rawQuery("delete from #_gallery where id_photo = ? and kind = ? and com = ?", array($id, 'man_list', $com));
				}
			}
		}

		$func->redirect("index.php?com=product&act=man_list&type=" . $type . $strUrl);
	} else $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_list&type=" . $type . $strUrl, false);
}

/* Get cat */
function get_cats()
{
	global $d, $func, $strUrl, $curPage, $items, $paging, $type;

	$where = "";
	$idlist = (isset($_REQUEST['id_list'])) ? htmlspecialchars($_REQUEST['id_list']) : 0;

	if ($idlist) $where .= " and id_list=$idlist";
	if (isset($_REQUEST['keyword'])) {
		$keyword = htmlspecialchars($_REQUEST['keyword']);
		$where .= " and (tenvi LIKE '%$keyword%' or tenen LIKE '%$keyword%')";
	}

	$per_page = 10;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit " . $startpoint . "," . $per_page;
	$sql = "select * from #_product_cat where type = ? $where order by stt,id desc $limit";
	$items = $d->rawQuery($sql, array($type));
	$sqlNum = "select count(*) as 'num' from #_product_cat where type = ? $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum, array($type));
	$total = $count['num'];
	$url = "index.php?com=product&act=man_cat" . $strUrl . "&type=" . $type;
	$paging = $func->pagination($total, $per_page, $curPage, $url);
}

/* Edit cat */
function get_cat()
{
	global $d, $func, $strUrl, $curPage, $item, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if (!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat&type=" . $type . $strUrl, false);

	$item = $d->rawQueryOne("select * from #_product_cat where id = ? and type = ? limit 0,1", array($id, $type));

	if (!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=product&act=man_cat&type=" . $type . $strUrl, false);
}

/* Save cat */
function save_cat()
{
	global $d, $strUrl, $func, $curPage, $config, $com, $type;

	if (empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat&type=" . $type . $strUrl, false);

	/* Post dữ liệu */
	$data = (isset($_POST['data'])) ? $_POST['data'] : null;
	if ($data) {
		foreach ($data as $column => $value) {
			$data[$column] = htmlspecialchars($value);
		}

		if (isset($_POST['slugvi'])) $data['tenkhongdauvi'] = $func->changeTitle(htmlspecialchars($_POST['slugvi']));
		else $data['tenkhongdauvi'] = (isset($data['tenvi'])) ? $func->changeTitle($data['tenvi']) : '';
		if (isset($_POST['slugen'])) $data['tenkhongdauen'] = $func->changeTitle(htmlspecialchars($_POST['slugen']));
		else $data['tenkhongdauen'] = (isset($data['tenen'])) ? $func->changeTitle($data['tenen']) : '';
		$data['hienthi'] = (isset($data['hienthi'])) ? 1 : 0;
		$data['type'] = $type;
	}

	/* Post seo */
	if (isset($config['product'][$type]['seo_cat']) && $config['product'][$type]['seo_cat'] == true) {
		$dataSeo = (isset($_POST['dataSeo'])) ? $_POST['dataSeo'] : null;
		if ($dataSeo) {
			foreach ($dataSeo as $column => $value) {
				$dataSeo[$column] = htmlspecialchars($value);
			}
		}
	}

	// single photo
	if (!empty($_POST['single-photo'])) {
		$data['photo'] = $_POST['single-photo'];
	}

	$id = (isset($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;

	if ($id) {

		$data['ngaysua'] = time();

		$d->where('id', $id);
		$d->where('type', $type);
		if ($d->update('product_cat', $data)) {
			/* SEO */
			if (isset($config['product'][$type]['seo_cat']) && $config['product'][$type]['seo_cat'] == true) {
				$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?", array($id, $com, 'man_cat', $type));

				$dataSeo['idmuc'] = $id;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'man_cat';
				$dataSeo['type'] = $type;
				$d->insert('seo', $dataSeo);
			}

			$func->redirect("index.php?com=product&act=man_cat&type=" . $type . $strUrl);
		} else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_cat&type=" . $type . $strUrl, false);
	} else {

		$data['ngaytao'] = time();

		if ($d->insert('product_cat', $data)) {
			$id_insert = $d->getLastInsertId();

			/* SEO */
			if (isset($config['product'][$type]['seo_cat']) && $config['product'][$type]['seo_cat'] == true) {
				$dataSeo['idmuc'] = $id_insert;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'man_cat';
				$dataSeo['type'] = $type;
				$d->insert('seo', $dataSeo);
			}
			$func->redirect("index.php?com=product&act=man_cat&type=" . $type . $strUrl);
		} else $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_cat&type=" . $type . $strUrl, false);
	}
}

/* Delete cat */
function delete_cat()
{
	global $d, $strUrl, $func, $curPage, $com, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if ($id) {
		/* Xóa SEO */
		$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?", array($id, $com, 'man_cat', $type));

		/* Lấy dữ liệu */
		$row = $d->rawQueryOne("select id, photo from #_product_cat where id = ? and type = ? limit 0,1", array($id, $type));

		if ($row['id']) {
			$func->delete_file(UPLOAD_PRODUCT . $row['photo']);
			$d->rawQuery("delete from #_product_cat where id = ?", array($id));

			$func->redirect("index.php?com=product&act=man_cat&type=" . $type . $strUrl);
		} else $func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_cat&type=" . $type . $strUrl, false);
	} elseif (isset($_GET['listid'])) {
		$listid = explode(",", $_GET['listid']);

		for ($i = 0; $i < count($listid); $i++) {
			$id = htmlspecialchars($listid[$i]);

			/* Xóa SEO */
			$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?", array($id, $com, 'man_cat', $type));

			/* Lấy dữ liệu */
			$row = $d->rawQueryOne("select id, photo from #_product_cat where id = ? and type = ? limit 0,1", array($id, $type));

			if ($row['id']) {
				$func->delete_file(UPLOAD_PRODUCT . $row['photo']);
				$d->rawQuery("delete from #_product_cat where id = ?", array($id));
			}
		}

		$func->redirect("index.php?com=product&act=man_cat&type=" . $type . $strUrl);
	} else $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat&type=" . $type . $strUrl, false);
}

/* Get item */
function get_loais()
{
	global $d, $func, $strUrl, $curPage, $items, $paging, $type;

	$where = "";
	$idlist = (isset($_REQUEST['id_list'])) ? htmlspecialchars($_REQUEST['id_list']) : 0;
	$idcat = (isset($_REQUEST['id_cat'])) ? htmlspecialchars($_REQUEST['id_cat']) : 0;

	if ($idlist) $where .= " and id_list=$idlist";
	if ($idcat) $where .= " and id_cat=$idcat";
	if (isset($_REQUEST['keyword'])) {
		$keyword = htmlspecialchars($_REQUEST['keyword']);
		$where .= " and (tenvi LIKE '%$keyword%' or tenen LIKE '%$keyword%')";
	}

	$per_page = 10;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit " . $startpoint . "," . $per_page;
	$sql = "select * from #_product_item where type = ? $where order by stt,id desc $limit";
	$items = $d->rawQuery($sql, array($type));
	$sqlNum = "select count(*) as 'num' from #_product_item where type = ? $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum, array($type));
	$total = $count['num'];
	$url = "index.php?com=product&act=man_item" . $strUrl . "&type=" . $type;
	$paging = $func->pagination($total, $per_page, $curPage, $url);
}

/* Edit item */
function get_loai()
{
	global $d, $func, $strUrl, $curPage, $item, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if (!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_item&type=" . $type . $strUrl, false);

	$item = $d->rawQueryOne("select * from #_product_item where id = ? and type = ? limit 0,1", array($id, $type));

	if (!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=product&act=man_item&type=" . $type . $strUrl, false);
}

/* Save item */
function save_loai()
{
	global $d, $strUrl, $func, $curPage, $config, $com, $type;

	if (empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_item&type=" . $type . $strUrl, false);

	/* Post dữ liệu */
	$data = (isset($_POST['data'])) ? $_POST['data'] : null;
	if ($data) {
		foreach ($data as $column => $value) {
			$data[$column] = htmlspecialchars($value);
		}

		if (isset($_POST['slugvi'])) $data['tenkhongdauvi'] = $func->changeTitle(htmlspecialchars($_POST['slugvi']));
		else $data['tenkhongdauvi'] = (isset($data['tenvi'])) ? $func->changeTitle($data['tenvi']) : '';
		if (isset($_POST['slugen'])) $data['tenkhongdauen'] = $func->changeTitle(htmlspecialchars($_POST['slugen']));
		else $data['tenkhongdauen'] = (isset($data['tenen'])) ? $func->changeTitle($data['tenen']) : '';
		$data['hienthi'] = (isset($data['hienthi'])) ? 1 : 0;
		$data['type'] = $type;
	}

	/* Post seo */
	if (isset($config['product'][$type]['seo_item']) && $config['product'][$type]['seo_item'] == true) {
		$dataSeo = (isset($_POST['dataSeo'])) ? $_POST['dataSeo'] : null;
		if ($dataSeo) {
			foreach ($dataSeo as $column => $value) {
				$dataSeo[$column] = htmlspecialchars($value);
			}
		}
	}

	// single photo
	if (!empty($_POST['single-photo'])) {
		$data['photo'] = $_POST['single-photo'];
	}

	$id = (isset($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;

	if ($id) {

		$data['ngaysua'] = time();

		$d->where('id', $id);
		$d->where('type', $type);
		if ($d->update('product_item', $data)) {
			/* SEO */
			if (isset($config['product'][$type]['seo_item']) && $config['product'][$type]['seo_item'] == true) {
				$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?", array($id, $com, 'man_item', $type));

				$dataSeo['idmuc'] = $id;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'man_item';
				$dataSeo['type'] = $type;
				$d->insert('seo', $dataSeo);
			}

			$func->redirect("index.php?com=product&act=man_item&type=" . $type . $strUrl);
		} else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_item&type=" . $type . $strUrl, false);
	} else {

		$data['ngaytao'] = time();

		if ($d->insert('product_item', $data)) {
			$id_insert = $d->getLastInsertId();

			/* SEO */
			if (isset($config['product'][$type]['seo_item']) && $config['product'][$type]['seo_item'] == true) {
				$dataSeo['idmuc'] = $id_insert;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'man_item';
				$dataSeo['type'] = $type;
				$d->insert('seo', $dataSeo);
			}

			$func->redirect("index.php?com=product&act=man_item&type=" . $type . $strUrl);
		} else $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_item&type=" . $type . $strUrl, false);
	}
}

/* Delete item */
function delete_loai()
{
	global $d, $strUrl, $func, $curPage, $com, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if ($id) {
		/* Xóa SEO */
		$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?", array($id, $com, 'man_item', $type));

		/* Lấy dữ liệu */
		$row = $d->rawQueryOne("select id, photo from #_product_item where id = ? and type = ? limit 0,1", array($id, $type));

		if ($row['id']) {
			$func->delete_file(UPLOAD_PRODUCT . $row['photo']);
			$d->rawQuery("delete from #_product_item where id = ?", array($id));

			$func->redirect("index.php?com=product&act=man_item&type=" . $type . $strUrl);
		} else $func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_item&type=" . $type . $strUrl, false);
	} elseif (isset($_GET['listid'])) {
		$listid = explode(",", $_GET['listid']);

		for ($i = 0; $i < count($listid); $i++) {
			$id = htmlspecialchars($listid[$i]);

			/* Xóa SEO */
			$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?", array($id, $com, 'man_item', $type));

			/* Lấy dữ liệu */
			$row = $d->rawQueryOne("select id, photo from #_product_item where id = ? and type = ? limit 0,1", array($id, $type));

			if ($row['id']) {
				$func->delete_file(UPLOAD_PRODUCT . $row['photo']);
				$d->rawQuery("delete from #_product_item where id = ?", array($id));
			}
		}

		$func->redirect("index.php?com=product&act=man_item&type=" . $type . $strUrl);
	} else $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_item&type=" . $type . $strUrl, false);
}

/* Get sub */
function get_subs()
{
	global $d, $func, $strUrl, $curPage, $items, $paging, $type;

	$where = "";

	$idlist = (isset($_REQUEST['id_list'])) ? htmlspecialchars($_REQUEST['id_list']) : 0;
	$idcat = (isset($_REQUEST['id_cat'])) ? htmlspecialchars($_REQUEST['id_cat']) : 0;
	$iditem = (isset($_REQUEST['id_item'])) ? htmlspecialchars($_REQUEST['id_item']) : 0;

	if ($idlist) $where .= " and id_list=$idlist";
	if ($idcat) $where .= " and id_cat=$idcat";
	if ($iditem) $where .= " and id_item=$iditem";
	if (isset($_REQUEST['keyword'])) {
		$keyword = htmlspecialchars($_REQUEST['keyword']);
		$where .= " and (tenvi LIKE '%$keyword%' or tenen LIKE '%$keyword%')";
	}

	$per_page = 10;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit " . $startpoint . "," . $per_page;
	$sql = "select * from #_product_sub where type = ? $where order by stt,id desc $limit";
	$items = $d->rawQuery($sql, array($type));
	$sqlNum = "select count(*) as 'num' from #_product_sub where type = ? $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum, array($type));
	$total = $count['num'];
	$url = "index.php?com=product&act=man_sub" . $strUrl . "&type=" . $type;
	$paging = $func->pagination($total, $per_page, $curPage, $url);
}

/* Edit sub */
function get_sub()
{
	global $d, $func, $strUrl, $curPage, $item, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if (!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_sub&type=" . $type . $strUrl, false);

	$item = $d->rawQueryOne("select * from #_product_sub where id = ? and type = ? limit 0,1", array($id, $type));

	if (!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=product&act=man_sub&type=" . $type . $strUrl, false);
}

/* Save sub */
function save_sub()
{
	global $d, $strUrl, $func, $curPage, $config, $com, $type;

	if (empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_sub&type=" . $type . $strUrl, false);

	/* Post dữ liệu */
	$data = (isset($_POST['data'])) ? $_POST['data'] : null;
	if ($data) {
		foreach ($data as $column => $value) {
			$data[$column] = htmlspecialchars($value);
		}

		if (isset($_POST['slugvi'])) $data['tenkhongdauvi'] = $func->changeTitle(htmlspecialchars($_POST['slugvi']));
		else $data['tenkhongdauvi'] = (isset($data['tenvi'])) ? $func->changeTitle($data['tenvi']) : '';
		if (isset($_POST['slugen'])) $data['tenkhongdauen'] = $func->changeTitle(htmlspecialchars($_POST['slugen']));
		else $data['tenkhongdauen'] = (isset($data['tenen'])) ? $func->changeTitle($data['tenen']) : '';
		$data['hienthi'] = (isset($data['hienthi'])) ? 1 : 0;
		$data['type'] = $type;
	}

	/* Post seo */
	if (isset($config['product'][$type]['seo_sub']) && $config['product'][$type]['seo_sub'] == true) {
		$dataSeo = (isset($_POST['dataSeo'])) ? $_POST['dataSeo'] : null;
		if ($dataSeo) {
			foreach ($dataSeo as $column => $value) {
				$dataSeo[$column] = htmlspecialchars($value);
			}
		}
	}

	$id = (isset($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;

	if ($id) {
		if (isset($_FILES['file'])) {
			$file_name = $func->uploadName($_FILES['file']["name"]);
			if ($photo = $func->uploadImage("file", $config['product'][$type]['img_type_sub'], UPLOAD_PRODUCT, $file_name)) {
				$data['photo'] = $photo;
				$row = $d->rawQueryOne("select id, photo from #_product_sub where id = ? and type = ? limit 0,1", array($id, $type));
				if ($row['id']) $func->delete_file(UPLOAD_PRODUCT . $row['photo']);
			}
		}

		$data['ngaysua'] = time();

		$d->where('id', $id);
		$d->where('type', $type);
		if ($d->update('product_sub', $data)) {
			/* SEO */
			if (isset($config['product'][$type]['seo_sub']) && $config['product'][$type]['seo_sub'] == true) {
				$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?", array($id, $com, 'man_sub', $type));

				$dataSeo['idmuc'] = $id;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'man_sub';
				$dataSeo['type'] = $type;
				$d->insert('seo', $dataSeo);
			}

			$func->redirect("index.php?com=product&act=man_sub&type=" . $type . $strUrl);
		} else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_sub&type=" . $type . $strUrl, false);
	} else {
		if (isset($_FILES['file'])) {
			$file_name = $func->uploadName($_FILES['file']["name"]);
			if ($photo = $func->uploadImage("file", $config['product'][$type]['img_type_sub'], UPLOAD_PRODUCT, $file_name)) {
				$data['photo'] = $photo;
			}
		}

		$data['ngaytao'] = time();

		if ($d->insert('product_sub', $data)) {
			$id_insert = $d->getLastInsertId();

			/* SEO */
			if (isset($config['product'][$type]['seo_sub']) && $config['product'][$type]['seo_sub'] == true) {
				$dataSeo['idmuc'] = $id_insert;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'man_sub';
				$dataSeo['type'] = $type;
				$d->insert('seo', $dataSeo);
			}

			$func->redirect("index.php?com=product&act=man_sub&type=" . $type . $strUrl);
		} else $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_sub&type=" . $type . $strUrl, false);
	}
}

/* Delete sub */
function delete_sub()
{
	global $d, $strUrl, $func, $curPage, $com, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if ($id) {
		/* Xóa SEO */
		$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?", array($id, $com, 'man_sub', $type));

		/* Lấy dữ liệu */
		$row = $d->rawQueryOne("select id, photo from #_product_sub where id = ? and type = ? limit 0,1", array($id, $type));

		if ($row['id']) {
			$func->delete_file(UPLOAD_PRODUCT . $row['photo']);
			$d->rawQuery("delete from #_product_sub where id = ?", array($id));

			$func->redirect("index.php?com=product&act=man_sub&type=" . $type . $strUrl);
		} else $func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_sub&type=" . $type . $strUrl, false);
	} elseif (isset($_GET['listid'])) {
		$listid = explode(",", $_GET['listid']);

		for ($i = 0; $i < count($listid); $i++) {
			$id = htmlspecialchars($listid[$i]);

			/* Xóa SEO */
			$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?", array($id, $com, 'man_sub', $type));

			/* Lấy dữ liệu */
			$row = $d->rawQueryOne("select id, photo from #_product_sub where id = ? and type = ? limit 0,1", array($id, $type));

			if ($row['id']) {
				$func->delete_file(UPLOAD_PRODUCT . $row['photo']);
				$d->rawQuery("delete from #_product_sub where id = ?", array($id));
			}
		}

		$func->redirect("index.php?com=product&act=man_sub&type=" . $type . $strUrl);
	} else $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_sub&type=" . $type . $strUrl, false);
}

/* Get brand */
function get_brands()
{
	global $d, $func, $strUrl, $curPage, $items, $paging, $type;

	$where = "";

	if (isset($_REQUEST['keyword'])) {
		$keyword = htmlspecialchars($_REQUEST['keyword']);
		$where .= " and (tenvi LIKE '%$keyword%' or tenen LIKE '%$keyword%')";
	}

	$per_page = 10;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit " . $startpoint . "," . $per_page;
	$sql = "select * from #_product_brand where type = ? $where order by stt,id desc $limit";
	$items = $d->rawQuery($sql, array($type));
	$sqlNum = "select count(*) as 'num' from #_product_brand where type = ? $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum, array($type));
	$total = $count['num'];
	$url = "index.php?com=product&act=man_brand&type=" . $type;
	$paging = $func->pagination($total, $per_page, $curPage, $url);
}

/* Edit brand */
function get_brand()
{
	global $d, $func, $strUrl, $curPage, $item, $gallery, $type, $com;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if (!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_brand&type=" . $type . $strUrl, false);

	$item = $d->rawQueryOne("select * from #_product_brand where id = ? and type = ? limit 0,1", array($id, $type));

	if (!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=product&act=man_brand&type=" . $type . $strUrl, false);
}

/* Save brand */
function save_brand()
{
	global $d, $curPage, $func, $config, $com, $type;

	if (empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_brand&type=" . $type, false);

	/* Post dữ liệu */
	$data = (isset($_POST['data'])) ? $_POST['data'] : null;
	if ($data) {
		foreach ($data as $column => $value) {
			$data[$column] = htmlspecialchars($value);
		}

		if($_POST['id_khoahoc']){
			$khoahoc = $d->rawQueryOne("select * from #_product where type = 'san-pham' and id = '".$_POST['id_khoahoc']."' and hienthi > 0");

			if (isset($_POST['slugvi'])) $data['tenkhongdauvi'] = $func->changeTitle(htmlspecialchars($_POST['slugvi']).'-'.$khoahoc['tenkhongdauvi']);
			else $data['tenkhongdauvi'] = (isset($data['tenvi'])) ? $func->changeTitle($data['tenvi'].'-'.$khoahoc['tenkhongdauvi']) : '';
			if (isset($_POST['slugen'])) $data['tenkhongdauen'] = $func->changeTitle(htmlspecialchars($_POST['slugen'].'-'.$khoahoc['tenkhongdauvi']));
			else $data['tenkhongdauen'] = (isset($data['tenen'])) ? $func->changeTitle($data['tenen'].'-'.$khoahoc['tenkhongdauvi']) : '';
		}else{
			if (isset($_POST['slugvi'])) $data['tenkhongdauvi'] = $func->changeTitle(htmlspecialchars($_POST['slugvi']));
			else $data['tenkhongdauvi'] = (isset($data['tenvi'])) ? $func->changeTitle($data['tenvi']) : '';
			if (isset($_POST['slugen'])) $data['tenkhongdauen'] = $func->changeTitle(htmlspecialchars($_POST['slugen']));
			else $data['tenkhongdauen'] = (isset($data['tenen'])) ? $func->changeTitle($data['tenen']) : '';
		}
		$data['hienthi'] = (isset($data['hienthi'])) ? 1 : 0;
		$data['id_khoahoc'] = (isset($_POST['id_khoahoc'])) ? $_POST['id_khoahoc'] : '';
		$data['type'] = $type;
	}

	/* Post seo */
	if (isset($config['product'][$type]['seo_brand']) && $config['product'][$type]['seo_brand'] == true) {
		$dataSeo = (isset($_POST['dataSeo'])) ? $_POST['dataSeo'] : null;
		if ($dataSeo) {
			foreach ($dataSeo as $column => $value) {
				$dataSeo[$column] = htmlspecialchars($value);
			}
		}
	}

	// single photo
	if (!empty($_POST['single-photo'])) {
		$data['photo'] = $_POST['single-photo'];
	}

	$id = (isset($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;

	if ($id) {
		

		$data['ngaysua'] = time();

		$d->where('id', $id);
		$d->where('type', $type);
		if ($d->update('product_brand', $data)) {
			/* SEO */
			if (isset($config['product'][$type]['seo_brand']) && $config['product'][$type]['seo_brand'] == true) {
				$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?", array($id, $com, 'man_brand', $type));

				$dataSeo['idmuc'] = $id;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'man_brand';
				$dataSeo['type'] = $type;
				$d->insert('seo', $dataSeo);
			}

			$func->redirect("index.php?com=product&act=man_brand&type=" . $type);
		} else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_brand&type=" . $type, false);
	} else {
		

		$data['ngaytao'] = time();

		if ($d->insert('product_brand', $data)) {
			$id_insert = $d->getLastInsertId();

			/* SEO */
			if (isset($config['product'][$type]['seo_brand']) && $config['product'][$type]['seo_brand'] == true) {
				$dataSeo['idmuc'] = $id_insert;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'man_brand';
				$dataSeo['type'] = $type;
				$d->insert('seo', $dataSeo);
			}

			$func->redirect("index.php?com=product&act=man_brand&type=" . $type);
		} else $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_brand&type=" . $type, false);
	}
}

/* Delete brand */
function delete_brand()
{
	global $d, $strUrl, $func, $curPage, $com, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if ($id) {
		/* Xóa SEO */
		$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?", array($id, $com, 'man_brand', $type));

		/* Lấy dữ liệu */
		$row = $d->rawQueryOne("select id, photo from #_product_brand where id = ? and type = ? limit 0,1", array($id, $type));

		if ($row['id']) {
			$func->delete_file(UPLOAD_PRODUCT . $row['photo']);
			$d->rawQuery("delete from #_product_brand where id = ?", array($id));

			$func->redirect("index.php?com=product&act=man_brand&type=" . $type . $strUrl);
		} else $func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_brand&type=" . $type . $strUrl, false);
	} elseif (isset($_GET['listid'])) {
		$listid = explode(",", $_GET['listid']);

		for ($i = 0; $i < count($listid); $i++) {
			$id = htmlspecialchars($listid[$i]);

			/* Xóa SEO */
			$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?", array($id, $com, 'man_brand', $type));

			/* Lấy dữ liệu */
			$row = $d->rawQueryOne("select id, photo from #_product_brand where id = ? and type = ? limit 0,1", array($id, $type));

			if ($row['id']) {
				$func->delete_file(UPLOAD_PRODUCT . $row['photo']);
				$d->rawQuery("delete from #_product_brand where id = ?", array($id));
			}
		}

		$func->redirect("index.php?com=product&act=man_brand&type=" . $type . $strUrl);
	} else $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_brand&type=" . $type . $strUrl, false);
}

/* Get danhmuc */
function get_danhmucs()
{
	global $d, $func, $strUrl, $curPage, $items, $paging, $type;

	$where = "";

	if (isset($_REQUEST['keyword'])) {
		$keyword = htmlspecialchars($_REQUEST['keyword']);
		$where .= " and (tenvi LIKE '%$keyword%' or tenen LIKE '%$keyword%')";
	}

	$per_page = 10;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit " . $startpoint . "," . $per_page;
	$sql = "select * from #_product_danhmuc where type = ? $where order by stt,id desc $limit";
	$items = $d->rawQuery($sql, array($type));
	$sqlNum = "select count(*) as 'num' from #_product_danhmuc where type = ? $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum, array($type));
	$total = $count['num'];
	$url = "index.php?com=product&act=man_danhmuc&type=" . $type;
	$paging = $func->pagination($total, $per_page, $curPage, $url);
}

/* Edit danhmuc */
function get_danhmuc()
{
	global $d, $func, $strUrl, $curPage, $item, $gallery, $type, $com;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if (!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_danhmuc&type=" . $type . $strUrl, false);

	$item = $d->rawQueryOne("select * from #_product_danhmuc where id = ? and type = ? limit 0,1", array($id, $type));

	if (!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=product&act=man_danhmuc&type=" . $type . $strUrl, false);
}

/* Save danhmuc */
function save_danhmuc()
{
	global $d, $curPage, $func, $config, $com, $type;

	if (empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_danhmuc&type=" . $type, false);

	/* Post dữ liệu */
	$data = (isset($_POST['data'])) ? $_POST['data'] : null;
	if ($data) {
		foreach ($data as $column => $value) {
			$data[$column] = htmlspecialchars($value);
		}

		if (isset($_POST['slugvi'])) $data['tenkhongdauvi'] = $func->changeTitle(htmlspecialchars($_POST['slugvi']));
		else $data['tenkhongdauvi'] = (isset($data['tenvi'])) ? $func->changeTitle($data['tenvi']) : '';
		if (isset($_POST['slugen'])) $data['tenkhongdauen'] = $func->changeTitle(htmlspecialchars($_POST['slugen']));
		else $data['tenkhongdauen'] = (isset($data['tenen'])) ? $func->changeTitle($data['tenen']) : '';
		$data['hienthi'] = (isset($data['hienthi'])) ? 1 : 0;
		$data['type'] = $type;
	}

	// single photo
	if (!empty($_POST['single-photo'])) {
		$data['photo'] = $_POST['single-photo'];
	}

	// single gallery
	$new_gallery = [];
	if (!empty($_POST['single-gallery'])) {
		$data['gallery'] = $_POST['single-gallery'];
		$new_gallery = explode(',', $_POST['single-gallery']);
	}

	/* Post seo */
	if (isset($config['product'][$type]['seo_danhmuc']) && $config['product'][$type]['seo_danhmuc'] == true) {
		$dataSeo = (isset($_POST['dataSeo'])) ? $_POST['dataSeo'] : null;
		if ($dataSeo) {
			foreach ($dataSeo as $column => $value) {
				$dataSeo[$column] = htmlspecialchars($value);
			}
		}
	}

	$id = (isset($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;

	if ($id) {

		$product_item = $d->get_by_id('product_danhmuc', $id);

		// update gallery
		$old_galleries = $product_item['gallery'];
		$old_galleries = explode(',', $old_galleries);

		$galleries = array_merge($old_galleries, $new_gallery);
		$galleries = implode(',', array_filter($galleries));
		$data['gallery'] = $galleries;
		$data['ngaysua'] = time();

		$d->where('id', $id);
		$d->where('type', $type);
		if ($d->update('product_danhmuc', $data)) {
			/* SEO */
			if (isset($config['product'][$type]['seo_danhmuc']) && $config['product'][$type]['seo_danhmuc'] == true) {
				$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?", array($id, $com, 'man_danhmuc', $type));

				$dataSeo['idmuc'] = $id;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'man_danhmuc';
				$dataSeo['type'] = $type;
				$d->insert('seo', $dataSeo);
			}

			$func->redirect("index.php?com=product&act=man_danhmuc&type=" . $type);
		} else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_danhmuc&type=" . $type, false);
	} else {

		$data['ngaytao'] = time();

		if ($d->insert('product_danhmuc', $data)) {
			$id_insert = $d->getLastInsertId();

			/* SEO */
			if (isset($config['product'][$type]['seo_danhmuc']) && $config['product'][$type]['seo_danhmuc'] == true) {
				$dataSeo['idmuc'] = $id_insert;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'man_danhmuc';
				$dataSeo['type'] = $type;
				$d->insert('seo', $dataSeo);
			}

			$func->redirect("index.php?com=product&act=man_danhmuc&type=" . $type);
		} else $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_danhmuc&type=" . $type, false);
	}
}

/* Delete danhmuc */
function delete_danhmuc()
{
	global $d, $strUrl, $func, $curPage, $com, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if ($id) {
		/* Xóa SEO */
		$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?", array($id, $com, 'man_danhmuc', $type));

		/* Lấy dữ liệu */
		$row = $d->rawQueryOne("select id, photo from #_product_danhmuc where id = ? and type = ? limit 0,1", array($id, $type));

		if ($row['id']) {
			$func->delete_file(UPLOAD_PRODUCT . $row['photo']);
			$d->rawQuery("delete from #_product_danhmuc where id = ?", array($id));

			$func->redirect("index.php?com=product&act=man_danhmuc&type=" . $type . $strUrl);
		} else $func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_danhmuc&type=" . $type . $strUrl, false);
	} elseif (isset($_GET['listid'])) {
		$listid = explode(",", $_GET['listid']);

		for ($i = 0; $i < count($listid); $i++) {
			$id = htmlspecialchars($listid[$i]);

			/* Xóa SEO */
			$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?", array($id, $com, 'man_danhmuc', $type));

			/* Lấy dữ liệu */
			$row = $d->rawQueryOne("select id, photo from #_product_danhmuc where id = ? and type = ? limit 0,1", array($id, $type));

			if ($row['id']) {
				$func->delete_file(UPLOAD_PRODUCT . $row['photo']);
				$d->rawQuery("delete from #_product_danhmuc where id = ?", array($id));
			}
		}

		$func->redirect("index.php?com=product&act=man_danhmuc&type=" . $type . $strUrl);
	} else $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_danhmuc&type=" . $type . $strUrl, false);
}

/* Get danhmuc_cap */
function get_danhmuc_caps()
{
	global $d, $func, $strUrl, $curPage, $items, $paging, $type;

	$where = "";
	$iddanhmuc = (isset($_REQUEST['id_danhmuc'])) ? htmlspecialchars($_REQUEST['id_danhmuc']) : 0;

	if ($iddanhmuc) $where .= " and id_danhmuc=$iddanhmuc";
	if (isset($_REQUEST['keyword'])) {
		$keyword = htmlspecialchars($_REQUEST['keyword']);
		$where .= " and (tenvi LIKE '%$keyword%' or tenen LIKE '%$keyword%')";
	}

	$per_page = 10;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit " . $startpoint . "," . $per_page;
	$sql = "select * from #_product_danhmuc_cap where type = ? $where order by stt,id desc $limit";
	$items = $d->rawQuery($sql, array($type));
	$sqlNum = "select count(*) as 'num' from #_product_danhmuc_cap where type = ? $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum, array($type));
	$total = $count['num'];
	$url = "index.php?com=product&act=man_danhmuc_cap&type=" . $type;
	$paging = $func->pagination($total, $per_page, $curPage, $url);
}

/* Edit danhmuc_cap */
function get_danhmuc_cap()
{
	global $d, $func, $strUrl, $curPage, $item, $gallery, $type, $com;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if (!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_danhmuc_cap&type=" . $type . $strUrl, false);

	$item = $d->rawQueryOne("select * from #_product_danhmuc_cap where id = ? and type = ? limit 0,1", array($id, $type));

	if (!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=product&act=man_danhmuc_cap&type=" . $type . $strUrl, false);
}

/* Save danhmuc_cap */
function save_danhmuc_cap()
{
	global $d, $curPage, $func, $config, $com, $type;

	if (empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_danhmuc_cap&type=" . $type, false);

	/* Post dữ liệu */
	$data = (isset($_POST['data'])) ? $_POST['data'] : null;
	if ($data) {
		foreach ($data as $column => $value) {
			$data[$column] = htmlspecialchars($value);
		}

		if (isset($config['product'][$type]['danhmuc']) && $config['product'][$type]['danhmuc'] == true) {
			if (isset($_POST['danhmuc_group']) && ($_POST['danhmuc_group'] != '')) $data['id_danhmuc'] = implode(",", $_POST['danhmuc_group']);
			else $data['id_danhmuc'] = "";
		}

		if (isset($_POST['slugvi'])) $data['tenkhongdauvi'] = $func->changeTitle(htmlspecialchars($_POST['slugvi']));
		else $data['tenkhongdauvi'] = (isset($data['tenvi'])) ? $func->changeTitle($data['tenvi']) : '';
		if (isset($_POST['slugen'])) $data['tenkhongdauen'] = $func->changeTitle(htmlspecialchars($_POST['slugen']));
		else $data['tenkhongdauen'] = (isset($data['tenen'])) ? $func->changeTitle($data['tenen']) : '';
		$data['hienthi'] = (isset($data['hienthi'])) ? 1 : 0;
		$data['type'] = $type;
	}

	/* Post seo */
	if (isset($config['product'][$type]['seo_danhmuc_cap']) && $config['product'][$type]['seo_danhmuc_cap'] == true) {
		$dataSeo = (isset($_POST['dataSeo'])) ? $_POST['dataSeo'] : null;
		if ($dataSeo) {
			foreach ($dataSeo as $column => $value) {
				$dataSeo[$column] = htmlspecialchars($value);
			}
		}
	}

	$id = (isset($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;

	// single photo
	if (!empty($_POST['single-photo'])) {
		$data['photo'] = $_POST['single-photo'];
	}

	if ($id) {
		//			if(isset($_FILES['file']))
		//			{
		//				$file_name = $func->uploadName($_FILES['file']["name"]);
		//				if($photo = $func->uploadImage("file", $config['product'][$type]['img_type_danhmuc_cap'], UPLOAD_PRODUCT,$file_name))
		//				{
		//					$data['photo'] = $photo;
		//					$row = $d->rawQueryOne("select id, photo from #_product_danhmuc_cap where id = ? and type = ? limit 0,1",array($id,$type));
		//					if($row['id']) $func->delete_file(UPLOAD_PRODUCT.$row['photo']);
		//				}
		//			}

		$data['ngaysua'] = time();

		$d->where('id', $id);
		$d->where('type', $type);
		if ($d->update('product_danhmuc_cap', $data)) {
			/* SEO */
			if (isset($config['product'][$type]['seo_danhmuc_cap']) && $config['product'][$type]['seo_danhmuc_cap'] == true) {
				$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?", array($id, $com, 'man_danhmuc_cap', $type));

				$dataSeo['idmuc'] = $id;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'man_danhmuc_cap';
				$dataSeo['type'] = $type;
				$d->insert('seo', $dataSeo);
			}

			$func->redirect("index.php?com=product&act=man_danhmuc_cap&type=" . $type);
		} else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_danhmuc_cap&type=" . $type, false);
	} else {
		//			if(isset($_FILES['file']))
		//			{
		//				$file_name = $func->uploadName($_FILES['file']["name"]);
		//				if($photo = $func->uploadImage("file", $config['product'][$type]['img_type_danhmuc_cap'], UPLOAD_PRODUCT,$file_name))
		//				{
		//					$data['photo'] = $photo;
		//				}
		//			}

		$data['ngaytao'] = time();

		if ($d->insert('product_danhmuc_cap', $data)) {
			$id_insert = $d->getLastInsertId();

			/* SEO */
			if (isset($config['product'][$type]['seo_danhmuc_cap']) && $config['product'][$type]['seo_danhmuc_cap'] == true) {
				$dataSeo['idmuc'] = $id_insert;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'man_danhmuc_cap';
				$dataSeo['type'] = $type;
				$d->insert('seo', $dataSeo);
			}

			$func->redirect("index.php?com=product&act=man_danhmuc_cap&type=" . $type);
		} else $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_danhmuc_cap&type=" . $type, false);
	}
}

/* Delete danhmuc_cap */
function delete_danhmuc_cap()
{
	global $d, $strUrl, $func, $curPage, $com, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if ($id) {
		/* Xóa SEO */
		$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?", array($id, $com, 'man_danhmuc_cap', $type));

		/* Lấy dữ liệu */
		$row = $d->rawQueryOne("select id, photo from #_product_danhmuc_cap where id = ? and type = ? limit 0,1", array($id, $type));

		if ($row['id']) {
			//$func->delete_file(UPLOAD_PRODUCT.$row['photo']);
			$d->rawQuery("delete from #_product_danhmuc_cap where id = ?", array($id));

			$func->redirect("index.php?com=product&act=man_danhmuc_cap&type=" . $type . $strUrl);
		} else $func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_danhmuc_cap&type=" . $type . $strUrl, false);
	} elseif (isset($_GET['listid'])) {
		$listid = explode(",", $_GET['listid']);

		for ($i = 0; $i < count($listid); $i++) {
			$id = htmlspecialchars($listid[$i]);

			/* Xóa SEO */
			$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?", array($id, $com, 'man_danhmuc_cap', $type));

			/* Lấy dữ liệu */
			$row = $d->rawQueryOne("select id, photo from #_product_danhmuc_cap where id = ? and type = ? limit 0,1", array($id, $type));

			if ($row['id']) {
				//$func->delete_file(UPLOAD_PRODUCT.$row['photo']);
				$d->rawQuery("delete from #_product_danhmuc_cap where id = ?", array($id));
			}
		}

		$func->redirect("index.php?com=product&act=man_danhmuc_cap&type=" . $type . $strUrl);
	} else $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_danhmuc_cap&type=" . $type . $strUrl, false);
}
