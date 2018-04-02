
<hr/>
<table style="width: 80%;" id="iteminfo" border="0">
    <tr>
        <td><label class="control-label">Type</label></td>
        <td>
            <select name="type"  id="type">
                <option value="Service">Service</option>
                <option value="InventoryPart" >Inventory Part</option>
                <option value="InventoryAssembly">Inventory Assembly</option>
                <option value="NonInventoryPart">Non Inventory Part</option>
                <option value="Service">Other Charge</option>
                <option value="Service">Subtotal</option>
                <option value="Service">Group</option>
                <option value="Service">Discount</option>
                <option value="Service">Payment</option>
            </select>
        </td>


    </tr>
    <tr>
        <td><label class="control-label">Item Name/Code</label></td>
        <td><input type="text" name="firstname" id="firstname"  value="<?php echo filter_input(INPUT_POST, "firstname") ?>" autofocus="" required="true" minlenght="2" maxlength="30" ></td>
        <td><input type="checkbox" id="taxcheckbox">&nbsp;Subitem of</td>
        <td><label class="control-label">Account</label></td>
    </tr>

    <tr>
        <td><label class="control-label">Description</label></td>
        <td rowspan="2"><textarea style="height: 80px;;line-height: 20px;" name="firstname" id="firstname"  value="<?php echo filter_input(INPUT_POST, "firstname") ?>" autofocus="" required="true" minlenght="2" maxlength="90" ></textarea></td>
        <td>
            <select name="taxInformation" id="taxInformation">
                <option value="">&nbsp;&nbsp;</option>
                <option value="1" ><< ADD NEW >></option>
            </select>
        </td>
        <td><select name="taxInformation" id="taxInformation">
                <option value="">&nbsp;&nbsp;</option>
                <option value="1" ><< ADD NEW >></option>
            </select></td>
    </tr>
    <tr>
        <td></td>
        <td><label class="control-label">Sales Tax Code</label>
            <select name="taxInformation" id="taxInformation">
                <option value="">&nbsp;&nbsp;</option>
                <option value="1" ><< ADD NEW >></option>
            </select></td>
        <td><label class="control-label">Rate</label>
            <input type="email" name="cust_email" id="cust_email"  value="<?php echo filter_input(INPUT_POST, "cust_email") ?>" ></td>
    </tr>

    <tr>
        <td colspan="3"><input type="checkbox" id="taxcheckbox">&nbsp;This service performed by subcontractor,owner or partner</td>
    </tr>
</table>
<hr/>
<input type="button" id="btnCmpNext1" value="Next" class="btn btn-info" ><a href="customermaster/additionalcontact.php"></a>

