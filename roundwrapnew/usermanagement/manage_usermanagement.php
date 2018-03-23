<?php
$listofuser = MysqlConnection::fetchAll("user_master");
?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="View User Management" class="tip-bottom"><i class="icon-home"></i>View User Management</a>
    </div>
</div>
<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"><i class="icon-th"></i></span> 
            <h5>User Management</h5>
        </div>
        <div class="widget-content nopadding">
            <form name="packingtype" id="packingtype" method="POST">
                <table class="table table-bordered data-table">
                    <thead>


                        <tr>
                            <th style="width: 2.3%">#</th>
                            <th style="width: 2.3%">#</th>            				
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Street No</th>
                            <th>Street Name</th>
                            <th>City</th>
                            <th>Email</th>
                            <th>Created Date</th>
                            <th>Expiry Date</th>
                            <th>Expire In</th>
                            <th>Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listofuser as $key => $value) {
                            ?>
                            <tr class="gradeX">
                                <td><a href="#" class="tip-top" data-original-title="Edit Record"><i  class="icon-edit"></i></a></td>
                                <td><a href="#myAlert" onclick="setDeleteField('<?php echo $value["user_id"] ?>')" data-toggle="modal"  class="tip-top" data-original-title="Delete Record"><i class="icon-remove"></i></a> </td>
                                <td><?php echo $value["firstName"] ?></td>
                                <td><?php echo $value["lastName"] ?></td>
                                <td><?php echo $value["streetNo"] ?></td>
                                <td><?php echo $value["streetName"] ?></td>
                                <td><?php echo $value["city"] ?></td>
                                <td><?php echo $value["email"] ?></td>
                                <td><?php echo $value["createdDate"] ?></td>
                                <td><?php echo $value["expiryDate"] ?></td>
                                <td><?php echo $value["suspend"] ?></td>
                                <td><?php echo $value["active"] ?></td>
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
            url: 'usermanagement/usermanagement_ajax.php',
            data: dataString
        }).done(function (data) {
//            location.reload();
        }).fail(function () {
        });
        location.reload();
    });

    function setDeleteField(deleteId) {
        document.getElementById("deleteId").value = deleteId;
    }

</script>