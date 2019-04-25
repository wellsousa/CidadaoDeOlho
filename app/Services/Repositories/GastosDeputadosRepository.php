<?php

namespace App\Services\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\Partido;
use App\Models\Deputado;
use App\Models\VerbaIndenizatoria;

class GastosDeputadosRepository{


    public function getSomaGastosDeputado($id_almg){
            $resultado = DB::select("select sum(valor) as 'anual' from verbas_indenizatorias where id_almg = {$id_almg}");

            return $resultado[0];
    }

}