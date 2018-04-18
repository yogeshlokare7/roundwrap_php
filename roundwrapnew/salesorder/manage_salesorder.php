<?php
$listSalesOrders = MysqlConnection::fetchCustom("SELECT * FROM `sales_order` ORDER BY isOpen DESC");
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
        <h5 style="font-family: verdana;font-size: 12px;">CUSTOMER SALES ORDER LIST</h5>
    </div>
    <div class="cutomheader">
        <table >
            <tr >
                <th style="width: 2.3%;text-align: left">Search&nbsp;:&nbsp;</th>
                <th colspan="9" style="text-align: left">
                    <input type="text" id="searchinput" onkeyup="searchData()" 
                           placeholder="By SO Number" 
                           name="searchinput" style="width: 250px"/>
                </th>
            </tr>
        </table>
    </div>

    <div class="widget-box">
        <table class="customtable" border="1">
            <tr style="height: 30px;background-color: rgb(240,240,240);cursor: pointer;text-transform: uppercase">
                <th style="width: 25px;">#</th>
                <th style="width: 100px;">SO No</th>
                <th style="width: 450px;">Customer Name</th>
                <th style="width: 100px;">Total </th>
                <th style="width: 100px;">SO Status</th>
                <th style="width: 150px;">Ship Via</th>
                <th style="width: 100px;">Gross Amt</th>
                <th style="width: 100px;">Discount</th>
                <th style="width: 100px;">Net Amt</th>
                <th style="width: 130px;">Delivery Date</th>
                <th >Entered By</th>
            </tr>
        </table>
        <div style="height: 310px;overflow: auto;overflow-x: auto">
            <table class="customtable" id="data"  style="margin-top: -1px;"  border="1">
                <?php
                $index = 1;
                foreach ($listSalesOrders as $key => $value) {
                    $customer = MysqlConnection::fetchCustom("SELECT cust_companyname FROM customer_master WHERE id = " . $value["customer_id"]);
                    $isOpen = $value["isOpen"] == "Y" ? "Open" : "Close";
                    $isOpenclt = $value["isOpen"] == "Y" ? "btn-success" : "btn-warning";
                    $items = MysqlConnection::fetchCustom("SELECT count(id) as counter FROM `sales_item` WHERE `so_id` = " . $value["id"]);
                    ?>
                    <tr id="<?php echo $value["id"] ?>" class="context-menu-one" onclick="setId('<?php echo $value["id"] ?>')" style="border-bottom: solid 1px rgb(220,220,220);text-align: left;vertical-align: central">
                        <td style="width: 25px;text-align: center"><?php echo $index++ ?></td>
                        <td style="width: 100px;">&nbsp;&nbsp;<?php echo $value["sono"] ?></td>
                        <td style="width: 450px;">&nbsp;&nbsp;<?php echo $customer[0]["cust_companyname"]; ?></td>
                        <td style="width: 100px;">&nbsp;&nbsp;<?php echo $items[0]["counter"] ?></td>
                        <td style="width: 100px;">&nbsp;&nbsp;<i class="<?php echo $isOpenclt ?>" style="padding: 2px 15px 2px 15px;"><?php echo $isOpen ?></i></td>
                        <td style="width: 150px;">&nbsp;&nbsp;<?php echo $value["shipvia"] ?></td>
                        <td style="width: 100px;text-align: right"><?php echo $value["sub_total"] ?>&nbsp;&nbsp;</td>
                        <td style="width: 100px;text-align: right"><?php echo $value["discount"] ?>&nbsp;&nbsp;</td>
                        <td style="width: 100px;text-align: right"><?php echo $value["total"] ?>&nbsp;&nbsp;</td>
                        <td style="width: 130px;">&nbsp;&nbsp;<?php echo $value["expected_date"] ?></td>
                        <td >&nbsp;&nbsp;<?php echo $value["added_by"] ?></td>
                    </tr>
                    <?php
                }
                ?>
                <?php
                for ($index1 = 1; $index1 < 15; $index1++) {
                    ?>
                    <tr  style="border-bottom: solid 1px rgb(220,220,220);text-align: left;vertical-align: central">
                        <td style="width: 25px;text-align: center"></td>
                        <td style="width: 100px;">&nbsp;&nbsp;<?php echo $value[""] ?></td>
                        <td style="width: 450px;">&nbsp;&nbsp;<?php echo $customer[0][""]; ?></td>
                        <td style="width: 100px;">&nbsp;&nbsp;<?php echo $value[""] ?></td>
                        <td style="width: 100px;">&nbsp;&nbsp;<?php echo $value[""] ?></td>
                        <td style="width: 150px;">&nbsp;&nbsp;<?php echo $value[""] ?></td>
                        <td style="width: 100px;text-align: right">&nbsp;&nbsp;<?php echo $value[""] ?></td>
                        <td style="width: 100px;text-align: right">&nbsp;&nbsp;<?php echo $value[""] ?></td>
                        <td style="width: 100px;text-align: right">&nbsp;&nbsp;<?php echo $value[""] ?></td>
                        <td style="width: 130px;">&nbsp;&nbsp;<?php echo $value[""] ?></td>
                        <td >&nbsp;&nbsp;<?php echo $value[""] ?></td>
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
            url: 'salesorder/salesorder_ajax.php',
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
<script>
    $(function () {
        $.contextMenu({
            selector: '.context-menu-one',
            callback: function (key, options) {
                var m = "clicked row: " + key;
                var id = $(this).attr('id');
                switch (key) {
                    case "view_salesorder":
                        window.location = "index.php?pagename=view_salesorder&salesorderid=" + id;
                        break;
                    case "create_order":
                        window.location = "index.php?pagename=manage_customermaster";
                        break;

                    case "edit_salesorder":
                        window.location = "index.php?pagename=edit_salesorder&salesorderid=" + id;
                        break;
                    case "delete_salesorder":
                        window.location = "index.php?pagename=view_salesorder&salesorderid=" + id + "&flag=yes";
                        break;

                    case "create_salesorder":
                        window.location = "index.php?pagename=create_salesorderreceiving&salesorderid=" + id;
                        break;
                    case "create_invoice":
                        window.location = "index.php?pagename=so_invoice&salesorderid=" + id;";
                        break;
                    case "quit":
                        window.location = "index.php?pagename=manage_dashboard";
                        break;
                    default:
                        window.location = "index.php?pagename=manage_salesorder";
                }
                //window.console && console.log(m) || alert(m+"    id:"+id); 
            },
            items: {
                "view_salesorder": {name: "VIEW ORDER", icon: "+"},
                "create_order": {name: "CREATE ORDER", icon: "img/icons/16/book.png"},
                "edit_salesorder": {name: "EDIT ORDER", icon: "context-menu-icon-add"},
                "delete_salesorder": {name: "DELETE ORDER", icon: ""},
                "sep1": "---------",
                "create_salesorder": {name: "CREATE SALES ORDER", icon: ""},
                "create_invoice": {name: "CREATE INVOICE", icon: ""},
//                "create_note": {name: "CREATE SALES ORDER", icon: ""},
                "sep2": "---------",
                "quit": {name: "QUIT", icon: function () {
                        return '';
                    }}
            }
        });
    });

    $('tr').dblclick(function () {
        var id = $(this).attr('id');
        if (id !== undefined) {
            window.location = "index.php?pagename=view_salesorder&salesorderid=" + id;
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