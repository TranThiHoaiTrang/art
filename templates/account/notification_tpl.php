<div class="all_thongtin_user">
    <div class="fixwidth">
        <div class="row">
            <div class="col-md-3">
                <?php include TEMPLATE_PATH . "account/right_thongtin.php"; ?>
            </div>
            <div class="col-md-9">
                <div class="wrapper-profile__title">Thông báo</div>
                <?php if (!empty($thongbao_user)) { ?>
                    <div class="wrapper-profile__notification">
                        <ul>
                            <?php foreach ($thongbao_user as $v) { ?>
                                <li>
                                    <div class="flex-1">
                                        <div class="title line-1">
                                            <a class="js-viewNotification" href="account/khoahoc_chitiet?id_baikhoahoc=<?= openssl_encrypt($v['id_bai_khoahoc'], 'aes-256-cbc', 'art', 0, $iv = 'art') ?>" title="">
                                                <i class="fas fa-circle"></i>
                                                <?= $v['ten'] ?>
                                                <?php if($v['check'] == 1) {?>
                                                <span>(Đã đọc)</span>
                                                <?php } ?>
                                            </a>
                                        </div>
                                        <div class="desc">
                                            <?= htmlspecialchars_decode($v['noidung']) ?>
                                        </div>
                                    </div>
                                    <div class="operation t-end">
                                        <div class="time d-flex flex-column mb10">
                                            <span><?= date("d-m-Y h:i:s", $v['ngaytao']) ?></span>
                                        </div>
                                        <div class="check_thongbao check_dadoc" data-id="<?= $v['id'] ?>" data-check="dadoc">
                                            <span>Đã đọc</span>
                                            <i class="fas fa-eye"></i>
                                        </div>
                                        <div class="check_thongbao check_delete" data-id="<?= $v['id'] ?>" data-check="delete">
                                            <span>Xóa</span>
                                            <i class="fas fa-times"></i>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } else { ?>
                    <div class="wrapper-profile__bg wrapper-profile__history">
                        <div class="wrapper-profile__message">Chưa có thông báo nào!</div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>