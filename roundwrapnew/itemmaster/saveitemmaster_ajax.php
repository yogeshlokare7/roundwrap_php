<?php

error_reporting(0);
include '../MysqlConnection.php';
if (isset($_POST["item_id"]) && trim($_POST["item_id"]) != "") {
    $item_id = $_POST["item_id"];
    unset($_POST["item_id"]);
    if ($_FILES["pic"]["name"] != "") {
        $imagepath = MysqlConnection::uploadFile($_FILES["pic"], "../itemimage/");
        $_POST["itempic"] = trim($imagepath, "../");
    }
    $insert = MysqlConnection::edit("item_master", $_POST, " item_id = " . $item_id);
} else {
    echo $insert = MysqlConnection::insert("item_master", $_POST);
}
header("location:../index.php?pagename=manage_itemmaster&status=active");
