<?php


namespace classes\repositories;
require_once __DIR__."/../../Connection.php";

abstract class AbstractRepository
{
    abstract protected function getTableName():string;
    public function get(int $id):?array
    {
        return $GLOBALS["pdo"]->query("SELECT * FROM ".$this->getTableName()." WHERE id=".$id)->fetch();
    }

    public function getAll():?array
    {
        return $GLOBALS["pdo"]->query("SELECT * FROM ".$this->getTableName())->fetchAll();
    }
    public function getLastAdded()
    {
        $id= $GLOBALS["pdo"]->lastInsertId();
        return $this->get($id);
    }
    public function delete(int $id)
    {
        $deletedItem=$this->get($id);
        $GLOBALS["pdo"]->query("DELETE FROM ".$this->getTableName().' WHERE id='.$id);
        return $deletedItem;
    }
}