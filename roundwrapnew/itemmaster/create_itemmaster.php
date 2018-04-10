<?php
$itemid = filter_input(INPUT_GET, "itemId");

if (!empty($itemid)) {
//    echo "SELECT * FROM customer_master WHERE id = $customerid ";
    $itemarray = MysqlConnection::fetchCustom("SELECT * FROM  item_master WHERE item_id =$itemid");
    $item = $itemarray[0];
}
?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="View Item Master" class="tip-bottom">Create New Item</a>
    </div>
</div>
<div class="container-fluid"  >
    <div class="cutomheader">
        <h5 style="font-family: verdana;font-size: 12px;">CREATE NEW ITEM</h5>
    </div>
    <div class="widget-box" style="width: auto">
        <div class="widget-title">
            <ul class="nav nav-tabs">
                <li id="" class="active"><a data-toggle="tab" href="#tab1">ITEM INFORMATION </a></li>
            </ul>
        </div>

        <div class="widget-content tab-content"  >
            <div id="tab1">
                <?php include 'itemmaster/iteminfo.php'; ?>
            </div>
        </div>  
        <!--</form>-->
    </div>
</div>