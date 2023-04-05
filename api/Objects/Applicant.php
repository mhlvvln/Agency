<?php

class Applicant
{
    private $conn;
    private $table_name = "applicants";

    public $id;
    public $name;
    public $surname;
    public $patronymic;
    public $birthday;
    public $gender;
    public $education_id;
    public $speciality_id;
    public $status_id;
    public $city_id;
    public $address;
    public $phone;
    public $email;
    public $password;
    public $photo;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function create()
    {
        try{
            $query = "INSERT INTO applicants
            (  name, surname, patronymic, birthday,
                gender, education_id, speciality_id,
                status_id, city_id, address, phone,
                email, password, photo) 
            VALUES 
            (  :name, :surname, :patronymic, :birthday,
                :gender, :education_id, :speciality_id,
                :status_id, :city_id, :address, :phone,
                :email, :password, :photo)";
            
            // готовим запрос
            $stmt = $this->conn->prepare($query);
            // инъекции
            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->surname = htmlspecialchars(strip_tags($this->surname));
            $this->patronymic = htmlspecialchars(strip_tags($this->patronymic));
            $this->birthday = htmlspecialchars(strip_tags($this->birthday));
            $this->gender = htmlspecialchars(strip_tags($this->gender));
            $this->education_id = htmlspecialchars(strip_tags($this->education_id));
            $this->speciality_id = htmlspecialchars(strip_tags($this->speciality_id));
            $this->status_id = htmlspecialchars(strip_tags($this->status_id));
            $this->city_id = htmlspecialchars(strip_tags($this->city_id));
            $this->address = htmlspecialchars(strip_tags($this->address));
            $this->phone = htmlspecialchars(strip_tags($this->phone));
            $this->email = htmlspecialchars(strip_tags($this->email));
            //$this->photo = $this->photo;

            $this->password = htmlspecialchars(strip_tags($this->password));
            $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
            
            // Привязываем значения
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":surname", $this->surname);
            $stmt->bindParam(":patronymic", $this->patronymic);
            $stmt->bindParam(":birthday", $this->birthday);
            $stmt->bindParam(":gender", $this->gender);
            $stmt->bindParam(":education_id", $this->education_id);
            $stmt->bindParam(":speciality_id", $this->speciality_id);
            $stmt->bindParam(":status_id", $this->status_id);
            $stmt->bindParam(":city_id", $this->city_id);
            $stmt->bindParam(":address", $this->address);
            $stmt->bindParam(":phone", $this->phone);
            $stmt->bindParam(":email", $this->email);
            //$this->photo = pack('C*', ...$this->photo);
            //$this->photo = pg_escape_bytea($this->photo);
            $stmt->bindParam(":photo", $this->photo, PDO::PARAM_LOB);

            $stmt->bindParam(":password", $password_hash);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if ($stmt->execute()){
                return true;
            }
            else{
                //echo json_encode(array("status"=>false, "response"=>$this->conn->errorIndo()));
                return false;
            }
        }catch(Exception $e){
            echo json_encode(array("status" => false, "message" => $e));
            die();
        }
    }   

    function emailExists(){
        $query = "SELECT id, name, surname, patronymic, 
                    birthday, gender, education_id, 
                    speciality_id, status_id, city_id,
                    address, phone, email, photo, phone, password
                FROM  applicants
                    WHERE email = :email LIMIT 1";
        
        $stmt = $this->conn->prepare($query);

        $this->email=htmlspecialchars(strip_tags($this->email));

        $stmt->bindParam(":email", $this->email);

        $stmt->execute();

        $num = $stmt->rowCount();
        if ($num > 0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $row["id"];
            $this->name = $row["name"];
            $this->surname = $row["surname"];
            $this->patronymic = $row["patronymic"];
            $this->birthday = $row["birthday"];
            $this->gender = $row["gender"];
            $this->education_id = $row["education_id"];
            $this->speciality_id = $row["speciality_id"];
            $this->status_id = $row["status_id"];
            $this->city_id = $row["city_id"];
            $this->address = $row["address"];
            $this->phone = $row["phone"];
            $this->email = $row['email'];
            $this->photo = base64_encode(stream_get_contents($row['photo']));
            $this->password = $row["password"];
            return true;
        }
        return false;
    }
}
?>