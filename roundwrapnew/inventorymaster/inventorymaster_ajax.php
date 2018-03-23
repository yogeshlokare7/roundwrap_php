<?php
include '../MysqlConnection.php';
$deleteid = filter_input(INPUT_POST, 'deleteId', FILTER_SANITIZE_ENCODED);
$flag = MysqlConnection::delete("DELETE FROM item_master WHERE type = item_code " . $deleteid);
if ($flag == "") {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
