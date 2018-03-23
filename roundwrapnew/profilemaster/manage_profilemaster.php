<?php
$listofprofiles = MysqlConnection::fetchAll("profile_master");
?>
<title>RoundWrap</title>

<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="manage_profilemaster.php" title="View Profile Master" class="tip-bottom"><i class="icon-home"></i>View Profile Master</a>
    </div>
</div>
<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"><i class="icon-th"></i></span> 
            <h5>Profile Master</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>#</th>
                        <th>Profile Name</th>
                        <th>Label Name</th>
                        <th>Label Value</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listofprofiles as $key => $value) {
                        ?>
                        <tr class="gradeX">
                            <td></td>
                            <td></td>
                            <td><?php echo $value["profile_name"] ?></td>
                            <td><?php echo $value["label_name"] ?></td>
                            <td><?php echo $value["label_value"] ?></td>
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>