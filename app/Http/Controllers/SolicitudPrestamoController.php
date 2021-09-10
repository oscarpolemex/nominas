<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SolicitudPrestamoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $request;

    public function __construct(Request $request) {
        $this->request = $request;
        $this->middleware('CheckToken');
    }

    public function index() {
        $servidor = Cache::get(base64_decode(session("token")));
        $prestamos = $servidor->solicitudPrestamos;
        return view("solicitudPrestamos.index", compact("prestamos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view("solicitudPrestamos.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $servidor = Cache::get(base64_decode(session("token")));
        $file = $request->file;
        $path = $file->store("solicitudes");
        $solicitud = [
            "servidor_publico_id" => $servidor->id,
            "ruta" => $path,
            "estatus" => 1,
            "cita" => 1
        ];
        $servidor->solicitudPrestamos()->create($solicitud);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
