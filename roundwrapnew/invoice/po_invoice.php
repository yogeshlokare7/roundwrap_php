

<link rel="stylesheet" href="../css/styleinvoice11.css">

<?php
include '../MysqlConnection.php';
$purchaseid = filter_input(INPUT_GET, "purchaseorderid");
$result = MysqlConnection::fetchCustom("SELECT * , "
                . "( SELECT companyname FROM supplier_master WHERE supp_id = po.`supplier_id` ) AS companyname FROM purchase_order po, purchase_item pi WHERE po.id = pi.po_id AND pi.po_id =$purchaseid");
$purchaseorder = $result[0];

//echo "<pre>";
//   print_r($purchaseorder);
//echo "</pre>";
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
<div id="page-wrap" style="width: 95%">
    <!--    <h3 style="text-align: center;height: 40px;line-height: 45px;background-color: rgb(240,240,240);border: solid 1px rgb(200,200,200);margin-bottom: -1px;">Purchase Order</h3>-->
    <table style="width: 100%" border="1">

        <tr style="vertical-align: top">
            <td></td>
            <td  style="width: 40%">
                <div id="identity" style="width: 80%">
                    <p style="text-align: justify;line-height: 20px">
                        <?php echo $purchaseorder["billing_address"] ?>
                    </p>
                    
                </div>
            </td>
            <td></td>
        </tr>
    </table>
    <br/>
    <table style="width: 100%" border="0" >
        <tr style="text-align: left;background-color: rgb(240,240,240);height: 30px;" >
            <td  >PO No:&nbsp;&nbsp;<?php echo $purchaseorder["purchaseOrderId"] ?></td>
            <td style="width: 68%; text-align:center;"><b>PURCHASE ORDER</b></td>
            <td style=" text-align:right;">Date:&nbsp;&nbsp;<?php echo $purchaseorder["purchasedate"] ?></td>
        </tr>
    </table>
    <table style="width: 100%" border="1">
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
            
        </tr>
        <tr>
            <td colspan="3">
                <table id="items" style="margin-top: 0px;" border="1">
                    <tbody>
                        <tr style="text-align: left;background-color: rgb(240,240,240);height: 30px;" >
                            <th style="width: 25%">SHIP.DATE</th>
                            <th >SHIP.VIA</th>
                            <th style="width: 30%">REP</th>
                        </tr>
                        <tr style="height: 30px" >
                            <td ><?php echo $purchaseorder["expected_date"] ?>&nbsp;&nbsp;</td>
                            <td ><?php echo $purchaseorder["ship_via"] ?></td>
                            <td ><?php echo $purchaseorder["supplier_id"] ?></td>
                        </tr>

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
                            <th  style="width: 10%">Unit Cost</th>
                            <th  style="width: 10%">Quantity</th>
                            <th  style="width: 10%">Price</th>
                            <th >Amount</th>
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
                                <td style="text-align:right"><?php echo $items[0]["purchase_rate"] ?>&nbsp;&nbsp;</td>
                                <td style="text-align: right"><?php echo ($items[0]["purchase_rate"] * $value["qty"]) ?>&nbsp;&nbsp;</td>
                            </tr>
                        <?php } ?>
                        <tr  style="height: 35px;">
                            <td colspan="4" > </td>
                            <td  ><b>Subtotal</b></td>
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
            </td>
        </tr>
    </table>


    <div id="terms">
    </div>
</div>
