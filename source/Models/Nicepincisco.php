<?php
namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class NicePincisco extends DataLayer
{
    public function __construct()
    {
        parent::__construct('nicepincisco',['complete_start_time','complete_stop_time','participant_agent_id'],'id',false);
    }
}