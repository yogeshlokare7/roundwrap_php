<?php
echo $supplierid;
$arraycontacts = MysqlConnection::fetchCustom("SELECT *  FROM  `supplier_contact` where supp_id = $supplierid");
?>
<script>
    $(document).ready(function ($) {
        $("#alterno").mask("(999) 999-9999");
    });
</script>
<fieldset class="well the-fieldset">
    <table style="width: 100%;"  id="supplierInfo" vertical-align="top">
        <?php
        if (count($arraycontacts) != 0) {
            $index = 1;
            foreach ($arraycontacts as $key => $value) {
                ?>
                <tr>
                    <td><label class="control-label">Name</label></td>
                    <td><input type="text" name="contact_person[]" value="<?php echo $value["person_name"] ?>"  id="contact_person" minlength="2" maxlength="30"></td>
                    <td><label class="control-label">Email</label></td>
                    <td><input type="email" name="email[]" autofocus="" value="<?php echo $value["person_email"] ?>"  id="email" minlength="2" maxlength="30"></td>
                    <td><label class="control-label">Phone</label></td>
                    <td><input type="text" id="alterno" name="alterno[]" value="<?php echo $value["person_phoneNo"] ?>"   minlength="2" maxlength="20"></td>
                    <td><label class="control-label">Designation</label></td>
                    <td>
                        <input type="text" id="designation" name="designation[]" value="<?php echo $value["designation"] ?>"  minlength="2" maxlength="20">
                        <?php
                        if ($index == 1) {
                            echo '<a  class="icon-plus" href="#" id="icon-plus" ></a>';
                        } else {
                            echo '<a class="icon-trash" href="#" id="icon-trash" ></a>';
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
                <td><input type="text" name="contact_person[]"  id="contact_person" minlength="2" maxlength="30"></td>
                <td><label class="control-label">Email</label></td>
                <td><input type="email" name="email[]" autofocus=""  id="email" minlength="2" maxlength="30"></td>
                <td><label class="control-label">Phone</label></td>
                <td><input type="text" id="alterno" name="alterno[]"  minlength="2" maxlength="20"></td>
                <td><label class="control-label">Designation</label></td>
                <td>
                    <input type="text" id="designation" name="designation[]"  minlength="2" maxlength="20">
                    <a style="margin-left: 20px;margin-bottom: 10px;" class="icon-plus" href="#"  ></a>
                    
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</fieldset>
<hr/>
<input type="button" id="btnVenPrev1" value="PREVIOUS" class="btn btn-info" href="#tab1">
<input type="submit" id="btnSubmiVendor" class="btn btn-success" value="SUBMIT"/>
<a href="index.php?pagename=manage_suppliermaster&status=active" class="btn btn-danger">CANCEL</a>


<script type="text/javascript">
    jQuery(function () {
        var counter = 1;
        jQuery('a.icon-plus').click(function (event) {
            event.preventDefault();
            var newRow = jQuery('<tr><td><label class="control-label">Name</label></td><td><input type="text" name="contact_person[]" value="<?php echo filter_input(INPUT_POST, "contact_person") ?>"  id="contact_person' + counter + '" minlength="2" maxlength="30"></td>' +
                    counter + '<td><label class="control-label">Email</label></td><td><input type="email" name="email[]" autofocus="" value="<?php echo filter_input(INPUT_POST, "email") ?>" id="email' + counter + '" minlength="2" maxlength="30"></td>' +
                    counter + '<td><label class="control-label">Phone</label></td> <td><input type="text" id="alterno' + counter + '" name="alterno[]"  value="<?php echo filter_input(INPUT_POST, "alterno") ?>" minlength="2" maxlength="20"></td>' +
                    counter + '<td><label class="control-label">Designation</label></td> <td><input type="text" id="designation" name="designation[]"  value="<?php echo filter_input(INPUT_POST, "designation[]") ?>" minlength="2" maxlength="20"> <a style="margin-left: 20px;float:center;margin-bottom: 10px;" class="icon-trash" href="#"  ></a></td>');
            $("#alterno" + counter).mask("(999) 999-9999");
            counter++;
            jQuery('#supplierInfo').append(newRow);
        });
    });

    $(document).ready(function () {
        $("#supplierInfo").on('click', 'a.icon-trash', function () {
            $(this).closest('tr').remove();
        });
    });

    $("#btnSubmiVendor").click(function () {
        $("#frmSupplierSubmit").submit();
    });

</script>