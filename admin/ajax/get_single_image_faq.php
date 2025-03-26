<?php
global $d;
include __DIR__ . "/ajax_config.php";
define('LAYOUT_PATH', dirname(__DIR__) . '/templates/layout/');


if (isset($_POST['soluong'])) {
    $soluong = intval($_POST['soluong']); // Đảm bảo nhận đúng số lượng

    $table_name = "cauhoi";
    $title = 'Ảnh đại diện';
    $photoDetail = ''; // Nếu có ảnh sẵn thì lấy đường dẫn ảnh
    $input_name = 'datafaq' . $soluong . '[photo]';
    $table_key = 'datafaq' . $soluong . '[photo]';

    ob_start();
    include LAYOUT_PATH . "single_image_faq.php";
    echo ob_get_clean();
}
?>
