<script>
    $(document).ready(function($) {
        $("#supp_phoneNo").mask("(999) 999-9999");
        $("#supp_fax").mask("(999) 999-9999");

    });
    function chkNumericKey(event) {
        var charCode = (event.which) ? event.which : event.keyCode;
        if ((charCode >= 48 && charCode <= 57) || charCode == 46 || charCode == 45) {
            return true;
        } else {
            return false;
        }
    }
    $(document).ready(function($) {
        $("#creditcardno").mask("9999-9999-9999-9999");
    });
</script>
<hr/>
<table style="width: 100%;">
    <tr>
        <td><label class="control-label">Salutation</label></td>
        <td>
            <select name="salutation" style="width: 60px;" id="salutation">
                <option value="Mr">Mr.</option>
                <option value="Mrs" >Mrs.</option>
                <option value="Miss">Miss.</option>
                <option value="Ms">Ms.</option>
            </select>
        </td>
        <td><label class="control-label" style="float: left">First Name </label></td>
        <td><input type="text" name="firstname" autofocus="" value="<?php echo filter_input(INPUT_POST, "firstname") ?>" id="firstname" minlength="2" maxlength="30" required="required"></td>
        <td><label class="control-label" style="float: left">Last Name </label></td>
        <td><input type="text" name="lastname" autofocus="" value="<?php echo filter_input(INPUT_POST, "lastname") ?>" id="lastname" minlength="2" maxlength="30" required="required"></td>

    </tr>
    <tr>
        <td><label class="control-label"  style="float: left">Company Name</label></td>
        <td><input type="text" name="companyname" id="companyname"  value="<?php echo filter_input(INPUT_POST, "companyname") ?>"  minlength="2" maxlength="30" required="required"></td>
        <td><label class="control-label"  style="float: left">Email </label></td>
        <td><input type="email" name="supp_email" id="supp_email"  value="<?php echo filter_input(INPUT_POST, "supp_email") ?>"  minlength="2" maxlength="30" required="required"></td>
        <td>Phone No*</td>
        <td><input type="tel" name="supp_phoneNo" value="<?php echo filter_input(INPUT_POST, "supp_phoneNo") ?>"  id="supp_phoneNo" minlength="2" maxlength="20" required="required"></td>



    </tr>
    <tr>
        <td><label class="control-label"  style="float: left">Fax </label></td>
        <td><input type="text" name="supp_fax" id="supp_fax"  value="<?php echo filter_input(INPUT_POST, "supp_fax") ?>" minlength="2" maxlength="20"></td>
        <td>Website</td>
        <td><input type="url" name="supp_website" id="supp_website"  value="<?php echo filter_input(INPUT_POST, "supp_website") ?>" minlength="2" maxlength="30"></td>
        <td>Print on cheque as</td>
        <td><input type="text" name="print_onCheck" id="cust_fax"  value="<?php echo filter_input(INPUT_POST, "print_onCheck") ?>" minlength="2" maxlength="30"></td>


    </tr>

    <tr style="vertical-align: top">
        <td>Currency </td>
        <td><select id="currency"  type="text" required="true" name="currency"  value="<?php echo filter_input(INPUT_POST, "currency") ?>" placeholder="Select Country Here"  >
                <option value="">Select Currency</option>
                <option value="INR">Indian Rupee</option><option value="CAD"> Canadian Dollar</option>
            </select></td>
        <td>Exchange Rate</td>
        <td><input type="text" name="exchange_rate" id="exchange_rate" onkeypress="return chkNumericKey(event)" value="<?php echo filter_input(INPUT_POST, "exchange_rate") ?>" maxlength="2"></td>
        <td>Address</td>
        <td><textarea style="height: 80px;;line-height: 20px;" name="address" onfocus="fillAddress()"  id="address" ></textarea></td>

    </tr>
</table> 
<hr/>
<input type="button" id="btnVenNext1" value="Next" class="btn btn-info" ><a href="suppliermaster/additionalcontact.php"></a>
<script>
    function  fillAddress()
    {
        document.getElementById("address").value = "";
        var companyname = document.getElementById("companyname").value;
        var firstname = document.getElementById("firstname").value;
        var lastname = document.getElementById("lastname").value;
        var supp_email = document.getElementById("supp_email").value;
        var supp_phoneNo = document.getElementById("supp_phoneNo").value;
        if (firstname !== "" && lastname !== "") {
            document.getElementById("address").value = companyname + "\n" + firstname + "\n" + lastname + "\n" + supp_email + "\n" + supp_phoneNo;

        }
    }

</script>
