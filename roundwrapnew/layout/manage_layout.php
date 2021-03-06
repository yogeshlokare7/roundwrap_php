<?php
$layout = MysqlConnection::fetchAll("packslip");
?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a  class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a class="tip-bottom"><i class="icon-home"></i>Layout</a>
    </div>
</div>

<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"><i class="icon-th"></i></span> 
            <h5>LAYOUT</h5>
        </div>
        <div class="widget-content nopadding">
            <form name="layout" id="layout" method="POST">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
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
                        foreach ($layout as $key => $value) {
                            ?>
                            <tr class="gradeX">
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
        var dataString = "deleteId=" + $('#deleteId').val();
        $.ajax({
            type: 'POST',
            url: 'layout/layout_ajax.php',
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