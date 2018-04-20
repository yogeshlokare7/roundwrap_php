

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
    tr,td{ vertical-align: middle; font-size: 12px;padding: 0px;margin: 0px;}
    table tr{
        /*height: 40px;*/
    }
</style>


<br/>
<div id="page-wrap" style="width: 80%">
    <h3 style="text-align: center;height: 40px;line-height: 45px;background-color: rgb(240,240,240)">PACKING SLIP</h3>
    <table style="width: 100%" >
        <tr style="vertical-align: top">
            <td colspan="2">
                <div id="identity" style="width: 300px;">
                    <p style="text-align: justify;line-height: 25px">
                        <?php echo $purchaseorder["billing_address"] ?>
                    </p>
                    <br/>
                    <br/>
                </div>
            </td>
            <td colspan="3" style="border-bottom: solid 1px;height: 20px;"></td>
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
                <div id="identity" style="width: 300px;">
                    <h4 style="border-bottom: solid 1px rgb(220,220,220);line-height: 25px;">Shipping Address</h4>
                    <p style="text-align: justify;line-height: 25px">
                        <?php echo $purchaseorder["shipping_address"] ?>
                    </p>
                </div>
            </td>
            <td>
                <div id="identity" style="width: 300px;">
                    <br/>
                    <h4 style="border-bottom: solid 1px rgb(220,220,220);line-height: 25px;">Billing Address</h4>
                    <p style="text-align: justify;line-height: 25px">
                        <?php echo $purchaseorder["billing_address"] ?>
                    </p>
                </div>
            </td>
            <td></td>
        </tr>
    </table>

    <table id="items" border="0">
        <tbody>
            <tr style="text-align: left;background-color: rgb(240,240,240);height: 30px;" >
                <th>Item</th>
                <th style="width: 40%">Description</th>
                <th  style="width: 10%">Unit Cost</th>
                <th  style="width: 10%">Quantity</th>
                <th style="width: 10%">Price</th>
                <th style="width: 10%">Amount</th>
            </tr>
            <tr><td colspan="6" style="border-top:   solid 1px rgb(220,220,220);height: 10px;"></td></tr>
            <?php
            foreach ($result as $key => $value) {
                $items = MysqlConnection::fetchCustom("SELECT * FROM  item_master WHERE item_id =  " . $value["item_id"]);
                ?>
                <tr class="item-row" style="border-bottom: solid 1px rgb(240,240,240);height: 35px;vertical-align: bottom">
                    <td>&nbsp;&nbsp;<?php echo $items[0]["item_code"] ?></td>
                    <td>&nbsp;&nbsp;<?php echo $items[0]["item_desc_purch"] ?></td>
                    <td>&nbsp;&nbsp;<?php echo $items[0]["unit"] ?></td>
                    <td >&nbsp;&nbsp;<?php echo $value["qty"] ?></td>
                    <td style="text-align:right"><?php echo $items[0]["purchase_rate"] ?>&nbsp;&nbsp;</td>
                    <td style="text-align: right"><?php echo ($items[0]["purchase_rate"] * $value["qty"]) ?>&nbsp;&nbsp;</td>
                </tr>
            <?php } ?>
            <tr><td colspan="6" style="border-top:   solid 1px  rgb(220,220,220);height: 10px;"></td></tr>
            <tr  style="height: 35px;">
                <td colspan="4" > </td>
                <td colspan="" ><b>Subtotal</b></td>
                <td style="text-align: right"><?php echo $purchaseorder["sub_total"]; ?>&nbsp;&nbsp;</td>
            </tr>
            <tr style="height: 35px;">
                <td colspan="4" > </td>
                <td style="text-align: left"><b>Discount</b></td>
                <td style="text-align: right"><?php echo $purchaseorder["discount"]; ?>&nbsp;&nbsp;</td>
            </tr>
            <tr style="height: 35px;">
                <td colspan="4" > </td>
                <td style="text-align: left"><b>Total</b></td>
                <td style="text-align: right"><?php echo $purchaseorder["total"]; ?>&nbsp;&nbsp;</td>
            </tr>
        </tbody>
    </table>
    <div id="terms">
        <h5>Terms</h5>
        <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
    </div>
</div>
