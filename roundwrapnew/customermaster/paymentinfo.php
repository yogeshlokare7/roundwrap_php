<?php
if (!empty($customerid)) {
    $customerpaymentarray = MysqlConnection::fetchCustom("SELECT * FROM customer_payment WHERE cust_id = $customerid");
}
?>
<script>
    function chkNumericKey(event) {
        var charCode = (event.which) ? event.which : event.keyCode;
        if ((charCode >= 48 && charCode <= 57) || charCode === 46 || charCode === 45) {
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
        <td><input type="text" name="cust_accnt_no" onkeypress="return chkNumericKey(event)" autofocus="" value="<?php echo $customer["cust_accnt_no"] ?>" minlenght="2" maxlength="13" id="cust_accnt_no"></td>

        <td>Currency</td>
        <td><select name="currency" id="currency">
                <option value="CAN">Canada Dollar</option>
                <option value="INR" >Indian Rupee</option>
            </select></td>

        <td>Balance</td>
        <td><input type="text" name="balance" onkeypress="return chkNumericKey(event)" minlenght="2" maxlength="50" id="balance"  value="<?php echo $customer["balance"] ?>" ></td>
        <td><label class="control-label">Credit Limit</label></td>
        <td><input type="text" name="creditlimit" onkeypress="return chkNumericKey(event)" autofocus="" value="<?php echo $customer["creditlimit"] ?>" minlenght="2" maxlength="" id="creditlimit"></td>
    </tr>
    <?php
    if (count($customerpaymentarray) != 0) {
        $index = 1;
        foreach ($customerpaymentarray as $key => $value) {
            ?>
            <tr>
                <td><label class="control-label">Credit Card No.</label></td>
                <td><input type="text" name="cardnumber[]" onkeypress="return chkNumericKey(event)" id="cardnumber" minlenght="2" maxlength="13"  value="<?php echo $value["cardnumber"] ?>" ></td>
                <td><label class="control-label">Name on Card</label></td>
                <td><input type="text" name="nameoncard[]" id="nameoncard"  minlenght="2" maxlength="30"  value="<?php echo $value["nameoncard"] ?>" ></td>
                <td><label class="control-label">Exp. Date</label></td>
                <td><input type="date" name="expdate[]" id="expdate"  value="<?php echo $value["expdate"] ?>" ></td>
                <td><label class="control-label">CVV</label></td>
                <td>
                    <input style="width: 40px" type="text" onkeypress="return chkNumericKey(event)" name="cvvno[]" id="cvvno" minlength="2" maxlength="3" value="<?php echo $value["cvvno"] ?>" >
                    <?php
                    if ($index == 1) {
                        echo '<a style="margin-left: 20px;float:center;margin-bottom: 10px;" class="icon-plus" href="#" id="paymentInfoFrm" ></a>';
                    } else {
                        echo '<a style="margin-left: 20px;float:center;margin-bottom: 10px;" class="icon-trash" href="#" id="icon-trash" ></a>';
                    }
                    ?>
                </td>
            </tr>
            <?php
            $index++;
        }
    } else {
        ?>
        <tr>
            <td><label class="control-label">Credit Card No.</label></td>
            <td><input type="text" name="cardnumber[]" onkeypress="return chkNumericKey(event)" id="cardnumber" minlenght="2" maxlength="13"  value="<?php echo $value["cardnumber"] ?>" ></td>
            <td><label class="control-label">Name on Card</label></td>
            <td><input type="text" name="nameoncard[]" id="nameoncard"  minlenght="2" maxlength="30"  value="<?php echo $value["nameoncard"] ?>" ></td>
            <td><label class="control-label">Exp. Date</label></td>
            <td><input type="date" name="expdate[]" id="expdate"  value="<?php echo $value["expdate"] ?>" ></td>
            <td><label class="control-label">CVV</label></td>
            <td>
                <input style="width: 40px" type="text" onkeypress="return chkNumericKey(event)" name="cvvno[]" id="cvvno" minlength="2" maxlength="3" value="<?php echo $value["cvvno"] ?>" >
                <a style="margin-left: 20px;float:center;margin-bottom: 10px;" class="icon-plus" href="#" id="paymentInfoFrm" ></a>
            </td>
        </tr>
    <?php }
    ?>
</table> 
<br/>
<hr/>
<input type="hidden" value="customerid" value="1"/>
<input type="button" id="btnCmpPrev3" value="Previous" class="btn btn-info" href="#tab1"></td>
<button type="submit" id="btnSubmitFullForm" class="btn btn-success">Submit</button>

<script type="text/javascript">
    jQuery(function () {
        var counter = 1;
        jQuery('#paymentInfoFrm').click(function (event) {
            event.preventDefault();
            var newRow = jQuery('<tr><td><label class="control-label">Credit Card No.</label></td><td><input type="text" name="cardnumber[]" onkeypress="return chkNumericKey(event)" minlenght="2" maxlength="13" id="cardnumber' + counter + '"  value="" ></td>' +
                    counter + '<td><label class="control-label">Name on Card</label></td><td><input type="text" name="nameoncard[]" minlenght="2" maxlength="30"  id="nameoncard"  value="" ></td>' +
                    counter + '<td><label class="control-label">Exp. Date</label></td><td><input type="date" name="expdate[]" id="expdate"  value="" ></td>' +
                    counter + '<td><label class="control-label">CVV</label></td><td><input style="width: 40px" type="text" onkeypress="return chkNumericKey(event)" minlenght="2" maxlength="3" name="cvvno[]" id="cvvno"  value="" >\n\
                                <a style="margin-left: 20px;float:center;margin-bottom: 10px;" class="icon-trash" href="#"  ></a></td>');
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