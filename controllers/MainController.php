<?php


namespace controllers;


use classes\AbstractController;

class MainController extends AbstractController
{
    public function __construct()
    {
        parent::__construct();
        $this->addRoute("/", "home");
        $this->addRoute("/index", "home");
        $this->addRoute("/index.php", "home");
        $this->addRoute("/index.html", "home");
    }
    public function home()
    {
        return "basicTemplate.php";
    }
}