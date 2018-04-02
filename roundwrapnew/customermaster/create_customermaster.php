<?php
$customerid = filter_input(INPUT_GET, "customerId");
if (!empty($customerid)) {
    $customerarray = MysqlConnection::fetchCustom("SELECT * FROM customer_master WHERE cust_id = $customerid ");
    print_r($customerarray);
}
?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="View Customer Master" class="tip-bottom">Create New Customer</a>
    </div>
</div>
<div class="container-fluid" id="tabs">
    <h5 style="font-family: verdana;font-size: 12px;">CREATE NEW CUSTOMER</h5>
    <div class="widget-box" style="width: 90%;float: left;margin-top: -5px;">
        <div class="widget-title" >
            <ul class="nav nav-tabs" >
                <li id="ciTab1" class="active"><a data-toggle="tab" href="#tab1">Company Information </a></li>
                <li id="acTab2"><a data-toggle="tab" href="#tab2">Additional Contacts</a></li>
                <li id="tdTab3"><a data-toggle="tab" href="#tab3">Tax and Discount</a></li>
                <li id="dpiTab4"><a data-toggle="tab" href="#tab4">Deposits and Payment Information</a></li>
            </ul>
        </div>
        <form name="frmCustomerSubmit" id="frmCustomerSubmit" method="post" action="customermaster/savecustomermaster_ajax.php">
            <div class="widget-content tab-content">
                <div id="tab1" class="tab-pane active">
                    <?php include 'customermaster/companyinfo.php'; ?>
                </div>
                <div id="tab2" class="tab-pane ">
                    <?php include 'customermaster/additionalcontact.php'; ?>
                </div>
                <div id="tab3" class="tab-pane">
                    <?php include 'customermaster/taxinfo.php'; ?>
                </div>
                <div id="tab4" class="tab-pane">
                    <?php include 'customermaster/paymentinfo.php'; ?>
                </div>
            </div>  
        </form>
    </div>
</div>
<input type="button" id="btnPrevious" value="Previous" style = "display:none"/>
<input type="button" id="btnNext" value="Next" />

<script>
    var currentTab = 0;
    $(function() {
        $("#tabs").tabs({
            select: function(e, i) {
                currentTab = i.index;
            }
        });
    });
    $("#btnNext").live("click", function() {
        var tabs = $('#tabs').tabs();
        var c = $('#tabs').tabs("length");
        currentTab = currentTab == (c - 1) ? currentTab : (currentTab + 1);
        tabs.tabs('select', currentTab);
        $("#btnPrevious").show();
        if (currentTab == (c - 1)) {
            $("#btnNext").hide();
        } else {
            $("#btnNext").show();
        }
    });
    $("#btnPrevious").live("click", function() {
        var tabs = $('#tabs').tabs();
        var c = $('#tabs').tabs("length");
        currentTab = currentTab == 0 ? currentTab : (currentTab - 1);
        tabs.tabs('select', currentTab);
        if (currentTab == 0) {
            $("#btnNext").show();
            $("#btnPrevious").hide();
        }
        if (currentTab < (c - 1)) {
            $("#btnNext").show();
        }
    });

//    btnCmpPrev1  btnCmpNext2
//    $('#btnCmpNext1').on('click', function () {
//        $('#ciTab1').removeClass('active');
//        $('#acTab2').addClass('active');
//     window.location = "#tab2";
//    });
//    $('#btnCmpPrev1').on('click', function () {
//        $('#acTab2').removeClass('active');
//        $('#ciTab1').addClass('active');
//    });
//    $('#btnCmpNext2').on('click', function () {
//        $('#acTab2').removeClass('active');
//        $('#tdTab3').addClass('active');
//    });
//    
//   
//     $('#btnCmpPrev2').on('click', function () {
//        $('#tdTab3').removeClass('active');
//        $('#acTab2').addClass('active');
//    });
//    $('#btnCmpNext3').on('click', function () {
//        $('#tdTab3').removeClass('active');
//        $('#dpiTab4').addClass('active');
//    });
//    $('#btnCmpPrev3').on('click', function () {
//        $('#dpiTab4').removeClass('active');
//        $('#tdTab3').addClass('active');
//    });
//    
//    
</script>