<script>
    $(document).ready(function ($) {
        $("#alterno").mask("(999) 999-9999");
    });
</script>
<hr/>
<table style="width: 100%;" id="supplierInfo">
    <tr>
        <td><label class="control-label">Name</label></td>
        <td><input type="text" name="contact_person[]" value="<?php echo filter_input(INPUT_POST, "contact_person[]") ?>"  id="contact_person" minlength="2" maxlength="30"></td>
        <td><label class="control-label">Email</label></td>
        <td><input type="email" name="email[]" autofocus="" value="<?php echo filter_input(INPUT_POST, "email[]") ?>" id="email" minlength="2" maxlength="30"></td>
        <td><label class="control-label">Phone</label></td>
        <td><input type="text" id="alterno" name="alterno[]"  value="<?php echo filter_input(INPUT_POST, "alterno[]") ?>" minlength="2" maxlength="20"><a style="margin-left: 20px;float:center;margin-bottom: 10px;" class="icon-plus" href="#"  ></a></td>
    </tr>
</table>
<hr/>
<input type="button" id="btnVenPrev1" value="Previous" class="btn btn-info" href="#tab1"></td>
<button type="submit" id="btnSubmitFullForm" class="btn btn-success">Submit</button>


<script type="text/javascript">
    jQuery(function () {
        var counter = 1;
        jQuery('a.icon-plus').click(function (event) {
            event.preventDefault();
            var newRow = jQuery('<tr><td><label class="control-label">Name</label></td><td><input type="text" name="contact_person[]" value="<?php echo filter_input(INPUT_POST, "contact_person") ?>"  id="contact_person' + counter + '" minlength="2" maxlength="30"></td>' +
                    counter + '<td><label class="control-label">Email</label></td><td><input type="email" name="email[]" autofocus="" value="<?php echo filter_input(INPUT_POST, "email") ?>" id="email' + counter + '" minlength="2" maxlength="30"></td>' +
                    counter + '<td><label class="control-label">Phone</label></td> <td><input type="text" id="alterno' + counter + '" name="alterno[]"  value="<?php echo filter_input(INPUT_POST, "alterno") ?>" minlength="2" maxlength="20">\n\
                               <a style="margin-left: 20px;float:center;margin-bottom: 10px;" class="icon-trash" href="#"  ></a></td>');
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

    $("#btnSubmitFullForm").click(function () {
        alert("dsadas");
        var json = convertFormToJSON("#frmSupplierSubmit");
        console.log(json);
//        $.ajax({
//            type: 'POST',
//            url: '',
//            data: json
//        }).done(function (data) {
//        }).fail(function () {
//        });
    });
</script>
</script>