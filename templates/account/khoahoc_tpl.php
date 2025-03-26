<div class="all_thongtin_user">
    <div class="fixwidth">
        <div class="row">
            <div class="col-md-3">
                <?php include TEMPLATE_PATH . "account/right_thongtin.php"; ?>
            </div>
            <div class="col-md-9">
                <div class="wrapper-profile__title">Khóa học của tôi</div>

                <?php if (!empty($order_lsmh)) { ?>
                    <div class="wrapper-profile__history">
                        <?php foreach ($order_lsmh as $od) {
                            $order_detail = $d->rawQuery("select * from #_order_detail where id_order = '" . $od['id'] . "' order by id desc");
                        ?>
                            <?php foreach ($order_detail as $order) {
                                $khoahoc = $d->rawQueryOne("select * from #_product where id = '" . $order['id_product'] . "' order by id desc");
                            ?>
                                <div class="all_drop_khoahoc_user">
                                    <div class="title_drop_khoahoc_user">
                                        <span><?= $khoahoc['ten' . $lang] ?></span>
                                        <span class="icon_khoahoc_user"><i class="fas fa-angle-down"></i></span>
                                    </div>
                                    <div class="noidung_drop_khoahoc_user">
                                        <?php
                                        $sp_brand = $d->rawQuery("select * from #_product_brand where type = '" . $khoahoc['type'] . "' and id_khoahoc = '" . $khoahoc['id'] . "' and hienthi > 0 order by stt,id ASC");
                                        ?>
                                        <div class="all_chuong_khoahoc_product">
                                            <?php foreach ($sp_brand as $br) {
                                                $sp_bai = $d->rawQuery("select * from #_product_doday where type = '" . $khoahoc['type'] . "' and id_chuong_khoahoc = '" . $br['id'] . "' and hienthi > 0 order by stt,id ASC");
                                            ?>
                                                <div class="chuong_khoa_hoc chuong_khoa_hoc_user">
                                                    <div class="title_chuong_khoahoc title_chuong_khoahoc_user">
                                                        <span><?= $br['ten' . $lang] ?></span>
                                                        <span class="icon_khoahoc_user"><i class="fas fa-angle-down"></i></span>
                                                    </div>
                                                    <div class="all_bai_khoahoc all_bai_khoahoc_user">
                                                        <?php foreach ($sp_bai as $bai) {
                                                            $current_id = $bai['id'];
                                                            $member_khoahoc_prev = $d->rawQueryOne("select * from #_member_khoahoc where id_user = '" . $row_detail['id'] . "'  and id_khoahoc = '" . $khoahoc['id'] . "' and id_chuong = '" . $br['id'] . "'  and id_bai_khoahoc = '" . $prev_id['id'] . "'");
                                                        ?>
                                                            <?php if ($prev_id !== null) { ?>
                                                                <?php if ($member_khoahoc_prev['check'] != 0 || $bai['check_lock'] == 1) { ?>
                                                                    <a href="account/khoahoc_chitiet?id_baikhoahoc=<?= openssl_encrypt($bai['id'], 'aes-256-cbc', 'art', 0, $iv = 'art') ?>">
                                                                        <div class="bai_khoahoc">
                                                                            <div class="bai_khoahoc_left">
                                                                                <img src="./assets/images/lock_cr.svg" alt="">
                                                                                <span><?= $bai['ten' . $lang] ?></span>
                                                                            </div>
                                                                            <div class="bai_khoahoc_right">
                                                                                <img src="./assets/images/eye.svg" alt="">
                                                                                <span><?= $bai['thoiluong_video'] ?></span>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                <?php } else { ?>
                                                                    <a>
                                                                        <div class="bai_khoahoc">
                                                                            <div class="bai_khoahoc_left">
                                                                                <img src="./assets/images/lock.svg" alt="">
                                                                                <span><?= $bai['ten' . $lang] ?></span>
                                                                            </div>
                                                                            <div class="bai_khoahoc_right">
                                                                                <img src="./assets/images/eye.svg" alt="">
                                                                                <span><?= $bai['thoiluong_video'] ?></span>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                <?php } ?>
                                                            <?php } else { ?>
                                                                <a href="account/khoahoc_chitiet?id_baikhoahoc=<?= openssl_encrypt($bai['id'], 'aes-256-cbc', 'art', 0, $iv = 'art') ?>">
                                                                    <div class="bai_khoahoc">
                                                                        <div class="bai_khoahoc_left">
                                                                            <img src="./assets/images/lock_cr.svg" alt="">
                                                                            <span><?= $bai['ten' . $lang] ?></span>
                                                                        </div>
                                                                        <div class="bai_khoahoc_right">
                                                                            <img src="./assets/images/eye.svg" alt="">
                                                                            <span><?= $bai['thoiluong_video'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            <?php } ?>
                                                        <?php $prev_id = $current_id;
                                                        } ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                <?php } else { ?>
                    <div class="wrapper-profile__bg wrapper-profile__history">
                        <div class="wrapper-profile__message">Chưa có khóa học nào!</div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>