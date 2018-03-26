<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="View Customer Master" class="tip-bottom">Create New Customer</a>
    </div>
</div>
<div class="container-fluid" >
    <br/>
    <h5 style="font-family: verdana;font-size: 12px;">CREATE NEW CUSTOMER</h5>
    <div class="widget-box" style="width: 47%;float: left">
        <div class="widget-title">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab1">Company Information </a></li>
                <li><a data-toggle="tab" href="#tab2">Additional Information</a></li>
                <li><a data-toggle="tab" href="#tab3">Payment Information</a></li>
            </ul>
        </div>
        <div class="widget-content tab-content">
            <div id="tab1" class="tab-pane active">
                <hr/>
                <table style="width: 100%;">
                    <tr>
                        <td><label class="control-label">Company Name</label></td>
                        <td><input type="text" name="cust_companyname" autofocus="" value="<?php echo filter_input(INPUT_POST, "cust_companyname") ?>" id="cust_companyname"></td>
                        <td>Contact</td>
                        <td><input type="text" name="sales_person_name" value="<?php echo filter_input(INPUT_POST, "sales_person_name") ?>"  id="sales_person_name"></td>
                    </tr>
                    <tr>
                        <td><label class="control-label"></label></td>
                        <td>
                            Mr. <input type="radio" name="sal" value="1">
                            Ms. <input type="radio" name="sal"  value="0">
                        </td>
                        <td><label class="control-label">Phone</label></td>
                        <td><input type="text" name="" id=""  value="<?php echo filter_input(INPUT_POST, "") ?>" ></td>
                    </tr>
                    <tr>
                        <td><label class="control-label">First Name</label></td>
                        <td><input type="text" name="" id=""  value="<?php echo filter_input(INPUT_POST, "") ?>" ></td>
                        <td><label class="control-label">Fax</label></td>
                        <td><input type="text" name="cust_fax" id="cust_fax"  value="<?php echo filter_input(INPUT_POST, "cust_fax") ?>" ></td>
                    </tr>
                    <tr>
                        <td><label class="control-label">Last Name</label></td>
                        <td><input type="text" name="" id=""  value="<?php echo filter_input(INPUT_POST, "") ?>" ></td>
                        <td><label class="control-label">Alt.Ph</label></td>
                        <td><input type="text" name="alterno1" id="alterno1"  value="<?php echo filter_input(INPUT_POST, "alterno1") ?>" ></td>
                    </tr>
                    <tr>
                        <td><label class="control-label">Alt.Contact</label></td>
                        <td><input type="text" name="altercontact" id="altercontact"  value="<?php echo filter_input(INPUT_POST, "altercontact") ?>" ></td>
                        <td><label class="control-label">Email</label></td>
                        <td><input type="text" name="alteremail" id="alteremail"  value="<?php echo filter_input(INPUT_POST, "alteremail") ?>" ></td>
                    </tr>

                    <tr>
                        <td>Bill To</td>
                        <td><textarea style="resize: none;height: 60px;line-height: 20px;" name="billto"></textarea></td>
                        <td>
                            <input type="checkbox" value="Copy">
                            Ship To
                        </td>
                        <td><textarea  style="resize: none;height: 60px;line-height: 20px;"  name="shipto"></textarea></td>
                    </tr>
                </table> 
            </div>
            <div id="tab2" class="tab-pane">
                <hr/>
                <table style="width: 100%;">
                    <tr>
                        <td><label class="control-label">Alt.Contact</label></td>
                        <td><input type="text" name="altercontact" id="altercontact"  value="<?php echo filter_input(INPUT_POST, "altercontact") ?>" ></td>
                        <td><label class="control-label">Email</label></td>
                        <td><input type="text" name="alteremail" id="alteremail"  value="<?php echo filter_input(INPUT_POST, "alteremail") ?>" ></td>
                    </tr>
                    <tr>
                        <td><label class="control-label">Customer Type</label></td>
                        <td>
                            <select name="customerType" id="customerType">
                                <option value="">&nbsp;&nbsp;</option>
                                <option value="1" ><< ADD NEW >></option>
                                <option value=""></option>
                            </select>
                        </td>
                        <td><label class="control-label">Discount</label></td>
                        <td>
                            <select name="discount" id="discount">
                                <option value="add"><< ADD NEW >></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
            <div id="tab3" class="tab-pane">
                <hr/>
                <table style="width: 100%;">
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a href="#tab2" data-toggle="tab" class="btn btn-mini">NEXT</a></td>
                    </tr>
                </table>
            </div>
        </div>                            
    </div>
</div>


<!-- this is custom model dialog --->
<div id="addCustomerType" class="modal hide" style="top: 10%;left: 50%;">
    <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3>Add New Customer Type</h3>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" method="post" action="#" name="addCustomerType" id="addCustomerType" novalidate="novalidate">
            <div class="control-group">
                <label class="control-label">CUSTOMER TYPE *:</label>
                <div class="controls">
                    <input type="hidden" name="addtype" id="addtype" value="customer_type">
                    <input type="text" name="addname" id="addname">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">DESCRIPTION:</label>
                <div class="controls">
                    <input type="text" name="adddescription" id="adddescription">

                </div>
            </div>
            <div class="control-group">
                <label class="control-label">DISCOUNT:</label>
                <div class="controls">
                    <input type="text" name="adddiscount" id="adddiscount">
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer"> 
        <a id="saveCustomerType" data-dismiss="modal" class="btn btn-primary">Save</a> 
        <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
    </div>
</div>
<!-- this is model dialog --->


<script>
    $("#customerType").click(function() {
        var valueModel = $("#customerType").val();
        if (valueModel === "1") {
            $('#addCustomerType').modal('show');
        }
    });
    $("#saveCustomerType").click(function() {
        var type = $("#addtype").val();
        var name = $("#addname").val();
        var description = $("#adddescription").val();
        var discount = $("#adddiscount").val();

        var dataString = "type=" + type + "&name=" + name + "&description=" + description + "&discount=" + discount;
        $.ajax({
            type: 'POST',
            url: 'customertype/savecustomertype_ajax.php',
            data: dataString
        }).done(function(data) {
            $('#img').hide();
        }).fail(function() {
        });
    });
</script>