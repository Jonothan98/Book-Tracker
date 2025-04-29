<?php
include 'BookCalls.php';
include_once'BookData.php';

$booksearch = new BookCalls();

$araryOfKeys = array("OL45804W", "OL98459W");

// $booksearch->searchBooks("the+lord+of+the+rings");
// $booksearch->getBooks($araryOfKeys);

$data = new BookData("test", "title", "author","cover");
echo json_encode($data);
?>