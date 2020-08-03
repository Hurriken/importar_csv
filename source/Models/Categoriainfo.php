<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Categoriainfo extends DataLayer
{

    public function __construct()
    {
        parent::__construct('categoria_info',['contactid','numero_carga'],'id',false);
    }

    
}