<?php

error_reporting(0);
include '../MysqlConnection.php';

$arrtaxcode = explode(",", $_POST["taxcode"]);
$taxtaxname = explode(",", $_POST["taxtaxname"]);
$taxtaxvalues = explode(",", $_POST["taxtaxvalues"]);
$taxisExempt = explode(",", $_POST["taxisExempt"]);

for ($index = 0; $index < count($taxtaxname); $index++) {
    if ($arrtaxcode[$index] != "" && $taxtaxname[$index] != "" && $taxtaxvalues[$index] != "") {
        $sqlisavailable = MysqlConnection::fetchCustom("SELECT tax FROM taxinfo_table where tax = '$taxtaxname[$index]'");
        if ($sqlisavailable[0]["tax"] == "") {
            $array["taxcode"] = $arrtaxcode[$index];
            $array["taxname"] = $taxtaxname[$index];
            $array["tax"] = $taxtaxname[$index];
            $array["taxvalues"] = $taxtaxvalues[$index];
            $array["isExempt"] = $taxisExempt;
            $array["taxdescription"] = $arrtaxcode[$index] . " , " . $taxtaxname[$index];
            MysqlConnection::insert("taxinfo_table", $array);
        }
    }
}

$sqlisavailable = MysqlConnection::fetchCustom("SELECT * FROM taxinfo_table ORDER BY id DESC LIMIT 0,1 ");
$sqlcustom = MysqlConnection::fetchCustom($sqlisavailable);
$option = "";
foreach ($array as $key => $value) {
    $option.= "<option value='" . $value["id"] . "'>" . $value["taxcode"] . " - " . $value["taxname"] . " - " . " - " . $value["taxvalues"] . "%</option>";
}

