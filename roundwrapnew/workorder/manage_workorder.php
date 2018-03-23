<?php
$workOrderDashboard = MysqlConnection::fetchAll("packslip");
?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a  class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a class="tip-bottom"><i class="icon-home"></i>Work order details</a>
    </div>
</div>

<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"><i class="icon-th"></i></span> 
            <h5>Work Order Details</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th style="width: 2.3%">#</th>
                        <th style="width: 2.3%">#</th>  
                        <th>ID</th>
                        <th>Company Name</th>
                        <th>Profile Name</th>
                        <th>SO No</th>
                        <th>PO No</th>
                        <th>Rec Date</th>
                        <th>Req Date</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                    foreach ($workOrderDashboard as $key => $value) {
                        ?>
                        <tr class="gradeX">
                            <td><a href="#" class="tip-top" data-original-title="Edit Record"><i  class="icon-edit"></i></a></td>
                            <td><a href="#" class="tip-top" data-original-title="Delete Record"><i  class="icon-remove"></i></a> </td>
                            <td><?php echo $value["workOrd_Id"] ?></td>
                            <td></td>
                            <td><?php echo $value["prof_id"] ?></td>
                            <td><?php echo $value["so_no"] ?></td>
                            <td><?php echo $value["po_no"] ?></td>
                            <td><?php echo $value["rec_date"] ?></td>
                            <td><?php echo $value["req_date"] ?></td>
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>