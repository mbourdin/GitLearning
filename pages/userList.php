<?php
//repositories en premier
require "../classes/repositories/Utilisateur.php";

//requetes et traitements
$users = Utilisateur::getAll();
$csss=["dataTables.bootstrap4.min.css"];
$scripts=[
    //"jquery.dataTables.min.js",
    //"datatable.js",
    "jquery.form.min.js",
    "userListFunctions.js"];


//template view en dernier
require '../fragments/basicTemplate.php';
