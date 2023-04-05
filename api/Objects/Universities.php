<?php

include_once 'validate.php';

class Universities extends Validate{
    
    private $conn;

    private $table_name = "universities";

    public function __construct($db){
        $this->conn = $db;
    }

    private function addUniversity($name){
        $query = "INSERT INTO universities (name) VALUES (:u_name)";
        $stmt = $this->conn->prepare($query);
        $name = htmlspecialchars($name);
        $stmt->bindParam(":u_name", $name);
        $stmt->execute();
        return $this->conn->lastInsertId();

    }

    public function add($params){
        if (isset($params['access_token']))
        {
            $token_info = Validate::is_valid($params['access_token']);
            if ($token_info["status"] == true)
            {
                if (isset($params["name"])){
                    if (mb_strlen($params["name"], 'UTF-8') > 10 && mb_strlen($params["name"], 'UTF-8') < 71){
                
                        $id = $this->addUniversity($params["name"]);
                        if (is_numeric($id)){
                            $response = array("status" => true, "count" => 1, "id" => $id);
                            echo json_encode($response);
                            http_response_code(200);
                        }else{
                            echo json_encode(array(
                                "status" => false,
                                "message" => "Ошибка. " . $id 
                            ));
                            http_response_code(401);
                        }
                    }else{
                        echo json_encode(array(
                            "status" => false,
                            "message" => "Название университета должно иметь от 4 до 25 символов"
                        ));
                        http_response_code(401);
                    }
                }else{
                    echo json_encode(array(
                        "status" => false,
                        "message" => "name является обязательным параметром"
                    ));
                    http_response_code(401);
                }
            }else{
                echo json_encode(array(
                    "status" => false,
                    "message" => "Передан неверный токен"
                ));
                http_response_code(401);
            }
        }
        else{
            echo json_encode(array(
                "status" => false,
                "message" => "access_token является обязательным параметром"
            ));
            http_response_code(401);
        }
    }
}


?>
