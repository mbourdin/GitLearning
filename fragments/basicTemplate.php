<?php
require_once (__DIR__ . '/../Connection.php');



//echo "The current page name is ".curPageName();



echo '<!DOCTYPE html>
<html lang="fr">';
// HEAD

require "head.php";

//END HEAD
echo '<body>';
//NAVBAR
    require "navbar.php";



//  END NAVBAR


//  PAGE CONTENT
if($route!="/" && $route!="/index" && $route!="/index.php" && $route!="/index.html")
{
    require __DIR__."/../views".$GLOBALS["routePrefix"]."View.php";

}

//END PAGE CONTENT


//SCRIPTS
require("scripts.php");

    ?>
<!--END SCRIPTS-->

</body>
</html>
