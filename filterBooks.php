<?php

require_once 'class_book.php';

$_POST = json_decode(array_keys($_POST)[0], true);

$filteredBooks = (new Book())->filter($_POST['search']);

echo json_encode([
    "books" => $filteredBooks
]);