<hr/>
<table style="width: 100%;" id="payment">
    <tr>
        <td><label class="control-label">Account No</label></td>
        <td><input type="number" name="cust_accnt_no" autofocus="" value="<?php echo filter_input(INPUT_POST, "cust_accnt_no") ?>" minlenght="2" maxlength="13" id="cust_accnt_no"></td>
        <td><label class="control-label">Credit Limit</label></td>
        <td><input type="number" name="creditlimit" autofocus="" value="<?php echo filter_input(INPUT_POST, "creditlimit") ?>" minlenght="2" maxlength="" id="creditlimit"></td>

    </tr>
    <tr>
        <td><label class="control-label">Credit Card No.</label></td>
        <td><input type="number" name="creditcardno[]" id="creditcardno" minlenght="2" maxlength="13"  value="<?php echo filter_input(INPUT_POST, "creditcardno[]") ?>" ></td>
        <td><label class="control-label">Name on Card</label></td>
        <td><input type="text" name="nameoncard[]" id="nameoncard"  minlenght="2" maxlength="30"  value="<?php echo filter_input(INPUT_POST, "nameoncard[]") ?>" ></td>
        <td><label class="control-label">Exp. Date</label></td>
        <td><input type="date" name="expdate[]" id="expdate"  value="<?php echo filter_input(INPUT_POST, "expdate[]") ?>" ></td>
        <td><label class="control-label">CVV</label></td>
        <td><input style="width: 40px" type="number" name="cvv[]" id="cvv" minlength="2" maxlength="3" value="<?php echo filter_input(INPUT_POST, "cvv[]") ?>" ><a style="  margin-left: 20px;float:center;margin-bottom: 10px;" class="icon-plus" href="#"  ></a></td>
    </tr>
</table> 
<br/>
<table style="width: 100%">
    <tr style="text-align: center">
        <td  style="text-align: center">
            <div style="margin: 0 auto">
                <input type="button" name="btnSubmitFullForm" id="btnSubmitFullForm" value="Submit" class="btn btn-success">
            </div>
        </td>
    </tr>
</table>
<script type="text/javascript">
    jQuery(function () {
        var counter = 1;
        jQuery('a.icon-plus').click(function (event) {
            event.preventDefault();

            var newRow = jQuery('<tr><td><label class="control-label">Credit Card No.</label></td><td><input type="text" name="creditcardno" minlenght="2" maxlength="13" id="creditcardno"  value="<?php echo filter_input(INPUT_POST, "creditcardno") ?>" ></td>' +
                    counter + '<td><label class="control-label">Name on Card</label></td><td><input type="text" name="nameoncard" minlenght="2" maxlength="30"  id="nameoncard"  value="<?php echo filter_input(INPUT_POST, "nameoncard") ?>" ></td>' +
                    counter + '<td><label class="control-label">Exp. Date</label></td><td><input type="date" name="expdate[]" id="expdate"  value="<?php echo filter_input(INPUT_POST, "expdate[]") ?>" ></td>'+
                    counter + '<td><label class="control-label">CVV</label></td><td><input style="width: 40px" type="number" minlenght="2" maxlength="3" name="cvv[]" id="nameoncard"  value="<?php echo filter_input(INPUT_POST, "nameoncard[]") ?>" ><a style="margin-left: 20px;float:center;margin-bottom: 10px;" class="icon-trash" href="#"  ></a></td>');
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