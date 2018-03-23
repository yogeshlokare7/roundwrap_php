<?php
$listoftaxname = MysqlConnection::fetchCustom("SELECT * FROM generic_entry WHERE type = 'TAX_TYPE' ");
?>
<title>RoundWrap</title>

<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="View Tax Name" class="tip-bottom"><i class="icon-home"></i>View Tax Name</a>
    </div>
</div>
<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"><i class="icon-th"></i></span> 
            <h5>Tax Name</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th style="width: 2.3%">#</th>
                        <th style="width: 2.3%">#</th> 
                        <th>Name</th>
                        <th>Description</th>
                        <th>Active</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listoftaxname as $key => $value) {
                        ?>
                        <tr class="gradeX">
                            <td><a href="#" class="tip-top" data-original-title="Edit Record"><i  class="icon-edit"></i></a></td>
                            <td><a href="#" class="tip-top" data-original-title="Delete Record"><i  class="icon-remove"></i></a> </td>
                            <td><?php echo $value["name"] ?></td>
                            <td><?php echo $value["description"] ?></td>
                            <td><?php echo $value["active"] ?></td>
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>