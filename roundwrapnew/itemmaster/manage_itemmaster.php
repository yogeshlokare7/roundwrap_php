<?php
$listofitems = MysqlConnection::fetchAll("item_master");
?>
<style>
    table{
    }
    .customtable{
        width: 100%;
        height: auto;
        min-height: 50%;
        font-family: verdana;
        border: solid 1px gray;
        border-color: gray;
    }
    .customtable tr{
        height: 25px;
        border-color: gray;
    }
    .customtable tr td{
        /*        padding: 5px;*/
        border-color: gray;
    }
    .thead{
        height: 35px;
    }
    .brdright{
        border-right: solid 1px rgb(220,220,220);
    }
</style>

<link href="css/jquery.contextMenu.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.min_1.11.3.js"></script>
<script src="js/jquery.contextMenu.js" type="text/javascript"></script>
<title>Round Wrap</title>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="index.php" title="View Item Master" class="tip-bottom"><i class="icon-home"></i>View Item Master</a>
    </div>
</div>
<div class="container-fluid">
    <br/>
    <table class="customtable" style="border: 0px;">
        <tr style="height: 30px;background-color: rgb(240,240,240);;height: 40px;">
            <td style="width: 8%"><a class="btn" href="index.php?pagename=create_itemmaster" ><i class="icon-plus-sign"></i>&nbsp;ADD ITEM</a></td>
            <th style="width: 2.3%">&nbsp;Search&nbsp;:&nbsp;</th>
            <th colspan="9" style="text-align: left">
                <input type="text" id="searchinput" name="searchinput" style="width: 50%">
            </th>
        </tr>
    </table>
    <div class="widget-box">

        <table class="customtable" border="1">
            <tr style="height: 30px;background-color: rgb(240,240,240);">
                 <th style="width: 2.3%;">ID</th>
                <th style="width: 200px;">Name</th>
                <th style="width: 100px;">Type</th>
                <th style="width: 100px;text-align: right">Account&nbsp;&nbsp;</th>
                <th style="width: 100px;text-align: right">OnHand&nbsp;&nbsp;</th>
                <th style="width: 100px;text-align: right">OnSales&nbsp;&nbsp;</th>
                <th style="width: 100px;text-align: right">Price&nbsp;&nbsp;</th>
                <th style="width: 400px;">Sales Item Description</th>
                <th  >Purchase Item Description</th>
            </tr>
        </table>
        <div style="height: 310px;overflow: auto;overflow-x: auto">
            <table class="customtable" id="data"  style="margin-top: -1px;" border="1">
                <?php
                foreach ($listofitems as $key => $value) {
                    for ($index = 0; $index < 200; $index++) {
                        ?>
                        <tr id="<?php echo $value["item_id"] ?>" class="context-menu-one" style="border-bottom: solid 1px rgb(220,220,220);text-align: left" >
                            <td style="width: 2.3%;">&nbsp;<?php echo $value["item_id"] ?></td>
                            <td style="width: 200px;text-align: left" >&nbsp;&nbsp;<?php echo $value["item_code"] ?></td>
                            <td style="width: 100px;">&nbsp;<?php echo $value["type"] ?></td>
                            <td style="width: 100px;text-align: right"><?php echo $value["account"] ?>&nbsp;&nbsp;</td>
                            <td style="width: 100px;text-align: right"><?php echo round($value["purchase_rate"], 2); ?>&nbsp;&nbsp;&nbsp;</td>
                            <td style="width: 100px;text-align: right"><?php echo round($value["sell_rate"], 2); ?>&nbsp;-&nbsp;&nbsp;</td>
                            <td style="width: 100px;text-align: right">$&nbsp;<?php echo round($value["price"], 2); ?>&nbsp;&nbsp;</td>
                            <td style="width: 400px;text-align: left" >&nbsp;&nbsp;<?php echo $value["item_desc_sales"] ?></td>
                            <td   >&nbsp;&nbsp;<?php echo $value["item_desc_purch"] ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
        </div>
        <table class="customtable" border="1">
            <tr style="height: 30px;background-color: rgb(240,240,240);">
                <th colspan="8"></th>
            </tr>
        </table>
    </div>
</div>

<script>
    $("#deleteThis").click(function() {
        $("div#divLoading").addClass('show');
        var dataString = "deleteId=" + $('#deleteId').val();
        $.ajax({
            type: 'POST',
            url: 'itemmaster/itemmaster_ajax.php',
            data: dataString
        }).done(function(data) {
        }).fail(function() {
        });
        location.reload();
    });

    function setDeleteField(deleteId) {
        document.getElementById("deleteId").value = deleteId;
    }

</script>
<script type="text/javascript">
    $(function() {
        $.contextMenu({
            selector: '.context-menu-one',
            callback: function(key, options) {
                var m = "clicked row: " + key;
                var id = $(this).attr('id');
                switch (key) {
                    case "add_item":
                        window.location = "index.php?pagename=create_itemmaster";
                        break;
                    case "edit_item":
                        window.location = "index.php?pagename=create_itemmaster&itemId=" + id;
                        break;
                    case "delete_item":
                        deleteItem(id);
                        break;
                    case "quit":
                        window.location = "index.php?pagename=manage_" ;
                        break;
                    default:
                        window.location = "index.php?pagename=manage_itemmaster";
                }
            },
            items: {
                "add_item": {name: "CREATE ITEM", icon: "add"},
                "edit_item": {name: "EDIT ITEM", icon: "edit"},
                "delete_item": {name: "DELETE ITEM", icon: "delete"},
//                "create_sales_order": {name: "Create Sales Order", icon: "add"},
//                "create_invoice": {name: "Create Invoice", icon: "add"},
                "sep1": "---------",
                "quit": {name: "QUIT", icon: function() {
                        return 'context-menu-icon context-menu-icon-quit';
                    }}
            }
        });

        function deleteItem(id) {
            var dataString = "deleteId=" + id;
            $.ajax({
                type: 'POST',
                url: 'itemmaster/itemmaster_ajax.php',
                data: dataString
            }).done(function(data) {
            }).fail(function() {
            });
            location.reload();
        }
//        $('.context-menu-one').on('click', function(e){
//            console.log('clicked', this);
//       })    
    });
</script>

<!-- this is custom model dialog --->
<div id="addData" class="modal hide" style="top: 10%;left: 50%;">
    <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3>Add New Item</h3>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" method="post" action="#" name="basic_validate" id="basic_validate" novalidate="novalidate">
            <div class="control-group">
                <label class="control-label">Item Code / Name </label>
                <div class="controls">
                    <input type="text" name="itemcode" id="itemcode">
                </div>
                <label class="control-label">Item Description (Purchase)*</label>
                <div class="controls">
                    <input type="text" name="" id="">

                </div>
                <label class="control-label">Item Description (Sales)*</label>
                <div class="controls">
                    <input type="text" name="" id="">

                </div>
                <label class="control-label">Unit*</label>
                <div class="controls">
                    <input type="text" name="" id="">
                </div>
                <label class="control-label">Opening Stock</label>
                <div class="controls">
                    <input type="text" name="" id="">
                </div>
                <label class="control-label">Min Stock Level *</label>
                <div class="controls">
                    <input type="text" name="" id="">
                </div>
                <label class="control-label">Order Quanity *</label>
                <div class="controls">
                    <input type="text" name="" id="">
                </div>
                <label class="control-label">Purchase Rate*</label>
                <div class="controls">
                    <input type="text" name="" id="">
                </div>
                <label class="control-label">Sell Rate*</label>
                <div class="controls">
                    <input type="text" name="" id="">
                </div>
            </div>

        </form>
    </div>
    <div class="modal-footer"> 
        <a id="save" data-dismiss="modal" class="btn btn-primary">Save</a> 
        <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
    </div>
</div>
<!-- this is model dialog --->