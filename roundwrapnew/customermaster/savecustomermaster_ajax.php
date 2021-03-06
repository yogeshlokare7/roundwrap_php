<?php

include '../MysqlConnection.php';
$customerid = filter_input(INPUT_POST, "customerid");

$customerarray = array();
$salutation = filter_input(INPUT_POST, "salutation");
$salutation1 = filter_input(INPUT_POST, "salutation1");

$customerarray["salutation"] = $salutation == "" ? $salutation1 : $salutation;

$customerarray["firstname"] = filter_input(INPUT_POST, "firstname");
$customerarray["lastname"] = filter_input(INPUT_POST, "lastname");
$customerarray["cust_companyname"] = filter_input(INPUT_POST, "cust_companyname");
$customerarray["cust_email"] = filter_input(INPUT_POST, "cust_email");
$customerarray["phno"] = filter_input(INPUT_POST, "phno");
$customerarray["website"] = filter_input(INPUT_POST, "website");
$customerarray["cust_fax"] = filter_input(INPUT_POST, "cust_fax");
$customerarray["billto"] = filter_input(INPUT_POST, "billto");
$customerarray["shipto"] = filter_input(INPUT_POST, "shipto");

$customerarray["cust_type"] = filter_input(INPUT_POST, "cust_type");
$customerarray["paymentTerm"] = filter_input(INPUT_POST, "paymentTerm");
$customerarray["sales_person_name"] = filter_input(INPUT_POST, "sales_person_name");

$customerarray["discount"] = filter_input(INPUT_POST, "discount");
$customerarray["businessno"] = filter_input(INPUT_POST, "businessno");

$customerarray["currency"] = filter_input(INPUT_POST, "currency");
$customerarray["balance"] = filter_input(INPUT_POST, "balance");
$customerarray["cust_accnt_no"] = filter_input(INPUT_POST, "cust_accnt_no");
$customerarray["creditlimit"] = filter_input(INPUT_POST, "creditlimit");
$customerarray["status"] ="Y";
$customerarray["taxInformation"] = filter_input(INPUT_POST, "taxInformation");

$customerarray["streetName"] = filter_input(INPUT_POST, "streetName");
$customerarray["streetNo"] = filter_input(INPUT_POST, "streetNo");
$customerarray["city"] = filter_input(INPUT_POST, "city");
$customerarray["cust_province"] = filter_input(INPUT_POST, "cust_province");
$customerarray["country"] = filter_input(INPUT_POST, "country");
$customerarray["postal_code"] = filter_input(INPUT_POST, "postal_code");

$contact_person = $_POST["contact_person"];
$paymentinfo = $_POST["cardnumber"];

if ($_FILES["certificate"]["name"] != "") {
    $customerarray["certificate"] = MysqlConnection::uploadFile($_FILES["certificate"], "../upload/");
}

if (empty($customerid)) { //// this is save request 
    $customerid = MysqlConnection::insert("customer_master", $customerarray);
} else { /// this is update request
    MysqlConnection::edit("customer_master", $customerarray, " id = $customerid");
}
if (!empty($customerid)) { //// this is save request 
    MysqlConnection::delete("DELETE FROM customer_contact WHERE cust_id = $customerid ");
}

for ($index = 0; $index < count($contact_person); $index++) {
    $namearray = $contact_person;
    $emailarray = $_POST["email"];
    $contactarray = $_POST["alternos"];
    $designationarray = $_POST["designation"];

    $custcontactrarray = array();
    $custcontactrarray["person_name"] = $namearray[$index];
    $custcontactrarray["person_email"] = $emailarray[$index];
    $custcontactrarray["person_phoneNo"] = $contactarray[$index];
    $custcontactrarray["designation"] = $designationarray[$index];
    $custcontactrarray["cust_id"] = $customerid;
    MysqlConnection::insert("customer_contact", $custcontactrarray);
}
if (!empty($customerid)) { //// this is save request 
    MysqlConnection::delete("DELETE FROM customer_payment WHERE cust_id = $customerid ");
}
for ($index = 0; $index < count($paymentinfo); $index++) {
    $cardarray = $paymentinfo;
    $cardnamearray = $_POST["nameoncard"];
    $expdatearray = $_POST["expdate"];
    $cvvnoarray = $_POST["cvvno"];

    $custpaymentrarray = array();
    $custpaymentrarray["cardnumber"] = $cardarray[$index];
    $custpaymentrarray["nameoncard"] = $cardnamearray[$index];
    $custpaymentrarray["expdate"] = $expdatearray[$index];
    $custpaymentrarray["cvvno"] = $cvvnoarray[$index];
    $custpaymentrarray["cust_id"] = $customerid;
    MysqlConnection::insert("customer_payment", $custpaymentrarray);
}
header("location:../index.php?pagename=manage_customermaster");



