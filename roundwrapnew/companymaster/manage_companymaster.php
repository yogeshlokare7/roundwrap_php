<?php
$tbl = "company_master";
$query = "SELECT * FROM $tbl ";
$listofcompany = getResultSet($query);
function getResultSet($sql) {
    $connect = mysqli_connect("localhost", "root", "", "opmsconfig");
    $mysqli_query = mysqli_query($connect, $sql);
    $array = array();
    while ($row = mysqli_fetch_array($mysqli_query)) {
        $array[] = $row;
    }
    return $array;
}
?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="View Company Master" class="tip-bottom"><i class="icon-home"></i>View Company Master</a>
    </div>
</div>
<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"><i class="icon-th"></i></span> 
            <h5>Company Master</h5>
        </div>
        <div class="widget-content nopadding">
            <form name="companymaster" id="companymaster" method="POST">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th style="width: 2.3%">#</th>
                            <th style="width: 2.3%">#</th>            				
                            <th>ID</th>
                            <th>Name</th>
                            <th>Street No</th>
                            <th>Street Name</th>
                            <th>City</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>Website</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listofcompany as $key => $value) {
                            ?>
                            <tr class="gradeX">
                                <td><a href="index.php?pagename=save_companymaster&cmp_id=<?php echo $value["cmp_id"] ?>" class="tip-top" data-original-title="Edit Record"><i  class="icon-edit"></i></a></td>
                                <td><a href="#myAlert" onclick="setDeleteField('<?php echo $value["cmp_id"] ?>')" data-toggle="modal"  class="tip-top" data-original-title="Delete Record"><i class="icon-remove"></i></a> </td>
                                <td><?php echo $value["cmp_id"] ?></td>
                                <td><?php echo $value["cmp_name"] ?></td>
                                <td><?php echo $value["streetNo"] ?></td>
                                <td><?php echo $value["streetName"] ?></td>
                                <td><?php echo $value["city"] ?></td>
                                <td><?php echo $value["cmp_email"] ?></td>
                                <td><?php echo $value["phno"] ?></td>
                                <td><?php echo $value["cmp_website"] ?></td>

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
     <a href="index.php?pagename=save_companymaster" class="btn btn-primary">ADD</a>
    
</div>
<script>
    $("#deleteThis").click(function () {
        var dataString = "deleteId=" + $('#deleteId').val();
        $.ajax({
            type: 'POST',
            url: 'companymaster/companymaster_ajax.php',
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