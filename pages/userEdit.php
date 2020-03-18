<?php
//repositories en premier
require "../classes/repositories/Utilisateur.php";
//var_dump($_POST);
//requetes et traitements
if(isset($_POST["username"]))
{
    Utilisateur::edit($_GET["id"],$_POST);
    header("location: userList.php");
}
$user=Utilisateur::get($_GET["id"]);
//template view en dernier
require "../fragments/basicTemplate.php";