<?php
error_reporting(0);
session_start();
ob_start();
?>
<br/>
<br/>
<h6 style="text-align: center">MAIN SCREEN PAGE DESIGNING IS IN PROGRESS</h6>
<hr/>
<style>
    .customtablefordashboard{
        width: 90%;
        border-color: rgb(220,220,220);
        border: solid 1px rgb(220,220,220);
    }
    .customtablefordashboard tr{
        height: 35px;
    }
</style>
<center>
    <table class="customtablefordashboard" border="1">
        <th style="width: 20%">
            <a href="index.php?pagename=manage_itemmaster&status=active">
                Total Items
                <br/>
                <?php echo MysqlConnection::getCounter("item_master", "item_id") ?>
            </a>
        </th>

        <th style="width: 20%">
            <a href="index.php?pagename=manage_customermaster&status=active">
                Total Customer
                <br/>
                <?php echo MysqlConnection::getCounter("customer_master", "id") ?>
            </a>
        </th>

        <th style="width: 20%">
            <a href="index.php?pagename=manage_suppliermaster&status=active">
                Total Vendor
                <br/>
                <?php echo MysqlConnection::getCounter("supplier_master", "supp_id") ?>
            </a>
        </th>

        <th style="width: 20%">
            <a href="index.php?pagename=manage_perchaseorder">
                Total Purchase Order
                <br/>
                <?php echo MysqlConnection::getCounter("purchase_order", "id") ?>
            </a>
        </th>

        <th>
            <a href="">
                Total Sales Order
                <br/>
                <?php echo MysqlConnection::getCounter("sales_order", "id") ?>
            </a>
        </th>
    </table>
</center>