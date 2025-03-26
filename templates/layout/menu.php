<div class="header-height">
    <div id="menu_top">
        <div class="clearfix maincontent">
            <div class="menu">
                <div class="menu_mobi align-self-center">
                    <p class="icon_menu_mobi">
                        <i class="fas fa-bars"></i>
                    </p>
                    <a href="" class="home_mobi">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="menu_mobi_add">
                    <div class="all_dangki_dnhap">
                        <?php if ($_SESSION[$login_member]['id']) { ?>
                            <div class="all_thontin_tk_index">
                                <div class="tongtin_tk_index">
                                    <div class="img_tk_index">
                                        <?php
                                        $initials = $func->getShortInitials($_SESSION[$login_member]['ten']);
                                        ?>
                                        <img src="<?= BASE_URL ?>templates/account/account_img.php?text=<?php echo urlencode($initials); ?>" alt="Avatar">
                                    </div>
                                    <div class="icon_tongtin_tk_index"><i class="fas fa-angle-down"></i></div>
                                </div>
                                <ul class="dropdown_thongtin_tk_index">
                                    <li>
                                        <div class="re--user-info">
                                            <?php
                                            $initials = $func->getShortInitials($_SESSION[$login_member]['ten']);
                                            ?>
                                            <img src="<?= BASE_URL ?>templates/account/account_img.php?text=<?php echo urlencode($initials); ?>" alt="Avatar">
                                            <span><?= $_SESSION[$login_member]['ten'] ?></span>
                                        </div>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="account/thong-tin"> Thông tin cá nhân </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="account/course"> Khóa học của tôi </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="account/dang-xuat"> Đăng xuất </a>
                                    </li>
                                </ul>
                            </div>
                        <?php } else { ?>
                            <a href="account/dang-ky">
                                <div class="link_dangki">Đăng kí</div>
                            </a>
                            <a href="account/dang-nhap">
                                <div class="link_dangnhap">Đăng nhập</div>
                            </a>
                        <?php } ?>
                    </div>
                    <div class="frm_timkiem timkiem_header mt-3 mb-3">
                        <input type="text" class="input" id="keyword1" placeholder="" onkeypress="doEnter(event,'keyword1');">
                        <button type="submit" value="" class="nut_tim" onclick="onSearch('keyword1');"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                <a class="header_logo" href=""><?= Helper::the_thumbnail($logo['photo'], '', $setting['ten' . $lang], true) ?></a>
                <ul class="menu_cap_cha d-flex">
                    <li class="menulicha <?= $com == 'gioi-thieu' ? 'active' : '' ?>">
                        <a href="gioi-thieu" title="Giới thiệu">Giới thiệu</a>
                    </li>
                    <li class="menulicha <?= $com == 'huong-dan' ? 'active' : '' ?>">
                        <a href="huong-dan" title="Hướng dẫn">Hướng dẫn</a>
                    </li>
                    <li class="menulicha <?= $com == 'san-pham' ? 'active' : '' ?>">
                        <a href="san-pham" title="Khóa học">
                            <span>Khóa học</span>
                            <?php if ($splistmenu) { ?>
                                <div class="icon_down">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            <?php } ?>
                        </a>
                        <?php if ($splistmenu) { ?>
                            <ul class="menu_cap_con">
                                <?php foreach ($splistmenu as $c => $cat) { ?>
                                    <li><a title="<?= $cat['ten' . $lang] ?>" href="<?= $cat[$sluglang] ?>"><?= $cat['ten' . $lang] ?></a></li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    </li>
                    <li class="menulicha <?= $com == 'blog' ? 'active' : '' ?>">
                        <a href="blog" title="Blog">Blog</a>
                    </li>
                </ul>
                <div class="all_right_menu">
                    <div class="frm_timkiem frm_timkiem_des">
                        <input type="text" class="input" id="keyword" placeholder="" onkeypress="doEnter(event,'keyword');">
                        <button type="submit" value="" class="nut_tim" onclick="onSearch('keyword');"><i class="fas fa-search"></i></button>
                    </div>
                    <a href="gio-hang" class="cart-header">
                        <span class="icon-cart-mobile">
                            <span id="cart-total" class="cart-total-header cart-total-header-mobile">
                                <span class="count-cart"><?= (isset($_SESSION['cart'])) ? count($_SESSION['cart']) : 0 ?></span>
                            </span>
                        </span>
                        <span class="text-link-toolbar"><i class="fas fa-shopping-cart"></i></span>
                    </a>
                    <div class="all_dangki_dnhap dangki_dnhap_des">
                        <?php if ($_SESSION[$login_member]['id']) { ?>
                            <div class="all_thontin_tk_index">
                                <div class="tongtin_tk_index">
                                    <div class="img_tk_index">
                                        <?php
                                        $initials = $func->getShortInitials($_SESSION[$login_member]['ten']);
                                        ?>
                                        <img src="<?= BASE_URL ?>templates/account/account_img.php?text=<?php echo urlencode($initials); ?>" alt="Avatar">
                                    </div>
                                    <div class="icon_tongtin_tk_index"><i class="fas fa-angle-down"></i></div>
                                </div>
                                <ul class="dropdown_thongtin_tk_index">
                                    <li>
                                        <div class="re--user-info">
                                            <?php
                                            $initials = $func->getShortInitials($_SESSION[$login_member]['ten']);
                                            ?>
                                            <img src="<?= BASE_URL ?>templates/account/account_img.php?text=<?php echo urlencode($initials); ?>" alt="Avatar">
                                            <span><?= $_SESSION[$login_member]['ten'] ?></span>
                                        </div>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="account/thong-tin"> Thông tin cá nhân </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="account/course"> Khóa học của tôi </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="account/dang-xuat"> Đăng xuất </a>
                                    </li>
                                </ul>
                            </div>
                        <?php } else { ?>
                            <a href="account/dang-ky">
                                <div class="link_dangki">Đăng kí</div>
                            </a>
                            <a href="account/dang-nhap">
                                <div class="link_dangnhap">Đăng nhập</div>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>