
<?php
error_reporting(0);
session_start();
ob_start();

include './MysqlConnection.php';

$pagename = $_GET["pagename"];
$explode = explode("_", $pagename);
$include = "";
$module = "";
$page = "";
if (count($explode) >= 2) {
    $include = $explode[1] . "/" . $pagename;
    $module = $explode[1];
    $page = $explode[0] . " " . $explode[1];
} else {
    $include = "dashboard";
    $module = "Home";
    $page = "Dashboard";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>RoundWrap</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/fullcalendar.css" />
        <link rel="stylesheet" href="css/maruti-style.css" />
        <link rel="stylesheet" href="css/maruti-media.css" class="skin-color" />
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/select2.css" />
        <link rel="stylesheet" href="css/uniform.css" />

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="js/maruti.js"></script> 
        <script src="js/jquery.min.js"></script> 
        <script>
            $(function() {
                setTimeout(function() {
                    $("#successMessage").hide('blind', {}, 100)
                }, 5000);
            });

            function convertFormToJSON(form) {
                var array = $(form).serializeArray();
                var json = {};

                jQuery.each(array, function() {
                    json[this.name] = this.value || '';
                });

                return json;
            }


            function setNavBar() {
                window.onscroll = function() {
                    myFunction();
                };
                var header = document.getElementById("sidebar");
                var sticky = header.offsetTop;
            }
            function myFunction() {
                if (window.pageYOffset >= sticky) {
                    header.classList.add("sticky");
                } else {
                    header.classList.remove("sticky");
                }
            }

        </script>

        <style>
            .sticky {
                position: fixed;
                top: 0;
                width: 100%
            }
        </style>


    </head>
    <body>
        <div id="header" style="color: white">Round Wrap</div>
        <div id="sidebar" class="sticky" ><?php include './leftmenu.php'; ?></div>

        <img src="img/ajaxloading.gif" id="img" style="display:none" />
        <!-- this is model dialog --->
        <div id="myAlert" class="modal hide" style="width: 400px;top: 30%;left: 50%;">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h3>Action Alert !!!</h3>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this Item ???</p>
            </div>
            <div class="modal-footer"> 
                <a id="deleteThis" data-dismiss="modal" class="btn btn-primary">Confirm</a> 
                <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
            </div>
        </div>
        <!-- this is model dialog --->



        <div id="content"><?php include '' . $include . ".php"; ?></div>
        <div class="row-fluid"><div id="footer" class="span12"></a> </div></div>



    </body>
    <script src="js/jquery.ui.custom.js"></script> 
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/jquery.uniform.js"></script> 
    <script src="js/select2.min.js"></script> 

    <script src="js/excanvas.min.js"></script> 
    <script src="js/maruti.tables.js"></script>
    <script src="js/jquery.peity.min.js"></script> 
    <script src="js/fullcalendar.min.js"></script> 
    <script src="js/maruti.dashboard.js"></script> 
    <script src="js/maruti.chat.js"></script> 
    <script src="js/jquery.flot.min.js"></script> 
    <script src="js/jquery.flot.resize.min.js"></script> 
    <script src="js/maruti.tables.js"></script>
    <script src="js/jquery.dataTables.min.js"></script> 
    <script type="text/javascript">

            // This function is called from the pop-up menus to transfer to
            // a different page. Ignore if the value returned is a null string:
            function goPage(newURL) {

                // if url is empty, skip the menu dividers and reset the menu selection to default
                if (newURL != "") {

                    // if url is "-", it is this page -- reset the menu:
                    if (newURL == "-") {
                        resetMenu();
                    }
                    // else, send page to designated URL            
                    else {
                        document.location.href = newURL;
                    }
                }
            }

            // resets the menu selection upon entry to this page:
            function resetMenu() {
                document.gomenu.selector.selectedIndex = 2;
            }
    </script>
</body>
</html>
