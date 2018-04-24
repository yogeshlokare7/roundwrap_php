<style>
    table tbody {

    }
    table tr td{
        padding: 5px;
    }
    
</style>

<?php
$sqlgetsupplier = "SELECT * FROM supplier_master WHERE supp_id = " . filter_input(INPUT_GET, "supplierid");
$resultset = MysqlConnection::fetchCustom($sqlgetsupplier);
$supplier = $resultset[0];

//$sqlitemarray = MysqlConnection::fetchCustom("SELECT count(id) as counter FROM sales_order");
$itemarray = MysqlConnection::fetchCustom("SELECT item_id ,item_code, item_name FROM item_master;");
$buildauto = buildauto($itemarray);

$ponumber = MysqlConnection::fetchCustom("SELECT id FROM purchase_order ORDER BY id DESC LIMIT 0,1");
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script>
    $(function() {
        var availableTags = [<?php echo $buildauto ?>];
        for (var index = 1; index <= 30; index++) {
            $("#tags" + index).autocomplete({source: availableTags});
        }
    });
//    $(function() {
//        $("#expected_date").datepicker();
//    });
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
    <input type="hidden" name="suppid" value="<?php echo filter_input(INPUT_GET, "supplierid") ?>">
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
                                    <td style="width: 10%"><label class="control-label"   class="control-label">SUPPLIER NAME&nbsp;:&nbsp</label></td>
                                    <td><input  type="text" name="companyname" placeholder="Supplier Name" value="<?php echo $supplier["companyname"] ?>" /></td>
                                    <td style="width: 10%"><label class="control-label">SHIP VIA&nbsp;:&nbsp</label></td>
                                    <td><input  type="text" name="ship_via" placeholder="" value="<?php echo $supplier["ship_via"] ?>"/></td>
                                    <td style="width: 10%"><label class="control-label">SHIP&nbsp;DATE&nbsp;:&nbsp</label></td>
                                    <td><input type="text" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" placeholder="YYYY-MM-DD" name="expected_date" id="expected_date" value="<?php echo $supplier["expected_date"] ?>" ></td>
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
                                    <td style="width: 230px;">ITEM NAME</td>
                                    <td style="width: 350px">ITEM DESCRIPTION</td>
                                    <td style="width: 80px;">UNIT</td>
                                    <td style="width: 80px;">PRICE</td>
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
                                            <td style="width: 230px;">
                                                <input type="text" name="items[]" id="tags<?php echo $index ?>" onfocusout="setDetails('<?php echo $index ?>')"  style="padding: 0px;margin: 0px;width: 100%">
                                            </td>
                                            <td style="width: 350px"><div id="desc<?php echo $index ?>"></div></td>
                                            <td style="width: 80px;"><div id="unit<?php echo $index ?>"></div></td>
                                            <td style="width: 80px;"><div id="price<?php echo $index ?>"></div></td>
                                            <td style="width: 80px;"><input type="text" name="itemcount[]" onkeypress="return chkNumericKey(event)" onfocusout="calculateAmount('<?php echo $index ?>')" id="amount<?php echo $index ?>" style="padding: 0px;margin: 0px;width: 100%"></td>
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
                                    <td><input style="color: red" type="text" name="purchaseOrderId"  onkeypress="return chkNumericKey(event)" value="PO<?php echo (1000 + $ponumber[0]["id"]) ?>" readonly=""></td>
                                </tr>
                                <tr >
                                    <td><b>Order Date</b></td>
                                    <td><input type="date" name="purchasedate" value="<?php echo date("Y-m-d") ?>" readonly=""></td>
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
<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/bootstrap-colorpicker.js"></script> 
<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/maruti.js"></script> 
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
        $option.="\"" . $value["item_code"] . "\",";
    }
    return $option;
}
?>