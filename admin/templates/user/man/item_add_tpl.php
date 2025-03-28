<?php
    $linkMan = "index.php?com=user&act=man&p=".$curPage;
    $linkSave = "index.php?com=user&act=save&p=".$curPage;
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
.link_khoahoc {
    background: #f87f10;
    color: #fff;
    padding: 12px 24px;
    border-radius: 4px;
    font-size: 14px;
    text-align: center;
    margin-top: 15px;
    display: block;
    width: fit-content;
}
.link_khoahoc:hover{
    color: #fff;
}
</style>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Chi tiết tài khoản khách</li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <form class="validation-form" novalidate method="post" action="<?=$linkSave?>" enctype="multipart/form-data">
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary" disabled><i
                    class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm
                lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát"><i
                    class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        </div>
        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title"><?=($act=="edit")?"Cập nhật":"Thêm mới";?> tài khoản</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="username">Tài khoản: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="data[username]" id="username"
                            placeholder="Tài khoản" value="<?=@$item['username']?>" <?=($act=="edit")?'readonly':'';?>
                            required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="ten">Họ tên: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="data[ten]" id="ten" placeholder="Họ tên"
                            value="<?=@$item['ten']?>" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="password">Mật khẩu:</label>
                        <div class="input_mk_all">
                            <input type="password" class="form-control input_mk" name="data[password]" id="password"
                                placeholder="Mật khẩu" <?=($act=="add")?'required':'';?>>
                            <div class="icon_mk">
                                <i class="fas fa-eye"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="confirm_password">Nhập lại mật khẩu:</label>
                        <div class="input_mk_all">
                            <input type="password" class="form-control input_mk_nl" name="confirm_password" id="confirm_password"
                                placeholder="Nhập lại mật khẩu" <?=($act=="add")?'required':'';?>>
                            <div class="icon_mk_nl">
                                <i class="fas fa-eye"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="data[email]" id="email" placeholder="Email"
                            value="<?=@$item['email']?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="dienthoai">Điện thoại:</label>
                        <input type="text" class="form-control" name="data[dienthoai]" id="dienthoai"
                            placeholder="Điện thoại" value="<?=@$item['dienthoai']?>">
                    </div>
                    <!-- <div class="form-group col-md-4">
                        <label for="gioitinh">Giới tính:</label>
                        <select class="form-control" name="data[gioitinh]" id="gioitinh">
                            <option value="0">Chọn giới tính</option>
                            <option <?=(@$item['gioitinh']==1)?"selected":""?> value="1">Nam</option>
                            <option <?=(@$item['gioitinh']==2)?"selected":""?> value="2">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="ngaysinh">Ngày sinh:</label>
                        <input type="text" class="form-control" name="data[ngaysinh]" id="ngaysinh"
                            placeholder="Ngày sinh"
                            value="<?=(@$item['ngaysinh'])?date('d/m/Y',@$item['ngaysinh']):"";?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="diachi">Địa chỉ:</label>
                        <input type="text" class="form-control" name="data[diachi]" id="diachi" placeholder="Địa chỉ"
                            value="<?=@$item['diachi']?>">
                    </div> -->
                </div>
                <div class="form-group">
                    <label for="hienthi" class="d-inline-block align-middle mb-0 mr-2">Kích hoạt:</label>
                    <div class="custom-control custom-checkbox d-inline-block align-middle">
                        <input type="checkbox" class="custom-control-input hienthi-checkbox" name="data[hienthi]"
                            id="hienthi-checkbox" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked':''?>>
                        <label for="hienthi-checkbox" class="custom-control-label"></label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="stt" class="d-inline-block align-middle mb-0 mr-2">Số thứ tự:</label>
                    <input type="number" class="form-control form-control-mini d-inline-block align-middle" min="0"
                        name="data[stt]" id="stt" placeholder="Số thứ tự"
                        value="<?=isset($item['stt']) ? $item['stt'] : 1?>">
                </div>
                <div class="form-group">
                    <a href="index.php?com=user&act=man_khoahoc&id=<?=$item['id']?>" class="link_khoahoc">
                        Khóa học của <?= $item['ten'] ?>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-footer text-sm">
            <button type="submit" class="btn btn-sm bg-gradient-primary" disabled><i
                    class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm
                lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát"><i
                    class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
            <input type="hidden" name="id" value="<?=@$item['id']?>">
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
        maxDate: '<?=date("Y/m/d",time())?>'
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