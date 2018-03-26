<?php

error_reporting(0);
include '../MysqlConnection.php';
$resultset = MysqlConnection::fetchCustom("SELECT * FROM generic_entry WHERE type = 'customer_type'");
echo json_encode($resultset);
