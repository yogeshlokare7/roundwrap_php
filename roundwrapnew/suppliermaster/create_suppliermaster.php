<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="index.php?pagename=manage_suppliermaster" title="View Supplier Master" class="tip-bottom">View Supplier Master</a>
        <a title="Create Supplier Master" class="tip-bottom active">Create Supplier Master</a>
    </div>
</div>
<div class="container-fluid" >
    <br/>
    <h5 style="font-family: verdana;font-size: 12px;">CREATE NEW SUPPLIER</h5>
    <div class="widget-box" style="width: 90%;float: left">
        <div class="widget-title">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab1">Supplier Information </a></li>
                <li><a data-toggle="tab" href="#tab2">Address Details</a></li>
                <li><a data-toggle="tab" href="#tab3">Tax Details</a></li>
                <li><a data-toggle="tab" href="#tab4">Contact Person Details</a></li>
            </ul>
        </div>
        <form name="frmCustomerSubmit" id="frmSupplierSubmit" method="post">
        <div class="widget-content tab-content">
            <div id="tab1" class="tab-pane active">
                <?php include 'suppliermaster/supplierinfo.php'; ?>
            </div>
            <div id="tab2" class="tab-pane ">
               <?php include 'suppliermaster/addressinfo.php'; ?>
            </div>
            <div id="tab3" class="tab-pane">
               <?php include 'suppliermaster/taxinfo.php'; ?>
            </div> 
            <div id="tab4" class="tab-pane ">
                <?php include 'suppliermaster/additionalcontact.php'; ?>
            </div>
        </div>   
        </form>
    </div>
</div>
