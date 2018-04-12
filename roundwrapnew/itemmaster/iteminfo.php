<?php
$itemPrimary = $_GET["itemPrimary"];
if (!empty($itemPrimary)) {
    $resultset = MysqlConnection::fetchCustom("SELECT * FROM  `item_master` where item_id = $itemPrimary");
    $item = $resultset[0];
}
$itemlist = MysqlConnection::fetchCustom("SELECT item_id,item_code FROM item_master;");

$sqltaxinfodata = MysqlConnection::fetchCustom("SELECT * FROM taxinfo_table ORDER BY id DESC ;");
?>

<style>
    tbody {
        height: auto;
    }
    td{
        padding-top:  10px;
        padding-left:   5px;
        padding-right:   5px;
    }
    select {
        width: 212px;
        height: 24px;
    }
    tr{
        /*background-color: rgb(240,240,240);*/
    }
</style>
<fieldset class="well the-fieldset">
    <form name="frmItemsSubmit" id="frmItemsSubmit" method="post" action="itemmaster/saveitemmaster_ajax.php">
        <table style="vertical-align: top">
            <tr style="vertical-align: top">
                <td style="vertical-align: top">
                    <fieldset class="well the-fieldset">
                        <table  style="vertical-align: top" border="0">
                            <tr style="vertical-align: top">
                                <td colspan="4">Type<br/>
                                    <select name="type"  id="type" value="">
                                        <option value="Service" <?php echo $item["type"] == "Service" ? "selected" : "" ?> >Service</option>
                                        <option value="InventoryPart" <?php echo $item["type"] == "InventoryPart" ? "selected" : "" ?>  >Inventory Part</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td >Item Code<br/><input  type="text" name="item_code" id="item_code" value="<?php echo $item["item_code"] ?>"  autofocus="" required="true" minlenght="2" maxlength="30" /></td>
                                <td >Item Name<br/><input type="text" name="item_name" id="item_name" value="<?php echo $item["item_name"] ?>"  autofocus=""  minlenght="2" maxlength="60" /></td>
                                <td >Unit of Measures<br/><input type="text" name="unit" id="unit" value="<?php echo $item["unit"] ?>"/></td>
                                <td >Sub Item of<br/>
                                    <select name="subitemof" id="subitemof">
                                        <option value="">&nbsp;&nbsp;</option>
                                        <?php
                                        foreach ($itemlist as $key => $value) {
                                            ?>
                                            <option <?php echo $item["subitemof"] == $value["item_id"] ? "selected" : "" ?> 
                                                value="<?php echo $value["item_id"] ?>"><?php echo $value["item_code"] ?></option>
                                                <?php
                                            }
                                            ?>
                                    </select>
                                </td>
                            </tr>
                        </table> 
                    </fieldset>
                </td>
            </tr>

            <tr>
                <td>
                    <?php if ($item["type"] == "Service" || $item["type"] == "") { ?>
                        <div id="serviceform" >


                            <fieldset class="well the-fieldset">
                                <table style="width: 80%;" id="iteminfo" border="0">
                                    <tr style="vertical-align: top">
                                        <td  style="width: 220px;" >Description
                                            <textarea name="item_desc_sales" id="item_desc_sales" minlenght="2" maxlength="60" style="line-height: 15px"><?php echo $item["item_desc_sales"] ?></textarea>
                                        </td>
                                        <td style="width: 220px;">Sales Tax Code
                                            <select name="sales_code" id="taxInformation1" value="<?php echo $item["sales_code"] ?>">
                                                <option value="">&nbsp;&nbsp;</option>
                                                <option value="1" ><< ADD NEW >></option>
                                                <?php foreach ($sqltaxinfodata as $key => $value) { ?>
                                                    <option  <?php echo $value["id"] == $item["sales_code"] ? "selected" : "" ?> 
                                                        value='<?php echo $value["id"] ?>'><?php echo $value["taxcode"] ?> - <?php echo $value["taxname"] ?> - <?php echo $value["taxvalues"] ?>%</option>
                                                    <?php } ?>
                                            </select>
                                        </td>
                                        <td>Rate
                                            <input type="text" name="sell_rate" id="sell_rate" onkeypress="return chkNumericKey(event)" value="<?php echo $item["sell_rate"] ?>" minlenght="2" maxlength="30"  >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td  style="text-align: left" colspan="3">
                                            <input type="checkbox" name="service" 
                                            <?php echo $item["service"] == "Y" ? "checked" : "" ?> 
                                                   id="service">&nbsp;This service performed by subcontractor,owner or partner
                                        </td>
                                    </tr>
                                </table>
                            </fieldset>
                        </div>
                    <?php } ?>
                </td>
            </tr>
        </table>
        <?php if ($item["type"] == "InventoryPart" || $item["type"] == "") { ?>
            <div id="inventorypartfrom">
                <table border="0"> 
                    <tr style="vertical-align: top">
                        <td>
                            <fieldset class="well the-fieldset">
                                <table  border="0">
                                    <tr >
                                        <td style="width: 40%; "><label class="control-label">Purch Price</label></td>
                                        <td><input type="text" name="purchase_rate" onkeypress="return chkNumericKey(event)" id="purchase_rate" value="<?php echo $item["purchase_rate"] ?>" autofocus="" required="true" minlenght="2" maxlength="30" ></td>   
                                    </tr>
                                    <tr >
                                        <td><label class="control-label">Purch Tax Code</label></td>
                                        <td>
                                            <select name="purch_code" id="purch_code">
                                                <option value="">&nbsp;&nbsp;</option>
                                                <option value="1" ><< ADD NEW >></option>
                                                <?php foreach ($sqltaxinfodata as $key => $value) { ?>
                                                    <option  <?php echo $value["id"] == $item["purch_code"] ? "selected" : "" ?> 
                                                        value='<?php echo $value["id"] ?>'><?php echo $value["taxcode"] ?> - <?php echo $value["taxname"] ?> - <?php echo $value["taxvalues"] ?>%</option>
                                                    <?php } ?>
                                            </select>
                                        </td>   
                                    </tr>
    <!--                                    <tr >
                                        <td><label class="control-label">COGS Account</label></td>
                                        <td><input type="text" name="cogsaccount" id="cogsaccount"  value="<?php echo $item["cogsaccount"] ?>" autofocus="" required="true" minlenght="2" maxlength="30" ></td>   
                                    </tr>-->
                                    <tr style="vertical-align: top">
                                        <td colspan="2"><label class="control-label">Description on Purchase Transactions</label>
                                            <textarea style="height: 30px;;line-height: 20px; width: 98%" name="item_desc_purch" id="item_desc_purch"   autofocus="" required="true" minlenght="2" maxlength="90" ><?php echo $item["item_desc_purch"] ?></textarea>
                                        </td>
                                    </tr>
                                </table>
                            </fieldset>
                        </td>
                        <td>
                            <fieldset class="well the-fieldset">
                                <table  border="0">

                                    <tr >
                                        <td style="width: 40%"><label class="control-label">Sales Price</label></td>
                                        <td><input type="text" name="sell_rate" id="sell_rate" onkeypress="return chkNumericKey(event)" value="<?php echo $item["sell_rate"] ?>" autofocus="" required="true" minlenght="2" maxlength="30" ></td>   
                                    </tr>
                                    <tr >
                                        <td><label class="control-label">Sales Tax Code</label></td>
                                        <td>
                                            <select name="sales_code" id="sales_code">
                                                <option value="">&nbsp;&nbsp;</option>
                                                <option value="1" ><< ADD NEW >></option>
                                                <?php foreach ($sqltaxinfodata as $key => $value) { ?>
                                                    <option  <?php echo $value["id"] == $item["sales_code"] ? "selected" : "" ?> 
                                                        value='<?php echo $value["id"] ?>'><?php echo $value["taxcode"] ?> - <?php echo $value["taxname"] ?> - <?php echo $value["taxvalues"] ?>%</option>
                                                    <?php } ?>
                                            </select>
                                        </td>   
                                    </tr>
    <!--                                    <tr >
                                        <td><label class="control-label">Income Account</label></td>
                                        <td><input type="text" name="incomeaccount" id="incomeaccount"  value="<?php echo $item["incomeaccount"] ?>" autofocus="" required="true" minlenght="2" maxlength="30" ></td>   
                                    </tr>-->
                                    <tr >
                                        <td colspan="2"><label class="control-label">Description on Sales Transactions</label>
                                            <textarea style="height: 30px;;line-height: 20px; width: 98%" name="item_desc_sales" id="item_desc_sales"   autofocus="" required="true" minlenght="2" maxlength="90" ><?php echo $item["item_desc_sales"] ?></textarea>
                                        </td>
                                    </tr>
                                </table>
                            </fieldset>
                        </td>
                        <td>
                            <fieldset class="well the-fieldset">

                                <table  border="0">
    <!--                                    <tr  >
                                        <td style="width: 40%"><label class="control-label">Asset Account</label></td>
                                        <td style="vertical-align: bottom"><input type="text" name="assetaccount" id="assetaccount"  value="<?php echo $item["assetaccount"] ?>" autofocus="" required="true" minlenght="2" maxlength="30" ></td>   
                                    </tr>-->
                                    <tr >
                                        <td><label class="control-label">Reorder Point</label></td>
                                        <td style="vertical-align: bottom"><input type="text" name="reorder" id="reorder"  value="<?php echo $item["reorder"] ?>" autofocus="" required="true" minlenght="2" maxlength="30" ></td>   
                                    </tr>
                                    <tr >
                                        <td><label class="control-label">On Hand</label></td>
                                        <td style="vertical-align: bottom"><input type="text" name="onhand" id="onhand" onkeypress="return chkNumericKey(event)" value="<?php echo $item["onhand"] ?>" autofocus="" required="true" minlenght="2" maxlength="30" ></td>   
                                    </tr>
                                    <tr >
                                        <td><label class="control-label">Total Value</label></td>
                                        <td style="vertical-align: bottom" ><input type="text" onkeypress="return chkNumericKey(event)" name="totalvalue" id="totalvalue"  value="<?php echo $item["totalvalue"] ?>" autofocus="" required="true" minlenght="2" maxlength="30" ></td>   
                                    </tr>
                                    <tr >
                                        <td><label class="control-label">As of</label></td>
                                        <td style="vertical-align: bottom" ><input type="date" name="asof"   id="asof"  value="<?php echo $item["asof"] ?>" autofocus="" required="true" minlenght="2" maxlength="30" ></td>   
                                    </tr>
                                </table>
                            </fieldset>

                        </td>
                    </tr>
                </table>

            </div>
        <?php } ?>
        <hr/>
        <?php
        if (isset($itemid)) {
            ?>
            <input type="submit" id="btnSubmitFullForm" class="btn btn-success" onClick='submitDetailsForm()' value="UPDATE"/>
            <?php
        } else {
            ?>
            <input type="submit" id="btnSubmitFullForm" class="btn btn-success" onClick='submitDetailsForm()' value="SAVE"/>
            <?php
        }
        ?>
        <input type="hidden" value="<?php echo $item["item_id"] ?>" id="item_id" name="item_id"/>
        <a href="index.php?pagename=manage_itemmaster" id="btnSubmitFullForm" class="btn btn-info">CANCEL</a>
    </form>
</fieldset>
<!--<hr/>
<input type="button" id="btnCmpNext1" value="Next" class="btn btn-info" ><a href="customermaster/additionalcontact.php"></a>-->

<script>
    function submitDetailsForm() {
        $("#frmItemsSubmit").submit();
    }
<?php if ($item["type"] == "") { ?>
        $(document).ready(function () {
            $('#inventorypartfrom').addClass('hide');
            $('#inventorypartfrom').removeClass('show');
        });
<?php } ?>

    $("#type").click(function () {
        var valueModel = $("#type").val();
        if (valueModel === "Service") {
            $('#serviceform').addClass('show');
            $('#inventorypartfrom').addClass('hide');
            $('#inventorypartfrom').removeClass('show');
        } else if (valueModel === "InventoryPart") {
            $('#serviceform').removeClass('show');
            $('#serviceform').addClass('hide');
            $('#inventorypartfrom').addClass('show');
        }
    });
</script>



<script>
    jQuery(function () {
        var counter = 1;
        jQuery('a.icon-plus').click(function (event) {
            event.preventDefault();
            var newRow = jQuery('<tr>'
                    + '<td><input type="text" name="taxcode[]" style="width: 25px;" id="taxtaxname[]" ></td>'
                    + '<td><input type="text" name="taxtaxname[]" style="width: 75px;" id="taxtaxname[]" ></td>'
                    + '<td><input type="text" name="taxtaxvalues[]" id="taxtaxvalues[]" ></td>'
                    + '<td><input  type="checkbox" name="taxisExempt[]" id="taxisExempt[]"></td>'
                    + '<td><a class="icon-trash" href="#"  ></a></td>'
                    + '</tr>');
            counter++;
            jQuery('#addtax').append(newRow);
        });
    });

    $(document).ready(function () {
        $("#addtax").on('click', 'a.icon-trash', function () {
            $(this).closest('tr').remove();
        });
    });

    $("#taxInformation1").click(function () {
        var valueModel = $("#taxInformation1").val();
        if (valueModel === "1") {
            $('#addTaxInformation').modal('show');
        }
    });

    $("#taxInformation2").click(function () {
        var valueModel = $("#taxInformation2").val();
        if (valueModel === "1") {
            $('#addTaxInformation').modal('show');
        }
    });

    $("#taxInformation3").click(function () {
        var valueModel = $("#taxInformation3").val();
        if (valueModel === "1") {
            $('#addTaxInformation').modal('show');
        }
    });



    $("#saveTaxInformation").click(function () {
//        var dataString = convertFormToJSON("addTaxInformation"); 
//        //taxcode  taxtaxname   taxtaxvalues   taxisExempt
        var taxcode = $("input[name='taxcode[]']").map(function () {
            return $(this).val();
        }).get();
        var taxtaxname = $("input[name='taxtaxname[]']").map(function () {
            return $(this).val();
        }).get();
        var taxtaxvalues = $("input[name='taxtaxvalues[]']").map(function () {
            return $(this).val();
        }).get();
        var taxisExempt = $("input[name='taxisExempt[]']").map(function () {
            return $(this).val();
        }).get();
        var dataString = "taxcode=" + taxcode + "&taxtaxname=" + taxtaxname + "&taxtaxvalues=" + taxtaxvalues + "&taxisExempt=" + taxisExempt;
        $.ajax({
            type: 'POST',
            url: 'customermaster/savetaxinfo_ajax.php',
            data: dataString
        }).done(function (data) {
            $("input[name='taxcode[]']").val("");
            $("input[name='taxtaxname[]']").val("");
            $("input[name='taxtaxvalues[]']").val("");
            $("input[name='taxisExempt[]']").val("");
        }).fail(function () {
        });
    });

    $("#cancelti").click(function () {
        $("#taxInformation1").val("");
    });
</script>

<?php
$taxinfoarray = MysqlConnection::fetchCustom("select * from taxinfo_table;");
?>

<!-- this is custom model dialog --->
<div id="addTaxInformation" class="modal hide" style="top: 10%;left: 50%;">
    <div class="modal-header" style="text-align: center">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3>ADD TAX INFORMATION</h3>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" method="post" action="#" name="addTaxInformation" id="addTaxInformation" novalidate="novalidate">
            <div class="control-group">
                <table class="table" id="addtax" style="width: 100%">
                    <tr>
                        <td>Code</td>
                        <td>Tax Name</td>
                        <td>Percent</td>
                        <td>Exempt</td>
                        <td></td>
                    </tr>
                    <?php
                    foreach ($taxinfoarray as $key => $value) {
                        ?>
                        <tr>
                            <td><input type="text" name="taxcode[]" autofocus=""  style="width: 25px;" id="taxtaxname[]" value="<?php echo $value["taxcode"] ?>"></td>
                            <td><input type="text" name="taxtaxname[]" style="width: 75px;" id="taxtaxname[]" value="<?php echo $value["taxname"] ?>"></td>
                            <td><input type="text" name="taxtaxvalues[]"  id="taxtaxvalues[]" value="<?php echo $value["taxvalues"] ?>"></td>
                            <td><input type="checkbox" name="taxgstexempt[]" id="taxgstexempt[]" value="<?php echo $value["isExempt"] ?>"></td>
                            <td></td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <td><input type="text" name="taxcode[]" style="width: 25px;" id="taxtaxname[]" ></td>
                        <td><input type="text" name="taxtaxname[]" style="width: 75px;" id="taxtaxname[]" ></td>
                        <td><input type="text" name="taxtaxvalues[]" id="taxtaxvalues[]" ></td>
                        <td><input  type="checkbox" name="taxisExempt[]" id="taxisExempt[]"></td>
                        <td><a class="icon-plus" href="#"  ></a></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>

    <div class="modal-footer" style="text-align: center"> 
        <a id="saveTaxInformation" data-dismiss="modal" class="btn btn-primary ">Save</a> 
        <a data-dismiss="modal" class="btn" id="cancelti" href="#">Cancel</a> 
    </div>
</div>
<!-- this is model dialog --->