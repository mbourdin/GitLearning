<?php
    require_once "autoloader.php";
    use classes\Router;
    use controllers\LoginController;
    use controllers\UserController;
    use controllers\MainController;
$GLOBALS['serverRoot']="/websites/GitLearning";
session_start();

$request = $_SERVER['REQUEST_URI'];

$controllers=[];
$controllers []=new LoginController();
$controllers []=new UserController();
$controllers []=new MainController();
    $router=new Router($controllers);
$ROOT_LENGTH=strlen($GLOBALS["serverRoot"]);
    $route=substr($request,$ROOT_LENGTH);
    $template=$router->route($route);
    if(is_null($template))
    {
        $template="404.php";
    }
    if($template!="NONE")
    {
        require_once __DIR__."/fragments/".$template;
    }

