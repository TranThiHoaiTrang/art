<!-- <div class="background-banner" class="mb-5">
    <div class="fixwidth">
        <div class="all_bread d-flex">
            <div class="bread_title"><?= (@$title_cat != '') ? $title_cat : @$title_crumb ?></div>
            <div class="breadCrumbs">
                <div><?= $breadcrumbs ?></div>
            </div>
        </div>
    </div>
</div> -->
<div class="fixwidth">
    <div class="ketqua_timkiem">
        <span>Kết quả tìm kiếm </span>
        <span>“[<?= $tukhoa2 ?>]” </span>
        <span>(<?= $total ?> sản phẩm)</span>
    </div>
</div>

<?php if (isset($product) && count($product) > 0) { ?>
    <div class="content-main w-clear">
        <div class="fixwidth">
            <?php if (isset($product) && count($product) > 0) { ?>
                <div class="all_sp_search">
                    <div class="loadkhung_product3 mainkhung_product ">
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
                    <div class="pagination-home"><?= (isset($paging) && $paging != '') ? $paging : '' ?></div>
                </div>
            <?php } else { ?>
                <div class="alert alert-warning" role="alert">
                    <strong><?= khongtimthayketqua ?></strong>
                </div>
            <?php } ?>
            <div class="clear"></div>
            <div class="pagination-home"><?= (isset($paging) && $paging != '') ? $paging : '' ?></div>
        </div>
    </div>
<?php } else { ?>
    <div class="fixwidth">
        <div class="all_search_rong">
            <!-- <div class="img_search">
                <img src="./assets/images/Search.png" alt="">
            </div> -->
            <div class="rattiec">
                <span>Rất tiếc, chúng tôi không tìm thấy sản phẩm từ</span>
                <span>“[<?= $tukhoa2 ?>]”</span>
            </div>
            <div class="all_giaithich_search">
                <span>1. Kiểm tra lại từ khóa có thể bạn đã gõ sai</span>
                <span>2. Hãy dùng từ khóa ngắn và đơn giản hơn</span>
                <!-- <div class="all_search_nhaplai d-flex align-items-center">
                    <span>3. Nhập lại từ khóa</span>
                    <div class="frm_timkiem">
                        <input type="text" class="input" id="keyword3" placeholder="Tìm kiếm" onkeypress="doEnter(event,'keyword3');">
                        <button type="submit" value="" class="nut_tim" onclick="onSearch('keyword3');"><i class="far fa-search"></i></button>
                    </div>
                </div> -->
            </div>
            <div class="giupdo_search">
                <span>Bạn cần giúp đỡ? Vui lòng liên hệ hỗ trợ khách hàng</span>
                <div class="all_hotline_search">
                    <span><i class="fas fa-phone-alt"></i></span>
                    <span><?= $optsetting['hotline'] ?> - </span>
                    <span><?= $optsetting['dienthoai'] ?></span>
                </div>
            </div>
            <div class="tieptuc_mua">
                <a href="san-pham">Tiếp tục xem khóa học</a>
            </div>
        </div>
    </div>

<?php } ?>
<div class="clear"></div>