<?php

namespace App\Http\Controllers\CidadaoDeOlho;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Partido;
use App\Models\Deputado;
use App\Models\VerbaIndenizatoria;

use App\Services\Repositories\GastosDeputadosRepository;

class GastosDeputadosController extends Controller
{
    
    private $repository;

    public function __construct(){
        $this->repository = new GastosDeputadosRepository();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $deputados = Deputado::all();

        $tabela = [];
        $i =0;


        foreach($deputados as $deputado){
            $gasto = $this->repository->getSomaGastosDeputado($deputado->id_almg);


            if(isset($gasto)){
                $tabela[$i] = ['id_almg'=> $deputado->id_almg,
                            'nome' => $deputado->nome,  
                            'gasto' => $gasto->anual];

                $i++;
            }

        }

        
        
        
        $maiores_gastadores = [];
        //var_dump($maior);
        //exit;
        for($k = 0; $k < 5; $k++){
            $maior = $tabela[0];
            $max_elementos = count($tabela);
            $indice = 0;
            $j = 0;

            foreach($tabela as $item){
                if($tabela[$j]['gasto'] > $maior['gasto']){

                    $maior = $tabela[$j];
                    $indice = $j;
                }

                $j++;
            }

            $maiores_gastadores[$k] = $maior;
            $tabela[$indice]['gasto'] = 0;
        }
        //var_dump($maiores_gastadores);
        //exit;

        return view('CidadaoDeOlho.index',["maiores_gastadores" => $maiores_gastadores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
