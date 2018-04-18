<?php
error_reporting(0);
session_start();
ob_start();
?>
<a href="index.php?pagename=manage_" class="visible-phone"><i class="icon icon-home"></i> Main Screen</a>
<ul>
    <li class="active"><a href="index.php?pagename=manage_dashboard"><i class="icon icon-home"></i> <span> Main Screen</span></a> </li>
    <li> <a><i class="icon icon-th-large"></i> <span>Masters</span></a> 
        <ul>
            <li><a href="index.php?pagename=manage_itemmaster">Item Master</a></li>
            <li><a href="index.php?pagename=manage_customermaster">Customer Master</a></li>
            <li><a href="index.php?pagename=manage_suppliermaster">Vendor Master</a></li>
        </ul>
    </li>
    <li> <a ><i class="icon icon-inbox"></i> <span>Retail</span></a> 
        <ul>
            <li><a href="index.php?pagename=manage_perchaseorder">Purchase Orders</a></li>
            <li><a href="index.php?pagename=manage_receivingorder">Receiving Purchase Orders</a></li>
            <li><a href="index.php?pagename=manage_salesorder">Create Customer Order</a></li>
            <li><a href="index.php?pagename=manage_salesorderreceiving">Customer Sales Order</a></li>
        </ul>
    </li>
<!--    <li><a><i class="icon icon-list-alt"></i> <span>Production</span></a>
        <ul>
            <li><a href="index.php?pagename=manage_packingslip">Packing Slip</a></li>
            <li><a href="index.php?pagename=manage_quotation">Quotation</a></li>
            <li><a href="index.php?pagename=manage_workorder">Work Order</a></li>
            <li><a href="index.php?pagename=manage_layout">Layout</a></li>
            <li><a href="index.php?pagename=manage_invoice">Invoice</a></li>
        </ul>
    </li>
    <li class="submenu"> <a><i class="icon icon-th-list"></i> <span>Reports</span> </a>
        <ul><li><a href="index.php?pagename=manage_salespersonreport">Sales Person Report</a></li></ul>
    </li>-->

    <li style="float: right" ><a href="logout.php"><i class="icon  icon-off"></i><span>Log Out</span> </a></li>
    <li style="float: right" ><a ><i class="icon  icon-time"></i><span><?php echo $_SESSION["time"] ?></span> </a></li>
    <li style="float: right;text-transform: capitalize" >
        <a href="logout.php"><i class="icon  icon-user"></i><span>Hi <?php echo $_SESSION["user"]["firstName"] ?>&nbsp; <?php echo $_SESSION["user"]["lastName"] ?></span>
    </li>

</ul>