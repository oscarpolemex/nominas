<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RevisionPrestamosController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $prestamos = \App\SolicitudPrestamo::all();
        return view("revisionPrestamos.index", compact("prestamos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $file = \App\SolicitudPrestamo::find($id);
        $url = Storage::url($file->ruta);
        return view("revisionPrestamos.show", compact("url", "file"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $solicitud = \App\SolicitudPrestamo::find($id);
        $solicitud->estatus = $request->estatus;
        $solicitud->save();
        return redirect()->route("revision_prestamos.index");
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

    public function getFile($id) {
        try {

            $documento = \App\SolicitudPrestamo::find($id);
            if ($documento) {
                $file = Storage::get($documento->ruta);
                $fileMime = Storage::mimeType($documento->ruta);
                return response($file, 200)->header('Content-Type', $fileMime);
            } else {
                abort(404);
            }
        } catch (Exception $e) {
            Log::error('En script:' . $e->getFile() . " En línea: " . $e->getLine() .
                    " Se emitió el siguiente mensaje: " . $e->getMessage() .
                    " Con código: " . $e->getCode() . " La traza es: " . $e->getTraceAsString());
            abort(404);
        }
    }

}
