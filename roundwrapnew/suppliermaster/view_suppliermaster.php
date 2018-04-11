<?php
$suppid = filter_input(INPUT_GET, "supp_id");

$arrsupplier = MysqlConnection::fetchCustom("SELECT * FROM  `supplier_master` WHERE supp_id = $suppid ");
$supplier = $arrsupplier[0];
?>

<div class="container-fluid"  >
    <div class="cutomheader">
        <h5 style="font-family: verdana;font-size: 12px;">VIEW VENDOR</h5>
    </div>
    <br/>

    <fieldset class="well the-fieldset">
        <table style="width: 100%; vertical-align: top">
            <tr>
                <td><label class="control-label">Salutation</label></td>
                <td>
                    <select name="salutation" style="width: 60px;" id="salutation">
                        <option value=""></option>
                        <option value="Mr">Mr.</option>
                        <option value="Mrs" >Mrs.</option>
                        <option value="Miss">Miss.</option>
                        <option value="Ms">Ms.</option>
                    </select>
                    <input type="text" name="salutation1" style="width: 45%" placeholder="Add here">
                </td>
                <td><label class="control-label" style="float: left">First Name </label></td>
                <td><input type="text" name="firstname" autofocus="" value="<?php echo filter_input(INPUT_POST, "firstname") ?>" id="firstname" minlength="2" maxlength="30" required="required"></td>
                <td><label class="control-label" style="float: left">Last Name </label></td>
                <td><input type="text" name="lastname" autofocus="" value="<?php echo filter_input(INPUT_POST, "lastname") ?>" id="lastname" minlength="2" maxlength="30" required="required"></td>

            </tr>
            <tr>
                <td><label class="control-label"  style="float: left">Company Name</label></td>
                <td><input type="text" name="companyname" id="companyname"  value="<?php echo filter_input(INPUT_POST, "companyname") ?>"  minlength="2" maxlength="30" required="required"></td>
                <td><label class="control-label"  style="float: left">Email </label></td>
                <td><input type="email" name="supp_email" id="supp_email"  value="<?php echo filter_input(INPUT_POST, "supp_email") ?>"  minlength="2" maxlength="30" required="required"></td>
                <td>Phone No*</td>
                <td><input type="tel" name="supp_phoneNo" value="<?php echo filter_input(INPUT_POST, "supp_phoneNo") ?>"  id="supp_phoneNo" minlength="2" maxlength="20" required="required"></td>



            </tr>
            <tr>
                <td><label class="control-label"  style="float: left">Fax </label></td>
                <td><input type="text" name="supp_fax" id="supp_fax"  value="<?php echo filter_input(INPUT_POST, "supp_fax") ?>" minlength="2" maxlength="20"></td>
                <td>Website</td>
                <td><input type="url" name="supp_website" id="supp_website"  value="<?php echo filter_input(INPUT_POST, "supp_website") ?>" minlength="2" maxlength="30"></td>
                <td>Print on cheque as</td>
                <td><input type="text" name="print_onCheck" id="cust_fax"  value="<?php echo filter_input(INPUT_POST, "print_onCheck") ?>" minlength="2" maxlength="30"></td>


            </tr>

            <tr style="vertical-align: top">
                <td>Currency </td>
                <td><select id="currency"  type="text" required="true" name="currency"  value="<?php echo filter_input(INPUT_POST, "currency") ?>" placeholder="Select Country Here"  >
                        <option value="">Select Currency</option>
                        <option value="INR">Indian Rupee</option><option value="CAD"> Canadian Dollar</option><option value="USD"> USD</option>
                    </select></td>
                <td>Exchange Rate</td>
                <td><input type="text" name="exchange_rate" id="exchange_rate" onkeypress="return chkNumericKey(event)" value="<?php echo filter_input(INPUT_POST, "exchange_rate") ?>" maxlength="2"></td>
                <td>Address</td>
                <td><textarea style="height: 80px;;line-height: 20px;" name="address" onfocus="fillAddress()"  id="address" ></textarea></td>

            </tr>
        </table> 
    </fieldset>
</div>