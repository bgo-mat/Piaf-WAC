<?php

use user\User;
use message\Message;

include "../model/user.php";
include "../model/message.php";


header("Content-type: application/json");

if (isset($_SERVER['HTTP_REFERER'])) {
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');


    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
        header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, OPTIONS");
    }

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    }


    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
            header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
        }

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
            header("Access-Control-Allow-Headers: Accept, Content-Type,
             Content-Length, Accept-Encoding, X-CSRF-Token, Authorization");
        }
        exit(0);
    }
}

$RequestData = json_decode(file_get_contents("php://input"), true);

$token = isset($RequestData['token']) ? $RequestData['token'] : '';
$idOther = isset($RequestData['idOther']) ? $RequestData['idOther'] : '';
$message = isset($RequestData['message']) ? $RequestData['message'] : '';


$userMod = new User();
$messMod = new Message();

$userMod->tokenConnexion = json_decode($token);
$user_id = $userMod->findUserWithToken();
$id_user = $user_id[0]['user_id'];

$messMod->insertMessage($id_user, $idOther, $message);

echo json_encode(true);
