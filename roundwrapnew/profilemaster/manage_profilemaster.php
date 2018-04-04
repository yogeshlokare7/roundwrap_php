<?php $listofprofiles = MysqlConnection::fetchAll("profile_master");
?>
<style>
    .customtable{
        width: 100%;
        height: auto;
        min-height: 50%;
        font-family: verdana;
        border: solid 1px gray;
        border-color: gray;
    }
    .customtable tr{
        height: 25px;
        border-color: gray;
    }
    .customtable tr td{
        padding: 5px;
        border-color: gray;
    }
    .thead{
        height: 35px;
    }
    .brdright{
        border-right: solid 1px rgb(220,220,220);
    }
</style>

<script>
    $("#search").on("keyup", function () {
        var value = $(this).val();
        $("table tr").each(function (index) {
            if (index !== 0) {
                $row = $(this);
                var id = $row.find("td:first").text();
                if (id.indexOf(value) !== 0) {
                    $(this).hide();
                }
                else {
                    $(this).show();
                }
            }
        });
    });
    ​
</script>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="View Profile Master" class="tip-bottom">View Profile Master</a>
    </div>
</div>
<div class="container-fluid" >
    <br/>
    <table class="customtable" style="border: 0px;">
        <tr style="height: 30px;background-color: rgb(240,240,240);;height: 40px;">
            <td style="width: 8%"><a class="btn" href="#addData"  data-toggle="modal">ADD PROFILE</a></td>
            <th style="width: 2.3%">&nbsp;Search&nbsp;:&nbsp;</th>
            <th colspan="9" style="text-align: left">
                <input type="text" id="searchinput" name="searchinput" style="width: 50%">
            </th>
        </tr>
    </table>
    <div class="widget-box">
        <table class="customtable" border="1">
            <tr style="height: 30px;background-color: rgb(240,240,240);">
                <th style="width: 2.3%">#</th>
                <th style="width: 2.3%">#</th>
                <th>Profile Name</th>
                <th >Label Name</th>
                <th >Label Value</th>
<!--                <th style="width: 14.8px;"></th>-->
            </tr>
        </table>
        <div style="height: 310px;overflow: auto;overflow-x: auto">
            <table class="customtable" style="margin-top: -1px;" >
                <?php
                foreach ($listofprofiles as $key => $value) {
                    ?>
                    <tr style="border-bottom: solid 1px rgb(220,220,220);text-align: center">
                        <td style="width: 2.3%"><a href="#" class="tip-top" data-original-title="Edit Record"><i  class="icon-edit"></i></a></td>
                        <td style="width: 2.3%" ><a onclick="setDeleteField('<?php echo $value["id"] ?>')" href="#myAlert" data-toggle="modal"  class="tip-top" data-original-title="Delete Record" data-id="<? echo $value['id'] ?>">
                                <i class="icon-remove"></i>
                            </a></td>
                        <td style="width: 511px;"><?php echo $value["profile_name"] ?></td>
                        <td style="width: 465px;"><?php echo $value["label_name"] ?></td>
                        <td ><?php echo $value["label_value"] ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
        <table class="customtable" border="1">
            <tr style="height: 30px;background-color: rgb(240,240,240);">
                <th colspan="5"></th>
            </tr>
        </table>
    </div>
</div>


<!-- this is custom model dialog --->
<div id="addData" class="modal hide" style="top: 10%;left: 50%;">
    <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3>Add New profile</h3>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" method="post" action="#" name="basic_validate" id="basic_validate" novalidate="novalidate">
            <div class="control-group">
                <label class="control-label">Profile Name</label>
                <div class="controls">
                    <input type="text" name="profile_name" id="profile_name" minlenght="2" maxlength="30">
                </div>

                <label class="control-label">Label Name</label>
                <div class="controls">
                    <input type="text" name="label_name" id="label_name" minlenght="2" maxlength="30">
                </div>

                <label class="control-label">Label Value</label>
                <div class="controls">
                    <input type="text" name="label_value" id="label_value" minlenght="2" maxlength="30">

                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer"> 
        <a id="save" class="btn btn-primary">Save</a> 
        <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
    </div>
</div>

<script>
    $("#deleteThis").click(function () {
        $("div#divLoading").addClass('show');
        var dataString = "deleteId=" + $('#deleteId').val();
        $.ajax({
            type: 'POST',
            url: 'taxname/taxname_ajax.php',
            data: dataString
        }).done(function (data) {
//            $('#img').hide();
        }).fail(function () {
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
            url: 'profilemaster/saveprofile_ajax.php',
            data: json
        }).done(function (data) {
        }).fail(function () {
        });
        location.reload();
    });
</script>

<!-- this is model dialog --->