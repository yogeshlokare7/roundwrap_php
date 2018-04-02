<?php
if (!empty($customerid)) {
    $customercontactarray = MysqlConnection::fetchCustom("SELECT * FROM customer_contact WHERE cust_id = $customerid");
}
?>
<script>
    $(document).ready(function ($) {
        $("#alterno").mask("(99) 9999-9999");
    });
</script>
<hr/>
<table style="width: 100%;" id="addcontacts" name="table1"> 
    <?php
    if (count($customercontactarray) != 0) {
        $index = 1;
        foreach ($customercontactarray as $key => $value) {
            ?>
            <tr>
                <td><label class="control-label">Name</label></td>
                <td><input type="text" name="contact_person[]" value="<?php echo $value["person_name"] ?>" minlenght="2" maxlength="30"  id="alter_contact"></td>
                <td><label class="control-label">Email</label></td>
                <td><input type="email" name="email[]" autofocus=""  value="<?php echo $value["person_email"] ?>" id="email"></td>
                <td><label class="control-label">Phone</label></td>
                <td><input type="tel" name="alternos[]" id="alterno"  value="<?php echo $value["person_phoneNo"] ?>" >
                    <?php
                    if ($index == 1) {
                        echo '<a style="margin-left: 20px;float:center;margin-bottom: 10px;" class="icon-plus" href="#" id="icon-plus" ></a>';
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
            <td><label class="control-label">Name</label></td>
            <td><input type="text" name="contact_person[]" value="" minlenght="2" maxlength="30"  id="alter_contact"></td>
            <td><label class="control-label">Email</label></td>
            <td><input type="email" name="email[]" autofocus=""  value="" id="email"></td>
            <td><label class="control-label">Phone</label></td>
            <td><input type="tel" name="alterno[]" id="alterno"  value="" >
                <a style="margin-left: 20px;float:center;margin-bottom: 10px;" class="icon-plus" href="#" id="icon-plus" ></a>
            </td>
        </tr>
        <?php
    }
    ?>
</table> 
<hr/>
<input type="button" id="btnCmpPrev1" value="Previous" class="btn btn-info" href="#tab1">
<input type="button" id="btnCmpNext2" value="Next" class="btn btn-info" href="#tab2">
<script type="text/javascript">

    jQuery(function () {
        var counter = 1;
        jQuery('#icon-plus').click(function (event) {
            event.preventDefault();
            var newRow = jQuery('<tr><td><label class="control-label">Name</label></td><td><input type="text" minlenght="2" maxlength="30" name="contact_person[]" value="<?php echo filter_input(INPUT_POST, "contact_person") ?>"  id="contact_person"></td>' +
                    counter + '<td><label class="control-label">Email</label></td><td><input type="email" name="email[]" autofocus="" value="<?php echo filter_input(INPUT_POST, "email") ?>" id="email"></td>' +
                    counter + '<td><label class="control-label">Phone</label></td><td><input type="tel" name="alternos[]" id="alterno' + counter + '"  value="<?php echo filter_input(INPUT_POST, "alterno1[]") ?>" ><a style="margin-left: 20px;float:center;margin-bottom: 10px;" class="icon-trash" href="#" id="icon-trash" ></a></td>');
            $("#alterno" + counter).mask("(99) 9999-9999");
            counter++;
            jQuery('#addcontacts').append(newRow);
        });
    });

    $(document).ready(function () {
        $("#addcontacts").on('click', '#icon-trash', function () {
            $(this).closest('tr').remove();
        });
    });
</script>



