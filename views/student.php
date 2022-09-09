<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/base/grid.css" />
    <link rel="stylesheet" href="./css/base/reset.css" />
    <link rel="stylesheet" href="./css/pages/home/home.css">
    <title>Thông tin sinh viên</title>
</head>
<body>
    <a href="index.php" class="btn add">Trở lại</a>
    <h1 class="home__heading">
        Thông tin sinh viên
    </h1>
    <form id="form-change">
        <label for="name">Tên</label>
        <input type="text" required placeholder="Tên sinh viên" name="name" id="name">
        <br/>
        <label for="age">Tuổi</label>
        <input required type="number" placeholder="Tên sinh viên" name="age" id="age">
        <br/>
        <label >Giới tính</label>
        <br/>
        Nam <input type="radio" checked="true" name="sex" id="nam" value="1">
        Nữ <input type="radio" checked="false" name="sex" id="nu" value="0">
        <br/>
        <label for="address">Địa chỉ</label>
         <input type="text" required placeholder="Địa chỉ" name="address" id="address">
        <br/>
        <label for="class">Lớp học</label>
        <input type="text" required placeholder="Lớp học" name="class" id="class">
        <input type="hidden" name="crud_req" value="update">
        <br/>
        <button class="btn" id="btn-change">Lưu</button>
    </form>
    <script type="module" src="./js/components/showStudent.js"></script>
</body>
</html>