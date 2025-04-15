<?php
include 'BookCalls.php';

$booksearch = new BookCalls();

$booksearch->set_searchRequest("the+lord+of+the+rings");
$booksearch->getBooks();
?>