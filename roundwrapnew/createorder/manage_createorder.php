<?php
$listCreateOrders = MysqlConnection::fetchAll("sales_order");
?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a  class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a class="tip-bottom"><i class="icon-home"></i>Create Order</a>
    </div>
</div>

<div class="container-fluid">
    </br>
    <a class="btn" href="index.php?pagename=create_createorder" >Create Order</a>
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"><i class="icon-th"></i></span> 
            <h5>CUSTOMER ORDERS</h5>
        </div>
        <div class="widget-content nopadding">
            <form name="createorder" id="createorder" method="POST">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th style="width: 2.3%">#</th>
                            <th style="width: 2.3%">#</th>  
                            <th>ID</th>
                            <th>PO ID</th>
                            <th>Customer Name</th>
                            <th>Expected Date</th>
                            <th>Total Items</th>
                            <th>Item Left</th>
                            <th>Ship Via</th>
                            <th>Entered By</th>
                            <th>Gross Amount</th>
                            <th>Tax Amount</th>
                            <th>Net Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listCreateOrders as $key => $value) {
                            ?>
                            <tr class="gradeX">
                                <td><a href="#myAlert" onclick="setDeleteField('<?php echo $value["id"] ?>')" data-toggle="modal"  class="tip-top" data-original-title="Delete Record"><i class="icon-remove"></i></a> </td>

                                <td>
                                    <div class="btn-group">
                                        <button data-toggle="dropdown" class="btn dropdown-toggle">Action&nbsp;<span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Create Order</a></li> 
                                            <li><a href="#">View Order</a></li>
                                            <li><a href="#">Delete Order</a></li>   
                                            <li><a href="#">Edit Order</a></li>   
                                        </ul>
                                    </div>
                                </td>

                                <td><?php echo $value["id"] ?></td>
                                <td><?php echo $value["customer_id"] ?></td>
                                <td><?php echo $value["expected_date"] ?></td>
                                <td></td>
                                <td></td>
                                <td><?php echo $value["ship_via"] ?></td>
                                <td><?php echo $value["added_by"] ?></td>
                                <td><?php echo $value["sub_total"] ?></td>
                                <td><?php echo $value["taxAmount"] ?></td>
                                <td><?php echo $value["total"] ?></td>
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
        $("div#divLoading").addClass('show');
        var dataString = "deleteId=" + $('#deleteId').val();
        $.ajax({
            type: 'POST',
            url: 'createorder/createorder_ajax.php',
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