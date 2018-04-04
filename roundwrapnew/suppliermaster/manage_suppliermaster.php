<?php
$listofsupplier = MysqlConnection::fetchAll("supplier_master");
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
        padding: 5px;
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
                <th>Vendor Name</th>
                <th>Company Name</th>
                <th>Address</th>
                <th>Contact No</th>
                <th>Currency</th>
                <th>Balance</th>
                <th>Notes</th>

            </tr>
        </table>
        <div style="height: 310px;overflow: auto;overflow-x: auto">
            <table class="customtable" style="margin-top: -1px;"  border="0">
                <?php
                foreach ($listofsupplier as $key => $value) {
                    ?>
                    <tr style="border-bottom: solid 1px rgb(220,220,220);text-align: center">
                        <td style="width: 2.3%"><a href="#" class="tip-top" data-original-title="Edit Record"><i  class="icon-edit"></i></a></td>
                        <td style="width: 2.3%"><a href="#myAlert" onclick="setDeleteField('<?php echo $value["supp_id"] ?>')" data-toggle="modal"  class="tip-top" data-original-title="Delete Record"><i class="icon-remove"></i></a> </td>
                        <td style="width: 270px"><?php echo $value["salutation"] ?>&nbsp;<?php echo $value["firstname"] ?>&nbsp;<?php echo $value["lastname"] ?></td>
                        <td style="width: 312px"><?php echo $value["companyname"] ?></td>
                        <td style="width: 161px"><?php echo $value["address"] ?></td>
                        <td style="width: 218px"><?php echo $value["supp_phoneNo"] ?></td>
                        <td style="width: 179px"><?php echo $value["currency"] ?></td>
                        <td style="width: 155px"><?php echo $value["supp_balance"] ?></td>
                        <td ><?php echo $value["notes"] ?></td>

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