<?php

include '../MysqlConnection.php';
print_r($_POST);
echo $deleteid = filter_input(INPUT_POST, 'deleteId', FILTER_SANITIZE_ENCODED);
echo $decodedeleteid = base64_decode($deleteid);
$flag = MysqlConnection::delete("DELETE FROM supplier_master WHERE supp_id = " . $decodedeleteid);
if ($flag == "") {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
