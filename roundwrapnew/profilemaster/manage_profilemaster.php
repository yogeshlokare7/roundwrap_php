<?php $listofprofiles = MysqlConnection::fetchAll("profile_master"); ?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="View Profile Master" class="tip-bottom">View Profile Master</a>
    </div>
</div>
<div class="container-fluid" >
    <br/>
    <a class="btn" href="#addData"  data-toggle="modal">ADD PROFILE</a>
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"><i class="icon-th"></i></span> 
            <h5>Profile Master</h5>
        </div>
        <div class="widget-content nopadding">
            <form name="profilemaster" id="profilemaster" method="POST">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th style="width: 2.3%">#</th>
                            <th style="width: 2.3%">#</th>
                            <th>Profile Name</th>
                            <th>Label Name</th>
                            <th>Label Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listofprofiles as $key => $value) {
                            ?>
                            <tr class="gradeX">
                                <td><a href="#" class="tip-top" data-original-title="Edit Record"><i  class="icon-edit"></i></a></td>
                                <td>
                                    <a onclick="setDeleteField('<?php echo $value["id"] ?>')" href="#myAlert" data-toggle="modal"  class="tip-top" data-original-title="Delete Record" data-id="<? echo $value['id'] ?>">
                                        <i class="icon-remove"></i>
                                    </a> 
                                </td>
                                <td><?php echo $value["profile_name"] ?></td>
                                <td><?php echo $value["label_name"] ?></td>
                                <td><?php echo $value["label_value"] ?></td>
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
</script>

<!-- this is custom model dialog --->
<div id="addData" class="modal hide" style="top: 10%;left: 50%;">
    <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3>Add New profile</h3>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" method="post" action="#" name="basic_validate" id="basic_validate" novalidate="novalidate">
            <div class="control-group">
                <label class="control-label">Your Name</label>
                <div class="controls">
                    <input type="text" name="required" id="required">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Your Email</label>
                <div class="controls">
                    <input type="text" name="email" id="email">

                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Date (only Number)</label>
                <div class="controls">
                    <input type="text" name="date" id="date">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">URL (Start with http://)</label>
                <div class="controls">
                    <input type="text" name="url" id="url">
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