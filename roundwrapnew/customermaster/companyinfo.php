
<hr/>
<table style="width: 100%;" id="companyInfo">
    <tr>
        <td><label class="control-label">Salutation</label></td>
        <td>
            <select name="salutation" id="salutation">
                <option value="">Mr.</option>
                <option value="" >Mrs.</option>
                <option value="">Miss.</option>
                <option value="">Ms.</option>
            </select>
        </td>
        <td><label class="control-label">Company Name</label></td>
        <td><input type="text" name="cust_companyname" autofocus="" value="<?php echo filter_input(INPUT_POST, "cust_companyname") ?>" id="cust_companyname" minlenght="2" maxlength="30"></td>
        <td><label class="control-label">First Name</label></td>
        <td><input type="text" name="firstname" id="firstname"  value="<?php echo filter_input(INPUT_POST, "firstname") ?>" minlenght="2" maxlength="30" ></td>

    </tr>
    <tr>
        <td><label class="control-label">Last Name</label></td>
        <td><input type="text" name="lastname" id="lastname"  value="<?php echo filter_input(INPUT_POST, "lastname") ?>" minlenght="2" maxlength="30" ></td>
        <td><label class="control-label">Email</label></td>
        <td><input type="email" name="cust_email" id="cust_email"  value="<?php echo filter_input(INPUT_POST, "cust_email") ?>" ></td>
        <td><label class="control-label">Phone</label></td>
        <td><input type="text" name="phno" id="phno"  value="<?php echo filter_input(INPUT_POST, "phno") ?>" ></td>

    </tr>
    <tr>
        <td><label class="control-label">Fax</label></td>
        <td><input type="text" name="cust_fax" id="cust_fax"  value="<?php echo filter_input(INPUT_POST, "cust_fax") ?>" ></td>
        <td>Contact</td>
        <td><input type="text" name="contact_person" value="<?php echo filter_input(INPUT_POST, "contact_person") ?>"  id="contact_person"></td>
<!--        <td><label class="control-label">Alt.Ph</label></td>
        <td><input type="text" name="alterno1" id="alterno1"  value="<?php echo filter_input(INPUT_POST, "alterno1") ?>" ></td>
        <td><label class="control-label">Alt.Contact</label></td>
        <td><input type="text" name="contact_person" id="contact_person"  value="<?php echo filter_input(INPUT_POST, "contact_person") ?>" ></td>-->
    </tr>


    <tr>
        <td>Bill To</td>
        <td><textarea style="resize: none;height: 60px;line-height: 20px;" name="billto" onfocus="fillAddress()" id="billto" ></textarea></td>
        <td colspan="2" style="text-align: center" >
            <a   onclick="copyOrRemove('0')"><< Remove</a>
            &nbsp;|&nbsp;
            <a onclick="copyOrRemove('1')">copy >></a>
        </td>
        <td>Ship To </td>
        <td><textarea  style="resize: none;height: 60px;line-height: 20px;"  name="shipto" id="shipto"></textarea></td>
    </tr>
    <tr >
        <td colspan="6" style="text-align: center">
            <h6>ADD MORE CONTACT</h6>
        </td>
    </tr>
    <tr>
        <td><label class="control-label">Name</label></td>
        <td><input type="text" name="contact_person[]" value="<?php echo filter_input(INPUT_POST, "contact_person") ?>"  id="contact_person"></td>
        <td><label class="control-label">Email</label></td>
        <td><input type="text" name="email[]" autofocus="" value="<?php echo filter_input(INPUT_POST, "email") ?>" id="email"></td>
        <td><label class="control-label">Phone</label></td>
        <td><input type="text" name="firstname" id="firstname"  value="<?php echo filter_input(INPUT_POST, "firstname") ?>" ><a style="margin-left: 20px;float:center;margin-bottom: 10px;" class="icon-plus" href="#"  ></a></td>

    </tr>
</table> 
<script type="text/javascript">
    jQuery(function () {
        var counter = 1;
        jQuery('a.icon-plus').click(function (event) {
            event.preventDefault();

            var newRow = jQuery('<tr><td><label class="control-label">Name</label></td><td><input type="text" name="contact_person[]" value="<?php echo filter_input(INPUT_POST, "contact_person") ?>"  id="contact_person"></td>' +
                    counter + '<td><label class="control-label">Email</label></td><td><input type="text" name="email" autofocus="" value="<?php echo filter_input(INPUT_POST, "email") ?>" id="email"></td>' +
                    counter + '<td><label class="control-label">Phone</label></td> <td><input type="text" name="firstname" id="firstname"  value="<?php echo filter_input(INPUT_POST, "firstname") ?>" ><a style="margin-left: 20px;float:center;margin-bottom: 10px;" class="icon-trash" href="#"  ></a></td>');
            counter++;
            jQuery('#companyInfo').append(newRow);

        });
    });

    $(document).ready(function () {

        $("#companyInfo").on('click', 'a.icon-trash', function () {
            $(this).closest('tr').remove();
        });

    });


    function  fillAddress()
    {
        document.getElementById("billto").value = "";
        var cust_companyname = document.getElementById("cust_companyname").value;
        var firstname = document.getElementById("firstname").value;
        var lastname = document.getElementById("lastname").value;
        var cust_email = document.getElementById("cust_email").value;
        var phno = document.getElementById("phno").value;
        document.getElementById("billto").value = cust_companyname + "\n" + firstname;
    }

    function copyOrRemove(flag) {
        if (flag === "1") {
            document.getElementById("shipto").value = document.getElementById("billto").value;
        } else {
            document.getElementById("shipto").value = "";
        }
    }

</script>


