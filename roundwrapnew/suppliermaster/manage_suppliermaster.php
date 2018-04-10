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
                <td><a class="btn"  href="index.php?pagename=create_suppliermaster" ><i class="icon icon-user"></i>&nbsp;ADD VENDOR</a></td>
                <th >&nbsp;Search&nbsp;:&nbsp;</th>
                <th colspan="9" > <input type="text" >
                </th>
            </tr>
        </table>
    </div>

    <div class="widget-box">
        <table class="customtable" border="1">
            <tr style="height: 30px;background-color: rgb(240,240,240);">
                <th style="width: 2.3%;">ID</th>
                <th  style="width: 270px">Vendor Name</th>
                <th style="width: 312px">Company Name</th>
                <th  style="width: 120px">Contact No</th>
                <th style="width: 100px">Currency</th>
                <th style="width: 100px">Balance</th>
                <th style="width: 100px">Notes</th>
                <th >Address</th>

            </tr>
        </table>
        <div style="height: 310px;overflow: auto;overflow-x: auto">
            <table class="customtable" id="data"  style="margin-top: -1px;"  border="1">
                <?php
                foreach ($listofsupplier as $key => $value) {
                    ?>
                    <tr id="<?php echo $value["supp_id"] ?>" style="border-bottom: solid 1px rgb(220,220,220);text-align: left"  class="context-menu-one">
                        <td style="width: 2.3%;">&nbsp;<?php echo $value["supp_id"] ?></td>
                        <td style="width: 270px">&nbsp;&nbsp;<?php echo $value["salutation"] ?>&nbsp;<?php echo $value["firstname"] ?>&nbsp;<?php echo $value["lastname"] ?></td>
                        <td style="width: 312px">&nbsp;&nbsp;<?php echo $value["companyname"] ?></td>
                        <td style="width: 120px">&nbsp;&nbsp;<?php echo $value["supp_phoneNo"] ?></td>
                        <td style="width: 100px">&nbsp;&nbsp;<?php echo $value["currency"] ?></td>
                        <td style="width: 100px">&nbsp;&nbsp;<?php echo $value["supp_balance"] ?></td>
                        <td style="width: 100px">&nbsp;&nbsp;<?php echo $value["notes"] ?></td>
                        <td >&nbsp;&nbsp;<?php echo $value["address"] ?></td>
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
</script>