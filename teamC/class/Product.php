<?php
require_once __DIR__ . '/DbData.php';

class Product extends DbData
{
    public function getItems($genre)
    {
        $sql = "select * from users where genre = ?";
        $stmt = $this->query($sql, [$genre]);
        $items = $stmt->fetchAll();
        return $items;
    }

    public function getItem($user_id)
    {
        $sql = "select * from users where user_id = ?";
        $stmt = $this->query($sql, [$user_id]);
        $item = $stmt->fetch();
        return $item;
    }
}