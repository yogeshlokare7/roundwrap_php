<?php
$sqlgetsupplier = "SELECT * FROM `sales_order` WHERE id = " . filter_input(INPUT_GET, "salesorderid");
$resultset = MysqlConnection::fetchCustom($sqlgetsupplier);
$customer = $resultset[0];

$sqlitems = "SELECT im.item_id,im.item_code,im.unit,im.onhand,im.sell_rate,im.item_desc_sales, si.qty, si.rqty from item_master im , sales_item si WHERE im.item_id = si.item_id AND si.so_id = " . filter_input(INPUT_GET, "salesorderid");
$result = MysqlConnection::fetchCustom($sqlitems);

$itemarray = MysqlConnection::fetchCustom("SELECT * FROM item_master;");
$buildauto = buildauto($itemarray);
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script>
    $(function () {
        var availableTags = [<?php echo $buildauto ?>];
        for (var index = 1; index <= 30; index++) {
            $("#tags" + index).autocomplete({source: availableTags});
        }
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
<form action="#" method="post">
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
                                    <td><input  type="text" placeholder="Customer Name" value="<?php echo $customer["cust_companyname"] ?>" /></td>
                                    <td style="width: 10%"><label class="control-label">SHIP VIA&nbsp;:&nbsp</label></td>
                                    <td><input  type="text" placeholder="" value="<?php echo $customer["shipvia"] ?>"/></td>
                                    <td style="width: 10%"><label class="control-label">EXPECTED&nbsp;DELIVERY&nbsp;:&nbsp</label></td>
                                    <td><input type="text" value="<?php echo $customer["expected_date"] ?>"  data-date-format="mm-dd-yyyy"  ></td>
                                </tr>
                                <tr>
                                    <td ><label  class="control-label"  class="control-label">BILLING&nbsp;ADDRESS&nbsp;:&nbsp</label></td>
                                    <td><textarea style="line-height: 18px;"><?php echo $customer["billTo_address"] ?></textarea></td>
                                    <td><label class="control-label">SHIPPING&nbsp;ADDRESS&nbsp;:&nbsp</label></td>
                                    <td><textarea style="line-height: 18px;"><?php echo $customer["shipping_address"] ?></textarea></td>
                                    <td ><label class="control-label">REMARK&nbsp;/&nbsp;NOTE&nbsp;:&nbsp</label></td>
                                    <td><textarea  style="line-height: 18px;" value="" ><?php echo $customer["remark"] ?></textarea></td>
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
                                    <?php
                                    $index = 1;
                                    foreach ($result as $key => $value) {
                                        ?>
                                        <tr id="<?php echo $index ?>" style="border-bottom: solid 1px  #CDCDCD;background-color: white">
                                            <td style="width: 25px">
                                                <a class="icon  icon-remove" onclick="clearValue('<?php echo $index ?>')"></a>
                                            </td>
                                            <td style="width: 230px;">
                                                <input type="text" name="items[]" value="<?php echo $value["item_code"] ?>" id="tags<?php echo $index ?>" onfocusout="setDetails('<?php echo $index ?>')"  style="padding: 0px;margin: 0px;width: 100%">
                                            </td>
                                            <td style="width: 350px"><?php echo $value["item_desc_sales"] ?></td>
                                            <td style="width: 80px;"><?php echo $value["unit"] ?></td>
                                            <td style="width: 80px;"><?php echo $value["sell_rate"] ?></td>
                                            <td style="width: 80px;"><input type="text" name="itemcount[]" value="<?php echo $value["qty"] ?>" onkeypress="return chkNumericKey(event)" onfocusout="calculateAmount('<?php echo $index ?>')" id="amount<?php echo $index ?>" style="padding: 0px;margin: 0px;width: 100%"></td>
                                            <td ><?php echo $value["qty"] * $value["sell_rate"] ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <?php for ($index = count($result) + 1; $index <= (50 - count($result)); $index++) { ?>
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
                                <tr >
                                    <td><b>Purchase Date</b></td>
                                    <td><input type="text" value="<?php echo date("Y-m-d") ?>" ></td>
                                </tr>
                                <tr >
                                    <td><b>Enter By</b></td>
                                    <td><input type="text" value="<?php echo $_SESSION["user"]["firstName"] . " " . $_SESSION["user"]["lastName"] ?>" ></td>
                                </tr>
                                <tr >
                                    <td ><b>Total Items</b></td>
                                    <td ><input type="text" value="<?php echo $customer["sub_total"]; ?>" ></td>
                                </tr>
                                <tr >
                                    <td><b>Total</b></td>
                                    <td><input type="text" value="<?php echo $customer["total"]; ?>" ></td>
                                </tr>
                                <tr >
                                    <td><b>Discount</b></td>
                                    <td><input type="text" value="<?php echo $customer["discount"]; ?>" ></td>
                                </tr>
                                <tr >
                                    <td><b>Net Total</b></td>
                                    <td><input type="text" value="<?php echo $customer["sub_total"]; ?>"></td>
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
        <a id="save" class="btn btn-primary">Save</a> 
        <a href="index.php?pagename=manage_salesorder" id="btnSubmitFullForm" class="btn btn-info">CANCEL</a>
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
<script>

            function setDetails(count) {
                var item_code = $("#tags" + count).val();
                var dataString = "item_code=" + item_code;
                $.ajax({
                    type: 'POST',
                    url: 'itemmaster/getitemajax.php',
                    data: dataString
                }).done(function (data) {
                    var jsonobj = JSON.parse(data);
                    var desc = jsonobj.item_desc_sales;
                    $("#desc" + count).text(desc);
                    $("#unit" + count).text(jsonobj.unit);
                    $("#price" + count).text(jsonobj.sell_rate);
                    $("#onhand" + count).text(jsonobj.onhand);
                    $("#onhand" + count).val(jsonobj.onhand);
                }).fail(function () {
                });
            }
            function clearValue(count) {
                $("#desc" + count).text("");
                $("#unit" + count).text("");
                $("#price" + count).text("");
                $("#tags" + count).val("");
                $("#total" + count).text("");
                $("#onhand" + count).text("");
                $("#amount" + count).val("");
                finalTotal();
            }

            function calculateAmount(count) {
                var price = $("#price" + count).text();
                var amount = $("#amount" + count).val();
                var total = parseFloat(price) * parseFloat(amount);
                $("#total" + count).text(total);
                finalTotal();
            }

            function finalTotal() {
                var finaltotal = 0;
                for (var index = 1; index <= 30; index++) {
                    var price = $("#price" + index).text();
                    var amount = $("#amount" + index).val();
                    if (price !== "" && amount !== "") {
                        var t = parseFloat(price) * parseFloat(amount);
                        finaltotal = parseFloat(finaltotal) + parseFloat(t);
                    }
                }
                $("#finaltotal").val(finaltotal);
            }
//                                        function discount() {
//                                            var amount = $("#discount").val();
//                                            var finaltotal = $("#finaltotal").val();
//                                            if (amount !== "") {
//                                                var discount = parseFloat(finaltotal) - parseFloat(amount);
//                                                $("#nettotal").val(discount);
//                                            }
//                                        }

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