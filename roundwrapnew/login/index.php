<?php
error_reporting(0);
session_start();
ob_start();
$sql = "SELECT * FROM `company_master`";

$array = getResultSet($sql);


if (count($_POST) > 0) {
    $sqlcompny = "SELECT * FROM `company_master` where cmp_id = " . $_POST['cmp_id'];
    $resultcompany = getResultSet($sqlcompny);
    $sqlloginuser = "SELECT * FROM " . $company["databasename"] . ".user_master WHERE username = '" . $_POST['username'] . "' AND password = '" . $_POST['password'] . "' AND cmpId = " . $company["cmp_id"];
    $resultUser = getSubResult($sqlcompny, $company["databasename"]);
    $arraymaster = array();
    $arraymaster["company"] = $resultcompany[0];
    $arraymaster["user"] = $resultUser[0];
    $_SESSION["master"] = $arraymaster;
    header("location:index.php");
}

function getResultSet($sql) {
    $connect = mysqli_connect("localhost", "root", "root", "opmsconfig");
    $mysqli_query = mysqli_query($connect, $sql);
    $array = array();
    while ($row = mysqli_fetch_array($mysqli_query)) {
        $array[] = $row;
    }
    return $array;
}

function getSubResult($sql, $db) {
    $connect = mysqli_connect("localhost", "root", "root", $db);
    $mysqli_query = mysqli_query($connect, $sql);
    $array = array();
    while ($row = mysqli_fetch_array($mysqli_query)) {
        $array[] = $row;
    }
    return $array;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Application Login</title>
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Simple Login Form,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"./>
    </script>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700' rel='stylesheet' type='text/css'>
</head>
<body>
    <br/><br/><br/><br/><br/>
    <div class="login">	
        <div class="ribbon-wrapper h2 ribbon-red">
            <div class="ribbon-front">
                <h2>Login</h2>
            </div>
            <div class="ribbon-edge-topleft2"></div>
            <div class="ribbon-edge-bottomleft"></div>
        </div>
        <form>
            <ul>
                <li><input type="text" class="text" value="Email Address"><a href="#" class=" icon user"></a></li>
                <li><input type="password" value="Password" ><a href="#" class=" icon lock"></a></li>
            </ul>
        </form>
        <div class="submit"><input type="submit"  value="Log in" ></div>
    </div>
    <div class="copy-right"></div>
</body>
</html>