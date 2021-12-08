<?php
require_once('../../database/dbhelper.php');

$id = $create_at = $update_at = $name = '';

if (isset($_POST['btn_execute'])) {
    $title = getPost('title');
    $category_id = getPost('category_id');
    $price = getPost('price');
    $discount = getPost('discount');
    $thumbnail = getPost('thumbnail');
    $content = getPost('content');

    $create_at = $update_at = date('Y-m-d h:i:s');

    $sql = "INSERT INTO `product`(`category_id`, `title`, `price`, `discount`, `thumbnail`, 
    `description`, `created_at`, `update_at`, `deleted`) VALUES ('$category_id', '$title', '$price', 
   ' $discount', '$thumbnail', '$content', '$create_at', '$update_at', '0')";
    execute($sql);
    header('location: index.php');
    die();

    // $id = getPost('id');
    // if ($id == '') {
    //     $create_at = $update_at = date('Y-m-d h:i:s');
    //     $sql = "INSERT INTO `category`(`name`, `create_at`, `update_at`) VALUES ('$name','$create_at','$update_at')";
    //     execute($sql);
    //     header('location: index.php');
    //     die();
    // } else {
    //     $create_at = $update_at = date('Y-m-d h:i:s');
    //     $sql = "UPDATE `category` SET `name`='$name',`create_at`='$create_at',
    //     `update_at`='$update_at' WHERE id = $id";
    //     execute($sql);
    //     header('location: index.php');
    //     die();
    // }
}

// $id = getGet('id');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$sql = "SELECT * FROM product WHERE id = '$id'";

$result = executeSelect($sql, true);
if (!empty($result)) {
    $title = $result['title'];
    $category_id = $result['category_id'];
    $price = $result['price'];
    $discount = $result['discount'];
    $thumbnail = $result['thumbnail'];
    $content = $result['description'];
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
            <a class="nav-link" href="../category/">Quản lý Danh mục</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php">Quản lý Sản phẩm</a>
        </li>

    </ul>
    <div class="container">
        <div class="panel panel-primary" style="width: 900px; margin:auto;">
            <div class="panel-heading">
                <h2 class="text-center">Thêm/sửa Danh mục Sản phẩm</h2>
            </div>
            <form action="" method="post">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="usr">Tên Sản phẩm:</label>
                        <input type="text" name="id" id="id" value="<?= $id ?>">
                        <input name="title" value="<?= $title ?>" required="true" type="text" class="form-control" id="usr">
                    </div>
                    <div class="form-group">
                        <label for="usr">Danh mục sản phẩm:</label>
                        <select name="category_id" id="id_category" class="form-control">
                            <option value="">--Chọn--</option>
                            <?php
                            $sql = "SELECT * FROM category where id = '$category_id'";
                            $result = executeSelect($sql);
                            foreach ($result as $list) {
                                echo '
                                     <option value="' . $list['id'] . '">' . $list['name'] . '</option>';
                            }
                            ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="usr">Giá Bán:</label>
                        <input name="price" value="<?= $price ?>" required="true" type="number" class="form-control" id="usr">
                    </div>
                    <div class="form-group">
                        <label for="usr">Giảm giá:</label>
                        <input name="discount" value="<?= $discount ?>" type="number" class="form-control" id="usr">
                    </div>
                    <div class="form-group">
                        <label for="usr">Ảnh</label>
                        <input name="thumbnail" value="<?= $thumbnail ?>" type="text" class="form-control" id="usr">
                    </div>

                    <div class="form-group">
                        <label for="content">Nội dung:</label>
                        <textarea class="form-control" name="content" id="" rows="10"><?= $content ?></textarea>

                    </div>

                    <button class="btn btn-success" name="btn_execute"><?php if ($id != 0) {
                                                                            echo 'Sửa';
                                                                        } else echo 'Thêm'; ?></button>
                </div>
            </form>
        </div>
</body>

</html>