<?php
include '../MysqlConnection.php';
$customerarray = array();
$customerarray["salutation"]  = filter_input(INPUT_POST, "salutation");
$customerarray["firstname"]  = filter_input(INPUT_POST, "firstname");
$customerarray["lastname"]  = filter_input(INPUT_POST, "lastname");
$customerarray["cust_companyname"]  = filter_input(INPUT_POST, "cust_companyname");
$customerarray["cust_email"]  = filter_input(INPUT_POST, "cust_email");
$customerarray["phno"]  = filter_input(INPUT_POST, "phno");
$customerarray["website"]  = filter_input(INPUT_POST, "website");
$customerarray["cust_fax"]  = filter_input(INPUT_POST, "cust_fax");
$customerarray["billto"]  = filter_input(INPUT_POST, "billto");
$customerarray["shipto"]  = filter_input(INPUT_POST, "shipto");
$customerarray["cust_type"]  = filter_input(INPUT_POST, "customerType");
$customerarray["paymentTerm"]  = filter_input(INPUT_POST, "paymentTerm");
$customerarray["sales_person_name"]  = filter_input(INPUT_POST, "sales_person_name");
$customerarray["currency"]  = filter_input(INPUT_POST, "currency");
$customerarray["balance"]  = filter_input(INPUT_POST, "balance");

$id = MysqlConnection::insert("customer_master", $customerarray);

$contact_person = $_POST["contact_person"];
for ($index = 0; $index <count($contact_person); $index++) {
    $namearray = $contact_person;
    $emailarray = $_POST["email"];
    $contactarray = $_POST["alternos"];

    $custcontactrarray = array();
    $custcontactrarray["person_name"] = $namearray[$index];
    $custcontactrarray["person_email"] =  $emailarray[$index];
    $custcontactrarray["person_phoneNo"] =  $contactarray[$index];
    $custcontactrarray["cust_id"] = $id;
    MysqlConnection::insert("customer_contact", $custcontactrarray);
}
header("location:index.php?pagename=manage_customermaster");



