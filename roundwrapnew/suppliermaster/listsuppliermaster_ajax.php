<?php

error_reporting(0);
include '../MysqlConnection.php';
$resultset = MysqlConnection::fetchCustom("SELECT * FROM supplier_master ORDER BY id DESC LIMIT 0,1");
echo json_encode($resultset[0]);
