<style>
    table tbody {

    }
    table tr td{
        padding: 5px;
    }
</style>
<?php
$purchaseid = filter_input(INPUT_GET, "purchaseorderid");
$result = MysqlConnection::fetchCustom(""
        . "SELECT * , pi.id as poitemid , (SELECT companyname FROM supplier_master WHERE supp_id = po.`supplier_id` ) "
        . "AS companyname FROM purchase_order po, purchase_item pi "
        . "WHERE po.id = pi.po_id AND pi.po_id =$purchaseid ");
$podetails = $result[0];
?>

<div id="content-header">
    <div id="breadcrumb"> 
        <a class="tip-bottom"><i class="icon-home"></i>HOME</a>
        <a class="tip-bottom"><i class="icon-home"></i>CREATE RECEIVING ORDER ENTRY</a>
    </div>
</div>
<style>
    input,textarea,select,date{ width: 90%; }
    .control-label{ margin-left: 10px; }
    tr,td{ vertical-align: middle; font-size: 12px;padding: 0px;margin: 0px;}
</style>
<form action="receivingorder/savereceivingorder_ajax.php" name="purchaseorder" method="post">
    <input type="hidden" name="purchaseorderid" value="<?php echo $purchaseid ?>">
    <div class="container-fluid" style="" >
        <div class="widget-box" style="width: 100%;border-bottom: solid 1px #CDCDCD;">
            <div class="widget-title"><ul class="nav nav-tabs"><li class="active"><a data-toggle="tab" href="#tab1">RECEIVING ORDER ENTRY</a></li></ul></div>
            <br/>
            <table style="width: 100%">
                <tr>
                    <td>
                        <fieldset  class="well the-fieldset">
                            <table>
                                <tr>
                                    <td style="width: 10%"><label class="control-label"   class="control-label">SUPPLIER NAME&nbsp;:&nbsp</label></td>
                                    <td><input  type="text" readonly="" value="<?php echo $podetails["companyname"] ?>" /></td>
                                    <td style="width: 10%"><label class="control-label">SHIP VIA&nbsp;:&nbsp</label></td>
                                    <td><input  type="text" value="<?php echo $podetails["ship_via"] ?>" readonly="" /></td>
                                    <td style="width: 10%"><label class="control-label">EXPECTED&nbsp;DELIVERY&nbsp;:&nbsp</label></td>
                                    <td><input type="text" readonly="" value="<?php echo $podetails["expected_date"] ?>"  data-date-format="mm-dd-yyyy"  ></td>
                                </tr>
                                <tr>
                                    <td ><label  class="control-label"  class="control-label">BILLING&nbsp;ADDRESS&nbsp;:&nbsp</label></td>
                                    <td><textarea style="line-height: 18px;" readonly=""><?php echo $podetails["shipping_address"] ?></textarea></td>
                                    <td><label class="control-label">SHIPPING&nbsp;ADDRESS&nbsp;:&nbsp</label></td>
                                    <td><textarea style="line-height: 18px;" readonly=""><?php echo $podetails["billing_address"] ?></textarea></td>
                                    <td ><label class="control-label">REMARK&nbsp;/&nbsp;NOTE&nbsp;:&nbsp</label></td>
                                    <td><textarea   style="line-height: 18px;" readonly=""><?php echo $podetails["remark"] ?></textarea></td>
                                </tr>
                            </table>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="width: 70%;float: left">
                            <table class="table-bordered" style="width: 70%;border-collapse: collapse" border="1">
                                <tr style="border-bottom: solid 1px  #CDCDCD;background-color: rgb(250,250,250)">
                                    <td style="width: 230px;">ITEM NAME</td>
                                    <td style="width: 350px">ITEM DESCRIPTION</td>
                                    <td style="width: 80px;">QTY</td>
                                    <td >RECEIVED</td>
                                </tr>
                            </table>
                            <div style="overflow: auto;height: 232px;border-bottom: solid 1px  #CDCDCD;">
                                <table class="table-bordered" style="width: 70%;border-collapse: collapse" border="1">
                                    <?php
                                    $index = 1;
                                    foreach ($result as $key => $value) {
                                        $items = MysqlConnection::fetchCustom("SELECT * FROM  item_master WHERE item_id =  " . $value["item_id"]);
                                        if (($value["qty"] - $value["rqty"]) != 0) {
                                            ?>
                                            <tr id="<?php echo $index ?>" style="border-bottom: solid 1px  #CDCDCD;background-color: white">
                                                <td style="width: 230px;"><?php echo $items[0]["item_code"] ?></td>
                                                <td style="width: 350px"><?php echo $items[0]["item_desc_purch"] ?></div></td>
                                                <td style="width: 80px;">
                                                    <?php echo ($value["qty"] - $value["rqty"]) ?>
                                                </td>
                                                <td >
                                                    <input type="hidden" name="poitemid[]" value="<?php echo $value["item_id"] ?>" id="received">
                                                    <input type="text" name="received[]" id="received">
                                                </td>
                                            </tr>
                                            <?php
                                            $index++;
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            <div class="modal-footer" style="margin-bottom: -2px;text-align: center"> 
                <a id="save" class="btn btn-primary" onclick=" createPurchaseOrder()">Save</a> 
                <a href="index.php?pagename=manage_perchaseorder" id="btnSubmitFullForm" class="btn btn-info">CANCEL</a>
            </div>
            <hr>
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
        $option.="\"" . $value["item_code"] . "\",";
    }
    return $option;
}
?>