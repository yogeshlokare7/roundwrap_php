<script>
    function chkNumericKey(event) {
        var charCode = (event.which) ? event.which : event.keyCode;
        if ((charCode >= 48 && charCode <= 57) || charCode == 46 || charCode == 45) {
            return true;
        } else {
            return false;
        }
    }
    $(document).ready(function ($) {
        $("#creditcardno").mask("9999-9999-9999-9999");
    });
</script>
<hr/>
<table style="width: 100%;" id="payment">
    <tr>
        <td><label class="control-label">Account No</label></td>
        <td><input type="text" name="cust_accnt_no" onkeypress="return chkNumericKey(event)" autofocus="" value="<?php echo filter_input(INPUT_POST, "cust_accnt_no") ?>" minlenght="2" maxlength="13" id="cust_accnt_no"></td>

        <td>Currency</td>
        <td><select name="currency" id="currency">
                <option value="CAN">Canada Dollar</option>
                <option value="INR" >Indian Rupee</option>
            </select></td>

        <td>Balance</td>
        <td><input type="text" name="balance" onkeypress="return chkNumericKey(event)" minlenght="2" maxlength="50" id="balance"  value="<?php echo filter_input(INPUT_POST, "balance") ?>" ></td>
        <td><label class="control-label">Credit Limit</label></td>
        <td><input type="text" name="creditlimit" onkeypress="return chkNumericKey(event)" autofocus="" value="<?php echo filter_input(INPUT_POST, "creditlimit") ?>" minlenght="2" maxlength="" id="creditlimit"></td>
    </tr>
    <tr>
        <td><label class="control-label">Credit Card No.</label></td>
        <td><input type="text" name="creditcardno[]" onkeypress="return chkNumericKey(event)" id="creditcardno" minlenght="2" maxlength="13"  value="<?php echo filter_input(INPUT_POST, "creditcardno[]") ?>" ></td>
        <td><label class="control-label">Name on Card</label></td>
        <td><input type="text" name="nameoncard[]" id="nameoncard"  minlenght="2" maxlength="30"  value="<?php echo filter_input(INPUT_POST, "nameoncard[]") ?>" ></td>
        <td><label class="control-label">Exp. Date</label></td>
        <td><input type="date" name="expdate[]" id="expdate"  value="<?php echo filter_input(INPUT_POST, "expdate[]") ?>" ></td>
        <td><label class="control-label">CVV</label></td>
        <td><input style="width: 40px" type="text" onkeypress="return chkNumericKey(event)" name="cvv[]" id="cvv" minlength="2" maxlength="3" value="<?php echo filter_input(INPUT_POST, "cvv[]") ?>" ><a style="  margin-left: 20px;float:center;margin-bottom: 10px;" class="icon-plus" href="#"  ></a></td>
    </tr>
</table> 
<br/>
<hr/>

<input type="button" id="btnCmpPrev3" value="Previous" class="btn btn-info" href="#tab1"></td>
<button type="submit" id="btnSubmitFullForm" class="btn btn-success">Submit</button>

<script type="text/javascript">
    jQuery(function () {
        var counter = 1;
        jQuery('a.icon-plus').click(function (event) {
            event.preventDefault();
            var newRow = jQuery('<tr><td><label class="control-label">Credit Card No.</label></td><td><input type="text" name="creditcardno[]" onkeypress="return chkNumericKey(event)" minlenght="2" maxlength="13" id="creditcardno' + counter + '"  value="<?php echo filter_input(INPUT_POST, "creditcardno") ?>" ></td>' +
                    counter + '<td><label class="control-label">Name on Card</label></td><td><input type="text" name="nameoncard[]" minlenght="2" maxlength="30"  id="nameoncard"  value="<?php echo filter_input(INPUT_POST, "nameoncard") ?>" ></td>' +
                    counter + '<td><label class="control-label">Exp. Date</label></td><td><input type="date" name="expdate[]" id="expdate"  value="<?php echo filter_input(INPUT_POST, "expdate[]") ?>" ></td>' +
                    counter + '<td><label class="control-label">CVV</label></td><td><input style="width: 40px" type="text" onkeypress="return chkNumericKey(event)" minlenght="2" maxlength="3" name="cvv[]" id="nameoncard"  value="<?php echo filter_input(INPUT_POST, "nameoncard[]") ?>" ><a style="margin-left: 20px;float:center;margin-bottom: 10px;" class="icon-trash" href="#"  ></a></td>');
            $("#creditcardno" + counter).mask("9999-9999-9999-9999");

            counter++;
            jQuery('#payment').append(newRow);

        });
    });

    $(document).ready(function () {

        $("#payment").on('click', 'a.icon-trash', function () {
            $(this).closest('tr').remove();
        });

    });


    $("#btnSubmitFullForm").click(function () {
        alert("dsadas");
        var json = convertFormToJSON("#frmCustomerSubmit");
        console.log(json);
//        $.ajax({
//            type: 'POST',
//            url: '',
//            data: json
//        }).done(function (data) {
//        }).fail(function () {
//        });
    });
</script>