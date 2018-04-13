<?php

error_reporting(0);
include '../MysqlConnection.php';
$insert = MysqlConnection::insert("sales_order", $_POST);
