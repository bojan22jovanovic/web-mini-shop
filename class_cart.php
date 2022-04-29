<?php

declare(strict_types = 1);

require_once 'class_database.php';

class Cart extends Database
{
/* ------------------------------------------------------------------------ */
    private $db;

    public function __construct()
    {
        $this->db = $this->connect();
    }


/* ------------------------------------------------------------------------ */
    /**
     * @param int $bookId
     * @return mixed
     */

    public function selectedBook(int $bookId)
    {
        $stm = $this->db->prepare("SELECT * FROM books_cart WHERE book_id = ?");
        $stm->execute([$bookId]);

        return $stm->fetch(PDO::FETCH_OBJ);
    }



/* ------------------------------------------------------------------------ */
    /**
     * @param int $bookId
     * @param int $quantity
     * @return bool
     */
    
    public function insertToCart(int $bookId, int $quantity = 1)
    {   
            $stm = $this->db->prepare("INSERT INTO books_cart(book_id, quantity) values(?, ?)");
            return $stm->execute([$bookId, $quantity]);
    }



/* ------------------------------------------------------------------------ */
    public function totalArticals()
    {
        $stm = $this->db->prepare("SELECT SUM(quantity) AS sum_q FROM books_cart");
        $stm->execute();
        return $stm->fetch(PDO::FETCH_OBJ);
    }



/* ------------------------------------------------------------------------ */
/**
 * @param int $cartId
 * @param int $quantity
 * @return bool
 */
public function updateQuantity(int $quantity, int $cartId)
{
    $stm = $this->db->prepare("UPDATE books_cart SET quantity = ? WHERE id = ?");
    return $stm->execute([$quantity, $cartId]);
}




public function deleteArtical(int $cartId)
{
    $stm = $this->db->prepare("DELETE FROM books_cart WHERE id = ?");
    return $stm->execute([$cartId]);
}


}

