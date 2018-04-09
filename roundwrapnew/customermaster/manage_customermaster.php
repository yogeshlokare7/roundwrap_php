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
<link href="css/jquery.contextMenu.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.min_1.11.3.js"></script>
<script src="js/jquery.contextMenu.js" type="text/javascript"></script>
<script>
    $("#liveTableSearch").on("keyup", function () {
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
</script>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="View Customer Master" class="tip-bottom">View Customer Master</a>
    </div>
</div>
<!--<form name="customermaster" id="customermaster" method="POST">-->
<div class="container-fluid" >
    <br/>
    <table class="customtable" style="border: 0px;">
        <tr style="height: 30px;background-color: rgb(240,240,240);;height: 40px;">
            <td style="width: 12%"><a class="btn" href="index.php?pagename=create_customermaster" >ADD CUSTOMER</a></td>
            <th style="width: 2.3%">&nbsp;Search&nbsp;:&nbsp;</th>
            <th colspan="9" style="text-align: left">
                <input type="text" id="searchinput" name="searchinput" style="width: 50%">
            </th>
        </tr>
    </table>
    <div class="widget-box">
        <table class="customtable" border="1">
            <tr style="height: 30px;background-color: rgb(240,240,240);">
<!--                <th style="width: 2.3%">#</th>-->
                <th style="width:130px">Full Name</th>
                <th style="width:130px">Company Name</th>
                <th style="width:490px">Address</th>
                <th style="width:130px">Contact No</th>
                <th style="width:200px"> Email</th>
                <th style="width:100px">Currency</th>
                <th style="width:100px">Balance</th>
                <th>Sales Person Name</th>
            </tr>
        </table>
        <div style="height: 310px;overflow: auto;overflow-x: auto">
            <table class="customtable" style="margin-top: -1px;"  border="1">
                <?php
                foreach ($listofcustomers as $key => $value) {
                    ?>

                    <tr id="<?php echo $value["id"] ?>" class="context-menu-one" style="border-bottom: solid 1px rgb(220,220,220);text-align: left;">
<!--                        <td style="width: 2.3%">
                            <a onclick="setDeleteField('<?php echo $value["cust_id"] ?>')" href="#myAlert" data-toggle="modal"  class="tip-top" data-original-title="Delete Record" data-id="<? echo $value['id'] ?>">
                                <i class="icon-remove"></i>
                            </a> 
                        </td>-->
                        <td style="width:130px">&nbsp;&nbsp;<?php echo $value["firstname"] ?>&nbsp;<?php echo $value["lastname"] ?></td>
                        <td style="width:130px">&nbsp;&nbsp;<?php echo $value["cust_companyname"] ?></td>
                        <td style="width:490px">&nbsp;&nbsp;<?php echo buildAddress($value) ?></td>
                        <td style="width:130px">&nbsp;&nbsp;<?php echo $value["phno"] ?></td>
                        <td style="width:200px">&nbsp;&nbsp;<?php echo $value["cust_email"] ?></td>
                        <td style="width:100px">&nbsp;&nbsp;<?php echo $value["currency"] ?></td>
                        <td style="width:100px">&nbsp;&nbsp;<?php echo $value["balance"] ?></td>
                        <td>&nbsp;&nbsp;<?php echo $value["sales_person_name"] ?></td>
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
</script>
<script type="text/javascript">
    $(function () {
        $.contextMenu({
            selector: '.context-menu-one',
            callback: function (key, options) {
                var m = "clicked row: " + key;
                var id = $(this).attr('id');
                switch (key) {
                    case "create_customer":
                        window.location = "index.php?pagename=create_customermaster";
                        break;
                    case "edit_customer":
                        window.location = "index.php?pagename=create_customermaster&customerId=" + id;
                        break;
                    case "delete_customer":
                        //document.getElementById("deleteThis").click();
                        break;
                    case "create_sales_order":
                        window.location = "index.php?pagename=create_salesorder";
                        break;
                    case "create_invoice":
                        window.location = "index.php?pagename=manage_invoice";
                        break;
                    default:
                        window.location = "index.php?pagename=manage_customermaster";
                }
                //window.console && console.log(m) || alert(m+"    id:"+id); 
            },
            items: {
                "create_customer": {name: "Create Customer", icon: "add"},
                "edit_customer": {name: "Edit Customer", icon: "edit"},
//                "delete_customermaster": {name: "Delete Customer", icon: "delete"},
                "create_sales_order": {name: "Create Sales Order", icon: "add"},
                "create_invoice": {name: "Create Invoice", icon: "add"},
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