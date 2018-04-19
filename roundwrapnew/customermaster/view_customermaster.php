<?php
$customerid = filter_input(INPUT_GET, "customerId");
$flag = filter_input(INPUT_GET, "flag");

$arrcustomer = MysqlConnection::fetchCustom("SELECT * FROM  `customer_master` WHERE id = $customerid ");
$customer = $arrcustomer[0];
//
//echo "<pre>";
//print_r($customer);
//echo "</pre>";

$customercontactarray = MysqlConnection::fetchCustom("SELECT * FROM  `customer_contact` WHERE cust_id = $customerid ");
$customerpaymentarray = MysqlConnection::fetchCustom("SELECT * FROM  `customer_payment` WHERE  cust_id = $customerid ");
$arrcustomernote = MysqlConnection::fetchCustom("SELECT * FROM  `customer_notes` WHERE cust_id = $customerid  ORDER BY ID DESC LIMIT 0,20");


if (isset($_POST["deleteItem"])) {
    MysqlConnection::delete("DELETE FROM `customer_master` WHERE id = $customerid");
    MysqlConnection::delete("DELETE FROM `customer_payment` WHERE cust_id = $customerid");
    MysqlConnection::delete("DELETE FROM `customer_notes` WHERE cust_id = $customerid");
    header("location:index.php?pagename=manage_customermaster");
}
?>
<style>
    .widget-box input{
        background-color: white;
        background: white;
    }
    .widget-box textarea{
        background-color: white;
        background: white;
    }

</style>
<div class="container-fluid" id="tabs">
    <div class="cutomheader">
        <h5 style="font-family: verdana;font-size: 12px;">CUSTOMER VIEW</h5>
    </div>
    <div class="widget-box" >

        <div class="widget-title" >
            <ul class="nav nav-tabs" >
                <li id="ciTab1" class="active"><a data-toggle="tab" href="#tab1">Company Information </a></li>
                <li id="acTab2"><a data-toggle="tab" href="#tab2">Additional Contacts</a></li>
                <li id="tdTab3"><a data-toggle="tab" href="#tab3">Tax and Discount</a></li>
                <li id="dpiTab4"><a data-toggle="tab" href="#tab4">Deposits and Payment Information</a></li>
                <li id="noteTab5"><a data-toggle="tab" href="#tab5">Notes & Comments</a></li>
            </ul>
        </div>

        <div class="widget-content tab-content">
            <div id="tab1" class="tab-pane active">
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
                        <tr>
                            <td colspan="6" style="height: 0.5px;">
                                <hr style="border-color: gainsboro"/>
                            </td>
                        </tr>
                        <tr>
                            <td><label class="control-label">Street No</label></td>
                            <td><input type="text"  value="<?php echo $customer["streetNo"] ?>" readonly=""/></td>
                            <td><label class="control-label">Street Name</label></td>
                            <td><input type="text"  value="<?php echo $customer["streetName"] ?>" readonly=""/></td>
                            <td><label class="control-label">Postal Code</label></td>
                            <td><input type="text"   value="<?php echo $customer["postal_code"] ?>" readonly="" /></td>

                        </tr>
                        <tr>
                            <td><label class="control-label">City</label></td>
                            <td><input type="text"  value="<?php echo $customer["city"] ?>" readonly="" /></td>
                            <td><label class="control-label">Province</label></td>
                            <td><input type="text"  value="<?php echo $customer["cust_province"] ?>" readonly="" /></td>
                            <td><label class="control-label">Country</label></td>
                            <td><input type="text"  value="<?php echo $customer["country"] ?>" readonly="" /></td>


                        </tr>
                        <tr>
                            <td colspan="6" style="height: 0.5px;">
                                <hr style="border-color: gainsboro"/>
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

                    </table>
                    <hr/>
                    <?php
                    if (isset($flag) && $flag != "") {
                        ?>
                        <form name="frmDeleteItem" id="frmDeleteItem" method="post">
                            <input type="hidden" value="<?php echo $customerid ?>" name="customerid"/>
                            <a href="index.php?pagename=manage_customermaster&status=active" class="btn btn-danger">CANCEL</a>
                            <input type="hidden" value="customerid" value="<?php echo $customerid ?>"/>
                            <input type="submit" value="DELETE" name="deleteItem" class="btn btn-danger" style="background-color: #2f96b4"/>
                            <input type="button" id="btnCmpNext1" value="NEXT" class="btn btn-info" style="background-color: #2f96b4" />
                        </form>
                        <?php
                    } else {
                        ?>
                        <a href="index.php?pagename=manage_customermaster&status=active" class="btn btn-danger">CANCEL</a>
                        <input type="button" id="btnCmpNext1" value="NEXT" class="btn btn-info" style="background-color: #2f96b4" />
                        <?php
                    }
                    ?>

                </fieldset>
            </div>
            <div id="tab2" class="tab-pane ">
                <fieldset class="well the-fieldset">
                    <table id="addcontacts"  border="0" class="ctable"> 
                        <tr style="height: 25px;background-color: rgb(220,220,220);font-family: verdana;text-align: center">
                            <td>Name</td>
                            <td>Email</td>
                            <td>Phone</td>
                            <td>Designation</td>
                        </tr>
                        <?php foreach ($customercontactarray as $key => $value) { ?>
                            <tr style="vertical-align: bottom">
                                <td><input type="text" value="<?php echo $value["person_name"] ?>" readonly=""/> </td>
                                <td><input type="text"  value="<?php echo $value["person_email"] ?>" readonly=""/></td>
                                <td><input type="text"  value="<?php echo $value["person_phoneNo"] ?>" readonly="" /></td>
                                <td><input type="text"  value="<?php echo $value["designation"] ?>" readonly="" /></td>
                            </tr>
                        <?php } ?>
                    </table>
                    <hr/>
                    <input style="background-color: #2f96b4" type="button" id="btnCmpPrev1" value="PREVIOUS" class="btn btn-info" href="#tab1" >
                    <input style="background-color: #2f96b4" type="button" id="btnCmpNext2" value="NEXT" class="btn btn-info" href="#tab2"  >

                </fieldset>
            </div>
            <div id="tab3" class="tab-pane">
                <?php
                $customertype = MysqlConnection::fetchCustom("SELECT name FROM generic_entry WHERE ID = " . $customer["cust_type"]);
                ?>
                <fieldset class="well the-fieldset">
                    <table  style="width: 80%;vertical-align: top" border="0"> 
                        <tr>
                            <td><label class="control-label">Customer Type</label></td>
                            <td><input type="text" value="<?php echo $customertype[0]["name"] ?>" readonly=""/></td>
                            <td><label class="control-label">Discount</label></td>
                            <td><input type="text" value="<?php echo $customer["discount"] ?>" readonly=""/></td>
                            <td><label class="control-label">Term</label></td>
                            <td><input type="text" value="<?php echo $customer["paymentTerm"] ?>" readonly=""/></td>
                        </tr>
                        <tr>
                            <td><label class="control-label">Rep</label></td>
                            <td><input type="text" value="<?php echo $customer["sales_person_name"] ?>" readonly=""/></td>
                            <td><label class="control-label">Business No</label></td>
                            <td><input type="text" value="<?php echo $customer["businessno"] ?>" readonly=""/></td>
                            <td><label class="control-label">Certificate</label></td>
                            <td><a href="">view</a></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input type="text" value="<?php echo $customer["taxcode"] ?>" readonly=""/></td>
                        </tr>
                    </table>
                    <hr/>
                    <input style="background-color: #2f96b4" type="button" id="btnCmpPrev2" value="PREVIOUS" class="btn btn-info" href="#tab2">
                    <input style="background-color: #2f96b4" type="button" id="btnCmpNext3" value="NEXT" class="btn btn-info" href="#tab4">

                </fieldset>
            </div>
            <div id="tab4" class="tab-pane">
                <fieldset class="well the-fieldset">
                    <table  style="width: 100%;vertical-align: top" border="0" id="payment"> 
                        <tr>
                            <td><label class="control-label">Account No</label></td>
                            <td><input type="text"  value="<?php echo $customer["cust_accnt_no"] ?>" readonly="" /></td>
                            <td>Currency</td>
                            <td><input type="text"  value="<?php echo getcurrency($customer["currency"]) . " " . ($customer["currency"]) ?>" readonly=""/></td>
                            <td>Balance</td>
                            <td><input type="text" value="<?php echo $customer["balance"] ?>" readonly=""/></td>
                            <td><label class="control-label">Credit Limit</label></td>
                            <td><input type="text"  value="<?php echo $customer["creditlimit"] ?>" readonly=""/></td>
                        </tr>
                        <?php foreach ($customerpaymentarray as $key => $value) { ?>
                            <tr>
                                <td><label class="control-label">Credit Card No.</label></td>
                                <td><input type="text"   value="<?php echo $value["cardnumber"] ?>" readonly="" /></td>
                                <td><label class="control-label">Name on Card</label></td>
                                <td><input type="text"  value="<?php echo $value["nameoncard"] ?>" readonly="" /></td>
                                <td><label class="control-label">Exp. Date</label></td>
                                <td><input type="date"  value="<?php echo $value["expdate"] ?>" readonly="" /></td>
                                <td><label class="control-label">CVV</label></td>
                                <td><input type="text"  value="<?php echo $value["cvvno"] ?>"  readonly=""/></td>

                            </tr>
                        <?php } ?>
                    </table> 
                    <hr/>
                    <input type="hidden" value="customerid" value="<?php echo $customerid ?>"/>
                    <input style="background-color: #2f96b4" type="button" id="btnCmpPrev3" value="PREVIOUS" class="btn btn-info" href="#tab1"></td>
                    <input style="background-color: #2f96b4" type="button" id="btnCmpNext4" value="NEXT" class="btn btn-info" href="#tab5">
                </fieldset>
            </div>
            <div id="tab5" class="tab-pane">
                <fieldset class="well the-fieldset">
                    <div style="height:  230px;overflow: auto;background: white;width: 100%;float: right">
                        <table  style="width: 100%;vertical-align: top" border="0">
                            <tr style="height: 30px;background-color: rgb(240,240,240);">
                                <th style="width: 100px;">&nbsp;DATE</th>
                                <th>&nbsp;LAST NOTES</th>
                            </tr>
                            <?php
                            foreach ($arrcustomernote as $key => $value) {
                                ?>
                                <tr style="border-bottom: solid 1px rgb(220,220,220);">
                                    <td>&nbsp;
                                        <?php
                                        $explod = explode(" ", $value["adddate"]);
                                        echo $explod[0];
                                        ?>
                                    </td>
                                    <td><p style="padding: 3px;text-align: justify"><?php echo $value["note"] ?></p></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                </fieldset>
                <hr/>
                <input style="background-color: #2f96b4" type="button" id="btnCmpPrev4" value="PREVIOUS" class="btn btn-info" href="#tab1">
                <a href="index.php?pagename=manage_customermaster&status=active" class="btn btn-danger">CANCEL</a>
            </div>
        </div>  
    </div>
</div>

<script>
    function deleteCustomer(id) {
        var dataString = "deleteId=" + id;
        alert(id);
        $.ajax({
            type: 'POST',
            url: 'customermaster/customermaster_ajax.php',
            data: dataString
        }).done(function (data) {
        }).fail(function () {
        });
    }

    $('#btnCmpNext1').on('click', function () {
        $('#ciTab1').removeClass('active');
        $('#acTab2').addClass('active');

        $('#tab1').removeClass('active');
        $('#tab2').addClass('active');
    });

    $('#btnCmpPrev1').on('click', function () {
        $('#acTab2').removeClass('active');
        $('#ciTab1').addClass('active');
        $('#tab2').removeClass('active');
        $('#tab1').addClass('active');

    });
    $('#btnCmpNext2').on('click', function () {
        $('#acTab2').removeClass('active');
        $('#tdTab3').addClass('active');
        $('#tab2').removeClass('active');
        $('#tab3').addClass('active');
    });


    $('#btnCmpPrev2').on('click', function () {
        $('#tdTab3').removeClass('active');
        $('#acTab2').addClass('active');
        $('#tab3').removeClass('active');
        $('#tab2').addClass('active');
    });
    $('#btnCmpNext3').on('click', function () {
        $('#tdTab3').removeClass('active');
        $('#dpiTab4').addClass('active');
        $('#tab3').removeClass('active');
        $('#tab4').addClass('active');
    });
    $('#btnCmpPrev3').on('click', function () {
        $('#dpiTab4').removeClass('active');
        $('#tdTab3').addClass('active');
        $('#tab4').removeClass('active');
        $('#tab3').addClass('active');
    });

    $('#btnCmpNext4').on('click', function () {
        $('#dpiTab4').removeClass('active');
        $('#noteTab5').addClass('active');
        $('#tab4').removeClass('active');
        $('#tab5').addClass('active');
    });
    $('#btnCmpPrev4').on('click', function () {
        $('#noteTab5').removeClass('active');
        $('#dpiTab4').addClass('active');
        $('#tab5').removeClass('active');
        $('#tab4').addClass('active');
    });
</script>

