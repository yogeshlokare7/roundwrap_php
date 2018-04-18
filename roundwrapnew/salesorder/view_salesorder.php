<?php
$sqlgetsupplier = "SELECT *, (SELECT cust_companyname FROM customer_master WHERE id = so.customer_id ) as cust_companyname   FROM `sales_order` so WHERE id = " . filter_input(INPUT_GET, "salesorderid");
$resultset = MysqlConnection::fetchCustom($sqlgetsupplier);
$customer = $resultset[0];
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
<form action="#" method="post">

    <div class="container-fluid" style="" >
        <div class="widget-box" style="width: 100%;border-bottom: solid 1px #CDCDCD;">
            <div class="widget-title">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab1">SALES ORDER VIEW</a></li>
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
                                    <td><input  type="text" placeholder="" value="<?php echo $customer["cust_companyname"] ?>" readonly=""/></td>
                                    <td style="width: 10%"><label class="control-label">SHIP VIA&nbsp;:&nbsp</label></td>
                                    <td><input  type="text" placeholder="" value="<?php echo $customer["shipvia"] ?>" readonly=""/></td>
                                    <td style="width: 10%"><label class="control-label">EXPECTED&nbsp;DELIVERY&nbsp;:&nbsp</label></td>
                                    <td><input type="text" value="<?php echo $customer["expected_date"] ?>"   data-date-format="mm-dd-yyyy" readonly="" ></td>
                                </tr>
                                <tr>
                                    <td ><label  class="control-label"  class="control-label">BILLING&nbsp;ADDRESS&nbsp;:&nbsp</label></td>
                                    <td><textarea style="line-height: 18px;"readonly=""><?php echo $customer["billTo_address"] ?></textarea></td>
                                    <td><label class="control-label" readonly="">SHIPPING&nbsp;ADDRESS&nbsp;:&nbsp</label></td>
                                    <td><textarea style="line-height: 18px;" readonly=""><?php echo $customer["shipping_address"] ?></textarea></td>
                                    <td ><label class="control-label">REMARK&nbsp;/&nbsp;NOTE&nbsp;:&nbsp</label></td>
                                    <td><textarea  style="line-height: 18px;" value="" readonly="" ><?php echo $customer["remark"] ?></textarea></td>
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
                                        <tr id="<?php echo $index ?>" style="border-bottom: solid 1px  #CDCDCD;background-color: white">
                                            <td style="width: 30px"></td>
                                            <td style="width: 230px;"><?php echo $items[0]["item_code"] ?></td>
                                            <td style="width: 350px"><div id="desc"></div></td>
                                            <td style="width: 80px;"><div id="unit"></div></td>
                                            <td style="width: 80px;"><div id="price"></div></td>
                                            <td style="width: 80px;"><input type="text" style="padding: 0px;margin: 0px;width: 100%" readonly=""></td>
                                            <td ></td>
                                        </tr>
                                </table>
                            </div>
                        </div>

                        <div style="width: 28%;float: right">
                            <table class="table-bordered" style="width: 100%;border-collapse: collapse;background-color: white" border="1">
                                <tr >
                                    <td><b>Purchase Date</b></td>
                                    <td><input type="text" value="<?php echo date("Y-m-d") ?>" readonly=""></td>
                                </tr>
                                <tr >
                                    <td><b>Sales Person</b></td>
                                    <td><input type="text" value="<?php echo $customer["representative"] ?>" readonly=""></td>
                                </tr>
                                <tr >
                                    <td ><b>Total Items</b></td>
                                    <td ><input type="text" value="<?php echo $customer["sub_total"]; ?>" readonly=""></td>
                                </tr>
                                <tr >
                                    <td><b>Total</b></td>
                                    <td><input type="text" value="<?php echo $customer["total"]; ?>" readonly=""></td>
                                </tr>
                                <tr >
                                    <td><b>Discount</b></td>
                                    <td><input type="text" value="<?php echo $customer["discount"]; ?>" readonly=""></td>
                                </tr>
                                <tr >
                                    <td><b>Net Total</b></td>
                                    <td><input type="text" value="<?php echo $customer["sub_total"]; ?>" readonly=""></td>
                                </tr>

                            </table>
                        </div>


                    </td>
                </tr>
            </table>
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
<script>
    $(document).ready(function () {
        $('.table-fixed-header').prepFixedHeader().fixedHeader();
    });
</script>
