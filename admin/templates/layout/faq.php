<!-- SEO -->
<?php
$slugurlArray = '';
$seo_create = '';
if (($com == "static" || $com == "seopage") && isset($config['website']['comlang'])) {
    foreach ($config['website']['comlang'] as $k => $v) {
        if ($type == $k) {
            $slugurlArray = $v;
            break;
        }
    }
}
?>
<div class="card-seo">
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab-lang" role="tablist">
                <?php foreach ($config['website']['faq'] as $k => $v) {
                    $seo_create .= $k . ","; ?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($k == 'vi') ? 'active' : '' ?>" id="tabs-lang" data-toggle="pill" href="#tabs-seolang-<?= $k ?>" role="tab" aria-controls="tabs-seolang-<?= $k ?>" aria-selected="true">Đạt được (<?= $v ?>)</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent-lang">
                <?php foreach ($config['website']['faq'] as $k => $v) { ?>
                    <div class="tab_pane_faq tab-pane fade show <?= ($k == 'vi') ? 'active' : '' ?>" id="tabs-seolang-<?= $k ?> i" role="tabpanel" aria-labelledby="tabs-lang">
                        <?php if ($faqDB) { ?>
                            <input type="hidden" name="count_faq" class="count_faq" value="<?= count($faqDB) ?>">
                            <?php $i = 0;
                            foreach ($faqDB as $v) { ?>
                                <div class="all_faq_content mb-3">
                                    <input type="hidden" name="id_faq" class="id_faq" value="<?= $v['id'] ?>">
                                    <div class="form-group">
                                        <div class="label-seo">
                                            <label for="title<?= $k ?>">Đạt được title (<?= $k ?>):</label>
                                        </div>
                                        <input type="text" class="form-control check-seo title-seo" name="datafaq<?= $i ?>[ten<?= $k ?>]" id="ten<?= $k ?>" placeholder="Đạt được Title (<?= $k ?>)" value="<?= @$v['ten' . $k] ?>">
                                    </div>
                                    <div class="form-group">
                                        <div class="label-seo">
                                            <label for="noidung<?= $k ?>">Đạt được Description (<?= $k ?>):</label>
                                        </div>
                                        <textarea class="form-control check-seo description-seo" name="datafaq<?= $i ?>[noidung<?= $k ?>]" id="noidung<?= $k ?>" rows="5" placeholder="Đạt được nội dung (<?= $k ?>)"><?= @$v['noidung' . $k] ?></textarea>
                                    </div>

                                    <div class="photoUpload-zone media-zone">
                                        <div class="photoUpload-detail photoUpload-preview media-preview">
                                            <?php
                                            $tbl = 'cauhoi';
                                            $tbl_key = 'datafaq' . $i . '[photo]';
                                            $input_name = 'datafaq' . $i . '[photo]';
                                            $id = $v['id'];
                                            $title = 'Ảnh';
                                            $photoDetail = $v['photo'] ?? '';
                                            if ($photoDetail) :
                                            ?>
                                                <img class="rounded" src="<?= Helper::thumbnail_link($photoDetail, 400, 400); ?>" alt />
                                                <span class="photo-remove" data-id="<?= $id ?>" data-tpl="<?= $tbl ?>" data-key="<?= $tbl_key ?>"><i class="fas fa-times"></i>Xóa <?= mb_strtolower($title) ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="photoUpload-file">
                                            <?php $input_name = $input_name ?? 'photo' ?>
                                            <input class="elfinder-single media-input" name="<?= $input_name ?>" type="text" value="<?= !empty($photoDetail) ? $photoDetail : '' ?>" title />
                                            <div class="photoUpload-group">
                                                <i class="icon-jfi-cloud-up-o"></i>
                                                <p class="photoUpload-choose btn btn-sm bg-gradient-success"><?= $title ?></p>
                                            </div>
                                        </div>
                                        <?php if (!empty(@$dimension)) : ?>
                                            <div class="photoUpload-dimension"><?= @$dimension ?></div>
                                        <?php endif ?>
                                    </div>
                                </div>
                            <?php $i += 1;
                            } ?>
                        <?php } else { ?>
                            <input type="hidden" name="count_faq" class="count_faq" value="0">
                            <div class="all_faq_content">
                                <input type="hidden" name="id_faq" class="id_faq" value="0">
                                <div class="form-group">
                                    <div class="label-seo">
                                        <label for="title<?= $k ?>">Đạt được title (<?= $k ?>):</label>
                                    </div>
                                    <input type="text" class="form-control check-seo title-seo" name="datafaq0[ten<?= $k ?>]" id="ten<?= $k ?>" placeholder="Đạt được Title (<?= $k ?>)" value="">
                                </div>
                                <div class="form-group">
                                    <div class="label-seo">
                                        <label for="noidung<?= $k ?>">Đạt được Description (<?= $k ?>):</label>
                                    </div>
                                    <textarea class="form-control check-seo description-seo" name="datafaq0[noidung<?= $k ?>]" id="noidung<?= $k ?>" rows="5" placeholder="Đạt được nội dung (<?= $k ?>)"></textarea>
                                </div>
                                <?php

                                $table_name = 'cauhoi';
                                // photo
                                $title = 'Ảnh đại diện';
                                $photoDetail = '';
                                $input_name = 'datafaq0[photo]';
                                $table_key = 'datafaq0[photo]';
                                include LAYOUT_PATH . "single_image_faq.php";
                                ?>
                            </div>
                        <?php } ?>

                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>