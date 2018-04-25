<style>
    table tbody {

    }
    table tr td{
        padding: 5px;
    }
</style>
<?php
$purchaseid = filter_input(INPUT_GET, "purchaseorderid");
$result = MysqlConnection::fetchCustom("SELECT * , "
                . "( SELECT companyname FROM supplier_master WHERE supp_id = po.`supplier_id` ) AS companyname FROM purchase_order po, purchase_item pi WHERE po.id = pi.po_id AND pi.po_id =$purchaseid");
$purchaseorder = $result[0];

if (isset($_POST["purchaseorderid"]) && isset($_GET["flag"])) {
    $poid = $_POST["purchaseorderid"];
    $vendorid = MysqlConnection::fetchCustom("SELECT supplier_id FROM purchase_order WHERE id = $poid");
    $selectbal = "SELECT `supp_balance` as supp_balance  FROM `supplier_master` where `supp_id` = " . $vendorid[0]["supplier_id"];
    $balancedetails = MysqlConnection::fetchCustom($selectbal);
    $balance = $balancedetails[0]["supp_balance"];
    $pototal = "SELECT `total` as total  FROM `purchase_order` where `id` = " . $poid;
    $pobalance = MysqlConnection::fetchCustom($pototal);
    $newbalance = $balance - $pobalance[0]["total"];
    MysqlConnection::delete("UPDATE `supplier_master` SET `supp_balance` = '$newbalance' WHERE `supp_id` = " . $vendorid[0]["supplier_id"]);
    MysqlConnection::delete("DELETE FROM purchase_order WHERE id = $poid ");
    MysqlConnection::delete("DELETE FROM purchase_item WHERE po_id = $poid ");
    header("location:index.php?pagename=manage_perchaseorder");
}
?>
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
<form  method="post">

    <div class="container-fluid" style="" >
        <div class="widget-box" style="width: 100%;border-bottom: solid 1px #CDCDCD;">
            <div class="widget-title">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab1">VIEW PURCHASE ORDER</a></li>
                </ul>
            </div>
            <br/>
            <div style="text-align: center;font-size: 12px;font-weight: bold;color: red;font-family: verdana">
                <?php echo $_SESSION["msg"] ?>
            </div>
            <table style="width: 100%">
                <tr>
                    <td>
                        <fieldset  class="well the-fieldset">
                            <table>
                                <tr>
                                    <td style="width: 10%"><label class="control-label"   class="control-label">SUPPLIER NAME&nbsp;:&nbsp</label></td>
                                    <td><input  type="text"  value="<?php echo $purchaseorder["companyname"] ?>" readonly=""/></td>
                                    <td style="width: 10%"><label class="control-label">SHIP VIA&nbsp;:&nbsp</label></td>
                                    <td><input  type="text" placeholder=""  value="<?php echo $purchaseorder["ship_via"] ?>" readonly="" /></td>
                                    <td style="width: 10%"><label class="control-label">SHIP&nbsp;DATE&nbsp;:&nbsp</label></td>
                                    <td><input type="text" value="<?php echo $purchaseorder["expected_date"] ?>"  data-date-format="mm-dd-yyyy"  readonly="" ></td>
                                </tr>
                                <tr>
                                    <td ><label  class="control-label"  class="control-label">BILLING&nbsp;ADDRESS&nbsp;:&nbsp</label></td>
                                    <td><textarea style="line-height: 18px;" readonly=""><?php echo $purchaseorder["billing_address"] ?></textarea></td>
                                    <td><label class="control-label">SHIPPING&nbsp;ADDRESS&nbsp;:&nbsp</label></td>
                                    <td><textarea style="line-height: 18px;" readonly=""><?php echo $purchaseorder["shipping_address"] ?></textarea></td>
                                    <td ><label class="control-label"><b>REMARK&nbsp;/&nbsp;NOTE&nbsp;:&nbsp</b></label></td>
                                    <td><textarea  style="line-height: 18px; color: red" readonly=""  ><?php echo $purchaseorder["remark"] ?></textarea></td>
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
                                    <td style="width: 30px;">#</td>
                                    <td style="width: 200px;">ITEM NAME</td>
                                    <td style="width: 300px">ITEM DESCRIPTION</td>
                                    <td style="width: 80px;">UNIT</td>
                                    <td style="width: 80px;text-align: right">PRICE&nbsp;</td>
                                    <td style="width: 80px;text-align: right">QTY&nbsp;</td>
                                    <td style="width: 80px;text-align: right;background-color: rgb(247,252,231)">REC.QTY&nbsp;</td>
                                    <td style="text-align: right">AMOUNT&nbsp;</td>
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
                                            <td style="width: 30px"><?php echo $index++ ?></td>
                                            <td style="width: 200px;"><?php echo $items[0]["item_code"] ?></td>
                                            <td style="width: 300px"><div id="desc"></div><?php echo $items[0]["item_desc_purch"] ?></td>
                                            <td style="width: 80px;" ><div id="unit"></div><?php echo $items[0]["unit"] ?></td>
                                            <td style="width: 80px;text-align: right"><div id="price"></div><?php echo $items[0]["purchase_rate"] ?></td>
                                            <td style="width:80px;text-align: right"><?php echo $value["qty"] ?></td>
                                            <td style="width:80px;text-align: right;background-color: rgb(247,252,231)"><?php echo $value["rqty"] ?></td>
                                            <td style="text-align: right"><?php echo ($items[0]["purchase_rate"] * $value["qty"]) ?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>

                        </div>
                        <div style="width: 28%;float: right">
                            <table class="table-bordered" style="width: 100%;border-collapse: collapse;background-color: white" border="1">
                                <tr style="font-weight: bold; color: red">
                                    <td><b>PO Number</b></td>
                                    <td><input type="text" value="<?php echo $purchaseorder["purchaseOrderId"] ?>"  readonly=""></td>
                                </tr>
                                <tr >
                                    <td><b>Order Date</b></td>
                                    <td><input type="text" value="<?php echo date("Y-m-d") ?>" readonly=""></td>
                                </tr>
                                <tr >
                                    <td><b>Enter By</b></td>
                                    <td><input type="text" value="<?php echo $_SESSION["user"]["firstName"] . " " . $_SESSION["user"]["lastName"] ?>" readonly=""></td>
                                </tr>

                                <tr >
                                    <td><b>Total</b></td>
                                    <td><input type="text" readonly=""  value="<?php echo $purchaseorder["sub_total"]; ?>"></td>
                                </tr>
                                <tr >
                                    <td><b>Discount</b></td>
                                    <td><input type="text" readonly="" value="<?php echo $purchaseorder["discount"]; ?>"></td>
                                </tr>
                                <tr >
                                    <td><b>Net Total</b></td>
                                    <td><input type="text" readonly="" value="<?php echo $purchaseorder["total"]; ?>"></td>
                                </tr>

                            </table>
                        </div>
                    </td>
                </tr>
            </table>
            <div class="modal-footer " style="text-align: center"> 
                <!--                <a id="save" class="btn btn-primary" onclick="">PRINT</a> -->
                <a href="index.php?pagename=manage_perchaseorder" id="btnSubmitFullForm" class="btn btn-info">CANCEL</a>
                <?php
                if (isset($_GET["flag"])) {
                    ?>
                    <input type="submit" value="DELETE" name="deleteItem" class="btn btn-danger"/>
                    <input type="hidden" name="purchaseorderid" value="<?php echo $_GET["purchaseorderid"] ?>"/>
                    <?php
                }
                ?>
            </div>
            <hr/>
        </div>
    </div>
</form>
<?php $_SESSION["msg"] = ""; ?>
<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/bootstrap-colorpicker.js"></script> 
<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/maruti.js"></script> 
<script src="js/maruti.form_common.js"></script>
