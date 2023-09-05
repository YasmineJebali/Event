<?php

class EventController
{
    public function findMany()
    {
        try {
            return DataBase::connect()->query("SELECT `event`.*, `category`.name FROM `event` JOIN `category` ON `event`.`category_id` = `category`.`_uid`");
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function findOne($id)
    {
        try {
            return DataBase::connect()->query("SELECT * FROM `event` WHERE  `_uid`='$id'");
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function store(Event $req)
    {
        try {
            DataBase::connect()->prepare("INSERT INTO `event`(`_uid`, `description`, `date`, `category_id`) VALUES (NULL, ?, ?, ?)")->execute([$req->getdescription(), $req->getdate(), $req->getCategory_id()]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function update(Event $req, $id)
    {
        try {
            DataBase::connect()->prepare("UPDATE `event` SET `description`=?, `date`=?, `category_id=?` WHERE `_uid`=?")->execute([$req->getdescription(), $req->getdate(), $req->getCategory_id(), $id]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            DataBase::connect()->prepare("DELETE FROM `event` WHERE `_uid`=?")->execute([$id]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
