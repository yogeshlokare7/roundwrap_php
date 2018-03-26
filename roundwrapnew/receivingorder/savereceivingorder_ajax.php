<?php

error_reporting(0);
include '../MysqlConnection.php';
$insert = MysqlConnection::insert("supplier_packing_slip", $_POST);
