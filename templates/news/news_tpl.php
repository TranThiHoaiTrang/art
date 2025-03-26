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
<div class="pt-5 pb-5">
    <div class="fixwidth">
        <div class="content-main w-clear">
            <div class="row row_tintuc">
                <div class="col-md-3">
                    <?php include LAYOUT_PATH . "right-sanpham.php"; ?>
                </div>
                <div class="col-md-9">
                    <?php if (isset($news) && count($news) > 0) { ?>
                        <div class="all_tintuc_bottom loadkhung_product mb-4">
                            <?php foreach ($news as $v) { ?>
                                <a href="<?= $v['tenkhongdauvi'] ?>">
                                    <div class="post mt-3 pb-3">
                                        <div class="post_thumb">
                                            <?= Helper::the_thumbnail($v['photo'], '', '', '', $v['ten' . $lang], true) ?>
                                        </div>
                                        <div class="all_content_post">
                                            <div class="title_news">
                                                <?= $v['ten' . $lang] ?>
                                            </div>
                                            <!-- <div class="all_time_tg_xemthem">
                                                <div class="all_time_tacgia">
                                                    <div class="tacgia_tintuc">Admin</div>
                                                    <hr>
                                                    <div class="time_tintuc">
                                                        <span><?= date("d.m.Y", $v['ngaytao']) ?></span>
                                                    </div>
                                                </div>
                                                <div class="xemtin">Xem tin</div>
                                            </div> -->
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                            <div class="clear"></div>
                            <div class="pagination-home"><?= (isset($paging) && $paging != '') ? $paging : '' ?></div>
                        </div>
                    <?php } else { ?>
                        <div class="alert alert-warning" role="alert">
                            <strong><?= khongtimthayketqua ?></strong>
                        </div>
                    <?php } ?>
                    <!-- <div class="fb-comments" data-href="<?= $func->getCurrentPageURL() ?>" data-numposts="3" data-colorscheme="light" data-width="100%"></div> -->
                </div>
            </div>
        </div>
    </div>
</div>