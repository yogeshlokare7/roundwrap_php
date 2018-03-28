<hr/>
                <table style="width: 100%;">
                    <tr>
                        <td><label class="control-label" style="float: left">Street No :</label></td>
                        <td><input type="text" name="supp_streetNo" autofocus="" value="<?php echo filter_input(INPUT_POST, "supp_streetNo") ?>" id="supp_streetNo" minlength="2" maxlength="20"></td>
                        <td>Street Name :</td>
                        <td><input type="text" name="supp_streetName" value="<?php echo filter_input(INPUT_POST, "supp_streetName") ?>"  id="supp_streetName" minlength="2" maxlength="40"></td>
                         <td><label class="control-label"  style="float: left">City :</label></td>
                        <td><input type="email" name="supp_city" id="supp_city"  value="<?php echo filter_input(INPUT_POST, "supp_city") ?>" minlength="2" maxlength="30"></td>
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
                        <td><label class="control-label"  style="float: left">Postal Code :</label></td>
                        <td><input type="text" name="postal_code" id="postal_code"  value="<?php echo filter_input(INPUT_POST, "postal_code") ?>" ></td>
                    </tr>
                </table>  <hr/>
            
                 