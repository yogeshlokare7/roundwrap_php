<?php

error_reporting(0);
include '../MysqlConnection.php';
$insert = MysqlConnection::insert("generic_entry", $_POST);

$_POST["discount"] = 0;
$_POST["active"] = 'Y';
$_POST["isdelete"] = 0;

$sqlfindlast = "SELECT * FROM generic_entry where type = 'paymentterm' ORDER BY id DESC LIMIT 0,1;";
$sqlfetch = MysqlConnection::fetchCustom($sqlfindlast);
$option = "";
foreach ($sqlfetch as $key => $value) {
    $option.="<option selected='selected' value='" . $value["id"] . "'>" . $value["code"] . " - " . $value["name"] . "</option>";
}
echo $option;

