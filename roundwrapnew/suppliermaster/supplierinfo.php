<?php
$arrsalutations = MysqlConnection::fetchCustom("SELECT distinct(`salutation`) as salutation FROM `supplier_master`");
?>
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
<script>
    function  fillDetailedAddress()
    {
        document.getElementById("address").value = "";
        var companyname = document.getElementById("companyname").value;
        var firstname = document.getElementById("firstname").value;
        var lastname = document.getElementById("lastname").value;
        var supp_email = document.getElementById("supp_email").value;
        var supp_phoneNo = document.getElementById("supp_phoneNo").value;


        var salutation = document.getElementById("salutation").value;
        var supp_streetNo = document.getElementById("supp_streetNo").value;
        var supp_streetName = document.getElementById("supp_streetName").value;
        var postal_code = document.getElementById("postal_code").value;
        var supp_city = document.getElementById("supp_city").value;
        var supp_province = document.getElementById("supp_province").value;
        var supp_country = document.getElementById("supp_country").value;

        document.getElementById("address").value = companyname + "\n"
                + salutation + " " + firstname + " " + lastname + "\n"
                + supp_email + " " + supp_phoneNo + "\n"
                + supp_streetNo + " " + supp_streetName + " " + postal_code + " " + supp_province + " "
                + supp_city + supp_country;

    }

</script>
<fieldset class="well the-fieldset">
    <table style="width: 100%; vertical-align: top" >
        <tr>
            <td><label class="control-label" style="float: left">Salutation</label></td>
            <td>
                <select name="salutation" style="width: 20%;height: 24px;" id="salutation">
                    <option value=""></option>
                    <?php
                    foreach ($arrsalutations as $key => $value) {
                        ?>
                        <option  <?php echo $value["salutation"] == $supplier["salutation"] ? "selected" : "" ?>
                            value="<?php echo $value["salutation"] ?>" ><?php echo $value["salutation"] ?></option>
                            <?php
                        }
                        ?>
                </select>
                <input type="text" name="salutation1" style="width: 40%" placeholder="Add here">
            </td>
            <td><label class="control-label" style="float: left">First Name </label></td>
            <td><input type="text" name="firstname" autofocus="" value="<?php echo $supplier["firstname"] ?>" id="firstname" minlength="2" maxlength="30" required="required"></td>
            <td><label class="control-label" style="float: left">Last Name </label></td>
            <td><input type="text" name="lastname" autofocus="" value="<?php echo $supplier["lastname"] ?>" id="lastname" minlength="2" maxlength="30" required="required"></td>

        </tr>
        <tr>
            <td><label class="control-label"  style="float: left">Company Name</label></td>
            <td><input type="text" name="companyname" id="companyname"  value="<?php echo $supplier["companyname"] ?>"  minlength="2" maxlength="30" required="required"></td>
            <td><label class="control-label"  style="float: left">Email </label></td>
            <td><input type="email" name="supp_email" id="supp_email"  value="<?php echo $supplier["supp_email"] ?>"  minlength="2" maxlength="30" required="required"></td>
            <td><label class="control-label" style="float: left">Phone No</label></td>
            <td><input type="tel" name="supp_phoneNo" value="<?php echo $supplier["supp_phoneNo"] ?>"  id="supp_phoneNo" minlength="2" maxlength="20" required="required"></td>



        </tr>
        <tr>
            <td><label class="control-label"  style="float: left">Fax </label></td>
            <td><input type="text" name="supp_fax" id="supp_fax"  value="<?php echo $supplier["supp_fax"] ?>" minlength="2" maxlength="20"></td>
            <td><label class="control-label" style="float: left">Website</label></td>
            <td><input type="url" name="supp_website" id="supp_website"  value="<?php echo $supplier["supp_website"] ?>" minlength="2" maxlength="30"></td>
            <td><label class="control-label" style="float: left">Print on cheque as</label></td>
            <td><input type="text" name="print_onCheck" id="cust_fax"  value="<?php echo $supplier["print_onCheck"] ?>" minlength="2" maxlength="30"></td>


        </tr>

        <tr >
            <td><label class="control-label" style="float: left">Currency</label></td>
            <td><select name="currency" id="currency">
                    <option value="CAN" <?php echo "CAN" == $supplier["currency"] ? "selected" : "" ?>>Canada Dollar</option>
                    <option value="USD" <?php echo "USD" == $supplier["currency"] ? "selected" : "" ?>>USD</option>
                    <option value="INR" <?php echo "INR" == $supplier["currency"] ? "selected" : "" ?>>INR</option>
                </select></td>
            <td><label class="control-label" style="float: left">Exchange Rate</label></td>
            <td><input type="text" name="exchange_rate" id="exchange_rate" onkeypress="return chkNumericKey(event)" value="<?php echo $supplier["exchange_rate"] ?>" maxlength="2"></td>
            <td><label class="control-label">Street Name</label></td>
            <td><input type="text" name="supp_streetName" id="supp_streetName" minlenght="2" maxlength="30" plceholder="Enter Street Name" value="<?php echo $supplier["supp_streetName"] ?>" ></td>
        </tr>
        <tr>
            <td><label class="control-label">Street No</label></td>
            <td><input type="text" name="supp_streetNo" id="supp_streetNo"  minlenght="2" maxlength="30" value="<?php echo $supplier["supp_streetNo"] ?>" ></td>
            <td><label class="control-label">City</label></td>
            <td><input type="text" name="supp_city" id="supp_city"  minlenght="2" maxlength="30" value="<?php echo $supplier["supp_city"] ?>" ></td>
            <td><label class="control-label">Province</label></td>
            <td><input type="text" name="supp_province" id="supp_province"  minlenght="2" maxlength="30" value="<?php echo $supplier["supp_province"] ?>" ></td>
        </tr>
        <tr>
            <td><label class="control-label">Country</label></td>
            <td><input type="text" name="supp_country" id="supp_country"  minlenght="2" maxlength="30" value="<?php echo $supplier["supp_country"] ?>" ></td>
            <td><label class="control-label">Postal Code</label></td>
            <td><input type="text" name="postal_code" id="postal_code" minlenght="2" maxlength="30"  value="<?php echo $supplier["postal_code"] ?>" ></td>
            <td><label class="control-label" style="float: left">Address</label></td>
            <td><textarea style="height: 80px;;line-height: 20px;" name="address" onfocus="fillDetailedAddress()"  id="address" ><?php echo $supplier["address"] ?></textarea></td>
        </tr>

    </table> 
</fieldset>
<hr/>
<input type="button" id="btnVenNext1" value="NEXT" class="btn btn-info" ><a href="suppliermaster/additionalcontact.php"></a>

