<?php
$listRecieveingOrders = MysqlConnection::fetchAll("supplier_packing_slip");
?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a class="tip-bottom"><i class="icon-home"></i>Receiving Orders</a>
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
                        <th style="width: 2.3%">#</th>
                        <th style="width: 2.3%">#</th>  
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
                            <td><a href="#" class="tip-top" data-original-title="Edit Record"><i  class="icon-edit"></i></a></td>
                            <td><a href="#myAlert" data-toggle="modal"  class="tip-top" data-original-title="Delete Record"><i class="icon-remove"></i></a> </td>
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
<div id="myAlert" class="modal hide" style="width: 400px;top: 30%;left: 50%;">
    <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3>Action Alert !!!</h3>
    </div>
    <div class="modal-body">
        <p>Are you sure you want to delete this Item ???</p>
    </div>
    <div class="modal-footer"> 
        <a id="deleteThis" data-dismiss="modal" class="btn btn-primary">Confirm</a> 
        <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
    </div>
</div>
<script>
    $("#myAlert").click(function() {
    });
</script>