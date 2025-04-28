<?php
include 'BookCalls.php';

$booksearch = new BookCalls();

$araryOfKeys = array("OL45804W", "OL98459W");

$booksearch->searchBooks("the+lord+of+the+rings");
$booksearch->getBooks($araryOfKeys);
?>