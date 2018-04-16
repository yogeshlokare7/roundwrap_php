<div id="content-header">
    <div id="breadcrumb"> 
        <a class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a class="tip-bottom"><i class="icon-home"></i>Customer Order Entry</a>
    </div>
</div>

<div class="container-fluid">
     <br/>
    <h5 style="font-family: verdana;font-size: 12px;">CREATE CUSTOMER ORDER</h5>
    <div class="row-fluid">
        <div class="span12">
            <form action="#" method="post">
            <div class="widget-box" style="width: 55%;float: left">
                <div class="widget-title">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab1">Create Order</a></li>
                    </ul>
                </div>
                    <div class="widget-content tab-content">
                        <div id="tab1" class="tab-pane active">
                            <hr/>

                            <table style="width: 100%;">
                               <tr>
                                    <td style="width: 15%;"><label class="control-label">Customer No:*</label></td>
                                    <td style="width: 35%;"><input type="text" placeholder="Customer Number" class="span11"/></td>
                                    <td style="width: 15%;"><label class="control-label">Company Name:*</label></td>
                                    <td style="width: 35%;"><input type="text" placeholder="Company Name" class="span11"/></td>
                                </tr>
                              <tr>
                                    <td style="width: 15%;"><label class="control-label">Billing Address:</label></td>
                                    <td style="width: 35%;"><textarea class="span11"></textarea></td>
                                    <td style="width: 15%;"><label class="control-label">Shipping Address:*</label></td>
                                    <td style="width: 35%;"><textarea class="span11"></textarea></td>
                                </tr>
                               <tr>
                                    <td style="width: 15%;"><label class="control-label">Expected Delivery:*</label></td>
                                    <td style="width: 35%;">    <div data-date="12-02-2012" class="input-append date datepicker">
                                                <input type="text" value="12-02-2012"  data-date-format="mm-dd-yyyy" class="span11" >
                                                <span class="add-on"><i class="icon-th"></i></span> </div></td>
                                    <td style="width: 15%;"><label class="control-label">Ship Via:*</label></td>
                                     <td style="width: 35%;"><select><option value="select">Select</option></select></td>
                                </tr>
                                <tr>
                                    <td style="width: 15%;"><label class="control-label">Remark / Note :</label></td>
                                    <td style="width: 35%;" colspan="3"><input type="text"  placeholder="Remark / Note :" class="span11"/></td>
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
                                    <th style="width: 50%;">Item</th>
                                    <th style="width: 5%;">Stock</th>
                                    <th style="width: 5%;">Order</th>
                                    <th style="width: 5%;">Diff</th>
                                    <th style="width: 5%;">Unit</th>
                                    <th style="width: 10%;">Rate</th>
                                    <th style="width: 10%;">Discount</th>
                                    <th style="width: 10%;" >Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td ><input type="text"  class="span11" placeholder="Enter Item" style="width: 100%;"/></td>
                                    <td ><input type="text"  class="span11" placeholder="" style="width: 100%;"/></td>
                                    <td><input type="text"  class="span11" placeholder="" style="width: 100%;"/></td>
                                    <td ><input type="text"  class="span11" placeholder="" style="width: 100%;"/></td>
                                    <td ><input type="text"  class="span11" placeholder="" style="width: 100%;"/></td>
                                    <td><input type="text"  class="span11" placeholder="Enter Rate" style="width: 100%;"/></td>
                                    <td><input type="text"  class="span11" placeholder="Enter Discount" style="width: 100%;"/></td>
                                    <td ><input type="text"  class="span11" placeholder="" style="width: 100%;" /></td>
                                </tr>
                                  <tr>
                                    <td ><input type="text"  class="span11" placeholder="Enter Item" style="width: 100%;"/></td>
                                    <td ><input type="text"  class="span11" placeholder="" style="width: 100%;"/></td>
                                    <td><input type="text"  class="span11" placeholder="" style="width: 100%;"/></td>
                                    <td ><input type="text"  class="span11" placeholder="" style="width: 100%;"/></td>
                                    <td ><input type="text"  class="span11" placeholder="" style="width: 100%;"/></td>
                                    <td><input type="text"  class="span11" placeholder="Enter Rate" style="width: 100%;"/></td>
                                    <td><input type="text"  class="span11" placeholder="Enter Discount" style="width: 100%;"/></td>
                                    <td ><input type="text"  class="span11" placeholder="" style="width: 100%;" /></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <div class="modal-footer "> 
        <a id="save" class="btn btn-primary">Save</a> 
        <a href="index.php?pagename=manage_createorder" id="btnSubmitFullForm" class="btn btn-info">CANCEL</a>
    </div>
</div>
<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/bootstrap-colorpicker.js"></script> 
<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/maruti.js"></script> 
<script src="js/maruti.form_common.js"></script>


