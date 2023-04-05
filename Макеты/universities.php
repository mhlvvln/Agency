<?php

header('Access-Control-Allow-Origin: *');
$array = array(
	array("id" => 1, "name" => "John"),
	array("id" => 2, "name" => "Diogen"),
	array("id" => 3, "name" => "Denis")
);

echo json_encode($array);

?>