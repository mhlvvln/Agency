<?php

include_once __DIR__ . "/config/core.php";
include_once __DIR__ . "/libs/firebase/php-jwt/BeforeValidException.php";
include_once __DIR__ . "/libs/firebase/php-jwt/ExpiredException.php";
include_once __DIR__ . "/libs/firebase/php-jwt/SignatureInvalidException.php";
include_once __DIR__ . "/libs/firebase/php-jwt/JWT.php";
include_once __DIR__ . "/libs/firebase/php-jwt/Key.php";

use \Firebase\JWT\JWT;
use \Firebase\JWT\Key; 

class Validate{

    protected static function is_valid($jwt){
        include_once __DIR__ . "/config/core.php";
        if ($jwt){
            try{
                $key = "PI-21G_Vavilin";
                $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
                return array("status" => true, "user" => $decoded->data);
            } catch(Exception $e){
                return array(
                    "status" => false,
                    "message" => "Передан неверный токен",
                );
            }
        }
        else{
            http_response_code(401);
            // Сообщим пользователю что доступ запрещен
            return array(
                "message" => "Метод требует передачи токена",
                "status" => false,
            );
        }
    }
}

?>