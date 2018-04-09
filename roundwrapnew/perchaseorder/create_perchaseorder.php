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
?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a class="tip-bottom"><i class="icon-home"></i>HOME</a>
        <a class="tip-bottom"><i class="icon-home"></i>PURCHASE ORDER ENTRY</a>
    </div>
</div>
<style>
    input,textarea,select,date{
        width: 90%;
    }
    .control-label{ margin-left: 10px; }
    tr,td{ vertical-align: middle; font-size: 12px;padding: 0px;margin: 0px;}
</style>
<form action="#" method="post">

    <div class="container-fluid" >


        <div class="widget-box" style="width: 100%;float: left">
            <div class="widget-title">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab1">CREATE PURCHASE ORDER</a></li>
                </ul>
            </div>
            <div class="widget-content tab-content" style="background: white">
                <div id="tab1" class="tab-pane active" >
                    <table style="width: 100%" border="0">
                        <tbody style="height: auto;">
                            <tr>
                                <td style="width: 10%"><label class="control-label" >PO NUMBER&nbsp;:&nbsp;</label></td>
                                <td><input  type="text" value="PO10101" readonly=""/></td>
                                <td style="width: 10%"><label class="control-label"   class="control-label">SUPPLIER NAME&nbsp;:&nbsp</label></td>
                                <td><input  type="text" placeholder="Supplier Name" value="<?php echo $supplier["supp_name"] ?>" /></td>
                                <td style="width: 10%"><label class="control-label">SHIP VIA&nbsp;:&nbsp</label></td>
                                <td><input  type="text" placeholder="" /></td>
                            </tr>
                            <tr>
                                <td style="width: 10%"><label  class="control-label"  class="control-label">BILLING ADDRESS&nbsp;:&nbsp</label></td>
                                <td><textarea   ></textarea></td>
                                <td><label class="control-label">SHIPPING ADDRESS&nbsp;:&nbsp</label></td>
                                <td><textarea value="<?php echo $supplier["shipping_address"] ?>" ></textarea></td>
                                <td><label class="control-label">EXPECTED&nbsp;DELIVERY&nbsp;:&nbsp</label></td>
                                <td><input type="text" value="12-02-2012"  data-date-format="mm-dd-yyyy"  ></td>
                            </tr>
                            <tr>
                                <td ><label class="control-label">REMARK / NOTE&nbsp;:&nbsp</label></td>
                                <td colspan="3"><input type="text"  placeholder="Remark / Note :" style="width: 96%" /></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" >
        <table class="table table-bordered " id="data" style="width: 100%;">
            <thead >
                <tr style="height: 25px;">
                    <th style="width: 1%;">#</th>
                    <th style="width: 55%;">Item</th>
                    <th style="width: 5%;">Quantity</th>
                    <th style="width: 5%;">Unit</th>
                    <th style="width: 5%;">Rate</th>
                    <th style="width: 5%;" >Amount</th>
                    <th style="width: 10px;" ></th>
                </tr>
            </thead>
            <tbody style="height: 220px;">
                <?php
                for ($index = 1; $index < 30; $index++) {
                    ?>
                    <tr>
                        <td style="width: 1%;"><?php echo $index?></td>
                        <td ><input type="text"   placeholder="Enter Item" style="width: 100%;" /></td>
                        <td style="width: 6%;"><input type="text"   placeholder="Enter Qunatity" style="width: 100%;" /></td>
                        <td style="width: 6%;"><input type="text"   placeholder="" style="width: 100%;" /></td>
                        <td style="width: 6%;"><input type="text"   placeholder="Enter Rate" style="width: 100%;" /></td>
                        <td style="width: 6%;" colspan="2"><input type="text"   placeholder="" style="width: 100%;" /></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
            
        </table>
    </div>
    <div class="modal-footer fixfooterbar"> 
        <a id="save" class="btn btn-primary">Save</a> 
        <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
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
    $(document).ready(function() {
        $('.table-fixed-header').prepFixedHeader().fixedHeader();
    });
</script>
