<?php

error_reporting(0);
include '../MysqlConnection.php';
$resultset = MysqlConnection::fetchCustom("SELECT * FROM generic_entry WHERE type = 'customer_type' ORDER BY id DESC LIMIT 0,1");
echo json_encode($resultset[0]);
