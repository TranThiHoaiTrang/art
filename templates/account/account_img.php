<?php
// Kiểm tra nếu có tham số text
if (isset($_GET['text'])) {
    $text = $_GET['text'];
    function generateImage($text)
    {
        ob_start(); // Bắt đầu buffer output để tránh lỗi output trước header
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $width = 300;
        $height = 300;
        $fontSize = 130; // Tăng kích thước chữ

        $img = imagecreatetruecolor($width, $height);

        // Màu nền #EEE (RGB: 238, 238, 238)
        $bgColor = imagecolorallocate($img, 238, 238, 238);

        // Màu chữ #ED5425 (RGB: 237, 84, 37)
        $textColor = imagecolorallocate($img, 237, 84, 37);

        imagefilledrectangle($img, 0, 0, $width, $height, $bgColor);

        // Đường dẫn font
        $font = $_SERVER['DOCUMENT_ROOT'] . "/assets/fonts/SVN-Poppins/TTF/SVN-Poppins-SemiBold.ttf";
        if (!file_exists($font)) {
            die("⚠️ Không tìm thấy font: " . $font);
        }

        // Lấy kích thước chữ
        $bbox = imagettfbbox($fontSize, 0, $font, $text);
        $textWidth = $bbox[2] - $bbox[0];  // Chiều rộng chữ
        $textHeight = $bbox[1] - $bbox[7]; // Chiều cao chữ

        // Tính toán vị trí để căn giữa
        $x = ($width - $textWidth) / 2;
        $y = ($height - $textHeight) / 2 + $textHeight; // Dịch xuống để căn giữa tốt hơn

        // Vẽ chữ lên ảnh
        imagettftext($img, $fontSize, 0, $x, $y, $textColor, $font, $text);

        // Kiểm tra có output trước đó không
        if (headers_sent()) {
            die("⚠️ Lỗi: Có dữ liệu output trước header!");
        }

        header('Content-Type: image/png');
        imagepng($img);
        imagedestroy($img);
        exit;
    }

    // Gọi hàm tạo ảnh với text thử nghiệm
    generateImage($text);
}
