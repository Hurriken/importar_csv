<?php
define("DATA_LAYER_CONFIG", [
   "driver" => "pgsql",
   "host" => "localhost",
   "port" => "5432",
   "dbname" => "bd_itau",
   "username" => "sammy",
   "passwd" => "sammy",
//    "options" => [
//        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
//        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
//        PDO::ATTR_CASE => PDO::CASE_NATURAL
//    ],
]);

define("ROOT", "http://local.importarcsv.com.br");

define("CONF_SMTP_MAIL",[
    "host" => "",
    "port" => "",
    "user" => "",
    "pass" => "",
    "from_name" => "INSERIR O SEU NOME",
    "from_email" => "INSERIR O SEU E-MAIL"
]);

function url(string $uri = null):string
{
    if($uri){
        return ROOT . "/{$uri}";
    }

    return ROOT;
}

function asset(string $uri=null):string
{
    if($uri){
        return ROOT."/vendor/almasaeed2010/adminlte/{$uri}";
    }

    return ROOT."/vendor/almasaeed2010/adminlte/";
}