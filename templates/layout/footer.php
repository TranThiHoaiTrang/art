<div class="boxfooter_container section">
    <div class="fixwidth">
        <div class="row">
            <div class="col-md-3">
                <div class="title_chinhanh_footer">Các chi nhánh</div>
                <div class="all_menu_footer">
                    <?php foreach ($chinhanh as $v) { ?>
                        <div class="chinhanh_footer">
                            <div class="name_chinhanh"><?= $v['ten' . $lang] ?></div>
                            <div class="noidung_chinhanh"><?= htmlspecialchars_decode($v['noidung' . $lang]) ?></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-2">
                        <div class="title_chinhanh_footer">Về the <span style="color: #f87f10;">R</span>’art</div>
                        <div class="all_menu_footer">
                            <p><a href="gioi-thieu">Giới thiệu</a></p>
                            <p><a href="blog">Blog</a></p>
                            <p><a href="san-pham">Khóa học</a></p>
                            <p><a href="lien-he">Liên hệ</a></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="title_chinhanh_footer">Hướng dẫn và hỗ trợ</div>
                        <div class="all_menu_footer">
                            <?php foreach ($huongdan as $v) { ?>
                                <p><a href="<?= $v['tenkhongdauvi'] ?>"><?= $v['ten' . $lang] ?></a></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="title_chinhanh_footer">Quy định và chính sách</div>
                        <div class="all_menu_footer">
                            <?php foreach ($chinhsach as $v) { ?>
                                <p><a href="<?= $v['tenkhongdauvi'] ?>"><?= $v['ten' . $lang] ?></a></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="title_chinhanh_footer title_chinhanh_footer_transparent">Quy định và chính sách</div>
                        <div class="row_thongtin_footer row_thongtin_footer_transparent">
                            <div class="thongtin_footer">
                                <div class="hotline_footer">
                                    <span></span>
                                    <span><?= $optsetting['website'] ?></span>
                                </div>
                            </div>
                            <div class="thongtin_footer">
                                <div class="hotline_footer">
                                    <span></span>
                                    <span>
                                    https://rart.vn/ldp-rart-design/
                                    </span>
                                </div>
                            </div>
                            <div class="thongtin_footer">
                                <div class="hotline_footer">
                                    <span>Hotline: </span>
                                    <span><?= $optsetting['hotline'] ?></span>
                                </div>
                            </div>
                            <div class="thongtin_footer">
                                <div class="hotline_footer">
                                    <span>Gmail: </span>
                                    <span><?= $optsetting['email'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="all_mxh_footer">
                            <?php foreach ($social1 as $v) { ?>
                                <a href="<?= $v['link'] ?>" target="_blank" class="vs-social-link facebook">
                                    <?= Helper::the_thumbnail($v['photo'], '', '', '', $v['ten' . $lang]) ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="all_nd_footer">
                            <div class="name_footer"><?= htmlspecialchars_decode($footer['mota' . $lang]) ?></div>
                            <div class="noidung_footer"><?= htmlspecialchars_decode($footer['noidung' . $lang]) ?></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- <div class="all_copyright">
    <div class="fixwidth">
        <div class="copyright">
            <span>Copyright © 2025. All Rights Reserved.</span>
            <span>Thực phẩm này không phải là thuốc, không thay thế thuốc chữa bện</span>
        </div>
    </div>
</div> -->