<hr/>
<table style="width: 100%;" id="supplierInfo">
    <tr>
        <td><label class="control-label">Name</label></td>
        <td><input type="text" name="contact_person[]" value="<?php echo filter_input(INPUT_POST, "contact_person[]") ?>"  id="contact_person" minlength="2" maxlength="30"></td>
        <td><label class="control-label">Email</label></td>
        <td><input type="email" name="email[]" autofocus="" value="<?php echo filter_input(INPUT_POST, "email[]") ?>" id="email" minlength="2" maxlength="30"></td>
        <td><label class="control-label">Phone</label></td>
        <td><input type="text" name="alterno1[]" id="alterno1"  value="<?php echo filter_input(INPUT_POST, "alterno1[]") ?>" minlength="2" maxlength="20"><a style="margin-left: 20px;float:center;margin-bottom: 10px;" class="icon-plus" href="#"  ></a></td>
    </tr>
     <tr>
        <td><label class="control-label">Name</label></td>
        <td><input type="text" name="contact_person[]" value="<?php echo filter_input(INPUT_POST, "contact_person[]") ?>"  id="contact_person" minlength="2" maxlength="30"></td>
        <td><label class="control-label">Email</label></td>
        <td><input type="email" name="email[]" autofocus="" value="<?php echo filter_input(INPUT_POST, "email[]") ?>" id="email" minlength="2" maxlength="30"></td>
        <td><label class="control-label">Phone</label></td>
        <td><input type="text" name="alterno1[]" id="alterno1"  value="<?php echo filter_input(INPUT_POST, "alterno1[]") ?>" minlength="2" maxlength="20"><a style="margin-left: 20px;float:center;margin-bottom: 10px;" class="icon-plus" href="#"  ></a></td>
    </tr>
</table>
</table>
<table style="width: 100%">
    <tr style="text-align: center">
        <td  style="text-align: center">
            <div style="margin: 0 auto">
                <input type="button" name="btnSubmitFullForm" id="btnSubmitFullForm" value="Submit" class="btn btn-success">
            </div>
        </td>
    </tr>
</table>
<script type="text/javascript">
    jQuery(function () {
        var counter = 1;
        jQuery('a.icon-plus').click(function (event) {
            event.preventDefault();

            var newRow = jQuery('<tr><td><label class="control-label">Name</label></td><td><input type="text" name="contact_person[]" value="<?php echo filter_input(INPUT_POST, "contact_person") ?>"  id="contact_person" minlength="2" maxlength="30"></td>' +
                    counter + '<td><label class="control-label">Email</label></td><td><input type="text" name="email" autofocus="" value="<?php echo filter_input(INPUT_POST, "email") ?>" id="email" minlength="2" maxlength="30"></td>' +
                    counter + '<td><label class="control-label">Phone</label></td> <td><input type="text" name="firstname" id="firstname"  value="<?php echo filter_input(INPUT_POST, "firstname") ?>" minlength="2" maxlength="20"><a style="margin-left: 20px;float:center;margin-bottom: 10px;" class="icon-trash" href="#"  ></a></td>');
            counter++;
            jQuery('#supplierInfo').append(newRow);

        });
    });

    $(document).ready(function () {

        $("#supplierInfo").on('click', 'a.icon-trash', function () {
            $(this).closest('tr').remove();
        });

    });
</script>