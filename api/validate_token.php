<?php

header("Access-Control-Allow-Origin: http://localhost/validate_token.php/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// Требуется для декодирования JWT
include_once "config/core.php";
include_once "libs/firebase/php-jwt/BeforeValidException.php";
include_once "libs/firebase/php-jwt/ExpiredException.php";
include_once "libs/firebase/php-jwt/SignatureInvalidException.php";
include_once "libs/firebase/php-jwt/JWT.php";
include_once "libs/firebase/php-jwt/Key.php";

use \Firebase\JWT\JWT;
use \Firebase\JWT\Key; 


$data = json_decode(file_get_contents("php://input"));

$jwt = isset($data->access_token) ? $data->access_token : "";

if ($jwt){
    try{
        $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
        http_response_code(200);
        echo json_encode(array(
            "message" => "Добро",
            "data" => $decoded->data
        ));
    } catch(Exception $e){
        http_response_code(401);
        echo json_encode(array(
            "Message" => "Неверный токен",
            "Err" => $e->getMessage()
        ));
    }
}
else{
    http_response_code(401);
    // Сообщим пользователю что доступ запрещен
    echo json_encode(array("message" => "Доступ запрещён"));
}
?>