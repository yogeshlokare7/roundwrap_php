<?php
$listPerchaseOrders = MysqlConnection::fetchAll("purchase_order");
?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a class="tip-bottom"><i class="icon-home"></i>Purchase Orders</a>
    </div>
</div>

<div class="container-fluid">
    <br/>
    <a class="btn" href="index.php?pagename=create_perchaseorder" >Create Purchase Order</a>
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"><i class="icon-th"></i></span> 
            <h5>SUPPLIERS PURCHASE ORDER LIST</h5>
        </div>
        <div class="widget-content nopadding">
            <form name="perchaseorder" id="perchaseorder" method="POST">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th style="width: 2.3%">#</th>
                            <th style="width: 2.3%">#</th>  
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
                        foreach ($listPerchaseOrders as $key => $value) {
                            ?>
                            <tr class="gradeX">

                                <td><a href="#myAlert"  onclick="setDeleteField('<?php echo $value["purchaseOrderId"] ?>')" data-toggle="modal"  class="tip-top" data-original-title="Delete Record"><i class="icon-remove"></i></a> </td>

                                <td>
                                    <div class="btn-group">
                                        <button data-toggle="dropdown" class="btn dropdown-toggle">Action&nbsp;<span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">View Purchase Order</a></li>
                                            <li><a href="#">Delete Purchase Order</a></li>   
                                            <li><a href="#">Edit Purchase Order</a></li>   
                                            <li><a href="#">Enter Receiving order</a></li> 
                                        </ul>
                                    </div>
                                </td>

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
                <input type="hidden" id="deleteId" name="cid" value="">
                <input type="hidden" id="flag" name="flag" value="">
            </form>
        </div>
    </div>
</div>
<script>
    $("#deleteThis").click(function () {
        $("div#divLoading").addClass('show');
        var dataString = "deleteId=" + $('#deleteId').val();
        $.ajax({
            type: 'POST',
            url: 'perchaseorder/perchaseorder_ajax.php',
            data: dataString
        }).done(function (data) {
        }).fail(function () {
        });
        location.reload();
    });

    function setDeleteField(deleteId) {
        document.getElementById("deleteId").value = deleteId;
    }

</script>