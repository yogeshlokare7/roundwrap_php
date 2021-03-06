<style>
    table tbody {

    }
    table tr td{
        padding: 5px;
    }
</style>
<?php
$purchaseid = filter_input(INPUT_GET, "purchaseorderid");
$result = MysqlConnection::fetchCustom("SELECT * , (SELECT companyname FROM supplier_master WHERE supp_id = po.`supplier_id` ) AS companyname FROM purchase_order po, purchase_item pi WHERE po.id = pi.po_id AND pi.po_id =$purchaseid");
$podetails = $result[0];
$buildauto = buildauto(MysqlConnection::fetchCustom("SELECT item_id ,item_code,item_desc_purch, item_name FROM item_master;"));

$isOpen = $podetails["isOpen"];
if ($isOpen == "N") {
    $_SESSION["msg"] = "Can not edit closed purchase order !!!";
    header("location:index.php?pagename=view_perchaseorder&purchaseorderid=" . $purchaseid);
}
?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script>
    $(function() {
        var availableTags = [<?php echo $buildauto ?>];
        for (var index = 1; index <= 30; index++) {
            $("#tags" + index).autocomplete({source: availableTags});
        }
    });
</script>
<div id="content-header">
    <div id="breadcrumb"> 
        <a class="tip-bottom"><i class="icon-home"></i>HOME</a>
        <a class="tip-bottom"><i class="icon-home"></i>PURCHASE ORDER ENTRY</a>
    </div>
</div>
<style>
    input,textarea,select,date{ width: 90%; }
    .control-label{ margin-left: 10px; }
    tr,td{ vertical-align: middle; font-size: 12px;padding: 0px;margin: 0px;}
</style>
<form action="perchaseorder/editpurchaseorder.php" name="purchaseorder" method="post">
    <input type="hidden" name="purchaseorderid" value="<?php echo $purchaseid ?>">
    <div class="container-fluid" style="" >
        <div class="widget-box" style="width: 100%;border-bottom: solid 1px #CDCDCD;">
            <div class="widget-title">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab1">CREATE PURCHASE ORDER</a></li>
                </ul>
            </div>
            <br/>
            <table style="width: 100%">
                <tr>
                    <td>
                        <fieldset  class="well the-fieldset">
                            <table>
                                <tr>
                                    <td style="width: 10%"><label class="control-label"  class="control-label">SUPPLIER NAME&nbsp;:&nbsp</label></td>
                                    <td><input  type="text" name="companyname"  readonly="" placeholder="Supplier Name" value="<?php echo $podetails["companyname"] ?>" /></td>
                                    <td style="width: 10%"><label class="control-label">SHIP VIA&nbsp;:&nbsp</label></td>
                                    <td><input  type="text" name="ship_via" value="<?php echo $podetails["ship_via"] ?>" placeholder="" /></td>
                                    <td style="width: 10%"><label class="control-label">SHIP&nbsp;DATE&nbsp;:&nbsp</label></td>
                                    <td><input type="text" value="<?php echo  $podetails["expected_date"] ?>" readonly="" name="expected_date" ></td>
                                </tr>
                                <tr>
                                    <td ><label  class="control-label"  class="control-label">BILLING&nbsp;ADDRESS&nbsp;:&nbsp</label></td>
                                    <td><textarea style="line-height: 18px;" name="shipping"><?php echo $podetails["shipping_address"] ?></textarea></td>
                                    <td><label class="control-label">SHIPPING&nbsp;ADDRESS&nbsp;:&nbsp</label></td>
                                    <td><textarea style="line-height: 18px;" name="billing"><?php echo $podetails["billing_address"] ?></textarea></td>
                                    <td ><label class="control-label"><b>REMARK&nbsp;/&nbsp;NOTE&nbsp;:&nbsp</b></label></td>
                                    <td><textarea  style="line-height: 18px; color: red" name="remark"><?php echo $podetails["remark"] ?></textarea></td>
                                </tr>
                            </table>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="width: 70%;float: left">
                            <table class="table-bordered" style="width: 100%;border-collapse: collapse" border="1">
                                <tr style="border-bottom: solid 1px  #CDCDCD;background-color: rgb(250,250,250)">
                                    <td style="width: 25px;">#</td>
                                    <td style="width: 550px;">ITEM NAME</td>
                                    <td style="width: 80px;">UNIT</td>
                                    <td style="width: 80px;">PRICE</td>
                                    <td style="width: 80px;">QTY</td>
                                    <td>AMOUNT</td>
                                </tr>
                            </table>
                            <div style="overflow: auto;height: 232px;border-bottom: solid 1px  #CDCDCD;">
                                <table class="table-bordered" style="width: 100%;border-collapse: collapse" border="1">
                                    <?php
                                    $index = 1;
                                    foreach ($result as $key => $value) {
                                        $items = MysqlConnection::fetchCustom("SELECT * FROM  item_master WHERE item_id =  " . $value["item_id"]);
                                        ?>
                                        <tr id="<?php echo $index ?>" style="border-bottom: solid 1px  #CDCDCD;background-color: white">
                                            <td style="width: 25px">
                                                <a class="icon  icon-remove" onclick="clearValue('<?php echo $index ?>')"></a>
                                            </td>
                                            <td style="width: 550px;">
                                                <input type="text" name="items[]" value="<?php echo $items[0]["item_code"]." __ ".$items[0]["item_desc_purch"] ?>" id="tags<?php echo $index ?>" onfocusout="setDetails('<?php echo $index ?>')"  style="padding: 0px;margin: 0px;width: 100%">
                                            </td>
                                            <td style="width: 80px;"><div id="unit<?php echo $index ?>"><?php echo $items[0]["unit"] ?></div></td>
                                            <td style="width: 80px;"><div id="price<?php echo $index ?>"><?php echo $items[0]["purchase_rate"] ?></div></td>
                                            <td style="width: 80px;"><input type="text" name="itemcount[]" value="<?php echo $value["qty"] ?>" onfocusout="calculateAmount('<?php echo $index ?>')" id="amount<?php echo $index ?>" style="padding: 0px;margin: 0px;width: 100%"></td>
                                            <td ><div id="total<?php echo $index ?>"><?php echo $value["qty"] * $items[0]["purchase_rate"] ?></div></td>
                                        </tr>
                                        <?php
                                        $index++;
                                    }
                                    ?>
                                    <?php for ($index = count($result) + 1; $index <= (50 - count($result)); $index++) { ?>
                                        <tr id="<?php echo $index ?>" style="border-bottom: solid 1px  #CDCDCD;background-color: white">
                                            <td style="width: 25px">
                                                <a class="icon  icon-remove" onclick="clearValue('<?php echo $index ?>')"></a>
                                            </td>
                                            <td style="width: 550px;">
                                                <input type="text" name="items[]" id="tags<?php echo $index ?>" onfocusout="setDetails('<?php echo $index ?>')"  style="padding: 0px;margin: 0px;width: 100%">
                                            </td>
                                            <td style="width: 80px;"><div id="unit<?php echo $index ?>"></div></td>
                                            <td style="width: 80px;"><div id="price<?php echo $index ?>"></div></td>
                                            <td style="width: 80px;"><input type="text" name="itemcount[]" onfocusout="calculateAmount('<?php echo $index ?>')" id="amount<?php echo $index ?>" style="padding: 0px;margin: 0px;width: 100%"></td>
                                            <td ><div id="total<?php echo $index ?>"></div></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                        <div style="width: 28%;float: right">
                            <table class="table-bordered" style="width: 100%;border-collapse: collapse;background-color: white" border="1">
                                <tr style="font-weight: bold; color: red" >
                                    <td><b>PO Number</b></td>
                                    <td><input type="text" value="<?php echo $podetails["purchaseOrderId"] ?>"  readonly=""></td>
                                </tr>
                                <tr >
                                    <td><b>Order Date</b></td>
                                    <td><input type="text" value="<?php echo $podetails["purchasedate"] ?>" readonly=""></td>
                                </tr>
                                <tr >
                                    <td><b>Enter By</b></td>
                                    <td><input type="text" name="enterby" value="<?php echo $_SESSION["user"]["firstName"] . " " . $_SESSION["user"]["lastName"] ?>" readonly=""></td>
                                </tr>
                                <tr >
                                    <td><b>Total</b></td>
                                    <td><input type="text" id="finaltotal" onkeypress="return chkNumericKey(event)" value="<?php echo $podetails["sub_total"] ?>" name="finaltotal" readonly=""></td>
                                </tr>
                                <tr >
                                    <td><b>Discount</b></td>
                                    <td><input type="text" id="discount"  onkeypress="return chkNumericKey(event)" value="<?php echo $podetails["discount"] ?>" name="discount" onfocusout="discount()"  name="discount" ></td>
                                </tr>
                                <tr >
                                    <td><b>Net Total</b></td>
                                    <td><input type="text" id="nettotal" onkeypress="return chkNumericKey(event)" value="<?php echo $podetails["total"] ?>" name="nettotal" name="nettotal" readonly=""></td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="modal-footer "> 
        <a id="save" class="btn btn-primary" onclick=" createPurchaseOrder()">Save</a> 
        <a href="index.php?pagename=manage_perchaseorder" id="btnSubmitFullForm" class="btn btn-info">CANCEL</a>
    </div>
</form>
<script src="perchaseorder/purchasejs.js"></script>
<script>


            function createPurchaseOrder() {
                var x = document.getElementsByTagName("form");
                x[0].submit();
            }
</script>

<?php

function buildauto($itemarray) {
    $option = "";
    foreach ($itemarray as $value) {
        $option.="\"" . $value["item_code"]. " __ " . preg_replace('!\s+!', ' ', str_replace("\"", "", $value["item_desc_purch"]) ). "\",";
    }
    return $option;
}
?>