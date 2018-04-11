<script>
    function chkNumericKey(event) {
        var charCode = (event.which) ? event.which : event.keyCode;
        if ((charCode >= 48 && charCode <= 57) || charCode == 46 || charCode == 45) {
            return true;
        } else {
            return false;
        }
    }
</script>
<style>
    select{
        text-transform: uppercase;
    }
</style>
<hr/>

<?php
$sqlcustomertypepredata = MysqlConnection::fetchCustom("SELECT id,name FROM generic_entry where type = 'customer_type' ORDER BY id DESC ;");
$sqlpaymenttermdata = MysqlConnection::fetchCustom("SELECT id,name,code FROM generic_entry where type = 'paymentterm' ORDER BY id DESC ;");
$sqlrepresentativetermdata = MysqlConnection::fetchCustom("SELECT id,name,code FROM generic_entry where type = 'representative' ORDER BY id DESC ;");
$sqltaxinfodata = MysqlConnection::fetchCustom("SELECT * FROM taxinfo_table ORDER BY id DESC ;");
?>
<fieldset class="well the-fieldset">
    <table  style="width: 80%;vertical-align: top" border="0"> 
        <tr>
            <td><label class="control-label">Customer Type</label></td>
            <td>
                <select name="cust_type" id="cust_type"> 
                    <option value="">&nbsp;&nbsp;</option>
                    <option value="1" ><< ADD NEW >></option>
                    <?php foreach ($sqlcustomertypepredata as $key => $value) { ?>
                        <option value="<?php echo $value["id"] ?>"><?php echo $value["name"] ?></option>
                    <?php } ?>
                </select>
            </td>
            <td><label class="control-label">Discount</label></td>
            <td>
                <select name="discount" id="discount">
                    <option value="0">&nbsp;</option>
                    <option value="1">1 %</option>
                    <?php for ($index = 5; $index <= 100; $index+=5) { ?>
                        <option value="<?php echo $index ?>"><?php echo $index ?>%</option>
                    <?php } ?>
                </select>
            </td>
            <td><label class="control-label">Term</label></td>
            <td>
                <select name="paymentTerm" id="paymentTerm" style="margin-top: 5px;">
                    <option value="">&nbsp;&nbsp;</option>
                    <option value="1" ><< ADD NEW >></option>
                    <?php foreach ($sqlpaymenttermdata as $key => $value) { ?>
                        <option value="<?php echo $value["id"] ?>"><?php echo $value["code"] ?> - <?php echo $value["name"] ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>

            <td><label class="control-label">Rep</label></td>
            <td>
                <select name="sales_person_name" id="sales_person_name">
                    <option value="">&nbsp;&nbsp;</option>
                    <option value="1" ><< ADD NEW >></option>
                    <?php
                    foreach ($sqlrepresentativetermdata as $key => $value) {
                        ?>
                        <option value="<?php echo $value["id"] ?>"><?php echo $value["name"] ?>  <?php echo $value["description"] ?></option>  
                        <?php
                    }
                    ?>
                </select>
            </td>
            <td>Business No</td>
            <td><input type="text" name="businessno" minlenght="2" maxlength="20" id="businessno"  value="<?php echo filter_input(INPUT_POST, "businessno") ?>" ></td>
            <td>Certificate</td>
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
                    <?php foreach ($sqltaxinfodata as $key => $value) { ?>
                        <option  value='<?php echo $value["id"] ?>'><?php echo $value["taxcode"] ?> - <?php echo $value["taxname"] ?> - <?php echo $value["taxvalues"] ?>%</option>
                    <?php } ?>
                </select>
            </td>
        </tr>

    </table>
</fieldset>
<hr/>
<input type="button" id="btnCmpPrev2" value="PREVIOUS" class="btn btn-info" href="#tab2">
<input type="button" id="btnCmpNext3" value="NEXT" class="btn btn-info" href="#tab4">

<!-- this is custom model dialog --->
<div id="custtypemodel" class="modal hide" style="top: 10%;left: 50%;width: 420px;">
    <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3>ADD NEW CUSTOMER TYPE</h3>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" method="post" action="#" name="cust_type" id="cust_type" novalidate="novalidate">
            <table>
                <tr>
                    <td>CUSTOMER&nbsp;TYPE&nbsp;*:&nbsp;</td>
                    <td><input type="text" autofocus="" required="true" maxlength="30" minlength="5" name="cuscusttype" id="cuscusttype"></td>
                </tr>
                <tr>
                    <td>DESCRIPTION&nbsp;:&nbsp;</td>
                    <td><input type="text" name="adddescription" id="adddescription"></td>
                </tr>
            </table>
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
        <h3>ADD NEW REPRESENTATIVE TYPE</h3>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" method="post" action="#" name="addRepresentative" id="addRepresentative" novalidate="novalidate">
            <div class="control-group">
                <label class="control-label">First Name:</label>
                <div class="controls">
                    <input type="text" name="firstname" id="firstname1">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Last Name:</label>
                <div class="controls">
                    <input type="text" name="lastname" id="lastname1">
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
        <h3>ADD PAYMENT TERM</h3>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" method="post" action="#" name="addPaymentT" id="addPaymentT" novalidate="novalidate">
            <table style="width: 100%;vertical-align: top">
                <tr style="height: 35px">
                    <td style="width: 100px;">Code:</td>
                    <td><input type="text" autofocus="" required="" minlength="3" maxlength="15" name="termcode" id="termcode" style="width: 40%"></td>
                </tr>
                <tr style="height: 35px">
                    <td>Term:</td>
                    <td><input type="text" name="termname" id="termname"  minlength="3" maxlength="30"  style="width: 90%"></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td colspan="3">
                        <textarea  name="termdescription" id="termdescription" style="resize: none;height: 50px;width: 90%"></textarea>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <div class="modal-footer" style="text-align: center"> 
        <a id="savePaymentT" data-dismiss="modal" class="btn btn-primary">Save</a> 
        <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
    </div>
</div>
<!-- this is model dialog --->



<!-- this is custom model dialog --->
<div id="addTaxInformation" class="modal hide" style="top: 10%;left: 50%;">
    <div class="modal-header" style="text-align: center">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3>ADD TAX INFORMATION</h3>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" method="post" action="#" name="addTaxInformation" id="addTaxInformation" novalidate="novalidate">
            <div class="control-group">
                <table class="table" id="addtax" style="width: 100%">
                    <tr>
                        <td>Code</td>
                        <td>Tax Name</td>
                        <td>Percent</td>
                        <td>Exempt</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="taxcode[]" autofocus=""  style="width: 25px;" id="taxtaxname[]" value="G"></td>
                        <td><input type="text" name="taxtaxname[]" style="width: 75px;" id="taxtaxname[]" value="GST"></td>
                        <td><input type="text" name="taxtaxvalues[]"  id="taxtaxvalues[]"></td>
                        <td><input type="checkbox" name="taxgstexempt[]" id="taxgstexempt[]" value="Y"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="taxcode[]" style="width: 25px;" id="taxtaxname[]" value="P"></td>
                        <td><input type="text" name="taxtaxname[]" style="width: 75px;" id="taxtaxname[]" value="PST"></td>
                        <td><input type="text" name="taxtaxvalues[]" id="taxtaxvalues[]" ></td>
                        <td><input  type="checkbox" name="taxisExempt[]" id="taxisExempt[]"></td>
                        <td><a class="icon-plus" href="#"  ></a></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>

    <div class="modal-footer" style="text-align: center"> 
        <a id="saveTaxInformation" data-dismiss="modal" class="btn btn-primary ">Save</a> 
        <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
    </div>
</div>
<!-- this is model dialog --->

<script>
    jQuery(function() {
        var counter = 1;
        jQuery('a.icon-plus').click(function(event) {
            event.preventDefault();
            var newRow = jQuery('<tr>'
                    + '<td><input type="text" name="taxcode[]" style="width: 25px;" id="taxtaxname[]" ></td>'
                    + '<td><input type="text" name="taxtaxname[]" style="width: 75px;" id="taxtaxname[]" ></td>'
                    + '<td><input type="text" name="taxtaxvalues[]" id="taxtaxvalues[]" ></td>'
                    + '<td><input  type="checkbox" name="taxisExempt[]" id="taxisExempt[]"></td>'
                    + '<td><a class="icon-trash" href="#"  ></a></td>'
                    + '</tr>');
            counter++;
            jQuery('#addtax').append(newRow);
        });
    });

    $(document).ready(function() {
        $("#addtax").on('click', 'a.icon-trash', function() {
            $(this).closest('tr').remove();
        });

    });
    $("#cust_type").click(function() {
        var valueModel = $("#cust_type").val();
        if (valueModel === "1") {
            $('#custtypemodel').modal('show');
        }
    });
    $("#saveCustomerType").click(function() {
        var type = "customer_type";
        var name = $("#cuscusttype").val();
        var description = $("#adddescription").val();

        var dataString = "type=" + type + "&name=" + name + "&description=" + description;
        $.ajax({
            type: 'POST',
            url: 'customertype/savecustomertype_ajax.php',
            data: dataString
        }).done(function(data) {
            $('#cust_type').append(data);
            $("#cuscusttype").val("");
            $("#adddescription").val("");
        }).fail(function() {
        });
    });

    $("#sales_person_name").click(function() {
        var valueModel = $("#sales_person_name").val();
        if (valueModel === "1") {
            $('#addRepresentative').modal('show');
        }
    });
    $("#saveRepresentative").click(function() {
        var type = "representative";
        var firstname = $("#firstname1").val();
        var lastname = $("#lastname1").val();
        var dataString = "type=" + type + "&name=" + firstname + "&description=" + lastname;
        $.ajax({
            type: 'POST',
            url: 'customermaster/saverepresentative_ajax.php',
            data: dataString
        }).done(function(data) {
            $('#sales_person_name').append(data);
            $("#firstname1").val("");
            $("#lastname1").val("");
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
            $('#paymentTerm').append(data);
            $("#termcode").val("");
            $("#termname").val("");
            $("#termdescription").val("");
        }).fail(function() {
        });
    });

    $("#taxInformation").click(function() {
        var valueModel = $("#taxInformation").val();
        if (valueModel === "1") {
            $('#addTaxInformation').modal('show');
        }
    });
    $("#saveTaxInformation").click(function() {
//        var dataString = convertFormToJSON("addTaxInformation"); 
//        //taxcode  taxtaxname   taxtaxvalues   taxisExempt
        var taxcode = $("input[name='taxcode[]']").map(function() {
            return $(this).val();
        }).get();
        var taxtaxname = $("input[name='taxtaxname[]']").map(function() {
            return $(this).val();
        }).get();
        var taxtaxvalues = $("input[name='taxtaxvalues[]']").map(function() {
            return $(this).val();
        }).get();
        var taxisExempt = $("input[name='taxisExempt[]']").map(function() {
            return $(this).val();
        }).get();
        var dataString = "taxcode=" + taxcode + "&taxtaxname=" + taxtaxname + "&taxtaxvalues=" + taxtaxvalues + "&taxisExempt=" + taxisExempt;
        $.ajax({
            type: 'POST',
            url: 'customermaster/savetaxinfo_ajax.php',
            data: dataString
        }).done(function(data) {
            $("input[name='taxcode[]']").val("");
            $("input[name='taxtaxname[]']").val("");
            $("input[name='taxtaxvalues[]']").val("");
            $("input[name='taxisExempt[]']").val("");
        }).fail(function() {
        });
    });

    $(function() {
        $('#taxcheckbox').click('#taxInformation', toggleSelection);
    });

    function toggleSelection(element) {
        if (this.checked) {
            $(element.data).removeAttr('disabled');
        } else {
            $(element.data).attr('disabled', 'desabled')
        }
    }
</script>