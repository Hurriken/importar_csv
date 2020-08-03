<?php

namespace Source\App;

use CoffeeCode\Uploader\Send;
use League\Csv\Reader;
use League\Csv\Statement;
use League\Plates\Engine;
// use Source\Models\Categoriainfo;
use Source\Models\Categoriainfojson;
use Source\Models\Speechinfo;


class Jar
{
    private $view;

    public function __construct($router)
    {
        $this->view = Engine::create(__DIR__ . "/../../theme", "php");
        $this->view->addData(["router" => $router]);

    }

    public function home(array $data)
    {
                     
        echo $this->view->render("jar",[
            "title"=>"JAR | Desenvolvimento Comdata",
            "titulo" => "JAR"
            ]);
    }

    public function importar(array $data): void
    {
        ini_set('max_execution_time', 0);
        $upload = new Send("storage","csv",["text/csv"],["csv"]);
        $callback = ["success"=>[],"error"=>[]];
        if(!empty($_FILES['files'])){
            $file = $_FILES['files'];
            
            if(empty($file['type']) || !in_array($file['type'], $upload::isAllowed())){
                array_push($callback["error"],'Selecione um arquivo valido');
               
            }else{
                $uploaded = $upload->upload($file,pathinfo($file["name"], PATHINFO_FILENAME));
                $return = $this->add($uploaded);
                $callback["error"] = array_merge($callback["error"], $return["error"]);
                $callback["success"] = array_merge($callback["success"], $return["success"]);
            }

            
            echo json_encode($callback);
            
        }
        
    }

    public function add($file_path): array
    {
            
        $stream = fopen(__DIR__. "/../../" .$file_path, "r");
        $reader = Reader::createFromStream($stream);

        $reader->setDelimiter(";");
        $reader->setHeaderOffset(0);

        $stmt = (new Statement());
        
        $records = $stmt->process($reader);
        $error = [];
        $lin = 2;
        foreach($records as $value){
            $speechinfo = new Speechinfo();
            $categorias = new Categoriainfojson();
            $contactid = $value['ID de Contato']?? $value['ContactID'];
            
            $speechinfo = $speechinfo->find("contactid=:contactid","contactid={$contactid}");
            
            if(empty($speechinfo->fetch())){
                
                if($value['% Tempo de Silêncio']){
                    $speechinfo->tempo_silencio = $value['% Tempo de Silêncio'];
                }
                if($value['ANI']){
                    $speechinfo->ani =  $value['ANI'];
                }
                if($value['Chave SID']){
                    $speechinfo->chave_sid =  $value['Chave SID'];
                }
                if($value['Dados Personalizados 18']){
                    $speechinfo->dados_personalizados_18 =  $value['Dados Personalizados 18'];
                }
                if($value['Direção']){
                    $speechinfo->direcao =  $value['Direção'];
                }
                if($value['DNIS']){
                    $speechinfo->dnis =  $value['DNIS'];
                }
                if($value['Duração (s)']){
                    $speechinfo->duracao =  $value['Duração (s)'];
                }
                if($value['EmployeeID']){
                    $speechinfo->employeeid =  $value['EmployeeID'];
                }
                if($value['Funcionário']){
                    $speechinfo->funcionario =  $value['Funcionário'];
                }
                if($value['Grupo de Agente']){
                    $speechinfo->grupo_agente =  $value['Grupo de Agente'];
                }
                if($value['Hora de Início Local']){
                    $speechinfo->data_contato =  $value['Hora de Início Local'];
                }
                if($value['ID de chamada de Switch']){
                    $speechinfo->id_chamada_switch =  $value['ID de chamada de Switch'];
                }
                if($value['ID de Contato']){
                    $speechinfo->contactid =  $value['ID de Contato'];
                    $categorias->contactid =  $value['ID de Contato'];
                }
                if($value['ContactID']){
                    $speechinfo->contactid =  $value['ContactID'];
                    $categorias->contactid =  $value['ContactID'];
                }
                if($value['ID de PBX']){
                    $speechinfo->id_pbx =  $value['ID de PBX'];
                }
                if($value['ID do Funcionário']){
                    $speechinfo->id_funcionario =  $value['ID do Funcionário'];
                }
                if($value['Interação de Exceção']){
                    $speechinfo->interacao_excecao =  $value['Interação de Exceção'];
                }
                if($value['Número de Conferências']){
                    $speechinfo->numero_conferencia =  $value['Número de Conferências'];
                }
                if($value['Número de Esperas']){
                    $speechinfo->numero_espera =  $value['Número de Esperas'];
                }
                if($value['Número de Transferências']){
                    $speechinfo->numero_transferencias =  $value['Número de Transferências'];
                }
                if($value['Ramal']){
                    $speechinfo->ramal =  $value['Ramal'];
                }
                if($value['Switch']){
                    $speechinfo->switch =  $value['Switch'];
                }
                if($value['Tela']){
                    $speechinfo->tela =  $value['Tela'];
                }
                if($value['Tempo de Encerramento']){
                    $speechinfo->tempo_finalizacao =  $value['Tempo de Encerramento'];
                }
                if($value['Tempo Total de Espera (s)']){
                    $speechinfo->tempo_total_espera =  $value['Tempo Total de Espera (s)'];
                }
                if($value['Tempo Total de Silêncio (segundos)']){
                    $speechinfo->tempo_total_silencio =  $value['Tempo Total de Silêncio (segundos)'];
                }
                if($value['Numero da Carga']){
                    $speechinfo->numero_carga =  $value['Numero da Carga'];
                    $categorias->numero_carga =  $value['Numero da Carga'];
                }
                if($value['Grupo']){
                    $speechinfo->grupo =  $value['Grupo'];
                }
                if($value['Matricula']){
                    $speechinfo->matricula =  $value['Matricula'];
                }
                if($value['Nome do Audio']){
                    $speechinfo->nome_audio =  $value['Nome do Audio'];
                }
                if($value['Hora de Início Local']){
                    $speechinfo->horario_contato =  $value['Hora de Início Local'];
                }
                
                $arr = [];
                
                foreach($value as $key => $row){
                    // $categoria_old = new Categoriainfo();
                    if($key == 'Não categorizado' || $key == '% de Tempo de Conversação' || $key == '% de Fala Além do Horário'){
                        break;
                    }
                    if($key == 'Nº' || $key == 'Classificação' || $key == 'Pontuação' || $key == 'Palavras-chave Encontradas'){
                        continue;
                    }
                    $arr[$key] =  empty($row) ? 0:1;

                    // $categoria_old->contactid = $speechinfo->contactid;
                    // $categoria_old->categoria = $key;
                    // $categoria_old->valor = empty($row) ? 0:1;
                    // $categoria_old->numero_carga = $speechinfo->numero_carga;

                    // if(!$categoria_old->save()){
                    //     echo "<h2>{$categoria_old->fail()->getMessage()}</h2>";
                    //     var_dump($categoria_old->fail());
                    // }
                }

                $categorias->categorias = json_encode($arr);
                
                if(!$categorias->save()){
                    array_push($error, "linha: {$lin} - {$categorias->fail()->getMessage()}");
                    
                };
                
                if(!$speechinfo->save()){
                    array_push($error, "linha: {$lin} - {$speechinfo->fail()->getMessage()}");
                    
                }
            }
            $lin++;
            
        }

        $lin = $lin - 2;
        return $callback = [
            "success" => ["Importados ". $lin . " registros."],
            "error" => $error
        ];
            
    }
    
}
