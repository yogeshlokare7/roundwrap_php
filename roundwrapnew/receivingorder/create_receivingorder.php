<div id="content-header">
    <div id="breadcrumb"> 
        <a class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a class="tip-bottom"><i class="icon-home"></i>Receiving Order Entry</a>
    </div>
</div>

<div class="container-fluid">
     <br/>
    <h5 style="font-family: verdana;font-size: 12px;">CREATE RECEIVING ORDER</h5>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Create Receiving Order</h5>
                </div>
                <div class="widget-content tab-content">
                        <div id="tab1" class="tab-pane active">
                            <hr/>
                            <table style="width: 100%;">
                               <tr>
                                    <td style="width: 10%;">PO ID:*</td>
                                    <td style="width: 40%;"><input type="text" placeholder="PO ID" class="span11"/></td>
                                    <td style="width: 10%;">Supplier Name</td>
                                    <td style="width: 40%;"><input type="text" placeholder="Supplier Name" class="span11"/></td>
                                </tr>
                              <tr>
                                    <td style="width: 15%;"><label class="control-label">Billing Address:</label></td>
                                    <td style="width: 35%;"><textarea class="span11"></textarea></td>
                                    <td style="width: 15%;"><label class="control-label">Shipping Address:*</label></td>
                                    <td style="width: 35%;"><textarea class="span11"></textarea></td>
                                </tr>
                               <tr>
                                    <td style="width: 15%;">Receiving Delivery:*</td>
                                    <td style="width: 35%;"><div data-date="12-02-2012" class="input-append date datepicker">
                                                <input type="text" value="12-02-2012"  data-date-format="mm-dd-yyyy" class="span11" >
                                                <span class="add-on"><i class="icon-th"></i></span> </div></td>
                                   
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
                                            <th style="width:50%;">Item Details</th>
                                            <th style="width:20%;">Ordered</th>
                                            <th style="width:20%">Receive</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td ><input type="text"  placeholder="Enter Item" style="width: 100%;" class="span11"/></td>
                                            <td ><input type="text"  placeholder="ordered item " style="width: 100%;" class="span11"/></td>
                                            <td ><input type="text"  placeholder="received item " style="width: 100%;" class="span11"/></td>
                                        </tr>
                                        <tr>
                                            <td ><input type="text"  placeholder="Enter Item" style="width: 100%;" class="span11"/></td>
                                            <td ><input type="text"  placeholder="ordered item " style="width: 100%;" class="span11"/></td>
                                            <td ><input type="text"  placeholder="received item " style="width: 100%;" class="span11"/></td>
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
<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/bootstrap-colorpicker.js"></script> 
<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/maruti.js"></script> 
<script src="js/maruti.form_common.js"></script>

