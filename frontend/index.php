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

                    <!-- Code phan trang -->
                    <?php
                    $pages = getGet('pages');

                    if ($pages <= 0) {
                        $pages = 1;
                    }
                    $sotin1trang = 3;
                    $from = ($pages - 1) * $sotin1trang;
                    $sql = "SELECT * FROM category
                    LIMIT $from, $sotin1trang";
                    $result = executeSelect($sql);

                    foreach ($result as $list) {
                        echo '  <tr>
                        <td>' . ++$from . '</td>
                       
                        <td><a href="cat_product.php?id=' . $list['id'] . '"> ' . $list['name'] . '</a></td>
                    </tr>';
                    }
                    ?>

                </tbody>
            </table>
            <?php
            // Dem tong so recode trong bang category  
            $sql = "SELECT * FROM category";
            $row = executeSelect($sql);
            $num_row = count($row);
            $sum_pages = ceil($num_row / $sotin1trang);

            ?>
            <!-- Neu chi co 1 trang thi khong hien thi "phan trang" -->
            <?php
            if ($sum_pages > 1) {
            ?>
                <ul class="pagination">
                    <!-- Khong hien Previous -->
                    <?php
                    if ($pages > 1) {
                        echo '<li class="page-item"><a class="page-link" href="index.php?pages=' . ($pages - 1) . '">Previous</a></li>';
                    }
                    ?>


                    <?php
                    $avaiblePages = [1, $pages - 1, $pages + 1, $sum_pages];
                    $isFirst = $isLast = false;
                    for ($i = 1; $i <= $sum_pages; $i++) {
                        //Hien thi dau ... Neu co nhieu trang

                        if (!in_array($i, $avaiblePages)) {
                            if (!$isFirst && $pages > 3) {
                                echo '<li class="page-item"><a class="page-link" href="index.php?pages=' . ($pages - 2) . '">...</a></li>';
                                $isFirst = true;
                            }
                            if (!$isLast && $i > $pages) {
                                echo '<li class="page-item"><a class="page-link" href="index.php?pages=' . ($pages + 2) . '">...</a></li>';
                                $isLast = true;
                            }
                            continue;
                        }

                        if ($pages == $i) {
                            echo '<li class="page-item active"><a class="page-link" href="index.php?pages=' . $i . '">' . $i . '</a></li>';
                        } else echo '<li class="page-item"><a class="page-link" href="index.php?pages=' . $i . '">' . $i . '</a></li>';
                    }
                    ?>

                    <!-- Khong hien Next -->
                    <?php
                    if ($pages < $sum_pages) {
                        echo '<li class="page-item"><a class="page-link" href="index.php?pages=' . ($pages + 1) . '">Previous</a></li>';
                    }
                    ?>
                </ul>
            <?php } ?>
            <!-- End phan trang -->
        </div>
        </div>

</body>

</html>