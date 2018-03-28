<script>
    $(document).ready(function ($) {
        $("#supp_phoneNo").mask("(999) 999-9999");
        $("#supp_fax").mask("999.999.9999");
        
    });
</script>
<hr/>
<table style="width: 100%;">
    <tr>
        <td><label class="control-label" style="float: left">Name *:</label></td>
        <td><input type="text" name="supp_name" autofocus="" value="<?php echo filter_input(INPUT_POST, "supp_name") ?>" id="supp_name" minlength="2" maxlength="30" required="required"></td>
        <td><label class="control-label"  style="float: left">Email :</label></td>
        <td><input type="email" name="supp_email" id="supp_email"  value="<?php echo filter_input(INPUT_POST, "supp_email") ?>"  minlength="2" maxlength="30" required="required"></td>
        <td>Phone No*:</td>
        <td><input type="tel" name="supp_phoneNo" value="<?php echo filter_input(INPUT_POST, "supp_phoneNo") ?>"  id="supp_phoneNo" minlength="2" maxlength="20" ></td>
    </tr>
    <tr>
        <td><label class="control-label"  style="float: left">Fax :</label></td>
        <td><input type="text" name="supp_fax" id="supp_fax"  value="<?php echo filter_input(INPUT_POST, "supp_fax") ?>" minlength="2" maxlength="20"></td>
        <td>Website:</td>
        <td><input type="text" name="supp_website" id="supp_website"  value="<?php echo filter_input(INPUT_POST, "supp_website") ?>" minlength="2" maxlength="30"></td>
        <td>Print on cheque as:</td>
        <td><input type="text" name="print_onCheck" id="cust_fax"  value="<?php echo filter_input(INPUT_POST, "print_onCheck") ?>" minlength="2" maxlength="30"></td>
    </tr>
    <tr>
        <td>Currency :</td>
        <td><select id="currency"  type="text" required="true" name="currency"  value="<?php echo filter_input(INPUT_POST, "currency") ?>" placeholder="Select Country Here"  >
                <option value="">Select Currency</option>
                <option value="INR">Indian Rupee</option><option value="CAD"> Canadian Dollar</option>
            </select></td>
        <td>Exchange Rate:</td>
        <td><input type="text" name="exchange_rate" id="exchange_rate"  value="<?php echo filter_input(INPUT_POST, "exchange_rate") ?>" maxlength="20"></td>
    </tr>
</table> 
<hr/>

