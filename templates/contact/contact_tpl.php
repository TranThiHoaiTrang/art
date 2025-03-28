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
<div class="all_contact_lienhe">
    <div class="fixwidth">
        <div class="content-main w-clear">
            <div class="all_form_contact">
                <div class="row">
                    <div class="col-md-4">
                        <div class="all_thongtin_contact">
                            <div class="title_thongtin_contact"><?= $lienhe['ten'.$lang] ?></div>
                            <div class="noidung_thongtin_contact">
                            <?= htmlspecialchars_decode($lienhe['motangan'.$lang]) ?>
                            </div>
                            <div class="all_thongtinlienhe">
                                <div class="hotline_ttlh">
                                    <img src="./assets/images/phone_ct.png" alt="">
                                    <div class="contct_ttlh">
                                        <span><?= $optsetting['hotline'] ?></span>
                                        <!-- <span>Lorem ipsum dolor sit.</span> -->
                                    </div>
                                </div>
                                <div class="hotline_ttlh">
                                    <img src="./assets/images/email_ct.png" alt="">
                                    <div class="contct_ttlh">
                                        <span><?= $optsetting['email'] ?></span>
                                        <!-- <span>Lorem ipsum dolor sit.</span> -->
                                    </div>
                                </div>
                                <div class="hotline_ttlh">
                                    <img src="./assets/images/map_ct.png" alt="">
                                    <div class="contct_ttlh">
                                        <span><?= $optsetting['diachi'] ?></span>
                                        <!-- <span>Lorem ipsum dolor sit.</span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <form class="form-contact validation-contact aos-init aos-animate" data-aos="fade-up" novalidate method="post" action="" enctype="multipart/form-data">
                            <div class="input-contact">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required />
                                <div class="invalid-feedback"><?= vuilongnhapdiachiemail ?></div>
                            </div>
                            <div class="input-contact">
                                <input type="text" class="form-control" id="ten" name="ten" placeholder="Your Name" required />
                                <div class="invalid-feedback"><?= vuilongnhaphoten ?></div>
                            </div>
                            <div class="input-contact">
                                <input type="number" class="form-control" id="dienthoai" name="dienthoai" placeholder="Phone Number" required />
                                <div class="invalid-feedback"><?= vuilongnhapsodienthoai ?></div>
                            </div>
                            <!-- <div class="input-contact">
                            <input type="text" class="form-control" id="diachi" name="diachi" placeholder="<?= diachi ?>" required />
                            <div class="invalid-feedback"><?= vuilongnhapdiachi ?></div>
                            </div> -->

                            <!-- <div class="input-contact">
                            <input type="text" class="form-control" id="tieude" name="tieude" placeholder="<?= chude ?>" required />
                            <div class="invalid-feedback"><?= vuilongnhapchude ?></div>
                            </div> -->
                            <div class="input-contact">
                                <textarea class="form-control" id="noidung" name="noidung" placeholder="Content..." required /></textarea>
                                <div class="invalid-feedback"><?= vuilongnhapnoidung ?></div>
                            </div>
                            <!-- <div class="input-contact">
                            <input type="file" class="custom-file-input" name="file">
                            <label class="custom-file-label" for="file" title="<?= chon ?>"><?= dinhkemtaptin ?></label>
                            </div> -->
                            <div class="all_btn_contact">
                                <i class="fas fa-paper-plane"></i>
                                <input type="submit" class="btn btn_contact" name="submit-contact" value="Gửi mail" disabled />
                            </div>
                            <!-- <input type="reset" class="btn btn-secondary" value="<?= nhaplai ?>" /> -->
                            <input type="hidden" name="recaptcha_response_contact" id="recaptchaResponseContact">
                        </form>
                    </div>
                </div>
            </div>
            <div class="center_contact">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="img_contact">
                            <?= Helper::the_thumbnail($lienhe['photo'], '', $lienhe['ten' . $lang], true) ?>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="all_content_center_contact">
                            <div class="name_center_contact">
                                <?= htmlspecialchars_decode($lienhe['mota'.$lang]) ?>
                            </div>
                            <div class="noidung_center_contact">
                                <?= htmlspecialchars_decode($lienhe['noidung'.$lang]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top-contact">
                <div class="bottom-contact">
                    <?= htmlspecialchars_decode($optsetting['toado_iframe']) ?>
                    <div class="button_xembando">
                        <img src="./assets/images/xembando.png" alt="">
                        <span>Xem bản đồ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>