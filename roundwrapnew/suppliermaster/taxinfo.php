<hr/>
<center>
                <table class="table"   style="width: 80%;">
                    <thead>
                        <tr>
                            <th style="width: 2.3%">Check</th>
                            <th >Tax Name</th>
                            <th >Tax Percentage</th>
                        </tr>
                    </thead>
                    <?php
                    $limit = 3;
                    for ($i=1; $i<=$limit; $i++) {
                    ?>
                    <tr>
                        <td><span><input type="checkbox" class="checker" name="tax_check[<?php echo $i; ?>]" style="opacity: 0;"></span></td>
                        <td ><input type="text" name="tax_name[<?php echo $i; ?>]" autofocus="" value="<?php echo filter_input(INPUT_POST, "tax_name[]") ?>" id=""></td>
                        <td ><input type="text" name="tax_percentage[<?php echo $i; ?>]" autofocus="" value="<?php echo filter_input(INPUT_POST, "tax_percentage[]") ?>" id=""></td>
                    </tr>
                   <?php 
                    } 
                    ?>
                </table> 
</center>
    <hr/> 