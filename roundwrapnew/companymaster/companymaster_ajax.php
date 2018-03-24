<?php
$deleteid = filter_input(INPUT_POST, 'deleteId', FILTER_SANITIZE_ENCODED);
$query = "DELETE FROM opmsconfig.company_master WHERE cmp_id = " . $deleteid;
$listofcompany = getResultSet($query);
header("location:index.php?pagename=manage_companymaster");
function getResultSet($sql) {
    $connect = mysqli_connect("localhost", "root", "", "opmsconfig");
    $mysqli_query = mysqli_query($connect, $sql);
    $array = array();
    while ($row = mysqli_fetch_array($mysqli_query)) {
        $array[] = $row;
    }
    return $array;
}



