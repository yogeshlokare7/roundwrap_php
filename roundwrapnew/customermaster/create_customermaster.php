<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="View Customer Master" class="tip-bottom">Create New Customer</a>
    </div>
</div>
<div class="container-fluid" >
    <h5 style="font-family: verdana;font-size: 12px;">CREATE NEW CUSTOMER</h5>
    <div class="widget-box" style="width: 90%;float: left;margin-top: -5px;">
        <div class="widget-title">
            <ul class="nav nav-tabs">
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
                <div id="tab2" class="tab-pane active">
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

<script>
//    btnCmpPrev1  btnCmpNext2
    $('#btnCmpNext1').on('click', function () {
        $('#ciTab1').removeClass('active');
        $('#acTab2').addClass('active');
    });
    $('#btnCmpPrev1').on('click', function () {
        $('#acTab2').removeClass('active');
        $('#ciTab1').addClass('active');
    });
    $('#btnCmpNext2').on('click', function () {
        $('#acTab2').removeClass('active');
        $('#tdTab3').addClass('active');
    });
    
  //btnCmpPrev2 btnCmpNext3  
     $('#btnCmpPrev2').on('click', function () {
        $('#dpiTab4').removeClass('active');
        $('#acTab2').addClass('active');
    });
    $('#btnCmpNext3').on('click', function () {
        $('#acTab3').removeClass('active');
        $('#dpiTab4').addClass('active');
    });
    $('#btnCmpPrev3').on('click', function () {
        $('#acTab3').removeClass('active');
        $('#tdTab3').addClass('active');
    });
    
    
</script>