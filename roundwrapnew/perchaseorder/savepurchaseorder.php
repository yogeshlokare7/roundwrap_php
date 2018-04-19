<?php
include '../MysqlConnection.php';
$purchase_order = array();

$purchase_order["purchaseOrderId"] = filter_input(INPUT_POST, "purchaseOrderId");;
$purchase_order["supplier_id"] = $suppid = filter_input(INPUT_POST, "suppid");
$purchase_order["shipping_address"] = $shipping = filter_input(INPUT_POST, "shipping");
$purchase_order["billing_address"] = $billing = filter_input(INPUT_POST, "billing");
$purchase_order["remark"] = $remark = filter_input(INPUT_POST, "remark");

$purchase_order["ship_via"] = $shipvia= filter_input(INPUT_POST, "ship_via");
$purchase_order["expected_date"] = $date = filter_input(INPUT_POST, "expected_date");

$purchase_order["expected_date"] = $purchasedate = filter_input(INPUT_POST, "purchasedate");
$purchase_order["added_by"] = $enterby = filter_input(INPUT_POST, "enterby");
$purchase_order["sub_total"] = $finaltotal = filter_input(INPUT_POST, "finaltotal");
$purchase_order["discount"] = $discount = filter_input(INPUT_POST, "discount");
$purchase_order["total"] = $nettotal = $purchase_order["sub_total"] - $purchase_order["discount"];

$purchase_order["totalTax"] = 0.0;

$poid = MysqlConnection::insert("purchase_order", $purchase_order);

$items = $_POST["items"];
for ($index = 0; $index < count($items); $index++) {
    $itemname = $_POST["items"][$index];
    $itemcount = $_POST["itemcount"][$index];
    if ($itemname != "" && $itemcount != "") {
        $purchase_items["po_id"] = $poid;
        $arritem = MysqlConnection::fetchCustom("SELECT item_id  FROM  `item_master`  WHERE  `item_code` =  '$itemname'");
        $purchase_items["item_id"] = $arritem[0]["item_id"];
        $purchase_items["qty"] = $itemcount;
        $purchase_items["rqty"] = 0;
        MysqlConnection::insert("purchase_item", $purchase_items);
    }
}
header("location:../index.php?pagename=manage_perchaseorder");
