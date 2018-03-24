<?php
$listoftaxname = MysqlConnection::fetchCustom("SELECT * FROM generic_entry WHERE type = 'tax_type' ");
?>
<title>RoundWrap</title>

<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="View Tax Name" class="tip-bottom"><i class="icon-home"></i>View Tax Name</a>
    </div>
</div>
<div class="container-fluid">
     <br/>
    <a class="btn" href="#addData"  data-toggle="modal">ADD TAX NAME</a>
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"><i class="icon-th"></i></span> 
            <h5>Tax Name</h5>
        </div>
        <div class="widget-content nopadding">
            <form name="taxname" id="taxname" method="POST">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th style="width: 2.3%">#</th>
                            <th style="width: 2.3%">#</th> 
                            <th>Name</th>
                            <th>Description</th>
                            <th>Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listoftaxname as $key => $value) {
                            ?>
                            <tr class="gradeX">
                                <td><a href="#" class="tip-top" data-original-title="Edit Record"><i  class="icon-edit"></i></a></td>
                                <td><a href="#myAlert"  onclick="setDeleteField('<?php echo $value["id"] ?>')"  data-toggle="modal"  class="tip-top" data-original-title="Delete Record"><i class="icon-remove"></i></a> </td>
                                <td><?php echo $value["name"] ?></td>
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
<!-- this is custom model dialog --->
<div id="addData" class="modal hide" style="top: 10%;left: 50%;">
    <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3>Add New Tax Name</h3>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" method="post" action="#" name="basic_validate" id="basic_validate" novalidate="novalidate">
            <div class="control-group">
                <label class="control-label">TAX TYPE *:</label>
                <div class="controls"><input type="text" name="name" id="name"></div>
            </div>
            <div class="control-group">
                <label class="control-label">DESCRIPTION</label>
                <div class="controls"><input type="text" name="description" id="description"></div>
            </div>
            <div class="control-group">
                <label class="control-label">ACTIVE</label>
                <div class="controls"><input type="text" name="active" id="active"></div>
            </div>
            <input type="hidden" name="type" id="type" value="tax_type">
        </form>
    </div>
    <div class="modal-footer"> 
        <a id="save" class="btn btn-primary">Save</a> 
        <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
    </div>
</div>
<!-- this is model dialog --->


<script>
    $("#deleteThis").click(function() {
        var dataString = "deleteId=" + $('#deleteId').val();
        $.ajax({
            type: 'POST',
            url: 'taxname/taxname_ajax.php',
            data: dataString
        }).done(function(data) {
        }).fail(function() {
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
            url: 'taxname/savetaxname_ajax.php',
            data: json
        }).done(function (data) {
        }).fail(function () {
        });
        location.reload();
    });

</script>
