<?php
$listofsupplier = MysqlConnection::fetchAll("supplier_master");
?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="View Supplier Master" class="tip-bottom"><i class="icon-home"></i>View Vendor Master</a>
    </div>
</div>
<div class="container-fluid">
    <br/>
    <a class="btn" href="index.php?pagename=create_suppliermaster" >ADD VENDOR</a>
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"><i class="icon-th"></i></span> 
            <h5>Vendor Master</h5>
        </div>
        <div class="widget-content nopadding">
            <form name="suppliermaster" id="suppliermaster" method="POST">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
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
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listofsupplier as $key => $value) {
                            ?>
                            <tr class="gradeX">
                                <td><a href="#" class="tip-top" data-original-title="Edit Record"><i  class="icon-edit"></i></a></td>
                                <td><a href="#myAlert" onclick="setDeleteField('<?php echo $value["supp_id"] ?>')" data-toggle="modal"  class="tip-top" data-original-title="Delete Record"><i class="icon-remove"></i></a> </td>
                                <td><?php echo $value["salutation"] ?>&nbsp;<?php echo $value["firstname"] ?>&nbsp;<?php echo $value["lastname"] ?></td>
                                 <td><?php echo $value["companyname"] ?></td>
                                  <td><?php echo $value["address"] ?></td>
                                  <td><?php echo $value["supp_phoneNo"] ?></td>
                                <td><?php echo $value["currency"] ?></td>
                                <td><?php echo $value["supp_balance"] ?></td>
                                <td><?php echo $value["notes"] ?></td>

                            </tr>
                            <?php
                        }
                        ?>

                    </tbody>
                </table>
                <input type="hidden" id="deleteId" name="cid" value="">
                <input type="hidden" id="flag" name="flag" value="">
            </form>
        </div>
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