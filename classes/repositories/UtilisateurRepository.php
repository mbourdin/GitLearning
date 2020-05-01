<?php
namespace classes\repositories;
use entity\Utilisateur;

class UtilisateurRepository extends AbstractRepository
{
    protected function getTableName(): string
    {
        return  "user";
    }

    public function updatePrivileges(Utilisateur $user)
    {   $utilisateur=$user->toArray();
        $GLOBALS["pdo"]->query("
        UPDATE user
        SET privileges = '".$utilisateur["privileges"].
        "' WHERE id=".$user->id);
    }
    public function add(array $user)
    {   $user["password"]=md5($user["password"]);
        $st=$GLOBALS["pdo"]->prepare(
            "INSERT INTO user (username , email,password ) 
            VALUES (:username,:email,:password)"
        );
        $st->execute($user);
    }
    public function edit(int $id,array $user)
    {
        $st=$GLOBALS["pdo"]->prepare("
        UPDATE user
        SET username=:username,
        email=:email
        WHERE id=
        ".$id);
        $st->execute($user);
    }
    public function findByUsername(String $username):?Utilisateur
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
            throw new \RuntimeException("User not found");
        }

    }
    public function login(Utilisateur $utilisateur):void
    {
        $user=$this->findByUsername($utilisateur->username);
        if($user)
        {
            //var_dump($user);
            if($user->password==$utilisateur->password)
            {
                $_SESSION["user"]=$user;
            }
           else throw new \RuntimeException("mot de passe incorrect");
        }
    }
}