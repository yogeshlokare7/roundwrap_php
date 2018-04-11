<?php
if (!empty($customerid)) {
    $customercontactarray = MysqlConnection::fetchCustom("SELECT * FROM customer_contact WHERE cust_id = $customerid");
    print_r($customercontactarray);
}
?>
<script>
    $(document).ready(function($) {
        $("#alterno").mask("(99) 9999-9999");
    });
</script>
<style>
    .ctable{
        
    }
    .ctable tr td{
        height: 30px;
        vertical-align: middle;
    }
    .ctable tr td input{
        margin-top: 5px;
    }
</style>
<fieldset class="well the-fieldset">
    <table id="addcontacts"  border="0" class="ctable"> 
        <tr style="height: 25px;background-color: rgb(220,220,220);font-family: verdana;text-align: center">
            <td>Name</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Designation</td>
            <td></td>
        </tr>
        <?php
        if (count($customercontactarray) != 0) {
            $index = 1;
            foreach ($customercontactarray as $key => $value) {
                ?>
                <tr style="vertical-align: bottom">
                    <td><input type="text" name="contact_person[]" value="<?php echo $value["person_name"] ?>" minlenght="2" maxlength="30"  id="alter_contact"></td>
                    <td><input type="email" name="email[]" autofocus=""  value="<?php echo $value["person_email"] ?>" id="email"></td>
                    <td><input type="tel" name="alternos[]" id="alterno"  value="<?php echo $value["person_phoneNo"] ?>" ></td>
                    <td><input type="text" name="designation[]" id="alterno"  value="<?php echo $value["designation"] ?>" ></td>
                    <td>
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
            <tr style="vertical-align: bottom">
                <td><input type="text" name="contact_person[]" value="" minlenght="2" maxlength="30"  id="alter_contact"></td>
                <td><input type="email" name="email[]" autofocus=""  value="" id="email"></td>
                <td><input type="tel" name="alternos[]" id="alterno"  value="" ></td>
                <td><input type="text" name="designation[]" id="designation"  value="" ></td>
                <td><a class="icon-plus" href="#" id="icon-plus" ></a></td>
            </tr>
            <?php
        }
        ?>
    </table> 
</fieldset>
<hr/>
<input type="button" id="btnCmpPrev1" value="PREVIOUS" class="btn btn-info" href="#tab1" >
<input type="button" id="btnCmpNext2" value="NEXT" class="btn btn-info" href="#tab2"  >

<script type="text/javascript">

    jQuery(function() {
        var counter = 1;
        jQuery('#icon-plus').click(function(event) {
            event.preventDefault();
            var newRow = jQuery('<tr><td><input type="text" minlenght="2" maxlength="30" name="contact_person[]"  id="contact_person"></td>' +
                    '<td><input type="email" name="email[]" autofocus=""  id="email"></td>' +
                    '<td><input type="tel" name="alternos[]" id="alterno' + counter + '"  ></td>' +
                    '<td><input type="text" name="designation[]" id="designation' + counter + '" ></td>' +
                    '<td><a class="icon-trash" href="#" id="icon-trash" ></a></td>');
            $("#alterno" + counter).mask("(99) 9999-9999");
            counter++;
            jQuery('#addcontacts').append(newRow);
        });
    });

    $(document).ready(function() {
        $("#addcontacts").on('click', '#icon-trash', function() {
            $(this).closest('tr').remove();
        });
    });
</script>




