<?php
$packslip = MysqlConnection::fetchAll("packslip");
?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a  class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a class="tip-bottom"><i class="icon-home"></i>Packing Slip</a>
    </div>
</div>

<div class="container-fluid">
    <br/>
    <a class="btn" href="index.php?pagename=create_packingslip" ><i class="icon-file"></i>&nbsp;Create Packing Slip</a>
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"><i class="icon-th"></i></span> 
            <h5>PACKING SLIP</h5>
        </div>
        <div class="widget-content nopadding">
            <form name="packingslip" id="packingslip" method="POST">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th style="width: 2.3%">#</th>
                            <th style="width: 2.3%">#</th>  
                            <th>ID</th>
                            <th>Company Name</th>
                            <th>Profile Name</th>
                            <th>SO No</th>
                            <th>PO No</th>
                            <th>Rec Date</th>
                            <th>Req Date</th>
                            <th>Order Confirm</th>
                            <th>Acknowledged</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($packslip as $key => $value) {
                            ?>
                            <tr class="gradeX">
                                <td><a href="#myAlert" onclick="setDeleteField('<?php echo $value["ps_id"] ?>')" data-toggle="modal"  class="tip-top" data-original-title="Delete Record"><i class="icon-remove"></i></a> </td>

                                                                <td>
                                    <div class="btn-group">
                                        <button data-toggle="dropdown" class="btn dropdown-toggle">Action&nbsp;<span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Create Packing Slip</a></li> 
                                            <li><a href="#">View Packing Slip</a></li>
                                            <li><a href="#">Delete Packing Slip</a></li>   
                                            <li><a href="#">Edit Packing Slip</a></li> 
                                            <li><a href="#">Activate User</a></li> 
                                        </ul>
                                    </div>
                                </td>

                                <td><?php echo $value["ps_id"] ?></td>
                                <td></td>
                                <td><?php echo $value["prof_id"] ?></td>
                                <td><?php echo $value["so_no"] ?></td>
                                <td><?php echo $value["po_no"] ?></td>
                                <td><?php echo $value["rec_date"] ?></td>
                                <td><?php echo $value["req_date"] ?></td>
                                <td><?php echo $value["checked_by"] ?></td>
                                <td><?php echo $value["ackrecv"] ?></td>
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
        $("div#divLoading").addClass('show');
        var dataString = "deleteId=" + $('#deleteId').val();
        $.ajax({
            type: 'POST',
            url: 'packingslip/packingslip_ajax.php',
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