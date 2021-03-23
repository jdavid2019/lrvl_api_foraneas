<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



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
       $photo = $_FILES['file']['name'] ;
      //  return $request->input();
     // La url donde se esta mostrando temporalmente request->file('file')
        // metodo store -> hace que lo guarde en storage/app/
        // ejecuto el comando php artisan storage:link
        // me gnera un acceso directo en mi carpeta public
        $imagenes = $request->file('file')->store('public/imagenes');
        $url = Storage::url($imagenes); // cambia la ruta de public a storage para que sea correcto el almacenamiento
        return $url;
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
