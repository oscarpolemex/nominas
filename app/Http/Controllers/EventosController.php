<?php

namespace App\Http\Controllers;

use App\Citas;
use App\Eventos;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $eventos = Eventos::all();
        return view("eventos.index", compact("eventos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("eventos.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evento = new Eventos();
        $evento->nombre_evento = $request->nombre_evento;
        $evento->fecha_inicio = $request->fecha_inicio;
        $evento->fecha_fin = $request->fecha_fin;
        $evento->descripcion_evento = $request->descripcion_evento;
        $evento->estatus = 1;
        $evento->save();
        return redirect()->route("eventos.index")->with('info', '¡Se ha publicado el evento!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento = Eventos::find($id);
        return view("citas.index", compact("evento"));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $evento = Eventos::find($id);
        $evento->estatus = 0;
        $evento->fecha_fin = date("Y-m-d");
        $evento->save();
        return redirect()->back()->with("info", "El evento ha sido finalizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
