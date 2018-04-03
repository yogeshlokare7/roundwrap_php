<?php

error_reporting(0);
include '../MysqlConnection.php';
echo "<pre>";
print_r($_POST);
echo "</pre>";
$insert = MysqlConnection::insert("item_master", $_POST);
