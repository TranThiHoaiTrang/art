<div class="all_thongtin_user">
    <div class="fixwidth">
        <div class="row">
            <div class="col-md-3">
                <?php include TEMPLATE_PATH . "account/right_thongtin.php"; ?>
            </div>
            <div class="col-md-9">
                <div class="wrapper-profile__title">Lịch sử mua hàng</div>
                <div class="wrapper-profile__bg wrapper-profile__history">
                    <?php if ($order_lsmh) { ?>
                        <div class="all_lich_su_mua_hang">
                            <table>
                                <thead>
                                    <tr>
                                        <th style="width: 25%;">Mã đơn hàng</th>
                                        <th style="width: 25%;">Ngày đặt</th>
                                        <th style="width: 50%;">Tên khóa học</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($order_lsmh as $v) { ?>
                                        <tr data-seach="sjc" class="">
                                            <td style="width: 25%;" class="colorGrey pdL10">
                                                <div><?= $v['madonhang'] ?></div>
                                            </td>
                                            <td style="width: 25%;">
                                                <span><?= date("d/m/Y", $v['ngaytao']) ?></span>
                                            </td>
                                            <td style="width: 50%;">
                                                <?php
                                                $order_deatil_lsmh = $d->rawQuery("select * from #_order_detail where id_order = '" . $v['id'] . "'");
                                                ?>
                                                <div class="all_khoahoc_detail">
                                                    <?php foreach ($order_deatil_lsmh as $khd) {
                                                        $khoahoc_detail = $d->rawQueryOne("select * from #_product where id = '" . $khd['id_product'] . "'");
                                                    ?>
                                                        <a href="<?= $khoahoc_detail['tenkhongdauvi'] ?>">
                                                            <div class="khoahoc_detail">
                                                                <img src="./assets/images/eye.svg" alt="the R’art school">
                                                                <span><?= $khoahoc_detail['ten' . $lang] ?></span>
                                                            </div>
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } else { ?>
                        <div class="wrapper-profile__message">Chưa có lịch sử đơn hàng nào!</div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>