<div class="pt-5 pb-5">
<div class="wrap-user">
    <div class="title-user">
        <span><?=quenmatkhau?></span>
    </div>
    <form class="form-user validation-user" novalidate method="post" action="account/quen-mat-khau" enctype="multipart/form-data">
        <div class="input-group input-user mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-user"></i></div>
            </div>
            <input type="text" class="form-control" id="username" name="username" placeholder="Tên tài khoản" required>
            <div class="invalid-feedback"><?=vuilongnhaptaikhoan?></div>
        </div>
        <div class="input-group input-user mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-envelope"></i></div>
            </div>
            <input type="email" class="form-control" id="email" name="email" placeholder="<?=nhapemail?>" required>
            <div class="invalid-feedback"><?=vuilongnhapdiachiemail?></div>
        </div>
        <div class="button-user">
            <input type="submit" class="btn btn-dangnhap" name="quenmatkhau" value="<?=laymatkhau?>" disabled>
        </div>
    </form>
</div>
</div>
