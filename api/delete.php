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

//$data = json_decode(file_get_contents("php://input"));

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $applicant->name          = $_POST['name'];
    $applicant->surname       = $_POST['surname'];
    $applicant->patronymic    = $_POST['patronymic'];
    $applicant->birthday      = $_POST['birthday'];
    $applicant->gender        = $_POST['gender'];
    $applicant->education_id  = $_POST['education_id'];
    $applicant->speciality_id = $_POST['speciality_id'];
    $applicant->status_id     = $_POST['status_id'];
    $applicant->city_id       = $_POST['city_id'];
    $applicant->address       = $_POST['address'];
    $applicant->phone         = $_POST['phone'];
    $applicant->email         = $_POST['email'];
    $applicant->password      = $_POST['password'];
    if ($applicant->gender)
        $applicant->gender = 1;
    else
        $applicant->gender = 0;
    
    if (isset($_FILES['applicant_photo']) && $_FILES['applicant_photo']['error'] === UPLOAD_ERR_OK) {
        try{
            $image = $_FILES['applicant_photo']['tmp_name'];
            $image_contents = file_get_contents($image);
            $applicant->photo = $image_contents;
            unlink($_FILES['applicant_photo']['tmp_name']);

        } catch(Exception $e){
            echo json_encode(array("status" => false, "message" => $e, "msg2" => "херня"));
        }
    }

// $applicant->name          = $data->name;
// $applicant->surname       = $data->surname;
// $applicant->patronymic    = $data->patronymic;
// $applicant->birthday      = $data->birthday;
// $applicant->gender        = $data->gender;
// $applicant->education_id  = $data->university;
// $applicant->speciality_id = $data->speciality;
// $applicant->status_id     = $data->status;
// $applicant->city_id       = $data->city;
// $applicant->address       = $data->address;
// $applicant->phone         = $data->phone;
// $applicant->photo         = array_values(get_object_vars($data->photo));
// $applicant->photo         = $db->quote(pack("C*", $applicant->photo));
// $applicant->email         = $data->email;
// $applicant->password      = $data->password;

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
            else if (empty($applicant->surname))
                $msg = "Фамилию не передали";
            else if (empty($applicant->patronymic))
                $msg = "Отчество не передали";
            else if (empty($applicant->birthday))
                $msg = "ДР не передали";
            else if (empty($applicant->gender))
                $msg = "Пол не передали";
            else if (empty($applicant->education_id))
                $msg = "Универ не передали";
            else if (empty($applicant->speciality_id))
                $msg = "Спец. не передали";
            else if (empty($applicant->status_id))
                $msg = "Соц. пол. не передали";
            else if (empty($applicant->city_id))
                $msg = "Город не передали";
            else if (empty($applicant->address))
                $msg = "Адрес не передали";
            else if (empty($applicant->email))
                $msg = "email не передали";
            else if (empty($applicant->photo))
                $msg = "фото не передали";
            else if (empty($applicant->password))
                $msg = "пароль не передали";
            else if ($email_exists)
                $msg = "email уже существует";
            else if (empty($applicant->phone))
                $msg = "телефон не передали";
            echo json_encode(array("status"=>false, "message"=>$msg));
        }
    }
    else echo json_encode(array("status" => false, "message" => "вход запрещен"))
?>