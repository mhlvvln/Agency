<?php
session_start();
/*header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");*/

include_once "Router.php";

function returnNameUserOrOrg(){
    if ($_SESSION['user']['type'] == 'applicant')
        return $_SESSION['user']['name'];
    else
        return $_SESSION['organization']['name'];
}

function returnSelfHref(){
    if ($_SESSION['user']['type'] == 'applicant')
        return "http://" . $_SERVER['SERVER_NAME'] . "/applicant?id=" . $_SESSION['user']['id'];
    else return "http://" . $_SERVER['SERVER_NAME'] . "/organization?id=" . $_SESSION['organization']['id'];
}

$router = new Router();

/*



    * - РЕГИСТРАЦИЯ ПОЛЬЗОВАТЕЛЕЙ И ОРГАНИЗАЦИЯ
    * - ДИНАМИЧЕСКИ НИЧЕГО НЕ ПОДГРУЖАЕТСЯ


*/

$router->addRoute('GET', '/registration', function () {
    if ($_SESSION["user"])
        header("Location: http://" . $_SERVER['SERVER_NAME'] .  "/applicant");
    else if ($_SESSION['organization'])
        header("Location: http://" . $_SERVER['SERVER_NAME'] .  "/organization");
    $html = file_get_contents("Макеты/delete.php");
    echo $html;
});


/*

    * - АВТОРИЗАЦИЯ ПОЛЬЗОВАТЕЛЕЙ
    * - ДИНАМИЧЕСКИ НИЧЕГО НЕ ПОДГРУЖАЕТСЯ

*/

$router->addRoute('GET', '/auth', function(){
    if ($_SESSION["user"])
        header("Location: http://" . $_SERVER['SERVER_NAME'] .  "/applicant");
    else if ($_SESSION['organization'])
        header("Location: http://" . $_SERVER['SERVER_NAME'] .  "/organization");
    $html = file_get_contents("Макеты/auth.php");
    echo $html;

});


/*


    * - ПОЛЬЗОВАТЕЛЬ СОИСКАТЕЛЬ
    * - ДИНАМИЧЕСКАЯ ИНФОРМАЦИЯ ПО id


*/


$router->addRoute('GET', '/applicant', function () {
    if (!$_SESSION['user'])
        header("Location: http://" . $_SERVER['SERVER_NAME'] .  "/registration");
    $id = isset($_GET['id']) ? $_GET['id'] : $_SESSION['user']['id'];
    require_once 'Макеты/profile_user.php';
    
    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    //                                                                                                          !!
    //    echo '<img src="data:image/jpeg;base64,'.$_SESSION['user']['photo'].'" width="450" height="120"/>';   !!
    //                                                                                                          !!
    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! 
});


$router->addRoute('GET', '/delete', function (){
    require_once 'Макеты/delete.php';
});

$router->addRoute('GET', '/logout', function(){
    require_once 'logout.php';
});

$router->dispatch();

?>