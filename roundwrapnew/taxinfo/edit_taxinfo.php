<?php
$primarykey = filter_input(INPUT_GET, "id");
if (isset($primarykey)) {
    $resultset = MysqlConnection::fetchByPrimary("taxinfo_table", $primarykey, "id");
}
$btnpost = filter_input(INPUT_POST, "btnUpdate");
if (isset($btnpost)) {
    
}
?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="Update Tax Info" class="tip-bottom"><i class="icon-home"></i>View Tax Info</a>
    </div>
</div>
<div class="container-fluid">
    <br/>
    <div id="addData"  style="width: 30%">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h3>Edit Tax Info</h3>
        </div>
        <div class="modal-body">
               <form class="form-horizontal" method="post" action="#" name="basic_validate" id="basic_validate" novalidate="novalidate">
            <div class="control-group"><label class="control-label">Country*</label>
                <div class="controls"><input type="text" class="custominput" value="<?php echo $resultset["country"] ?>" name="country" id="country"></div>
                <label class="control-label">Province*</label>
                <div class="controls"><input type="text" class="custominput" value="<?php echo $resultset["province"] ?>" name="province" id="province"></div>
                <label class="control-label">Tax Type</label>
                <div class="controls"><input type="text" class="custominput" value="<?php echo $resultset["tax"] ?>" name="tax" id="tax"></div>
                <label class="control-label">Percent</label>
                <div class="controls"><input type="text" class="custominput" value="<?php echo $resultset["percentage"] ?>" name="percentage" id="percentage"></div> 
            </div>
<!--            <input type="hidden" name="type" id="type" value="tax_type">-->
        </form>
        </div>
        <div class="modal-footer"> 
            <input type="submit" name="btnUpdate" value="Update" class="btn btn-primary"/>
            <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
        </div>
    </div>
</div>