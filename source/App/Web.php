<?php

namespace Source\App;

use League\Plates\Engine;

class Web
{
    private $view;

    public function __construct($router)
    {
        $this->view = Engine::create(__DIR__ . "/../../theme","php");
        
    }

    public function home(array $data)
    {
        echo $this->view->render("home",[
            "title"=>"HOME | Desenvolvimento Comdata",
            
        ]);
    }
}