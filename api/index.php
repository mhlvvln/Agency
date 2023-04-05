<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json");

include_once "Router.php";
include_once "config/database.php";
//include_once "objects/Users.php";
//include_once "objects/Universities.php";
//include_once "objects/Specialities.php";

$router = new Router();


$router->addRoute('GET', '/api/users.get', function () {
    include_once "objects/Users.php";
    $database = new Database();
    $db = $database->getConnection();
    $users = new Users($db);
    $users->get($_GET);

});

$router->addRoute('GET', '/api/users.search', function () {
    include_once "objects/Users.php";
    $database = new Database();
    $db = $database->getConnection();
    $users = new Users($db);
    $users->search($_GET);

});

$router->addRoute('GET', '/api/universities.add', function () {
    include_once "objects/Universities.php";
    $database = new Database();
    $db = $database->getConnection();
    $universities = new Universities($db);
    //http_response_code(401);
    //$universities->add($_GET);

});

$router->addRoute('GET', '/api/specialities.add', function () {
    include_once "objects/Specialities.php";
    $database = new Database();
    $db = $database->getConnection();
    $specialities = new Specialities($db);
    //http_response_code(401);
    //$specialities->add($_GET);

});

$router->addRoute('GET', '/api/cities.add', function () {
    include_once "objects/Cities.php";
    $database = new Database();
    $db = $database->getConnection();
    $cities = new Cities($db);
    //$cities->add($_GET);
    //http_response_code(401);

});


$router->addRoute('GET', '/api/helper.getInfoForUserReg', function () {
    include_once "objects/Helper.php";
    $database = new Database();
    $db = $database->getConnection();
    $help = new Helper($db);
    $help->getInfoForUserReg();
});


$router->dispatch();

?>