<?php

include '../MysqlConnection.php';

$supplierid = $_POST["supplierid"];
$_POST["salutation"] = $_POST["salutation1"] == "" ? $_POST["salutation"] : $_POST["salutation1"];

$contactarray = $_POST["contact_person"];
$emailarray = $_POST["email"];
$alternoarray = $_POST["alterno"];
$designationarray = $_POST["designation"];

unset($_POST["contact_person"]);
unset($_POST["email"]);
unset($_POST["alterno"]);
unset($_POST["designation"]);
unset($_POST["salutation1"]);
unset($_POST["supplierid"]);


if (isset($supplierid) && $supplierid != "") {
    MysqlConnection::edit("supplier_master", $_POST, " 	supp_id = $supplierid ");
    MysqlConnection::delete("DELETE FROM supplier_contact WHERE supp_id = $supplierid  ");
} else {
    MysqlConnection::insert("supplier_master", $_POST);
    $supppkvalue = MysqlConnection::fetchCustom("SELECT supp_id FROM supplier_master ORDER BY`supp_id` DESC LIMIT 0,1");
    $supplierid = $supppkvalue[0]["supp_id"];
}

$index = 0;
foreach ($contactarray as $key => $value) {
    $suppliercontact = array();
    $suppliercontact["person_email"] = $emailarray[$index];
    $suppliercontact["person_name"] = $contactarray[$index];
    $suppliercontact["person_status"] = 'Y';
    $suppliercontact["person_phoneNo"] = $alternoarray[$index];
    $suppliercontact["designation"] = $designationarray[$index];
    $suppliercontact["supp_id"] = $supplierid;
    $index++;
    MysqlConnection::insert("supplier_contact", $suppliercontact);
}

header("location:../index.php?pagename=manage_suppliermaster");
