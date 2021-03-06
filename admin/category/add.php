<?php
require_once('../../database/dbhelper.php');

$id = $create_at = $update_at = $name = '';

if (isset($_POST['btn_execute'])) {
    $name = getPost('name');
    $id = getPost('id');
    if ($id == '') {
        $create_at = $update_at = date('Y-m-d h:i:s');
        $sql = "INSERT INTO `category`(`name`, `create_at`, `update_at`) VALUES ('$name','$create_at','$update_at')";
        execute($sql);
        header('location: index.php');
        die();
    } else {
        $create_at = $update_at = date('Y-m-d h:i:s');
        $sql = "UPDATE `category` SET `name`='$name',`create_at`='$create_at',
        `update_at`='$update_at' WHERE id = $id";
        execute($sql);
        header('location: index.php');
        die();
    }
}

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
            <a class="nav-link" href="index.php">Quản lý Danh mục</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../product/">Quản lý Sản phẩm</a>
        </li>

    </ul>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Thêm/sửa Danh mục Sản phẩm</h2>
            </div>
            <form action="" method="post">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="usr">Tên danh muc:</label>
                        <input type="text" name="id" id="id" value="<?= $id ?>" hidden="true">
                        <input name="name" value="<?= $name ?>" required="true" type="text" class="form-control" id="usr">
                    </div>

                    <button class="btn btn-success" name="btn_execute"><?php if ($id != 0) {
                                                                            echo 'Sửa';
                                                                        } else echo 'Thêm'; ?></button>
                </div>
            </form>
        </div>
</body>

</html>