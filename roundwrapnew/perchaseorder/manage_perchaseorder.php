<?php
$listPerchaseOrders = MysqlConnection::fetchAll("purchase_order");
?>
<link href="https://swisnl.github.io/jQuery-contextMenu/dist/jquery.contextMenu.css" rel="stylesheet" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://swisnl.github.io/jQuery-contextMenu/dist/jquery.contextMenu.js" type="text/javascript"></script>
<div id="content-header">
    <div id="breadcrumb"> 
        <a class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a class="tip-bottom"><i class="icon-home"></i>Purchase Orders</a>
    </div>
</div>

<div class="container-fluid">
    <br/>
    <a class="btn" href="index.php?pagename=create_perchaseorder" >Create Purchase Order</a>
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"><i class="icon-th"></i></span> 
            <h5>SUPPLIERS PURCHASE ORDER LIST</h5>
        </div>
        <div class="widget-content nopadding">
            <form name="perchaseorder" id="perchaseorder" method="POST">
                <table id="tbl1" class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th style="width: 2.3%">#</th>
                            <th>PO ID</th>
                            <th>Supplier Name</th>
                            <th>Expected Date</th>
                            <th>Total Items</th>
                            <th>PO Status</th>
                            <th>Ship Via</th>
                            <th>Entered By</th>
                            <th>Gross Amount</th>
                            <th>Tax Amt</th>
                            <th>Net Amount</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listPerchaseOrders as $key => $value) {
                            ?>
                            <tr id="'<?php echo $value["id"] ?>'" class="context-menu-one" onclick="setId('<?php echo $value["id"] ?>')">

                                <td><a href="#myAlert"  onclick="setDeleteField('<?php echo $value["purchaseOrderId"] ?>')" data-toggle="modal"  class="tip-top" data-original-title="Delete Record"><i class="icon-remove"></i></a> </td>
                                <td><?php echo $value["purchaseOrderId"] ?></td>
                                <td><?php echo $value["supplier_id"] ?></td>
                                <td><?php echo $value["expected_date"] ?></td>
                                <td></td>
                                <td><?php echo $value["label_value"] ?></td>
                                <td><?php echo $value["ship_via"] ?></td>
                                <td><?php echo $value["added_by"] ?></td>
                                <td><?php echo $value["sub_total"] ?></td>
                                <td><?php echo $value["totalTax"] ?></td>
                                <td><?php echo $value["total"] ?></td>
                            </tr>
                            <?php
                        }
                        ?>

                    </tbody>
                </table>
                <input type="hidden" id="deleteId" name="cid" value="">
                <input type="hidden" id="flag" name="flag" value="">
                <input type="hidden" id="rightClikId" name="rightClikId" value="">
            </form>
        </div>
    
    </div>
</div>
<script>
    
    $("#deleteThis").click(function () {
        alert("Hello");
        $("div#divLoading").addClass('show');
        var dataString = "deleteId=" + $('#deleteId').val();
        $.ajax({
            type: 'POST',
            url: 'perchaseorder/perchaseorder_ajax.php',
            data: dataString
        }).done(function (data) {
        }).fail(function () {
        });
        location.reload();
    });

    function setDeleteField(deleteId) {
        document.getElementById("deleteId").value = deleteId;
    }
    
    function setId(val){
        document.getElementById("rightClikId").value = val;
    }

</script>
<script type="text/javascript">
        $(function() {
        $.contextMenu({
            selector: '.context-menu-one', 
            callback: function(key, options) {
               var m = "clicked row: " + key;
               var id = $(this).attr('id'); 
               alert("ID for edit/delete:"+id)
               switch(key) {
                case "edit":
                        alert("edit");
                        break;
                case "delete":
                        document.getElementById("deleteThis").click();
                        break;
                case "copy":
                        alert("copy");
                        break;
                default:
                         alert("default");
                }
               //window.console && console.log(m) || alert(m+"    id:"+id); 
            },
            items: {
                "edit": {name: "Edit", icon: "edit"},
                "copy": {name: "Copy", icon: "copy"},
                "delete": {name: "Delete", icon: "delete"},
                "sep1": "---------",
                "quit": {name: "Quit", icon: function(){
                    return 'context-menu-icon context-menu-icon-quit';
                }}
            }
        });

//        $('.context-menu-one').on('click', function(e){
//            console.log('clicked', this);
//       })    
    });
    </script>