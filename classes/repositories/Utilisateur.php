<?php
require_once __DIR__."/../../Connection.php";

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
    public function toArray():Array
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
    public function updatePrivileges()
    {   $user=$this->toArray();
        $GLOBALS["pdo"]->query("
        UPDATE user
        SET privileges = '".$user["privileges"].
        "' WHERE id=".$this->id);
    }
    public static function get(int $id):?Array
    {
        $user=$GLOBALS["pdo"]->query("SELECT * FROM user WHERE id=".$id)->fetch();
        return $user;
    }
    public static function getAll():?Array
    {
        $users=$GLOBALS["pdo"]->query("SELECT id,username,email,privileges FROM user")->fetchAll();
        return $users;
    }
    public static function delete(int $id)
    {
        $GLOBALS["pdo"]->query("DELETE FROM user WHERE id=".$id);
    }
    public static function add(Array $user)
    {   $user["password"]=md5($user["password"]);
        $st=$GLOBALS["pdo"]->prepare(
            "INSERT INTO user (username , email,password ) 
            VALUES (:username,:email,:password)"
        );
        $st->execute($user);
    }
    public static function edit(int $id,Array $user)
    {
        $st=$GLOBALS["pdo"]->prepare("
        UPDATE user
        SET username=:username,
        email=:email
        WHERE id=
        ".$id);
        $st->execute($user);
    }
    public static function findByUsername(String $username):?Utilisateur
    {
        $st=$GLOBALS["pdo"]->prepare("
        SELECT * FROM user WHERE username=:username
        ");
        $st->bindValue("username",$username);
        $st->execute();
        $userArray=$st->fetch();
        if($userArray){
            return new Utilisateur($userArray);

        }
        else
        {
            throw new RuntimeException("User not found");
        }

    }
    public function login():void
    {
        $user=Utilisateur::findByUsername($this->username);
        if($user)
        {
            //var_dump($user);
            if($user->password==$this->password)
            {
                $_SESSION["user"]=$user;
            }
           else throw new RuntimeException("mot de passe incorrect");
        }
    }
    public static function getLastAdded()
    {
        $id= $GLOBALS["pdo"]->lastInsertId();
        return Utilisateur::get($id);
    }
}