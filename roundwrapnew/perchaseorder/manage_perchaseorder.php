<?php
$listPerchaseOrders = MysqlConnection::fetchCustom("SELECT *  FROM  `purchase_order`  ORDER BY  `purchase_order`.`isOpen` DESC ");
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
        <h5 style="font-family: verdana;font-size: 12px;">PURCHASE ORDER'S LIST</h5>
    </div>
    <br/>
    <table border="0" style="width: 0%">
        <tr style="text-align: left">
            <td><a class="btn btn-info" href="index.php?pagename=create_perchaseorder" ><i class="icon-plus-sign"></i>&nbsp;CREATE PURCHASE ORDER</a></td>
            <td>&nbsp;|&nbsp;</td>
            <td style="width: 80%;vertical-align: bottom">
                <b>&nbsp;Search&nbsp;:&nbsp;</b>
                <input type="text" id="searchinput" onkeyup="searchData()" 
                       placeholder="Search by PO Number" 
                       name="searchinput" style="width: 80%;height: 25px;margin-top: 3px;"/>
            </td>
        </tr>
    </table>
    <div class="widget-box">
        <table class="customtable" border="1">
            <tr style="height: 30px;background-color: rgb(240,240,240);cursor: pointer;text-transform: uppercase">
                <th style="width: 25px;">#</th>
                <th style="width: 100px">PO NUM</th>
                <th style="width: 450px">Supplier Name</th>
                <th style="width: 100px">PO Items</th>
                <th style="width: 100px">PO Status</th>
                <th style="width: 150px">Ship Via</th>
                <th style="width: 100px">Gross Amt</th>
                <th style="width: 100px">Discount</th>
                <th style="width: 100px">Net Amt</th>
                <th style="width: 130px">Delivery Date</th>
                <th >Entered By</th>
            </tr>
        </table>
        <div style="height: 310px;overflow: auto;overflow-x: auto">
            <table class="customtable" id="data"  style="margin-top: -1px;"  border="1">
                <?php
                $index = 1;
                foreach ($listPerchaseOrders as $key => $value) {
                    $suppid = $value["id"];
                    $supparray = MysqlConnection::fetchCustom("SELECT  `companyname`  FROM  `supplier_master` WHERE supp_id = " . $value["supplier_id"]);
                    $userarray = MysqlConnection::fetchCustom("SELECT  `firstName`, `lastName`  FROM  `user_master` WHERE user_id = " . $value["added_by"]);
                    $items = MysqlConnection::fetchCustom("SELECT count(id) as counter FROM `purchase_item` WHERE `po_id` = $suppid");
                    $isOpen = $value["isOpen"] == "Y" ? "Open" : "Close";
                    $isOpenclt = $value["isOpen"] == "Y" ? "btn-success" : "btn-warning";
                    ?>
                    <tr id="<?php echo $value["id"] ?>" class="context-menu-one" onclick="setId('<?php echo $value["id"] ?>')" style="border-bottom: solid 1px rgb(220,220,220);text-align: left;vertical-align: central;height: 35px;">

                        <td style="width: 25px;text-align: center"><?php echo $index++ ?></td>
                        <td style="width: 100px">&nbsp;&nbsp;<?php echo $value["purchaseOrderId"] ?></td>
                        <td style="width: 450px">&nbsp;&nbsp;<?php echo $supparray[0]["companyname"] ?></td>
                        <td style="width: 100px">&nbsp;&nbsp;<?php echo $items[0]["counter"] ?></td>
                        <td style="width: 100px">&nbsp;&nbsp;<i class="<?php echo $isOpenclt ?>" style="padding: 2px 15px 2px 15px;"><?php echo $isOpen ?></i></td>
                        <td style="width: 150px">&nbsp;&nbsp;<?php echo $value["ship_via"] ?></td>
                        <td style="width: 100px; text-align: right">&nbsp;&nbsp;<?php echo $value["sub_total"] ?>&nbsp;&nbsp;</td>
                        <td style="width: 100px; text-align: right">&nbsp;&nbsp;<?php echo $value["discount"] ?>&nbsp;&nbsp;</td>
                        <td style="width: 100px; text-align: right">&nbsp;&nbsp;<?php echo $value["total"] ?>&nbsp;&nbsp;</td>
                        <td style=" width: 130px;text-align: center">&nbsp;&nbsp;<?php echo $value["expected_date"] ?>&nbsp;&nbsp;</td>
                        <td >&nbsp;&nbsp;<?php echo implode(" ", $userarray[0]) ?></td>
                    </tr>
                    <?php
                }
                ?>

                <?php
                for ($index1 = 0; $index1 < 15; $index1++) {
                    ?>
                    <tr style="border-bottom: solid 1px rgb(220,220,220);text-align: left;vertical-align: central;height: 35px;">
                        <th style="width: 25px;"></th>
                        <th style="width: 100px"></th>
                        <th style="width: 450px"></th>
                        <th style="width: 100px"></th>
                        <th style="width: 100px"></th>
                        <th style="width: 150px"></th>
                        <th style="width: 100px"></th>
                        <th style="width: 100px"></th>
                        <th style="width: 100px"></th>
                        <th style="width: 100px"></th>
                        <th ></th>
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

    $("#deleteThis").click(function() {
        alert("Hello");
        $("div#divLoading").addClass('show');
        var dataString = "deleteId=" + $('#deleteId').val();
        $.ajax({
            type: 'POST',
            url: 'perchaseorder/perchaseorder_ajax.php',
            data: dataString
        }).done(function(data) {
        }).fail(function() {
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
    $(function() {
        $.contextMenu({
            selector: '.context-menu-one',
            callback: function(key, options) {
                var m = "clicked row: " + key;
                var id = $(this).attr('id');
                switch (key) {
                    case "view_purchaseorder":
                        window.location = "index.php?pagename=view_perchaseorder&purchaseorderid=" + id;
                        break;
                    case "create_purchaseorder":
                        window.location = "index.php?pagename=manage_suppliermaster";
                        break;
                    case "create_receiving":
                        window.location = "index.php?pagename=create_receivingorder&purchaseorderid=" + id;
                        break;
                    case "edit_purchaseorder":
                        window.location = "index.php?pagename=edit_perchaseorder&purchaseorderid=" + id;
                        break;
                    case "delete_purchaseorder":
                        window.location = "index.php?pagename=view_perchaseorder&purchaseorderid=" + id + "&flag=true";
                        break;

                    case "create_invoice":
//                        window.location = "index.php?pagename=po_invoice&purchaseorderid=" + id;
                        window.open("invoice/po_invoice.php?purchaseorderid=" + id, '_blank');
                        break;
                    case "quit":
                        window.location = "index.php?pagename=manage_dashboard";
                        break;
                    default:
                        window.location = "index.php?pagename=manage_perchaseorder";
                }
                //window.console && console.log(m) || alert(m+"    id:"+id); 
            },
            items: {
                "view_purchaseorder": {name: "VIEW PURCHASE ORDER", icon: "+"},
                "create_purchaseorder": {name: "CREATE PURCHASE ORDER", icon: "img/icons/16/book.png"},
                "edit_purchaseorder": {name: "EDIT PURCHASE ORDER", icon: "context-menu-icon-add"},
                "delete_purchaseorder": {name: "DELETE PURCHASE ORDER", icon: ""},
                "sep1": "---------",
                "create_receiving": {name: "CREATE RECEIVING ORDER", icon: ""},
                "create_invoice": {name: "PRINT PURCHASE ORDER", icon: ""},
                "sep2": "---------",
                "quit": {name: "QUIT", icon: function() {
                        return '';
                    }}
            }
        });
    });

    $('tr').dblclick(function() {
        var id = $(this).attr('id');
        window.location = "index.php?pagename=view_perchaseorder&purchaseorderid=" + id;
    });

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