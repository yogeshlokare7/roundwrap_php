<?php

include '../MysqlConnection.php';

$salesorderid = $_POST["salesorderid"];
for ($index = 0; $index < count($_POST["salesitems"]); $index++) {
    $salesitems = $_POST["salesitems"][$index];
    $itemsid = $_POST["itemsid"][$index];
    if ($salesitems != "") {
        $oldreceived = MysqlConnection::fetchCustom("SELECT * FROM `sales_item` where item_id = $itemsid AND so_id = $salesorderid  ");
        $rQty = $oldreceived[0]["rQty"];
        $currentqty = $rQty + $salesitems;
        MysqlConnection::delete("UPDATE sales_item SET rQty = $currentqty WHERE item_id = $itemsid AND so_id = $salesorderid ");


        $oritemsstock = MysqlConnection::fetchCustom("SELECT onhand FROM `item_master` where item_id = $itemsid ");
        $updatedonhand = $oritemsstock[0]["onhand"] - $salesitems;
        MysqlConnection::delete("UPDATE item_master SET onhand = $updatedonhand WHERE item_id = $itemsid ");
    }
}
$sumqty = MysqlConnection::fetchCustom("SELECT SUM(`qty`) as qty  FROM  `sales_item` WHERE so_id =$salesorderid ");
$sumrqty = MysqlConnection::fetchCustom("SELECT SUM(`rqty`) as rqty  FROM  `sales_item` WHERE so_id =$salesorderid ");
if ($sumqty[0]["qty"] == $sumrqty[0]["rqty"]) {
    MysqlConnection::delete("UPDATE sales_order SET isOpen = 'N'  where  id = $salesorderid ");
}

