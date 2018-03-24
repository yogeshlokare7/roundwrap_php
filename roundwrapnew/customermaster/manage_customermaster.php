<?php $listofcustomers = MysqlConnection::fetchAll("customer_master"); ?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="View Customer Master" class="tip-bottom">View Customer Master</a>
    </div>
</div>
<div class="container-fluid" >
    <br/>
    <a class="btn" href="#addData"  data-toggle="modal">ADD CUSTOMER</a>
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"><i class="icon-th"></i></span> 
            <h5>Customer Master</h5>
        </div>
        <div class="widget-content nopadding">
            <form name="customermaster" id="customermaster" method="POST">
                <table class="table table-bordered data-table">
                    <thead>

                        <tr>
                            <th style="width: 2.3%">#</th>
                            <th style="width: 2.3%">#</th>
                            <th>Company Name</th>
                            <th>Address</th>
                            <th>Contact No</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Sales Person Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listofcustomers as $key => $value) {
                            ?>

                            <tr class="gradeX">
                                <td>
                                    <a onclick="setDeleteField('<?php echo $value["cust_id"] ?>')" href="#myAlert" data-toggle="modal"  class="tip-top" data-original-title="Delete Record" data-id="<? echo $value['id'] ?>">
                                        <i class="icon-remove"></i>
                                    </a> 
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button data-toggle="dropdown" class="btn dropdown-toggle">Action&nbsp;<span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="index.php?pagename=create_customermaster&customerId=1">Edit Customer</a></li>
                                            <li><a href="index.php?pagename=create_customermaster">Create Customer</a></li>
                                            <li><a href="#">Create Purchase Order</a></li>
                                            <li><a href="#">Edit Customer</a></li>
                                            <li><a href="#">Create Customer</a></li>
                                            <li><a href="#">Create Purchase Order</a></li>
                                            <li><a href="#">Edit Customer</a></li>
                                            <li><a href="#">Create Customer</a></li>    
                                            <li><a href="index.php?pagename=create_perchaseorder&customerId=<?php echo $value["cust_id"] ?>">Create Purchase Order</a></li>
                                            <li><a href="#">Create Invoice</a></li>
                                        </ul>
                                    </div>
                                </td>

                                <td><?php echo $value["cust_companyname"] ?></td>
                                <td><?php echo $value[""] ?></td>
                                <td><?php echo $value["phno"] ?></td>
                                <td><?php echo $value["cust_email"] ?></td>
                                <td><?php echo $value[""] ?></td>
                                <td><?php echo $value["sales_person_name"] ?></td>
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
        $('#img').show();
        var dataString = "deleteId=" + $('#deleteId').val();
        $.ajax({
            type: 'POST',
            url: 'customermaster/customermaster_ajax.php',
            data: dataString
        }).done(function (data) {
            $('#img').hide();
        }).fail(function () {
        });
        location.reload();
    });
    function setDeleteField(deleteId) {
        document.getElementById("deleteId").value = deleteId;
    }
    $("#save").click(function () {
        var json = convertFormToJSON("#basic_validate");
        $.ajax({
            type: 'POST',
            url: 'customermaster/savecustomermaster_ajax.php',
            data: json
        }).done(function (data) {
        }).fail(function () {
        });
        location.reload();
    });
</script>

<!-- this is model dialog --->