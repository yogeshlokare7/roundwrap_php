<?php
$sqlgetsupplier = "SELECT * FROM customer_master WHERE id = " . filter_input(INPUT_GET, "customerId");
$resultset = MysqlConnection::fetchCustom($sqlgetsupplier);
$customer = $resultset[0];
$salesorderbumberarray = MysqlConnection::fetchCustom("SELECT count(id) as counter FROM sales_order");
$sonumber = "SO" . (1000 + $salesorderbumberarray[0]["counter"]);

$sqlitemarray = MysqlConnection::fetchCustom("SELECT count(id) as counter FROM sales_order");
$itemarray = MysqlConnection::fetchCustom("SELECT * FROM item_master;");
$buildauto = buildauto(MysqlConnection::fetchCustom("SELECT item_id ,item_code,item_desc_purch, item_name FROM item_master;"));
$customerauto = buildCustomerrAutoComplete(MysqlConnection::fetchCustom("SELECT id,cust_companyname FROM `customer_master` WHERE status = 'Y' ORDER BY `cust_companyname` ASC"));
?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="salesorder/salesorderjs.js"></script>
<script>
    $(function() {
        var availableTags = [<?php echo $buildauto ?>];
        for (var index = 1; index <= 30; index++) {
            $("#tags" + index).autocomplete({source: availableTags});
        }
    });
    $(function() {
        var availableCustomer = [<?php echo $customerauto ?>];
        $("#companyname").autocomplete({source: availableCustomer});
    });
</script>
<div id="content-header">
    <div id="breadcrumb"> 
        <a class="tip-bottom"><i class="icon-home"></i>HOME</a>
        <a class="tip-bottom"><i class="icon-home"></i>SALES ORDER ENTRY</a>
    </div>
</div>
<style>
    input,textarea,select,date{ width: 90%; }
    .control-label{ margin-left: 10px; }
    tr,td{ vertical-align: middle; font-size: 12px;padding: 5px;margin: 5px;}
</style>
<form action="salesorder/savesalesorder_ajax.php" method="post" autocomplete="off">
    <input type="hidden" name="customer_id" id="customer_id" value="<?php echo filter_input(INPUT_GET, "customerId") ?>">
    <div class="container-fluid" style="" >
        <div class="widget-box" style="width: 100%;border-bottom: solid 1px #CDCDCD;">
            <div class="widget-title">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab1">CREATE SALES ORDER</a></li>
                </ul>
            </div>
            <br/>
            <table style="width: 100%">
                <tr>
                    <td>
                        <fieldset  class="well the-fieldset">
                            <table>
                                <tr>
                                    <td style="width: 10%"><label class="control-label"   class="control-label">CUSTOMER NAME&nbsp;:&nbsp</label></td>
                                    <td>
                                        <input  type="text" placeholder="Customer Name" autofocus="" onfocusout="searchCustomer()" required="" id="companyname" value="<?php echo $customer["cust_companyname"] ?>" />
                                        <div id="error" style="color: red"></div>
                                    </td>
                                    <td style="width: 10%"><label class="control-label">SHIP VIA&nbsp;:&nbsp</label></td>
                                    <td><input  type="text" placeholder="" name="shipvia"/></td>
                                    <td style="width: 10%"><label class="control-label">EXPECTED&nbsp;DELIVERY&nbsp;:&nbsp</label></td>
                                    <td><input type="text" name="expected_date" id="datepicker" ></td>
                                </tr>
                                <tr>
                                    <td ><label  class="control-label"  class="control-label">BILLING&nbsp;ADDRESS&nbsp;:&nbsp</label></td>
                                    <td><textarea style="line-height: 18px;" name="billTo_address" id="billTo_address"><?php echo $customer["billto"] ?></textarea></td>
                                    <td><label class="control-label">SHIPPING&nbsp;ADDRESS&nbsp;:&nbsp</label></td>
                                    <td><textarea style="line-height: 18px;" name="shipping_address" id="shipping_address"><?php echo $customer["shipto"] ?></textarea></td>
                                    <td ><label class="control-label"><b>REMARK&nbsp;/&nbsp;NOTE&nbsp;:&nbsp</b></label></td>
                                    <td><textarea  style="line-height: 18px; color: red" name="remark" value="" ></textarea></td>
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
                                    <td style="width: 80px;">ONHAND</td>
                                    <td style="width: 80px;">QTY</td>
                                    <td>AMOUNT</td>
                                </tr>
                            </table>
                            <div style="overflow: auto;height: 232px;border-bottom: solid 1px  #CDCDCD;">
                                <table class="table-bordered" style="width: 100%;border-collapse: collapse" border="1">
                                    <?php for ($index = 1; $index <= 50; $index++) { ?>
                                        <tr id="<?php echo $index ?>" style="border-bottom: solid 1px  #CDCDCD;background-color: white">
                                            <td style="width: 25px">
                                                <a class="icon  icon-remove" onclick="clearValue('<?php echo $index ?>')"></a>
                                            </td>
                                            <td style="width: 550px;">
                                                <input type="text" name="items[]" id="tags<?php echo $index ?>" onfocusout="setDetails('<?php echo $index ?>')"  style="padding: 0px;margin: 0px;width: 100%">
                                            </td>
                                            <td style="width: 80px;"><div id="unit<?php echo $index ?>"></div></td>
                                            <td style="width: 80px;"><div id="price<?php echo $index ?>"></div></td>
                                            <td style="width: 80px;"><div id="onhand<?php echo $index ?>"></div></td>
                                            <td style="width: 80px;"><input type="text" name="itemcount[]" onkeypress="return chkNumericKey(event)" onfocusout="calculateAmount('<?php echo $index ?>')" id="amount<?php echo $index ?>" style="padding: 0px;margin: 0px;width: 100%"></td>
                                            <td ><div id="total<?php echo $index ?>"></div></td>
                                        </tr>
                                    <?php } ?>

                                </table>
                            </div>
                        </div>
                        <div style="width: 28%;float: right">
                            <table class="table-bordered" style="width: 100%;border-collapse: collapse;background-color: white" border="1">
                                <tr style="font-weight: bold; color: red">
                                    <td><b>SO Number</b></td>
                                    <td><input style="color: red" type="text" name="sono" onkeypress="return chkNumericKey(event)" value="<?php echo $sonumber ?>" readonly=""></td>
                                </tr>
                                <tr >
                                    <td><b>Sales Date</b></td>
                                    <td><input type="text" name="salesdate" value="<?php echo date("Y-m-d") ?>" readonly=""></td>
                                </tr>
                                <tr >
                                    <td><b>Sales Person</b></td>
                                    <td><input type="text" name="representative" value="<?php echo $customer["sales_person_name"] ?>" readonly=""></td>
                                </tr>
                                <tr >
                                    <td><b>Total</b></td>
                                    <td><input type="text" id="finaltotal" onkeypress="return chkNumericKey(event)" name="sub_total" readonly=""></td>
                                </tr>
                                <tr >
                                    <td><b>Discount</b></td>
                                    <td><input type="text" id="discount" name="discount" onfocusout="discount()"  name="discount" ></td>
                                </tr>
                                <tr >
                                    <td><b>Net Total</b></td>
                                    <td><input type="text" id="nettotal" onkeypress="return chkNumericKey(event)" name="total" name="nettotal" ></td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
            <hr/>

        </div>
    </div>
    <div class="modal-footer "> 
        <a id="save" class="btn btn-primary" onclick="createPurchaseOrder()">Save</a> 
        <a href="index.php?pagename=manage_salesorder" id="btnSubmitFullForm" class="btn btn-info">CANCEL</a>
    </div>
    <input type="hidden" name="onhand" id="onhand">
</form>

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
        $option.="\"" . $value["item_code"] . " __ " . preg_replace('!\s+!', ' ', str_replace("\"", "", $value["item_desc_purch"])) . "\",";
    }
    return $option;
}

function buildCustomerrAutoComplete($vendorarray) {
    $option = "";
    foreach ($vendorarray as $value) {
        $option.=" \" " . preg_replace('!\s+!', ' ', str_replace("\"", "", $value["cust_companyname"])) . "\",";
    }
    return $option;
}
