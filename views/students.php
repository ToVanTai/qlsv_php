<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/base/grid.css" />
    <link rel="stylesheet" href="./css/base/reset.css" />
    <link rel="stylesheet" href="./css/pages/home/home.css">
    <title>Danh sách sinh viên</title>
</head>
<body>
    <a href="index.php?view-mode=add" class="btn add">Thêm</a>
    <h1 class="home__heading">
        Danh sách sinh viên
    </h1>
    <table border="1">
        <thead>
            <th>Mã SV</th>
            <th>Tên</th>
            <th>Tuổi</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Lớp</th>
            <th>Hành động</th>
        </thead>
        <tbody id="listStudent">
            <!-- <tr>
                <td>01</td>
                <td>01</td>
                <td>01</td>
                <td>01</td>
                <td>01</td>
                <td>Lớp</td>
                <td>
                    <a href="index.php?view-mode=show&id="  class="btn show" id="btn-show">Sửa</a>
                    <button  class="btn del" data-id="1" id="btn-del">Xóa</button>
                </td>
            </tr> -->
        </tbody>
        
    </table>
    <script type="module" src="./js/pages/home.js"></script>
</body>
</html>