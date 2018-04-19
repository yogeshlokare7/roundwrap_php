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
    MysqlConnection::delete("DELETE FROM purchase_order WHERE id = $poid ");
    MysqlConnection::delete("DELETE FROM purchase_item WHERE po_id = $poid ");
    header("location:index.php?pagename=manage_perchaseorder");
}
?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a class="tip-bottom"><i class="icon-home"></i>HOME</a>
        <a class="tip-bottom"><i class="icon-home"></i>PURCHASE ORDER INVOICE</a>
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
                    <li class="active"><a data-toggle="tab" href="#tab1">PURCHASE ORDER INVOICE</a></li>
                </ul>
            </div>
            <br/>
            <table style="width: 100%" border="0">
                <tr>
                    <td>
                        <fieldset  class="well the-fieldset">
                            <table border="0">
                                <tr>
                                    <td style="width: 20%"><label class="control-label"   class="control-label">COMPANY NAME&nbsp;:&nbsp</label>
                                        <input   type="text"  value="<?php echo $purchaseorder["companyname"] ?>" readonly=""/></td>
                                    <td></td>
                                    
                                </tr>
                                <tr>
                                    <td  ><label  class="control-label"  class="control-label">BILLING&nbsp;ADDRESS&nbsp;:&nbsp</label>
                                        <textarea style="line-height: 18px;" readonly=""><?php echo $purchaseorder["billing_address"] ?></textarea></td>
                                    <td style="width: 22%" ><label class="control-label">SHIPPING&nbsp;ADDRESS&nbsp;:&nbsp</label>
                                        <textarea style="line-height: 18px;" readonly=""><?php echo $purchaseorder["shipping_address"] ?></textarea></td>
                                </tr>
                            </table>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="table-bordered" style="width: 70%;border-collapse: collapse;background-color: white" border="1">
                            <tr >
                                <td><b>Enter By</b></td>
                                <td><b>PO Number</b></td>
                                <td><b>Purchase Date</b></td>
                                <td><b>Ship Via</b></td>
                              
                            </tr>
                            <tr >
                                <td><input type="text" value="<?php echo $_SESSION["user"]["firstName"] . " " . $_SESSION["user"]["lastName"] ?>" readonly=""></td>
                                <td><input type="text" name="purchaseOrderId" onkeypress="return chkNumericKey(event)" value="PO<?php echo (1000 + $ponumber[0]["id"]) ?>" readonly=""></td>
                                <td><input type="text" value="<?php echo date("Y-m-d") ?>" readonly=""></td>
                                <td><input  type="text" placeholder=""  value="<?php echo $purchaseorder["ship_via"] ?>" readonly="" /></td>
                              
                            </tr>

                        </table>  


                    </td>


                </tr>
                <tr>
                    <td>
                        <div style="width: 70%;float: left;text-align: center">
                            <table class="table-bordered" style="width: 100%;border-collapse: collapse" border="1">
                                <tr style="border-bottom: solid 1px  #CDCDCD;background-color: rgb(250,250,250)">
                                    <td style="width: 25px;">#</td>
                                    <td style="width: 200px;">ITEM NAME</td>
                                    <td style="width: 350px">ITEM DESCRIPTION</td>
                                    <td style="width: 80px;">UNIT</td>
                                    <td style="width: 80px;">PRICE</td>
                                    <td style="width: 80px;">QTY</td>
                                    <td style="width: 80px;">REC</td>
                                    <td>AMOUNT</td>
                                </tr>
                            </table>
                            <div style="overflow: auto;height: 232px;border-bottom: solid 1px  #CDCDCD;">
                                <table class="table-bordered" style="width: 100%;border-collapse: collapse" border="1">
                                    <?php
                                    foreach ($result as $key => $value) {
                                        $items = MysqlConnection::fetchCustom("SELECT * FROM  item_master WHERE item_id =  " . $value["item_id"]);
                                        ?>
                                        <tr id="<?php echo $index ?>" style="border-bottom: solid 1px  #CDCDCD;background-color: white">
                                            <td style="width: 25px"></td>
                                            <td style="width: 200px;"><?php echo $items[0]["item_code"] ?></td>
                                            <td style="width: 350px"><div id="desc"></div><?php echo $items[0]["item_desc_purch"] ?></td>
                                            <td style="width: 80px;"><div id="unit"></div><?php echo $items[0]["unit"] ?></td>
                                            <td style="width: 80px;text-align: right"><div id="price"></div><?php echo $items[0]["purchase_rate"] ?></td>
                                            <td style="width:80px;"><?php echo $value["qty"] ?></td>
                                            <td style="width:80px;"><?php echo $value["rqty"] ?></td>
                                            <td style="text-align: right" ><?php echo ($items[0]["purchase_rate"] * $value["qty"]) ?></td>
                                        </tr>



                                    <?php } ?>
                                    <tr>
                                        <td colspan="6"  ></td>
                                        <td><b>Total</b></td>
                                        <td style="text-align: right" ><?php echo $purchaseorder["sub_total"]; ?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td colspan="6"></td>
                                        <td><b>Discount</b></td>
                                        <td style="text-align: right" ><?php echo $purchaseorder["discount"]; ?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td colspan="6"></td>
                                        <td><b>Net Total</b></td>
                                        <td style="text-align: right" ><?php echo $purchaseorder["total"]; ?></td>
                                        
                                    </tr>
                                </table>
                            </div>

                        </div>

                    </td>
                </tr>
<!--                <tr>
                    <td>
                        <table class="table-bordered" style="width: 70%;border-collapse: collapse;background-color: white" border="1">
                            <tr >
                                <td><b>Enter By</b></td>
                                <td><b>PO Number</b></td>
                                <td><b>Purchase Date</b></td>
                                <td><b>Ship Via</b></td>
                                <td><b>Total</b></td>
                                <td><b>Discount</b></td>
                                <td><b>Net Total</b></td>

                            </tr>
                            <tr >
                                <td><input type="text" value="<?php echo $_SESSION["user"]["firstName"] . " " . $_SESSION["user"]["lastName"] ?>" readonly=""></td>
                                <td><input type="text" name="purchaseOrderId" onkeypress="return chkNumericKey(event)" value="PO<?php echo (1000 + $ponumber[0]["id"]) ?>" readonly=""></td>
                                <td><input type="text" value="<?php echo date("Y-m-d") ?>" readonly=""></td>
                                <td><input  type="text" placeholder=""  value="<?php echo $purchaseorder["ship_via"] ?>" readonly="" /></td>
                                <td><input type="text" readonly=""  value="<?php echo $purchaseorder["sub_total"]; ?>"></td>
                                <td><input type="text" readonly="" value="<?php echo $purchaseorder["discount"]; ?>"></td>
                                <td><input type="text" readonly="" value="<?php echo $purchaseorder["total"]; ?>"></td>
                            </tr>

                            

                        </table>  
                    </td>

                </tr>-->
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
<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/bootstrap-colorpicker.js"></script> 
<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/maruti.js"></script> 
<script src="js/maruti.form_common.js"></script>
