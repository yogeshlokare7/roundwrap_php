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
    <br/>
    <a class="btn" href="#addData"  data-toggle="modal">ADD ITEM</a>
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"><i class="icon-th"></i></span> 
            <h5>Item Master</h5>
        </div>
        <div class="widget-content nopadding">
            <form name="profilemaster" id="profilemaster" method="POST">
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
                                <td><a href="#myAlert" data-toggle="modal" onclick="setDeleteField('<?php echo $value["item_id"] ?>')" class="tip-top" data-original-title="Delete Record"><i class="icon-remove"></i></a> </td>
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
                <input type="hidden" id="deleteId" name="cid" value="">
                <input type="hidden" id="flag" name="flag" value="">
            </form>
        </div>
    </div>
</div>

<script>
    $("#deleteThis").click(function () {
        var dataString = "deleteId=" + $('#deleteId').val();
        $.ajax({
            type: 'POST',
            url: 'itemmaster/itemmaster_ajax.php',
            data: dataString
        }).done(function (data) {
        }).fail(function () {
        });
        location.reload();
    });

    function setDeleteField(deleteId) {
        document.getElementById("deleteId").value = deleteId;
    }

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
            </div>
            <div class="control-group">
                <label class="control-label">Item Description (Purchase)*</label>
                <div class="controls">
                    <input type="text" name="" id="">

                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Item Description (Sales)*</label>
                <div class="controls">
                    <input type="text" name="" id="">

                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Unit*</label>
                <div class="controls">
                    <input type="text" name="" id="">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Opening Stock</label>
                <div class="controls">
                    <input type="text" name="" id="">
                </div>
            </div>
             <div class="control-group">
                <label class="control-label">Min Stock Level *</label>
                <div class="controls">
                    <input type="text" name="" id="">
                </div>
            </div>
             <div class="control-group">
                <label class="control-label">Order Quanity *</label>
                <div class="controls">
                    <input type="text" name="" id="">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Purchase Rate*</label>
                <div class="controls">
                    <input type="text" name="" id="">
                </div>
            </div>
              <div class="control-group">
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