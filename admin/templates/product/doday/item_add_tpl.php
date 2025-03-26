<?php
$linkMan = "index.php?com=product&act=man_doday&type=" . $type . "&p=" . $curPage;
$linkSave = "index.php?com=product&act=save_doday&type=" . $type . "&p=" . $curPage;
?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Chi tiết kích thước <?= $config['product'][$type]['title_main'] ?></li>
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
        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title"><?= ($act == "edit_doday") ? "Cập nhật" : "Thêm mới"; ?> Bài <?= $config['product'][$type]['title_main'] ?></h3>
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
                                    <?php if (isset($config['product'][$type]['link_video_doday']) && $config['product'][$type]['link_video_doday'] == true && $k == 'vi') { ?>
                                        <div class="form-group">
                                            <label for="link_video">Link video:</label>
                                            <input type="text" class="form-control for-seo" name="data[link_video]" id="link_video" placeholder="Nhập Link video" value="<?= @$item['link_video'] ?>">
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($config['product'][$type]['thoiluong_video_doday']) && $config['product'][$type]['thoiluong_video_doday'] == true && $k == 'vi') { ?>
                                        <div class="form-group">
                                            <label for="thoiluong_video">Thời lượng video:</label>
                                            <input type="text" class="form-control for-seo" name="data[thoiluong_video]" id="thoiluong_video" placeholder="Nhập Thời lượng video" value="<?= @$item['thoiluong_video'] ?>">
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($config['product'][$type]['noidung_doday']) && $config['product'][$type]['noidung_doday'] == true) { ?>
                                        <div class="form-group">
                                            <label for="noidung<?= $k ?>">Nội dung (<?= $k ?>):</label>
                                            <textarea class="form-control for-seo <?= (isset($config['product'][$type]['noidung_cke_doday']) && $config['product'][$type]['noidung_cke_doday'] == true) ? 'ckeditor' : '' ?>" name="data[noidung<?= $k ?>]" id="noidung<?= $k ?>" rows="5" placeholder="Nội dung (<?= $k ?>)"><?= htmlspecialchars_decode(@$item['noidung' . $k]) ?></textarea>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div style="padding: 0 20px 20px 20px;">
                <div class="card card-primary card-outline text-sm">
                    <div class="card-header">
                        <h3 class="card-title">Danh mục</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-category">
                                    <?php if (isset($config['product'][$type]['khoahoc']) && $config['product'][$type]['khoahoc'] == true) { ?>
                                        <div class="form-group mb-2">
                                            <label class="d-block">Danh mục khoa học:</label>
                                            <?= $func->get_khoahoc('product', '', $type) ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-category">
                                    <?php if (isset($config['product'][$type]['khoahoc']) && $config['product'][$type]['khoahoc'] == true) { ?>
                                        <div class="form-group mb-2">
                                            <label class="d-block">Danh mục chương:</label>
                                            <?= $func->get_khoahoc_chuong('product_brand', '', $type) ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-sm">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?= $linkMan ?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
            <input type="hidden" name="id" value="<?= @$item['id'] ?>">
        </div>
    </form>
</section>