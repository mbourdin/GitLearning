<?php
require_once (__DIR__ . '/../Connection.php');
function curPageName()
{
    return basename(substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1), ".php");
}

//echo "The current page name is ".curPageName();



echo '<!DOCTYPE html>
<html>';
// HEAD

require "head.php";

//END HEAD
echo '<body>';
//NAVBAR
    require "navbar.php";



//  END NAVBAR


//  PAGE CONTENT
require "../views/" . curPageName() . "View.php";

//END PAGE CONTENT


//SCRIPTS
require("scripts.php") ?>
<!--END SCRIPTS-->

</body>
</html>
