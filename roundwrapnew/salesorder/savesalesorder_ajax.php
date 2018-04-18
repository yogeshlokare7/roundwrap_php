<?php

error_reporting(0);
include '../MysqlConnection.php';

$salesorderdetails = $_POST;
unset($salesorderdetails["items"]);
unset($salesorderdetails["itemcount"]);
unset($salesorderdetails["salesdate"]);
$salesorderdetails["total"] = $salesorderdetails["sub_total"] - $salesorderdetails["discount"];
MysqlConnection::insert("sales_order", $salesorderdetails);

header("location:../index.php?pagename=manage_createorder");