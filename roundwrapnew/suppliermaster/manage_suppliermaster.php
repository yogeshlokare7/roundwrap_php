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
    $("#liveTableSearch").on("keyup", function() {
        var value = $(this).val();
        $("table tr").each(function(index) {
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
        <a title="View Supplier Master" class="tip-bottom"><i class="icon-home"></i>View Vendor Master</a>
    </div>
</div>
<div class="container-fluid">
    <br/>
    <table class="customtable" style="border: 0px;">
        <tr style="height: 30px;background-color: rgb(240,240,240);;height: 40px;">
            <td style="width: 8%"><a class="btn" href="index.php?pagename=create_suppliermaster" >ADD VENDOR</a></td>
            <th style="width: 2.3%">&nbsp;Search&nbsp;:&nbsp;</th>
            <th colspan="9" style="text-align: left">
                <input type="text" id="searchinput" name="searchinput" style="width: 50%">
            </th>
        </tr>
    </table>
    <div class="widget-box">
        <table class="customtable" border="1">
            <tr style="height: 30px;background-color: rgb(240,240,240);">
                <th style="width: 2.3%">#</th>
                <th style="width: 2.3%">#</th>            				
                <th  style="width: 270px">Vendor Name</th>
                <th style="width: 312px">Company Name</th>
                <th  style="width: 120px">Contact No</th>
                <th style="width: 80px">Currency</th>
                <th style="width: 80px">Balance</th>
                <th style="width: 80px">Notes</th>
                <th >Address</th>

            </tr>
        </table>
        <div style="height: 310px;overflow: auto;overflow-x: auto">
            <table class="customtable" style="margin-top: -1px;"  border="1">
                <?php
                foreach ($listofsupplier as $key => $value) {
                    ?>
                    <tr style="border-bottom: solid 1px rgb(220,220,220);text-align: center"  class="context-menu-one">
                        <td style="width: 2.3%"><a href="#" class="tip-top" data-original-title="Edit Record"><i  class="icon-edit"></i></a></td>
                        <td style="width: 2.3%"><a href="#myAlert" onclick="setDeleteField('<?php echo $value["supp_id"] ?>')" data-toggle="modal"  class="tip-top" data-original-title="Delete Record"><i class="icon-remove"></i></a> </td>
                        <td style="width: 270px"><?php echo $value["salutation"] ?>&nbsp;<?php echo $value["firstname"] ?>&nbsp;<?php echo $value["lastname"] ?></td>
                        <td style="width: 312px"><?php echo $value["companyname"] ?></td>
                        <td style="width: 120px"><?php echo $value["supp_phoneNo"] ?></td>
                        <td style="width: 80px"><?php echo $value["currency"] ?></td>
                        <td style="width: 80px"><?php echo $value["supp_balance"] ?></td>
                        <td style="width: 80px"><?php echo $value["notes"] ?></td>
                        <td ><?php echo $value["address"] ?></td>
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
    $("#deleteThis").click(function() {
        var dataString = "deleteId=" + $('#deleteId').val();
        $.ajax({
            type: 'POST',
            url: 'suppliermaster/suppliermaster_ajax.php',
            data: dataString
        }).done(function(data) {
        }).fail(function() {
        });
        location.reload();
    });

    function setDeleteField(deleteId) {
        document.getElementById("deleteId").value = deleteId;
    }
    $("#save").click(function() {
        var json = convertFormToJSON("#basic_validate");
        $.ajax({
            type: 'POST',
            url: 'suppliermaster/save_supplierajax.php',
            data: json
        }).done(function(data) {
        }).fail(function() {
        });
        location.reload();
    });
</script>
<script type="text/javascript">
    $(function() {
        $.contextMenu({
            selector: '.context-menu-one',
            callback: function(key, options) {
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
                        //document.getElementById("deleteThis").click();
                        break;
                    case "create_perchase_order":
                        window.location = "index.php?pagename=create_perchaseorder";
                        break;
                    case "create_invoice":
                        window.location = "index.php?pagename=manage_invoice";
                        break;
                    default:
                        window.location = "index.php?pagename=manage_suppliermaster";
                }
                //window.console && console.log(m) || alert(m+"    id:"+id); 
            },
            items: {
                "create_vendor": {name: "Create Vendor", icon: "add"},
                "edit_vendor": {name: "Edit Vendor", icon: "edit"},
//                "delete_customermaster": {name: "Delete Customer", icon: "delete"},
                "create_perchase_order": {name: "Create perchase Order", icon: "add"},
                "create_invoice": {name: "Create Invoice", icon: "add"},
                "sep1": "---------",
                "quit": {name: "Quit", icon: function() {
                        return 'context-menu-icon context-menu-icon-quit';
                    }}
            }
        });

//        $('.context-menu-one').on('click', function(e){
//            console.log('clicked', this);
//       })    
    });
</script>