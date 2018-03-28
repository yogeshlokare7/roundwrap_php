<script>
    $(document).ready(function ($) {
        $("#alterno1").mask("(99) 9999-9999");
        $("#cust_fax").mask("(99) 9999-9999");
    });
</script>

<hr/>
<table style="width: 100%;" id="addcontacts"> 
    <tr>
        <td><label class="control-label">Name</label></td>
        <td><input type="text" name="contact_person[]" value="<?php echo filter_input(INPUT_POST, "contact_person[]") ?>" minlenght="2" maxlength="30"  id="contact_person"></td>
        <td><label class="control-label">Email</label></td>
        <td><input type="email" name="email[]" autofocus="" value="<?php echo filter_input(INPUT_POST, "email[]") ?>" id="email"></td>
        <td><label class="control-label">Phone</label></td>
        <td><input type="tel" name="alterno1[]" id="alterno1"  value="<?php echo filter_input(INPUT_POST, "alterno1[]") ?>" ><a style="margin-left: 20px;float:center;margin-bottom: 10px;" class="icon-plus" href="#"  ></a></td>
    </tr>
</table> 
<hr/>
<input type="button" id="btnCmpPrev1" value="Previous" class="btn btn-info" href="#tab1">
<input type="button" id="btnCmpNext2" value="Next" class="btn btn-info" href="#tab2">
<script type="text/javascript">
    jQuery(function() {
        var counter = 1;
        jQuery('a.icon-plus').click(function(event) {
            event.preventDefault();

            var newRow = jQuery('<tr><td><label class="control-label">Name</label></td><td><input type="text" name="contact_person[]" value="<?php echo filter_input(INPUT_POST, "contact_person") ?>"  id="contact_person"></td>' +
                    counter + '<td><label class="control-label">Email</label></td><td><input type="text" name="email" autofocus="" value="<?php echo filter_input(INPUT_POST, "email") ?>" id="email"></td>' +
                    counter + '<td><label class="control-label">Phone</label></td> <td><input type="text" name="firstname" id="firstname"  value="<?php echo filter_input(INPUT_POST, "firstname") ?>" ><a style="margin-left: 20px;float:center;margin-bottom: 10px;" class="icon-trash" href="#"  ></a></td>');
            counter++;
            jQuery('#addcontacts').append(newRow);

        });
    });

    $(document).ready(function() {

        $("#addcontacts").on('click', 'a.icon-trash', function() {
            $(this).closest('tr').remove();
        });

    });
</script>



