<div id="content-header">
    <div id="breadcrumb"> 
        <a class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a class="tip-bottom"><i class="icon-home"></i>Supplier Purchase Order Entry</a>
    </div>
</div>

<div class="container-fluid">
     <br/>
    <h5 style="font-family: verdana;font-size: 12px;">CREATE PURCHASE ORDER</h5>
    <div class="row-fluid">
        <div class="span12">
            <form action="#" method="post">
            <div class="widget-box" style="width: 55%;float: left">
                <div class="widget-title">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab1">Create Purchase Order</a></li>
                    </ul>
                </div>
                    <div class="widget-content tab-content">
                        <div id="tab1" class="tab-pane active">
                            <hr/>

                            <table style="width: 100%;">
                               <tr>
                                    <td style="width: 15%;">PO Number:*</td>
                                    <td style="width: 35%;"><input type="text" placeholder="PO Number" /></td>
                                    <td style="width: 15%;">Supplier Name</td>
                                    <td style="width: 35%;"><input type="text" placeholder="Supplier Name" /></td>
                                </tr>
                              <tr>
                                    <td style="width: 15%;">Billing Address:</td>
                                    <td style="width: 35%;"><input type="text"  placeholder="Billing Address" /></td>
                                    <td style="width: 15%;">Shipping Address:*</td>
                                    <td style="width: 35%;"><input type="text"  placeholder="Shipping Address" /></td>
                                </tr>
                               <tr>
                                    <td style="width: 15%;">Expected Delivery:*</td>
                                    <td style="width: 35%;"><input type="text"  placeholder="Expected Delivery" /></td>
                                    <td style="width: 15%;">Ship Via:*</td>
                                    <td style="width: 35%;"><input type="text"  placeholder="Ship Via" /></td>
                                </tr>
                                <tr>
                                    <td style="width: 15%;">Remark / Note :</td>
                                    <td style="width: 35%;"><input type="text"  placeholder="Remark / Note :" /></td>
                                </tr>
                            </table> 
                        </div>
                    </div>
            </div>
            <div class="widget-content nopadding">
                <div class="widget-box">
<!--                    <div class="widget-title"> <span class="icon">
                        </span>
                        <h5>Static table with Check Boxes</h5>
                    </div>-->
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped with-check">
                            <thead>
                                <tr>
                                    <th style="width: 55%;">Item</th>
                                    <th style="width: 10%;">Quantity</th>
                                    <th style="width: 10%;">Unit</th>
                                    <th style="width: 10%;">Rate</th>
                                    <th style="width: 15%;" >Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td ><input type="text"   placeholder="Enter Item" style="width: 100%;"/></td>
                                    <td><input type="text"   placeholder="Enter Qunatity" style="width: 100%;"/></td>
                                    <td ><input type="text"   placeholder="" style="width: 100%;"/></td>
                                    <td><input type="text"   placeholder="Enter Rate" style="width: 100%;"/></td>
                                    <td ><input type="text"   placeholder="" style="width: 100%;" /></td>
                                </tr>
                                 <tr>
                                    <td ><input type="text"   placeholder="Enter Item" style="width: 100%;"/></td>
                                    <td><input type="text"   placeholder="Enter Qunatity" style="width: 100%;"/></td>
                                    <td ><input type="text"   placeholder="" style="width: 100%;"/></td>
                                    <td><input type="text"   placeholder="Enter Rate" style="width: 100%;"/></td>
                                    <td ><input type="text"   placeholder="" style="width: 100%;" /></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <div class="modal-footer"> 
        <a id="save" class="btn btn-primary">Save</a> 
        <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
    </div>
</div>

