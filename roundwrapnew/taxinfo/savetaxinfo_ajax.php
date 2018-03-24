<?php

error_reporting(0);
include '../MysqlConnection.php';
$insert = MysqlConnection::insert("taxinfo_table", $_POST);
