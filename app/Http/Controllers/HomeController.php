<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Código ou programa que é executado entre a requisição (Request) e a nossa aplicação (Lógica executada pelo acesso a uma determinada rota)
        $this->middleware('auth'); // verificar se o usuária está logado ou não
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
