<?php
$listofprofiles = MysqlConnection::fetchAll("taxinfo_table");
?>
<title>RoundWrap</title>

<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="View User Role" class="tip-bottom"><i class="icon-home"></i>Tax Info Table</a>
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
                        <th>#</th>
                        <th>#</th>
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
                            <td></td>
                            <td></td>
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