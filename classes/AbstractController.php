<?php
namespace classes;

abstract class AbstractController
{
    public $routes;
    public function addRoute($route,$callback)
    {
        $this->routes[$route]=$callback;
    }
    public function route($route)
    {

        return call_user_func([$this,$this->routes[$route]]);
    }
    protected function __construct()
    {   $this->routes=[];
    }
}