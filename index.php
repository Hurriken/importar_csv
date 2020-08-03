<?php
require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(ROOT);

/*
* Controllers
*/
$router->namespace("Source\App");

/* WEB
* home
*/
$router->group(null);
$router->get("/", "Web:home","web.home");

/* JAR
* home
* importar
*/
$router->group("jar");
$router->get("/", "Jar:home", "jar.home");
$router->post("/importar", "Jar:importar", "jar.importar");


$router->group("teste");
$router->get("/",function($data){
    echo "teste" . PHP_EOL;
    
    phpinfo();

});

/*
* ERROS
*/
$router->group("ooops");
$router->get("/{errcode}",function($data){
    echo "<h1>Erro {$data["errcode"]}</h1>";
});

$router->dispatch();

if($router->error()){
    
    $router->redirect("/ooops/{$router->error()}");
}