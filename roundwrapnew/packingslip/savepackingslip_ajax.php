<?php

error_reporting(0);
include '../MysqlConnection.php';
$insert = MysqlConnection::insert("packslip", $_POST);
