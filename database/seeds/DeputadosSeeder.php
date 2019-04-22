<?php

use Illuminate\Database\Seeder;

use App\Models\Partido;
use App\Models\Deputado;
use App\Libraries\ALMG\ALMG;

class DeputadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $almg = new ALMG();
        $itens = $almg->getDeputados();

        foreach($itens as $item){
            $deputado = new Deputado();
            
            $deputado->id_almg = $item['id'];
            $deputado->nome = $item['nome'];
            $deputado->cod_partido = Partido::where('sigla',$item['partido'])->value('num_legenda');
            $deputado->tag_localizacao = $item['tagLocalizacao'];

            $deputado->save();

        }
    }
}
