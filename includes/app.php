<?php

$database_info = include __DIR__."/../config/database.php";
$connect = mysqli_connect(
    $database_info['servername'],
    $database_info['username'],
    $database_info['password'],
    $database_info['database'],
    $database_info['port']
);


if(!$connect){
    die("Connection faild ".mysqli_connect_error());
}
include __DIR__."/helper.php";

mysqli_close($connect);