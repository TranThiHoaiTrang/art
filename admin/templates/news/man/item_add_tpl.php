<?php
if ($act == "add") $labelAct = "Thêm mới";
else if ($act == "edit") $labelAct = "Chỉnh sửa";
else if ($act == "copy")  $labelAct = "Sao chép";

$linkMan = "index.php?com=news&act=man&type=" . $type . "&p=" . $curPage;
if ($act == 'add') $linkFilter = "index.php?com=news&act=add&type=" . $type . "&p=" . $curPage;
else if ($act == 'edit') $linkFilter = "index.php?com=news&act=edit&type=" . $type . "&p=" . $curPage . "&id=" . $id;
if ($act == "copy") $linkSave = "index.php?com=news&act=save_copy&type=" . $type . "&p=" . $curPage;
else $linkSave = "index.php?com=news&act=save&type=" . $type . "&p=" . $curPage;

/* Check cols */
if (isset($config['news'][$type]['gallery']) && count($config['news'][$type]['gallery']) > 0) {
    foreach ($config['news'][$type]['gallery'] as $key => $value) {
        if ($key == $type) {
            $flagGallery = true;
            break;
        }
    }
}

if (
    (isset($config['news'][$type]['dropdown']) && $config['news'][$type]['dropdown'] == true) ||
    (isset($config['news'][$type]['tags']) && $config['news'][$type]['tags'] == true) ||
    (isset($config['news'][$type]['images']) && $config['news'][$type]['images'] == true)
) {
    $colLeft = "col-xl-8 left_content align-self-start";
    $colRight = "col-xl-4 right_content align-self-start";
} else {
    $colLeft = "col-12";
    $colRight = "d-none";
}
?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active"><?= $labelAct ?> <?= $config['news'][$type]['title_main'] ?></li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <form class="validation-form" novalidate method="post" action="<?= $linkSave ?>" enctype="multipart/form-data">
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="submit" class="btn btn-sm bg-gradient-success submit-check" name="save-here"><i class="far fa-save mr-2"></i>Lưu tại trang</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?= $linkMan ?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        </div>
        <div class="row">
            <div class="<?= $colLeft ?>">
                <div id="scroll-left">
                    <?php
                    if (isset($config['news'][$type]['slug']) && $config['news'][$type]['slug'] == true) {
                        $slugchange = ($act == 'edit') ? 1 : 0;
                        $copy = ($act != 'copy') ? 0 : 1;
                        include LAYOUT_PATH . "slug.php";
                    }
                    ?>
                    <div class="card card-primary card-outline text-sm">
                        <div class="card-header">
                            <h3 class="card-title">Nội dung <?= $config['news'][$type]['title_main'] ?></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
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
                                                <?php if (isset($config['news'][$type]['solieu']) && $config['news'][$type]['solieu'] == true && $k == 'vi') { ?>
                                                    <div class="form-group">
                                                        <label for="solieu">Số liệu:</label>
                                                        <input type="text" onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="form-control for-seo" name="data[solieu]" id="solieu" placeholder="Nhập số liệu" value="<?= @$item['solieu'] ?>" required>
                                                    </div>
                                                <?php } ?>
                                                <?php if (isset($config['news'][$type]['diachi']) && $config['news'][$type]['diachi'] == true && $k == 'vi') { ?>
                                                    <div class="form-group">
                                                        <label for="diachi">Địa chỉ:</label>
                                                        <input type="text" class="form-control for-seo" name="data[diachi]" id="diachi" placeholder="Nhập địa chỉ" value="<?= @$item['diachi'] ?>" required>
                                                    </div>
                                                <?php } ?>
                                                <?php if (isset($config['news'][$type]['email']) && $config['news'][$type]['email'] == true && $k == 'vi') { ?>
                                                    <div class="form-group">
                                                        <label for="email">Email:</label>
                                                        <input type="text" class="form-control for-seo" name="data[email]" id="email" placeholder="Nhập Email" value="<?= @$item['email'] ?>" required>
                                                    </div>
                                                <?php } ?>
                                                <?php if (isset($config['news'][$type]['dienthoai']) && $config['news'][$type]['dienthoai'] == true && $k == 'vi') { ?>
                                                    <div class="form-group">
                                                        <label for="ten<?= $k ?>">Điện thoại:</label>
                                                        <input type="text" class="form-control for-seo" name="data[dienthoai]" id="dienthoai" placeholder="Điện thoại" value="<?= @$item['dienthoai'] ?>">
                                                    </div>
                                                <?php } ?>
                                                <?php if (isset($config['news'][$type]['ten']) && $config['news'][$type]['ten'] == true && $k == 'vi') { ?>
                                                    <div class="form-group">
                                                        <label for="ten">Tên khách hàng:</label>
                                                        <input type="text" class="form-control for-seo" name="data[ten]" id="ten" placeholder="Nhập tên khách hàng" value="<?= @$item['ten'] ?>" required>
                                                    </div>
                                                <?php } ?>
                                                <?php if (isset($config['news'][$type]['link']) && $config['news'][$type]['link'] == true && $k == 'vi') { ?>
                                                    <div class="form-group">
                                                        <label for="link">Link video:</label>
                                                        <input type="text" class="form-control for-seo" name="data[link]" id="link" placeholder="Nhập Link video" value="<?= @$item['link'] ?>">
                                                    </div>
                                                <?php } ?>
                                                <?php if (isset($config['news'][$type]['motangan']) && $config['news'][$type]['motangan'] == true) { ?>
                                                    <div class="form-group">
                                                        <label for="motangan<?= $k ?>">Mô tả ngắn (<?= $k ?>):</label>
                                                        <textarea class="form-control for-seo <?= (isset($config['news'][$type]['motangan_cke']) && $config['news'][$type]['motangan_cke'] == true) ? 'ckeditor' : '' ?>" name="data[motangan<?= $k ?>]" id="motangan<?= $k ?>" rows="5" placeholder="Mô tả ngắn (<?= $k ?>)"><?= htmlspecialchars_decode(@$item['motangan' . $k]) ?></textarea>
                                                    </div>
                                                <?php } ?>
                                                <?php if (isset($config['news'][$type]['mota']) && $config['news'][$type]['mota'] == true) { ?>
                                                    <div class="form-group">
                                                        <label for="mota<?= $k ?>">Mô tả (<?= $k ?>):</label>
                                                        <textarea class="form-control for-seo <?= (isset($config['news'][$type]['mota_cke']) && $config['news'][$type]['mota_cke'] == true) ? 'ckeditor' : '' ?>" name="data[mota<?= $k ?>]" id="mota<?= $k ?>" rows="5" placeholder="Mô tả (<?= $k ?>)"><?= htmlspecialchars_decode(@$item['mota' . $k]) ?></textarea>
                                                    </div>
                                                <?php } ?>
                                                <?php if (isset($config['news'][$type]['bando']) && $config['news'][$type]['bando'] == true) { ?>
                                                    <div class="form-group">
                                                        <label for="bando">Iframe bản đồ:</label>
                                                        <textarea class="form-control for-seo" name="data[bando]" id="bando" rows="5" placeholder="Nhập iframe bản đồ"><?= htmlspecialchars_decode(@$item['bando']) ?></textarea>
                                                    </div>
                                                <?php } ?>
                                                <?php if (isset($config['news'][$type]['noidung']) && $config['news'][$type]['noidung'] == true) { ?>
                                                    <div class="form-group">
                                                        <label for="noidung<?= $k ?>">Nội dung (<?= $k ?>):</label>
                                                        <textarea class="ckeditor form-control for-seo <?= (isset($config['news'][$type]['noidung_cke']) && $config['news'][$type]['noidung_cke'] == true) ? 'ckeditor' : '' ?>" name="data[noidung<?= $k ?>]" id="noidung<?= $k ?>" rows="5" placeholder="Nội dung (<?= $k ?>)"><?= htmlspecialchars_decode(@$item['noidung' . $k]) ?></textarea>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <?php if (isset($config['news'][$type]['video']) && $config['news'][$type]['video'] == true) { ?>
                                        <div class="form-group">
                                            <label for="link_video">Link video youtube:</label>
                                            <input type="text" class="form-control" name="data[video]" id="link_video" onchange="youtubePreview(this.value,'#loadVideo');" placeholder="Video" value="<?= @$item['video'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="link_video">Video preview:</label>
                                            <div><iframe id="loadVideo" width="250" src="//www.youtube.com/embed/<?= $func->getYoutube($item['video']) ?>" <?= (@$item["video"] == '') ? "height='0'" : "height='150'"; ?> frameborder="0" allowfullscreen></iframe></div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="<?= $colRight ?>">
                <div id="scroll-right">
                    <?php if (
                        (isset($config['news'][$type]['dropdown']) && $config['news'][$type]['dropdown'] == true) ||
                        (isset($config['news'][$type]['tags']) && $config['news'][$type]['tags'] == true)
                    ) { ?>
                        <div class="card card-primary card-outline text-sm">
                            <div class="card-header">
                                <h3 class="card-title">Danh mục <?= $config['news'][$type]['title_main'] ?></h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group-category row">
                                    <?php if (isset($config['news'][$type]['dropdown']) && $config['news'][$type]['dropdown'] == true) { ?>
                                        <?php if (isset($config['news'][$type]['list']) && $config['news'][$type]['list'] == true) { ?>
                                            <div class="form-group col-xl-6 col-sm-4">
                                                <label class="d-block" for="id_list">Danh mục cấp 1:</label>
                                                <?= $func->get_ajax_category('news', 'list', $type) ?>
                                            </div>
                                        <?php } ?>
                                        <?php if (isset($config['news'][$type]['cat']) && $config['news'][$type]['cat'] == true) { ?>
                                            <div class="form-group col-xl-6 col-sm-4">
                                                <label class="d-block" for="id_cat">Danh mục cấp 2:</label>
                                                <?= $func->get_ajax_category('news', 'cat', $type) ?>
                                            </div>
                                        <?php } ?>
                                        <?php if (isset($config['news'][$type]['item']) && $config['news'][$type]['item'] == true) { ?>
                                            <div class="form-group col-xl-6 col-sm-4">
                                                <label class="d-block" for="id_item">Danh mục cấp 3:</label>
                                                <?= $func->get_ajax_category('news', 'item', $type) ?>
                                            </div>
                                        <?php } ?>
                                        <?php if (isset($config['news'][$type]['sub']) && $config['news'][$type]['sub'] == true) { ?>
                                            <div class="form-group col-xl-6 col-sm-4">
                                                <label class="d-block" for="id_sub">Danh mục cấp 4:</label>
                                                <?= $func->get_ajax_category('news', 'sub', $type) ?>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if (isset($config['news'][$type]['tags']) && $config['news'][$type]['tags'] == true) { ?>
                                        <div class="form-group col-xl-6 col-sm-4">
                                            <label class="d-block" for="id_tags">Danh mục tags:</label>
                                            <?= $func->get_tags(@$item['id'], 'tags_group', 'news', $type) ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if (isset($config['news'][$type]['icon']) && $config['news'][$type]['icon'] == true) { ?>
                        <div class="card card-primary card-outline text-sm">
                            <div class="card-header">
                                <h3 class="card-title">Icon <?= $config['news'][$type]['title_main'] ?></h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php
                                $photoDetail = ($act != 'copy') ? UPLOAD_NEWS . @$item['icon'] : '';
                                $dimension = "Width: " . $config['news'][$type]['width_icon'] . " px - Height: " . $config['news'][$type]['height_icon'] . " px (" . $config['news'][$type]['img_type'] . ")";
                                include LAYOUT_PATH . "image1.php";
                                ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (isset($config['news'][$type]['images']) && $config['news'][$type]['images'] == true) { ?>
                        <div class="card card-primary card-outline text-sm">
                            <div class="card-header">
                                <h3 class="card-title">Hình ảnh</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php

                                $table_name = 'news';

                                $photoDetail = ($act != 'copy') ? @$item['photo'] : '';
                                $dimension = "(" . $config['news'][$type]['img_type'] . ")";

                                $input_name = $table_key = 'photo';
                                include LAYOUT . "single_image.php";

                                ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (isset($config['news'][$type]['images1']) && $config['news'][$type]['images1'] == true) { ?>
                        <div class="card card-primary card-outline text-sm">
                            <div class="card-header">
                                <h3 class="card-title">Banner</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php

                                $table_name = 'news';

                                $photoDetail = ($act != 'copy') ? @$item['photo1'] : '';
                                $dimension = "(" . $config['news'][$type]['img_type'] . ")";

                                $input_name = $table_key = 'photo1';
                                include LAYOUT . "single_image.php";

                                ?>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="card card-primary card-outline text-sm">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin <?= $config['news'][$type]['title_main'] ?></h3>
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
                        </div>
                    </div>
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

								$table_name = 'news';

								$single_gallery = ($act != 'copy') ? @$item['gallery'] : '';
								$title = 'Gallery';
								$textarea_name = $table_key = 'gallery';
								include LAYOUT_PATH . "single_gallery.php";

								?>
							</div>

						</div>
                    <?php } ?>
                    <?php if (isset($config['news'][$type]['seo']) && $config['news'][$type]['seo'] == true) { ?>
                        <div class="card card-primary card-outline text-sm">
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
                </div>
            </div>
        </div>


        <div class="card-footer text-sm bottom_height">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="submit" class="btn btn-sm bg-gradient-success submit-check" name="save-here"><i class="far fa-save mr-2"></i>Lưu tại trang</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?= $linkMan ?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
            <input type="hidden" name="id" value="<?= @$item['id'] ?>">
        </div>
    </form>
</section>