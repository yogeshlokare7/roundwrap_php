<?php
$listofitems = MysqlConnection::fetchAll("item_master");
?>
<title>RoundWrap</title>

<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="View Inventory Master" class="tip-bottom"><i class="icon-home"></i>View Inventory Master</a>
    </div>
</div>
<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"><i class="icon-th"></i></span> 
            <h5>Inventory Master</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>#</th>                 							
                        <th>Item Code</th>
                        <th><Item Description</th>
                        <th><Item Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listofitems as $key => $value) {
                        ?>
                        <tr class="gradeX">
                            <td></td>
                            <td></td>
                           
                            <td><?php echo $value["item_code"] ?></td>
                            <td><?php echo $value["item_desc"] ?></td>
                             <td><?php echo $value["quantity"] ?></td>
                            
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>