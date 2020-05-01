<?php
namespace classes;
use controllers\LoginController;
use controllers\UserController;
use controllers\MainController;

    class Router{
        private $controllers;

        public function __construct($controllers)
        {
            $this->controllers=$controllers;
        }
        public function route($route)
        {
            $GLOBALS["routePrefix"]=explode('?',$route)[0];
            foreach ($this->controllers as $controller)
            {
                foreach ($controller->routes as $controllerRoute=>$function)
                {
//                    echo $routePrefix."<br>".$controllerRoute."<br>";
                    if ($GLOBALS["routePrefix"]==$controllerRoute)
                    {
//                        echo "match<br>";
                        return $controller->route($GLOBALS["routePrefix"]);

                    }
                    else
                    {
//                        echo "no match <br>";
                    }
                }
            }
            return "404.php";
        }
    }