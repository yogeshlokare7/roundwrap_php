<style>
    table tbody {

    }
    table tr td{
        padding: 5px;
    }
</style>
<?php
$purchaseid = filter_input(INPUT_GET, "purchaseorderid");
$result = MysqlConnection::fetchCustom("SELECT * , "
                . "( SELECT companyname FROM supplier_master WHERE supp_id = po.`supplier_id` ) AS companyname FROM purchase_order po, purchase_item pi WHERE po.id = pi.po_id AND pi.po_id =$purchaseid");
$purchaseorder = $result[0];

if (isset($_POST["purchaseorderid"]) && isset($_GET["flag"])) {
    $poid = $_POST["purchaseorderid"];
    MysqlConnection::delete("DELETE FROM purchase_order WHERE id = $poid ");
    MysqlConnection::delete("DELETE FROM purchase_item WHERE po_id = $poid ");
    header("location:index.php?pagename=manage_perchaseorder");
}
?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a class="tip-bottom"><i class="icon-home"></i>HOME</a>
        <a class="tip-bottom"><i class="icon-home"></i>PURCHASE ORDER INVOICE</a>
    </div>
</div>
<style>
    input,textarea,select,date{ width: 90%; }
    .control-label{ margin-left: 10px; }
    tr,td{ vertical-align: middle; font-size: 12px;padding: 0px;margin: 0px;}
</style>
<form  method="post">

    <div class="container-fluid" style="" >
        <div class="widget-box" style="width: 100%;border-bottom: solid 1px #CDCDCD;">
            <div class="widget-title">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab1">PURCHASE ORDER INVOICE</a></li>
                </ul>
            </div>
            <br/>
            <div style="height: 700px;overflow: auto;width: 80%;margin: 0 auto">

                <div id="page-wrap">

                    <textarea id="header">INVOICE</textarea>

                    <div id="identity">

                        <textarea id="address">Chris Coyier
123 Appleseed Street
Appleville, WI 53719

Phone: (555) 555-5555</textarea>

                        <div id="logo">

                            <div id="logoctr">
                                <a href="javascript:;" id="change-logo" title="Change logo">Change Logo</a>
                                <a href="javascript:;" id="save-logo" title="Save changes">Save</a>
                                |
                                <a href="javascript:;" id="delete-logo" title="Delete logo">Delete Logo</a>
                                <a href="javascript:;" id="cancel-logo" title="Cancel changes">Cancel</a>
                            </div>

                            <div id="logohelp">
                                <input id="imageloc" type="text" size="50" value="" readonly=""><br>
                            </div>
                            <img id="image" src="./Editable Invoice_files/logo.png" alt="logo">
                        </div>

                    </div>

                    <div style="clear:both"></div>

                    <div id="customer">

                        <textarea id="customer-title">Widget Corp.
c/o Steve Widget</textarea>

                        <table id="meta">
                            <tbody><tr>
                                    <td class="meta-head">Invoice #</td>
                                    <td><textarea>000123</textarea></td>
                                </tr>
                                <tr>

                                    <td class="meta-head">Date</td>
                                    <td><textarea id="date">December 15, 2009</textarea></td>
                                </tr>
                                <tr>
                                    <td class="meta-head">Amount Due</td>
                                    <td><div class="due">$875.00</div></td>
                                </tr>

                            </tbody></table>

                    </div>

                    <table id="items">

                        <tbody><tr>
                                <th>Item</th>
                                <th>Description</th>
                                <th>Unit Cost</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>

                            <tr class="item-row">
                                <td class="item-name"><div class="delete-wpr"><textarea>Web Updates</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
                                <td class="description"><textarea>Monthly web updates for http://widgetcorp.com (Nov. 1 - Nov. 30, 2009)</textarea></td>
                                <td><textarea class="cost">$650.00</textarea></td>
                                <td><textarea class="qty">1</textarea></td>
                                <td><span class="price">$650.00</span></td>
                            </tr>

                            <tr class="item-row">
                                <td class="item-name"><div class="delete-wpr"><textarea>SSL Renewals</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>

                                <td class="description"><textarea>Yearly renewals of SSL certificates on main domain and several subdomains</textarea></td>
                                <td><textarea class="cost">$75.00</textarea></td>
                                <td><textarea class="qty">3</textarea></td>
                                <td><span class="price">$225.00</span></td>
                            </tr>

                            <tr id="hiderow">
                                <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
                            </tr>

                            <tr>
                                <td colspan="2" class="blank"> </td>
                                <td colspan="2" class="total-line">Subtotal</td>
                                <td class="total-value"><div id="subtotal">$875.00</div></td>
                            </tr>
                            <tr>

                                <td colspan="2" class="blank"> </td>
                                <td colspan="2" class="total-line">Total</td>
                                <td class="total-value"><div id="total">$875.00</div></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="blank"> </td>
                                <td colspan="2" class="total-line">Amount Paid</td>

                                <td class="total-value"><textarea id="paid">$0.00</textarea></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="blank"> </td>
                                <td colspan="2" class="total-line balance">Balance Due</td>
                                <td class="total-value balance"><div class="due">$875.00</div></td>
                            </tr>

                        </tbody></table>

                    <div id="terms">
                        <h5>Terms</h5>
                        <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
                    </div>

                </div>

            </div>

            <hr/>
        </div>
    </div>
</form>
<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/bootstrap-colorpicker.js"></script> 
<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/maruti.js"></script> 
<script src="js/maruti.form_common.js"></script>
