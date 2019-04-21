<?php

use App\Models\Partido;
use App\Libraries\ALMG\ALMG;

use Illuminate\Database\Seeder;

class PartidosSeeder extends Seeder
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
        $itens = $almg->getPartidos();

        foreach($itens as $item){
            $partido = new Partido();
            
            //foreach($item as $key=>$value){
                

                $partido->sigla = $item['sigla'];
                $partido->num_legenda = $item['id'];
                $partido->descricao = "";

            //}

            $partido->save();
        }
    }
}
