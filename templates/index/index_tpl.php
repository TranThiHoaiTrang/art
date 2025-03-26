<div class="wrap_bottom">
    <div class="fixwidth">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="noidung_banner_trangchu">
                    <div class="mota_banner_trangchu">
                        <?= Helper::the_thumbnail($banner_trangchu['photo1'], '', $banner_trangchu['ten' . $lang], true) ?>
                    </div>
                    <div class="name_banner_trangchu"><?= $banner_trangchu['ten' . $lang] ?></div>
                    <div class="noidung_banner_trangchu"><?= htmlspecialchars_decode($banner_trangchu['noidung' . $lang]) ?></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="img_banner_trangchu">
                    <?= Helper::the_thumbnail($banner_trangchu['photo'], '', $banner_trangchu['ten' . $lang], true) ?>
                    <img src="<?= $config_base ?>/assets/images/hoasen.png" alt="" class="img_hoasen">
                </div>
            </div>
        </div>
        <div class="all_nhungconso">
            <?php foreach ($nhungconso as $v) { ?>
                <div class="nhungconso">
                    <div class="noidung_ncs counter"><?= htmlspecialchars_decode($v['noidung' . $lang]) ?></div>
                    <div class="name_ncs"><?= htmlspecialchars_decode($v['ten' . $lang]) ?></div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="wrap_bottom wrap_width">
    <div class="fixwidth">
        <div class="title_khoahoc">
            <span>Khóa học được yêu thích</span>
        </div>
        <div class="all_khoahoc_carousel">
            <div class="owl-carousel owl-theme auto_social">
                <?php foreach ($sphotmenu as $v) { ?>
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
                                    <div class="giohang_khoahoc">
                                        <img src="./assets/images/giohang.png" alt="">
                                    </div>
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
        </div>
    </div>
</div>

<div class="wrap_bottom wrap_width">
    <div class="fixwidth">
        <div class="all_hethongphancap">
            <div class="name_hethongphancap"><?= $hethongphancap['ten' . $lang] ?></div>
            <div class="noidung_hethongphancap"><?= htmlspecialchars_decode($hethongphancap['noidung' . $lang]) ?></div>
        </div>
        <div class="all_list_hot">
            <?php foreach ($sphotlist as $v) { ?>
                <a href="<?= $v['tenkhongdauvi'] ?>">
                    <div class="list_hot">
                        <?= Helper::the_thumbnail($v['photo'], '', $v['ten' . $lang], true) ?>
                        <div class="name_list_hot"><?= $v['ten' . $lang] ?></div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
</div>

<?php foreach ($spnoibatlist as $l) {
    $spnb = $d->rawQuery("select * from #_product where type = 'san-pham' and id_list = '" . $l['id'] . "' and noibat > 0 and hienthi > 0 order by stt,id desc");
    if ($spnb) {
?>
        <div class="wrap_bottom">
            <div class="fixwidth">
                <div class="title_khoahoc">
                    <span><?= $l['ten' . $lang] ?></span>
                </div>
            </div>
            <div class="all_khoahoc_carousel">
                <div class="owl-carousel owl-theme owl-dv">
                    <?php foreach ($spnb as $v) { ?>
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
            </div>
        </div>
<?php }
} ?>

<div class="wrap_bottom wrap_width">
    <div class="fixwidth">
        <div class="all_hethongphancap">
            <div class="name_hethongphancap"><?= htmlspecialchars_decode($text_cachthuchoc['mota' . $lang]) ?></div>
            <div class="noidung_hethongphancap"><?= htmlspecialchars_decode($text_cachthuchoc['noidung' . $lang]) ?></div>
        </div>
        <div class="all_cachtuchoc_index">
            <?php foreach ($cachthuchoc as $v) { ?>
                <a href="<?= $v['tenkhongdauvi'] ?>">
                    <div class="cachtuchoc_index">
                        <div class="img_cachtuchoc_index">
                            <?= Helper::the_thumbnail($v['photo'], '', $v['ten' . $lang], true) ?>
                        </div>
                        <div class="content_cachtuchoc_index">
                            <div class="name_cachtuchoc_index"><?= $v['ten' . $lang] ?></div>
                            <div class="noidung_cachtuchoc_index"><?= htmlspecialchars_decode($v['noidung' . $lang]) ?></div>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
</div>

<div class="wrap_bottom wrap_width">
    <div class="fixwidth">
        <div class="all_hethongphancap">
            <div class="name_hethongphancap">
                <span>Vì sao bạn chọn </span>
                <span style="color: #f87f10;">The R’art School?</span>
            </div>
        </div>
        <div class="all_visaobanchon_index">
            <?php foreach ($visaobanchon as $v) { ?>
                <a href="<?= $v['tenkhongdauvi'] ?>">
                    <div class="visaobanchon_index">
                        <div class="img_visaobanchon_index">
                            <?= Helper::the_thumbnail($v['photo'], '', $v['ten' . $lang], true) ?>
                        </div>
                        <div class="content_visaobanchon_index">
                            <div class="name_visaobanchon_index"><?= $v['ten' . $lang] ?></div>
                            <div class="noidung_visaobanchon_index"><?= htmlspecialchars_decode($v['noidung' . $lang]) ?></div>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
</div>

<div class="wrap_bottom wrap_width">
    <div class="fixwidth">
        <div class="all_banner_home">
            <p class="control-slideshow prev-slideshow transition"><i class="fas fa-chevron-left"></i></p>
            <div class="owl_banner_home owl-carousel owl-theme owl-slideshow">
                <?php foreach ($bannerhome as $v) { ?>
                    <div class="item_banner_home ">
                        <a href="<?= $v['link'] ?>" target="_blank" title="<?= $v['ten' . $lang] ?>" aria-label="slide" class="link_item_slider">
                            <img onerror="this.src='<?= Helper::noimage() ?>';" src="<?= Helper::thumbnail_link($v['photo']) ?>" alt="<?= $v['ten' . $lang] ?>" title="<?= $v['ten' . $lang] ?>" width="1520" height="580" />
                        </a>
                    </div>
                <?php } ?>
            </div>
            <p class="control-slideshow next-slideshow transition"><i class="fas fa-chevron-right"></i></p>
        </div>
    </div>
</div>

<div class="wrap_bottom wrap_width">
    <div class="fixwidth">
        <div class="all_hethongphancap">
            <div class="name_hethongphancap">
                Câu hỏi thường gặp
            </div>
        </div>
        <div class="all_cauhoithuonggap">
            <?php foreach ($cauhoithuonggap as $v) { ?>
                <div class="cauhoithuonggap">
                    <div class="name_cauhoithuonggap">
                        <span><?= $v['ten' . $lang] ?></span>
                        <span class="icon_chinhsach_des"><i class="fas fa-plus"></i></span>
                    </div>
                    <div class="noidung_cauhoithuonggap"><?= htmlspecialchars_decode($v['noidung' . $lang]) ?></div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="wrap_bottom wrap_width">
    <div class="fixwidth">
        <div class="all_hethongphancap">
            <div class="name_hethongphancap">
                đội ngũ giảng viên
            </div>
        </div>
        <div class="all_giangvien">
            <p class="control-deal prev-deal transition"><i class="fas fa-chevron-left"></i></p>
            <div class="owl-carousel owl-theme auto_deal">
                <?php foreach ($giangvien as $v) { ?>
                    <div class="giangvien">
                        <img src="<?= Helper::thumbnail_link($v['photo']) ?>" alt="<?= $v['ten' . $lang] ?>" title="<?= $v['ten' . $lang] ?>" />
                        <div class="name_giangvien"><?= $v['ten'.$lang] ?></div>
                    </div>
                <?php } ?>
            </div>
            <p class="control-deal next-deal transition"><i class="fas fa-chevron-right"></i></p>
        </div>
    </div>
</div>