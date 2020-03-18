<?php
//repositories en premier
require "../classes/repositories/Utilisateur.php";

//requetes et traitements
Utilisateur::delete($_GET["id"]);
header("location: userList.php");
//template view en dernier
