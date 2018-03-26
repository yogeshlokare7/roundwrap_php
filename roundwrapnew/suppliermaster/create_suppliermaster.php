<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="View Customer Master" class="tip-bottom">View Customer Master</a>
    </div>
</div>
<div class="container-fluid" >
    <br/>
    <h5 style="font-family: verdana;font-size: 12px;">CREATE NEW CUSTOMER</h5>
    <div class="widget-box" style="width: 45%;float: left">
        <div class="widget-title">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab1">Company Information </a></li>
                <li><a data-toggle="tab" href="#tab2">Additional Information</a></li>
                <li><a data-toggle="tab" href="#tab3">Payment Information</a></li>
            </ul>
        </div>
        <div class="widget-content tab-content">
            <div id="tab1" class="tab-pane active">
                <hr/>
                <table style="width: 100%;">
                    <tr>
                        <td><label class="control-label" style="float: left">Company Name</label></td>
                        <td><input type="text" name="cust_companyname" autofocus="" value="<?php echo filter_input(INPUT_POST, "cust_companyname") ?>" id="cust_companyname"></td>
                        <td>Contact</td>
                        <td><input type="text" name="sales_person_name" value="<?php echo filter_input(INPUT_POST, "sales_person_name") ?>"  id="sales_person_name"></td>
                    </tr>
                    <tr>
                        <td><label class="control-label"  style="float: left">Mr./Ms./..</label></td>
                        <td><input type="text" name="salutation" id="salutation"  value="<?php echo filter_input(INPUT_POST, "salutation") ?>" ></td>
                        <td><label class="control-label"  style="float: left">Phone</label></td>
                        <td><input type="text" name="" id=""  value="<?php echo filter_input(INPUT_POST, "") ?>" ></td>
                    </tr>
                    <tr>
                        <td>First Name</td>
                        <td><input type="text" name="" id=""  value="<?php echo filter_input(INPUT_POST, "") ?>" ></td>
                        <td>Fax</td>
                        <td><input type="text" name="cust_fax" id="cust_fax"  value="<?php echo filter_input(INPUT_POST, "cust_fax") ?>" ></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="" id=""  value="<?php echo filter_input(INPUT_POST, "") ?>" ></td>
                        <td>Alt.Ph</td>
                        <td><input type="text" name="alterno1" id="alterno1"  value="<?php echo filter_input(INPUT_POST, "alterno1") ?>" ></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a href="#tab2" data-toggle="tab" class="btn btn-mini">NEXT</a></td>
                    </tr>

                </table> 
            </div>
            <div id="tab2" class="tab-pane">
            </div>
            <div id="tab3" class="tab-pane">

            </div>
        </div>                            
    </div>
</div>
