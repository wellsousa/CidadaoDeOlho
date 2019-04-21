<?php

namespace App\Libraries\ALMG;

class ALMG{
    
    public function getPartidos(){

        $data = json_decode(file_get_contents('http://dadosabertos.almg.gov.br/ws/representacao_partidaria/partidos?formato=json'), true);  
        
        return $data['list'];
    }

    public function getDeputados(){
        return json_decode(file_get_contents('http://dadosabertos.almg.gov.br/ws/deputados/em_exercicio?formato=json'), true);
    }    

}