<?php
$listRecieveingOrders = MysqlConnection::fetchAll("supplier_packing_slip");
?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Receiving Orders</a>
    </div>
</div>

<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"><i class="icon-th"></i></span> 
            <h5>SUPPLIERS RECEIVING LIST</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Status</th>
                        <th>PO ID</th>
                        <th>Supplier Name</th>
                        <th>Purchase Item </th>
                        <th>Received Items</th>
                        <th>Pending Items</th>
                        <th>Packing Count</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                    foreach ($listRecieveingOrders as $key => $value) {
                        ?>
                        <tr class="gradeX">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $value["sPOId"] ?></td>
                            <td><?php echo $value["supplierId"] ?></td>
                            <td><?php echo $value["itemQty"] ?></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>