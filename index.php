<?php
require_once "./utils/session.php";
require_once "./utils/validate.php";
require_once "./db/config.php";
Session::init();
if(empty(Session::get("user"))){
    echo '<script>
        alert("Vui lòng đăng nhập để sử dụng chức năng này.");
        window.location.href="'.baseUrl.'login.php";
    </script>';
    die();
}else{
    $id = getGET("id");
    $view = getGET("view-mode");//null, add, change, show
    switch($view){
        case "add":
            include_once "./views/addStudent.php";
            break;
        case "change":
            include_once "./views/changeStudent.php";
            break;
        case "show":
            include_once "./views/student.php";
            break;
        default:
            include_once "./views/students.php";
    }
    
}
?>