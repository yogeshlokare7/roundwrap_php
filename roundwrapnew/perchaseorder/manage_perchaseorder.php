<?php
$listPurchaseOrders = MysqlConnection::fetchAll("purchase_order");
?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Purchase Orders</a>
    </div>
</div>

<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"><i class="icon-th"></i></span> 
            <h5>SUPPLIERS PURCHASE ORDER LIST</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>PO ID</th>
                        <th>Supplier Name</th>
                        <th>Expected Date</th>
                        <th>Total Items</th>
                        <th>PO Status</th>
                        <th>Ship Via</th>
                        <th>Entered By</th>
                        <th>Gross Amount</th>
                        <th>Tax Amt</th>
                        <th>Net Amount</th>

                    </tr>
                </thead>
                <tbody>
                   <?php
                    foreach ($listPurchaseOrders as $key => $value) {
                        ?>
                        <tr class="gradeX">
                            <td></td>
                            <td></td>
                            <td><?php echo $value["purchaseOrderId"] ?></td>
                            <td><?php echo $value["supplier_id"] ?></td>
                            <td><?php echo $value["expected_date"] ?></td>
                            <td></td>
                            <td><?php echo $value["label_value"] ?></td>
                            <td><?php echo $value["ship_via"] ?></td>
                            <td><?php echo $value["added_by"] ?></td>
                            <td><?php echo $value["sub_total"] ?></td>
                            <td><?php echo $value["totalTax"] ?></td>
                            <td><?php echo $value["total"] ?></td>
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>