<?php $listofcustomers = MysqlConnection::fetchAll("customer_master"); ?>
<link href="css/jquery.contextMenu.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.min_1.11.3.js"></script>
<script src="js/jquery.contextMenu.js" type="text/javascript"></script>
<script>

    $("#liveTableSearch").on("keyup", function() {
        var value = $(this).val();
        $("table tr").each(function(index) {
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
</script>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="View Customer Master" class="tip-bottom">View Customer Master</a>
    </div>
</div>
<form name="customermaster" id="customermaster" method="POST">
    <div class="container-fluid" >
        <br/>
        <a class="btn" href="index.php?pagename=create_customermaster" >ADD CUSTOMER</a>
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"><i class="icon-th"></i></span> 
                <h5>Customer Master</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>

                        <tr>
                            <th style="width: 2.3%">#</th>
                            <th>Full Name</th>
                            <th>Company Name</th>
                            <th>Address</th>
                            <th>Contact No</th>
                            <th>Email</th>
                            <th>Currency</th>
                             <th>Balance</th>
                            <th>Sales Person Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listofcustomers as $key => $value) {
                            ?>

                            <tr id="'<?php echo $value["cust_id"] ?>'" class="context-menu-one">
                                <td>
                                    <a onclick="setDeleteField('<?php echo $value["cust_id"] ?>')" href="#myAlert" data-toggle="modal"  class="tip-top" data-original-title="Delete Record" data-id="<? echo $value['id'] ?>">
                                        <i class="icon-remove"></i>
                                    </a> 
                                </td>
                                <td><?php echo $value["firstname"] ?>&nbsp;<?php echo $value["lastname"] ?></td>
                                <td><?php echo $value["cust_companyname"] ?></td>
                                <td><?php echo buildAddress($value) ?></td>
                                <td><?php echo $value["phno"] ?></td>
                                <td><?php echo $value["cust_email"] ?></td>
                                <td><?php echo $value["currency"] ?></td>
                                <td><?php echo $value["balance"] ?></td>
                                <td><?php echo $value["sales_person_name"] ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <input type="hidden" id="deleteId" name="cid" value="">
    <input type="hidden" id="flag" name="flag" value="">
</form>
<script>
    $("#deleteThis").click(function() {
        $('#img').show();
        var dataString = "deleteId=" + $('#deleteId').val();
        $.ajax({
            type: 'POST',
            url: 'customermaster/customermaster_ajax.php',
            data: dataString
        }).done(function(data) {
            $('#img').hide();
        }).fail(function() {
        });
        location.reload();
    });
    function setDeleteField(deleteId) {
        document.getElementById("deleteId").value = deleteId;
    }
    $("#save").click(function() {
        var json = convertFormToJSON("#basic_validate");
        $.ajax({
            type: 'POST',
            url: 'customermaster/savecustomermaster_ajax.php',
            data: json
        }).done(function(data) {
        }).fail(function() {
        });
        location.reload();
    });
</script>
<script type="text/javascript">
    $(function() {
        $.contextMenu({
            selector: '.context-menu-one',
            callback: function(key, options) {
                var m = "clicked row: " + key;
                var id = $(this).attr('id');
                //alert("ID for edit/delete:"+id)
                switch (key) {
                    case "create_customer":
                        window.location = "index.php?pagename=create_customermaster";
                        break;
                    case "edit_customer":
                        window.location = "index.php?pagename=create_customermaster&customerId=1";
                        break;
                    case "delete_customer":
                        //document.getElementById("deleteThis").click();
                        break;
                    case "create_purchase_order":
                        window.location = "index.php?pagename=create_perchaseorder";
                        break;
                    case "create_invoice":
                        window.location = "index.php?pagename=manage_invoice";
                        break;
                    default:
                        window.location = "index.php?pagename=manage_customermaster";
                }
                //window.console && console.log(m) || alert(m+"    id:"+id); 
            },
            items: {
                "create_customer": {name: "Create Customer", icon: "add"},
                "edit_customer": {name: "Edit Customer", icon: "edit"},
//                "delete_customermaster": {name: "Delete Customer", icon: "delete"},
                "create_purchase_order": {name: "Create Purchase Order", icon: "add"},
                "create_invoice": {name: "Create Invoice", icon: "add"},
                "sep1": "---------",
                "quit": {name: "Quit", icon: function() {
                        return 'context-menu-icon context-menu-icon-quit';
                    }}
            }
        });

//        $('.context-menu-one').on('click', function(e){
//            console.log('clicked', this);
//       })    
    });
</script>
<!-- this is model dialog --->
<?php

function buildAddress($value) {
    if (trim($value["shipto"]) == "") {
        return $value["streetNo"]
                . " " . $value["streetName"]
                . " " . $value["city"]
                . " " . $value["s_postalcode"]
                . " " . $value["cust_province"]
                . " " . $value["country"]
        ;
    } else {
        return $value["shipto"];
    }
}
?>