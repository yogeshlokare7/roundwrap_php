<?php

error_reporting(0);
include '../MysqlConnection.php';
print_r($_POST);
$insert = MysqlConnection::insert("generic_entry", $_POST);

echo $sqlfindlast = "SELECT * FROM generic_entry where type = 'customer_type' ORDER BY id DESC LIMIT 0,1;";
$sqlfetch = MysqlConnection::fetchCustom($sqlfindlast);
$option = "";
foreach ($sqlfetch as $key => $value) {
    $option.="<option>" . $value["name"] . "</option>";
}
