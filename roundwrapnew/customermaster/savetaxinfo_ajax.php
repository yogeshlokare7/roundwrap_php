<?php

error_reporting(0);
include '../MysqlConnection.php';

$taxcode = $_POST["taxcode"];
$taxdescription = $_POST["taxdescription"];
$taxname = $_POST["taxname"];
$taxvalues = $_POST["taxvalues"];
$isExempt = $_POST["isExempt"];

$arrtaxname = explode(",", $taxname);
print_r($arrtaxname);
$arrtaxval = explode(",", $taxvalues);
print_r($arrtaxval);

echo "<pre>";
print_r($_POST);
echo "</pre>";

$index = 0;
foreach ($arrtaxname as $value) {
    $arrainsert = array();
    $arrainsert["taxcode"] = $taxcode;
    $arrainsert["taxdescription"] = $taxcode;
    $arrainsert["taxname"] = $arrtaxname[$index];
    $arrainsert["taxvalues"] = $arrtaxval[$index];
    $arrainsert["isExempt"] = $isExempt;
    MysqlConnection::insert("taxinfo_table", $arrainsert);
    $index++;
}
 
