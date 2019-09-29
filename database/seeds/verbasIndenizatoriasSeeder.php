<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Partido;
use App\Models\Deputado;
use App\Models\TipoVerba;
use App\Models\PrestadoraServico;
use App\Models\VerbaIndenizatoria;
use App\Models\DetalheVerba;
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
                /*
                 verificar se codTipoDespesa já existe na tabela tipo_verba. Se não existir
                 crie um novo registro com cod_tipo_despesa e desc_tipo_despesa
                */
                    //$tipo_verba = TipoVerba::find($verba['codTipoDespesa']);
                    $tipo_verba = DB::table('tipos_verbas_indenizatorias')->where('cod_tipo_despesa', $verba['codTipoDespesa'])->first();

                    //se o tipo de verba ainda não estiver cadastrado no sistema então cadastre
                    if($tipo_verba == null){
                        $novo_tipo = new TipoVerba();

                        $novo_tipo->cod_tipo_despesa = $verba['codTipoDespesa'];
                        $novo_tipo->desc_tipo_despesa = $verba['descTipoDespesa'];

                        $novo_tipo->save();
                    }

                    $registro = new VerbaIndenizatoria();

                    $registro->id_almg = $deputado->id_almg;
                    $registro->data_referencia = $verba['dataReferencia']['$'];
                    $registro->cod_tipo_despesa = $verba['codTipoDespesa'];
                    $registro->valor_total = $verba['valor'];

                    $indice_detalhe_verba = DetalheVerba::max('cod_detalhe_verba');

                    if($indice_detalhe_verba == null){
                        $indice_detalhe_verba = 1;
                    }else{
                        $indice_detalhe_verba++;
                    }
                    $registro->cod_detalhe_verba = $indice_detalhe_verba;

                    foreach($verba['listaDetalheVerba'] as $item){
                        $novo_detalhamento = new DetalheVerba();
                        
                        $novo_detalhamento->cod_detalhe_verba = $indice_detalhe_verba;

                        $prestadora = DB::table('prestadoras_servicos')->where('razao_social', $item['nomeEmitente']);

                        if($prestadora == null){
                            $nova_prestadora = new PrestadoraServico();

                            $nova_prestadora->cnpj = $item['cpfCnpj'];
                            $nova_prestadora->razao_social = $item['nomeEmitente'];

                            $nova_prestadora->save();

                        }

                        $prestadora = DB::table('prestadoras_servicos')->where('razao_social', $item['nomeEmitente']);
                        /*if($prestadora == null){
                            echo "é nulo";
                        }else{
                            echo "nao é nulo";
                        }*/
                        //$novo_detalhamento->cod_prestadora = $prestadora->id;

                        $novo_detalhamento->cod_prestadora = 23;
                        //seria a nota fiscal?
                        $novo_detalhamento->cod_documento = $item['descDocumento'];
                        $novo_detalhamento->data_emissao = $item['dataEmissao']['$'];
                        $novo_detalhamento->valor_despesa = $item['valorDespesa'];
                        $novo_detalhamento->valor_reembolsado = $item['valorReembolsado'];

                        $novo_detalhamento->save();
                    }


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
