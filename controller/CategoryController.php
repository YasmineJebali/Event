<?php

class CategoryController
{
    public function findMany()
    {
        try {
            // count how many event a category have
            return DataBase::connect()->query("SELECT * FROM `category`");
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function findOne($id)
    {
        try {
            return DataBase::connect()->query("SELECT * FROM `category` WHERE  `_uid`='$id'");
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function store(Category $req)
    {
        try {
            DataBase::connect()->prepare("INSERT INTO `category`(`_uid`,`name`) VALUES (NULL, ?)")->execute([$req->getname()]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function update(Category $req, $id)
    {
        try {
            DataBase::connect()->prepare("UPDATE `category` SET `name`=? WHERE `_uid`=?")->execute([$req->getname(), $id]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            DataBase::connect()->prepare("DELETE FROM `category` WHERE `_uid`=?")->execute([$id]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
