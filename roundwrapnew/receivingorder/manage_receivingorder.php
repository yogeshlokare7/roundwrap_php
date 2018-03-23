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
            <form name="receivingorder" id="profilemaster" method="POST">
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
                <input type="hidden" id="deleteId" name="cid" value="">
                <input type="hidden" id="flag" name="flag" value="">
            </form>
        </div>
    </div>
</div>
<script>
    $("#deleteThis").click(function () {
        var dataString = "deleteId=" + $('#deleteId').val();
        $.ajax({
            type: 'POST',
            url: 'receivingorder/receivingorder_ajax.php',
            data: dataString
        }).done(function (data) {
            $("#flagmsg").append("<br/><div id='successMessage' class='alert alert-success'><button class='close' data-dismiss='alert'>×</button><strong>Success!</strong>Record Deleted Successfully !!!</div>");
        }).fail(function () {
            $("#flagmsg").append("fail");
        });
        location.reload();
    });

    function setDeleteField(deleteId) {
        document.getElementById("deleteId").value = deleteId;
    }

</script>