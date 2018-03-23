<?php

include '../MysqlConnection.php';
print_r($_POST);
$deleteid = filter_input(INPUT_POST, 'deleteId', FILTER_SANITIZE_ENCODED);
$flag = MysqlConnection::delete("DELETE FROM customer_packing_slip WHERE cpsId = " . $deleteid);
if ($flag == "") {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
