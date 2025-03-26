<div class="pt-5 all_breadCrumbs">
    <div class="fixwidth">
        <div class="all_bread d-flex">
            <div class="breadCrumbs">
                <div><?= $breadcrumbs ?></div>
            </div>
            <div class="bread_title"><?= (@$title_cat != '') ? $title_cat : @$title_crumb ?></div>
        </div>
    </div>
</div>
<div class="pt-5 pb-5">
    <input type="hidden" name="idpro" value="<?= $row_detail['id'] ?>">
    <div class="fixwidth">
        <div class="clearfix">
            <div class="grid-pro-detail w-clear">
                <div class="left-pro-detail w-clear">
                    <a id="Zoom-1" class="MagicZoom" data-options="" href="<?= Helper::thumbnail_link($row_detail['photo']) ?>" title="<?= $row_detail['ten' . $lang] ?>">
                        <img onerror="this.src='<?= Helper::noimage() ?>';" src="<?= Helper::thumbnail_link($row_detail['photo']) ?>" alt="<?= $row_detail['ten' . $lang] ?>">
                    </a>
                    <?php
                    if ($row_detail['gallery'] || $row_detail['link_video']) { ?>
                        <div class="gallery-thumb-pro">
                            <p class="control-carousel prev-carousel prev-thumb-pro transition"><i class="fas fa-chevron-left"></i></p>
                            <div class="owl-carousel owl-theme owl-thumb-pro">
                                <?php if ($row_detail['link_video']) {
                                    $youtubeId = $func->getYoutube($row_detail['link_video']);
                                ?>
                                    <a class="thumb-pro-detail thumb-pro-detail-video" data-fancybox="video" data-src="https://www.youtube.com/embed/<?= $youtubeId ?>?autoplay=1" data-type="iframe" title="<?= $row_detail['ten' . $lang] ?>">
                                        <img src="https://img.youtube.com/vi/<?= $youtubeId ?>/maxresdefault.jpg" alt="<?= $row_detail['ten' . $lang] ?>" />
                                    </a>
                                <?php } ?>
                                <a class="thumb-pro-detail" data-fancybox="video" data-src="<?= Helper::thumbnail_link($row_detail['photo']) ?>" onclick="showImageInMain('<?= Helper::thumbnail_link($row_detail['photo']) ?>', '<?= $row_detail['ten' . $lang] ?>');" title="<?= $row_detail['ten' . $lang] ?>">
                                    <img onerror="this.src='<?= Helper::noimage() ?>';" src="<?= Helper::thumbnail_link($row_detail['photo']) ?>" alt="<?= $row_detail['ten' . $lang] ?>">
                                </a>
                                <?php
                                if ($row_detail['gallery']) {
                                    $hinhanhsp = explode(',', $row_detail['gallery']);
                                    if (count($hinhanhsp) > 0) { ?>
                                        <?php foreach ($hinhanhsp as $v) { ?>
                                            <a class="thumb-pro-detail" data-zoom-id="Zoom-1" data-fancybox="video" data-src="<?= Helper::thumbnail_link($v) ?>" onclick="showImageInMain('<?= Helper::thumbnail_link($v) ?>', '<?= $row_detail['ten' . $lang] ?>');" title="<?= $row_detail['ten' . $lang] ?>">
                                                <img onerror="this.src='<?= Helper::noimage() ?>';" src="<?= Helper::thumbnail_link($v) ?>">
                                            </a>
                                        <?php } ?>
                                <?php }
                                } ?>
                            </div>
                            <p class="control-carousel next-carousel next-thumb-pro transition"><i class="fas fa-chevron-right"></i></p>
                        </div>
                    <?php } ?>
                </div>
                <div class="right-pro-detail w-clear">
                    <p class="title-pro-detail"><?= $row_detail['ten' . $lang] ?></p>
                    <div class="attr-pro-detail">
                        <span>Học trọn gói chỉ với: </span>
                        <div class="all_gia_detail">
                            <?php if ($row_detail['giamoi']) { ?>
                                <del>
                                    <ins class="highlight_del">
                                        <?= $func->format_money($row_detail['gia']) ?>
                                    </ins>
                                </del>
                                <p class="price" style="margin-bottom: 0;">
                                    <ins class="highlight">
                                        <?= $func->format_money($row_detail['giamoi']) ?>
                                    </ins>
                                </p>
                            <?php } else { ?>
                                <p class="price" style="margin-bottom: 0;">
                                    <ins class="highlight">
                                        <?= $func->format_money($row_detail['gia']) ?>
                                    </ins>
                                </p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="all_hocthumienphi">
                        <a href="" class="hoc_thu_mien_phi">
                            <span>Học thử miễn phí</span>
                        </a>
                        <a href="" class="dang_ki_mien_phi">
                            <span>Đăng kí</span>
                        </a>
                    </div>
                    <div class="thongtin_product">
                        <div class="content_product_detail">
                            <?= (isset($row_detail['mota' . $lang]) && $row_detail['mota' . $lang] != '') ? htmlspecialchars_decode($row_detail['mota' . $lang]) : '' ?>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="all_nd_product_detail">
                <div class="title_info_pro_detail">Mô tả khóa học</div>
                <div class="entry-post">
                    <div class="entry-left">
                        <div class="contact_product">
                            <div class="info-pro-detail active all_gioithieu_index" id="toc-content">
                                <?= (isset($row_detail['noidung' . $lang]) && $row_detail['noidung' . $lang] != '') ? htmlspecialchars_decode($row_detail['noidung' . $lang]) : '' ?>
                            </div>
                        </div>
                    </div>
                    <div class="entry-right">
                        <div class="meta-toc">
                            <div class="all_meta-toc">
                                <div class="toc_title">
                                    MỤC LỤC
                                    <span class="toc_toggle">[Ẩn]</span>
                                </div>
                                <div class="box-readmore">
                                    <ul class="toc-list" data-toc="article" data-toc-headings="h1, h2, h3"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="all_title_decuong_khoahoc mt-4 mb-4">
                <div class="title_info_pro_detail">Đề cương khóa học</div>
                <?php
                $decuongkhoahoc = $d->rawQuery("select * from #_product_brand where type = '$type' and id_khoahoc = '" . $row_detail['id'] . "' and hienthi > 0 order by stt,id desc");
                ?>
                <div class="all_decuongkhoahoc">
                    <?php if (count($decuongkhoahoc) > 0) { ?>
                        <?php foreach ($decuongkhoahoc as $k => $dc) { ?>
                            <div class="decuongkhoahoc">
                                <div class="name_decuongkhoahoc">
                                    <span><?= $dc['ten' . $lang] ?></span>
                                    <span class="icon_decuongkhoahoc_des"><i class="fas fa-plus"></i></span>
                                </div>
                                <div class="noidung_decuongkhoahoc all_gioithieu_index">
                                    <?= htmlspecialchars_decode($dc['noidung' . $lang]) ?>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="rong_khoahoc" role="alert">
                            <span>Chưa được cập nhật</span>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="title_sp_cungloai">Sản phẩm tương tự</div> -->
    <div class="fixwidth">
        <div class="title_dm_nb_index mt-4">
            <div class="title_dm_left">
                <div class="title_dm_nb_list">Sản phẩm tương tự</div>
            </div>
        </div>
    </div>
    <div class="content-main w-clear all_khoahoc_carousel">
        <?php if (isset($product) && count($product) > 0) { ?>
            <div class="owl-carousel owl-theme owl-dv">
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