<?php
$listofitems = MysqlConnection::fetchAll("item_master");
?>
<style>
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
        padding: 5px;
        border-color: gray;
    }
    .thead{
        height: 35px;
    }
    .brdright{
        border-right: solid 1px rgb(220,220,220);
    }
</style>

<script>
    $("#search").on("keyup", function() {
        var value = $(this).val();
        $("table tr").each(function(index) {
            if (index !== 0) {
                $row = $(this);
                var id = $row.find("td:first").text();
                if (id.indexOf(value) !== 0) {
                    $(this).hide();
                }
                else {
                    $(this).show();
                }
            }
        });
    });
    ​
</script>



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
            <td style="width: 8%"><a class="btn" href="index.php?pagename=create_itemmaster" >ADD ITEM</a></td>
            <th style="width: 2.3%">&nbsp;Search&nbsp;:&nbsp;</th>
            <th colspan="9" style="text-align: left">
                <input type="text" id="searchinput" name="searchinput" style="width: 50%">
            </th>
        </tr>
    </table>
    <div class="widget-box">

        <table class="customtable" border="1">
            <tr style="height: 30px;background-color: rgb(240,240,240);">
                <th style="width: 50px;">#</th>
                <th style="width: 50px;">#</th>
                <th style="width: 150px;">Name</th>
                <th >Description</th>
                <th style="width: 100px;">Type</th>
                <th style="width: 100px;">Account</th>
                <th style="width: 100px;">OnHand</th>
                <th style="width: 100px;">OnSales</th>
                <th style="width: 100px;">Price</th>
            </tr>
        </table>
        <div style="height: 310px;overflow: auto;overflow-x: auto">
            <table class="customtable" style="margin-top: -1px;">
                <?php
                foreach ($listofitems as $key => $value) {
                    ?>
                    <tr style="border-bottom: solid 1px rgb(220,220,220);text-align: center">
                        <td style="width: 40px;"><a href="index.php?pagename=create_itemmaster&itemPrimary=<?php echo $value["item_id"] ?>" class="tip-top" data-original-title="Edit Record"><i  class="icon-edit"></i></a></td>
                        <td style="width: 50px;"  ><a href="#myAlert" data-toggle="modal" onclick="setDeleteField('<?php echo $value["item_id"] ?>')" class="tip-top" data-original-title="Delete Record"><i class="icon-remove"></i></a> </td>
                        <td style="width: 150px;text-align: left" ><?php echo $value["item_code"] ?></td>
                        <td style="text-align: left" ><?php echo $value["item_desc"] ?>&nbsp; Qty:&nbsp;<?php echo $value["orderQuanity"] ?></td>
                        <td style="width: 100px;"><?php echo $value["type"] ?></td>
                        <td style="width: 100px;"><?php echo $value["account"] ?></td>
                        <td style="width: 100px;"><?php echo $value["purchase_rate"] ?></td>
                        <td style="width: 100px;"><?php echo $value["sell_rate"] ?></td>
                        <td style="width: 100px;"><?php echo $value["price"] ?></td>
                    </tr>
                    <?php
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