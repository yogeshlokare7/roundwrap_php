<?php
$listSalesOrders = MysqlConnection::fetchAll("customer_packing_slip");
?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a class="tip-bottom"><i class="icon-home"></i>Create Order</a>
    </div>
</div>

<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"><i class="icon-th"></i></span> 
            <h5>CUSTOMER SALES ORDER</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th style="width: 2.3%">#</th>
                        <th style="width: 2.3%">#</th>  
                        <th>ID</th>
                        <th>Customer Name</th>
                        <th>Ordered Items</th>
                        <th>Delivered Items</th>
                        <th>Pending Item</th>
                        <th>Packing Count</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                   <?php
                    foreach ($listSalesOrders as $key => $value) {
                        ?>
                        <tr class="gradeX">
                            <td><a href="#" class="tip-top" data-original-title="Edit Record"><i  class="icon-edit"></i></a></td>
                            <td><a href="#" class="tip-top" data-original-title="Delete Record"><i  class="icon-remove"></i></a> </td>
                            <td><?php echo $value["cpsId"] ?></td>
                            <td><?php echo $value["customerId"] ?></td>
                            <td><?php echo $value["itemQty"] ?></td>
                            <td></td>
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