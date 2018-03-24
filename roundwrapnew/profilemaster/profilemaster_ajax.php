<?php

error_reporting(E_ALL);
include '../MysqlConnection.php';
$deleteid = filter_input(INPUT_POST, 'deleteId', FILTER_SANITIZE_ENCODED);
//$decodedeleteid = base64_decode($deleteid);

echo $query = "DELETE FROM profile_master WHERE id = " . $deleteid;

$flag = MysqlConnection::delete($query);
if ($flag == "") {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
