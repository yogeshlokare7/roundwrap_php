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
        <title>Round Wrap</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/fullcalendar.css" />
        <link rel="stylesheet" href="css/maruti-style.css" />
        <link rel="stylesheet" href="css/maruti-media.css" class="skin-color" />
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/uniform.css" />
        <link rel="stylesheet" href="css/loder.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="js/jquery.min.js"></script> 
        <script src="js/maruti.js"></script> 
        <script src="js/jquery.mask.js"></script> 

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

            $("#table tr").click(function() {
                var selected = $(this).hasClass("highlight");
                $("#table tr").removeClass("highlight");
                if (!selected)
                    $(this).addClass("highlight");
            });

        </script>

        <style>

            .highlight { background-color: rgb(220,220,220); } 
            .sticky {
                position: fixed;
                top: 0;
                width: 100%
            }
            label, input, button, select, textarea {
                font-size: 12px;
                font-weight: normal;
                line-height: 10px;
            }
            select{
                width: 212px;
                height: 28px;
            }
            textarea{
                resize: none;
                min-height: 60px;
            }
            .navbar {
                overflow: hidden;
                position: fixed; /* Set the navbar to fixed position */
                top: 0; /* Position the navbar at the top of the page */
                width: 100%; /* Full width */
            }
            .fixfooterbar{
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                color: white;
                text-align: center;
            }
        </style>

    </head>
    <body>

        <div style="height: 20%;width: 100% ;border:  solid 0px black; flex-shrink: 0;">
            <div style="height: 40px;width: 100%;border:  solid 0px;margin-top: 10px;clear: both"></div>
            <div id="sidebar" style="margin-top: 50px;"><?php include './leftmenu.php'; ?></div>
        </div>


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
        <div style="min-height: 80%;margin-top: 10px;" >
            <div id="divLoading"></div>
            <div id="content"><?php include '' . $include . ".php"; ?></div>
        </div>


        <div  style=" flex-shrink: 0;">
            <div id="footer" ></a> 
                This is footer
            </div>
        </div>
    </body>
    <script>
        $("#data tr").click(function() {
            var selected = $(this).hasClass("highlight");
            $("#data tr").removeClass("highlight");
            if (!selected)
                $(this).addClass("highlight");
        });
        $("#data").delegate("tr", "contextmenu", function(e) {
            var selected = $(this).hasClass("highlight");
            $("#data tr").removeClass("highlight");
            if (!selected)
                $(this).addClass("highlight");
        });
    </script>
    <script src="js/jquery.ui.custom.js"></script> 
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/jquery.uniform.js"></script> 
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
