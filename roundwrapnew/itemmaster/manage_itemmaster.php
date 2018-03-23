<?php
$listofitems = MysqlConnection::fetchAll("item_master");
?>
<title>RoundWrap</title>

<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="manage_itemmaster.php" title="View Item Master" class="tip-bottom"><i class="icon-home"></i>View Item Master</a>
    </div>
</div>
<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"><i class="icon-th"></i></span> 
            <h5>Item Master</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>#</th>
                        <th>ID</th>                 							
                        <th>Code</th>
                        <th>Description(Purchase)</th>
                        <th>Description (Sales)</th>
                        <th>Unit</th>
                        <th>Opening Stock</th>
                        <th>Min Stock</th>
                        <th>Order Quantity</th>
                        <th>Purchase Rate</th>
                        <th>Sell Rate</th>
                        <th>Added By</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listofitems as $key => $value) {
                        ?>
                        <tr class="gradeX">
                            <td></td>
                            <td></td>
                            <td><?php echo $value["profile_name"] ?></td>
                            <td><?php echo $value["label_name"] ?></td>
                            <td><?php echo $value["label_value"] ?></td>
                            <td><?php echo $value["profile_name"] ?></td>
                            <td><?php echo $value["label_name"] ?></td>
                            <td><?php echo $value["label_value"] ?></td>
                            <td><?php echo $value["profile_name"] ?></td>
                            <td><?php echo $value["label_name"] ?></td>
                            <td><?php echo $value["label_value"] ?></td>
                            <td><?php echo $value["profile_name"] ?></td>
                            
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>