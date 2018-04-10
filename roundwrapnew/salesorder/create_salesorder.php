<?php
$sqlgetsupplier = "SELECT * FROM customer_master WHERE id = " . filter_input(INPUT_GET, "customerId");
$resultset = MysqlConnection::fetchCustom($sqlgetsupplier);
$customer = $resultset[0];
$salesorderbumberarray = MysqlConnection::fetchCustom("SELECT count(id) as counter FROM sales_order");
$sonumber = "SO100" . $salesorderbumberarray[0]["counter"];


$sqlitemarray = MysqlConnection::fetchCustom("SELECT count(id) as counter FROM sales_order");

?>
<style>
    input, select, textarea{
        width: 80%;
        line-height: 15px;
    }

</style>

<div id="content-header">
    <div id="breadcrumb"> 
        <a class="tip-bottom"><i class="icon-home"></i>HOME</a>
        <a class="tip-bottom"><i class="icon-home"></i>CREATE SALES ORDER</a>
    </div>
</div>

<div class="container-fluid">
    <h5 style="font-family: verdana;font-size: 12px;">CREATE SALES ORDER</h5>
    <div class="row-fluid" style="margin-top: -15px;">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Create Receive Order</h5>
                </div>
                <div class="widget-content tab-content">
                    <div id="tab1" class="tab-pane active">
                        <table style="width: 80%">
                            <tr style="width: 50%;">
                                <td style="width: 15%;">SO&nbsp;NO:*</td>
                                <td style="width: 40%;"><input type="text" placeholder="SO ID" value="<?php echo $sonumber ?>" /></td>
                                <td style="width: 15%;">Customer&nbsp;Name:*</td>
                                <td style="width: 40%;"><input type="text" placeholder="Customer Name" value="<?php echo $customer["firstname"] ?>&nbsp;<?php echo $customer["lastname"] ?>" /></td>
                            </tr>
                            <tr>
                                <td style="width: 15%;"><label class="control-label">Billing&nbsp;Address:*</label></td>
                                <td style="width: 40%;"><textarea style="height: 60px;" ><?php echo $customer["billto"] ?></textarea></td>
                                <td style="width: 15%;"><label class="control-label">Shipping&nbsp;Address:*</label></td>
                                <td style="width: 40%;"><textarea  style="height: 60px;" ><?php echo $customer["shipto"] ?></textarea></td>
                            </tr>
                        </table> 
                    </div>
                </div>
                <div class="widget-content nopadding">
                    <div class="widget-box">
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped with-check">
                                <thead>
                                    <tr>
                                        <th style="width:20%;">Item Name</th>
                                        <th style="width:40%;">Item Description</th>
                                        <th style="width:10%;">Ordered Qty</th>
                                        <th style="width:10%">Stock Qty</th>
                                        <th style="width:10%">Stock Status</th>
                                        <th style="width:10">Sale Qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td ><input type="text"  class="span11" placeholder="Item" style="width: 100%;"/></td>
                                        <td ><input type="text"  class="span11" placeholder="item description" style="width: 100%;"/></td>
                                        <td ><input type="text"  class="span11" placeholder="ordered quantity" style="width: 100%;"/></td>
                                        <td ><input type="text"  class="span11" placeholder="stock quantity" style="width: 100%;"/></td>
                                        <td ><input type="text"  class="span11" placeholder="stock status" style="width: 100%;"/></td>
                                        <td ><input type="text"  class="span11" placeholder="sales qty" style="width: 100%;"/></td>
                                    </tr>
                                    <tr>
                                        <td ><input type="text"  class="span11" placeholder="Item" style="width: 100%;"/></td>
                                        <td ><input type="text"  class="span11" placeholder="item description" style="width: 100%;"/></td>
                                        <td ><input type="text"  class="span11" placeholder="ordered quantity" style="width: 100%;"/></td>
                                        <td ><input type="text"  class="span11" placeholder="stock quantity" style="width: 100%;"/></td>
                                        <td ><input type="text"  class="span11" placeholder="stock status" style="width: 100%;"/></td>
                                        <td ><input type="text"  class="span11" placeholder="sales qty" style="width: 100%;"/></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer"> 
        <a id="save" class="btn btn-primary">Save</a> 
        <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
    </div>
</div>

