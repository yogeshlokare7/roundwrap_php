<?php
error_reporting(0);
session_start();
ob_start();
?>

<h6>
    Welcome to 
        <?php echo $_SESSION["user"]["cmpName"] ?>
        <?php echo $_SESSION["user"]["phone"] ?>
        <?php echo $_SESSION["user"]["province"] ?>
        <?php echo $_SESSION["user"]["country"] ?>
</h6>