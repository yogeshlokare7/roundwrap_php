<?php
$customerid = filter_input(INPUT_GET, "customerId");

$arrcustomer = MysqlConnection::fetchCustom("SELECT * FROM  `customer_master` WHERE id = $customerid ");
$customer = $arrcustomer[0];

$arrcustomercontact = MysqlConnection::fetchCustom("SELECT * FROM  `customer_contact` WHERE cust_id = $customerid ");
//echo "<pre>";
//print_r($arrcustomercontact);
//echo "</pre>";
$arrcustomerpayment = MysqlConnection::fetchCustom("SELECT * FROM  `customer_payment` WHERE  cust_id = $customerid ");
//echo "<pre>";
//print_r($arrcustomercontact);
//echo "</pre>";
?>
<div class="container-fluid" id="tabs">
    <div class="cutomheader">
        <h5 style="font-family: verdana;font-size: 12px;">VIEW CUSTOMER</h5>
    </div>
    <div class="widget-box" >
        <fieldset class="well the-fieldset">
            <table  style="width: 80%;vertical-align: top" border="0">
                <tr>
                    <td><label class="control-label">Salutation</label></td>
                    <td><input type="text" value="<?php echo $customer["salutation"] ?>" readonly="">
                    </td>
                    <td><label class="control-label">First Name</label></td>
                    <td><input type="text" readonly="" value="<?php echo $customer["firstname"] ?>" readonly="" /></td>
                    <td><label class="control-label">Last Name</label></td>
                    <td><input type="text" readonly="" value="<?php echo $customer["lastname"] ?>" readonly=""/></td>
                </tr>
                <tr>
                    <td><label class="control-label">Company Name</label></td>
                    <td><input type="text"  value="<?php echo $customer["cust_companyname"] ?>" readonly=""/></td>
                    <td><label class="control-label">Email</label></td>
                    <td><input type="email" value="<?php echo $customer["cust_email"] ?>" readonly=""/></td>
                    <td><label class="control-label">Phone</label></td>
                    <td><input type="text" value="<?php echo trim($customer["phno"]) ?>" readonly=""/></td>

                </tr>
                <tr>
                    <td><label class="control-label">Web Site</label></td>
                    <td><input type="text"  value="<?php echo $customer["website"] ?>" readonly=""/></td>
                    <td><label class="control-label">Fax</label></td>
                    <td><input type="text"  value="<?php echo $customer["cust_fax"] ?>" readonly=""/></td>
                    <td><label class="control-label">Customer Status</label></td>
                    <td style="vertical-align: middle">
                        <input type="checkbox"  <?php echo $customer["status"] == "Y" ? "checked" : "" ?>  value="Y" readonly=""/>
                        Is customer active ?
                    </td>
                </tr>
                <tr style="vertical-align: top">
                    <td>Bill To</td>
                    <td><textarea style="height: 100px;;line-height: 20px;" readonly="" ><?php echo $customer["billto"] ?> </textarea></td>
                    <td>Ship To </td>
                    <td><textarea   style="height: 100px;line-height: 20px;" readonly=""><?php echo $customer["shipto"] ?></textarea></td>
                    <td></td>
                    <td></td>
                </tr>
<!--                <tr>
                    <td></td>
                    <td><a onclick="copyOrRemove('1')">COPY >></a></td>
                    <td></td>
                    <td><a onclick="copyOrRemove('0')"><< REMOVE</a></td>
                    <td></td>
                    <td></td>
                </tr>-->
            </table>
        </fieldset>

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
                            <td><input type="text" value="<?php echo $value["person_name"] ?>" readonly=""/> </td>
                            <td><input type="email"  value="<?php echo $value["person_email"] ?>" readonly=""/></td>
                            <td><input type="tel"  value="<?php echo $value["person_phoneNo"] ?>" readonly="" /></td>
                            <td><input type="text"  value="<?php echo $value["designation"] ?>" readonly="" /></td>
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
                        <td><input type="text" value="<?php echo $value["person_name"] ?>" readonly=""/></td>
                        <td><input type="email" value="<?php echo $value["person_email"] ?>" readonly=""/></td>
                        <td><input type="tel" value="<?php echo $value["person_phoneNo"] ?>" readonly=""/></td>
                        <td><input type="text" value="<?php echo $value["designation"] ?>" readonly=""/></td>
                        <td></td>
                    </tr>
                    <?php
                }
                ?>
            </table> 
        </fieldset>

    </div>
</div>