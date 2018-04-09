<?php
$sqlgetsupplier = "SELECT * FROM customer_master WHERE id = " . filter_input(INPUT_GET, "customerid");
$resultset = MysqlConnection::fetchCustom($sqlgetsupplier);
$customer = $resultset[0];
echo "<pre>";
print_r($customer);
echo "</pre>";
?>


<div id="content-header">
    <div id="breadcrumb"> 
        <a class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a class="tip-bottom"><i class="icon-home"></i>Supplier Purchase Order Entry</a>
    </div>
</div>

<div class="container-fluid">
    <br/>
    <h5 style="font-family: verdana;font-size: 12px;">CREATE RECEIVING ORDER</h5>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Create Receive Order</h5>
                </div>
                <div class="widget-content tab-content">
                    <div id="tab1" class="tab-pane active">
                        <hr/>
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 10%;">SO NO:*</td>
                                <td style="width: 40%;"><input type="text" placeholder="SO ID" class="span11"/></td>
                                <td style="width: 10%;">Customer Name:*</td>
                                <td style="width: 40%;"><input type="text" placeholder="Customer Name" value="<?php echo $value["firstname"] ?>&nbsp;<?php echo $value["lastname"] ?>" class="span11"/></td>
                            </tr>
                            <tr>
                                <td style="width: 15%;"><label class="control-label">Billing Address:*</label></td>
                                <td style="width: 35%;"><textarea class="span11" value="<?php echo $supplier["billto"] ?>"></textarea></td>
                                <td style="width: 15%;"><label class="control-label">Shipping Address:*</label></td>
                                <td style="width: 35%;"><textarea class="span11" value="<?php echo $supplier["shipto"] ?>"></textarea></td>
                            </tr>
<!--                               <tr>
                                <td style="width: 15%;">Delivery Date:*</td>
                                <td style="width: 35%;"><input type="text"  placeholder="Expected date" /></td>
                               
                            </tr>-->

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

