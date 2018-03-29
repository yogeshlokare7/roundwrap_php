<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="View Item Master" class="tip-bottom">Create New Item</a>
    </div>
</div>
<div class="container-fluid" >
    <h5 style="font-family: verdana;font-size: 12px;">CREATE NEW ITEM</h5>
    <div class="widget-box" style="width: 90%;float: left;margin-top: -5px;">
        <div class="widget-title">
            <ul class="nav nav-tabs">
                <li id="" class="active"><a data-toggle="tab" href="#tab1">Item Information </a></li>
                <li id=""><a data-toggle="tab" href="#tab2">Purchase Information</a></li>
                <li id=""><a data-toggle="tab" href="#tab3">Sales Information</a></li>
                <li id=""><a data-toggle="tab" href="#tab4">Inventory Information</a></li>
            </ul>
        </div>
        <form name="frmCustomerSubmit" id="frmCustomerSubmit" method="post" action="customermaster/savecustomermaster_ajax.php">
            <div class="widget-content tab-content">
                <div id="tab1" class="tab-pane active">
                    <?php include 'itemmaster/iteminfo.php'; ?>
                </div>
                <div id="tab2" class="tab-pane ">
                    <?php include 'itemmaster/purchaseinfo.php'; ?>
                </div>
                <div id="tab3" class="tab-pane">
                    <?php include 'itemmaster/salesinfo.php'; ?>
                </div>
                <div id="tab4" class="tab-pane">
                    <?php include 'itemmaster/inventoryinfo.php'; ?>
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
    
   
     $('#btnCmpPrev2').on('click', function () {
        $('#tdTab3').removeClass('active');
        $('#acTab2').addClass('active');
    });
    $('#btnCmpNext3').on('click', function () {
        $('#tdTab3').removeClass('active');
        $('#dpiTab4').addClass('active');
    });
    $('#btnCmpPrev3').on('click', function () {
        $('#dpiTab4').removeClass('active');
        $('#tdTab3').addClass('active');
    });
    
    
</script>