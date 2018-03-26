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
                                <option value="1">&nbsp;</option>
                                <option value="1">1 %</option>
                                <?php for ($index = 5; $index <= 100; $index+=5) { ?>
                                    <option value="<?php echo $index ?>"><?php echo $index ?>%</option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="control-label">Term</label></td>
                        <td>
                            <select name="paymentTerm" id="paymentTerm" style="margin-top: 5px;">
                                <option value="">&nbsp;&nbsp;</option>
                                <option value="1" ><< ADD NEW >></option>
                            </select>
                        </td>
                        <td><label class="control-label">Rep</label></td>
                        <td>
                            <select name="rep" id="rep">
                                <option value="">&nbsp;&nbsp;</option>
                                <option value="1" ><< ADD NEW >></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Business No</td>
                        <td><input type="text" name="alteremail" id="alteremail"  value="<?php echo filter_input(INPUT_POST, "alteremail") ?>" ></td>
                        <td>Image</td>
                        <td><input type="file"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="checkbox">&nbsp;Use customer tax code</td>
                        <td>
                            
                        </td>
                        <td></td>
                    </tr>
                    <tr><td colspan="4">&nbsp;</td></tr>
                    <tr><td colspan="4">&nbsp;</td></tr>
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

<!-- this is custom model dialog --->
<div id="addRepresentative" class="modal hide" style="top: 10%;left: 50%;">
    <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3>Add New Representative Type</h3>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" method="post" action="#" name="addRepresentative" id="addRepresentative" novalidate="novalidate">
            <div class="control-group">
                <label class="control-label">First Name:</label>
                <div class="controls">
                    <input type="text" name="firstname" id="firstname">

                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Last Name:</label>
                <div class="controls">
                    <input type="text" name="lastname" id="lastname">
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer"> 
        <a id="saveRepresentative" data-dismiss="modal" class="btn btn-primary">Save</a> 
        <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
    </div>
</div>
<!-- this is model dialog --->

<!-- this is custom model dialog --->
<div id="addPaymentTerm" class="modal hide" style="top: 10%;left: 50%;">
    <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3>Add New Representative Type</h3>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" method="post" action="#" name="addPaymentT" id="addPaymentT" novalidate="novalidate">
            <div class="control-group">
                <label class="control-label">Code:</label>
                <div class="controls">
                    <input type="text" name="termcode" id="termcode">

                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Term:</label>
                <div class="controls">
                    <input type="text" name="termname" id="termname">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Description:</label>
                <div class="controls">
                    <textarea name="termdescription" id="termdescription" style="resize: none;height: 50px"></textarea>
                </div>
            </div>
        </form>
    </div>

    <div class="modal-footer"> 
        <a id="savePaymentT" data-dismiss="modal" class="btn btn-primary">Save</a> 
        <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
    </div>
</div>
<!-- this is model dialog --->

<script>
    reload();
    $("#customerType").click(function() {
        var valueModel = $("#customerType").val();
        if (valueModel === "1") {
            $('#addCustomerType').modal('show');
        }
    });
    $("#saveCustomerType").click(function() {
        var type = "customer_type";
        var name = $("#addname").val();
        var description = $("#adddescription").val();
        var discount = $("#adddiscount").val();

        var dataString = "type=" + type + "&name=" + name + "&description=" + description + "&discount=" + discount;
        $.ajax({
            type: 'POST',
            url: 'customertype/savecustomertype_ajax.php',
            data: dataString
        }).done(function(data) {
            reload();
        }).fail(function() {
        });
    });

    $("#rep").click(function() {
        var valueModel = $("#rep").val();
        if (valueModel === "1") {
            $('#addRepresentative').modal('show');
        }
    });
    $("#saveRepresentative").click(function() {
        var type = "representative";
        var firstname = $("#firstname").val();
        var lastname = $("#lastname").val();

        var dataString = "type=" + type + "&name=" + firstname + "&description=" + lastname;
        $.ajax({
            type: 'POST',
            url: 'customermaster/saverepresentative_ajax.php',
            data: dataString
        }).done(function(data) {
            reload();
        }).fail(function() {
        });
    });

    $("#paymentTerm").click(function() {
        var valueModel = $("#paymentTerm").val();
        if (valueModel === "1") {
            $('#addPaymentTerm').modal('show');
        }
    });
    $("#savePaymentT").click(function() {
        var type = "paymentterm";
        var code = $("#termcode").val();
        var name = $("#termname").val();
        var description = $("#termdescription").val();

        var dataString = "type=" + type + "&name=" + name + "&description=" + description + "&code=" + code;
        $.ajax({
            type: 'POST',
            url: 'customermaster/savepayterm_ajax.php',
            data: dataString
        }).done(function(data) {
            reload();
        }).fail(function() {
        });
    });



    function reload() {
        $(document).ready(function() {
            $.ajax({
                type: 'GET',
                url: 'customertype/listcustomertype_ajax.php',
                dataType: "json",
                success: function(data) {
                    var customerType = ('#customerType');
                    for (var i = 0; i < data.length; i++) {
                        $(customerType).append('<option value=' + data[i].id + '>' + data[i].name + '</option>');
                    }
                }
            });

            $.ajax({
                type: 'GET',
                url: 'customermaster/listrepresentative_ajax.php',
                dataType: "json",
                success: function(data) {
                    var rep = ('#rep');
                    for (var i = 0; i < data.length; i++) {
                        $(rep).append('<option value=' + data[i].id + '>' + data[i].name + ' ' + data[i].description + '</option>');
                    }
                }
            });

            $.ajax({
                type: 'GET',
                url: 'customermaster/listpaymentterm_ajax.php',
                dataType: "json",
                success: function(data) {
                    var paymentTerm = ('#paymentTerm');
                    for (var i = 0; i < data.length; i++) {
                        $(paymentTerm).append('<option value=' + data[i].id + '>(' + data[i].code + ')' + data[i].name + '</option>');
                    }
                }
            });
        });
    }
</script>