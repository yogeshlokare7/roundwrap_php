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

<fieldset class="well the-fieldset">
    <table style="width: 100%; vertical-align: top">
        <tr>
            <td>Salutation</td>
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
            <td>Phone No*</td>
            <td><input type="tel" name="supp_phoneNo" value="<?php echo $supplier["supp_phoneNo"] ?>"  id="supp_phoneNo" minlength="2" maxlength="20" required="required"></td>



        </tr>
        <tr>
            <td><label class="control-label"  style="float: left">Fax </label></td>
            <td><input type="text" name="supp_fax" id="supp_fax"  value="<?php echo $supplier["supp_fax"] ?>" minlength="2" maxlength="20"></td>
            <td>Website</td>
            <td><input type="url" name="supp_website" id="supp_website"  value="<?php echo $supplier["supp_website"] ?>" minlength="2" maxlength="30"></td>
            <td>Print on cheque as</td>
            <td><input type="text" name="print_onCheck" id="cust_fax"  value="<?php echo $supplier["print_onCheck"] ?>" minlength="2" maxlength="30"></td>


        </tr>

        <tr style="vertical-align: top">
            <td>Currency</td>
            <td><select name="currency" id="currency">
                    <option value="CAN" <?php echo "CAN" == $supplier["currency"] ? "selected" : "" ?>>Canada Dollar</option>
                    <option value="USD" <?php echo "USD" == $supplier["currency"] ? "selected" : "" ?>>USD</option>
                    <option value="INR" <?php echo "INR" == $supplier["currency"] ? "selected" : "" ?>>INR</option>
                </select></td>
            <td>Exchange Rate</td>
            <td><input type="text" name="exchange_rate" id="exchange_rate" onkeypress="return chkNumericKey(event)" value="<?php echo $supplier["exchange_rate"] ?>" maxlength="2"></td>
            <td>Address</td>
            <td><textarea style="height: 80px;;line-height: 20px;" name="address" onfocus="fillAddress()"  id="address" ><?php echo $supplier["address"] ?></textarea></td>

        </tr>
    </table> 
</fieldset>
<hr/>
<input type="button" id="btnVenNext1" value="NEXT" class="btn btn-info" ><a href="suppliermaster/additionalcontact.php"></a>
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
