<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="View Customer Master" class="tip-bottom">Create New Customer</a>
    </div>
</div>
<div class="container-fluid" >
    <br/>
    <h5 style="font-family: verdana;font-size: 12px;">CREATE NEW CUSTOMER</h5>
    <div class="widget-box" style="width: 90%;float: left">
        <div class="widget-title">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab1">Company Information </a></li>
                <li><a data-toggle="tab" href="#tab2">Additional Information</a></li>
                <li><a data-toggle="tab" href="#tab3">Payment Information</a></li>
            </ul>
        </div>
        <div class="widget-content tab-content">
            <div id="tab1" class="tab-pane active">
                <?php include 'customermaster/companyinfo.php'; ?>
            </div>
            <div id="tab2" class="tab-pane">
                <?php include 'customermaster/additionalinfo.php'; ?>
            </div>
            <div id="tab3" class="tab-pane">
                <?php include 'customermaster/paymentinfo.php'; ?>
            </div>
        </div>                            
    </div>
</div>

<!--
 this is custom model dialog -
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
 this is model dialog -

 this is custom model dialog -
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
 this is model dialog -

 this is custom model dialog -
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
 this is model dialog -



 this is custom model dialog -
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
                <table class="table">
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
                        <td><input type="checkbox" name="pstexempt"></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>

    <div class="modal-footer"> 
        <a id="saveTaxInformation" data-dismiss="modal" class="btn btn-primary">Save</a> 
        <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
    </div>
</div>
 this is model dialog -

<script>
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
</script>-->