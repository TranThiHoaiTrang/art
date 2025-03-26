<div class="all_static">
    <div class="pb-5 pt-5 all_breadCrumbs">
        <div class="fixwidth">
            <div class="all_bread d-flex">
                <div class="breadCrumbs">
                    <div><?= $breadcrumbs ?></div>
                </div>
                <div class="bread_title"><?= (@$title_cat != '') ? $title_cat : @$title_crumb ?></div>
            </div>
        </div>
    </div>
    <div class="content-main">
        <div class="fixwidth">
            <div class="all_gioithieu_index all_gioithieu_index_noidung pt-5">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="img_gioithieu_static">
                            <?= Helper::the_thumbnail($static['photo'], '', $static['ten' . $lang], true) ?>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="all_content_gioithieu_static">
                            <div class="title_gioithieu_static">
                                <?= $static['ten' . $lang] ?>
                            </div>
                            <div class="noidung_gioithieu_static">
                                <?= htmlspecialchars_decode($static['noidung' . $lang]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="wrap_quatrinhhinhthanh">
        <div class="fixwidth">
            <div class="all_tamnhan_sumenh">
                <?php foreach ($tamnhinsumenh as $v) { ?>
                    <div class="tamnhin_sumenh">
                        <div class="img_tamnhan_sumenh">
                            <?= Helper::the_thumbnail($v['photo'], '', $v['ten' . $lang], true) ?>
                        </div>
                        <div class="title_tamnhan_sumenh">
                            <?= $v['ten' . $lang] ?>
                        </div>
                        <div class="noidung_tamnhan_sumenh">
                            <?= htmlspecialchars_decode($v['noidung' . $lang]) ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="wrap_quatrinhhinhthanh">
        <div class="fixwidth">
            <div class="all_video_title_index">
                <div class="all_title_dm_sanpham">
                    <div class="title_dm_sanpham">
                        <?= $textlsht['ten' . $lang] ?>
                    </div>
                    <div class="noidung_dm_sanpham">
                        <?= htmlspecialchars_decode($textlsht['noidung' . $lang]) ?>
                    </div>
                </div>
                <div class="all_quatrinhhinhthanh_index">
                    <p class="control-quatrinhhinhthanh prev-quatrinhhinhthanh transition"><i class="fas fa-arrow-left"></i></p>
                    <div class="owl-carousel owl-theme auto_quatrinhhinhthanh">
                        <?php foreach ($quatrinhhinhthanh as $v) { ?>
                            <div class="row_quatrinhhinhthanh_index">
                                <div class="row_quatrinhhinhthanh_top">
                                    <div class="name_quatrinhhinhthanh">
                                        <?= $v['ten' . $lang] ?>
                                    </div>
                                    <div class="noidung_quatrinhhinhthanh">
                                        <?= htmlspecialchars_decode($v['noidung' . $lang]) ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="img_quatrinhhinhthanh">
                                    <?= Helper::the_thumbnail($v['photo'], '', $v['ten' . $lang], true) ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <p class="control-quatrinhhinhthanh next-quatrinhhinhthanh transition"><i class="fas fa-arrow-right"></i></p>
                </div>
            </div>
        </div>
    </div>

    <div class="wrap_nhungconso">
        <div class="fixwidth">
            <div class="all_nhungconso mt-0">
                <?php foreach ($nhungconso as $v) { ?>
                    <div class="content_static_ncs">
                        <div class="img_static_ncs">
                            <?= Helper::the_thumbnail($v['photo'], '', $v['ten' . $lang], true) ?>
                        </div>
                        <div class="name_static_ncs">
                            <?= $v['ten' . $lang] ?>
                        </div>
                        <div class="noidung_static_ncs">
                            <?= htmlspecialchars_decode($v['noidung' . $lang]) ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="wrap_quatrinhhinhthanh mb-5">
        <div class="fixwidth">
            <div class="all_video_title_index">
                <div class="all_title_dm_sanpham">
                    <div class="title_dm_sanpham">
                        <?= $textgiaithuong['ten' . $lang] ?>
                    </div>
                    <div class="noidung_dm_sanpham">
                        <?= htmlspecialchars_decode($textgiaithuong['noidung' . $lang]) ?>
                    </div>
                </div>
                <div class="all_giaithuong_index">
                    <p class="control-deal prev-deal transition"><i class="fas fa-chevron-left"></i></p>
                    <div class="owl-carousel owl-theme auto_deal">
                        <?php foreach ($giaithuong as $v) { ?>
                            <div class="all_giaithuong">
                                <div class="img_giaithuong">
                                    <?= Helper::the_thumbnail($v['photo'], '', $v['ten' . $lang], true) ?>
                                </div>
                                <div class="name_giaithuong"><?= $v['ten' . $lang] ?></div>
                            </div>
                        <?php } ?>
                    </div>
                    <p class="control-deal next-deal transition"><i class="fas fa-chevron-right"></i></p>
                </div>
            </div>
        </div>
    </div>
</div>