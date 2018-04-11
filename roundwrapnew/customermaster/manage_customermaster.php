<?php $listofcustomers = MysqlConnection::fetchAll("customer_master"); ?>
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
<!--<form name="customermaster" id="customermaster" method="POST">-->
<div class="container-fluid" >
    <div class="cutomheader">
        <h5 style="font-family: verdana;font-size: 12px;">LIST CUSTOMER'S</h5>
    </div>
    <div class="cutomheader">
        <table>
            <tr>
                <td ><a class="btn" href="index.php?pagename=create_customermaster" ><i class="icon icon-user"></i>&nbsp;&nbsp;ADD&nbsp;CUSTOMER</a></td>
                <th >&nbsp;Search&nbsp;:&nbsp;</th>
                <th colspan="9" ><input type="text" ></th>
            </tr>
        </table>
    </div>
    <div class="widget-box">
        <table class="customtable" border="1">
            <tr style="height: 30px;background-color: rgb(240,240,240);">
                <th style="width: 25px;">#</th>
                <th style="width:250px">Company Name</th>
                <th style="width:390px">Address</th>
                <th style="width:230px">Contact Person</th>
                <th style="width:110px">Contact No</th>
                <th style="width:200px">Email</th>
                <th style="width:80px">Currency</th>
                <th style="width:60px">Balance</th>
                <th>Sales Person</th>
            </tr>
        </table>
        <div style="height: 310px;overflow: auto;overflow-x: auto">
            <table class="customtable" id="data" style="margin-top: -1px;"  border="1">
                <?php
                $index = 1;
                foreach ($listofcustomers as $key => $value) {
                    ?>
                    <tr id="<?php echo $value["id"] ?>" class="context-menu-one" style="border-bottom: solid 1px rgb(220,220,220);text-align: left;vertical-align: central">
                        <td style="width: 25px;text-align: center"><?php echo $index++ ?></td>
                        <td style="width:250px">&nbsp;&nbsp;<?php echo $value["cust_companyname"] ?></td>
                        <td style="width:390px">
                            <p style="text-align: justify;;padding: 5px;">
                                <?php echo buildAddress($value) ?>
                            </p>
                        </td>
                        <td style="width:230px">&nbsp;&nbsp;<?php echo $value["firstname"] ?>&nbsp;<?php echo $value["lastname"] ?></td>
                        <td style="width:110px">&nbsp;<?php echo $value["phno"] ?></td>
                        <td style="width:200px">
                            <a href="mailto:<?php echo $value["cust_email"] ?>?Subject=Welcome, <?php echo ucwords($value["cust_companyname"]) ?> " target="_top">
                                &nbsp;<?php echo $value["cust_email"] ?>
                            </a>
                        </td>
                        <td style="width:80px">&nbsp;&nbsp;<?php echo $value["currency"] ?></td>
                        <td style="width:60px">&nbsp;&nbsp;<?php echo $value["balance"] ?></td>
                        <td>&nbsp;&nbsp;<?php echo $value["sales_person_name"] ?></td>
                    </tr>
                    <?php
                }
                for ($index1 = 0; $index1 < 10; $index1++) {
                    ?>
                    <tr style="border-bottom: solid 1px rgb(220,220,220);text-align: left;vertical-align: central;height: 35px;">
                        <td style="width: 25px;text-align: center"></td>
                        <td style="width:250px"></td>
                        <td style="width:390px"></td>
                        <td style="width:230px"></td>
                        <td style="width:110px"></td>
                        <td style="width:200px"></td>
                        <td style="width:80px"></td>
                        <td style="width:60px"></td>
                        <td></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
        <table class="customtable" border="1">
            <tr style="height: 30px;background-color: rgb(240,240,240);">
                <th colspan="5"></th>
            </tr>
        </table>
    </div>
</div>

<!--</form>-->
<script>
    $("#deleteThis").click(function () {
        $('#img').show();
        var dataString = "deleteId=" + $('#deleteId').val();
        $.ajax({
            type: 'POST',
            url: 'customermaster/customermaster_ajax.php',
            data: dataString
        }).done(function (data) {
            $('#img').hide();
        }).fail(function () {
        });
        location.reload();
    });
    function setDeleteField(deleteId) {
        document.getElementById("deleteId").value = deleteId;
    }
    $("#save").click(function () {
        var json = convertFormToJSON("#basic_validate");
        $.ajax({
            type: 'POST',
            url: 'customermaster/savecustomermaster_ajax.php',
            data: json
        }).done(function (data) {
        }).fail(function () {
        });
        location.reload();
    });



    $(function () {
        $.contextMenu({
            selector: '.context-menu-one',
            callback: function (key, options) {
                var m = "clicked row: " + key;
                var id = $(this).attr('id');
                switch (key) {
                    case "view_customer":
                        window.location = "index.php?pagename=view_customermaster&customerId=" + id;
                        break;
                    case "create_customer":
                        window.location = "index.php?pagename=create_customermaster";
                        break;
                    case "edit_customer":
                        window.location = "index.php?pagename=create_customermaster&customerId=" + id;
                        break;
                    case "delete_customer":
                        window.location = "index.php?pagename=view_customermaster&customerId=" + id + "&flag=yes";
                        break;
                    case "create_sales_order":
                        window.location = "index.php?pagename=create_salesorder&customerId=" + id;
                        break;
                    case "create_invoice":
                        window.location = "index.php?pagename=manage_invoice";
                        break;
                    case "quit":
                        window.location = "index.php?pagename=manage_dashboard";
                        break;
                    default:
                        window.location = "index.php?pagename=manage_customermaster";
                }
                //window.console && console.log(m) || alert(m+"    id:"+id); 
            },
            items: {
                "view_customer": {name: "VIEW CUSTOMER", icon: "+"},
                "create_customer": {name: "CREATE CUSTOMER", icon: "img/icons/16/book.png"},
                "edit_customer": {name: "EDIT CUSTOMER", icon: "context-menu-icon-add"},
                "delete_customer": {name: "DELETE CUSTOMER", icon: "delete"},
                "sep1": "---------",
                "create_sales_order": {name: "CREATE SALES ORDER", icon: "add"},
                "create_invoice": {name: "CREATE INVOICE", icon: "add"},
                "sep2": "---------",
                "quit": {name: "QUIT", icon: function () {
                        return 'context-menu-icon context-menu-icon-quit';
                    }}
            }
        });
    });

    $('tr').dblclick(function () {
        var id = $(this).attr('id');
        window.location = "index.php?pagename=view_customermaster&customerId=" + id;
    });
</script>
<!-- this is model dialog --->
<?php

function buildAddress($value) {
    if (trim($value["shipto"]) == "") {
        return $value["streetNo"]
                . " " . $value["streetName"]
                . " " . $value["city"]
                . " " . $value["s_postalcode"]
                . " " . $value["cust_province"]
                . " " . $value["country"]
        ;
    } else {
        return $value["shipto"];
    }
}
?>