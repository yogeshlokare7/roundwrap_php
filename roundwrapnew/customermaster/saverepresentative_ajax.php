<?php

error_reporting(0);
include '../MysqlConnection.php';
$insert = MysqlConnection::insert("generic_entry", $_POST);

$sqlfindlast = "SELECT * FROM generic_entry where type = 'representative' ORDER BY id DESC LIMIT 0,1;";
$sqlfetch = MysqlConnection::fetchCustom($sqlfindlast);
$option = "";
foreach ($sqlfetch as $key => $value) {
   $option.="<option selected='selected' value='" . $value["id"] . "'>" . $value["name"] . " - " . $value["description"] . "</option>";
}
echo $option;
