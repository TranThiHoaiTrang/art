<div class="all_thongtin_user">
    <div class="fixwidth">
        <div class="row">
            <div class="col-md-3">
                <?php include TEMPLATE_PATH . "account/right_thongtin.php"; ?>
            </div>
            <div class="col-md-9">
                <div class="wrapper-profile__title">Khóa học yêu thích</div>
                <?php if ($khoahocyeuthich) { ?>
                    <div class="all_khoahoc_yeuthich">
                        <?php foreach ($khoahocyeuthich as $v) {
                            $pro_yeuthich = $d->rawQueryOne("select * from #_product where id = '" . $v['id_product'] . "'");
                        ?>
                            <a href="<?= $pro_yeuthich['tenkhongdauvi'] ?>">
                                <div class="khoahoc_yeuthich">
                                    <span><?= $pro_yeuthich['ten' . $lang] ?></span>
                                    <div class="icon_khoahoc">
                                    <img src="./assets/images/eye.svg" alt="the R’art school">
                                    <span>Xem khóa học</span>
                                    </div>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                <?php } else { ?>
                    <div class="wrapper-profile__bg wrapper-profile__history">
                        <div class="wrapper-profile__message">Chưa có khóa học yêu thích nào!</div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>