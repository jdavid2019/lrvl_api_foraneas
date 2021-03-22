<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class HomeController extends Controller
{
    public function index(){
       $data = Http::get('https://mindicador.cl/api');
       $moviedata = $data->json();
        return view('home',compact('moviedata'));
    }
}
