<?php
$itemid = filter_input(INPUT_GET, "itemId");

if (!empty($itemid)) {
    $itemarray = MysqlConnection::fetchCustom("SELECT * FROM  item_master WHERE item_id =$itemid");
    $item = $itemarray[0];
//    echo "<pre>";
//    print_r($item);
//    echo "</pre>";
}
?>
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
    </div>
</div>