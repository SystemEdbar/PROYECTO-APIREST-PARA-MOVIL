<?php

namespace App\Http\Controllers\clientes;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Response;
use App\Http\Requests\clientes\ClientesRequest;
use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        if ($request-> hasFile('cli_imagen')){
//            Storage::disk('Imagen')->delete(''.$request['imagen']);
            $imagenClient = $request-> file('cli_imagen');
            $path = Storage::disk('Imagen')->put('image/cliente', $imagenClient);
            $data['cli_imagen'] = $path;
        }
        Clientes::create($data);
        return redirect()->route('clientes')->with('mensaje', 'Cliente creado con Exito');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(){    }

    public function showApi()
    {
        $response = new Response;
        $clientes = Clientes::all();
        if($clientes){
            $result = $response->response;
            $result["result"] = array(
                'cliente' => $clientes
            );
        }else{
            $valor = "Error interno del servidor";
            $result = $response->error_500($valor);
        }
        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientesRequest $request, $id)
    {
        //AQUI SE ELIMINA LA IMAGEN ANTERIOR Y SE COLOCA...
        //DEBE TRAER ADICONALMENTE DE LOS CAMPOS DE LA BD UN CAPO 'imagen_copy' DONDE VENGA LA URL GUARDADA EN LA BASE DE DATOS
        //OJO ES LA INFORMACION DE LA BASE DE DATOS, NO LA NUEVA INFORMACION DE LA IMAGEN
        if ($request-> hasFile('cli_imagen')){
            Storage::disk('Imagen')->delete(''.$request['imagen_copy']);
            $imagenClient = $request-> file('cli_imagen');
            $path = Storage::disk('Imagen')->put('image/cliente', $imagenClient);
            $data['cli_imagen'] = $path;
        }
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
