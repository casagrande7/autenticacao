<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function store (Request $request){
        try{
            $data = $request->all();

            $data['password'] = Hash::make($request->password);

            $response = Admin::create($data)->createToken($request->server('HTTP_USER_AGENT'))->plainTextToken;

            return response()->json([
                'status' => 'success',
                'message' => 'Admin cadastrado com sucesso',
                'token' => $response
            ], 200);

        } catch(\Throwable $th){

        }
        
    }
}
