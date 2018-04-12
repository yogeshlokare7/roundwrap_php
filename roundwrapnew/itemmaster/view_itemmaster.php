<?php
$itemid = filter_input(INPUT_GET, "itemId");
$flag = filter_input(INPUT_GET, "flag");

$arritem = MysqlConnection::fetchCustom("SELECT * FROM  `item_master` WHERE item_id = $itemid ");
$item = $arritem[0];

if (isset($_POST["deleteItem"])) {
    MysqlConnection::delete("DELETE FROM `item_master` WHERE item_id = $itemid");
    header("location:index.php?pagename=manage_itemmaster");
}

$purchasetaxcode = MysqlConnection::fetchCustom("SELECT taxcode, taxname, taxvalues FROM  `taxinfo_table` WHERE id = " . $item["purch_code"]);
$saletaxcode = MysqlConnection::fetchCustom("SELECT  taxcode, taxname, taxvalues  FROM  `taxinfo_table` WHERE id =  " . $item["sales_code"]);
$subitemof = MysqlConnection::fetchCustom("SELECT  item_code, item_name  FROM  `item_master` WHERE item_id = $itemid ");
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
    tr input{
        background-color: white;
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
                                <td >Type<br/><input type="text" readonly="" value="<?php echo $item["type"] ?>"></td>
                                <td >Item Code<br/><input  type="text"  value="<?php echo $item["item_code"] ?>" readonly="" /></td>
                                <td >Item Name<br/><input type="text"  value="<?php echo $item["item_name"] ?>" readonly="" /></td>
                                <td >Unit of Measures<br/><input type="text"  value="<?php echo $item["unit"] ?>" readonly=""/></td>

                            </tr>
                            <tr style="vertical-align: top">
                                <td >Sub Item of<br/><input type="text"  value="<?php echo implode(",", $subitemof[0]) ?>" readonly=""/></td>
                                <td >Item Status<br/><input  type="text"  value="<?php echo $item["status"] == "Y" ? "Active" : "In Active" ?>" readonly="" /></td>
                                <td colspan="2"></td>
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
                                            <input type="text"  value="<?php echo implode("- ", $saletaxcode[0]) ?> %" readonly=""/>

                                        </td>
                                        <td>Rate
                                            <input type="text"  value="<?php echo $item["sell_rate"] ?>"  readonly=""/> >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td  style="text-align: left" colspan="3">
                                            <input type="checkbox" readonly="" >&nbsp;This service performed by subcontractor,owner or partner
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
                                        <td><input type="text" value="<?php echo $item["purchase_rate"] ?>" readonly=""/></td>   
                                    </tr>
                                    <tr >
                                        <td><label class="control-label">Purch Tax Code</label></td>
                                        <td><input type="text" value="<?php echo implode("- ", $purchasetaxcode[0]) ?> %" readonly=""/></td>

                                    </tr>
                                    <tr style="vertical-align: top">
                                        <td colspan="2"><label class="control-label">Description on Purchase Transactions</label>
                                            <textarea style="height: 60px;;line-height: 20px; width: 98%" readonly=""><?php echo $item["item_desc_purch"] ?></textarea>
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
                                        <td><input type="text"  value="<?php echo $item["sell_rate"] ?>" readonly=""/></td>   
                                    </tr>
                                    <tr >
                                        <td><label class="control-label">Sales Tax Code</label></td>
                                        <td><input type="text"  value="<?php echo implode("- ", $saletaxcode[0]) ?> %" readonly=""/></td
                                    </tr>
                                    <tr >
                                        <td colspan="2"><label class="control-label">Description on Sales Transactions</label>
                                            <textarea style="height: 60px;;line-height: 20px; width: 98%"  readonly=""><?php echo $item["item_desc_sales"] ?></textarea>
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
                                        <td style="vertical-align: bottom"><input type="text"  value="<?php echo $item["reorder"] ?>" readonly=""/></td>   
                                    </tr>
                                    <tr >
                                        <td><label class="control-label">On Hand</label></td>
                                        <td style="vertical-align: bottom"><input type="text"  value="<?php echo $item["onhand"] ?>" readonly="" /></td>   
                                    </tr>
                                    <tr >
                                        <td><label class="control-label">Total Value</label></td>
                                        <td style="vertical-align: bottom" ><input type="text"  value="<?php echo $item["totalvalue"] ?>" readonly="" /></td>   
                                    </tr>
                                    <tr >
                                        <td><label class="control-label">As of</label></td>
                                        <td style="vertical-align: bottom" ><input type="date"   value="<?php echo $item["asof"] ?>" readonly="" /></td>   
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
        if (isset($flag) && $flag != "") {
            ?>
            <form name="frmDeleteItem" id="frmDeleteItem" method="post">
                <a href="index.php?pagename=manage_itemmaster" id="btnSubmitFullForm" class="btn btn-info">CANCEL</a>
                <input style="background-color: #2f96b4" type="submit" value="DELETE" name="deleteItem" class="btn btn-danger"/>
                <input type="hidden" name="itemid" value="<?php echo $itemid ?>"/>
            </form>
            <?php
        } else {
            echo '<a href="index.php?pagename=manage_itemmaster" id="btnSubmitFullForm" class="btn btn-danger">CANCEL</a>';
        }
        ?>
    </fieldset>


</div>