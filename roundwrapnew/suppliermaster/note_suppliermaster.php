<?php
$supplierid = filter_input(INPUT_GET, "supplierid");
$flag = filter_input(INPUT_GET, "flag");

$arrsupplier = MysqlConnection::fetchCustom("SELECT * FROM  `supplier_master` WHERE supp_id = $supplierid ");
$supplier = $arrsupplier[0];

$arrsuppliernote = MysqlConnection::fetchCustom("SELECT * FROM  `supplier_notes` WHERE supp_id = $supplierid  ORDER BY ID DESC LIMIT 0,20");

if (isset($_POST["btnSubmitFullForm"])) {
    unset($_POST["btnSubmitFullForm"]);
    MysqlConnection::insert("supplier_notes", $_POST);
    header("location:index.php?pagename=note_suppliermaster&supplierid=$supplierid");
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
    input, textarea{
        width: 90%;
    }
</style>
<form name="frmCustomerNote" id="frmCustomerNote" method="post">
    <div class="container-fluid" id="tabs">
        <div class="cutomheader">
            <h5 style="font-family: verdana;font-size: 12px;">ADD VENDOR NOTE</h5>
        </div>
        <div class="widget-box" >
            <div class="widget-title" >
                <ul class="nav nav-tabs" >
                    <li id="ciTab1" class="active"><a data-toggle="tab" href="#tab1">Company Information </a></li>
                </ul>
            </div>
            <div class="widget-content tab-content">
                <div id="tab1" class="tab-pane active">
                    <fieldset class="well the-fieldset">

                        <table  style="width: 80%;vertical-align: top" border="0">
                            <tr>
                                <td><label class="control-label">Salutation</label></td>
                                <td><input type="text" value="<?php echo $supplier["salutation"] ?>" readonly="">
                                </td>
                                <td><label class="control-label">First Name</label></td>
                                <td><input type="text" readonly="" value="<?php echo $supplier["firstname"] ?>" readonly="" /></td>
                                <td><label class="control-label">Last Name</label></td>
                                <td><input type="text" readonly="" value="<?php echo $supplier["lastname"] ?>" readonly=""/></td>
                            </tr>
                            <tr>
                                <td><label class="control-label">Company Name</label></td>
                                <td><input type="text"  value="<?php echo $supplier["companyname"] ?>" readonly=""/></td>
                                <td><label class="control-label">Email</label></td>
                                <td><input type="email" value="<?php echo $supplier["supp_email"] ?>" readonly=""/></td>
                                <td><label class="control-label">Phone</label></td>
                                <td><input type="text" value="<?php echo trim($supplier["supp_phoneNo"]) ?>" readonly=""/></td>
                            </tr>
                            <tr style="vertical-align: middle">
                                <td><label class="control-label">Note / Comment</label></td>
                                <td >
                                    <textarea autofocus="" required="" name="note" style="height: 130px;line-height: 18px;overflow: auto"></textarea>
                                    <input type="hidden" name="supp_id" id="supp_id" value="<?php echo $supplierid ?>">
                                </td>
                                <td colspan="4" style="vertical-align: top;width: 60%">
                                    <div style="height:  130px;overflow: auto;background: white;width: 100%;float: right">
                                        <table  style="width: 100%;vertical-align: top" border="0">
                                            <tr style="height: 30px;background-color: rgb(240,240,240);">
                                                <th style="width: 100px;">&nbsp;DATE</th>
                                                <th>&nbsp;LAST NOTES</th>
                                            </tr>
                                            <?php
                                            foreach ($arrsuppliernote as $key => $value) {
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
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </div>
                <hr/>
                <a href="index.php?pagename=manage_suppliermaster" class="btn btn-danger">CANCEL</a>
                <button type="submit" id="btnSubmitFullForm" name="btnSubmitFullForm" class="btn btn-success">SUBMIT</button>
            </div>  
        </div>
    </div>
</form>