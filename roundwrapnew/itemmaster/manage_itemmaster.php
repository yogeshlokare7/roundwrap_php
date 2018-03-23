<?php
$listofitems = MysqlConnection::fetchAll("item_master");
?>
<title>RoundWrap</title>

<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="index.php" title="View Item Master" class="tip-bottom"><i class="icon-home"></i>View Item Master</a>
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
                        <th style="width: 2.3%">#</th>
                        <th style="width: 2.3%">#</th>
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
                            <td><a href="#" class="tip-top" data-original-title="Edit Record"><i  class="icon-edit"></i></a></td>
                            <td><a href="#" class="tip-top" data-original-title="Delete Record"><i  class="icon-remove"></i></a> </td>
                            <td><?php echo $value["item_id"] ?></td>
                            <td><?php echo $value["item_code"] ?></td>
                            <td><?php echo $value["item_desc"] ?></td>
                            <td><?php echo $value["item_desc_sales"] ?></td>
                            <td><?php echo $value["unit"] ?></td>
                            <td><?php echo $value["opening_stock"] ?></td>
                            <td><?php echo $value["stockLevel"] ?></td>
                            <td><?php echo $value["orderQuanity"] ?></td>
                            <td><?php echo $value["purchase_rate"] ?></td>
                            <td><?php echo $value["sell_rate"] ?></td>
                            <td><?php echo $value["add_by"] ?></td>
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>