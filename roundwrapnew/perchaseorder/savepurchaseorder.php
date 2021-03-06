<?php

include '../MysqlConnection.php';

$purchase_order = getPostedData();
$poid = MysqlConnection::insert("purchase_order", $purchase_order);
savePurchaseItems($_POST, $poid);
updateVendorBalance($purchase_order["total"], $purchase_order["supplier_id"]);

function getPostedData() {
    $purchase_order = array();
    $purchase_order["purchaseOrderId"] = filter_input(INPUT_POST, "purchaseOrderId");
    $purchase_order["supplier_id"] = $suppid = filter_input(INPUT_POST, "suppid");
    $purchase_order["shipping_address"] = $shipping = filter_input(INPUT_POST, "shipping");
    $purchase_order["billing_address"] = $billing = filter_input(INPUT_POST, "billing");
    $purchase_order["remark"] = $remark = filter_input(INPUT_POST, "remark");
    $purchase_order["ship_via"] = $shipvia = filter_input(INPUT_POST, "ship_via");
    $purchase_order["expected_date"] = $date = filter_input(INPUT_POST, "expected_date");
    $purchase_order["purchasedate"] = $purchasedate = filter_input(INPUT_POST, "purchasedate");
    $purchase_order["added_by"] = $enterby = $_SESSION["user"]["user_id"];
    $purchase_order["sub_total"] = $finaltotal = filter_input(INPUT_POST, "finaltotal");
    $discount = filter_input(INPUT_POST, "discount");
    $purchase_order["discount"] = $discount == "" ? "0.00" : $discount;
    $purchase_order["total"] = $nettotal = $purchase_order["sub_total"] - $purchase_order["discount"];
    $purchase_order["totalTax"] = 0.0;
    return $purchase_order;
}

function savePurchaseItems($itemsarray, $poid) {
    $items = $itemsarray["items"];
    for ($index = 0; $index < count($items); $index++) {
        $itemname = explode("__", $itemsarray["items"][$index]);
        $itemcode = trim($itemname[0]);
        $itemcount = $itemsarray["itemcount"][$index];
        if ($itemcode != "" && $itemcount != "") {
            $purchase_items["po_id"] = $poid;
            $arritem = MysqlConnection::fetchCustom("SELECT item_id  FROM  `item_master`  WHERE  `item_code` =  '$itemcode'");
            $purchase_items["item_id"] = $arritem[0]["item_id"];
            $purchase_items["qty"] = $itemcount;
            $purchase_items["rqty"] = 0;
            MysqlConnection::insert("purchase_item", $purchase_items);
        }
    }
}


function updateVendorBalance($total, $supplierid) {
    $selectbal = "SELECT `supp_balance` as supp_balance  FROM `supplier_master` where `supp_id` = " . $supplierid;
    $balancedetails = MysqlConnection::fetchCustom($selectbal);
    $balance = $balancedetails[0]["supp_balance"] + $total;
    MysqlConnection::delete("UPDATE `supplier_master` SET `supp_balance` = '$balance' WHERE `supp_id` = " . $supplierid);
}

header("location:../index.php?pagename=manage_perchaseorder");
