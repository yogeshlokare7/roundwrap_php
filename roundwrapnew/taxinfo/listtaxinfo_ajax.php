<?php

error_reporting(0);
include '../MysqlConnection.php';
$resultset = MysqlConnection::fetchCustom("SELECT * FROM taxinfo_table ORDER BY id DESC LIMIT 0,1");
echo json_encode($resultset[0]);
