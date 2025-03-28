<?php
$linkMan = "index.php?com=product&act=man_danhmuc&type=" . $type . "&p=" . $curPage;
$linkSave = "index.php?com=product&act=save_danhmuc&type=" . $type . "&p=" . $curPage;

/* Check cols */
if (isset($config['product'][$type]['images_danhmuc']) && $config['product'][$type]['images_danhmuc'] == true) {
    $colLeft = "col-xl-8 left_content align-self-start";
    $colRight = "col-xl-4 right_content align-self-start";
} else {
    $colLeft = "col-12";
    $colRight = "d-none";
}

/* Check cols */
if (isset($config['product'][$type]['gallery']) && count($config['product'][$type]['gallery']) > 0) {
    foreach ($config['product'][$type]['gallery'] as $key => $value) {
        if ($key == $type) {
            $flagGallery = true;
            break;
        }
    }
}

?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Chi tiết <?= $config['product'][$type]['title_main_danhmuc'] ?></li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <form class="validation-form" novalidate method="post" action="<?= $linkSave ?>" enctype="multipart/form-data">
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?= $linkMan ?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        </div>
        <div class="row">
            <div class="<?= $colLeft ?>">
                <div id="scroll-left">
                    <?php
                    if (isset($config['product'][$type]['slug_danhmuc']) && $config['product'][$type]['slug_danhmuc'] == true) {
                        $slugchange = ($act == 'edit_danhmuc') ? 1 : 0;
                        include TEMPLATE . LAYOUT . "slug.php";
                    }
                    ?>
                    <div class="card card-primary card-outline text-sm">
                        <div class="card-header">
                            <h3 class="card-title">Nội dung <?= $config['product'][$type]['title_main_danhmuc'] ?></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="hienthi" class="d-inline-block align-middle mb-0 mr-2">Hiển thị:</label>
                                <div class="custom-control custom-checkbox d-inline-block align-middle">
                                    <input type="checkbox" class="custom-control-input hienthi-checkbox" name="data[hienthi]" id="hienthi-checkbox" <?= (!isset($item['hienthi']) || $item['hienthi'] == 1) ? 'checked' : '' ?>>
                                    <label for="hienthi-checkbox" class="custom-control-label"></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stt" class="d-inline-block align-middle mb-0 mr-2">Số thứ tự:</label>
                                <input type="number" class="form-control form-control-mini d-inline-block align-middle" min="0" name="data[stt]" id="stt" placeholder="Số thứ tự" value="<?= isset($item['stt']) ? $item['stt'] : 1 ?>">
                            </div>
                            <div class="card card-primary card-outline card-outline-tabs">
                                <div class="card-header p-0 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-three-tab-lang" role="tablist">
                                        <?php foreach ($config['website']['lang'] as $k => $v) { ?>
                                            <li class="nav-item">
                                                <a class="nav-link <?= ($k == 'vi') ? 'active' : '' ?>" id="tabs-lang" data-toggle="pill" href="#tabs-lang-<?= $k ?>" role="tab" aria-controls="tabs-lang-<?= $k ?>" aria-selected="true"><?= $v ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <div class="card-body card-article">
                                    <div class="tab-content" id="custom-tabs-three-tabContent-lang">
                                        <?php foreach ($config['website']['lang'] as $k => $v) { ?>
                                            <div class="tab-pane fade show <?= ($k == 'vi') ? 'active' : '' ?>" id="tabs-lang-<?= $k ?>" role="tabpanel" aria-labelledby="tabs-lang">
                                                <div class="form-group">
                                                    <label for="ten<?= $k ?>">Tiêu đề (<?= $k ?>):</label>
                                                    <input type="text" class="form-control for-seo" name="data[ten<?= $k ?>]" id="ten<?= $k ?>" placeholder="Tiêu đề (<?= $k ?>)" value="<?= @$item['ten' . $k] ?>" <?= ($k == 'vi') ? 'required' : '' ?>>
                                                </div>
                                                <?php if (isset($config['product'][$type]['mota_danhmuc']) && $config['product'][$type]['mota_danhmuc'] == true) { ?>
                                                    <div class="form-group">
                                                        <label for="mota<?= $k ?>">Mô tả (<?= $k ?>):</label>
                                                        <textarea class="form-control for-seo <?= (isset($config['product'][$type]['mota_cke_danhmuc']) && $config['product'][$type]['mota_cke_danhmuc'] == true) ? 'ckeditor' : '' ?>" name="data[mota<?= $k ?>]" id="mota<?= $k ?>" rows="5" placeholder="Mô tả (<?= $k ?>)"><?= htmlspecialchars_decode(@$item['mota' . $k]) ?></textarea>
                                                    </div>
                                                <?php } ?>
                                                <?php if (isset($config['product'][$type]['noidung_danhmuc']) && $config['product'][$type]['noidung_danhmuc'] == true) { ?>
                                                    <div class="form-group">
                                                        <label for="noidung<?= $k ?>">Nội dung (<?= $k ?>):</label>
                                                        <textarea class="form-control for-seo <?= (isset($config['product'][$type]['noidung_cke_danhmuc']) && $config['product'][$type]['noidung_cke_danhmuc'] == true) ? 'ckeditor' : '' ?>" name="data[noidung<?= $k ?>]" id="noidung<?= $k ?>" rows="5" placeholder="Nội dung (<?= $k ?>)"><?= htmlspecialchars_decode(@$item['noidung' . $k]) ?></textarea>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="<?= $colRight ?>">
                <div id="scroll-right">
                    <?php if (isset($config['product'][$type]['images_danhmuc']) && $config['product'][$type]['images_danhmuc'] == true) { ?>
                        <div class="card card-primary card-outline text-sm">
                            <div class="card-header">
                                <h3 class="card-title">Hình ảnh <?= $config['product'][$type]['title_main_danhmuc'] ?></h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">

                                <?php

                                $table_name = 'product_danhmuc';

                                // photo
                                $title = 'Ảnh đại diện';
                                $photoDetail = @$item['photo'] ?? '';
                                $input_name = $table_key = 'photo';
                                include LAYOUT_PATH . "single_image.php";

                                ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (isset($flagGallery) && $flagGallery == true) { ?>
                        <div class="card card-primary card-outline text-sm ">

                            <div class="card-header">
                                <h3 class="card-title">Bộ sưu tập</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                            </div>

                            <div class="card-body">
                                <?php

                                $table_name = 'product_danhmuc';

                                $single_gallery = ($act != 'copy') ? @$item['gallery'] : '';
                                $title = 'Gallery';
                                $textarea_name = $table_key = 'gallery';
                                include LAYOUT_PATH . "single_gallery.php";

                                ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <?php if (isset($config['product'][$type]['seo_danhmuc']) && $config['product'][$type]['seo_danhmuc'] == true) { ?>
            <div class="card card-primary card-outline text-sm bottom_height">
                <div class="card-header">
                    <h3 class="card-title">Nội dung SEO</h3>
                    <a class="btn btn-sm bg-gradient-success d-inline-block text-white float-right create-seo" title="Tạo SEO">Tạo SEO</a>
                </div>
                <div class="card-body">
                    <?php
                    $seoDB = $seo->getSeoDB($id, $com, 'man', $type);
                    include LAYOUT_PATH . "seo.php";
                    ?>
                </div>
            </div>
        <?php } ?>
        <div class="card-footer text-sm bottom_height">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?= $linkMan ?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
            <input type="hidden" name="id" value="<?= @$item['id'] ?>">
        </div>
    </form>
</section>