<?php

class Helper{
    private $conn;
    

    public function __construct($db){
        $this->conn = $db;
    }

    function getInfoForUserReg(){
        $query = "SELECT 'university' as source, id, name FROM universities
            UNION ALL 
            SELECT 'speciality'  as source, id, name FROM specialities
            
            UNION ALL
            SELECT 'city' as source, id, name FROM cities
            
            UNION ALL
            SELECT 'status' as source, id, status_name as name FROM status

            UNION ALL
            SELECT 'company_type' as source, id, type FROM company_types
            
        ";
        
        $stmt = $this->conn->prepare($query);
        $result = $stmt->execute();
        if (!$result) {
            $errorInfo = $stmt->errorInfo();
            echo "Error code: " . $errorInfo[0] . "<br>";
            echo "Error message: " . $errorInfo[2] . "<br>";
        }
        if ($stmt->rowCount() > 0){
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $response = array("status" => true, "count" => count($row), "response" => $row);
            echo json_encode($response);
            http_response_code(200);
        }
        else{
            echo json_encode(array("count" => 0, "response" => array()));
            http_response_code(401);
        }
    }



}

?>