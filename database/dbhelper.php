<?php
define('host', 'localhost');
define('user', 'root');
define('password', '');
define('database', 'webbanhang2');

function execute($sql)
{
    $conn = mysqli_connect(host, user, password, database);
    mysqli_set_charset($conn, 'utf8');

    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function executeSelect($sql, $sqlSingle = false)
{
    $conn = mysqli_connect(host, user, password, database);
    mysqli_set_charset($conn, 'utf8');
    $qr = mysqli_query($conn, $sql);

    if ($sqlSingle == true) {
        $data = '';
        $data = mysqli_fetch_array($qr, 1);
    } else {
        $data = [];
        while ($result = mysqli_fetch_array($qr, 1)) {
            $data[] = $result;
        }
    }

    mysqli_close($conn);
    return $data;
}

function getPost($key)
{
    $value = '';
    if (isset($_POST[$key])) {
        $value = $_POST[$key];
    }
    return $value;
}

function getGet($key)
{
    $value = '';
    if (isset($_GET[$key])) {
        $value = $_GET[$key];
    }
    return $value;
}
