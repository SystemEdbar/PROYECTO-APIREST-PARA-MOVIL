<?php

namespace App\Http\Controllers\clientes;

use App\Http\Controllers\Controller;
use App\Http\Requests\clientes\ClientesRequest;
use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){

        $clientes = Clientes::all();
        return view('clientes.index', compact('clientes'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(){

        return view('clientes.create')->with('mensaje', 'Bienvenido');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function guardado(ClientesRequest $request){
        $data = $request->validated();
        Clientes::create($data);
        return redirect()->route('clientes')->with('mensaje', 'Cliente creado con Exito');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionCuentasBancarias $request, $id)

    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
