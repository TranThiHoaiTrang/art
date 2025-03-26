<?php
$linkMan = "index.php?com=user&act=man_khoahoc&p=" . $curPage;
$linkAdd = "index.php?com=user&act=man_khoahoc&p=" . $curPage;
if ($_GET['id_chuong']) {
    $linkEdit = "index.php?com=user&act=edit_khoahoc&p=" . $curPage;
} else {
    $linkEdit = "index.php?com=user&act=man_khoahoc&p=" . $curPage;
}
$linkDelete = "index.php?com=user&act=man_khoahoc&p=" . $curPage;
?>

<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Quản lý khóa học user</li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="card-footer text-sm sticky-top">
    </div>
    <div class="card card-primary card-outline text-sm mb-0">
        <div class="card-header">
            <h3 class="card-title">Danh sách khóa học user</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="align-middle">Tài khóa học</th>
                        <th class="align-middle">user</th>
                        <th class="align-middle text-center">Thao tác</th>
                    </tr>
                </thead>
                <?php if (empty($items)) { ?>
                    <tbody>
                        <tr>
                            <td colspan="100" class="text-center">Không có dữ liệu</td>
                        </tr>
                    </tbody>
                <?php } else { ?>
                    <tbody>
                        <?php for ($i = 0; $i < count($items); $i++) {
                        ?>
                            <tr>
                                <?php if ($khoahoc) { ?>
                                    <?php if ($chuong) { ?>
                                        <td class="align-middle">
                                            <a class="text-dark" href="<?= $linkEdit ?>&id=<?= $user ?>&id_khoahoc=<?= $khoahoc ?>&id_chuong=<?= $chuong ?>&id_bai=<?= $items[$i]['id'] ?>" title="<?= $items[$i]['tenvi'] ?>"><?= $items[$i]['tenvi'] ?></a>
                                        </td>
                                        <td class="align-middle">
                                            <a class="text-dark" href="<?= $linkEdit ?>&id=<?= $user ?>&id_khoahoc=<?= $khoahoc ?>&id_chuong=<?= $chuong ?>&id_bai=<?= $items[$i]['id'] ?>" title="<?= $user_text['ten'] ?>"><?= $user_text['ten'] ?></a>
                                        </td>
                                        <td class="align-middle text-center text-md text-nowrap">
                                            <a class="text-primary mr-2" href="<?= $linkEdit ?>&id=<?= $khoahoc ?>" title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
                                        </td>
                                    <?php } else { ?>
                                        <td class="align-middle">
                                            <a class="text-dark" href="<?= $linkEdit ?>&id=<?= $user ?>&id_khoahoc=<?= $khoahoc ?>&id_chuong=<?= $items[$i]['id'] ?>" title="<?= $items[$i]['tenvi'] ?>"><?= $items[$i]['tenvi'] ?></a>
                                        </td>
                                        <td class="align-middle">
                                            <a class="text-dark" href="<?= $linkEdit ?>&id=<?= $user ?>&id_khoahoc=<?= $khoahoc ?>&id_chuong=<?= $items[$i]['id'] ?>" title="<?= $user_text['ten'] ?>"><?= $user_text['ten'] ?></a>
                                        </td>
                                        <td class="align-middle text-center text-md text-nowrap">
                                            <a class="text-primary mr-2" href="<?= $linkEdit ?>&id=<?= $khoahoc['id'] ?>" title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
                                        </td>
                                    <?php } ?>
                                <?php } else { ?>
                                    <td class="align-middle">
                                        <a class="text-dark" href="<?= $linkEdit ?>&id=<?= $user ?>&id_khoahoc=<?= $items[$i]['id_product'] ?>" title="<?= $items[$i]['ten'] ?>"><?= $items[$i]['ten'] ?></a>
                                    </td>
                                    <td class="align-middle">
                                        <a class="text-dark" href="<?= $linkEdit ?>&id=<?= $user ?>&id_khoahoc=<?= $items[$i]['id_product'] ?>" title="<?= $user_text['ten'] ?>"><?= $user_text['ten'] ?></a>
                                    </td>
                                    <td class="align-middle text-center text-md text-nowrap">
                                        <a class="text-primary mr-2" href="<?= $linkEdit ?>&id=<?= $items[$i]['id'] ?>" title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
    <?php if ($paging) { ?>
        <div class="card-footer text-sm pb-0">
            <?= $paging ?>
        </div>
    <?php } ?>
</section>