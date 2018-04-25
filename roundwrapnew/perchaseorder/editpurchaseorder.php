<?php
include '../MysqlConnection.php';


$poid = filter_input(INPUT_POST, "purchaseorderid");
$purchaseorder = editPurchaseOrder($poid);
editItems($_POST, $poid);
updateSupplierBalance($purchaseorder["total"], $poid);
header("location:../index.php?pagename=manage_perchaseorder");

function editPurchaseOrder($poid) {
    $purchase_order = array();
    $purchase_order["shipping_address"] = $shipping = filter_input(INPUT_POST, "shipping");
    $purchase_order["billing_address"] = $billing = filter_input(INPUT_POST, "billing");
    $purchase_order["remark"] = $remark = filter_input(INPUT_POST, "remark");
    $purchase_order["ship_via"] = $shipvia = filter_input(INPUT_POST, "ship_via");
    $purchase_order["sub_total"] = $finaltotal = filter_input(INPUT_POST, "finaltotal");
    $purchase_order["discount"] = $discount = filter_input(INPUT_POST, "discount");
    $purchase_order["total"] = $nettotal = $purchase_order["sub_total"] - $purchase_order["discount"];
    $purchase_order["totalTax"] = 0.0;
    MysqlConnection::edit("purchase_order", $purchase_order, " id = $poid ");
    return $purchase_order;
}

function editItems($itemsarray, $poid) {
    MysqlConnection::delete("DELETE FROM purchase_item WHERE po_id = $poid ");
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

function updateSupplierBalance($total, $poid) {
    $vendorid = MysqlConnection::fetchCustom("SELECT supplier_id FROM purchase_order WHERE id = $poid");
    $supplierid = $vendorid[0]["supplier_id"];
    $selectbal = "SELECT `supp_balance` as supp_balance  FROM `supplier_master` where `supp_id` = " . $supplierid;
    $balancedetails = MysqlConnection::fetchCustom($selectbal);
    $oldbalance = $balancedetails[0]["supp_balance"];
    $currentbalance = $total - $oldbalance;
    $newbalance = $oldbalance + $currentbalance;
    MysqlConnection::delete("UPDATE `supplier_master` SET `supp_balance` = '$newbalance' WHERE `supp_id` = " . $supplierid);
}
