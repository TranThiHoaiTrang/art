<?php if ($row_detail['photo1']) { ?>
    <div class="all_banner_chitiet_khoahoc">
        <div class="banner_khoahoc">
            <img onerror="this.src='<?= Helper::noimage() ?>';" src="<?= Helper::thumbnail_link($row_detail['photo1']) ?>" alt="<?= $row_detail['ten' . $lang] ?>">
        </div>
        <div class="name_khoahoc_muangya">
            <div class="name_khoahoc_detail"><?= $row_detail['ten' . $lang] ?></div>
            <?php if ($row_detail['gia']) { ?>
                <div class="all_muangay">
                    <?php if ($_SESSION[$login_member]['id']) { ?>
                        <a class="addcart addcart_muangay" data-action="buynow" data-id="<?= $row_detail['id'] ?>" data-name="<?= $row_detail['tenvi'] ?>" data-gia="<?= (!empty($row_detail['giamoi']) && $row_detail['giamoi'] != '') ? $func->format_money($row_detail['giamoi']) : $func->format_money($row_detail['gia']) ?>">
                            Mua ngay
                        </a>
                    <?php } else { ?>
                        <a class="addcart addcart_muangay" data-toggle="modal" data-target="#tb_login">
                            Mua ngay
                        </a>
                    <?php } ?>

                </div>
            <?php } ?>
        </div>
    </div>

    <div class="wrapper-navCombo">
        <div class="fixwidth">
            <div class="navCombo">
                <ul>
                    <li>
                        <a href="<?= $row_detail['tenkhongdauvi'] ?>#chitietkhoahoc">
                            Chi tiết khóa học
                        </a>
                    </li>
                    <li>
                        <a href="<?= $row_detail['tenkhongdauvi'] ?>#chuongtrinhhoc">
                            Chương trình học
                        </a>
                    </li>
                    <li>
                        <a href="<?= $row_detail['tenkhongdauvi'] ?>#quyenloi">
                            Quyền lợi
                        </a>
                    </li>
                    <li>
                        <a href="<?= $row_detail['tenkhongdauvi'] ?>#danhgia">
                            Đánh giá
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php } ?>
<?php
$giangvien = $d->rawQueryOne("select * from #_news where type = 'giangvien' and id = '" . $row_detail['id_giangvien'] . "' and hienthi > 0 order by stt,id desc");
$cauhoi = $d->rawQuery("select * from #_cauhoi where type = 'san-pham' and idmuc = '" . $row_detail['id'] . "' order by id desc");
?>
<div class="pt-5 pb-5">
    <div class="fixwidth">
        <div class="all_chitiet_khoahoc">
            <div class="name_danhmuc_chitiet_khoahoc">Chi tiết khóa học</div>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="text_img_chitiet_khoahoc">
                        <div class="img_chitiet_khoahoc">
                            <img onerror="this.src='<?= Helper::noimage() ?>';" src="<?= Helper::thumbnail_link($row_detail['photo']) ?>" alt="<?= $row_detail['ten' . $lang] ?>">
                        </div>
                        <div class="text_chitiet_khoahoc">
                            <div class="name_chitiet_khoahoc">
                                <?= $row_detail['ten' . $lang] ?>
                            </div>
                            <div class="mota_chitiet_khoahoc">
                                Khóa học hướng dẫn <?= $row_detail['ten' . $lang] ?>
                            </div>
                            <div class="giangvien_chitiet_khoahoc">
                                <div class="name_gv">
                                    GV.<?= $giangvien['ten' . $lang] ?>
                                </div>
                                <div class="all_bh">
                                    <strong><?= $row_detail['videobaigiang'] ?></strong>
                                    <span> Bài học</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="all_content_chitiet_khoahoc">
                        <div class="content_chitiet_khoahoc">
                            <?= $row_detail['ten' . $lang] ?>
                        </div>
                        <div class="all_dm_bh">
                            <div class="dm_kh">
                                <?= $pro_list['ten' . $lang] ?>
                            </div>
                            <div class="dm_kh">
                            <?= $row_detail['videobaigiang'] ?>
                            </div>
                        </div>
                        <div class="noidung_chitiet_khoahoc">
                            <?= htmlspecialchars_decode($row_detail['noidung' . $lang]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($cauhoi) { ?>
            <div class="all_giangvien_khoahoc pb-0">
                <div class="name_danhmuc_chitiet_khoahoc">Bạn sẽ làm được gì sau khóa học</div>
                <div class="all_banlamduocgi_product">
                    <?php foreach ($cauhoi as $ch) { ?>
                        <div class="banlamduocgi_product">
                            <div class="img_banlamduocgi_product">
                                <img onerror="this.src='<?= Helper::noimage() ?>';" src="<?= Helper::thumbnail_link($ch['photo']) ?>" alt="<?= $ch['ten' . $lang] ?>">
                            </div>
                            <div class="content_banlamduocgi_product">
                                <div class="name_banlamduocgi_product">
                                    <?= $ch['ten' . $lang] ?>
                                </div>
                                <div class="noidung_banlamduocgi_product">
                                    <?= htmlspecialchars_decode($ch['noidung' . $lang]) ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <?php if ($giangvien) { ?>
            <div class="all_giangvien_khoahoc all_giangvien_khoahoc_row ">
                <div class="name_danhmuc_chitiet_khoahoc">Giảng viên</div>
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="banner_giangvien_khoahoc">
                            <img onerror="this.src='<?= Helper::noimage() ?>';" src="<?= Helper::thumbnail_link($giangvien['photo1']) ?>" alt="<?= $row_detail['ten' . $lang] ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="all_row_noidung_giangvien">
                            <div class="row_noidung_giangvien">
                                <div class="img_row_ndgv">
                                    <img src="./assets/images/play_gv.png" alt="">
                                </div>
                                <div class="name_row_ndgv">
                                    Nội dung
                                </div>
                                <div class="mota_row_ndgv">
                                    Thời lượng: <?= $row_detail['videobaigiang'] ?> bài
                                </div>
                            </div>
                            <div class="row_noidung_giangvien">
                                <div class="img_row_ndgv">
                                    <img src="./assets/images/amthanh_gv.png" alt="">
                                </div>
                                <div class="name_row_ndgv">
                                    Âm thanh
                                </div>
                                <div class="mota_row_ndgv">
                                    <?= $row_detail['amthanh'] ?>
                                </div>
                            </div>
                            <div class="row_noidung_giangvien">
                                <div class="img_row_ndgv">
                                    <img src="./assets/images/congcu.png" alt="">
                                </div>
                                <div class="name_row_ndgv">
                                    Công cụ
                                </div>
                                <div class="mota_row_ndgv">
                                    <?= $row_detail['congcu'] ?>
                                </div>
                            </div>
                            <div class="row_noidung_giangvien">
                                <div class="img_row_ndgv">
                                    <img src="./assets/images/dichvu.png" alt="">
                                </div>
                                <div class="name_row_ndgv">
                                    Dịch vụ
                                </div>
                                <div class="mota_row_ndgv">
                                    <?= $row_detail['dichvu'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="all_giangvien_khoahoc pt-0">
                <div class="name_danhmuc_chitiet_khoahoc">Portfolio của giảng viên</div>
                <?php if ($giangvien['gallery']) { ?>
                    <div class="all_gallery_giangvien">
                        <?php
                        $hinhanhgv = explode(',', $giangvien['gallery']);
                        ?>
                        <?php foreach ($hinhanhgv as $v) { ?>
                            <a data-fancybox="album" data-src="<?= Helper::thumbnail_link($v) ?>" title="<?= $bai['ten' . $lang] ?>">
                                <div class="gallery_giangvien">
                                    <img onerror="this.src='<?= Helper::noimage() ?>';" src="<?= Helper::thumbnail_link($v) ?>">
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
        <div class="all_giangvien_khoahoc pt-0" id="chuongtrinhhoc">
            <div class="name_danhmuc_chitiet_khoahoc">Chương trình học</div>
            <div class="noidung_chuongtrinhhoc all_gioithieu_index">
                <?= htmlspecialchars_decode($row_detail['chuongtrinhhoc' . $lang]) ?>
            </div>
            <div class="row_nd_chuongtrinhhoc">
                <div class="row_nd_cth">
                    <div class="noidung_row_nd_cth"><?= $row_detail['videobaigiang'] ?></div>
                    <div class="name_row_nd_cth">Video bài giảng</div>
                </div>
                <div class="row_nd_cth">
                    <div class="noidung_row_nd_cth"><?= $row_detail['thoigianhoc'] ?></div>
                    <div class="name_row_nd_cth">Thời gian học</div>
                </div>
                <div class="row_nd_cth">
                    <div class="noidung_row_nd_cth"><?= $row_detail['thanhpham'] ?></div>
                    <div class="name_row_nd_cth">Sản phẩm đạt được</div>
                </div>
            </div>
        </div>
    </div>
    <div class="all_video_khoahoc_product">
        <div class="fixwidth">
            <div class="video_khoahoc_product">
                <?php
                $id_youtube = $func->getYoutube($row_detail['link_video']);
                ?>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $id_youtube ?>" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <div class="all_chuong_khoahoc_product">
        <div class="fixwidth">
            <div class="fix_kh_pro">
                <?php
                $sp_brand = $d->rawQuery("select * from #_product_brand where type = '$type' and id_khoahoc = '" . $row_detail['id'] . "' and hienthi > 0 order by stt,id ASC");
                ?>
                <div class="all_title_chuong_khoahoc">
                    <span>Bài học trong khóa</span>
                </div>
                <div class="all_chuong_khoahoc_product">
                    <?php foreach ($sp_brand as $br) {
                        $sp_bai = $d->rawQuery("select * from #_product_doday where type = '$type' and id_chuong_khoahoc = '" . $br['id'] . "' and hienthi > 0 order by stt,id ASC");
                    ?>
                        <div class="chuong_khoa_hoc">
                            <div class="title_chuong_khoahoc">
                                <span><?= $br['ten' . $lang] ?></span>
                                <span class="icon_khoahoc_detail"><i class="fas fa-angle-down"></i></span>
                            </div>
                            <div class="all_bai_khoahoc">
                                <?php foreach ($sp_bai as $bai) {
                                    $current_id = $bai['id'];
                                    $member_khoahoc_prev = $d->rawQueryOne("select * from #_member_khoahoc where id_user = '" . $_SESSION[$login_member]['id'] . "'  and id_khoahoc = '" . $row_detail['id'] . "' and id_chuong = '" . $br['id'] . "'  and id_bai_khoahoc = '" . $prev_id['id'] . "'");
                                ?>
                                    <div class="all_noidung_title_khoahoc_baihoc">
                                        <?php if ($prev_id !== null) { ?>
                                            <?php if ($member_khoahoc_prev['check'] != 0 || $bai['check_lock'] == 1) { ?>

                                                <div class="bai_khoahoc">
                                                    <div class="bai_khoahoc_left">
                                                        <img src="./assets/images/lock_cr.svg" alt="">
                                                        <span><?= $bai['ten' . $lang] ?></span>
                                                    </div>
                                                    <a data-fancybox="video" data-src="<?= $bai['link_video'] ?>" title="<?= $bai['ten' . $lang] ?>">
                                                        <div class="bai_khoahoc_right">
                                                            <!-- <img src="./assets/images/eye.svg" alt=""> -->
                                                            <i class="fas fa-play"></i>
                                                            <span><?= $bai['thoiluong_video'] ?></span>
                                                        </div>
                                                    </a>
                                                </div>

                                                <?php if ($bai['noidung' . $lang]) { ?>
                                                    <div class="noidung_khoahoc_baihoc">
                                                        <?= htmlspecialchars_decode($bai['noidung' . $lang]) ?>
                                                    </div>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <a>
                                                    <div class="bai_khoahoc">
                                                        <div class="bai_khoahoc_left">
                                                            <img src="./assets/images/lock.svg" alt="">
                                                            <span><?= $bai['ten' . $lang] ?></span>
                                                        </div>
                                                        <div class="bai_khoahoc_right">
                                                            <img src="./assets/images/eye.svg" alt="">
                                                            <span><?= $bai['thoiluong_video'] ?></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <div class="bai_khoahoc">
                                                <div class="bai_khoahoc_left">
                                                    <img src="./assets/images/lock_cr.svg" alt="">
                                                    <span><?= $bai['ten' . $lang] ?></span>
                                                </div>
                                                <a data-fancybox="video" data-src="<?= $bai['link_video'] ?>" title="<?= $bai['ten' . $lang] ?>">
                                                    <div class="bai_khoahoc_right">
                                                        <!-- <img src="./assets/images/eye.svg" alt=""> -->
                                                        <i class="fas fa-play"></i>
                                                        <span><?= $bai['thoiluong_video'] ?></span>
                                                    </div>
                                                </a>
                                            </div>
                                            <?php if ($bai['noidung' . $lang]) { ?>
                                                <div class="noidung_khoahoc_baihoc">
                                                    <?= htmlspecialchars_decode($bai['noidung' . $lang]) ?>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                <?php $prev_id = $current_id;
                                } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="all_profile_khoahoc">
        <div class="fixwidth">
            <div class="name_danhmuc_chitiet_khoahoc">Bài tập</div>
            <?php if ($row_detail['gallery']) { ?>
                <div class="all_gallery_giangvien">
                    <?php
                    $hinhanhgv = explode(',', $row_detail['gallery']);
                    ?>
                    <?php foreach ($hinhanhgv as $v) { ?>
                        <a data-fancybox="album2" data-src="<?= Helper::thumbnail_link($v) ?>" title="<?= $bai['ten' . $lang] ?>">
                            <div class="gallery_giangvien">
                                <img onerror="this.src='<?= Helper::noimage() ?>';" src="<?= Helper::thumbnail_link($v) ?>">
                            </div>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="all_profile_khoahoc" id="danhgia">
        <div class="fixwidth">
            <div class="name_danhmuc_chitiet_khoahoc">Học viên nhận xét</div>
            <?php if ($_SESSION[$login_member]['id']) { ?>
                <div class="all_rating_des">
                    <div class="rating_des_left">
                        <div class="all_rating_right_des">
                            <div class="all_number_rating">
                                <div class="rating_right_number"><?= $func->get_rating_number($row_detail['id']) ?></div>
                                <div class="rating_right_soluong">
                                    <div class="rating-system_top">
                                        <div class="rating--inner-top " data-id="<?= $row_detail['id'] ?>">
                                            <div class="rating">
                                                <ul>
                                                    <li data-star="5"><i class="fal fa-star"></i></li>
                                                    <li data-star="4"><i class="fal fa-star"></i></li>
                                                    <li data-star="3"><i class="fal fa-star"></i></li>
                                                    <li data-star="2"><i class="fal fa-star"></i></li>
                                                    <li data-star="1"><i class="fal fa-star"></i></li>
                                                </ul>
                                                <span style="width:<?= $func->get_phantram_rating($row_detail['id']) ?>%;"></span>
                                            </div>
                                            <div class="votes"><?= $func->get_rating($row_detail['id']) ?> đánh giá</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="all_rating_loai">
                                <div class="percentages">
                                    <div class="glsr-bar" data-level="5">
                                        <span class="glsr-bar-label">5 sao</span>
                                        <span class="glsr-bar-background">
                                            <span class="glsr-bar-background-percent" style="width:<?= $func->get_phantram_rating_loai($row_detail['id'], 5) ?>%"></span>
                                        </span>
                                        <span class="glsr-bar-percent"><?= $func->get_phantram_rating_loai($row_detail['id'], 5) ?>%</span>
                                    </div>
                                    <div class="glsr-bar" data-level="4">
                                        <span class="glsr-bar-label">4 sao</span>
                                        <span class="glsr-bar-background">
                                            <span class="glsr-bar-background-percent" style="width:<?= $func->get_phantram_rating_loai($row_detail['id'], 4) ?>%"></span>
                                        </span>
                                        <span class="glsr-bar-percent"><?= $func->get_phantram_rating_loai($row_detail['id'], 4) ?>%</span>
                                    </div>
                                    <div class="glsr-bar" data-level="3">
                                        <span class="glsr-bar-label">3 sao</span>
                                        <span class="glsr-bar-background">
                                            <span class="glsr-bar-background-percent" style="width:<?= $func->get_phantram_rating_loai($row_detail['id'], 3) ?>%"></span>
                                        </span>
                                        <span class="glsr-bar-percent"><?= $func->get_phantram_rating_loai($row_detail['id'], 3) ?></span>
                                    </div>
                                    <div class="glsr-bar" data-level="2">
                                        <span class="glsr-bar-label">2 sao</span>
                                        <span class="glsr-bar-background">
                                            <span class="glsr-bar-background-percent" style="width:<?= $func->get_phantram_rating_loai($row_detail['id'], 2) ?>%"></span>
                                        </span>
                                        <span class="glsr-bar-percent"><?= $func->get_phantram_rating_loai($row_detail['id'], 2) ?></span>
                                    </div>
                                    <div class="glsr-bar" data-level="1">
                                        <span class="glsr-bar-label">1 sao</span>
                                        <span class="glsr-bar-background">
                                            <span class="glsr-bar-background-percent" style="width:<?= $func->get_phantram_rating_loai($row_detail['id'], 1) ?>%"></span>
                                        </span>
                                        <span class="glsr-bar-percent"><?= $func->get_phantram_rating_loai($row_detail['id'], 1) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rating_des_right">
                        <div class="title_danhgia_sp">Đánh giá sản phẩm</div>

                        <div class="chiase_camnhan">
                            <span>Chia sẻ suy nghĩ và đánh giá của bạn về sản phẩm</span>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rating">
                                <i class="far fa-star"></i>
                                <span>Gửi đánh giá của bạn</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="test"></div>
                <div class="all_noidung_danhgia">
                    <div class="title_csbh">Danh sách đánh giá (<?= $func->get_rating($row_detail['id']) ?>)</div>
                    <div class="paging-rating" data-id="<?= $row_detail['id'] ?>">
                        <div class="all_rating" data-id="<?= $row_detail['id'] ?>"></div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="all_rating_dangnhap">
                    <span>Vui lòng đăng nhập để bình luận</span>
                    <a href="account/dang-nhap" class="rating_dangnhap">Đăng nhập</a>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- <div class="title_sp_cungloai">Sản phẩm tương tự</div> -->
    <div class="fixwidth">
        <div class="title_dm_nb_index mt-4">
            <div class="title_dm_left">
                <div class="title_dm_nb_list">Khóa học bạn có thể thích</div>
            </div>
        </div>
        <div class="content-main w-clear all_khoahoc_carousel">
            <?php if (isset($product) && count($product) > 0) { ?>
                <div class="owl-carousel owl-theme auto_deal">
                    <?php foreach ($product as $k => $v) { ?>
                        <div class="khoahoc_index">
                            <div class="all_title_yeuthich">
                                <!-- <span>Kiến vàng</span> -->
                                <?php if ($_SESSION[$login_member]['id']) {
                                    $yeuthich = $d->rawQueryOne("select * from #_member_yeuthich where id_user = '" . $_SESSION[$login_member]['id'] . "' and id_product = '" . $v['id'] . "'");
                                ?>
                                    <div class="icon_yeuthich heart <?= $yeuthich['yeuthich'] == 1 ? 'active' : '' ?>" data-idpro="<?= $v['id'] ?>" data-id_user="<?= $_SESSION[$login_member]['id'] ?>" <?= $yeuthich['yeuthich'] == 0 ? 'data-yeuthich=1' : 'data-yeuthich=0' ?>>
                                        <i class="fa fa-heart"></i>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="img_khoahoc">
                                <a href="<?= $v['tenkhongdauvi'] ?>"><?= Helper::the_thumbnail($v['photo'], '', $v['ten' . $lang], true) ?></a>
                            </div>
                            <div class="all_content_khoahoc">
                                <a href="<?= $v['tenkhongdauvi'] ?>">
                                    <div class="name_khoahoc"><?= $v['ten' . $lang] ?></div>
                                </a>
                                <div class="gia_khoahoc">
                                    <?php if ($v['giamoi'] != 0) { ?>
                                        <span><?= $func->format_money($v['giamoi']) ?></span>
                                        <del><?= $func->format_money($v['gia']) ?></del>
                                    <?php } else { ?>
                                        <span><?= $func->format_money($v['gia']) ?></span>
                                    <?php } ?>
                                    <!-- <span><?= $func->format_money($v['gia']) ?></span> -->
                                </div>
                            </div>
                            <div class="all_xemthem_giohang">
                                <a href="<?= $v['tenkhongdauvi'] ?>">
                                    <div class="xemthem_khoahoc">Xem thêm</div>
                                </a>
                                <?php if ($_SESSION[$login_member]['id']) { ?>
                                    <a class="addcart" data-action="buynow" data-id="<?= $v['id'] ?>" data-name="<?= $v['tenvi'] ?>" data-gia="<?= (!empty($v['giamoi']) && $v['giamoi'] != '') ? $func->format_money($v['giamoi']) : $func->format_money($v['gia']) ?>">
                                        <div class="giohang_khoahoc"><img src="./assets/images/giohang.png" alt=""></div>
                                    </a>
                                <?php } else { ?>
                                    <button type="button" class="btn btn-khoahoc-login" data-toggle="modal" data-target="#tb_login">
                                        <img src="./assets/images/giohang.png" alt="">
                                    </button>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="clear"></div>
                <!-- <div class="pagination-home"><?= (isset($paging) && $paging != '') ? $paging : '' ?></div> -->
            <?php } else { ?>
                <div class="alert alert-warning" role="alert">
                    <strong><?= khongtimthayketqua ?></strong>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="wrap_bottom">
        <div class="fixwidth">
            <div class="all_banner_product">
                <p class="control-slideshow prev-slideshow transition"><i class="fas fa-chevron-left"></i></p>
                <div class="owl-carousel owl-theme owl-slideshow">
                    <?php foreach ($bannerkhoahoc as $v) { ?>
                        <div class="item_banner_home ">
                            <a href="<?= $v['link'] ?>" target="_blank" title="<?= $v['ten' . $lang] ?>" aria-label="slide" class="link_item_slider">
                                <img onerror="this.src='<?= Helper::noimage() ?>';" src="<?= Helper::thumbnail_link($v['photo']) ?>" alt="<?= $v['ten' . $lang] ?>" title="<?= $v['ten' . $lang] ?>" width="1520" height="580" />
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <p class="control-slideshow next-slideshow transition"><i class="fas fa-chevron-right"></i></p>
            </div>

            <div class="all_chungnhan_thanhtich_product pt-5" id="quyenloi">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="all_content_chungnhan_thanhtich">
                            <div class="name_chungnhan_thanhtich">
                                <?= $chungnhan['ten' . $lang] ?>
                            </div>
                            <div class="mota_chungnhan_thanhtich">
                                <?= htmlspecialchars_decode($chungnhan['mota' . $lang]) ?>
                            </div>
                            <div class="noidung_chungnhan_thanhtich">
                                <?= htmlspecialchars_decode($chungnhan['noidung' . $lang]) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="img_chungnhan_thanhtich">
                            <?= Helper::the_thumbnail($chungnhan['photo'], '', $chungnhan['ten' . $lang], true) ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>