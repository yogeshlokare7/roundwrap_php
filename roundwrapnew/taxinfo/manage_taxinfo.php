<?php
$listofprofiles = MysqlConnection::fetchAll("taxinfo_table");
?>
<title>RoundWrap</title>

<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="View Tax Info" class="tip-bottom"><i class="icon-home"></i> View Tax Info</a>
    </div>
</div>
<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"><i class="icon-th"></i></span> 
            <h5>Tax Info</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th style="width: 2.3%">#</th>
                        <th style="width: 2.3%">#</th>
                        <th>Country</th>
                        <th>Province</th>
                        <th>Active</th>
                        <th>Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listofprofiles as $key => $value) {
                        ?>
                        <tr class="gradeX">
                            <td><a href="#" class="tip-top" data-original-title="Edit Record"><i  class="icon-edit"></i></a></td>
                            <td><a href="#myAlert" data-toggle="modal"  class="tip-top" data-original-title="Delete Record"><i class="icon-remove"></i></a> </td>
                            <td><?php echo $value["country"] ?></td>
                            <td><?php echo $value["province"] ?></td>
                            <td><?php echo $value["tax"] ?></td>
                            <td><?php echo $value["percentage"] ?></td>
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