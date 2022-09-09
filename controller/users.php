<?php
include_once "../utils/session.php";
Session::init();
include_once "../db/config.php";
include_once "../utils/dbhelper.php";
include_once "../utils/validate.php";
$http_origin = "";
if (!empty($_SERVER['HTTP_ORIGIN'])) {
    if (in_array($_SERVER['HTTP_ORIGIN'], allowedOrigins)) {
        $http_origin = $_SERVER['HTTP_ORIGIN'];
    }
}

header("Access-Control-Allow-Origin: " . $http_origin);
header("Access-Control-Allow-Methods: GET,POST,PATCH,DELETE");
header("Access-Control-Allow-Credentials: true");

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    logout(); //oke
    die();
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['crud_req'] == "register") {
    register(); //oke
    die();
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['crud_req'] == "login") {
    login(); //oke
    die();
}
function register()
{
    $account = getPOST("account");
    $password = getPOST("password");
    $name = getPOST("name");
    $messageErr = "";
    $isErr = false;
    $query = 'select * from users where account="' . $account . '" limit 1';
    $isUnit = count(executeResult($query)) >= 1 ? false : true;
    if ($isUnit == false) {
        $isErr = true;
        $messageErr = "Tài khoản đã tồn tại trên hệ thống";
    }
    if ($isErr == true) {
        http_response_code(203);
        echo $messageErr;
        die();
    }

    $passwordMd5 = md5($password);
    $query = "insert into users(account, password, name) values('".$account."', '".$passwordMd5."', '".$name."')";
    execute($query);
    echo $query;
    $query = 'select * from users where account="' . $account . '" limit 1';
    $result = executeResult($query);
    if (count($result) >= 1 ? true : false) {
        http_response_code(201);
    } else {
        http_response_code(203);
        echo "Đăng ký tài khoản thất bại";
    }
}
function login()
{
    $account = getPOST("account");
    $password = getPOST("password");
    $query = 'select * from users where account = "' . $account . '" and password = "' . md5($password) . '" limit 1';
    $responseData = executeResult($query);
    $isSuccessfully = count($responseData) >= 1 ? true : false;
    if ($isSuccessfully == true) {
        http_response_code(200);
        $user = array("id" => $responseData[0]["id"],  "name" => $responseData[0]["name"]);
        Session::set("user", $user);
        echo Session::get("user");
    } else {
        http_response_code(203);
        echo "Tên tài khoản hoặc mật khẩu không chính xác";
    }
}
function logout()
{
    Session::destroy();
    http_response_code(200);
}
?>

