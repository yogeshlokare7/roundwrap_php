<?php $listofcustomers = MysqlConnection::fetchAll("customer_master"); ?>
<link href="css/jquery.contextMenu.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.min_1.11.3.js"></script>
<script src="js/jquery.contextMenu.js" type="text/javascript"></script>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="View Customer Master" class="tip-bottom">View Customer Master</a>
    </div>
</div>
<div class="container-fluid" >
    <br/>
    <a class="btn" href="index.php?pagename=create_customermaster" >ADD CUSTOMER</a>
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"><i class="icon-th"></i></span> 
            <h5>Customer Master</h5>
        </div>
        <div class="widget-content nopadding">
            <form name="customermaster" id="customermaster" method="POST">
                <table class="table table-bordered data-table">
                    <thead>

                        <tr>
                            <th style="width: 2.3%">#</th>
<!--                            <th style="width: 2.3%">#</th>-->
                            <th>Company Name</th>
                            <th>Address</th>
                            <th>Contact No</th>
                            <th>Email</th>
                            <th>Type</th>
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
<!--                                <td>
                                    <div class="btn-group">
                                        <button data-toggle="dropdown" class="btn dropdown-toggle">Action&nbsp;<span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="index.php?pagename=create_customermaster&customerId=1">Edit Customer</a></li>
                                            <li><a href="index.php?pagename=create_customermaster">Create Customer</a></li>
                                            <li><a href="index.php?pagename=create_perchaseorder">Create Purchase Order</a></li>
                                            <li><a href="index.php?pagename=manage_invoice">Create Invoice</a></li>
                                        </ul>
                                    </div>
                                </td>-->

                                <td><?php echo $value["cust_companyname"] ?></td>
                                <td><?php echo $value[""] ?></td>
                                <td><?php echo $value["phno"] ?></td>
                                <td><?php echo $value["cust_email"] ?></td>
                                <td><?php echo $value[""] ?></td>
                                <td><?php echo $value["sales_person_name"] ?></td>
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
               switch(key) {
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

<!-- this is model dialog --->