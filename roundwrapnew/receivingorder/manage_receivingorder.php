<?php
$listRecieveingOrders = MysqlConnection::fetchAll("supplier_packing_slip");
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
<link href="css/jquery.contextMenu.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.min_1.11.3.js"></script>
<script src="js/jquery.contextMenu.js" type="text/javascript"></script>

<div class="container-fluid">

    <div class="cutomheader">
        <h5 style="font-family: verdana;font-size: 12px;">LIST RECEIVING ORDER'S</h5>
    </div>
    <div class="cutomheader">
        <table class="customtable" style="border: 0px;">
            <tr>
                <td style="width: 25%"><a class="btn" href="index.php?pagename=create_receivingorder" ><i class="icon-magnet"></i>&nbsp;Create&nbsp;Receiving&nbsp;Order</a></td>
            </tr>
        </table>
    </div>

    <div class="widget-box">
        <table class="customtable" border="1">
            <tr style="height: 30px;background-color: rgb(240,240,240);">
                <th style="width:25px">#</th>
                <th style="width: 100px">PO ID</th>
                <th style="width: 900px">Supplier Name</th>
                <th style="width: 100px">Purchase Item </th>
                <th style="width: 100px">Received Items</th>
                <th style="width: 100px">Pending Items</th>
                <th >Packing Count</th>
            </tr>
        </table>
        <div style="height: 310px;overflow: auto;overflow-x: auto">
            <table class="customtable" id="data"  style="margin-top: -1px;"  border="1">
                <?php
                $index = 1;
                foreach ($listRecieveingOrders as $key => $value) {
                    ?>
                    <tr class="gradeX">
                        <td style="width: 25px;text-align: center"><?php echo $index++ ?></td>
                        <td style="width: 100px"><?php echo $value["sPOId"] ?></td>
                        <td style="width: 900px"><?php echo $value["supplierId"] ?></td>
                        <td style="width: 100px"></td>
                        <td style="width: 100px"></td>
                        <td style="width: 100px"></td>
                        <td ></td>

                    </tr>
                    <?php
                }
                ?>
            </table>
            <input type="hidden" id="deleteId" name="cid" value="">
            <input type="hidden" id="flag" name="flag" value="">
            <input type="hidden" id="rightClikId" name="rightClikId" value="">
            </form>
        </div>
        <table class="customtable" border="1">
            <tr style="height: 30px;background-color: rgb(240,240,240);">
                <th colspan="5"></th>
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
            url: 'receivingorder/receivingorder_ajax.php',
            data: dataString
        }).done(function (data) {
            $("#flagmsg").append("<br/><div id='successMessage' class='alert alert-success'><button class='close' data-dismiss='alert'>×</button><strong>Success!</strong>Record Deleted Successfully !!!</div>");
        }).fail(function () {
            $("#flagmsg").append("fail");
        });
        location.reload();
    });

    function setDeleteField(deleteId) {
        document.getElementById("deleteId").value = deleteId;
    }
</script>