<?php

namespace App\Http\Controllers\clientes;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Response;
use App\Http\Requests\clientes\ClientesRequest;
use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use RealRashid\SweetAlert\Facades\Alert;

use Exception;


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
            $data['cli_imagen'] = "/".$path;
        }else{
            $data['cli_imagen'] = "https://definicionde.es/wp-content/uploads/2019/04/definicion-de-persona-min.jpg";
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


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = Clientes::find($id);
        return view('clientes.editar', compact('clientes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientesRequest $request, $id)
    {
        $data = $request->validated();
        if ($request-> hasFile('cli_imagen')){
            Storage::disk('Imagen')->delete(''.$request['imagen_copy']);
            $imagenClient = $request-> file('cli_imagen');
            $path = Storage::disk('Imagen')->put('image/cliente', $imagenClient);
            $data['cli_imagen'] = "/".$path;
        }
        $clientes = Clientes::find($id);
        $clientes->fill($data);
        $clientes->save();
        return redirect()->route('clientes')->with('mensaje', 'Cliente Actualizado con Exito');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes = Clientes::find($id);
        $clientes->delete();
        return redirect()->route('clientes')->with('mensaje', 'Cliente eliminado con Exito');
    }

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

    public function storeApi(ClientesRequest $request){
        $response = new Response;
        try {
            $data = $request->validated();
            if ($request-> hasFile('cli_imagen')){
                $imagenClient = $request-> file('cli_imagen');
                $path = Storage::disk('Imagen')->put('image/cliente', $imagenClient);
                $data['cli_imagen'] = $path;
            }else{
                $data['cli_imagen'] = "https://definicionde.es/wp-content/uploads/2019/04/definicion-de-persona-min.jpg";
            }
            Clientes::create($data);
            $result = $response->response;
        }catch (Exception $e){
            $valor = "Error Interno en el Servidor";
            $result = $response->error_500($valor);
        }
        return $result;
    }

    public function editApi($id){
        $response = new Response;
        $clientes = Clientes::find($id);
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

    public function updateApi(ClientesRequest $request, $id){
        $response = new Response;
        try {
            $data = $request->validated();
            if ($request-> hasFile('cli_imagen')){
                Storage::disk('Imagen')->delete(''.$request['imagen_copy']);
                $imagenClient = $request-> file('cli_imagen');
                $path = Storage::disk('Imagen')->put('image/cliente', $imagenClient);
                $data['cli_imagen'] = "/".$path;
            }
            $clientes = Clientes::find($id);
            $clientes->fill($data);
            $clientes->save();
            $result = $response->response;
        }catch (Exception $e){
            $valor = "Error Interno en el Servidor";
            $result = $response->error_500($valor);
        }
        return $result;
    }

    public function destroyApi($id){
        $response = new Response;
        try {
            $clientes = Clientes::find($id);
            $clientes->delete();
            $result = $response->response;
        }catch (Exception $e){
            $valor = "Error Interno en el Servidor";
            $result = $response->error_500($valor);
        }
        return $result;
    }
}
