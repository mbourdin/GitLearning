<?php
//repositories en premier
require  __DIR__."/../classes/repositories/Utilisateur.php";

//requetes et traitements
if(isset($_POST["username"]))
{   $_POST["id"]=null;
    $_POST["email"]=null;
    $_POST["privileges"]=null;
   $user=new Utilisateur($_POST,true);
   try{$user->login();
        header("location: index.php");
   }catch (RuntimeException $e)
    {
        echo "login error";
    }

}
else
{
    echo "username ou password non rempli";
}
//template view en dernier