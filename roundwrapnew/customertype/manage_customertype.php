<?php
$listofcustomertype = MysqlConnection::fetchCustom("SELECT * FROM generic_entry WHERE type = 'customer_type' ");
?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="View Inventory Master" class="tip-bottom"><i class="icon-home"></i>View CUSTOMER TYPE</a>
    </div>
</div>
<div class="container-fluid">
    <br/>
    <a class="btn" href="#addData"  data-toggle="modal">ADD CUSTOMER TYPE</a>
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"><i class="icon-th"></i></span> 
            <h5>CUSTOMER TYPE</h5>
        </div>
        <div class="widget-content nopadding">
            <form name="customertype" id="customertype" method="POST">
                <table class="table table-bordered data-table">
                    <thead>

                        <tr>
                            <th style="width: 2.3%">#</th>
                            <th style="width: 2.3%">#</th>            				
                            <th>Name</th>
                            <th>Discount(%)</th>
                            <th>Description</th>
                            <th>Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listofcustomertype as $key => $value) {
                            ?>
                            <tr class="gradeX">
                                <td><a href="#" class="tip-top" data-original-title="Edit Record"><i  class="icon-edit"></i></a></td>
                                <td><a href="#myAlert" onclick="setDeleteField('<?php echo $value["id"] ?>')" data-toggle="modal"  class="tip-top" data-original-title="Delete Record"><i class="icon-remove"></i></a> </td>
                                <td><?php echo $value["name"] ?></td>
                                <td><?php echo $value["discount"] ?></td>
                                <td><?php echo $value["description"] ?></td>
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
            url: 'customertype/customertype_ajax.php',
            data: dataString
        }).done(function (data) {
        }).fail(function () {
        });
        location.reload();
    });

    function setDeleteField(deleteId) {
        document.getElementById("deleteId").value = deleteId;
    }

</script>

<!-- this is custom model dialog --->
<div id="addData" class="modal hide" style="top: 10%;left: 50%;">
    <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3>Add New Customer Type</h3>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" method="post" action="#" name="basic_validate" id="basic_validate" novalidate="novalidate">
            <div class="control-group">
                <label class="control-label">CUSTOMER TYPE *:</label>
                <div class="controls">
                    <input type="text" name="" id="itemcode" minlenght="2" maxlength="30" >
                </div>
                <label class="control-label">DESCRIPTION:</label>
                <div class="controls">
                    <input type="text" name="" id="" minlenght="2" maxlength="30" >
                </div>
                <label class="control-label">ACTIVE:</label>
                <div class="controls">
                    <input type="text" name="" id="" minlenght="2" maxlength="30">
                </div>
                <label class="control-label">DISCOUNT:</label>
                <div class="controls">
                    <input type="text" name="" id="" minlenght="2" maxlength="30">
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer"> 
        <a id="save" data-dismiss="modal" class="btn btn-primary">Save</a> 
        <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
    </div>
</div>
<!-- this is model dialog --->