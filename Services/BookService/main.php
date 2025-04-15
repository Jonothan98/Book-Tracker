<?php
include 'BookCalls.php';

$booksearch = new BookCalls();

$booksearch->setSearchRequest("the+lord+of+the+rings");
$booksearch->setWorkKey("OL45804W");
$booksearch->getBooks();
$booksearch->getBook()
?>