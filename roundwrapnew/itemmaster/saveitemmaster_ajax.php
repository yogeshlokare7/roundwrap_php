<?php

error_reporting(0);
include '../MysqlConnection.php';
echo "<pre>";
print_r($_POST);
echo "</pre>";
if (isset($_POST["item_id"]) && trim($_POST["item_id"]) != "") {
    $item_id = $_POST["item_id"];
    unset($_POST["item_id"]);
    $insert = MysqlConnection::edit("item_master", $_POST, " item_id = " . $item_id);
} else {
    $insert = MysqlConnection::insert("item_master", $_POST);
}
//header("location:index.php?pagename=manage_itemmaster");
