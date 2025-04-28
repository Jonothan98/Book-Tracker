<?php
include 'BookCalls.php';

$booksearch = new BookCalls();

$araryOfKeys = array("OL45804W", "OL98459W");

$booksearch->setSearchRequest("the+lord+of+the+rings");
$booksearch->setWorkKey("OL45804W");
$booksearch->searchBooks();
$booksearch->getBooks()
?>