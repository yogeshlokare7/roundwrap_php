<hr/>
<center>
                <table class="table" id="taxInfo" style="width: 80%;">
                    <thead>
                        <tr>
                            <th style="width: 2.3%">Check</th>
                            <th >Tax Name</th>
                            <th >Tax Percentage</th>
                        </tr>
                    </thead>
                    <tr>
                        <td><input type="checkbox" class="checker" name="tax_check[]"></td>
                        <td ><input type="text" name="tax_name[]" autofocus="" value="<?php echo filter_input(INPUT_POST, "tax_name[]") ?>" id="tax_name"/></td>
                        <td ><input type="text" name="tax_percentage[]" autofocus="" value="<?php echo filter_input(INPUT_POST, "tax_percentage[]") ?>" id="tax_percentage"/>
                        <a style="margin-left: 20px;float:center;margin-bottom: 10px;" class="icon-plus" href="#"  ></a>
                        </td>
                    </tr>
                </table> 
</center>
    <hr/> 
  <script type="text/javascript">
    jQuery(function () {
        var counter = 1;
        jQuery('a.icon-plus').click(function (event) {
            event.preventDefault();
            var newRow = jQuery('<tr><td><input type="checkbox" class="checker" name="tax_check[]"></span></td>' +
                    counter + '<td><input type="text" name="tax_name[]" autofocus="" value="<?php echo filter_input(INPUT_POST, "tax_name[]") ?>" id="tax_name'+counter+'" /></td>' +
                    counter + '<td><input type="text" name="tax_percentage[]" autofocus="" value="<?php echo filter_input(INPUT_POST, "tax_percentage[]") ?>" id="tax_percentage"/>\n\
                               <a style="margin-left: 20px;float:center;margin-bottom: 10px;" class="icon-trash" href="#"  ></a></td>');
            $("#alterno" + counter).mask("(999) 999-9999");
            counter++;
            jQuery('#taxInfo').append(newRow);

        });
    });

    $(document).ready(function () {

        $("#taxInfo").on('click', 'a.icon-trash', function () {
            $(this).closest('tr').remove();
        });

    });
    </script>
    