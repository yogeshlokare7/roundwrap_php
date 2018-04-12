<?php $listofsupplier = MysqlConnection::fetchAll("supplier_master"); ?>
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
        /*padding: 5px;*/
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
<div class="container-fluid">
    <div class="cutomheader">
        <h5 style="font-family: verdana;font-size: 12px;">LIST VENDOR'S</h5>
    </div>

    <div class="cutomheader">
        <table>
<!--            <table class="customtable" style="border: 0px;">-->
            <tr >
                <td style="width: 10%"><a class="btn"  href="index.php?pagename=create_suppliermaster" ><i class="icon icon-user"></i>&nbsp;ADD VENDOR</a></td>
                <th style="width: 2.3%">&nbsp;Search&nbsp;:&nbsp;</th>
                <th colspan="9" style="text-align: left">
                    <input type="text" id="searchinput" onkeyup="searchData()" 
                           placeholder="Search for Itemname , Description" 
                           name="searchinput" style="width: 50%"/>
                </th>
            </tr>
        </table>
    </div>

    <div class="widget-box">
        <table class="customtable" border="1">
            <tr style="height: 30px;background-color: rgb(240,240,240);">
                <th style="width: 25px;">#</th>
                <th style="width: 250px">Company Name</th>
                <th style="width: 390px">Address</th>
                <th style="width:230px">Contact person</th>
                <th style="width:110px">Contact No</th>
                <th style="width:280px">Email</th>
                <th style="width:80px">Currency</th>
                <th style="width:80px">Balance</th>
                <th >Notes</th>
            </tr>
        </table>
        <div style="height: 310px;overflow: auto;overflow-x: auto">
            <table class="customtable" id="data"  style="margin-top: -1px;"  border="1">
                <?php
                $index = 1;
                foreach ($listofsupplier as $key => $value) {
                    ?>
                    <tr id="<?php echo $value["supp_id"] ?>" style="border-bottom: solid 1px rgb(220,220,220);text-align: left;height: 30px;"  class="context-menu-one">
                        <td style="width: 25px;;text-align: center">&nbsp;<?php echo $index++ ?></td>
                        <td style="width: 250px">&nbsp;&nbsp;<?php echo $value["companyname"] ?></td>
                        <td style="width: 390px">&nbsp;&nbsp;<?php echo $value["address"] ?></td>
                        <td style="width: 230px">&nbsp;&nbsp;<?php echo $value["salutation"] ?>&nbsp;<?php echo $value["firstname"] ?>&nbsp;<?php echo $value["lastname"] ?></td>
                        <td style="width: 110px">&nbsp;&nbsp;<?php echo $value["supp_phoneNo"] ?></td>
                        <td style="width: 280px">&nbsp;&nbsp;
                            <a href="mailto:<?php echo $value["supp_email"] ?>?Subject=Welcome, <?php echo ucwords($value["companyname"]) ?> " target="_top">
                                &nbsp;<?php echo $value["supp_email"] ?>
                            </a></td>
                        <td style="width: 80px">&nbsp;&nbsp;<?php echo $value["currency"] ?></td>
                        <td style="width: 80px">&nbsp;&nbsp;<?php echo $value["supp_balance"] ?></td>
                        <td >&nbsp;&nbsp;<?php echo $value["notes"] ?></td>
                    </tr>
                    <?php
                }
                for ($index1 = 0; $index1 < 15; $index1++) {
                    ?>
                    <tr style="border-bottom: solid 1px rgb(220,220,220);text-align: left;;height: 30px;" >
                        <td style="width: 25px;text-align: center"><?php echo $index + $index1 ?></td>
                        <td style="width: 250px"></td>
                        <td style="width: 390px"></td>
                        <td style="width: 230px"></td>
                        <td style="width: 110px"></td>
                        <td style="width: 280px"></td>
                        <td style="width: 80px"></td>
                        <td style="width: 80px"></td>
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

<script>
    $("#deleteThis").click(function () {
        var dataString = "deleteId=" + $('#deleteId').val();
        $.ajax({
            type: 'POST',
            url: 'suppliermaster/suppliermaster_ajax.php',
            data: dataString
        }).done(function (data) {
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
            url: 'suppliermaster/save_supplierajax.php',
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
                    case "view_vendor":
                        window.location = "index.php?pagename=view_suppliermaster&supplierid=" + id;
                        break;
                    case "create_vendor":
                        window.location = "index.php?pagename=create_suppliermaster";
                        break;
                    case "edit_vendor":
                        window.location = "index.php?pagename=create_suppliermaster&supplierid=" + id;
                        break;
                    case "delete_vendor":
                        document.getElementById("deleteThis").click();
                        break;
                    case "create_perchase_order":
                        window.location = "index.php?pagename=create_perchaseorder&supplierid=" + id;
                        break;
                    case "create_invoice":
                        window.location = "index.php?pagename=manage_invoice";
                        break;
                    case "quit":
                        window.location = "index.php?pagename=manage_dashboard";
                        break;
                    default:
                        window.location = "index.php?pagename=manage_suppliermaster";
                }
                //window.console && console.log(m) || alert(m+"    id:"+id); 
            },
            items: {
                "view_vendor": {name: "VIEW VENDOR", icon: "view"},
                "create_vendor": {name: "CREATE VENDOR", icon: "add"},
                "edit_vendor": {name: "EDIT VENDOR", icon: "edit"},
                "delete_vendor": {name: "DELETE VENDOR", icon: "delete"},
                "create_perchase_order": {name: "CREATE PURCHASE ORDER", icon: "add"},
                "create_invoice": {name: "CREATE INVOICE", icon: "add"},
                "sep1": "---------",
                "quit": {name: "QUIT", icon: function () {
                        return 'context-menu-icon context-menu-icon-quit';
                    }}
            }
        });

        //        $('.context-menu-one').on('click', function(e){
        //            console.log('clicked', this);
        //       })    
    });
    $('tr').dblclick(function () {
        var id = $(this).attr('id');
        window.location = "index.php?pagename=view_suppliermaster&supplierid=" + id;
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