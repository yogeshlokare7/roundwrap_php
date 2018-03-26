<?php

error_reporting(0);
include '../MysqlConnection.php';
$insert = MysqlConnection::insert("user_master", $_POST);
