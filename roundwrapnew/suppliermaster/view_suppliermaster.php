<?php
$flag = filter_input(INPUT_GET, "flag");
$suppid = filter_input(INPUT_GET, "supplierid");

$arrsupplier = MysqlConnection::fetchCustom("SELECT * FROM  `supplier_master` WHERE supp_id = $suppid ");
$supplier = $arrsupplier[0];
$suppliercontactarray = MysqlConnection::fetchCustom("SELECT * FROM  `supplier_contact` WHERE supp_id = $suppid ");
$supplierrnote = MysqlConnection::fetchCustom("SELECT * FROM  `supplier_notes` WHERE supp_id = $suppid  ORDER BY ID DESC LIMIT 0,20");

if (isset($_POST["deleteItem"])) {
    MysqlConnection::delete("DELETE FROM `supplier_master` WHERE supp_id = $suppid");
    MysqlConnection::delete("DELETE FROM `supplier_contact` WHERE sc_id = $suppid");
    header("location:index.php?pagename=manage_suppliermaster");
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
<div class="container-fluid"  >
    <div class="cutomheader">
        <h5 style="font-family: verdana;font-size: 12px;">VIEW VENDOR</h5>
    </div>
    <br/>

    <div class="widget-box" style="width: 90%;float: left">
        <div class="widget-title">
            <ul class="nav nav-tabs">
                <li id="siTab1" class="active"><a data-toggle="tab" href="#tab1">Vendor Information </a></li>
                <li id="adTab2"><a data-toggle="tab" href="#tab2">Additional Contacts</a></li>
                <li id="noteTab3"><a data-toggle="tab" href="#tab3">Notes & Comments</a></li>
            </ul>
        </div>
        <div class="widget-content tab-content">
            <div id="tab1" class="tab-pane active">
                <fieldset class="well the-fieldset">
                    <table style="width: 100%; vertical-align: top">
                        <tr>
                            <td><label class="control-label">Salutation</label></td>
                            <td><input type="text"  value="<?php echo $supplier["salutation"] ?>" readonly="" /></td>
                            <td><label class="control-label" style="float: left">First Name </label></td>
                            <td><input type="text"  value="<?php echo $supplier["firstname"] ?>" readonly="" /></td>
                            <td><label class="control-label" style="float: left">Last Name </label></td>
                            <td><input type="text"  value="<?php echo $supplier["lastname"] ?>" readonly="" /></td>
                        </tr>
                        <tr>
                            <td><label class="control-label"  style="float: left">Company Name</label></td>
                            <td><input type="text"  value="<?php echo $supplier["companyname"] ?>" readonly=""/></td>
                            <td><label class="control-label"  style="float: left">Email </label></td>
                            <td><input type="email"   value="<?php echo $supplier["supp_email"] ?>" readonly=""/></td>
                            <td><label class="control-label">Phone No</label></td>
                            <td><input type="tel"  value="<?php echo $supplier["supp_phoneNo"] ?>"  readonly=""/></td>
                        </tr>
                        <tr>
                            <td><label class="control-label"  style="float: left">Fax </label></td>
                            <td><input type="text"  value="<?php echo $supplier["supp_fax"] ?>" readonly=""/></td>
                            <td><label class="control-label">Website</label></td>
                            <td><input type="url" value="<?php echo $supplier["supp_website"] ?>" readonly=""/></td>
                            <td><label class="control-label">Print on cheque as</label></td>
                            <td><input type="text"  value="<?php echo $supplier["print_onCheck"] ?>" readonly=""/></td>
                        </tr>
                        <tr style="vertical-align: top">
                            <td><label class="control-label">Currency</label> </td>
                            <td><input type="text"  value="<?php echo getcurrency($supplier["currency"]) . " " . ($supplier["currency"]) ?>" readonly=""/></td>
                            <td><label class="control-label">Exchange Rate</label></td>
                            <td><input type="text"  value="<?php echo $supplier["exchange_rate"] ?>" readonly=""/></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="6" style="height: 0.5px;">
                                <hr style="border-color: gainsboro"/>
                            </td>
                        </tr>
                        <tr>
                            <td><label class="control-label">Street No</label></td>
                            <td><input type="text"  value="<?php echo $supplier["supp_streetNo"] ?>" readonly=""/></td>
                            <td><label class="control-label">Street Name</label></td>
                            <td><input type="text" value="<?php echo $supplier["supp_streetName"] ?>" readonly=""/></td>
                            <td><label class="control-label">Postal Code</label></td>
                            <td><input type="text"  value="<?php echo $supplier["postal_code"] ?>" readonly=""/></td>


                        </tr>
                        <tr>
                            <td><label class="control-label">Country</label></td>
                            <td><input type="text" value="<?php echo $supplier["supp_country"] ?>" readonly=""/></td>
                            <td><label class="control-label">Province</label></td>
                            <td><input type="text"  value="<?php echo $supplier["supp_province"] ?>" readonly=""/></td>
                            <td><label class="control-label">City</label></td>
                            <td><input type="text"  value="<?php echo $supplier["supp_city"] ?>" readonly=""/></td>
                        </tr>
                        <tr>
                            <td><label class="control-label" style="float: left">Address</label></td>
                            <td><textarea style="height: 80px;;line-height: 20px;" name="address" onfocus="fillDetailedAddress()"  id="address" ><?php echo $supplier["address"] ?></textarea></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </table>
                    <?php
                    if (isset($flag) && $flag != "") {
                        ?>
                        <form name="frmDeleteCustomer" id="frmDeleteCustomer" method="post">
                            <input type="hidden" value="<?php echo $customerid ?>" name="customerid"/>
                            <a href="index.php?pagename=manage_suppliermaster&status=active" class="btn btn-danger">CANCEL</a>
                            <input type="hidden" value="supplierId" value="<?php echo supplierId ?>"/>
                            <input type="submit" value="DELETE" name="deleteItem" class="btn btn-danger" style="background-color: #2f96b4"/>
                            <input type="button" id="btnVenNext1" value="NEXT" class="btn btn-info" style="background-color: #2f96b4" />
                        </form>
                        <?php
                    } else {
                        ?>
                        <a href="index.php?pagename=manage_suppliermaster&status=active" class="btn btn-danger">CANCEL</a>
                        <input type="button" id="btnVenNext1" value="NEXT" class="btn btn-info" style="background-color: #2f96b4" href="#tab1"/>
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
                        <?php foreach ($suppliercontactarray as $key => $value) { ?>
                            <tr style="vertical-align: bottom">
                                <td><input type="text" value="<?php echo $value["person_name"] ?>" readonly=""/> </td>
                                <td><input type="text"  value="<?php echo $value["person_email"] ?>" readonly=""/></td>
                                <td><input type="text"  value="<?php echo $value["person_phoneNo"] ?>" readonly="" /></td>
                                <td><input type="text"  value="<?php echo $value["designation"] ?>" readonly="" /></td>
                            </tr>
                        <?php } ?>
                    </table>
                    <hr/>
                    <input type="button" id="btnVenPrev1" value="PREVIOUS" class="btn btn-info" href="#tab1" style="background-color: #2f96b4">
                    <a href="index.php?pagename=manage_suppliermaster&status=active" class="btn btn-danger">CANCEL</a></fieldset>
            </div>
            <div id="tab3" class="tab-pane">
                <fieldset class="well the-fieldset">
                    <div style="height:  230px;overflow: auto;background: white;width: 100%;float: right">
                        <table  style="width: 100%;vertical-align: top" border="0">
                            <tr style="height: 30px;background-color: rgb(240,240,240);">
                                <th style="width: 100px;">&nbsp;DATE</th>
                                <th>&nbsp;LAST NOTES</th>
                            </tr>
                            <?php
                            foreach ($supplierrnote as $key => $value) {
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
                <a href="index.php?pagename=manage_suppliermaster&status=active" class="btn btn-danger">CANCEL</a>
            </div>
        </div>
    </div>
    <script>
        $('#btnVenNext1').on('click', function () {
            $('#siTab1').removeClass('active');
            $('#adTab2').addClass('active');
            $('#tab1').removeClass('active');
            $('#tab2').addClass('active');
        });
        $('#btnVenPrev1').on('click', function () {
            $('#adTab2').removeClass('active');
            $('#siTab1').addClass('active');
            $('#tab2').removeClass('active');
            $('#tab1').addClass('active');
        });
    </script>