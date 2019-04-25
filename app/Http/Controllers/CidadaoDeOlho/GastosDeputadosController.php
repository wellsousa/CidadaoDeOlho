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

        //var_dump($tabela);
        //exit;

        return view('CidadaoDeOlho.index',["tabela" => $tabela]);
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
