<?php
$listofinventory = MysqlConnection::fetchAll("item_master");
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

<script>
    $("#search").on("keyup", function () {
        var value = $(this).val();
        $("table tr").each(function (index) {
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
<title>RoundWrap</title>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="View Inventory Master" class="tip-bottom"><i class="icon-home"></i>View Inventory Master</a>
    </div>
</div>
<div class="container-fluid">
    <br/>
    <table class="customtable" style="border: 0px;">
        <tr style="height: 30px;background-color: rgb(240,240,240);;height: 40px;">
<!--            <td style="width: 8%"><a class="btn" href="index.php?pagename=create_itemmaster" >ADD ITEM</a></td>-->
            <th style="width: 2.3%">&nbsp;Search&nbsp;:&nbsp;</th>
            <th colspan="9" style="text-align: left">
                <input type="text" id="searchinput" name="searchinput" style="width: 50%">
            </th>
        </tr>
    </table>
    <div class="widget-box">
        <table class="customtable" border="1">
            <tr style="height: 30px;background-color: rgb(240,240,240);">
<!--                <th style="width: 2.3%">#</th>
                <th style="width: 2.3%">#</th>                 							-->
                <th style="width: 365px;">Item Code</th>
                <th style="width: 584px;">Item Description</th>
                <th>Item Quantity</th>
               
            </tr>
        </table>
        <div style="height: 310px; overflow: auto; overflow-x: auto">
            <table class="customtable" style="margin-top: -1px;" border="1" >
                <?php
                foreach ($listofinventory as $key => $value) {
                    ?>
                    <tr style="border-bottom: solid 1px rgb(220,220,220);text-align: left">
<!--                        <td style="width: 2.3%"><a href="#" class="tip-top" data-original-title="Edit Record"><i  class="icon-edit"></i></a></td>
                        <td style="width: 2.3%">
                            <a href="#myAlert" onclick="setDeleteField('<?php echo $value["id"] ?>')" data-toggle="modal"  class="tip-top" data-original-title="Delete Record"><i class="icon-remove"></i></a> 
                        </td>-->
                        <td style="width: 365px;">&nbsp;&nbsp;<?php echo $value["item_code"] ?></td>
                        <td style="width: 584px;">&nbsp;&nbsp;<?php echo $value["item_desc"] ?></td>
                        <td>&nbsp;&nbsp;<?php echo $value["quantity"] ?></td>

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
    $("#deleteThis").click(function () {
        $("div#divLoading").addClass('show');
        var dataString = "deleteId=" + $('#deleteId').val();
        $.ajax({
            type: 'POST',
            url: 'inventorymaster/inventorymaster_ajax.php',
            data: dataString
        }).done(function (data) {
//            location.reload();
        }).fail(function () {
        });
        location.reload();
    });

    function setDeleteField(deleteId) {
        document.getElementById("deleteId").value = deleteId;
    }

</script>