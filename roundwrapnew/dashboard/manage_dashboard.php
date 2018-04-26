<?php
error_reporting(0);
session_start();
ob_start();
$listSalesOrders = MysqlConnection::fetchCustom("SELECT so.id, so.sono, so.customer_id, so.shipvia, so.representative, so.soorderdate ,  cm.phno, cm.cust_companyname "
                . "FROM `sales_order` so , customer_master cm WHERE so.customer_id = cm.id AND so.isBackOrder = 'Y' AND so.isOpen = 'Y' ORDER BY so.isOpen DESC LIMIT 0,20");
?>
<div class="span12" style="border-bottom: solid 1px rgb(220,220,220);width: 96%; ">
    <ul class="quick-actions" style="margin-left: -10px;">
        <li> <a href="index.php?pagename=manage_customermaster&status=active"> <i class="icon-client"></i>CUSTOMER MASTER </a> </li>
        <li> <a href="index.php?pagename=manage_suppliermaster&status=active"> <i class="icon-user"></i>VENDOR MASTER</a> </li>
        <li> <a href="index.php?pagename=manage_itemmaster&status=active"> <i class="icon-wallet"></i>ITEM MASTER </a> </li>
        <li> <a href="index.php?pagename=create_perchaseorder"> <i class="icon-shopping-bag"></i>CREATE PURCHASE ORDER </a> </li>
        <li> <a href="index.php?pagename=create_salesorder"> <i class="icon-book"></i>CREATE SALES ORDER</a> </li>
    </ul>
</div>

<div class="span4" style="margin-left: 0px;">
    <div class="span6">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-folder-close"></i> </span>
                <h5>Back Order's</h5>
            </div>
            <div class="widget-content nopadding updates">
                <div style="height: 200px;overflow: auto">
                    <?php
                    $index = 1;
                    foreach ($listSalesOrders as $key => $value) {
                        ?>
                        <div class="new-update clearfix"> 
                            <i ><?php echo $index++?> )</i> 
                            <span class="update-notice"> 
                                <a title="" href="index.php?pagename=create_salesorderreceiving&salesorderid=<?php echo $value["id"] ?>"><strong><?php echo $value["cust_companyname"] ?> </strong></a> 
                                <span>
                                    Sales Order Number
                                    <b><?php echo $value["sono"] ?></b> 
                                    [ <b><?php echo $value["shipvia"] ?> </b> ]
                                    
                                </span> 
                            </span> 
                            <span class="update-date" style="width: 60px;"><?php echo $value["soorderdate"] ?></span> 
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="span6">
     
    </div>



</div>
<div class="span8">

</div>


<div style="width: 97%;border-bottom:  solid 1px rgb(220,220,230); height: 1px;clear: both;margin: 0 auto">

</div>