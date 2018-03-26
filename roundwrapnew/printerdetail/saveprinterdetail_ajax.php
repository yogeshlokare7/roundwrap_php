<?php

error_reporting(0);
include '../MysqlConnection.php';
$insert = MysqlConnection::insert("tbl_printer", $_POST);
