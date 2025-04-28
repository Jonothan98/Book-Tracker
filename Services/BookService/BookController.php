<?php
header("Content-Type: application/json");
include 'BookCalls.php';

$bookCalls = new BookCalls();

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'),true);

switch($method){
    case 'GET':
        handleGet($input);
        break;
    case 'POST':
        handelPost($input);
        break;
    case 'PUT':
        handlePut($input);
        break;
    case 'DELETE':
        handleDelete($input);
        break;
    default:
        echo json_encode(['message' => 'Invalid request method']);
        break;
}
    function handleGet($input){
        global $bookCalls;
        $bookCalls->setWorkKey($input['key']);
        $bookCalls->getBooks();
    }

?>