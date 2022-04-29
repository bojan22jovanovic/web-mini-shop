<?php

require_once 'class_database.php';

class Book extends Database
{
    public $db;

    public function __construct()
    {
        $this->db = $this->connect();
    }


    public function all()
    {
        $stm = $this->db->prepare("SELECT * FROM books_shop");
        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_OBJ);
    }


    public function allAdd()
    {
        $stm = $this->db->prepare("SELECT books_shop.id AS shop_id, books_cart.id AS cart_id, name, image, price, book_id, quantity FROM books_shop RIGHT JOIN books_cart ON books_shop.id = books_cart.book_id");
        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_OBJ);
    }


    public function filter($search)
    {
        $sql = "SELECT * FROM books_shop WHERE name LIKE '%" .$search. "%'" ;
        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

}
