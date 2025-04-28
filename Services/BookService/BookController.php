<?php
header("Content-Type: application/json");
include 'BookCalls.php';

$bookCalls = new BookCalls();

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        handleGet($input);
        break;
    default:
        echo json_encode(['message' => 'Invalid request method']);
        break;
}
function handleGet($input)
{
    global $bookCalls;
    if ($input == null) {
        echo json_encode(['message' => 'recieved null json']);
    } elseif (array_key_exists('key', $input)) {
        $bookCalls->getBooks($input['key']);
    } elseif (array_key_exists('search', $input)) {
        $bookCalls->searchBooks($input['search']);
    } else {
        echo json_encode(['message' => 'invalid request']);
    }

}