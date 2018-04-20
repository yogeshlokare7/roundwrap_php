

<link rel="stylesheet" href="../css/styleinvoice11.css">

<?php
include '../MysqlConnection.php';
$purchaseid = filter_input(INPUT_GET, "purchaseorderid");
$result = MysqlConnection::fetchCustom("SELECT * , "
                . "( SELECT companyname FROM supplier_master WHERE supp_id = po.`supplier_id` ) AS companyname FROM purchase_order po, purchase_item pi WHERE po.id = pi.po_id AND pi.po_id =$purchaseid");
$purchaseorder = $result[0];
?>
<style>
    input,textarea,select,date{ width: 90%; }
    .control-label{ margin-left: 10px; }
    *{
        padding: 0px;
        margin: 0px;
        font-size: 12px;
    }
</style>


<br/>
<div id="page-wrap" style="width: 80%">
    <h3 style="text-align: center;height: 40px;line-height: 45px;background-color: rgb(240,240,240);border: solid 1px rgb(200,200,200);margin-bottom: -1px;">PACKING SLIP</h3>
    <table style="width: 100%" border="0">
        <tr style="vertical-align: top">
            <td colspan="2" style="width: 70%">
                <div id="identity" style="width: 80%">
                    <p style="text-align: justify;line-height: 20px">
                        <?php echo $purchaseorder["billing_address"] ?>
                    </p>
                    <br/>
                    <br/>
                </div>
            </td>
            <td>
                <div id="customer">
                    <table id="meta">
                        <tbody>
                            <tr>
                                <th class="meta-head">Invoice #</th>
                                <td><?php echo $purchaseorder["purchaseOrderId"] ?></td>
                            </tr>
                            <tr>
                                <th class="meta-head">Date</th>
                                <td><?php echo date("Y-m-d") ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
        <tr>
            <td >
                <div id="identity" style="width: 100%">
                    <h4 style="border-bottom: solid 1px rgb(220,220,220);line-height: 20px;">Shipping Address</h4>
                    <p style="text-align: justify;line-height: 25px">
                        <?php echo $purchaseorder["shipping_address"] ?>
                    </p>
                </div>
            </td>
            <td>
                <div id="identity" style="width: 100%">
                    <h4 style="border-bottom: solid 1px rgb(220,220,220);line-height: 20px;">Billing Address</h4>
                    <p style="text-align: justify;line-height: 25px">
                        <?php echo $purchaseorder["billing_address"] ?>
                    </p>
                </div>
            </td>
            <td ></td>
        </tr>
        <tr>
            <td colspan="3">
                <table id="items" style="margin-top: 0px;" border="1">
                    <tbody>
                        <tr style="text-align: left;background-color: rgb(240,240,240);height: 30px;" >
                            <th style="width: 25%">PO</th>
                            <th style="width: 25%">SHIP.DATE</th>
                            <th >SHIP.VIA</th>
                            <th style="width: 30%">REP</th>
                        </tr>
                        <?php
                        foreach ($result as $key => $value) {
                            $userarray = MysqlConnection::fetchCustom("SELECT  `firstName`, `lastName`  FROM  `user_master` WHERE user_id = " . $value["added_by"]);
                            ?>
                            <tr style="height: 30px" >
                                <td ><?php echo $purchaseorder["purchaseOrderId"] ?></td>
                                <td ><?php echo $value["expected_date"] ?>&nbsp;&nbsp;</td>
                                <td ><?php echo $purchaseorder["ship_via"] ?></td>
                                <td ><?php echo implode(" ", $userarray[0]) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <table id="items" style="margin: 0px;">
                    <tbody>
                        <tr style="text-align: left;background-color: rgb(240,240,240);height: 30px;" >
                            <th style="width: 25%">Item</th>
                            <th >Description</th>
                            <th  style="width: 15%">Unit Cost</th>
                            <th  style="width: 15%">Quantity</th>
                        </tr>
                        <?php
                        foreach ($result as $key => $value) {
                            $items = MysqlConnection::fetchCustom("SELECT * FROM  item_master WHERE item_id =  " . $value["item_id"]);
                            ?>
                            <tr class="item-row" >
                                <td>&nbsp;&nbsp;<?php echo $items[0]["item_code"] ?></td>
                                <td>&nbsp;&nbsp;<?php echo $items[0]["item_desc_purch"] ?></td>
                                <td>&nbsp;&nbsp;<?php echo $items[0]["unit"] ?></td>
                                <td >&nbsp;&nbsp;<?php echo $value["qty"] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>


    <div id="terms">
    </div>
</div>
