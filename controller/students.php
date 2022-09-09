<?php
include_once "../utils/session.php";
Session::init();//Session::set("carts"=>array());
include_once "../db/config.php";
include_once "../utils/dbhelper.php";
include_once "../utils/validate.php";
include_once "../classes/Students.php";
$http_origin = "";
if (!empty($_SERVER['HTTP_ORIGIN'])) {
    if (in_array($_SERVER['HTTP_ORIGIN'], allowedOrigins)) {
        $http_origin = $_SERVER['HTTP_ORIGIN'];
    }
}

header("Access-Control-Allow-Origin: " . $http_origin);
header("Access-Control-Allow-Methods: GET,POST,PATCH,DELETE");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json");

if(empty(Session::get("user"))){
    http_response_code(203);
    echo "Yêu cầu đăng nhập để thực hiện chức năng này.";
    die();
}
$id = getGET("id");
if($_SERVER["REQUEST_METHOD"] == "GET" && $id !=null){
    Students::readItem($id);
    die();
}
if($_SERVER["REQUEST_METHOD"] == "GET"){
    Students::readAll();
    die();
}
if($_SERVER["REQUEST_METHOD"] == "DELETE" && $id !=null){
    Students::deleteItem($id);
    die();
}
if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["crud_req"]) && $_POST["crud_req"]=="create"){
    $name = getPOST("name");
    $age = getPOST("age");
    $sex = getPOST("sex");
    $address = getPOST("address");
    $class = getPOST("class");
    $student = new Students();
    $student->createItem($name,$age, $sex, $address,$class);
    die();
}
if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["crud_req"]) && $_POST["crud_req"]=="update" && $id!=null){
    $name = getPOST("name");
    $age = getPOST("age");
    $sex = getPOST("sex");
    $address = getPOST("address");
    $class = getPOST("class");
    $student = new Students();
    $student->updateItem($id,$name,$age, $sex, $address,$class);
    die();
}
?>