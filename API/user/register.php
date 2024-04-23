<?php

// require_once __DIR__.'/../DatabaseManager.php';

// $databaseManager = new DatabaseManager();
// $jsondata = file_get_contents('php://input');
// $data = json_decode($jsondata, true);
// $method = $_SERVER['REQUEST_METHOD'];

// header('Content-Type: application/json');

// if ($method == 'POST') {
//     if (!isset($data['firstname']) || !isset($data['lastname']) || !isset($data['mail']) || !isset($data['password'])) {
//         http_response_code(400); // Set HTTP response code
//         echo json_encode(array("success" => false, "error" => "Invalid request"));
//         exit;
//     }

//     $firstname = $data['firstname'];
//     $lastname = $data['lastname'];
//     $mail = $data['mail'];
//     $password = $data['password'];
//     $created = $databaseManager->createUser($firstname, $lastname, $mail, $password);

//     if ($created) {
//         http_response_code(201); // Resource created
//         echo json_encode(array("success" => true, "message" => "User create"));
//     } else {
//         http_response_code(500); // Internal Server Error
//         echo json_encode(array("success" => false, "error" => "User not created"));
//     }
// } else {
//     http_response_code(405); // Method Not Allowed
//     echo json_encode(array("success" => false, "error" => "Invalid request method"));
// }
