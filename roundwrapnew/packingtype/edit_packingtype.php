<?php
$primarykey = filter_input(INPUT_GET, "id");
if (isset($primarykey)) {
    $resultset = MysqlConnection::fetchByPrimary("generic_entry", $primarykey, "id");
}
$btnpost = filter_input(INPUT_POST, "btnUpdate");
if (isset($btnpost)) {
    
}
?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="Update Packing Type" class="tip-bottom"><i class="icon-home"></i>View Packing Type</a>
    </div>
</div>
<div class="container-fluid">
    <br/>
    <div id="addData"  style="width: 30%">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h3>Edit Packing Type</h3>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" method="post" action="#" name="basic_validate" id="basic_validate" novalidate="novalidate">
            <div class="control-group">
                <label class="control-label">Packingslip Detail Type *:</label>
                <div class="controls"><input type="text"  class="custominput" value="<?php echo $resultset["type"] ?>" name="type" id="type"></div>

                <label class="control-label">Description</label>
                <div class="controls"><input type="text" class="custominput" value="<?php echo $resultset["description"] ?>" name="description" id="description"></div>

                <label class="control-label">Active</label>
                <div class="controls"><input type="text" class="custominput" value="<?php echo $resultset["active"] ?>" name="active" id="active"></div>

                <input type="hidden" name="type" id="type" value="packingslip_detail_type"></div>
        </form>
        </div>
        <div class="modal-footer"> 
            <input type="submit" name="btnUpdate" value="Update" class="btn btn-primary"/>
            <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
        </div>
    </div>
</div>