<?php

use Illuminate\Database\Seeder;

use App\Models\Partido;
use App\Models\Deputado;
use App\Models\VerbaIndenizatoria;
use App\Libraries\ALMG\ALMG;

class verbasIndenizatoriasSeeder extends Seeder
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
        $deputados = Deputado::all();

        $tot = count($deputados);
        $cont = 0;

        foreach($deputados as $deputado){
            
            for($mes = 1; $mes <=3; $mes++){
                $verbas = $almg->getVerbasIndenizatorias($deputado->id_almg, 2018, $mes);


                foreach($verbas as $verba){
                    $registro = new VerbaIndenizatoria();

                    $registro->id_almg = $deputado->id_almg;
                    $registro->data = $verba['dataReferencia']['$'];
                    $registro->cod_tipo_despesa = $verba['codTipoDespesa'];
                    $registro->valor = $verba['valor'];

                    $registro->save();
                }
            }

            $cont++;
            $progresso = round(($cont/$tot)*100);
            echo "\n Aguarde {$progresso}% concluído...";
            sleep(5);
            
        }
    }
}
