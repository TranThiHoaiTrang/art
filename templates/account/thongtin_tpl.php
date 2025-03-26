<div class="all_thongtin_user">
    <div class="fixwidth">
        <div class="row">
            <div class="col-md-3">
                <?php include TEMPLATE_PATH . "account/right_thongtin.php"; ?>
            </div>
            <div class="col-md-9">
                <div class="wrapper-profile__title">Thông tin chung</div>
                <div class="wrapper-profile__info">
                    <div class="d-flex align-items-center gap30">
                        <div class="wrapper-profile__info--avatar">
                            <!-- <img src="./assets/images/user.png" alt=""> -->
                            <?php
                            $initials = $func->getShortInitials($row_detail['ten']);
                            ?>
                            <img src="<?= BASE_URL ?>templates/account/account_img.php?text=<?php echo urlencode($initials); ?>" alt="Avatar">
                        </div>
                        <div class="wrapper-profile__info-detail">
                            <div class="wrapper-profile__info--name"><?= $row_detail['ten'] ?></div>
                            <div class="total-course">
                                <div class="d-flex align-items-center gap10">
                                    <span class="number">0</span>
                                    <span class="title">Khóa học/Combo khóa học đang học</span>
                                </div>
                                <div class="d-flex align-items-center gap10 mt-3">
                                    <span class="number">0</span>
                                    <span class="title">Khóa học/Combo khóa học hoàn thành</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wrapper-profile__info mt-4">
                    <form class="form-user validation-user" novalidate method="post" action="account/thong-tin" enctype="multipart/form-data">
                        <div class="wrapper-profile__title_form">Thông tin cá nhân</div>
                        <div class="row_log-input">
                            <div class="log-input input__readonly">
                                <label for="basic-url"><?= taikhoan ?></label>
                                <div class="input-group input-user">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="<?= nhaptaikhoan ?>" value="<?= $row_detail['username'] ?>" readonly required>
                                </div>
                            </div>
                            <div class="log-input">
                                <label for="basic-url"><?= hoten ?></label>
                                <div class="input-group input-user">
                                    <input type="text" class="form-control" id="ten" name="ten" placeholder="<?= nhaphoten ?>" value="<?= $row_detail['ten'] ?>" required>
                                    <div class="invalid-feedback"><?= vuilongnhaphoten ?></div>
                                </div>
                            </div>
                            <div class="log-input">
                                <label for="basic-url">Email</label>
                                <div class="input-group input-user">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="<?= nhapemail ?>" value="<?= $row_detail['email'] ?>" required>
                                    <div class="invalid-feedback"><?= vuilongnhapdiachiemail ?></div>
                                </div>
                            </div>
                            <div class="log-input">
                                <label for="basic-url"><?= dienthoai ?></label>
                                <div class="input-group input-user">
                                    <input type="number" class="form-control" id="dienthoai" name="dienthoai" placeholder="<?= nhapdienthoai ?>" value="<?= $row_detail['dienthoai'] ?>" required>
                                    <div class="invalid-feedback"><?= vuilongnhapsodienthoai ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="wrapper-profile__title_form mt-4">Đổi mật khẩu</div>
                        <div class="row_log-input">
                            <div class="log-input">
                                <label for="basic-url"><?= matkhaucu ?></label>
                                <div class="input-group input-user">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="<?= nhapmatkhaucu ?>">
                                </div>
                            </div>
                            <div class="log-input">
                                <label for="basic-url"><?= matkhaumoi ?></label>
                                <div class="input-group input-user">
                                    <input type="password" class="form-control" id="new-password" name="new-password" placeholder="<?= nhapmatkhaumoi ?>">
                                </div>
                            </div>
                            <div class="log-input">
                                <label for="basic-url"><?= nhaplaimatkhaumoi ?></label>
                                <div class="input-group input-user">
                                    <input type="password" class="form-control" id="new-password-confirm" name="new-password-confirm" placeholder="<?= nhaplaimatkhaumoi ?>">
                                </div>
                            </div>
                        </div>
                        <div class="button-user">
                            <input type="submit" class="btn btn-capnhat btn-block" name="capnhatthongtin" value="<?= capnhat ?>" disabled>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

