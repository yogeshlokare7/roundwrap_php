<?php
error_reporting(0);
include '../MysqlConnection.php';

$poitemid = $_POST["poitemid"];
for ($index = 0; $index < count($poitemid); $index++) {
    $itemid = $_POST["poitemid"][$index];
    $received = $_POST["received"][$index];
    $purchaseorderid = $_POST["purchaseorderid"];
    if ($itemid != "" && $received != "") {
        $sqlold = MysqlConnection::fetchCustom("SELECT rqty FROM  `purchase_item` where  item_id = $itemid AND po_id = $purchaseorderid ");
        $rqty = $sqlold[0]["rqty"] + $received;
        MysqlConnection::delete("UPDATE purchase_item SET rqty = $rqty  where  item_id = $itemid AND po_id = $purchaseorderid  ");

        $originalitem = MysqlConnection::fetchCustom("SELECT onhand FROM `item_master` where  item_id = $itemid ");
        $onhand = $originalitem[0]["onhand"] + $received;
        MysqlConnection::delete("UPDATE item_master SET onhand = $onhand  where  item_id = $itemid ");
    }
}
$sumqty = MysqlConnection::fetchCustom("SELECT SUM(`qty`) as qty  FROM  `purchase_item` WHERE po_id =$purchaseorderid ");
$sumrqty = MysqlConnection::fetchCustom("SELECT SUM(`rqty`) as rqty  FROM  `purchase_item` WHERE po_id =$purchaseorderid ");
if ($sumqty[0]["qty"] == $sumrqty[0]["rqty"]) {
    MysqlConnection::delete("UPDATE purchase_order SET isOpen = 'N'  where  id = $purchaseorderid ");
}

header("location:../index.php?pagename=manage_perchaseorder");
