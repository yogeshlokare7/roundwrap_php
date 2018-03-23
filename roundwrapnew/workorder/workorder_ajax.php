<?php

include '../MysqlConnection.php';
print_r($_POST);
echo $deleteid = filter_input(INPUT_POST, 'deleteId', FILTER_SANITIZE_ENCODED);
echo $decodedeleteid = base64_decode($deleteid);
$flag = MysqlConnection::delete("DELETE FROM packslip WHERE workOrd_Id = " . $decodedeleteid);
if ($flag == "") {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
