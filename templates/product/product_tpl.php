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
    <div class="fixwidth">
        <div class="content-main w-clear">
            <div class="site-content">
                <div class="row row_tintuc">
                    <div class="col-md-3">
                        <?php include LAYOUT_PATH . "right-sanpham.php"; ?>
                    </div>
                    <div class="col-md-9">
                        <?php if (isset($product) && count($product) > 0) { ?>
                            <div class="all_sp_search">
                                <?php if ($pro_list['ten' . $lang] != '') { ?>
                                    <div class="img_banner_product mb-4">
                                        <?= Helper::the_thumbnail($pro_list['photo1'], '', $pro_list['ten' . $lang], true) ?>
                                    </div>
                                <?php } ?>

                                <div class="loadkhung_product mainkhung_product ">
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
                    </div>
                </div>

                <div class="clear"></div>
                <?php if ($noidung_page != '') { ?>
                    <div class="wrap_bottom pt-0">
                        <div class="fixwidth">
                            <div class="entry-post">
                                <div class="entry-left">
                                    <div class="contact_news">
                                        <h1 class="name_tt_chitiet">
                                            <?= $row_detail['ten' . $lang] ?>
                                        </h1>
                                        <div class="all_gioithieu_index" id="toc-content">
                                            <?= htmlspecialchars_decode($noidung_page) ?>
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
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>