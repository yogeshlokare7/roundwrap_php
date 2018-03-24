<?php

error_reporting(0);
include '../MysqlConnection.php';
$insert = MysqlConnection::insert("profile_master", $_POST);
