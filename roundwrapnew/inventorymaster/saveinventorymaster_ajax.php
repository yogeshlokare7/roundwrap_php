<?php

error_reporting(0);
include '../MysqlConnection.php';
$insert = MysqlConnection::insert("item_master", $_POST);
