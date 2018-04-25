<style>
    table tbody {

    }
    table tr td{
        padding: 5px;
    }

</style>

<?php
$flag = filter_input(INPUT_GET, "flag");

if ($flag == "purchase") {
    $itemid = filter_input(INPUT_GET, "itemId");
    $vendorinfo = MysqlConnection::fetchCustom("SELECT * FROM item_master WHERE item_id = $itemid");
    $supplierid = $vendorinfo[0]["vendorid"];
} else {
    $supplierid = filter_input(INPUT_GET, "supplierid");
}

$sqlgetsupplier = "SELECT * FROM supplier_master WHERE supp_id = $supplierid ";
$resultset = MysqlConnection::fetchCustom($sqlgetsupplier);
$supplier = $resultset[0];

//$sqlitemarray = MysqlConnection::fetchCustom("SELECT count(id) as counter FROM sales_order");

$ponumber = MysqlConnection::fetchCustom("SELECT id FROM purchase_order ORDER BY id DESC LIMIT 0,1");

$buildauto = buildauto(MysqlConnection::fetchCustom("SELECT item_id ,item_code,item_desc_purch, item_name FROM item_master;"));
$vendorauto = buildVendorAutoComplete(MysqlConnection::fetchCustom("SELECT supp_id,companyname FROM `supplier_master` WHERE status = 'Y' ORDER BY `supplier_master`.`companyname` ASC"));
?>

<script>
    $(function() {
        var availableTags = [<?php echo $buildauto ?>];
        for (var index = 1; index <= 30; index++) {
            $("#tags" + index).autocomplete({source: availableTags});
        }
    });
    $(function() {
        var availableVendor = [<?php echo $vendorauto ?>];
        $("#companyname").autocomplete({source: availableVendor});
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
<form action="perchaseorder/savepurchaseorder.php" name="purchaseorder" method="post">
    <input type="hidden" name="suppid" id="suppid" value="<?php echo $supplierid ?>">
    <div class="container-fluid" style="" >
        <div class="widget-box" style="width: 100%;border-bottom: solid 1px #CDCDCD;">
            <div class="widget-title">
                <ul class="nav nav-tabs">
                    <li class="active"><a  data-toggle="tab" href="#tab1">CREATE PURCHASE ORDER</a></li>
                </ul>
            </div>
            <br/>
            <table style="width: 100%">
                <tr>
                    <td>
                        <fieldset  class="well the-fieldset">
                            <table>
                                <tr>
                                    <td style="width: 10%"><label class="control-label"   class="control-label">SUPPLIER NAME&nbsp;:&nbsp</label></td>
                                    <td>
                                        <input  type="text" autofocus="" name="companyname"  required="" onfocusout="searchSupplier()" id="companyname" placeholder="Supplier Name" value="<?php echo $supplier["companyname"] ?>" />
                                        <div id="error" style="color: red"></div>
                                    </td>
                                    <td style="width: 10%"><label class="control-label">SHIP VIA&nbsp;:&nbsp</label></td>
                                    <td><input  type="text" name="ship_via" placeholder="" value="<?php echo $supplier["ship_via"] ?>"/></td>
                                    <td style="width: 10%"><label class="control-label">SHIP&nbsp;DATE&nbsp;:&nbsp</label></td>
                                    <td><input type="text" name="expected_date" id="datepicker" value="<?php echo $supplier["expected_date"] ?>" ></td>
                                </tr>
                                <tr>
                                    <td ><label  class="control-label"  class="control-label">BILLING&nbsp;ADDRESS&nbsp;:&nbsp</label></td>
                                    <td><textarea style="line-height: 18px;" name="shipping"><?php echo $ownaddress ?></textarea></td>
                                    <td><label class="control-label">SHIPPING&nbsp;ADDRESS&nbsp;:&nbsp</label></td>
                                    <td><textarea style="line-height: 18px;" name="billing"><?php echo $ownaddress ?></textarea></td>
                                    <td ><label class="control-label"><b>REMARK&nbsp;/&nbsp;NOTE&nbsp;:&nbsp</b></label></td>
                                    <td><textarea  style="line-height: 18px; color: red" name="remark" value="<?php echo $supplier["shipping_address"] ?>" ></textarea></td>
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
                                    if (count($vendorinfo) == 0) {
                                        for ($index = 1 + $preindex; $index <= 50 + $preindex; $index++) {
                                            ?>
                                            <tr id="<?php echo $index ?>" style="border-bottom: solid 1px  #CDCDCD;background-color: white">
                                                <td style="width: 25px">
                                                    <a class="icon  icon-remove" onclick="clearValue('<?php echo $index ?>')"></a>
                                                </td>
                                                <td style="width: 550px;">
                                                    <input type="text" name="items[]" id="tags<?php echo $index ?>" onfocusout="setDetails('<?php echo $index ?>')"  style="padding: 0px;margin: 0px;width: 100%">
                                                </td>
                                                <td style="width: 80px;"><div id="unit<?php echo $index ?>"></div></td>
                                                <td style="width: 80px;"><div id="price<?php echo $index ?>"></div></td>
                                                <td style="width: 80px;"><input type="text" name="itemcount[]" onkeypress="return chkNumericKey(event)" onfocusout="calculateAmount('<?php echo $index ?>')" id="amount<?php echo $index ?>" style="padding: 0px;margin: 0px;width: 100%"></td>
                                                <td ><div id="total<?php echo $index ?>"></div></td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        $preindex = 0;
                                        foreach ($vendorinfo as $key => $value) {
                                            $preindex++;
                                            ?>
                                            <tr id="<?php echo $preindex ?>" style="border-bottom: solid 1px  #CDCDCD;background-color: white">
                                                <td style="width: 25px">
                                                    <a class="icon  icon-remove" onclick="clearValue('<?php echo $preindex ?>')"></a>
                                                </td>
                                                <td style="width: 550px;">
                                                    <input type="text" name="items[]" value="<?php echo $value["item_code"]." __ ".$value["item_desc_purch"] ?>" style="padding: 0px;margin: 0px;width: 100%">
                                                </td>
                                                <td style="width: 80px;"><div id="unit<?php echo $preindex ?>"><?php echo $value["unit"] ?></div></td>
                                                <td style="width: 80px;"><div id="price<?php echo $preindex ?>"><?php echo $value["purchase_rate"] ?></div></td>
                                                <td style="width: 80px;"><input type="text" name="itemcount[]" onkeypress="return chkNumericKey(event)" onfocusout="calculateAmount('<?php echo $preindex ?>')" id="amount<?php echo $preindex ?>" style="padding: 0px;margin: 0px;width: 100%"></td>
                                                <td ><div id="total<?php echo $preindex ?>"></div></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                        <div style="width: 28%;float: right">
                            <table class="table-bordered" style="width: 100%;border-collapse: collapse;background-color: white" border="1">
                                <tr style="font-weight: bold; color: red" >
                                    <td><b>PO Number</b></td>
                                    <td><input style="color: red;font-weight: bold " type="text" name="purchaseOrderId"  onkeypress="return chkNumericKey(event)" value="PO<?php echo (1000 + $ponumber[0]["id"]) ?>" readonly=""></td>
                                </tr>
                                <tr >
                                    <td><b>Order Date</b></td>
                                    <td><input type="text" name="purchasedate" value="<?php echo date("Y-m-d") ?>" readonly=""></td>
                                </tr>
                                <tr >
                                    <td><b>Enter By</b></td>
                                    <td><input type="text" name="enterby" value="<?php echo $_SESSION["user"]["firstName"] . " " . $_SESSION["user"]["lastName"] ?>" readonly=""></td>
                                </tr>
                                <tr >
                                    <td><b>Total</b></td>
                                    <td><input type="text" id="finaltotal" onkeypress="return chkNumericKey(event)" name="finaltotal" readonly=""></td>
                                </tr>
                                <tr >
                                    <td><b>Discount</b></td>
                                    <td><input type="text" id="discount" name="discount" onfocusout="discount()"  name="discount" ></td>
                                </tr>
                                <tr >
                                    <td><b>Net Total</b></td>
                                    <td><input type="text" id="nettotal"  onfocus="discount()" name="nettotal" name="nettotal" ></td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
            <div class="modal-footer " style="text-align: center"> 
                <a id="save" class="btn btn-primary" onclick=" createPurchaseOrder()">Save</a> 
                <a href="index.php?pagename=manage_perchaseorder" id="btnSubmitFullForm" class="btn btn-info">CANCEL</a>
            </div>
        </div>
    </div>
</form>
<script src="js/maruti.form_common.js"></script>
<script src="perchaseorder/purchasejs.js"></script>
<script>
                    function shiftfocus() {

                    }

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

function buildVendorAutoComplete($vendorarray) {
    $option = "";
    foreach ($vendorarray as $value) {
        $option.=" \" " . $value["companyname"] . "\",";
    }
    return $option;
}
?>
