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
                <th style="width: 100px">Purchase Items</th>
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
                    <tr id="'<?php echo $value["id"] ?>'" class="context-menu-one" onclick="setId('<?php echo $value["id"] ?>')" style="border-bottom: solid 1px rgb(220,220,220);text-align: left;vertical-align: central">
                        <td style="width: 25px;text-align: center"><?php echo $index++ ?></td>
                        <td style="width: 100px">&nbsp;&nbsp;<?php echo $value["sPOId"] ?></td>
                        <td style="width: 900px">&nbsp;&nbsp;<?php echo $value["supplierId"] ?></td>
                        <td style="width: 100px">&nbsp;&nbsp;</td>
                        <td style="width: 100px">&nbsp;&nbsp;</td>
                        <td style="width: 100px">&nbsp;&nbsp;</td>
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
    
     function setId(val) {
        document.getElementById("rightClikId").value = val;
    }
</script>

<script>
    $(function () {
        $.contextMenu({
            selector: '.context-menu-one',
            callback: function (key, options) {
                var m = "clicked row: " + key;
                var id = $(this).attr('id');
                switch (key) {
                    case "view_purchaseorder":
                        window.location = "index.php?pagename=view_receivingorder&=" + id;
                        break;
                    case "create_purchaseorder":
                        window.location = "index.php?pagename=create_receivingorder";
                        break;
                    case "create_note":
                        window.location = "index.php?pagename=note_receivingorder&=" + id;
                        break;
                    case "edit_purchaseorder":
                        window.location = "index.php?pagename=create_receivingorder&=" + id;
                        break;
                    case "delete_purchaseorder":
                        window.location = "index.php?pagename=view_receivingorder&=" + id + "&flag=yes";
                        break;

                    case "create_invoice":
                        window.location = "index.php?pagename=manage_invoice";
                        break;
                    case "quit":
                        window.location = "index.php?pagename=manage_dashboard";
                        break;
                    default:
                        window.location = "index.php?pagename=manage_receivingorder";
                }
                //window.console && console.log(m) || alert(m+"    id:"+id); 
            },
            items: {
                "view_receivingorder": {name: "VIEW RECEIVEING ORDER", icon: "+"},
                "create_receivingorder": {name: "CREATE RECEIVEING ORDER", icon: "img/icons/16/book.png"},
                "edit_receivingorder": {name: "EDIT RECEIVEING ORDER", icon: "context-menu-icon-add"},
                "delete_receivingorder": {name: "DELETE RECEIVEING ORDER", icon: ""},
                "sep1": "---------",
                "create_note": {name: "CREATE NOTE", icon: ""},
                "create_invoice": {name: "CREATE INVOICE", icon: ""},
                "sep2": "---------",
                "quit": {name: "QUIT", icon: function () {
                        return '';
                    }}
            }
        });
    });

    $('tr').dblclick(function () {
        var id = $(this).attr('id');
        window.location = "index.php?pagename=view_receivingorder";
    });

</script>