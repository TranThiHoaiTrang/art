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
<?php $type_name = $_GET['step']; ?>

<div class="fixwidth">
    <div class="title_tong_giohang">
        <span class="<?= $type_name == 'giohang' ? 'active' : '' ?>">Giỏ hàng</span>
        <i class="fas fa-angle-right"></i>
        <span class="<?= $type_name == 'thongtin' ? 'active' : '' ?>">Thanh toán</span>
        <i class="fas fa-angle-right"></i>
        <span class="<?= $type_name == 'hoantat' ? 'active' : '' ?>">Hoàn tất</span>
    </div>
    <form class="form-cart validation-cart" novalidate method="post" action="" enctype="multipart/form-data">
        <div class="wrap-cart d-flex align-items-stretch justify-content-between">
            <?php if (isset($_SESSION['cart']) && count($_SESSION['cart'])) { ?>
                <?php if ($type_name == 'giohang') { ?>
                    <div class="top-cart">
                        <p class="title-cart"><?= giohangcuaban ?>:</p>
                        <div class="list-procart">
                            <div class="procart procart-label d-flex align-items-start justify-content-between">
                                <div class="pic-procart"><?= sanpham ?></div>
                                <!-- <div class="pic-procart"></?= hinhanh ?></div> -->
                                <div class="info-procart"></div>
                                <!-- <div class="info-procart"></?= tensanpham ?></div> -->
                                <div class="price-procart">Giá</div>
                                <div class="quantity-procart">
                                    <p><?= soluong ?></p>
                                    <p><?= thanhtien ?></p>
                                </div>
                                <div class="price-procart">Tổng cộng</div>
                            </div>
                            <?php $max = count($_SESSION['cart']);
                            for ($i = 0; $i < $max; $i++) {
                                $pid = $_SESSION['cart'][$i]['productid'];
                                $quantity = $_SESSION['cart'][$i]['qty'];
                                $mau = ($_SESSION['cart'][$i]['mau']) ? $_SESSION['cart'][$i]['mau'] : 0;
                                $size = ($_SESSION['cart'][$i]['size']) ? $_SESSION['cart'][$i]['size'] : 0;
                                $code = ($_SESSION['cart'][$i]['code']) ? $_SESSION['cart'][$i]['code'] : '';
                                $giasize = ($_SESSION['cart'][$i]['giasize']) ? $_SESSION['cart'][$i]['giasize'] : '';
                                $proinfo = $cart->get_product_info($pid);
                                $pro_price = $proinfo['gia'];
                                $pro_price_new = $proinfo['giamoi'];
                                $pro_price_qty = $pro_price * $quantity;
                                $pro_price_new_qty = $pro_price_new * $quantity;
                                $pro_price_mau_qty = $giasize * $quantity;
                                // var_dump($giasize);
                            ?>
                                <div class="procart procart-<?= $code ?> d-flex align-items-start justify-content-between">
                                    <div class="pic-procart">
                                        <a class="text-decoration-none" href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['ten' . $lang] ?>">
                                            <?= Helper::the_thumbnail($proinfo['photo'], 85, 85, '', $proinfo['ten' . $lang], true) ?>
                                        </a>
                                        <a class="del-procart text-decoration-none" data-code="<?= $code ?>">
                                            <i class="fa fa-times-circle" style="    font-family: 'Font Awesome 5 Pro';"></i>
                                            <!-- <span><?= xoa ?></span> -->
                                        </a>
                                    </div>
                                    <div class="info-procart">
                                        <h3 class="name-procart"><a class="text-decoration-none" href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['ten' . $lang] ?>"><?= $proinfo['ten' . $lang] ?></a>
                                        </h3>
                                        <div class="properties-procart">
                                            <?php if ($mau) {
                                                $maudetail = $d->rawQueryOne("select ten$lang from #_product_mau where type = ? and id = ? limit 0,1", array($proinfo['type'], $mau)); ?>
                                                <p>Màu: <strong><?= $maudetail['ten' . $lang] ?></strong></p>
                                            <?php } ?>
                                            <?php if ($size) {
                                                $sizedetail = $d->rawQueryOne("select ten$lang from #_product_size where type = ? and id = ? limit 0,1", array($proinfo['type'], $size)); ?>
                                                <p>Size: <strong><?= $sizedetail['ten' . $lang] ?></strong></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="price-procart">
                                        <?php if ($giasize) { ?>
                                            <p class="price-new-cart">
                                                <?= $func->format_money($pro_price_mau) ?>
                                            </p>
                                            <p class="price-old-cart ">
                                                <?= $func->format_money($pro_price) ?>
                                            </p>
                                        <?php } elseif ($proinfo['giamoi']) { ?>
                                            <p class="price-new-cart">
                                                <?= $func->format_money($pro_price_new) ?>
                                            </p>
                                            <p class="price-old-cart">
                                                <?= $func->format_money($pro_price) ?>
                                            </p>
                                        <?php } else { ?>
                                            <p class="price-new-cart">
                                                <?= $func->format_money($pro_price) ?>
                                            </p>
                                        <?php } ?>
                                    </div>
                                    <div class="quantity-procart">
                                        <div class="price-procart price-procart-rp">
                                            <?php if ($giasize) { ?>
                                                <p class="price-new-cart">
                                                    <?= $func->format_money($pro_price_mau) ?>
                                                </p>
                                                <p class="price-old-cart ">
                                                    <?= $func->format_money($pro_price) ?>
                                                </p>
                                            <?php } elseif ($proinfo['giamoi']) { ?>
                                                <p class="price-new-cart">
                                                    <?= $func->format_money($pro_price_new) ?>
                                                </p>
                                                <p class="price-old-cart ">
                                                    <?= $func->format_money($pro_price) ?>
                                                </p>
                                            <?php } else { ?>
                                                <p class="price-new-cart ">
                                                    <?= $func->format_money($pro_price) ?>
                                                </p>
                                            <?php } ?>
                                        </div>
                                        <div class="quantity-counter-procart quantity-counter-procart-<?= $code ?> d-flex align-items-stretch justify-content-between">
                                            <span class="counter-procart-minus counter-procart">-</span>
                                            <input type="number" class="quantity-procat" min="1" value="<?= $quantity ?>" data-pid="<?= $pid ?>" data-code="<?= $code ?>" />
                                            <span class="counter-procart-plus counter-procart">+</span>
                                        </div>
                                        <div class="pic-procart pic-procart-rp">
                                            <a class="text-decoration-none" href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['ten' . $lang] ?>"><?= Helper::the_thumbnail($proinfo['photo'], 85, 85, '', $proinfo['ten' . $lang], true) ?></a>
                                            <a class="del-procart text-decoration-none" data-code="<?= $code ?>">
                                                <i class="fa fa-times-circle" style="font-family: 'Font Awesome 5 Pro';"></i>
                                                <span><?= xoa ?></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="price-procart">
                                        <?php if ($giasize) { ?>
                                            <p class="price-new-cart load-price-new-<?= $code ?>">
                                                <?= $func->format_money($pro_price_mau_qty) ?>
                                            </p>
                                            <p class="price-old-cart load-price-<?= $code ?>">
                                                <?= $func->format_money($pro_price_qty) ?>
                                            </p>
                                        <?php } elseif ($proinfo['giamoi']) { ?>
                                            <p class="price-new-cart load-price-new-<?= $code ?>">
                                                <?= $func->format_money($pro_price_new_qty) ?>
                                            </p>
                                            <p class="price-old-cart load-price-<?= $code ?>">
                                                <?= $func->format_money($pro_price_qty) ?>
                                            </p>
                                        <?php } else { ?>
                                            <p class="price-new-cart load-price-<?= $code ?>">
                                                <?= $func->format_money($pro_price_qty) ?>
                                            </p>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="money-procart">
                            <?php /*if($config['order']['ship']) { ?>
                            <div class="total-procart d-flex align-items-center justify-content-between d-none">
                                <p><?=tamtinh?>:</p>
                                <p class="total-price load-price-temp"><?=$func->format_money($cart->get_order_total())?></p>
                            </div>
                            <?php } ?>
                            <?php if($config['order']['ship']) { ?>
                            <div class="total-procart d-flex align-items-center justify-content-between">
                                <p><?=phivanchuyen?>:</p>
                                <p class="total-price load-price-ship">0đ</p>
                            </div>
                            <?php }*/ ?>
                            <input type="hidden" class="price-temp" name="price-temp" value="<?= $cart->get_order_total() ?>">
                            <input type="hidden" class="price-ship" name="price-ship">
                            <input type="hidden" class="price-total" name="price-total" value="<?= $cart->get_order_total() ?>">
                        </div>
                        <div class="all_tieptuc_xemsanpham">
                            <a href="san-pham">
                                <div class="all_xemsanpham_order">
                                    <div class="xemsanpham">
                                        <i class="fas fa-long-arrow-alt-left"></i>
                                        <span>Tiếp tục xem khóa học</span>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                    <div class="bottom-cart">
                        <div class="section-cart">
                            <div class="title-cart">
                                Tổng sổ lượng
                            </div>
                            <div class="total-procart d-flex align-items-center justify-content-between">
                                <p><?= tongtien ?>:</p>
                                <p class="total-price load-price-total"><?= $func->format_money($cart->get_order_total()) ?></p>
                            </div>
                            <div class="total-procart d-flex align-items-center justify-content-between">
                                <p>Tổng cộng:</p>
                                <p class="total-price load-price-total"><?= $func->format_money($cart->get_order_total()) ?></p>
                            </div>
                            <div class="next_step_thongtin" data-step="thongtin">
                                Thanh toán
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($type_name == 'thongtin') { ?>
                    <div class="top-cart" style="border-right: none;">
                        <div class="section-cart">
                            <p class="title-cart">Thông tin thanh toán:</p>
                            <div class="information-cart">
                                <div class="input-cart">
                                    <span>Họ và tên *</span>
                                    <input type="text" class="form-control" id="ten" name="ten" value="<?= $_SESSION[$login_member]['ten'] ?>" placeholder="Type full name" required />
                                    <div class="invalid-feedback"><?= vuilongnhaphoten ?></div>
                                </div>
                                <div class="input-cart">
                                    <span>Địa chỉ *</span>
                                    <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Địa chỉ cụ thể" required />
                                    <div class="invalid-feedback"><?= vuilongnhapdiachi ?></div>
                                </div>
                                <div class="input-cart">
                                    <span>Địa chỉ email (Không bắt buộc)</span>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $_SESSION[$login_member]['email'] ?>" placeholder="Type your email" />
                                    <div class="invalid-feedback"><?= vuilongnhapdiachiemail ?></div>
                                </div>
                                <div class="input-cart">
                                    <span>Số điện thoại *</span>
                                    <input type="number" class="form-control" id="dienthoai" name="dienthoai" value="<?= $_SESSION[$login_member]['dienthoai'] ?>" placeholder="Type your phone" required />
                                    <div class="invalid-feedback"><?= vuilongnhapsodienthoai ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom-cart" style="border: 2px solid #f87f10;padding: 10px;">
                        <p class="title-cart"><?= giohangcuaban ?>:</p>
                        <div class="list-procart">
                            <div class="procart procart-label-thanhtoan d-flex align-items-start justify-content-between">
                                <div class="pic-procart"><?= sanpham ?></div>
                                <div class="price-procart">Tổng cộng</div>
                            </div>
                            <?php $max = count($_SESSION['cart']);
                            for ($i = 0; $i < $max; $i++) {
                                $pid = $_SESSION['cart'][$i]['productid'];
                                $quantity = $_SESSION['cart'][$i]['qty'];
                                $mau = ($_SESSION['cart'][$i]['mau']) ? $_SESSION['cart'][$i]['mau'] : 0;
                                $size = ($_SESSION['cart'][$i]['size']) ? $_SESSION['cart'][$i]['size'] : 0;
                                $code = ($_SESSION['cart'][$i]['code']) ? $_SESSION['cart'][$i]['code'] : '';
                                $giasize = ($_SESSION['cart'][$i]['giasize']) ? $_SESSION['cart'][$i]['giasize'] : '';
                                $proinfo = $cart->get_product_info($pid);
                                $pro_price = $proinfo['gia'];
                                $pro_price_new = $proinfo['giamoi'];
                                $pro_price_qty = $pro_price * $quantity;
                                $pro_price_new_qty = $pro_price_new * $quantity;
                                $pro_price_mau_qty = $giasize * $quantity;
                                // var_dump($giasize);
                            ?>
                                <div class="procart procart-<?= $code ?> d-flex align-items-start justify-content-between" style="padding: 20px 0;border: none;">
                                    <div class="info-procart" style="width: 70%;">
                                        <h3 class="name-procart-thanhtoan">
                                            <a class="text-decoration-none" href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['ten' . $lang] ?>">
                                                <span><?= $proinfo['ten' . $lang] ?></span>
                                                <span>x <?= $quantity ?></span>
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="price-procart" style="width: 30%;">
                                        <?php if ($giasize) { ?>
                                            <p class="price-new-cart load-price-new-<?= $code ?>">
                                                <?= $func->format_money($pro_price_mau_qty) ?>
                                            </p>
                                            <p class="price-old-cart load-price-<?= $code ?>">
                                                <?= $func->format_money($pro_price_qty) ?>
                                            </p>
                                        <?php } elseif ($proinfo['giamoi']) { ?>
                                            <p class="price-new-cart load-price-new-<?= $code ?>">
                                                <?= $func->format_money($pro_price_new_qty) ?>
                                            </p>
                                            <p class="price-old-cart load-price-<?= $code ?>">
                                                <?= $func->format_money($pro_price_qty) ?>
                                            </p>
                                        <?php } else { ?>
                                            <p class="price-new-cart load-price-<?= $code ?>">
                                                <?= $func->format_money($pro_price_qty) ?>
                                            </p>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="money-procart">
                            <input type="hidden" class="price-temp" name="price-temp" value="<?= $cart->get_order_total() ?>">
                            <input type="hidden" class="price-ship" name="price-ship">
                            <input type="hidden" class="price-total" name="price-total" value="<?= $cart->get_order_total() ?>">
                        </div>
                        <div class="section-cart">
                            <div class="total-procart d-flex align-items-center justify-content-between">
                                <p><?= tongtien ?>:</p>
                                <p class="total-price load-price-total"><?= $func->format_money($cart->get_order_total()) ?></p>
                            </div>
                            <div class="information-cart">
                                <div class="payments-cart custom-control custom-radio all_giaohang">
                                    <input type="radio" class="custom-control-input" id="payments-vnpay" name="payments" value="Cổng thanh toán VNPAY" required>
                                    <label class="payments-label custom-control-label" for="payments-vnpay" data-payments="vnpay">Cổng thanh toán VNPAY</label>
                                    <div class="img_pttt">
                                        <img src="./assets/images/logo_visa.png" alt="">
                                        <img src="./assets/images/logo_mastercard.png" alt="">
                                        <img src="./assets/images/Icon-Vietcombank.png" alt="">
                                        <img src="./assets/images/Logo-VietinBank.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="total-procart d-flex align-items-center justify-content-between">
                                <p>Tổng cộng:</p>
                                <p class="total-price load-price-total"><?= $func->format_money($cart->get_order_total()) ?></p>
                            </div>
                        </div>
                        <input type="submit" class="btn-cart btn btn-primary btn-lg btn-block" name="thanhtoan" value="Đặt hàng" disabled>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <?php if ($type_name == 'hoantat') {
                    $item = $d->rawQueryOne("select * from #_order where madonhang = ? limit 0,1", array($_GET['madonhang']));
                    $chitietdonhang = $d->rawQuery("select * from #_order_detail where id_order = ? order by id desc", array($item['id']));
                ?>
                    <div class="top-cart" style="border-right: none;">
                        <p class="title-cart">Chi tiết khóa học:</p>
                        <div class="list-procart">
                            <div class="procart procart-label-thanhtoan d-flex align-items-start justify-content-between">
                                <div class="pic-procart">Khóa học</div>
                                <div class="price-procart-hoantat">Tổng cộng</div>
                            </div>
                            <?php $max = count($chitietdonhang);
                            for ($i = 0; $i < $max; $i++) {
                                $pid = $chitietdonhang[$i]['id_product'];
                                $quantity = $chitietdonhang[$i]['soluong'];
                                $proinfo = $cart->get_product_info($pid);
                                $pro_price = $chitietdonhang[$i]['gia'];
                                $pro_price_new = $chitietdonhang[$i]['giamoi'];
                                $pro_price_qty = $pro_price * $quantity;
                                $pro_price_new_qty = $pro_price_new * $quantity;
                                $pro_price_mau_qty = $giasize * $quantity;
                                // var_dump($giasize);
                            ?>
                                <div class="procart procart-<?= $code ?> d-flex align-items-start justify-content-between" style="padding: 10px 0;border: none;">
                                    <div class="info-procart" style="width: 70%;">
                                        <h3 class="name-procart-thanhtoan">
                                            <a class="text-decoration-none" href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['ten' . $lang] ?>">
                                                <span style="color: #f87f10;"><?= $proinfo['ten' . $lang] ?></span>
                                                <span>x <?= $quantity ?></span>
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="price-procart-hoantat" style="width: 30%;font-weight: 600;">
                                        <?php if ($giasize) { ?>
                                            <p class="price-new-cart load-price-new-<?= $code ?>">
                                                <?= $func->format_money($pro_price_mau_qty) ?>
                                            </p>
                                            <p class="price-old-cart load-price-<?= $code ?>">
                                                <?= $func->format_money($pro_price_qty) ?>
                                            </p>
                                        <?php } elseif ($proinfo['giamoi']) { ?>
                                            <p class="price-new-cart load-price-new-<?= $code ?>">
                                                <?= $func->format_money($pro_price_new_qty) ?>
                                            </p>
                                            <p class="price-old-cart load-price-<?= $code ?>">
                                                <?= $func->format_money($pro_price_qty) ?>
                                            </p>
                                        <?php } else { ?>
                                            <p class="price-new-cart load-price-<?= $code ?>">
                                                <?= $func->format_money($pro_price_qty) ?>
                                            </p>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="procart d-flex align-items-start justify-content-between" style="padding: 10px 0;border: none;">
                                <div class="info-procart" style="width: 70%;color: #757575;font-weight: 600;">
                                    Tổng cộng
                                </div>
                                <div class="price-procart-hoantat" style="width: 30%;font-weight: 600;">
                                    <?= $func->format_money($item['tamtinh']) ?>
                                </div>
                            </div>
                            <div class="procart d-flex align-items-start justify-content-between" style="padding: 10px 0;border: none;">
                                <div class="info-procart" style="width: 70%;color: #757575;font-weight: 600;">
                                    Phương thức thanh toán
                                </div>
                                <div class="price-procart-hoantat" style="width: 30%;">
                                    <?= @$item['httt_text'] ?>
                                </div>
                            </div>
                            <div class="procart d-flex align-items-start justify-content-between" style="padding: 10px 0;border: none;">
                                <div class="info-procart" style="width: 70%;color: #757575;font-weight: 600;">
                                    Tổng cộng
                                </div>
                                <div class="price-procart-hoantat" style="width: 30%;font-weight: 600;">
                                    <?= $func->format_money($item['tonggia']) ?>
                                </div>
                            </div>
                            <div class="procart d-flex align-items-start justify-content-between" style="padding: 10px 0;border: none;">
                                <div class="info-procart" style="width: 70%;color: #757575;font-weight: 600;">
                                    Số điện thoại
                                </div>
                                <div class="price-procart-hoantat" style="width: 30%;">
                                    <?= $item['dienthoai'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom-cart" style="border: 2px solid #f87f10;padding: 20px;background: #fafafa;">
                        <div class="title_tiepnhan">Cảm ơn bạn. Khóa học của bạn đã được tiếp nhận.</div>
                        <ul class="list_thongtin_donhang">
                            <li>
                                Mã Khóa học: <span><?= $item['madonhang'] ?></span>
                            </li>
                            <li>
                                Ngày: <span><?= date("d/m/Y", $item['ngaytao']) ?></span>
                            </li>
                            <li>
                                Tổng cộng: <span style="color: #000;"><?= $func->format_money($item['tonggia']) ?></span>
                            </li>
                            <li>
                                Phương thức thanh toán: <span><?= @$item['httt_text'] ?></span>
                            </li>
                        </ul>
                    </div>
                <?php } else { ?>
                    <a href="" class="empty-cart text-decoration-none">
                        <img style="width: 80px;" src="./assets/images/cart.png" alt="">
                        <p><?= khongtontaisanphamtronggiohang ?></p>
                        <span><?= vetrangchu ?></span>
                    </a>
                <?php } ?>
            <?php } ?>
        </div>
    </form>
</div>