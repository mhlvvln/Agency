<?php

error_reporting(E_ALL);

date_default_timezone_set("Europe/Moscow");

$key = "PI-21G_Vavilin";
$iss = "http://any-site.org";
$aud = $iss;
$unix_date = date_create();
$iat = date_timestamp_get($unix_date);
$nbf = $iat;
?>