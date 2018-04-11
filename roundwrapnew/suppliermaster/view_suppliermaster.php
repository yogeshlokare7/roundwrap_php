<?php
$suppid = filter_input(INPUT_GET, "supplierid");

$arrsupplier = MysqlConnection::fetchCustom("SELECT * FROM  `supplier_master` WHERE supp_id = $suppid ");
$supplier = $arrsupplier[0];
$suppliercontactarray = MysqlConnection::fetchCustom("SELECT * FROM  `supplier_contact` WHERE sc_id = $suppid ");
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
                            <td>Phone No</td>
                            <td><input type="tel"  value="<?php echo $supplier["supp_phoneNo"] ?>"  readonly=""/></td>
                        </tr>
                        <tr>
                            <td><label class="control-label"  style="float: left">Fax </label></td>
                            <td><input type="text"  value="<?php echo $supplier["supp_fax"] ?>" readonly=""/></td>
                            <td>Website</td>
                            <td><input type="url" value="<?php echo $supplier["supp_website"] ?>" readonly=""/></td>
                            <td>Print on cheque as</td>
                            <td><input type="text"  value="<?php echo $supplier["print_onCheck"] ?>" readonly=""/></td>
                        </tr>
                        <tr style="vertical-align: top">
                            <td>Currency </td>
                            <td><input type="text"  value="<?php echo $supplier["currency"] ?>" readonly=""/></td>
                            <td>Exchange Rate</td>
                            <td><input type="text"  value="<?php echo $supplier["exchange_rate"] ?>" readonly=""/></td>
                            <td>Address</td>
                            <td><textarea style="height: 80px;;line-height: 20px;"  value="<?php echo $supplier["address"] ?>" readonly=""></textarea></td>
                        </tr>
                    </table>
                    <hr/>
                    <input type="button" id="btnVenNext1" value="NEXT" class="btn btn-info" ><a href="suppliermaster/additionalcontact.php"></a></div>
            </fieldset>

            <div id="tab2" class="tab-pane ">

                <fieldset class="well the-fieldset">
                    <table style="width: 100%;"  id="supplierInfo" vertical-align="top">
                        <tr>
                            <td><label class="control-label">Name</label></td>
                            <td><input type="text"  value="<?php echo $suppliercontactarray["contact_person[]"] ?>" readonly=""/></td>
                            <td><label class="control-label">Email</label></td>
                            <td><input type="email"  value="<?php echo $suppliercontactarray["email[]"] ?>" readonly=""/></td>
                            <td><label class="control-label">Phone</label></td>
                            <td><input type="text"  value="<?php echo $suppliercontactarray["alterno[]"] ?>" readonly=""/></td>
                            <td><label class="control-label">Designation</label></td>
                            <td><input type="text"  value="<?php echo $suppliercontactarray["designation[]"] ?>" readonly=""/></td>
                        </tr>
                    </table>
                    <hr/>
                    <input type="button" id="btnVenPrev1" value="PREVIOUS" class="btn btn-info" href="#tab1">
                     <a href="index.php?pagename=manage_suppliermaster" class="btn btn-danger">CANCEL</a></fieldset>
            </div></div></div>
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