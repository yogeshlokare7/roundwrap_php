<hr/>
<table style="width: 100%;">

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
            <select name="sales_person_name" id="sales_person_name">
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
        <td><input type="checkbox" id="taxcheckbox">&nbsp;Use customer tax code</td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>
            <select name="taxInformation" id="taxInformation">
                <option value="">&nbsp;&nbsp;</option>
                <option value="1" ><< ADD NEW >></option>
            </select>
        </td>
        <td></td>
        <td></td>
    </tr>
    <tr><td colspan="4">&nbsp;</td></tr>
    <tr><td colspan="4">&nbsp;</td></tr>
</table>


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
                    <input type="text" name="	cust_type" id="	cust_type">
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



<!-- this is custom model dialog --->
<div id="addTaxInformation" class="modal hide" style="top: 10%;left: 50%;">
    <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3>Add Tax Information</h3>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" method="post" action="#" name="addTaxInformation" id="addTaxInformation" novalidate="novalidate">
            <label class="control-label">Code:</label>
            <div class="controls"><input type="text" name="taxcode" id="taxcode"></div>
            <label class="control-label">Description:</label>
            <div class="controls"><textarea name="taxdescription" id="taxdescription" style="resize: none;height: 50px"></textarea></div>
            <div class="control-group">
                <table class="table" id="addtax">
                    <tr>
                        <td>Tax Name</td>
                        <td>Percent</td>
                        <td>Exempt</td>
                    </tr>
                    <tr>
                        <td>GST</td>
                        <td><input type="text" name="gst"></td>
                        <td><input type="checkbox" name="gstexempt"></td>
                    </tr>
                    <tr>
                        <td>PST</td>
                        <td><input type="text" name="pst"></td>
                        <td><input  type="checkbox" name="pstexempt"><a style="margin-left: 20px;float:center;margin-bottom: 10px;" class="icon-plus" href="#"  ></a></td>

                    </tr>
                </table>
            </div>
        </form>
    </div>

    <div class="modal-footer"> 
        <a id="saveTaxInformation" data-dismiss="modal" class="btn btn-primary ">Save</a> 
        <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
    </div>
</div>
<!-- this is model dialog --->

<script>
    jQuery(function () {
        var counter = 1;
        jQuery('a.icon-plus').click(function (event) {
            event.preventDefault();

            var newRow = jQuery('<tr><td><input type="text" name="" style="width:50px;"></td>' +
                    counter + '<td><input type="text" name=""></td>' +
                    counter + '<td><input style="width: 15px;height: 19px; filter: alpha(opacity:0);display: inline-block;background: none;margin-left: 2px;" type="checkbox" name="pstexempt" class="checker input" >\n\
                               <a class="icon-trash" href="#"  style="margin-left: 27px;" ></a></td>');
            counter++;
            jQuery('#addtax').append(newRow);

        });
    });

    $(document).ready(function () {

        $("#addtax").on('click', 'a.icon-trash', function () {
            $(this).closest('tr').remove();
        });

    });
    reload();
    $("#customerType").click(function () {
        var valueModel = $("#customerType").val();
        if (valueModel === "1") {
            $('#addCustomerType').modal('show');
        }
    });
    $("#saveCustomerType").click(function () {
        var type = "customer_type";
        var name = $("#addname").val();
        var description = $("#adddescription").val();
        var discount = $("#adddiscount").val();

        var dataString = "type=" + type + "&name=" + name + "&description=" + description + "&discount=" + discount;
        $.ajax({
            type: 'POST',
            url: 'customertype/savecustomertype_ajax.php',
            data: dataString
        }).done(function (data) {
            reload();
        }).fail(function () {
        });
    });

    $("#rep").click(function () {
        var valueModel = $("#rep").val();
        if (valueModel === "1") {
            $('#addRepresentative').modal('show');
        }
    });
    $("#saveRepresentative").click(function () {
        var type = "representative";
        var firstname = $("#firstname").val();
        var lastname = $("#lastname").val();

        var dataString = "type=" + type + "&name=" + firstname + "&description=" + lastname;
        $.ajax({
            type: 'POST',
            url: 'customermaster/saverepresentative_ajax.php',
            data: dataString
        }).done(function (data) {
            reload();
        }).fail(function () {
        });
    });

    $("#paymentTerm").click(function () {
        var valueModel = $("#paymentTerm").val();
        if (valueModel === "1") {
            $('#addPaymentTerm').modal('show');
        }
    });
    $("#savePaymentT").click(function () {
        var type = "paymentterm";
        var code = $("#termcode").val();
        var name = $("#termname").val();
        var description = $("#termdescription").val();

        var dataString = "type=" + type + "&name=" + name + "&description=" + description + "&code=" + code;
        $.ajax({
            type: 'POST',
            url: 'customermaster/savepayterm_ajax.php',
            data: dataString
        }).done(function (data) {
            reload();
        }).fail(function () {
        });
    });

    $("#taxInformation").click(function () {
        var valueModel = $("#taxInformation").val();
        if (valueModel === "1") {
            $('#addTaxInformation').modal('show');
        }
    });
    $("#saveTaxInformation").click(function () {

        var taxcode = $("#taxcode").val();
        var taxdescription = $("#taxdescription").val();
        var gst = $("#gst").val();
        var pst = $("#pst").val();
        var gstexempt = $("#gstexempt").val();
        var pstexempt = $("#pstexempt").val();
        var description = $("#termdescription").val();

        var dataString = "taxcode=" + taxcode + "&taxdescription=" + taxdescription + "&gst=" + gst + "&pst=" + pst + "&gstexempt=" + gstexempt + "&pstexempt=" + pstexempt + "&description" + description;
        $.ajax({
            type: 'POST',
            url: 'customermaster/savepayterm_ajax.php',
            data: dataString
        }).done(function (data) {
            reload();
        }).fail(function () {
        });
    });



    function reload() {
        $(document).ready(function () {
            $.ajax({
                type: 'GET',
                url: 'customertype/listcustomertype_ajax.php',
                dataType: "json",
                success: function (data) {
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
                success: function (data) {
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
                success: function (data) {
                    var paymentTerm = ('#paymentTerm');
                    for (var i = 0; i < data.length; i++) {
                        $(paymentTerm).append('<option value=' + data[i].id + '>(' + data[i].code + ')' + data[i].name + '</option>');
                    }
                }
            });

            $.ajax({
                type: 'GET',
                url: 'customermaster/listpaymentterm_ajax.php',
                dataType: "json",
                success: function (data) {
                    var paymentTerm = ('#paymentTerm');
                    for (var i = 0; i < data.length; i++) {
                        $(paymentTerm).append('<option value=' + data[i].id + '>(' + data[i].code + ')' + data[i].name + '</option>');
                    }
                }
            });
        });
    }

    $(function () {
        $('#taxcheckbox').click('#taxInformation', toggleSelection);
    });

    function toggleSelection(element) {
        if (this.checked) {
            $(element.data).attr('disabled', 'disabled');
        } else {
            $(element.data).removeAttr('disabled');
        }
    }
</script>