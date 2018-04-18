<?php
$listCreateOrders = MysqlConnection::fetchAll("sales_order");
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
        <h5 style="font-family: verdana;font-size: 12px;">LIST CUSTOMER ORDER'S</h5>
    </div>
    <div class="cutomheader">
        <table class="customtable" style="border: 0px;">
            <tr>
                <td style="width: 25%"><a class="btn" href="index.php?pagename=create_createorder" ><i class="icon-inbox"></i>&nbsp;Create&nbsp;Customer&nbsp;Order</a></td>
            </tr>
        </table>
    </div>
    <div class="widget-box">
        <table class="customtable" border="1">
            <tr style="height: 30px;background-color: rgb(240,240,240);cursor: pointer;text-transform: uppercase">
                <th style="width: 25px;">#</th>
                <th style="width: 100px;">PO NUM</th>
                <th style="width: 450px;">Customer Name</th>
                <th style="width: 100px;">Total Items</th>
                <th style="width: 100px;">Item Left</th>
                <th style="width: 150px;">Ship Via</th>
                <th style="width: 100px;">Gross Amount</th>
                <th style="width: 100px;">discount</th>
                <th style="width: 100px;">Net Amount</th>
                <th style="width: 130px;">Delivery Date</th>
                <th >Entered By</th>
            </tr>
        </table>
        <div style="height: 310px;overflow: auto;overflow-x: auto">
            <table class="customtable" id="data"  style="margin-top: -1px;"  border="1">
                <?php
                $index = 1;
                foreach ($listCreateOrders as $key => $value) {
                    $cstdetails = MysqlConnection::fetchCustom("SELECT cust_companyname FROM customer_master where id = " . $value["customer_id"]);
                    ?>
                    <tr id="'<?php echo $value["id"] ?>'" class="context-menu-one" onclick="setId('<?php echo $value["id"] ?>')" style="border-bottom: solid 1px rgb(220,220,220);text-align: left;vertical-align: central">
                        <td style="width: 25px;text-align: center"><?php echo $index++ ?></td>
                        <td style="width: 100px;">&nbsp;&nbsp;<?php echo $value["sono"] ?></td>
                        <td style="width: 450px;">&nbsp;&nbsp;<?php echo $cstdetails[0]["cust_companyname"] ?></td>
                        <td style="width: 100px;">&nbsp;&nbsp;<?php echo $value[""] ?></td>
                        <td style="width: 100px;">&nbsp;&nbsp;<?php echo $value[""] ?></td>
                        <td style="width: 150px;">&nbsp;&nbsp;<?php echo $value["shipvia"] ?></td>
                        <td style="width: 100px;text-align: right">&nbsp;&nbsp;<?php echo $value["sub_total"] ?></td>
                        <td style="width: 100px;text-align: right">&nbsp;&nbsp;<?php echo $value["discount"] ?></td>
                        <td style="width: 100px;text-align: right">$&nbsp;&nbsp;<?php echo $value["total"] ?></td>
                        <td style="width: 130px;">&nbsp;&nbsp;<?php echo $value["expected_date"] ?></td>
                        <td >&nbsp;&nbsp;<?php echo "Gurnek  Sandhu" ?></td>
                    </tr>
                    <?php
                }
                ?>
                <?php
                for ($index1 = 0; $index1 < 15; $index1++) {
                    ?>
                    <tr style="border-bottom: solid 1px rgb(220,220,220);text-align: left;vertical-align: central">
                        <td style="width: 25px;text-align: center"><?php echo $index1 + $index++ ?></td>
                        <td style="width: 100px;"></td>
                        <td style="width: 450px;"></td>
                        <td style="width: 100px;"></td>
                        <td style="width: 100px;"></td>
                        <td style="width: 150px;"></td>
                        <td style="width: 100px;text-align: right"></td>
                        <td style="width: 100px;text-align: right"></td>
                        <td style="width: 100px;text-align: right"></td>
                        <td style="width: 130px;"></td>
                        <td></td>
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
                    <script>     $("#deleteThis").click(function() {         $("div#divLoading").addClass('show');
                        var dataString = "deleteId=" + $('#deleteId').val();
        $.ajax({             type: 'POST',
                        url: 'createorder/createorder_ajax.php',
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
                    case "view_createorder":
                window.location = "index.php?pagename=view_createorder&supplier=" + id;
                        break;
                case "create_createorder":
                window.location = "index.php?pagename=create_createorder";
                        break;
                case "create_note":
                window.location = "index.php?pagename=note_createorder&=" + id;
                break;
                case "edit_createorder":
                window.location = "index.php?pagename=create_createorder&=" + id;
                        break;
                case "delete_createorder":
                    window.location = "index.php?pagename=view_createorder&=" + id + "&flag=yes";
            break;

    case "create_invoice":
        window.location = "index.php?pagename=manage_invoice";                         break;
    case "quit":
                        window.location = "index.php?pagename=manage_dashboard";
                        break;
                    default:
                        window.location = "index.php?pagename=manage_createorder";
                }
                //window.console && console.log(m) || alert(m+"    id:"+id); 
            },
            items: {
                "view_createorder": {name: "VIEW ORDER", icon: "+"},
                "create_createorder": {name: "CREATE ORDER", icon: "img/icons/16/book.png"},
                "edit_createorder": {name: "EDIT ORDER", icon: "context-menu-icon-add"},
                "delete_createorder": {name: "DELETE ORDER", icon: ""},
                "sep1": "---------",
                "create_note": {name: "CREATE NOTE", icon: ""},
                "create_invoice": {name: "CREATE INVOICE", icon: ""},
                "create_note": {name: "CREATE RECEIVING ORDER", icon: ""},
                "sep2": "---------",
                "quit": {name: "QUIT", icon: function() {
                        return '';
                    }}
            }
        });
    });

    $('tr').dblclick(function() {
        var id = $(this).attr('id');
        if (id !== undefined) {
            window.location = "index.php?pagename=view_createorder&supplier=" + id;
        }
    });

</script>