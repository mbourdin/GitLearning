<?php
namespace controllers;
use classes\AbstractController;
use classes\repositories\UtilisateurRepository;

    class UserController extends AbstractController
    {
        public function __construct()
        {   parent::__construct();
            $this->addRoute("/user/list","list");
            $this->addRoute("/user/create","create");
            $this->addRoute("/user/delete","delete");
            $this->addRoute("/user/edit","edit");
        }
        public function edit()
        {
            $id=$_GET["id"];
            $repo =new UtilisateurRepository();

            if(count($_POST)!==0)
            {
                $repo->edit($id,$_POST);
                header("Location: ".$GLOBALS["serverRoot"]."/user/list");
                return "NONE";
            }
            $GLOBALS["user"]=$repo->get($id);
            return "basicTemplate.php";
        }
        public function delete()
        {   $id=$_GET["id"];
            $repo =new UtilisateurRepository();
            echo json_encode($repo->delete($id));

            //header("Location: ".$GLOBALS['serverRoot']."/user/list");
            return "NONE";
        }
        public function create()
        {
            $repo =new UtilisateurRepository();
            $repo->add($_POST);
            echo json_encode($repo->getLastAdded());
            return "NONE";
        }
        public function list()
        {

            $contentVars=[];
//requetes et traitements
            $utilisateurRepository=new UtilisateurRepository();
           $GLOBALS["users"] = $utilisateurRepository->getAll();

            $GLOBALS["csss"]=["dataTables.bootstrap4.min.css"];
            $GLOBALS["scripts"]=[
                "jquery.dataTables.min.js",
                "datatable.js",
                "jquery.form.min.js",
                "userListFunctions.js"];
            return "basicTemplate.php";

//template view en dernier


        }
    }