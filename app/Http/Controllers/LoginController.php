<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
    public function validar(Request $request){
        $request->validate(
            [
              'username' => 'required',
               'password' => 'required'
            ]
        );
     return $request->input();
    }

    public function validarconRequest(LoginRequest $request){

        return $request->input();
    }

    public function validarApiLogin(Request $request) {
        $rules =
            [
                'username' => 'required',
                'password' => 'required'
            ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['Mesage' => $validator->errors()],400);
        }
    }
}
