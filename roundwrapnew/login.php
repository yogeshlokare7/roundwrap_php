<?php
error_reporting(0);
session_start();
ob_start();
$sql = "SELECT * FROM `company_master`";

$array = getResultSet($sql);
foreach ($array as $key => $value) {
    
}
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
<html lang="en">

    <head>
        <title>OPMS</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/maruti-login.css" />
    </head>
    <body>
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" method="POST">
                <div class="control-group normal_text"> <h3><img src="img/logo.png" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-user"></i></span>
                            <select id="cmp_id" name="cmp_id" style="height:40px; display:inline-block; width:75%;  border: 1px solid #dadada;">
                                <?php
                                foreach ($array as $key => $value) {
                                    ?>
                                    <option value="<?php echo $value["cmp_id"] ?>">
                                        <?php echo $value["cmp_name"] ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>                             
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-user"></i></span><input type="text" name="username" placeholder="Username" />
                        </div>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-lock"></i></span><input type="password" name="password" placeholder="Password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-inverse" id="to-recover">Lost password?</a></span>
                    <span class="pull-right"><input type="submit" name="btnSubmit" class="btn btn-success" value="Login" /></span>
                </div>
            </form>
            <form id="recoverform" action="#" class="form-vertical">
                <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>

                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                    </div>
                </div>

                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-inverse" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><button type="submit"  class="btn btn-info" value="Recover"></span>
                </div>
            </form>
        </div>

        <script src="js/jquery.min.js"></script>  
        <script src="js/maruti.login.js"></script> 
    </body>

</html>



