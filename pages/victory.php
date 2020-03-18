<?php
    require "../classes/repositories/Utilisateur.php";
    if(!isset($_SESSION["user"]))
    {
        header("location: 403.html");
    }
    ?>
<!DOCTYPE html>
<html>
<!--HEAD-->
<?php
require "../fragments/head.php";

?>
<!--END HEAD-->


<!--NAVBAR-->
<?php
    require "../fragments/navbar.php";
?>
<!--END NAVBAR-->


<!--PAGE CONTENT-->
<?php
    if(isset($_SESSION["user"]))
    {
        require "../vault/win.php";
    }

?>
<!--END PAGE CONTENT-->


<!--SCRIPTS-->
<?php require("../fragments/scripts.php") ?>
<!--END SCRIPTS-->

</body>
</html>
