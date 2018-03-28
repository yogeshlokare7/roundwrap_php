<?php
$listofsupplier = MysqlConnection::fetchAll("supplier_master");
?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="View Supplier Master" class="tip-bottom"><i class="icon-home"></i>View Supplier Master</a>
    </div>
</div>
<div class="container-fluid">
    <br/>
    <a class="btn" href="index.php?pagename=create_suppliermaster" >ADD SUPPLIER</a>
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"><i class="icon-th"></i></span> 
            <h5>Supplier Master</h5>
        </div>
        <div class="widget-content nopadding">
            <form name="suppliermaster" id="suppliermaster" method="POST">
                <table class="table table-bordered data-table">
                    <thead>


                        <tr>
                            <th style="width: 2.3%">#</th>
                            <th style="width: 2.3%">#</th>            				
                            <th>ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact No</th>
                            <th>Fax No</th>
                            <th>Website</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listofsupplier as $key => $value) {
                            ?>
                            <tr class="gradeX">
                                <td><a href="#" class="tip-top" data-original-title="Edit Record"><i  class="icon-edit"></i></a></td>
                                <td><a href="#myAlert" onclick="setDeleteField('<?php echo $value["supp_id"] ?>')" data-toggle="modal"  class="tip-top" data-original-title="Delete Record"><i class="icon-remove"></i></a> </td>
                                <td><?php echo $value["supp_id"] ?></td>
                                <td><?php echo $value["supp_name"] ?></td>
                                <td><?php echo $value["supp_streetNo"] ?> <?php echo $value["supp_streetName"]?> <?php echo $value["supp_city"] ?> <?php echo $value["postal_code"] ?></td>
                                <td><?php echo $value["supp_phoneNo"] ?></td>
                                <td><?php echo $value["supp_fax"] ?></td>
                                <td><?php echo $value["supp_website"] ?></td>
                                <td><?php echo $value["supp_email"] ?></td>
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

</script>