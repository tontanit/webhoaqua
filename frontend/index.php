<?php
require_once('../database/dbhelper.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
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
    < <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Quản lý Danh mục sản phẩm</h2>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên danh mục</th>

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
                       
                        <td><a href="cat_product.php?id=' . $list['id'] . '"> ' . $list['name'] . '</a></td>
                    </tr>';
                    }
                    ?>

                </tbody>
            </table>
        </div>
        </div>

</body>

</html>