<?php

include '../MysqlConnection.php';
$itemcodepost = trim(filter_input(INPUT_POST, "item_code"));
$itemcode = explode("__", $itemcodepost);
$itemcode = trim($itemcode[0]);
$arritem = MysqlConnection::fetchCustom("SELECT *  FROM  `item_master`  WHERE  `item_code` =  '$itemcode'");
echo json_encode($arritem[0]);
