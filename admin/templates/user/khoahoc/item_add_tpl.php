<?php
$linkMan = "index.php?com=user&act=man_khoahoc&p=" . $curPage;
$linkSave = "index.php?com=user&act=save_khoahoc&p=" . $curPage;
?>
<style>
    .input_mk_all {
        position: relative;
    }

    .icon_mk {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        right: 3%;
    }

    .icon_mk_nl {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        right: 3%;
    }

    .img_bailam {
        margin: 20px 0;

        img {
            width: 100%;
        }
    }

    .user_chuanop {
        font-weight: 500;
        text-align: center;
        font-size: 15px;
    }
</style>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Chi tiết khóa học user</li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <form class="validation-form" novalidate method="post" action="<?= $linkSave ?>&id=<?= $_GET['id'] ?>&id_khoahoc=<?= $_GET['id_khoahoc'] ?>&id_chuong=<?= $_GET['id_chuong'] ?>&id_bai=<?= $_GET['id_bai'] ?>" enctype="multipart/form-data">
        <div class="card-footer text-sm sticky-top">
            <?php if ($_GET['id_bai']) { ?>
                <button type="submit" class="btn btn-sm bg-gradient-primary" disabled><i
                        class="far fa-save mr-2"></i>Lưu</button>
                <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm
                    lại</button>
            <?php } ?>
            <a class="btn btn-sm bg-gradient-danger" href="<?= $linkMan ?>" title="Thoát"><i
                    class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        </div>
        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title">Bài làm của user</h3>
            </div>
            <div class="card-body">
                <?php if ($item['photo']) { ?>
                    <div class="form-group">
                        <label for="check" class="d-inline-block align-middle mb-0 mr-2">Hiển thị:</label>
                        <div class="custom-control custom-checkbox d-inline-block align-middle">
                            <input type="checkbox" class="custom-control-input check-checkbox" name="data[check]" id="hienthi-checkbox" <?= (!isset($item['check']) || $item['check'] == 1) ? 'checked' : '' ?>>
                            <label for="hienthi-checkbox" class="custom-control-label"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="d-inline-block align-middle mb-0 mr-2">Hình ảnh bài làm của User:</label>
                        <?php 
                        $gallery_khoahoc_update = explode('_', $item['photo']);
                        foreach($gallery_khoahoc_update as $gallery){
                        ?>
                        <div class="img_bailam">
                            <img class="rounded" onerror="src='assets/images/noimage.png'" src="<?= Helper::thumbnail_link($gallery); ?>" alt="<?= $item['tenvi'] ?>">
                        </div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label class="d-inline-block align-middle mb-3">Nhận xét của Admin:</label>
                        <div class="nhanxet_bailam">
                            <textarea class="ckeditor form-control for-seo ckeditor" name="data[nhanxet]" id="nhanxet" rows="5" placeholder="Nhận xét"><?= htmlspecialchars_decode(@$item['nhanxet']) ?></textarea>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="form-group">
                        <div class="user_chuanop">
                            User chưa nộp bài của chương này!!
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="card-footer text-sm">
            <?php if ($_GET['id_bai']) { ?>
                <button type="submit" class="btn btn-sm bg-gradient-primary" disabled><i
                        class="far fa-save mr-2"></i>Lưu</button>
                <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm
                    lại</button>
            <?php } ?>
            <a class="btn btn-sm bg-gradient-danger" href="<?= $linkMan ?>" title="Thoát"><i
                    class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
            <input type="hidden" name="id" value="<?= $item['id'] ?>">
            <input type="hidden" name="id_user" value="<?= @$_GET['id'] ?>">
            <input type="hidden" name="id_chuong" value="<?= $_GET['id_chuong'] ?>">
            <input type="hidden" name="id_khoahoc" value="<?= $_GET['id_khoahoc'] ?>">
            <input type="hidden" name="id_bai" value="<?= $_GET['id_bai'] ?>">
        </div>
    </form>
</section>

<!-- User js -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#ngaysinh').datetimepicker({
            timepicker: false,
            format: 'd/m/Y',
            formatDate: 'd/m/Y',
            // minDate: '1950/01/01',
            maxDate: '<?= date("Y/m/d", time()) ?>'
        });
    });
    const passField = document.querySelector(".input_mk");
    const passField2 = document.querySelector(".input_mk_nl");
    $('.icon_mk').click(function() {

        if (passField.type === "password") {
            passField.type = "text";
            $('.icon_mk').html('<i class="fas fa-eye-slash"></i>');
        } else {
            passField.type = "password";
            $('.icon_mk').html('<i class="fas fa-eye"></i>');
        }
    });
    $('.icon_mk_nl').click(function() {

        if (passField2.type === "password") {
            passField2.type = "text";
            $('.icon_mk_nl').html('<i class="fas fa-eye-slash"></i>');
        } else {
            passField2.type = "password";
            $('.icon_mk_nl').html('<i class="fas fa-eye"></i>');
        }
    });
</script>