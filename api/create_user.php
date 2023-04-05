<?php

// заголовки

header("Access-Control-Allow-Origin: http://Agency/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "./Config/Database.php";
include_once "./Objects/Applicant.php";

$database = new Database();
$db = $database->getConnection();

$applicant = new Applicant($db);

$data = json_decode(file_get_contents("php://input"));

if (!$data->gender)
    $data->gender = 0;
else
    $data->gender = 1;

$applicant->name          = $data->name;
$applicant->surname       = $data->surname;
$applicant->patronymic    = $data->patronymic;
$applicant->birthday      = $data->birthday;
$applicant->gender        = $data->gender;
$applicant->education_id  = $data->university;
$applicant->speciality_id = $data->speciality;
$applicant->status_id     = $data->status;
$applicant->city_id       = $data->city;
$applicant->address       = $data->address;
$applicant->phone         = $data->phone;
$applicant->photo         = array_values(get_object_vars($data->photo));
$applicant->photo         = $db->quote(pack("C*", $applicant->photo));
$applicant->email         = $data->email;
$applicant->password      = $data->password;

$email_exists = $applicant->emailExists();

if (!empty($applicant->name)                   &&
    !empty($applicant->surname)                &&
    !empty($applicant->birthday)               && // отчества может не быть, его не проверяем
    //!empty($applicant->gender)                 &&
    !empty($applicant->education_id)           &&
    !empty($applicant->speciality_id)          &&
    !empty($applicant->status_id)              &&
    !empty($applicant->city_id)                &&
    !empty($applicant->address)                &&
    !empty($applicant->email)                  &&
    !empty($applicant->photo)                  &&
    !empty($applicant->password)               &&
    !empty($applicant->phone)                  &&
    //!empty($password_confirm)                  &&
    !empty($applicant->email)                  &&
    $email_exists != true                         && // если почта уже существует
    $applicant->create()
    ){
        //$applicant->create();
        http_response_code(200);
        echo json_encode(array("status"=>true, "message"=>"Пользователь был создан"));
    }
    else{
        http_response_code(401);
        $msg = "";
        if (empty($applicant->name))
            $msg = "Имя не передали";
        if (empty($applicant->surname))
            $msg = "Фамилию не передали";
        if (empty($applicant->patronymic))
            $msg = "Отчество не передали";
        if (empty($applicant->birthday))
            $msg = "ДР не передали";
        if (empty($applicant->gender))
            $msg = "Пол не передали";
        if (empty($applicant->education_id))
            $msg = "Универ не передали";
        if (empty($applicant->speciality_id))
            $msg = "Спец. не передали";
        if (empty($applicant->status_id))
            $msg = "Соц. пол. не передали";
        if (empty($applicant->city_id))
            $msg = "Город не передали";
        if (empty($applicant->address))
            $msg = "Адрес не передали";
        if (empty($applicant->email))
            $msg = "email не передали";
        if (empty($applicant->photo))
            $msg = "фото не передали";
        if (empty($applicant->password))
            $msg = "пароль не передали";
        if ($email_exists)
            $msg = "email уже существует";
        echo json_encode(array("status"=>false, "message"=>$msg));
    }
?>