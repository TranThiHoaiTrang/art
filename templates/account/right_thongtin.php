<div class="wrapper-account__sidebar">
    <div class="wrapper-account__sidebar-title">
        <div class="wrapper-account__sidebar-title-sub">Tài khoản</div>
        <div class="wrapper-account__sidebar-title-account">
            Hello, <span><?= $row_detail['ten'] ?></span>!
        </div>
    </div>
    <ul class="wrapper-account__sidebar-list">
        <li>
            <a class="<?= $action == 'thong-tin' ? 'active' : '' ?>" href="account/thong-tin" title="Thông tin tài khoản">
                <div class="icon">
                    <img src="./assets/images/accInfo_b.svg" width="32">
                </div>
                <span class="title">Thông tin tài khoản</span>
            </a>
        </li>
        <li>
            <a class="<?= $action == 'khoahoc-yeuthich' ? 'active' : '' ?>" href="account/khoahoc-yeuthich" title="Khóa học yêu thích">
                <div class="icon icon_heart">
                    <img src="./assets/images/icons-heart.png" width="32">
                </div>
                <span class="title">Khóa học yêu thích</span>
            </a>
        </li>
        <li>
            <a class="<?= $action == 'lichsu-muahang' ? 'active' : '' ?>" href="account/lichsu-muahang" title="Lịch sử mua hàng">
                <div class="icon">
                    <img src="./assets/images/history_b.svg" width="32">
                </div>
                <span class="title">Lịch sử mua hàng</span>
            </a>
        </li>
        <li>
            <a class="<?= $action == 'course' || $action == 'khoahoc_chitiet' ? 'active' : '' ?>" href="account/course" title="Khóa học của tôi">
                <div class="icon">
                    <img src="./assets/images/myCourse_b.svg" width="32">
                </div>
                <span class="title">Khóa học của tôi</span>
            </a>
        </li>
        <li>
            <a class="<?= $action == 'notification' ? 'active' : '' ?>" href="account/notification" title="Thông báo">
                <?php 
                $thongbao_right = $d->rawQuery("select * from #_thongbao_user where id_user = '".$_SESSION[$login_member]['id']."' and `check` = 0 order by id desc");
                ?>
                <div class="p-relative">
                    <img src="./assets/images/notification_a.gif" width="32">
                    <span class="views"><?= count($thongbao_right) ?></span>
                </div>
                <span class="title">Thông báo</span>
            </a>
        </li>
        <li>
            <a class="<?= $action == 'dang-xuat' ? 'active' : '' ?>" href="account/dang-xuat" title="Đăng xuất">
                <div class="icon">
                    <img src="./assets/images/logout_b.svg" width="32">
                </div>
                <span class="title">Đăng xuất</span>
            </a>
        </li>
    </ul>
</div>