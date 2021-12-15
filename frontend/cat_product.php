<?php
require_once('../database/dbhelper.php');

$name = '';
$id = getGet('id');
$sql = "SELECT * FROM category WHERE id='$id'";
$result = executeSelect($sql, true);
if (!empty($result)) {
    $name = $result['name'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Category - <?= $name ?></title>
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

    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 style="margin-top: 30px" class="text-center"><?= $name ?></h2>
            </div>
            <a href="../admin/product/add.php"><button style="margin-bottom: 5px;" type="button" class="btn btn-success">Thêm Sản phẩm</button></a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Hình Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá Bán</th>
                        <th>Danh Mục</th>
                        <th>Ngày cập nhật</th>
                        <th style="width: 35px;"></th>
                        <th style="width: 35px;"></th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    $sql = "SELECT product.*, category.name
                    FROM product LEFT JOIN category ON product.category_id = category.id
                    WHERE category.id = '$id' ";
                    $result = executeSelect($sql);
                    $index = 1;

                    foreach ($result as $list) {
                        echo '  <tr>
                        <td>' . $index++ . '</td>
                        <td><img src="' . $list['thumbnail'] . '" style="max-width:100px"></td>
                        <td>' . $list['title'] . '</td>
                        <td>' . number_format($list['price']) . '</td>
                        <td>' . $list['name'] . '</td>
                        <td>' . $list['update_at'] . '</td>
                        <td><a href="add.php?id=' . $list['id'] . '"><button type="button" class="btn btn-warning">Sửa</button></a></td>
                        <td><button type="button" class="btn btn-danger" 
                        onclick="deleteProduct(' . $list['id'] . ')">Xoá</button></td>
                    </tr>';
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        function deleteProduct(id) {
            var option = confirm('Ban có chắc muốn xóa Sản phẩm này không?');
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