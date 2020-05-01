<?php
namespace entity;

class Utilisateur
{
    public $id;
    public $username;
    public $email;
    public $privileges;
    public $password;
    public function __construct(Array $user,$encodePassword = false)
    {   $this->id=$user["id"];
        $this->username=$user["username"];
        $this->email=$user["email"];
        $this->privileges=explode(",",$user["privileges"]);
        if($encodePassword)
        {
            $this->password=md5($user["password"]);
        }else
        {
            $this->password=$user["password"];
        }

    }
    public function toArray():array
    {
        $user=[];
        $user["id"]=$this->id;
        $user["username"]=$this->username;
        $user["email"]=$this->email;
        $user["privileges"]=implode(",",$this->privileges);
        return $user;
    }
    public function addPrivilege(string $privilege)
    {
        if(!in_array($privilege,$this->privileges))
        {
            $this->privileges []=$privilege;

        }
    }
    public function removePrivilege(string $privilege)
    {
        $i=array_search($privilege,$this->privileges);
        if($i!==false){
            unset($this->privileges[$i]);
        }

    }
}