<?php
$arrsalutations = MysqlConnection::fetchCustom("SELECT distinct(`salutation`) as salutation FROM `customer_master`");
?>
<style>
    tbody {
        height: auto;
    }
    td{
        padding-left:   10px;
        padding-right:   10px;
    }
    select {
        width: 212px;
        height: 24px;
    }
    tr{
    }
</style>
<script>
    $(document).ready(function ($) {
        $("#phno").mask("(99) 9999-9999");
        $("#cust_fax").mask("(99) 9999-9999");
    });
</script>
<fieldset class="well the-fieldset">
    <table  style="width: 80%;vertical-align: top" border="0">
        <tr>
            <td><label class="control-label">Salutation</label></td>
            <td>
                <select name="salutation" style="width: 20%" id="salutation">
                    <option value=""></option>
                    <?php
                    foreach ($arrsalutations as $key => $value) {
                        ?>
                        <option  <?php echo $value["salutation"] == $customer["salutation"] ? "selected" : "" ?>
                            value="<?php echo $value["salutation"] ?>" ><?php echo $value["salutation"] ?></option>
                            <?php
                        }
                        ?>
                </select>
                <input type="text" name="salutation1" style="width: 50%" placeholder="Add here">
            </td>
            <td><label class="control-label">First Name</label></td>
            <td><input type="text" name="firstname" id="firstname"  value="<?php echo $customer["firstname"] ?>" autofocus="" required="true" minlenght="2" maxlength="30" ></td>
            <td><label class="control-label">Last Name</label></td>
            <td><input type="text" name="lastname" id="lastname"  value="<?php echo $customer["lastname"] ?>" minlenght="2" maxlength="30" ></td>
        </tr>
        <tr>
            <td><label class="control-label">Company Name</label></td>
            <td><input type="text" name="cust_companyname"  value="<?php echo $customer["cust_companyname"] ?>" id="cust_companyname" minlenght="2" maxlength="30"></td>
            <td><label class="control-label">Email</label></td>
            <td><input type="email" name="cust_email" id="cust_email"  value="<?php echo $customer["cust_email"] ?>" ></td>
            <td><label class="control-label">Phone</label></td>
            <td><input type="text" name="phno" id="phno"  value="<?php echo trim($customer["phno"]) ?>" ></td>

        </tr>
        <tr>
            <td><label class="control-label">Web Site</label></td>
            <td><input type="text" name="website" id="website" plceholder="Enter Company Website" value="<?php echo $customer["website"] ?>" ></td>
            <td><label class="control-label">Fax</label></td>
            <td><input type="text" name="cust_fax" id="cust_fax"  value="<?php echo $customer["cust_fax"] ?>" ></td>
            <td><label class="control-label">Customer Status</label></td>
            <td style="vertical-align: middle">
                <input type="checkbox" name="status" <?php echo $customer["status"] == "Y" ? "checked" : "" ?> id="status" value="Y" />
                Is customer active ?
            </td>
        </tr>
        <tr>
            <td><label class="control-label">Street Name</label></td>
            <td><input type="text" name="streetName" id="streetName" minlenght="2" maxlength="30" plceholder="Enter Street Name" value="<?php echo $customer["streetName"] ?>" ></td>
            <td><label class="control-label">Street No</label></td>
            <td><input type="text" name="streetNo" id="streetNo"  minlenght="2" maxlength="30" value="<?php echo $customer["streetNo"] ?>" ></td>
            <td><label class="control-label">City</label></td>
            <td><input type="text" name="city" id="streetNo"  value="<?php echo $customer["city"] ?>" ></td>
        </tr>
          <tr>
            <td><label class="control-label">Province</label></td>
            <td><input type="text" name="cust_province" id="cust_province" plceholder="Enter Province" value="<?php echo $customer["cust_province"] ?>" ></td>
            <td><label class="control-label">Country</label></td>
            <td><input type="text" name="country" id="country"  value="<?php echo $customer["country"] ?>" ></td>
            <td><label class="control-label">Postal Code</label></td>
            <td><input type="text" name="postal_code" id="postal_code" minlenght="2" maxlength="30"  value="<?php echo $customer["postal_code"] ?>" ></td>
        </tr>
        <tr style="vertical-align: top">
            <td>Bill To</td>
            <td><textarea style="height: 100px;;line-height: 20px;" name="billto" onfocus="fillAddress()"  id="billto" ><?php echo $customer["billto"] ?></textarea></td>
            <td>Ship To </td>
            <td><textarea   style="height: 100px;line-height: 20px;"  name="shipto" id="shipto"><?php echo $customer["shipto"] ?></textarea></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><a onclick="copyOrRemove('1')">COPY >></a></td>
            <td></td>
            <td><a onclick="copyOrRemove('0')"><< REMOVE</a></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</fieldset>
<hr/>
<input type="hidden" value="<?php echo $customerid ?>" name="customerid"/>
<a href="index.php?pagename=manage_customermaster" class="btn btn-danger">CANCEL</a>
<input type="button" id="btnCmpNext1" value="NEXT" class="btn btn-info" />
<script>
    function  fillAddress()
    {
        document.getElementById("billto").value = "";
        var cust_companyname = document.getElementById("cust_companyname").value;
        var firstname = document.getElementById("firstname").value;
        var lastname = document.getElementById("lastname").value;
        var cust_email = document.getElementById("cust_email").value;
        var phno = document.getElementById("phno").value;
        if (firstname !== "" && lastname !== "") {
            document.getElementById("billto").value = cust_companyname + "\n" + firstname + "\n" + lastname + "\n" + cust_email + "\n" + phno;
        }
    }
    function copyOrRemove(flag) {
        if (flag === "1") {
            document.getElementById("shipto").value = document.getElementById("billto").value;
        } else {
            document.getElementById("shipto").value = "";
        }
    }
</script>

