<div class="all_thongtin_user">
    <div class="fixwidth">
        <div class="row">
            <div class="col-md-3">
                <?php include TEMPLATE_PATH . "account/right_thongtin.php"; ?>
            </div>
            <div class="col-md-9">
                <div class="wrapper-profile__title">Khóa học <?= $khoahoc['ten' . $lang] ?></div>
                <div class="wrapper-profile__history_khoahoc_detail">
                    <div class="chuong_khoahoc"><?= $chuong_khoahoc['ten' . $lang] ?> - </div>
                    <div class="bai_khoahoc_user"><?= $baikhoahoc['ten' . $lang] ?></div>
                </div>
                <div class="all_noidung_khoahoc_user">
                    <div class="video_khoahoc_user">
                        <video controls width="100%">
                            <source src="<?= $baikhoahoc['link_video'] ?>" type="video/mp4">
                            Trình duyệt của bạn không hỗ trợ video.
                        </video>
                    </div>
                    <div class="noidung_khoahoc_user">
                        <?= htmlspecialchars_decode($baikhoahoc['noidung' . $lang]) ?>
                    </div>
                    <div class="all_nopbai_khoahoc_user">

                        <?php if ($member_khoahoc_update) { ?>
                            <?php if ($member_khoahoc_update['photo']) { 
                                $gallery_khoahoc_update = explode('_', $member_khoahoc_update['photo']);
                                ?>
                                <div class="title_khoahoc_user">Bài làm đã nộp</div>
                                <?php foreach($gallery_khoahoc_update as $gallery) {?>
                                    <div class="img_khoahoc_user mb-3">
                                    <?= Helper::the_thumbnail($gallery, '', $member_khoahoc_update['ten' . $lang], true) ?>
                                </div>
                                <?php } ?>

                            <?php } ?>
                            <?php if ($member_khoahoc_update['nhanxet']) { ?>
                                <div class="title_khoahoc_user">Nhận xét của Admin</div>
                                <div class="nhanxet_khoahoc_user">
                                    <?= htmlspecialchars_decode($member_khoahoc_update['nhanxet']) ?>
                                </div>
                            <?php } else { ?>
                                <div class="wrapper-profile__bg mt-4">
                                    <div class="wrapper-profile__message">Chưa có nhận xét của Admin</div>
                                </div>
                            <?php } ?>

                            <?php if ($member_khoahoc_update['check'] != 1) { ?>
                                <div class="title_khoahoc_user">Nộp lại bài làm</div>
                                <form class="validation-user" novalidate method="post" action="account/khoahoc_chitiet" enctype="multipart/form-data">
                                    <input type="hidden" name="id_bai_khoahoc" value="<?= $baikhoahoc['id'] ?>">
                                    <input type="hidden" name="id_chuong" value="<?= $chuong_khoahoc['id'] ?>">
                                    <input type="hidden" name="id_khoahoc" value="<?= $khoahoc['id'] ?>">
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="inputGroupFile04" name="file" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                        <button class="btn btn-outline-secondary btn-baikhoahoc" name="baikhoahoc" type="submit" id="inputGroupFileAddon04">Gửi bài làm</button>
                                    </div>
                                </form>
                            <?php } ?>

                            <?php if ($member_khoahoc_update['check'] != 0) { ?>
                                <div class="wrapper-profile__bg_check mt-4">
                                    <div class="wrapper-profile__message_check">Bài làm của bạn đã được duyệt</div>
                                </div>
                            <?php } else { ?>
                                <div class="wrapper-profile__bg mt-4">
                                    <div class="wrapper-profile__message">Bài làm của bạn chưa được duyệt</div>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="title_khoahoc_user">Nộp bài</div>
                            <form class="validation-user" novalidate method="post" action="account/khoahoc_chitiet" enctype="multipart/form-data">
                                <input type="hidden" name="id_bai_khoahoc" value="<?= $baikhoahoc['id'] ?>">
                                <input type="hidden" name="id_chuong" value="<?= $chuong_khoahoc['id'] ?>">
                                <input type="hidden" name="id_khoahoc" value="<?= $khoahoc['id'] ?>">
                                <div class="input-group">
                                    <input type="file" class="form-control" id="inputGroupFile04" name="file" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                    <button class="btn btn-outline-secondary btn-baikhoahoc" name="baikhoahoc" type="submit" id="inputGroupFileAddon04">Gửi bài làm</button>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>