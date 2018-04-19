<?php
$sqlgetsupplier = "SELECT *, (SELECT cust_companyname FROM customer_master WHERE id = so.customer_id ) as cust_companyname   FROM `sales_order` so WHERE id = " . filter_input(INPUT_GET, "salesorderid");
$resultset = MysqlConnection::fetchCustom($sqlgetsupplier);
$customer = $resultset[0];


$sqlitems = "SELECT im.item_id,im.item_code,im.onhand,im.item_desc_sales, si.qty, si.rqty from item_master im , sales_item si WHERE im.item_id = si.item_id AND si.so_id = " . filter_input(INPUT_GET, "salesorderid");
$itemsarrays = MysqlConnection::fetchCustom($sqlitems);
?>
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
<form action="salesorderreceiving/save_salesorderreceiving.php" method="post">
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
                                    <td><input  type="text" readonly="" value="<?php echo $customer["cust_companyname"] ?>" /></td>
                                    <td style="width: 10%"><label class="control-label">SHIP VIA&nbsp;:&nbsp</label></td>
                                    <td><input  type="text"  readonly=""  value="<?php echo $customer["shipvia"] ?>"/></td>
                                    <td style="width: 10%"><label class="control-label">EXPECTED&nbsp;DELIVERY&nbsp;:&nbsp</label></td>
                                    <td><input type="text"  readonly=""  value="<?php echo $customer["expected_date"] ?>"  data-date-format="mm-dd-yyyy"  ></td>
                                </tr>
                                <tr>
                                    <td ><label  class="control-label"  class="control-label">BILLING&nbsp;ADDRESS&nbsp;:&nbsp</label></td>
                                    <td><textarea style="line-height: 18px;height: 100px;"  readonly="" ><?php echo $customer["billTo_address"] ?></textarea></td>
                                    <td><label class="control-label">SHIPPING&nbsp;ADDRESS&nbsp;:&nbsp</label></td>
                                    <td><textarea style="line-height: 18px;height: 100px;"  readonly="" ><?php echo $customer["shipping_address"] ?></textarea></td>
                                    <td ><label class="control-label">REMARK&nbsp;/&nbsp;NOTE&nbsp;:&nbsp</label></td>
                                    <td><textarea  style="line-height: 18px;height: 100px;"  readonly=""   ><?php echo $customer["remark"] ?></textarea></td>
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
                                    <td style="width: 100px;">ON.HAND.QTY</td>
                                    <td style="width: 100px;">ORD.QTY</td>
                                    <td style="width: 100px;">PRE.SALE.QTY</td>
                                    <td>SALES QTY</td>
                                </tr>
                            </table> 
                            <div style="overflow: auto;;margin: 0 auto">
                                <table class="table-bordered" style="width: 100%;border-collapse: collapse" border="1">
                                    <?php
                                    $index = 1;
                                    foreach ($itemsarrays as $key => $value) {
                                        if ($value["rqty"] - $value["qty"] != 0) {
                                            if ($value["qty"] > $value["onhand"]) {
                                                $back = "rgb(251,210,210)";
                                            } else {
                                                $back = "";
                                            }
                                            ?>
                                            <tr id="<?php echo $index ?>" style="border-bottom: solid 1px  #CDCDCD;background-color: <?php echo $back ?>">
                                                <td style="width: 25px"><?php echo $index++ ?></td>
                                                <td style="width: 230px;"><?php echo $value["item_code"] ?></td>
                                                <td style="width: 350px"><?php echo $value["item_desc_sales"] ?></td>
                                                <td style="width: 100px;"><?php echo $value["onhand"] ?></td>
                                                <td style="width: 100px;"><?php echo $value["qty"] ?></td>
                                                <td style="width: 100px;"><?php echo $value["rqty"] ?></td>
                                                <td >
                                                    <?php
                                                    if ($value["qty"] < $value["onhand"]) {
                                                        ?>
                                                        <input type="text" name="salesitems[]" id="salesitems[]">
                                                        <input type="hidden" name="itemsid[]" id="itemsid[]" value="<?php echo $value["item_id"] ?>"> 
                                                        <?php
                                                    }else{
                                                        echo "<a href='#'>CREATE PO</a>";
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            <hr/>
            <div class="modal-footer " style="margin: 0 auto;text-align: center"> 
                <a id="save" class="btn btn-primary" onclick="createPurchaseOrder()">Save</a> 
                <a href="index.php?pagename=manage_salesorder" id="btnSubmitFullForm" class="btn btn-info">CANCEL</a>
            </div>
            <input type="hidden" name="salesorderid" id="salesorderid" value="<?php echo filter_input(INPUT_GET, "salesorderid") ?>">
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
 