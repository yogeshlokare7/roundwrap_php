<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a title="View Supplier Master" class="tip-bottom">View Supplier Master</a>
    </div>
</div>
<div class="container-fluid" >
    <br/>
    <h5 style="font-family: verdana;font-size: 12px;">CREATE NEW SUPPLIER</h5>
    <div class="widget-box" style="width: 45%;float: left">
        <div class="widget-title">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab1">Supplier Information </a></li>
                <li><a data-toggle="tab" href="#tab2">Address Details</a></li>
                <li><a data-toggle="tab" href="#tab3">Tax Details</a></li>
                <li><a data-toggle="tab" href="#tab4">Contact Person Details</a></li>
            </ul>
        </div>
        <div class="widget-content tab-content">
            <div id="tab1" class="tab-pane active">
                <hr/>
                <table style="width: 100%;">
                    <tr>
                        <td><label class="control-label" style="float: left">Name *:</label></td>
                        <td><input type="text" name="supp_name" autofocus="" value="<?php echo filter_input(INPUT_POST, "supp_name") ?>" id="supp_name"></td>
                        <td>Phone No*:</td>
                        <td><input type="tel" name="supp_phoneNo" value="<?php echo filter_input(INPUT_POST, "supp_phoneNo") ?>"  id="supp_phoneNo"></td>
                    </tr>
                    <tr>
                        <td><label class="control-label"  style="float: left">Email :</label></td>
                        <td><input type="email" name="supp_email" id="supp_email"  value="<?php echo filter_input(INPUT_POST, "supp_email") ?>" ></td>
                        <td><label class="control-label"  style="float: left">Fax :</label></td>
                        <td><input type="text" name="supp_fax" id="supp_fax"  value="<?php echo filter_input(INPUT_POST, "supp_fax") ?>" ></td>
                    </tr>
                    <tr>
                        <td>Website:</td>
                        <td><input type="text" name="supp_website" id="supp_website"  value="<?php echo filter_input(INPUT_POST, "supp_website") ?>" ></td>
                        <td>Print on cheque as:</td>
                        <td><input type="text" name="cust_fax" id="cust_fax"  value="<?php echo filter_input(INPUT_POST, "cust_fax") ?>" ></td>
                    </tr>
                    <tr>
                        <td>Currency :</td>
                        <td><select id="currency"  type="text" required="true" name="currency"  value="<?php echo filter_input(INPUT_POST, "currency") ?>" placeholder="Select Country Here"  >
                                <option>Select Currency</option>
                                <option></option><option></option>
                            </select></td>
                        <td>Exchange Rate:</td>
                        <td><input type="text" name="exchange_rate" id="exchange_rate"  value="<?php echo filter_input(INPUT_POST, "exchange_rate") ?>" ></td>
                    </tr>
                 
                </table> 
                <hr/>
            </div>
            
            <div id="tab2" class="tab-pane ">
                <hr/>
                <table style="width: 100%;">
                    <tr>
                        <td><label class="control-label" style="float: left">Street No :</label></td>
                        <td><input type="text" name="supp_streetNo" autofocus="" value="<?php echo filter_input(INPUT_POST, "supp_streetNo") ?>" id="supp_streetNo"></td>
                        <td>Street Name :</td>
                        <td><input type="text" name="supp_streetName" value="<?php echo filter_input(INPUT_POST, "supp_streetName") ?>"  id="supp_streetName"></td>
                    </tr>
                    <tr>
                        <td><label class="control-label"  style="float: left">City :</label></td>
                        <td><input type="email" name="supp_city" id="supp_city"  value="<?php echo filter_input(INPUT_POST, "supp_city") ?>" ></td>
                        <td><label class="control-label"  style="float: left">Postal Code :</label></td>
                        <td><input type="text" name="postal_code" id="postal_code"  value="<?php echo filter_input(INPUT_POST, "postal_code") ?>" ></td>
                    </tr>
                    <tr>
                        <td>Country*:</td>
                        <td> <select id="supp_country"  type="text" required="true" name="supp_country"  value="<?php echo filter_input(INPUT_POST, "supp_country") ?>" placeholder="Select Country Here"  >
                                <option>Select Country</option>
                                <option>Canada</option>
                            </select>
                        </td>
                        <td>Province :*</td>
                        <td> <select id="supp_province"  type="text" required="true" name="supp_province" autofocus=""  value="<?php echo filter_input(INPUT_POST, "supp_province") ?>" class="form-control">
                                <option>Select Province</option>
                                <option>Alberta</option><
                                <option>British Columbia</option>
                                <option>Manitoba</option>
                                <option>New Brunswick</option>
                                <option>Newfoundland and Labrador</option>
                                <option>Northwest Territories</option>
                                <option>Nova Scotia</option>
                                <option>Nunavut</option>
                                <option>Ontario</option>
                                <option>Prince Edward Island</option>
                                <option>Quebec</option>
                                <option>Saskatchewan</option>
                                <option>Yukon</option>
                            </select></td>
<!--                        <td><input type="text" name="supp_province" id="supp_province"  value="<?php echo filter_input(INPUT_POST, "supp_province") ?>" ></td>-->
                    </tr>
                    
                </table>  <hr/>
            </div>
            <div id="tab3" class="tab-pane">
                 <hr/>
                <table class="table"   style="width: 100%;">
                    <thead>
                        <tr>
                            <th style="width: 2.3%">Check</th>
                            <th >Tax Name</th>
                            <th >Tax Percentage</th>
                        </tr>
                    </thead>
                    <tr>
                        <td><span><input type="checkbox" class="checker" name="radios" style="opacity: 0;"></span></td>
                        <td ><label class="control-label" style="float: left">GST</label></td>
                        <td ><input style="width:98%" type="text" name="" autofocus="" value="<?php echo filter_input(INPUT_POST, "") ?>" id=""></td>
                        
                    </tr>
                    <tr>
                        <td><span><input type="checkbox" class="checker" name="radios" style="opacity: 0;"></span></td>
                        <td><label class="control-label" style="float: left">PST</label></td>
                        <td><input style="width:98%" type="text" name="" autofocus="" value="<?php echo filter_input(INPUT_POST, "") ?>" id=""></td>
                        
                    </tr>

                   

                </table> <hr/> 
                    
            </div>
            <div id="tab4" class="tab-pane ">
                 <hr/>
                <table class="table"   style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>Designation</th>
                        </tr>
                    </thead>
                    <tr>
                        <td><input style="width:98%" type="text" name="" autofocus="" value="<?php echo filter_input(INPUT_POST, "") ?>" id=""></td>
                        <td ><input style="width:98%" type="text" name="" autofocus="" value="<?php echo filter_input(INPUT_POST, "") ?>" id=""></td>
                        <td ><input style="width:98%" type="text" name="" autofocus="" value="<?php echo filter_input(INPUT_POST, "") ?>" id=""></td>
                        <td><input style="width:98%" type="text" name="" autofocus="" value="<?php echo filter_input(INPUT_POST, "") ?>" id=""></td></td>
                    </tr>
                    <tr>
                        <td><input style="width:98%" type="text" name="" autofocus="" value="<?php echo filter_input(INPUT_POST, "") ?>" id=""></td></td>
                        <td><input style="width:98%" type="text" name="" autofocus="" value="<?php echo filter_input(INPUT_POST, "") ?>" id=""></td></td>
                        <td><input style="width:98%" type="text" name="" autofocus="" value="<?php echo filter_input(INPUT_POST, "") ?>" id=""></td>
                        <td><input style="width:98%" type="text" name="" autofocus="" value="<?php echo filter_input(INPUT_POST, "") ?>" id=""></td></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a href="#" data-toggle="tab" class="btn btn-mini">FINISH</a></td>
                    </tr>

                </table>  
            </div>
        </div>                            
    </div>
</div>
