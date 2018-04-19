<?php

error_reporting(0);
include '../MysqlConnection.php';

$salesorderdetails = $_POST;
unset($salesorderdetails["items"]);
unset($salesorderdetails["itemcount"]);
unset($salesorderdetails["salesdate"]);
unset($salesorderdetails["onhand"]);
$salesorderdetails["isOpen"] = "Y";
$salesorderdetails["deleteNote"] = "";
$salesorderdetails["discount"] = $salesorderdetails["discount"] == "" ? "0.00" : $salesorderdetails["discount"];
$salesorderdetails["total"] = $salesorderdetails["sub_total"] - $salesorderdetails["discount"];
$insertid = MysqlConnection::insert("sales_order", $salesorderdetails);
for ($index = 0; $index <= count($_POST["items"]); $index++) {
    $itemcode = $_POST["items"][$index];
    $itemcount = $_POST["itemcount"][$index];
    if ($itemcode != "" && $itemcount != "") {
        $itemsfromcode = MysqlConnection::fetchCustom("SELECT item_id FROM `item_master` WHERE item_code = '$itemcode' ");
        $arraysalesitems = array();
        $arraysalesitems["item_id"] = $itemsfromcode[0]["item_id"];
        $arraysalesitems["so_id"] = $insertid;
        $arraysalesitems["qty"] = $itemcount;
        $arraysalesitems["rQty"] = 0;
        MysqlConnection::insert("sales_item", $arraysalesitems);
    }
}


$selectbal = "SELECT `balance` as balance  FROM `customer_master` where `id` = " . $salesorderdetails["customer_id"];
$balancedetails = MysqlConnection::fetchCustom($selectbal);
$balance = $balancedetails[0]["balance"] + $salesorderdetails["total"];
MysqlConnection::delete("UPDATE `customer_master` SET `balance` = '$balance' WHERE `id` = " . $salesorderdetails["customer_id"]);
header("location:../index.php?pagename=manage_salesorder");
