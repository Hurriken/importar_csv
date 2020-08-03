<?php
namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

Class Categoriainfojson extends DataLayer
{
    public function __construct()
    {
        parent::__construct('categoria_info_json',['contactid', 'numero_carga', 'categorias'],'id',true);

    }

    public function save() :bool
    {
        if(!parent::save()){
            return false;
        }else{
            return true;
        }
    }
}
