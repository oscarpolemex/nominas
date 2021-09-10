<?php

namespace App\Http\Controllers;

use App\Documento;
use App\ServidorPublico;
use Illuminate\Http\Request;
ini_set('memory_limit', '-1');

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $solicitudes = ServidorPublico::where("verificado", 0)->get()->count();
        $validado = ServidorPublico::where("verificado", 1)->get()->count();
        $archivos = Documento::all()->count();
        return view('home', compact("solicitudes","validado", "archivos"));
    }
}
