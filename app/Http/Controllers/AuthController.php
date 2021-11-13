<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Response;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $response = new Response;
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password'])
        ]);
        if($user){
            $token = $user->createToken('auth_token')->plainTextToken;
            $result = $response->response;
            $result["result"] = array(
                'token_type' => 'Bearer',
                'access_token' => $token
            );
            return $result;
        }else{
            $valor = "Datos Incorrectos";
            $result = $response->error_200($valor);
            return $result;
        }
    }

    public function login(Request $request){
        $response = new Response;
        if (!Auth::attempt($request->only('email', 'password'))) {
            $valor = "Datos Incorrectos";
            $result = $response->error_200($valor);
            return $result;
        }
        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        $result = $response->response;
        $result["result"] = array(
            'token_type' => 'Bearer',
            'access_token' => $token
        );
        return $result;
    }

    public function infouser(Request $request){
        $response = new Response;
        $result = $response->response;
        $result["result"] = $request->user();
        return $result;
    }

}
