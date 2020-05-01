<?php

namespace controllers;

use classes\repositories\UtilisateurRepository;
use classes\AbstractController;
use entity\Utilisateur;

class LoginController extends AbstractController
{
    public function logout(): void
    {
        $_SESSION=[];
        header("location: index.php");
    }

    public function __construct()
    {
        parent::__construct();
        $this->addRoute("/logout", "logout");
        $this->addRoute("/login", "login");
    }

    public static function login()
    {

//requetes et traitements
        if (isset($_POST["username"])) {
            $_POST["id"] = null;
            $_POST["email"] = null;
            $_POST["privileges"] = null;
            $user = new Utilisateur($_POST, true);
            $repo=new UtilisateurRepository();
            try {
                $repo->login($user);
                header("location: " . $GLOBALS['serverRoot'] . "/index.php");
            } catch (\RuntimeException $e) {
                echo "login error";
            }

        } else {
            echo "username ou password non rempli";
        }
        return "basicTemplate.php";
    }
}
