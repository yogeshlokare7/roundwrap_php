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
echo "<pre>";
print_r($supplier);
echo "</pre>";

echo "<pre>";
print_r($_POST);
echo "</pre>";


$arrreceiptno = MysqlConnection::fetchCustom("SELECT id FROM `customer_balancepayment` ORDER BY id desc");
$receiptno = "CR-".  time()."-".$arrreceiptno[0]["id"]."".$supplier["supp_id"];
?> 
<div id="content-header">
    <div id="breadcrumb"> 
        <a class="tip-bottom"><i class="icon-home"></i>HOME</a>
        <a class="tip-bottom"><i class="icon-home"></i>MAKE PAYMENT</a>
    </div>
</div>
<style>
    input,textarea,select,date{ width: 90%; }
    .control-label{ margin-left: 10px; }
    tr,td{ vertical-align: middle; font-size: 12px;padding: 0px;margin: 0px;}
</style>
<form action="payment/vendor_payment.php" name="purchaseorder" method="post">
    <input type="hidden" name="suppid" value="<?php echo filter_input(INPUT_GET, "supplierid") ?>">
    <div class="container-fluid" style="" >
        <div class="widget-box" style="width: 100%;border-bottom: solid 1px #CDCDCD;">
            <div class="widget-title">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab1">VENDOR PAYMENT</a></li>
                </ul>
            </div>
            <br/>
            <table style="width: 100%">
                <tr>
                    <td>
                        <div style="width: 70%;float: right">
                            <table class="table-bordered" style="width: 100%;border-collapse: collapse" border="1">
                                <tr style="border-bottom: solid 1px  #CDCDCD;background-color: rgb(250,250,250)">
                                    <td style="width: 25px;">#</td>
                                    <td style="width: 120px;">Receipt.No</td>
                                    <td style="width: 120px">Balance.Amount</td>
                                    <td style="width: 120px;">Paid.Date</td>
                                    <td style="width: 120px;">Cheque.No/DD.No</td>
                                    <td style="width: 120px;">Paid.Amount</td>
                                    <td>Remark</td>
                                </tr>
                            </table>
                            <div style="overflow: auto;height: 300px;border-bottom: solid 1px  #CDCDCD;">
                                <table class="table-bordered" style="width: 100%;border-collapse: collapse" border="1">
                                    <?php for ($index = 1; $index <= 10; $index++) { ?>
                                        <tr id="<?php echo $index ?>" style="border-bottom: solid 1px  #CDCDCD;background-color: white;height: 35px;">
                                            <td style="width: 25px"></td>
                                            <td style="width: 120px;"></td>
                                            <td style="width: 120px"></td>
                                            <td style="width: 120px;"></td>
                                            <td style="width: 120px;"></td>
                                            <td style="width: 120px;"></td>
                                            <td ></td>
                                        </tr>
                                    <?php } ?>

                                </table>
                            </div>
                        </div>
                        <div style="width: 28%;float: left">
                            <table class="table-bordered" style="width: 100%;border-collapse: collapse;background-color: white" border="1">
                                <tr >
                                    <td><b>Receipt No</b></td>
                                    <td><input type="text" readonly="" value="<?php echo $receiptno?>"></td>
                                </tr>
                                <tr >
                                    <td><b>Supplier Name</b></td>
                                    <td><input type="text" readonly="" value="<?php echo $supplier["companyname"]?>"></td>
                                </tr>

                                <tr >
                                    <td><b>Balance Amount</b></td>
                                    <td><input type="text" readonly="" value="<?php echo $supplier["supp_balance"]?>"></td>
                                </tr>

                                <tr >
                                    <td><b>Paid Date</b></td>
                                    <td><input type="text" readonly="" value="<?php echo date("D-M-Y") ?>"></td>
                                </tr>
                                <tr >
                                    <td><b>Cheque No/DD No</b></td>
                                    <td><input type="text" readonly="" value="<?php echo date("D-M-Y") ?>"></td>
                                </tr>
                                <tr >
                                    <td><b>Paid Amount</b></td>
                                    <td><input type="text" autofocus="" value=""></td>
                                </tr>
                                <tr >
                                    <td><b>Balance</b></td>
                                    <td><input type="text" readonly="" value=""></td>
                                </tr>
                                <tr >
                                    <td><b>Remark</b></td>
                                    <td><input type="text"  value=""></td>
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