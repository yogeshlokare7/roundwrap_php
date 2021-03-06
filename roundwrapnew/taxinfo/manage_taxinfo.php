<style>
    .form-horizontal .control-label {
        padding-top: 17px;
        width: 148px;
    }
    .custominput{
        width:300px;
    }
</style>

<?php
$listoftaxinfo = MysqlConnection::fetchAll("taxinfo_table");
?>
<title>RoundWrap</title>

<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="View Tax Info" class="tip-bottom"><i class="icon-home"></i> View Tax Info</a>
    </div>
</div>
<div class="container-fluid">
    <br/>
    <a class="btn" href="#addData"  data-toggle="modal">ADD TAX INFO</a>
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"><i class="icon-th"></i></span> 
            <h5>Tax Info</h5>
        </div>
        <div class="widget-content nopadding">
            <form name="taxinfo" id="taxinfo" method="POST">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th style="width: 2.3%">#</th>
                            <th style="width: 2.3%">#</th>
                            <th>Country</th>
                            <th>Province</th>
                            <th>Active</th>
                            <th>Percentage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listoftaxinfo as $key => $value) {
                            ?>
                            <tr class="gradeX">
                                <td><a href="index.php?pagename=edit_taxinfo&id=<?php echo $value["id"] ?>" class="tip-top" data-original-title="Edit Record"><i  class="icon-edit"></i></a></td>
                                <td><a href="#myAlert" data-toggle="modal"  onclick="setDeleteField('<?php echo $value["id"] ?>')"  class="tip-top" data-original-title="Delete Record"><i class="icon-remove"></i></a> </td>
                                <td><?php echo $value["country"] ?></td>
                                <td><?php echo $value["province"] ?></td>
                                <td><?php echo $value["tax"] ?></td>
                                <td><?php echo $value["percentage"] ?></td>
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
        <h3>Add New Tax Info</h3>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" method="post" action="#" name="basic_validate" id="basic_validate" novalidate="novalidate">
            <div class="control-group">
                <label class="control-label">Country*</label>
                <div class="controls"><input type="text" class="custominput" name="country" id="country"></div>
           
                <label class="control-label">Province*</label>
                <div class="controls"><input type="text" class="custominput" name="province" id="province"></div>
           
                <label class="control-label">Tax Type</label>
                <div class="controls"><input type="text" class="custominput" name="tax" id="tax"></div>
          
                <label class="control-label">Percent</label>
                <div class="controls"><input type="text" class="custominput" name="percentage" id="percentage"></div>
            </div>
<!--            <input type="hidden" name="type" id="type" value="tax_type">-->
        </form>
    </div>
    <div class="modal-footer"> 
        <a id="save" class="btn btn-primary">Save</a> 
        <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
    </div>
</div>
<!-- this is model dialog --->


<script>
    $("#deleteThis").click(function () {
         $("div#divLoading").addClass('show');
        var dataString = "deleteId=" + $('#deleteId').val();
        $.ajax({
            type: 'POST',
            url: 'taxinfo/taxinfo_ajax.php',
            data: dataString
        }).done(function (data) {
        }).fail(function () {
        });
        location.reload();
    });

    function setDeleteField(deleteId) {
         $("div#divLoading").addClass('show');
        document.getElementById("deleteId").value = deleteId;
    }
    $("#save").click(function () {
        var json = convertFormToJSON("#basic_validate");
        $.ajax({
            type: 'POST',
            url: 'taxinfo/savetaxinfo_ajax.php',
            data: json
        }).done(function (data) {
        }).fail(function () {
        });
        location.reload();
    });

</script>