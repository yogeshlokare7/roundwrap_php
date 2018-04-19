<?php
$status = filter_input(INPUT_GET, "status");
if ($status == "active") {
    $query = "SELECT * FROM customer_master WHERE status = 'Y' ORDER BY `cust_companyname` ASC  ";
} else if ($status == "inactive") {
    $query = " SELECT * FROM customer_master WHERE status = 'N' ORDER BY `cust_companyname` ASC  ";
} else if ($status == "all") {
    $query = "SELECT * FROM customer_master  ORDER BY `cust_companyname` ASC   ";
} else {
    $query = "SELECT * FROM customer_master ORDER BY `cust_companyname` ASC  ";
}

$listofcustomers = MysqlConnection::fetchCustom($query);

$customerid = filter_input(INPUT_GET, "customerId");
if (isset($customerid) && $customerid != "") {
    $customerd = MysqlConnection::fetchCustom("SELECT status FROM customer_master WHERE id = $customerid");
    if ($customerd[0]["status"] == "Y") {
        MysqlConnection::delete("UPDATE customer_master SET status = 'N' WHERE id = $customerid ");
    } else {
        MysqlConnection::delete("UPDATE customer_master SET status = 'Y' WHERE id = $customerid ");
    }
    header("location:index.php?pagename=manage_customermaster");
}
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
<div class="container-fluid" >
    <div class="cutomheader">
        <h5 style="font-family: verdana;font-size: 12px;">CUSTOMER'S LIST</h5>
    </div>
    <div class="cutomheader">
        <table >
            <tr>
                <td style="width: 10%"><a class="btn" href="index.php?pagename=create_customermaster" ><i class="icon icon-user"></i>&nbsp;&nbsp;ADD&nbsp;CUSTOMER</a></td>
                <th  style="width: 2.3%">&nbsp;Search&nbsp;:&nbsp;</th>
                <th colspan="9" style="text-align: left">
                    <input type="text" id="searchinput" onkeyup="searchData()" 
                           placeholder="Search for companyname" 
                           name="searchinput" style="width: 50%"/>
                </th>
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
                <th style="width:280px">Email</th>
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
                    if ($value["status"] == "N") {
                        $back = $inavtivecolor;
                    } else {
                        $back = "";
                    }
                    ?>
                    <tr id="<?php echo $value["id"] ?>" class="context-menu-one" style="<?php echo $back ?>;border-bottom: solid 1px rgb(220,220,220);text-align: left;vertical-align: central">
                        <td style="width: 25px;text-align: center"><?php echo $index++ ?></td>
                        <td style="width:250px">&nbsp;&nbsp;<?php echo $value["cust_companyname"] ?></td>
                        <td style="width:390px">
                            <p style="text-align: justify;;padding: 5px;">
                                <?php echo buildAddress($value) ?>
                            </p>
                        </td>
                        <td style="width:230px">&nbsp;&nbsp;<?php echo $value["firstname"] ?>&nbsp;<?php echo $value["lastname"] ?></td>
                        <td style="width:110px">&nbsp;<?php echo $value["phno"] ?></td>
                        <td style="width:280px">
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
                        <td style="width:280px"></td>
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
    <div>
        <table>
            <td ><a href="index.php?pagename=manage_customermaster&status=active" id="btnSubmitFullForm" class="btn btn-info">VIEW ACTIVATED</a></td>
            <td ><a href="index.php?pagename=manage_customermaster&status=inactive" id="btnSubmitFullForm" class="btn btn-info">VIEW INACTIVE</a></td>
            <td ><a href="index.php?pagename=manage_customermaster&status=all" id="btnSubmitFullForm" class="btn btn-info">VIEW ALL</a></td>
        </table>
    </div>
</div>

<!--</form>-->
<script>
    $(function() {
        $.contextMenu({
            selector: '.context-menu-one',
            callback: function(key, options) {
                var m = "clicked row: " + key;
                var id = $(this).attr('id');
                switch (key) {
                    case "view_customer":
                        window.location = "index.php?pagename=view_customermaster&customerId=" + id;
                        break;
                    case "create_customer":
                        window.location = "index.php?pagename=create_customermaster";
                        break;
                    case "create_note":
                        window.location = "index.php?pagename=note_customermaster&customerId=" + id;
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
                    case "active_customer":
                        window.location = "index.php?pagename=manage_customermaster&customerId=" + id;
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
                "delete_customer": {name: "DELETE CUSTOMER", icon: ""},
                "active_customer": {name: "ACTIVE/IN ACTIVE CUSTOMER", icon: ""},
                "sep1": "---------",
                "create_note": {name: "CREATE NOTE", icon: ""},
                "create_sales_order": {name: "CREATE SALES ORDER", icon: ""},
                "create_invoice": {name: "CREATE INVOICE", icon: ""},
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
            window.location = "index.php?pagename=view_customermaster&customerId=" + id;
        }
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
<!-- this is model dialog --->
<?php

function buildAddress($value) {
    return $value["streetNo"]
            . " " . $value["streetName"]
            . " " . $value["city"]
            . " " . $value["s_postalcode"]
            . " " . $value["cust_province"]
            . " " . $value["country"];
}
?>