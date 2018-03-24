<?php
$tblname = "company_master";
if (count($_POST) > 0) {
    if ($_GET['cmp_id'] != null && $_GET['cmp_id'] > 0) {
        print_r("Updated");
        $update = "UPDATE $tblname set cmp_name='" . $_POST["cmp_name"] . "', phno='" . $_POST["phno"] . "', cmp_fax='" . $_POST["cmp_fax"] . "', cmp_email='" . $_POST["cmp_email"] . "', cmp_website='" . $_POST["cmp_website"] . "', streetNo='" . $_POST["streetNo"] . "', streetName='" . $_POST["streetName"] . "', city='" . $_POST["city"] . "', postal_code='" . $_POST["postal_code"] . "', country='" . $_POST["country"] . "', province='" . $_POST["province"] . "' WHERE cmp_id= '" . $_GET['cmp_id'] . "'";
        print_r($update);
        $resultcompany = getResultSet($update);
    } else {
        unset($_POST["cmp_id"]);
        insert($tblname, $_POST);
    }
    header("location:index.php?pagename=manage_companymaster");
}
function insert($tbl = "", $data = array()) {
    try {
        $str = "";
        $keysset = "";
        $valuesset = "";
        foreach ($data as $key => $values) {
            $keysset .= "`" . $key . "`,";
            $valuesset .= "'" . trim($values) . "',";
        }
        $query = " INSERT INTO $tbl (" . substr($keysset, 0, strlen($keysset) - 1) . ") VALUES (" . substr($valuesset, 0, strlen($valuesset) - 1) . ");";
        print_r($query);
        $resultCmp = getResultSet($query);
        print_r($resultCmp);
        //return mysqli_insert_id();
    } catch (Exception $exc) {
        echo "<span style='color:red'>SQL QUERY ERROR !!! INSERT !!!<span>";
    }
}

function getResultSet($sql) {
    $connect = mysqli_connect("localhost", "root", "", "opmsconfig");
    return mysqli_query($connect, $sql);
}

if ($_GET['cmp_id'] > 0) {
    $query = " SELECT * FROM $tblname where cmp_id =".$_GET['cmp_id'];
    $resultCmp = getResultSet($query);
    $result = MysqlConnection::toArrays($resultCmp);
    $resultsetCompany = $result[0];
}
?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="index.php?pagename=manage_companymaster" title="View Company Master" class="tip-bottom"><i class="icon-home"></i>View Company Master</a>
        <a title="Save Company Master" class="tip-bottom"><i class="icon-home"></i>Save Company Master</a>
    </div>
</div>
<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Save Company Detail</h5>
        </div>
        <div class="widget-content">
            <form class="form-horizontal" method="POST">
                <input type="hidden" name="cmp_id" value="<?php echo $resultsetCompany["cmp_id"] ?>"/>
                <div class="control-group">
                    <label class="control-label">Name:</label>
                    <div class="controls">
                        <input type="text" class="span11" name="cmp_name" value="<?php echo $resultsetCompany["cmp_name"] ?>" placeholder="Enter Company Name" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Logo :</label>
                    <div class="controls">
                        <input type="file" class="span11"  placeholder="Company Logo" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Phone No</label>
                    <div class="controls">
                        <input type="text"  class="span11" name="phno" value="<?php echo $resultsetCompany["phno"] ?>" placeholder="Enter Phone No"  />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Fax:</label>
                    <div class="controls">
                        <input type="text" class="span11" name="cmp_fax" value="<?php echo $resultsetCompany["cmp_fax"] ?>" placeholder="Enter Fax" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Email:</label>
                    <div class="controls">
                        <input type="text" class="span11" name="cmp_email" value="<?php echo $resultsetCompany["cmp_email"] ?>" placeholder="Enter Email" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Website</label>
                    <div class="controls">
                        <input type="text" class="span11" name="cmp_website" value="<?php echo $resultsetCompany["cmp_website"] ?>" placeholder="Enter Website" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Street No:</label>
                    <div class="controls">
                        <input type="text" class="span11" name="streetNo" value="<?php echo $resultsetCompany["streetNo"] ?>" placeholder="Enter Street No." />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Street Name :</label>
                    <div class="controls">
                        <input type="type" class="span11" name="streetName" value="<?php echo $resultsetCompany["streetName"] ?>" placeholder="Enter Street Name" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">City</label>
                    <div class="controls">
                        <input type="text"  class="span11" name="city" value="<?php echo $resultsetCompany["city"] ?>" placeholder="Enter City"  />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Postal Code:</label>
                    <div class="controls">
                        <input type="text" class="span11" name="postal_code" value="<?php echo $resultsetCompany["postal_code"] ?>" placeholder="Enter Postal Code" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Country:</label>
                    <div class="controls">
                        <select id="country" name="country">
                            <option>India</option>
                            <option>Canada</option>
                            <option>Third option</option>
                            <option>Fourth option</option>
                            <option>Fifth option</option>
                            <option>Sixth option</option>
                            <option>Seventh option</option>
                            <option>Eighth option</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Province</label>
                    <div class="controls">
                        <select id="province" name="province">
                            <option>Alberta</option>
                            <option>British Colombia</option>
                            <option>Third option</option>
                            <option>Fourth option</option>
                            <option>Fifth option</option>
                            <option>Sixth option</option>
                            <option>Seventh option</option>
                            <option>Eighth option</option>
                        </select>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>

    </div>
</div>
