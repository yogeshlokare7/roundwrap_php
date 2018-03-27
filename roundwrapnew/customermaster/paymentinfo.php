<hr/>
<table style="width: 100%;" id="payment">
    <tr>
        <td><label class="control-label">Account No</label></td>
        <td><input type="text" name="cust_accnt_no" autofocus="" value="<?php echo filter_input(INPUT_POST, "cust_accnt_no") ?>" id="cust_accnt_no"></td>
        <td><label class="control-label">Credit Limit</label></td>
        <td><input type="text" name="creditlimit" autofocus="" value="<?php echo filter_input(INPUT_POST, "creditlimit") ?>" id="creditlimit"></td>
        
    </tr>
    <tr>
        <td><label class="control-label">Credit Card No.</label></td>
        <td><input type="text" name="creditcardno" id="creditcardno"  value="<?php echo filter_input(INPUT_POST, "creditcardno") ?>" ></td>
        <td><label class="control-label">Name on Card</label></td>
        <td><input type="text" name="nameoncard" id="nameoncard"  value="<?php echo filter_input(INPUT_POST, "nameoncard") ?>" ></td>
        <td><label class="control-label">Exp. Date</label></td>
        <td><input type="text" name="cust_email" id="cust_email"  value="<?php echo filter_input(INPUT_POST, "cust_email") ?>" ><a style="margin-left: 20px;float:center;margin-bottom: 10px;" class="icon-plus" href="#"  ></a></td>
        
    </tr>
  
</table> 

<script type="text/javascript">
    jQuery(function () {
        var counter = 1;
        jQuery('a.icon-plus').click(function (event) {
            event.preventDefault();

            var newRow = jQuery('<tr><td><label class="control-label">Credit Card No.</label></td><td><input type="text" name="creditcardno" id="creditcardno"  value="<?php echo filter_input(INPUT_POST, "creditcardno") ?>" ></td>' +
                    counter + '<td><label class="control-label">Name on Card</label></td><td><input type="text" name="nameoncard" id="nameoncard"  value="<?php echo filter_input(INPUT_POST, "nameoncard") ?>" ></td>' +
                    counter + '<td><label class="control-label">Exp. Date</label></td><td><input type="text" name="cust_email" id="cust_email"  value="<?php echo filter_input(INPUT_POST, "cust_email") ?>" ><a style="margin-left: 20px;float:center;margin-bottom: 10px;" class="icon-trash" href="#"  ></a></td>');
            counter++;
            jQuery('#payment').append(newRow);

        });
    });

    $(document).ready(function () {

        $("#payment").on('click', 'a.icon-trash', function () {
            $(this).closest('tr').remove();
        });

    });
    </script>