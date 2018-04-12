<?php
$itemid = filter_input(INPUT_GET, "itemId");

$arritem = MysqlConnection::fetchCustom("SELECT * FROM  `item_master` WHERE item_id = $itemid ");
$item = $arritem[0];
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
<div class="container-fluid"  >
    <div class="cutomheader">
        <h5 style="font-family: verdana;font-size: 12px;">VIEW ITEM</h5>
    </div>
    <br/>
    <fieldset class="well the-fieldset">
        <table style="vertical-align: top">
            
            <tr style="vertical-align: top">
                <td style="vertical-align: top">
                    <fieldset class="well the-fieldset">
                        <table  style="vertical-align: top" border="0">
                            <tr style="vertical-align: top">
                                <td colspan="4">Type<br/><input type="text" readonly="" value="<?php echo $item["type"] ?>"></td>
                            </tr>
                            <tr>
                                <td >Item Code<br/><input  type="text"  value="<?php echo $item["item_code"] ?>" readonly="" /></td>
                                <td >Item Name<br/><input type="text"  value="<?php echo $item["item_name"] ?>" readonly="" /></td>
                                <td >Unit of Measures<br/><input type="text"  value="<?php echo $item["unit"] ?>" readonly=""/></td>
                                <td >Sub Item of<br/><input type="text"  value="<?php echo $item["subitemof"] ?>" readonly=""/></td>
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
                                            <textarea  style="line-height: 15px" readonly=""><?php echo $item["item_desc_sales"] ?></textarea>
                                        </td>
                                        <td style="width: 220px;">Sales Tax Code
                                            <select name="sales_code" id="taxInformation1" value="<?php echo $item["sales_code"] ?>">
                                                <option value="">&nbsp;&nbsp;</option>
                                                <option value="1" ><< ADD NEW >></option>
                                                <?php foreach ($sqltaxinfodata as $key => $value) { ?>
                                                    <option  value='<?php echo $value["id"] ?>'><?php echo $value["taxcode"] ?> - <?php echo $value["taxname"] ?> - <?php echo $value["taxvalues"] ?>%</option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td>Rate
                                            <input type="text" name="sell_rate" id="sell_rate" onkeypress="return chkNumericKey(event)" value="<?php echo $item["sell_rate"] ?>" minlenght="2" maxlength="30"  >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td  style="text-align: left" colspan="3">
                                            <input type="checkbox" name="taxcheckbox" id="taxcheckbox">&nbsp;This service performed by subcontractor,owner or partner
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
                                            <select name="purch_code" id="taxInformation2">
                                                <option value="">&nbsp;&nbsp;</option>
                                                <option value="1" ><< ADD NEW >></option>
                                                <?php foreach ($sqltaxinfodata as $key => $value) { ?>
                                                    <option  value='<?php echo $value["id"] ?>'><?php echo $value["taxcode"] ?> - <?php echo $value["taxname"] ?> - <?php echo $value["taxvalues"] ?>%</option>
                                                <?php } ?>
                                            </select>
                                        </td>   
                                    </tr>
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
                                            <select name="sales_code" id="taxInformation3">
                                                <option value="">&nbsp;&nbsp;</option>
                                                <option value="1" ><< ADD NEW >></option>
                                                <?php foreach ($sqltaxinfodata as $key => $value) { ?>
                                                    <option  value='<?php echo $value["id"] ?>'><?php echo $value["taxcode"] ?> - <?php echo $value["taxname"] ?> - <?php echo $value["taxvalues"] ?>%</option>
                                                <?php } ?>
                                            </select>
                                        </td>   
                                    </tr>
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
        <a href="index.php?pagename=manage_itemmaster" id="btnSubmitFullForm" class="btn btn-info">CANCEL</a>
               </fieldset>


</div>