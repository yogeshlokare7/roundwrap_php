<?php

include '../MysqlConnection.php';

$companyname = trim($_POST["companyname"]);
if ($companyname != "") {
    $details = MysqlConnection::fetchCustom("SELECT * FROM `customer_master` WHERE `cust_companyname` = '$companyname'");
    if (empty($details[0])) {
        echo json_encode(array());
    } else {
        echo json_encode($details[0]);
    }
} else {
    echo json_encode(array());
}
