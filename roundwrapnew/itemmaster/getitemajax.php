<?php

include '../MysqlConnection.php';
$itemcode = trim(filter_input(INPUT_POST, "item_code"));
$arritem = MysqlConnection::fetchCustom("SELECT *  FROM  `item_master`  WHERE  `item_code` =  '$itemcode'");
echo json_encode($arritem[0]);
