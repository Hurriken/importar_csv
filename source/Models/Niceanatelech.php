<?php

namespace Source\Models;

use CoffeCode\Datalayer\Datalayer;

class Niceanatelech extends Datalayer
{
    public function __construct()
    {
        parent::__construct("niceanatelech",["data_hora_contato", "data_hora_contato", "data_hora_contato", "nome_audio", "skill", "data_hora_termino_contato" ],"id",false);
    }
}
