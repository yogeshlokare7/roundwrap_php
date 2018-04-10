<?php
$itemPrimary = $_GET["itemPrimary"];
if (!empty($itemPrimary)) {
    $resultset = MysqlConnection::fetchCustom("SELECT * FROM  `item_master` where item_id = $itemPrimary");
    $item = $resultset[0];
}
$itemlist = MysqlConnection::fetchCustom("SELECT item_id,item_code FROM item_master;");
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
        <table  style="width: 80%;vertical-align: top" border="0">
            <tr style="vertical-align: top">
                <td style="width: 150px;">Type</td>
                <td style="width: 220px;">
                    <select name="type"  id="type" value="">
                        <option value="Service">Service</option>
                        <option value="InventoryPart" >Inventory Part</option>
                    </select>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Item Name / Code</td>
                <td  style="vertical-align: bottom"><input type="text" name="item_code" id="item_code" value="<?php echo $item["item_code"] ?>"  autofocus="" required="true" minlenght="2" maxlength="30" ></td>
                <td  style="vertical-align: bottom;width: 220px;">Unit of Measures<input type="text" name="unit" id="unit" value="<?php echo $item["unit"] ?>"/></td>
                <td  style="vertical-align: bottom">Subitem of<br/>
                    <select name="subitemof" id="subitemof" value="<?php echo $item["subitemof"] ?>">
                        <option value="">&nbsp;&nbsp;</option>
                        <?php
                        foreach ($itemlist as $key => $value) {
                            ?>
                            <option value="<?php echo $value["item_id"] ?>"><?php echo $value["item_code"] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
                <td></td>
    <!--            <td  style="vertical-align: bottom">
                    Account
                    <select name="account" id="account" value="<?php echo $item["account"] ?>">
                        <option value="">&nbsp;&nbsp;</option>
                        <option value="1" ><< ADD NEW >></option>
                    </select>
                </td>-->
            </tr>
        </table>
        <div id="serviceform">
            <table style="width: 80%;" id="iteminfo" border="0">
                <tr style="vertical-align: top">
                    <td  style="width: 150px;">Description</td>
                    <td  style="width: 220px;" ><textarea name="item_desc" id="item_desc" value="<?php echo $item["item_desc"] ?>" minlenght="2" maxlength="60"></textarea></td>
                    <td style="width: 220px;">
                        <label >Sales Tax Code</label>
                        <select name="salestaxcode" id="salestaxcode" value="<?php echo $item["salestaxcode"] ?>">
                            <option value="">&nbsp;&nbsp;</option>
                            <option value="1" ><< ADD NEW >></option>
                        </select>
                    </td>
                    <td>
                        <label >Rate</label>
                        <input type="text" name="rate" id="rate" onkeypress="return chkNumericKey(event)" value="<?php echo $item["rate"] ?>" minlenght="2" maxlength="30"  >
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="text-align: left"><input type="checkbox" id="taxcheckbox">&nbsp;This service performed by subcontractor,owner or partner</td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>

        <div id="inventorypartfrom">
            <table border="0"> 
                <tr style="vertical-align: top">
                    <td>
                        <fieldset class="well the-fieldset">
                            <table  border="0">

                                <tr style="vertical-align: top">
                                    <td style="width: 40%; "><label class="control-label">Cost</label></td>

                                    <td><input type="text" name="purchase_rate" onkeypress="return chkNumericKey(event)" id="purchase_rate" value="<?php echo $item["purchase_rate"] ?>" autofocus="" required="true" minlenght="2" maxlength="30" ></td>   
                                </tr>
                                <tr >
                                    <td><label class="control-label">Purch Tax Code</label></td>
                                    <td><input type="text" name="purch_code" id="purch_code"  value="<?php echo $item["purch_code"] ?>" autofocus="" required="true" minlenght="2" maxlength="30" ></td>   
                                </tr>
                                <tr >
                                    <td><label class="control-label">COGS Account</label></td>
                                    <td><input type="text" name="cogsaccount" id="cogsaccount"  value="<?php echo $item["cogsaccount"] ?>" autofocus="" required="true" minlenght="2" maxlength="30" ></td>   
                                </tr>
                                <tr style="vertical-align: top">
                                    <td colspan="2"><label class="control-label">Description on Purchase Transactions</label>
                                        <textarea style="height: 30px;;line-height: 20px; width: 98%" name="item_desc_purch" id="item_desc_purch"  value="<?php echo $item["item_desc_purch"] ?>" autofocus="" required="true" minlenght="2" maxlength="90" ></textarea>
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
                                    <td><input type="text" name="sales_code" id="sales_code"  value="<?php echo $item["sales_code"] ?>" autofocus="" required="true" minlenght="2" maxlength="30" ></td>   
                                </tr>
                                <tr >
                                    <td><label class="control-label">Income Account</label></td>
                                    <td><input type="text" name="incomeaccount" id="incomeaccount" onkeypress="return chkNumericKey(event)"  value="<?php echo $item["incomeaccount"] ?>" autofocus="" required="true" minlenght="2" maxlength="30" ></td>   
                                </tr>
                                <tr >
                                    <td colspan="2"><label class="control-label">Description on Sales Transactions</label>
                                        <textarea style="height: 30px;;line-height: 20px; width: 98%" name="item_desc_sales" id="item_desc_sales"  value="<?php echo $item["item_desc_sales"] ?>" autofocus="" required="true" minlenght="2" maxlength="90" ></textarea>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                    </td>
                    <td>
                        <fieldset class="well the-fieldset">

                            <table  border="0">
                                <tr  >
                                    <td style="width: 40%"><label class="control-label">Asset Account</label></td>
                                    <td style="vertical-align: bottom"><input type="text" name="assetaccount" id="assetaccount"  value="<?php echo $item["assetaccount"] ?>" autofocus="" required="true" minlenght="2" maxlength="30" ></td>   
                                </tr>
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
                                    <td style="vertical-align: bottom" ><input type="text" name="asof"   id="asof"  value="<?php echo $item["asof"] ?>" autofocus="" required="true" minlenght="2" maxlength="30" ></td>   
                                </tr>
                            </table>
                        </fieldset>

                    </td>
                </tr>
            </table>
        </div>
        <hr/>
        <!--    <button type="button" id="btnSubmitFullForm" class="btn btn-warning">Next</button>-->
        <input type="submit" id="btnSubmitFullForm" class="btn btn-success" onClick='submitDetailsForm()' value="SAVE AND NEXT"/>
        <a href="index.php?pagename=manage_itemmaster" id="btnSubmitFullForm" class="btn btn-info">CANCEL</a>
    </form>
</fieldset>
<!--<hr/>
<input type="button" id="btnCmpNext1" value="Next" class="btn btn-info" ><a href="customermaster/additionalcontact.php"></a>-->

<script>
    function submitDetailsForm() {
        $("#frmItemsSubmit").submit();
    }
    $(document).ready(function() {
        $('#inventorypartfrom').addClass('hide');
        $('#inventorypartfrom').removeClass('show');
    });

    $("#type").click(function() {
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

