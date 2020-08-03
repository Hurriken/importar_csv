<?php
namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Teste extends DataLayer
{
    public function __construct()
    {
        parent::__construct("teste",["nome","endereco","data_hora"],"id",false);
    }

    public function save() : bool
    {
        $this->data_hora = date('Y-m-d H:i:s', strtotime(str_replace('/','-',$this->data_hora)));
        return true;
      
    }

}