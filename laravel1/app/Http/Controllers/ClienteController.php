<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pessoa;
use App\Pessoa_juridica;
use App\SelectCli;
use Illuminate\Support\Facades\DB;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modulos.cliente.index');   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modulos.cliente.adicionar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $dados = $request->all();
       
                    $insert = new Pessoa;
                    $insert->name = $request->nome_f;
                    $insert->pis = $request->pis_f;
                    $insert->ctps = $request->ctps_f;
                    $insert->cnh = $request->cnh_f;
                    $insert->tipo_tel = $request->ddd_f;
                    $insert->rg = $request->rg_f;
                    $insert->cpf = $request->cpf_f;
                    $insert->telefone = $request->telefone_f;
                    $insert->email = $request->email_f;
                    $insert->tipo_email = $request->f_email;
                    $insert->titulo = $request->titulo_f;
                    $insert->passaporte = $request->passaporte_f;
                    $insert->operadora = $request->Operadora_f;
                    $insert->save();
                    $id=$insert->id;
                    
    
            if ($id) {
                    $insert = new Pessoa_juridica;
                    $insert->pessoa_id = $id;
                    $insert->name = $request->empresa_j;
                    $insert->namefantasia = $request->fantasia;
                    $insert->cnpj = $request->cnpj;
                    $insert->incricao_estadual = $request->inscricao_estadual;
                    $insert->incricao_municipal = $request->inscricao_municipal;
                    $insert->simples_nacional = $request->simples_nacional;
                    $insert->save();
                    return redirect()->route('adicionar_cliente');
                
            }
        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $cliente = DB::select('select * from pessoas');
        return view('modulos.cliente.listar');
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
    public function destroy(Request $request)
    {
        //$id = $request->all();
        echo 'ola';
    }
}
