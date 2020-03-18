<?php
//repositories en premier
require "../classes/repositories/Utilisateur.php";
//var_dump($_POST);
//requetes et traitements
Utilisateur::add($_POST);
echo json_encode(Utilisateur::getLastAdded());
//header("location: userList.php");
//template view en dernier
