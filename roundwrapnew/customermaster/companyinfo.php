<script>
    $(document).ready(function ($) {
        $("#phno").mask("(99) 9999-9999");
        $("#cust_fax").mask("(99) 9999-9999");
    });
</script>
<hr/>
<table style="width: 100%;" id="companyInfo">
    <tr>
        <td><label class="control-label">Salutation</label></td>
        <td>
            <select name="salutation" style="width: 60px;" id="salutation">
                <option value="">Mr.</option>
                <option value="" >Mrs.</option>
                <option value="">Miss.</option>
                <option value="">Ms.</option>
            </select>
        </td>
        <td><label class="control-label">First Name</label></td>
        <td><input type="text" name="firstname" id="firstname"  value="<?php echo filter_input(INPUT_POST, "firstname") ?>" autofocus="" required="true" minlenght="2" maxlength="30" ></td>
        <td><label class="control-label">Last Name</label></td>
        <td><input type="text" name="lastname" id="lastname"  value="<?php echo filter_input(INPUT_POST, "lastname") ?>" minlenght="2" maxlength="30" ></td>
    </tr>
    <tr>
        <td><label class="control-label">Company Name</label></td>
        <td><input type="text" name="cust_companyname"  value="<?php echo filter_input(INPUT_POST, "cust_companyname") ?>" id="cust_companyname" minlenght="2" maxlength="30"></td>
        <td><label class="control-label">Email</label></td>
        <td><input type="email" name="cust_email" id="cust_email"  value="<?php echo filter_input(INPUT_POST, "cust_email") ?>" ></td>
        <td><label class="control-label">Phone</label></td>
        <td><input type="text" name="phno" id="phno"  value="<?php echo filter_input(INPUT_POST, "phno") ?>" ></td>

    </tr>
    <tr>
        <td><label class="control-label">Website</label></td>
        <td><input type="text" name="website" id="website" plceholder="Enter Company Website" value="<?php echo filter_input(INPUT_POST, "website") ?>" ></td>
        <td><label class="control-label">Fax</label></td>
        <td><input type="text" name="cust_fax" id="cust_fax"  value="<?php echo filter_input(INPUT_POST, "cust_fax") ?>" ></td>
        <td><label class="control-label">Currency</label></td>
    </tr>

    <tr>

        <td>Bill To</td>
        <td><textarea style="height: 80px;;line-height: 20px;" name="billto" onfocus="fillAddress()"  id="billto" ></textarea></td>
        <td colspan="2" style="text-align: center" >
            <a   onclick="copyOrRemove('0')"><< Remove</a>
            &nbsp;|&nbsp;
            <a onclick="copyOrRemove('1')">copy >></a>
        </td>
        <td>Ship To </td>
        <td><textarea   style="height: 80px;line-height: 20px;"  name="shipto" id="shipto"></textarea></td>
    </tr>
</table>

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

