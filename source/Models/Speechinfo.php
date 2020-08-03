<?php
namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Speechinfo extends DataLayer
{
    public function __construct()
    {
        parent::__construct('speech_info',['contactid','numero_carga', 'tempo_silencio', 'data_contato', 'horario_contato'],'id',false);
        
    }

    
    public function save() : bool
    {
        $this->tempo_silencio = trim(str_replace(',','.',str_replace('%','', $this->tempo_silencio)));
        
        $date = date_create_from_format('d/m/Y H:i:s', $this->data_contato);
        if(!$date){
            $date = date_create_from_format('d/m/y H:i', $this->data_contato);
        }
        if(!$date){
            $date = date_create_from_format('d/m/Y H:i', $this->data_contato);
        }
        if(!$date){
            $date = date_create_from_format('d/m/Y H', $this->data_contato);
        }
        if(!$date){
            $date = date_create_from_format('d/m/Y', $this->data_contato);
        }

        $this->data_contato = $date->format('Y-m-d');
        
        $this->horario_contato = $date->format('Y-m-d H:i:s');
        
        if(!parent::save()){
            return false;
        }else{
            return true;
        }
        
    }

}