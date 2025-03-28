<?php

global $config, $login_admin, $login_session;
require dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'bootstrap.php';

require_once LIBRARIES_PATH . "config.php";
require_once LIBRARIES_PATH . 'autoload.php';

global $config;

new AutoLoad();
$injection = new AntiSQLInjection();
$d = new PDODb($config['database']);
$func = new Functions($d);

//$username = (isset($_POST['username'])) ? strtolower(htmlspecialchars($_POST['username'])) : '';
//$password = (isset($_POST['password'])) ? htmlspecialchars($_POST['password']) : '';

$username = (!empty($_POST['username'])) ? $_POST['username'] : '';
$password = (!empty($_POST['password'])) ? $_POST['password'] : '';
$remember = (!empty($_POST['remember'])) ? $_POST['remember'] : 0;

$error = "";
$success = "";
$login_failed = false;

/* Kiểm tra đăng nhập tài khoản sai theo số lần */
$ip = $func->getRealIPAddress();
$row = $d->rawQuery("select id, login_ip, login_attempts, attempt_time, locked_time from #_user_limit WHERE login_ip = ? order by id desc limit 1", [$ip]);

if (isset($row) && count($row) == 1) {
    $id_login = $row[0]['id'];
    $time_now = time();
    if ($row[0]['locked_time'] > 0) {
        $locked_time = $row[0]['locked_time'];
        $delay_time = $config['login']['delay'];
        $interval = $time_now - $locked_time;

        if ($interval <= $delay_time * 60) {
            $time_remain = $delay_time * 60 - $interval;
            $error = "Xin lỗi..! Vui lòng thử lại sau " . round($time_remain / 60) . " phút..!";
        } else {
            $d->rawQuery("update #_user_limit set login_attempts = 0, attempt_time = ?, locked_time = 0 where id = ?", [$time_now, $id_login]);
        }
    }
}

/* Còn số lần đăng nhập */
if ($error == '') {
    /* Kiểm tra thông tin đăng nhập */
    if ($username == '' && $password == '') {
        $error = "Chưa nhập tên đăng nhập và mật khẩu";
    } else if ($username == '') {
        $error = "Chưa nhập tên đăng nhập";
    } else if ($password == '') {
        $error = "Chưa nhập mật khẩu";
    } else {

        /* Kiểm tra đăng nhập */
        $row = $d->rawQueryOne("select * from #_user where username = ? and hienthi>0 limit 0,1", [$username]);

        if (isset($row['id'])) {
            if ((int)$_COOKIE['login_admin'] == $row['id'] && $_COOKIE['login_session'] == $row['login_session']) {
                /* Tạo Session login */
                $_SESSION[$login_admin]['active'] = true;
                $_SESSION[$login_admin]['username'] = $row['username'];
                $_SESSION[$login_admin]['id'] = $row['id'];
                $_SESSION[$login_admin]['role'] = $row['role'];
                $_SESSION[$login_admin]['quyen'] = $row['quyen'];
                $_SESSION[$login_admin]['token'] = $row['login_session'];
                $_SESSION[$login_admin]['password'] = $row['password'];
                $_SESSION[$login_admin]['login_session'] = $row['login_session'];
                $_SESSION[$login_admin]['login_token'] = $row['user_token'];

                /* Cập nhật quyền của user đăng nhập */
                $quyen = $_SESSION[$login_admin]['token'];
                $d->rawQuery("update #_user set quyen = ? where id = ?", [$quyen, $row['id']]);

                $success = "Đăng nhập thành công";

            } else if (($row['password'] == $func->encrypt_password($config['website']['secret'], $password, $config['website']['salt']))) {
                $timenow = time();
                $id_user = $row['id'];
                $ip = $func->getRealIPAddress();
                $token = md5(time());
                $user_agent = $_SERVER['HTTP_USER_AGENT'];
                $sessionhash = md5(sha1($row['password'] . $row['username']));

                /* Ghi log truy cập thành công */
                $d->rawQuery("insert into #_user_log (id_user, ip, timelog, user_agent) values (?,?,?,?)", [$id_user, $ip, $timenow, $user_agent]);

                /* Tạo log và login session */
                $d->rawQuery("update #_user set login_session = ?, lastlogin = ?, user_token = ? where id = ?", [$sessionhash, $timenow, $token, $id_user]);

                /* Khởi tạo Session để kiểm tra số lần đăng nhập */
                $d->rawQuery("update #_user set login_session = ?, lastlogin = ? where id = ?", [$sessionhash, $timenow, $id_user]);

                /* Reset số lần đăng nhập và thời gian đăng nhập */
                $limitlogin = $d->rawQuery("select id, login_ip, login_attempts, attempt_time, locked_time from #_user_limit where login_ip = ? order by id desc", [$ip]);

                if (count($limitlogin) == 1) {
                    $id_login = $limitlogin[0]['id'];
                    $d->rawQuery("update #_user_limit set login_attempts = 0, locked_time = 0 where id = ?", [$id_login]);
                }

                /* Tạo Session login */
                $_SESSION[$login_admin]['active'] = true;
                $_SESSION[$login_admin]['username'] = $row['username'];
                $_SESSION[$login_admin]['id'] = $row['id'];
                $_SESSION[$login_admin]['role'] = $row['role'];
                $_SESSION[$login_admin]['quyen'] = $row['quyen'];
                $_SESSION[$login_admin]['token'] = $sessionhash;
                $_SESSION[$login_admin]['password'] = $row['password'];
                $_SESSION[$login_admin]['login_session'] = $sessionhash;
                $_SESSION[$login_admin]['login_token'] = $token;


                /* Nhớ mật khẩu */
                setcookie('login_admin', "", -1, '/');
                setcookie('login_member_session', "", -1, '/');
                if ($remember == 1) {
                    $time_expiry = time() + 3600 * 24;
                    setcookie('login_admin', $row['id'], $time_expiry, '/');
                    setcookie('login_session', $sessionhash, $time_expiry, '/');
                }


                /* Cập nhật quyền của user đăng nhập */
                $quyen = $_SESSION[$login_admin]['token'];
                $d->rawQuery("update #_user set quyen = ? where id = ?", [$quyen, $row['id']]);

                $success = "Đăng nhập thành công";
            } else {
                $login_failed = true;
                $error = "Mật khẩu không chính xác";
            }
        } else {
            $error = "Tên đăng nhập không tồn tại";
        }

        /* Xử lý khi đăng nhập thất bại */
        if ($login_failed) {
            $ip = $func->getRealIPAddress();
            $row = $d->rawQuery("select id,login_ip,login_attempts,attempt_time,locked_time from #_user_limit where login_ip = ? order by id desc limit 1", [$ip]);

            if (count($row) == 1) {
                $id_login = $row[0]['id'];
                $attempt = $row[0]['login_attempts'];
                $noofattmpt = $config['login']['attempt'];
                if ($attempt < $noofattmpt) {
                    $attempt = $attempt + 1;

                    /* Cập nhật số lần đăng nhập sai */
                    $d->rawQuery("update #_user_limit set login_attempts = ? where id = ?", [$attempt, $id_login]);

                    $no_ofattmpt = $noofattmpt + 1;
                    $remain_attempt = $no_ofattmpt - $attempt;
                    $error = 'Sai thông tin. Còn ' . $remain_attempt . ' lần thử';
                } else {
                    if ($row[0]['locked_time'] == 0) {
                        $attempt = $attempt + 1;
                        $timenow = time();

                        /* Cập nhật số lần đăng nhập sai */
                        $d->rawQuery("update #_user_limit set login_attempts = ?, locked_time = ? where id = ?", [$attempt, $timenow, $id_login]);
                    } else {
                        $attempt = $attempt + 1;

                        /* Cập nhật số lần đăng nhập sai */
                        $d->rawQuery("update #_user_limit set login_attempts = ? where id = ?", [$attempt, $id_login]);
                    }
                    $delay_time = $config['login']['delay'];
                    $error = "Bạn đã hết lần thử. Vui lòng thử lại sau " . $delay_time . " phút";
                }
            } else {
                $timenow = time();

                /* Cập nhật thông tin đăng nhập sai */
                $d->rawQuery("insert into #_user_limit (login_ip, login_attempts, attempt_time, locked_time) values (?,?,?,?)", [$ip, 1, $timenow, 0]);

                $remain_attempt = $config['login']['attempt'];
                $error = 'Sai thông tin. Còn ' . $remain_attempt . ' lần thử';
            }
        }
    }
}

$data = ['success' => $success, 'error' => $error];
echo json_encode($data);
