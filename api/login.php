<?php
$session_lifetime = 604800; // 7 суток
session_set_cookie_params($session_lifetime);
session_start();

// Заголовки
header("Access-Control-Allow-Origin: http://Agency/api/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// Здесь будет соединение с БД
include_once './Config/Database.php';
include_once './Objects/Applicant.php';

$database = new Database();
$db = $database->getConnection();

$applicant = new Applicant($db);

$data = json_decode(file_get_contents("php://input"));
$applicant->email = $data->email;
$email_exists = $applicant->emailExists();

include_once "config/core.php";
include_once "libs/firebase/php-jwt/BeforeValidException.php";
include_once "libs/firebase/php-jwt/ExpiredException.php";
include_once "libs/firebase/php-jwt/SignatureInvalidException.php";
include_once "libs/firebase/php-jwt/JWT.php";
use \Firebase\JWT\JWT;

if ($email_exists && password_verify($data->password, $applicant->password)){
    $token = array(
        "iss" => $iss,
        "aud" => $aud,
        "iat" => $iat,
        "nbf" => $nbf,
        "data" => array(
            "id" => $applicant->id,
            "name" => $applicant->name,
            "surname" => $applicant->surname,
            "patronymic" => $applicant->patronymic,
            "birthday" => $applicant->birthday,
            "gender" => $applicant->gender,
            "education_id" => $applicant->education_id,
            "speciality_id" => $applicant->speciality_id,
            "city_id" => $applicant->city_id,
            "status_id" => $applicant->status_id,
            "phone" => $applicant->phone,
            "email" => $applicant->email,
            //"photo" => $applicant->photo,
            "type" => "applicant",
        )
    );
    http_response_code(200);

    $jwt = JWT::encode($token, $key, 'HS256');

    $_SESSION['user'] = $token["data"];
    $_SESSION['user']['photo'] = $applicant->photo;
    $_SESSION['user']["access_token"] = $jwt;
    echo json_encode(
        array(
           //"arr" => $_SESSION['user']['photo'],
            "status" => true,
            "message" => "Успех",
            "access_token" => $jwt
        )
    );
} else{
    http_response_code(401);
    echo json_encode(array("status"=>false,"message"=>"Ошибка входа"));
}