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
                                    <td style="width: 40%;"><input type="text" placeholder="SO ID" /></td>
                                    <td style="width: 10%;">Customer Name:*</td>
                                    <td style="width: 40%;"><input type="text" placeholder="Customer Name" /></td>
                                </tr>
                              <tr>
                                    <td style="width: 10%;">Bill TO:*</td>
                                    <td style="width: 40%;"><input type="text"  placeholder="Billing Address" /></td>
                                    <td style="width: 10%;">Ship To:*</td>
                                    <td style="width: 40%;"><input type="text"  placeholder="Shipping Address" /></td>
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
                                            <td ><input type="text"  placeholder="Item" style="width: 100%;"/></td>
                                            <td ><input type="text"  placeholder="item description" style="width: 100%;"/></td>
                                            <td ><input type="text"  placeholder="ordered quantity" style="width: 100%;"/></td>
                                            <td ><input type="text"  placeholder="stock quantity" style="width: 100%;"/></td>
                                            <td ><input type="text"  placeholder="stock status" style="width: 100%;"/></td>
                                            <td ><input type="text"  placeholder="sales qty" style="width: 100%;"/></td>
                                        </tr>
                                        <tr>
                                            <td ><input type="text"  placeholder="Item" style="width: 100%;"/></td>
                                            <td ><input type="text"  placeholder="item description" style="width: 100%;"/></td>
                                            <td ><input type="text"  placeholder="ordered quantity" style="width: 100%;"/></td>
                                            <td ><input type="text"  placeholder="stock quantity" style="width: 100%;"/></td>
                                            <td ><input type="text"  placeholder="stock status" style="width: 100%;"/></td>
                                            <td ><input type="text"  placeholder="sales qty" style="width: 100%;"/></td>
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

