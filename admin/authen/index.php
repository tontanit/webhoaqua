<?php
require_once('../../database/dbhelper.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Quản lý Danh muc, Sản phẩm</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="#">Quản lý Danh mục</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../product/">Quản lý Sản phẩm</a>
        </li>

    </ul>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Danh mục sản phẩm</h2>
            </div>
            <a href="add.php"><button type="button" class="btn btn-success">Thêm mới</button></a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên danh mục</th>
                        <th style="width: 35px;"></th>
                        <th style="width: 35px;"></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql = "SELECT * FROM category";
                    $result = executeSelect($sql);
                    $index = 1;
                    foreach ($result as $list) {
                        echo '  <tr>
                        <td>' . $index++ . '</td>
                        <td>' . $list['name'] . '</td>
                        <td><a href="add.php?id=' . $list['id'] . '"><button type="button" class="btn btn-warning">Sửa</button></a></td>
                        <td><button type="button" class="btn btn-danger" 
                        onclick="deleteCategory(' . $list['id'] . ')">Xoá</button></td>
                    </tr>';
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        function deleteCategory(id) {
            var option = confirm('Ban có chắc muốn xóa danh mục này không?');
            if (!option) {
                return;
            }
            console.log(id)
            //ajax - lenh post
            $.post('ajax.php', {
                'id': id,
                'action': 'delete'
            }, function(data) {
                location.reload()
            })
        }
    </script>
    <!-- <script type="text/javascript">
        function validateform() {
            $pwd = $('#pwd').val();
            $confirm_pwd = $('#confirmation_pwd').val();
            if ($pwd != $confirm_pwd) {
                alert("Mật khẩu không khớp, vui lòng kiểm tra lại");
                return false;
            }
            return true;
        }
    </script> -->
</body>

</html>