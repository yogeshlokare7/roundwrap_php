<?php
$status = filter_input(INPUT_GET, "status");
if ($status == "active") {
    $query = "SELECT * FROM `item_master` WHERE status = 'Y' ";
} else if ($status == "inactive") {
    $query = "SELECT * FROM `item_master` WHERE  status = 'N'  ";
} else if ($status == "all") {
    $query = "SELECT * FROM `item_master`  ";
} else {
    $query = "SELECT * FROM `item_master`  ";
}
$listofitems = MysqlConnection::fetchCustom($query);
$itemid = filter_input(INPUT_GET, "itemId");
if (isset($itemid) && $itemid != "") {
    $arritem = MysqlConnection::fetchCustom("SELECT status FROM `item_master` WHERE `item_id` = $itemid");
    $searcheditem = $arritem[0]["status"];
    if ($searcheditem == "Y") {
        MysqlConnection::delete("UPDATE `item_master` SET status = 'N' WHERE `item_id` = $itemid "); // this is for update
    } else {
        MysqlConnection::delete("UPDATE `item_master` SET status = 'Y' WHERE `item_id` = $itemid "); // this is for update
    }
    header("location:index.php?pagename=manage_itemmaster");
}
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
<div class="container-fluid">
    <div class="cutomheader">
        <h5 style="font-family: verdana;font-size: 12px;">ITEM'S LIST</h5>
    </div>
    <div class="cutomheader"> 
        <table border="0">
            <tr >
                <td style="width: 8%"><a class="btn" href="index.php?pagename=create_itemmaster" ><i class="icon-plus-sign"></i>&nbsp;ADD ITEM</a></td>
                <th style="width: 2.3%">&nbsp;Search&nbsp;:&nbsp;</th>
                <th  style="text-align: left">
                    <input type="text" id="searchinput" onkeyup="searchData()" 
                           placeholder="Search for Itemname " 
                           name="searchinput" style="width: 50%"/>
                </th>
            </tr>
        </table>
    </div>
    <div class="widget-box">
        <table class="customtable" border="1">
            <tr style="height: 30px;background-color: rgb(240,240,240);">
                <th style="width: 25px;text-align: center">#</th>
                <th style="width: 360px;" onclick="sortTable('data', 1)"><i class="fa fa-fw fa-sort"></i>Name</th>
                <th style="width: 600px;">Item's Description</th>
                <th style="width: 110px;"  onclick="sortTable('data', 3)">Type</th>
                <th style="width: 90px;background-color: rgb(247,252,231)">OnHand&nbsp;&nbsp;</th>
                <th style="width: 90px;">OnSales&nbsp;&nbsp;</th>
                <th style="width: 90px;">Currency&nbsp;&nbsp;</th>
                <th >Price&nbsp;&nbsp;</th>
            </tr>
        </table>
        <div style="height: 310px;overflow: auto;overflow-x: auto">
            <table class="customtable" id="data"  style="margin-top: -1px;" border="1">
                <?php
                $index = 1;
                foreach ($listofitems as $key => $value) {
                    if ($value["status"] == "N") {
                        $bg = $inavtivecolor;
                    } else {
                        $bg = "";
                    }
                    ?>
                    <tr id="<?php echo $value["item_id"] ?>" class="context-menu-one" style="<?php echo $bg ?>;border-bottom: solid 1px rgb(220,220,220);text-align: left;height: 35px;" >
                        <td style="width: 25px;;text-align: center">&nbsp;<?php echo $index ?></td>
                        <td style="width: 360px;text-align: left" >
                            &nbsp;
                            <?php echo $value["item_code"] ?>
                            <?php echo $value["item_name"] ?>
                        </td>
                        <td style="width: 600px;text-align: left" >
                            &nbsp;&nbsp;
                            <?php echo $value["item_desc_purch"] == "" ? $value["item_desc_sales"] : $value["item_desc_purch"] ?>
                        </td>
                        <td style="width: 110px;">&nbsp;<?php echo $value["type"] ?></td>
                        <td style="width: 90px;text-align: right;background-color: rgb(247,252,231)"><?php echo $value["onhand"]; ?>&nbsp;&nbsp;</td>
                        <td style="width: 90px;text-align: right"><?php echo $value["totalvalue"]; ?>&nbsp;&nbsp;</td>
                        <td style="width: 90px;text-align: right"><?php echo $value["currency"]; ?>&nbsp;&nbsp;</td>
                        <td style="text-align: right">&nbsp;<?php echo $value["sell_rate"]; ?>&nbsp;</td>
                    </tr>
                    <?php
                    $index++;
                }
                ?>
                <?php
                for ($index1 = 0; $index1 < 20; $index1++) {
                    ?>
                    <tr style="border-bottom: solid 1px rgb(220,220,220);text-align: left;height: 35px;">
                        <td style="width: 25px;text-align: center">&nbsp;<?php echo $index + $index1 ?></td>
                        <td style="width: 360px;text-align: left" ></td>
                        <td style="width: 600px;text-align: right"></td>
                        <td style="width: 110px;">&nbsp;</td>
                        <td style="width: 90px;text-align: right;;background-color: rgb(247,252,231)"></td>
                        <td style="width: 90px;text-align: right"></td>
                        <td style="width: 90px;text-align: right"></td>
                        <td style="text-align: right"></td>
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

    <div >  
        <table>
            <td ><a href="index.php?pagename=manage_itemmaster&status=active" id="btnSubmitFullForm" class="btn btn-info">VIEW ACTIVE</a></td>
            <td></td>
            <td ><a href="index.php?pagename=manage_itemmaster&status=inactive" id="btnSubmitFullForm" class="btn btn-info">VIEW INACTIVE</a></td>
            <td></td>
            <td ><a href="index.php?pagename=manage_itemmaster&status=all" id="btnSubmitFullForm" class="btn btn-info">VIEW ALL</a></td>
        </table>
    </div>
    <hr/>

</div>

<script>
    $("#deleteThis").click(function () {
        $("div#divLoading").addClass('show');
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
<script type="text/javascript">
    $(function () {
        $.contextMenu({
            selector: '.context-menu-one',
            callback: function (key, options) {
                var m = "clicked row: " + key;
                var id = $(this).attr('id');
                switch (key) {
                    case "view_item":
                        window.location = "index.php?pagename=view_itemmaster&itemId=" + id;
                        break;
                    case "add_item":
                        window.location = "index.php?pagename=create_itemmaster";
                        break;
                    case "edit_item":
                        window.location = "index.php?pagename=create_itemmaster&itemId=" + id;
                        break;
                    case "delete_item":
                        window.location = "index.php?pagename=view_itemmaster&itemId=" + id + "&flag=yes";
                        break;
                    case "quit":
                        window.location = "index.php?pagename=manage_dashboard";
                        break;

                    case "inactive":
                        window.location = "index.php?pagename=manage_itemmaster&itemId=" + id;
                        break;
                    case "changeprice":
                        window.location = "index.php?pagename=create_itemmaster&itemId=" + id + "&flag=price";
                        break;
                    case "adjustquantity":
                        window.location = "index.php?pagename=create_itemmaster&itemId=" + id + "&flag=qty";
                        break;
                    case "purchase_order":
                        window.location = "index.php?pagename=create_perchaseorder";
                        break;
                    case "sales_order":
                        window.location = "index.php?pagename=create_salesorder";
                        break;
                    case "received_items":
                        window.location = "index.php?pagename=manage_dashboard";
                        break;
                    case "create_invoice":
                        window.location = "index.php?pagename=manage_dashboard";
                        break;


                    default:
                        window.location = "index.php?pagename=manage_itemmaster";
                }
            },
            items: {
                "view_item": {name: "VIEW ITEM", icon: ""},
                "add_item": {name: "CREATE ITEM", icon: ""},
                "edit_item": {name: "EDIT ITEM", icon: ""},
                "delete_item": {name: "DELETE ITEM", icon: ""},
                "inactive": {name: "ITEM ACTIVE/INACTIVE", icon: ""},
                "sep0": "---------",
                "changeprice": {name: "CHANGE PRICE", icon: ""},
                "adjustquantity": {name: "ADJUST QUANTITY", icon: ""},
                "purchase_order": {name: "CREATE PURCHASE ORDER", icon: ""},
//                "sales_order": {name: "CREATE SALES ORDER", icon: ""},
//                "received_items": {name: "RECEIVED ITEMS", icon: ""},
//                "create_invoice": {name: "CREATE INVOICE", icon: ""},
                "sep1": "---------",
                "quit": {name: "QUIT", icon: function () {
                        return '';
                    }}
            }
        });
    });

    $('tr').dblclick(function () {
        var id = $(this).attr('id');
        if (id !== undefined) {
            window.location = "index.php?pagename=view_itemmaster&itemId=" + id;
        }
    });
</script>

<script>
    function searchData() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("searchinput");
        filter = input.value.toUpperCase();
        table = document.getElementById("data");
        tr = table.getElementsByTagName("tr");
        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>