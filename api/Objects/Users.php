<?php

include_once 'validate.php';

class Users extends Validate{
    
    private $conn;

    private $table_name = "applicants";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    
    private function rucfirst($str, $encoding = 'UTF8')
    {
        return
            mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding) .
            mb_substr($str, 1, mb_strlen($str, $encoding), $encoding);
    }

    public function get($params)
    {
        $token_info = Validate::is_valid($params['access_token']);
        if ($token_info["status"])
        {
            if (isset($params["id"])){
                $query = "SELECT applicants.id, applicants.surname, applicants.name, 
                applicants.patronymic, applicants.gender, 
                CASE
                    WHEN applicants.gender = 1 THEN 'Мужской'
                    WHEN applicants.gender = 0 THEN 'Женский'
                END AS gender,
                applicants.birthday,
                universities.id as university_id,  universities.name as university,
                applicants.speciality_id, specialities.name as speciality,
                applicants.city_id, cities.name as city,
                applicants.status_id, status.status_name as status,
                applicants.address, applicants.phone, applicants.photo, applicants.email
                 FROM " . $this->table_name . "
                 
                 INNER JOIN universities
                 ON  applicants.education_id=universities.id
                 
                 INNER JOIN cities 
                 ON applicants.city_id=cities.id

                 INNER JOIN specialities
                 ON specialities.id=applicants.speciality_id

                 INNER JOIN status
                 ON applicants.status_id = status.id

                 WHERE applicants.id=?";
                $stmt = $this->conn->prepare($query);
                try{$stmt->bindParam(1, $params["id"]);
                    $stmt->execute();
                    if ($stmt->rowCount() > 0){
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        $row['photo'] = base64_encode(stream_get_contents($row['photo']));
                        $response = array("status" => true, "count" => 1, "response" => $row);
                        echo json_encode($response);
                        http_response_code(200);
                    }
                    else{
                        echo json_encode(array("count" => 0, "response" => array()));
                        http_response_code(401);
                    }
                } catch(Exception $e){
                    echo json_encode(array("count" => 0, "response" => $e));
                    http_response_code(401);
                }
                
            }else{
                echo json_encode(array(
                    "status" => false,
                    "message" => "id является обязательным параметром"
                ));
            }
        }
        else{
            echo json_encode($token_info);
        }
    }

    public function search($params)
    {
        if (isset($params['access_token']))
        {
            $token_info = Validate::is_valid($params['access_token']);
            
            $query = "";
            $offset = 0;
            if ($token_info["status"]){
                if (isset($params["q"]))
                {
                    if (isset($params['offset']))
                    {
                        if (is_numeric($params['offset']) && (int)$params['offset'] >= 0)
                            $offset = (int)$params['offset'];
                        else{
                            echo json_encode(array(
                                "status" => false,
                                "message" => "Параметр offset может быть только положительным целым числом"
                            ));
                            http_response_code(401);
                            return;
                        }
                    }
                    
                    $words = explode(" ", $params['q']);
                    if (count($words) > 1)
                    {
                        // если два слова
                        $query = "SELECT id, first_name, last_name, email, date_reg FROM " . $this->table_name . " 
                            WHERE (first_name = :first_name AND last_name = :last_name) OR (first_name = :last_name 
                                AND last_name = :first_name) OFFSET :offset";
                        $stmt = $this->conn->prepare($query);
                        $first_word = htmlspecialchars($this->rucfirst($words[0]));
                        $second_word = htmlspecialchars($this->rucfirst($words[1]));
                        $stmt->bindParam(":first_name", $first_word);
                        $stmt->bindParam(":last_name", $second_word);
                        $stmt->bindParam(":offset", $offset);
                        $stmt->execute();
                        $count = $stmt->rowCount();
                        $response = $stmt->fetch(PDO::FETCH_ASSOC);
                        echo json_encode(array(
                            "status" => true,
                            "count" => $count,
                            "response" => $response
                        ));
                        http_response_code(200);
                    }
                    else if (count($words) == 1){
                        $query = "SELECT id, first_name, last_name, email, date_reg FROM " . $this->table_name . 
                            " WHERE (first_name = :word) OR (last_name = :word) ORDER BY id ASC OFFSET :offset";
                        $stmt = $this->conn->prepare($query);
                        $word = htmlspecialchars($this->rucfirst($words[0]));
                        $stmt->bindParam(":word", $word);
                        $stmt->bindParam(":offset", $offset);
                        $stmt->execute();
                        $count = $stmt->rowCount();
                        $response = $stmt->fetch(PDO::FETCH_ASSOC);
                        echo json_encode(array(
                            "status" => true,
                            "count" => $count,
                            "response" => $response
                        ));
                        http_response_code(200);
                    }
                    else{
                        echo json_encode(array(
                            "status" => false,
                            "message" => "q не может быть пустым"
                        ));
                        http_response_code(401);
                    }
                }
                else{
                    echo json_encode(array(
                        "status" => false,
                        "message" => "q является обязательным параметром"
                    ));
                    http_response_code(401);
                }
            }
            else{
                echo json_encode($token_info);
            }
        }else{
            echo json_encode(array(
                "status" => false,
                "message" => "access_token является обязательным параметром"
            ));
            http_response_code(401);
        }
    }

}


?>