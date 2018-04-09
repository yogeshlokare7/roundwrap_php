<?php
$listPerchaseOrders = MysqlConnection::fetchAll("purchase_order");
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
<link href="css/jquery.contextMenu.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.min_1.11.3.js"></script>
<script src="js/jquery.contextMenu.js" type="text/javascript"></script>
<div id="content-header">
    <div id="breadcrumb"> 
        <a class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a class="tip-bottom"><i class="icon-home"></i>Purchase Orders</a>
    </div>
</div>

<div class="container-fluid">
    <br/>
    <table class="customtable" style="border: 0px;">
        <tr style="height: 30px;background-color: rgb(240,240,240);;height: 40px;">
            <td style="width: 8%"><a class="btn" href="index.php?pagename=create_perchaseorder" >Create Purchase Order</a></td>
            <th style="width: 2.3%">&nbsp;Search&nbsp;:&nbsp;</th>
            <th colspan="9" style="text-align: left">
                <input type="text" id="searchinput" name="searchinput" style="width: 50%">
            </th>
        </tr>
    </table>
    <div class="widget-box">
        <table class="customtable" border="1">
            <tr style="height: 30px;background-color: rgb(240,240,240);">
                <th style="width: 2.3%">#</th>
                <th>PO ID</th>
                <th>Supplier ID</th>
                <th>Expected Date</th>
                <th>Total Items</th>
                <th>PO Status</th>
                <th>Ship Via</th>
                <th>Entered By</th>
                <th>Gross Amount</th>
                <th>Tax Amt</th>
                <th>Net Amount</th>
            </tr>
        </table>
        <div style="height: 310px;overflow: auto;overflow-x: auto">
            <table class="customtable" style="margin-top: -1px;"  border="1">
                <?php
                foreach ($listPerchaseOrders as $key => $value) {
                    ?>
                    <tr id="'<?php echo $value["id"] ?>'" class="context-menu-one" onclick="setId('<?php echo $value["id"] ?>')">

                        <td style="width: 2.3%"><a href="#myAlert"  onclick="setDeleteField('<?php echo $value["purchaseOrderId"] ?>')" data-toggle="modal"  class="tip-top" data-original-title="Delete Record"><i class="icon-remove"></i></a> </td>
                        <td style="width: 76px"><?php echo $value["purchaseOrderId"] ?></td>
                        <td style="width: 151px"><?php echo $value["supplier_id"] ?></td>
                        <td style="width: 191px"><?php echo $value["expected_date"] ?></td>
                        <td style="width: 153px"></td>
                        <td style="width: 132px"><?php echo $value["label_value"] ?></td>
                        <td style="width: 105px"><?php echo $value["ship_via"] ?></td>
                        <td style="width: 145px"><?php echo $value["added_by"] ?></td>
                        <td style="width: 190px"><?php echo $value["sub_total"] ?></td>
                        <td style="width: 109px"><?php echo $value["totalTax"] ?></td>
                        <td><?php echo $value["total"] ?></td>
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
        alert("Hello");
        $("div#divLoading").addClass('show');
        var dataString = "deleteId=" + $('#deleteId').val();
        $.ajax({
            type: 'POST',
            url: 'perchaseorder/perchaseorder_ajax.php',
            data: dataString
        }).done(function (data) {
        }).fail(function () {
        });
        location.reload();
    });

    function setDeleteField(deleteId) {
        document.getElementById("deleteId").value = deleteId;
    }

    function setId(val) {
        document.getElementById("rightClikId").value = val;
    }

</script>
<script type="text/javascript">
    $(function () {
        $.contextMenu({
            selector: '.context-menu-one',
            callback: function (key, options) {
                var m = "clicked row: " + key;
                var id = $(this).attr('id');
                alert("ID for edit/delete:" + id)
                switch (key) {
                    case "edit":
                        alert("edit");
                        break;
                    case "delete":
                        document.getElementById("deleteThis").click();
                        break;
                    case "copy":
                        alert("copy");
                        break;
                    default:
                        alert("default");
                }
                //window.console && console.log(m) || alert(m+"    id:"+id); 
            },
            items: {
                "edit": {name: "Edit", icon: "edit"},
                "copy": {name: "Copy", icon: "copy"},
                "delete": {name: "Delete", icon: "delete"},
                "sep1": "---------",
                "quit": {name: "Quit", icon: function () {
                        return 'context-menu-icon context-menu-icon-quit';
                    }}
            }
        });

//        $('.context-menu-one').on('click', function(e){
//            console.log('clicked', this);
//       })    
    });
</script>