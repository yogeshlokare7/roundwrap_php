<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="index.php?pagename=manage_suppliermaster" title="View Vendor Master" class="tip-bottom">View Vendor Master</a>
        <a title="Create Vendor Master" class="tip-bottom active">Create Vendor Master</a>
    </div>
</div>
<div class="container-fluid" >
    <br/>
    <h5 style="font-family: verdana;font-size: 12px;">CREATE NEW VENDOR</h5>
    <div class="widget-box" style="width: 90%;float: left">
        <div class="widget-title">
            <ul class="nav nav-tabs">
             
                <li id="siTab1" class="active"><a data-toggle="tab" href="#tab1">vendor Information </a></li>
                <li id="adTab2"><a data-toggle="tab" href="#tab2">Additional Contacts</a></li>
            </ul>
        </div>
        <form name="frmCustomerSubmit" id="frmSupplierSubmit" method="post" action="suppliermaster/save_supplierajax.php">
            <div class="widget-content tab-content">
                <div id="tab1" class="tab-pane active">
                    <?php include 'suppliermaster/supplierinfo.php'; ?>
                </div>
                <div id="tab2" class="tab-pane ">
                    <?php include 'suppliermaster/additionalcontact.php'; ?>
                </div>
            </div>   
        </form>
    </div>
</div>
<script>
//    btnVenNext1  btnVenPrev1
    $('#btnVenNext1').on('click', function () {
        $('#siTab1').removeClass('active');
        $('#adTab2').addClass('active');
    });
    $('#btnVenPrev1').on('click', function () {
        $('#adTab2').removeClass('active');
        $('#siTab1').addClass('active');
    });
   
</script>