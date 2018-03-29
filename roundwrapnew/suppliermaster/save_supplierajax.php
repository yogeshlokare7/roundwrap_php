<?php

include '../MysqlConnection.php';

echo "<pre>";
print_r($_POST);
echo "</pre>";

$supplierarray = array();
$supplierarray["salutation"] = filter_input(INPUT_POST, "salutation");
$supplierarray["firstname"] = filter_input(INPUT_POST, "firstname");
$supplierarray["lastname"] = filter_input(INPUT_POST, "lastname");
$supplierarray["supp_name"] = filter_input(INPUT_POST, "supp_name");
$supplierarray["address"] = filter_input(INPUT_POST, "address");
$supplierarray["companyname"] = filter_input(INPUT_POST, "companyname");
$supplierarray["supp_email"] = filter_input(INPUT_POST, "supp_email");
$supplierarray["supp_phoneNo"] = filter_input(INPUT_POST, "supp_phoneNo");
$supplierarray["supp_fax"] = filter_input(INPUT_POST, "supp_fax");
$supplierarray["supp_website"] = filter_input(INPUT_POST, "supp_website");
$supplierarray["print_onCheck"] = filter_input(INPUT_POST, "print_onCheck");
$supplierarray["currency"] = filter_input(INPUT_POST, "currency");
$supplierarray["exchange_rate"] = filter_input(INPUT_POST, "exchange_rate");
$supplierarray["supp_streetNo"] = filter_input(INPUT_POST, "supp_streetNo");
$supplierarray["supp_streetName"] = filter_input(INPUT_POST, "supp_streetName");
$supplierarray["supp_city"] = filter_input(INPUT_POST, "supp_city");
$supplierarray["supp_country"] = filter_input(INPUT_POST, "supp_country");
$supplierarray["supp_province"] = filter_input(INPUT_POST, "supp_province");
$supplierarray["postal_code"] = filter_input(INPUT_POST, "postal_code");

$id = MysqlConnection::insert("supplier_master", $supplierarray);

$contact_person = $_POST["contact_person"];
for ($index =0; $index < count($contact_person); $index++) {
    $namearray = $contact_person;
    $emailarray = $_POST["email"];
    $contactarray = $_POST["alterno"];

    echo $namearray[$index] . " == " . $emailarray[$index] . " " . $contactarray[$index];
    $suppcontactrarray = array();
    $suppcontactrarray["person_name"] = $namearray[$index];
    $suppcontactrarray["person_email"] =  $emailarray[$index];
    $suppcontactrarray["person_phoneNo"] =  $contactarray[$index];
    $suppcontactrarray["supp_id"] = $id;
    if($suppcontactrarray["person_name"]!='' && $suppcontactrarray["person_name"]!=''){
         MysqlConnection::insert("supplier_contact", $suppcontactrarray);
    }
    echo "<br/>";
}

$tax_info= $_POST["tax_name"];
for ($index = 0; $index < count($tax_info); $index++) {
    $tax_namearray = $tax_info;
    $tax_checkarray = $_POST["tax_check"];
    $tax_percentarray = $_POST["tax_percentage"];

    echo $tax_namearray[$index] . " == " . $tax_checkarray[$index] . " " . $tax_percentarray[$index];
    $taxinfoarray = array();
    $taxinfoarray["entry_type"] = $tax_namearray[$index];
    $taxinfoarray["isTaxApplied"] =  1;
    $taxinfoarray["tax_rate"] =  $tax_percentarray[$index];
    $taxinfoarray["supp_id"] = $id;
    
    MysqlConnection::insert("supplier_tax", $taxinfoarray);
    echo "<br/>";
}
header("location:index.php?pagename=manage_suppliermaster");





