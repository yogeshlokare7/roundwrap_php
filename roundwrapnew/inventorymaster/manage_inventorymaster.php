<?php
$listofinventory = MysqlConnection::fetchAll("item_master");
?>
<title>RoundWrap</title>

<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="View Inventory Master" class="tip-bottom"><i class="icon-home"></i>View Inventory Master</a>
    </div>
</div>
<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"><i class="icon-th"></i></span> 
            <h5>Inventory Master</h5>
        </div>
        <div class="widget-content nopadding">
            <form name="itemmaster" id="itemmaster" method="POST">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th style="width: 2.3%">#</th>
                            <th style="width: 2.3%">#</th>                 							
                            <th>Item Code</th>
                            <th>Item Description</th>
                            <th>Item Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listofinventory as $key => $value) {
                            ?>
                            <tr class="gradeX">
                                <td><a href="#" class="tip-top" data-original-title="Edit Record"><i  class="icon-edit"></i></a></td>
                                <td><a href="#myAlert" data-toggle="modal" onclick="setDeleteField('<?php echo $value["item_code"] ?>')" class="tip-top" data-original-title="Delete Record"><i class="icon-remove"></i></a> </td>
                                <td><?php echo $value["item_code"] ?></td>
                                <td><?php echo $value["item_desc"] ?></td>
                                <td><?php echo $value["quantity"] ?></td>

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
            url: 'itemcode/itemcode_ajax.php',
            data: dataString
        }).done(function(data) {
            $("#flagmsg").append("<br/><div id='successMessage' class='alert alert-success'><button class='close' data-dismiss='alert'>×</button><strong>Success!</strong>Record Deleted Successfully !!!</div>");
        }).fail(function() {
            $("#flagmsg").append("fail");
        });
       location.reload();
    });

    function setDeleteField(deleteId) {
        document.getElementById("deleteId").value = deleteId;
    }

</script>