<?php
    require_once "./utils/session.php";
    require_once "./db/config.php";
    if(!empty(Session::get("user"))){
        echo '<script>
            alert("Bạn đã đăng nhập.");
            window.location.href="'.baseUrl.'";
        </script>';
        die();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập ký tài khoản</title>
    <link rel="stylesheet" href="./css/base/grid.css" />
    <link rel="stylesheet" href="./css/base/reset.css" />
    <link rel="stylesheet" href="./css/pages/register/register.css">
</head>
<body>
    <div class="container">
        <div class="container__registor">
            <h3>Đăng ký</h3>
            <form class="form__register" action="" method="POST">
                <label for="account">Tên tài khoản</label> 
                <input type="text" required placeholder="Nhập tên tài khoản" name="account" id="account" />
                <label for="password">Mật khẩu</label>
                <input type="password"required  placeholder="Nhập mật khẩu" name="password" id="password" />
                <label for="account">Tên tài khoản</label> 
                <input type="text" required placeholder="Nhập tên người dùng" name="name" id="name" />
                <input type="hidden" name="crud_req" value="register">
                <button type="submit" id="btn-submit">Đăng ký</button>
            </form>
            <div class="login">
                <span>Nếu bạn đã có tài khoản?</span>
                <a href="login.php">Đăng nhập</a>
            </div>
        </div>
    </div>
    <script type="module" src="./js/pages/register.js"></script>
</body>
</html>