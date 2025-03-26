<div class="pb-5 pt-5 all_breadCrumbs">
    <div class="fixwidth">
        <div class="all_bread d-flex">
            <div class="breadCrumbs">
                <div><?= $breadcrumbs ?></div>
            </div>
            <!-- <div class="bread_title"><?= (@$title_cat != '') ? $title_cat : @$title_crumb ?></div> -->
        </div>
    </div>
</div>

<div class="pb-5">
    <div class="fixwidth">
        <?php if ($row_detail['noidung' . $lang]) { ?>
            <div class="entry-post">
                <div class="entry-left">
                    <div class="contact_news">
                        <div class="all_gioithieu_index" id="toc-content">
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
        <?php } else { ?>
            <div class="alert alert-warning" role="alert">
                <strong><?= khongtimthayketqua ?></strong>
            </div>
        <?php } ?>


        <div class="title_dm_nb_index mb-4 pt-4">
            <div class="title_dm_left">
                <div class="title_dm_nb_list">Bài viết liên quan</div>
            </div>
        </div>
    </div>
    <div class="content-main w-clear">
        <?php if (isset($news) && count($news) > 0) { ?>
            <div class="owl-carousel owl-theme owl-dv">
                <?php foreach ($news as $k => $v) { ?>
                    <a href="<?= $v['tenkhongdauvi'] ?>">
                        <div class="post mt-3 pb-3" style="box-shadow: none;">
                            <div class="post_thumb">
                                <?= Helper::the_thumbnail($v['photo'], '', '', '', $v['ten' . $lang], true) ?>
                            </div>
                            <div class="all_content_post">
                                <!-- <div class="all_time_tacgia">
                                    <div class="tacgia_tintuc">Bài viết của Admin</div>
                                    <div class="time_tintuc">
                                        <span><?= date("d.m.Y", $v['ngaytao']) ?></span>
                                    </div>
                                </div> -->
                                <div class="title_news">
                                    <?= $v['ten' . $lang] ?>
                                </div>
                            </div>
                        </div>
                    </a>
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