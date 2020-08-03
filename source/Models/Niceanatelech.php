<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;


class Niceanatelech extends DataLayer
{
    public function __construct()
    {
        parent::__construct("niceanatelech",["data_hora_contato", "data_hora_contato", "data_hora_contato", "nome_audio", "skill", "data_hora_termino_contato" ],"id",false);
    }
}
