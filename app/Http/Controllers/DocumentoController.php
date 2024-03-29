<?php

namespace App\Http\Controllers;

use App\Documento;
use Illuminate\Http\Request;
use App\ServidorPublico;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;


class DocumentoController extends Controller
{
    protected $request;

    function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Documento $documento
     * @return \Illuminate\Http\Response
     */
    public function show(Documento $documento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Documento $documento
     * @return \Illuminate\Http\Response
     */
    public function edit(Documento $documento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Documento $documento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Documento $documento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Documento $documento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documento $documento)
    {
        //
    }

    function getFile($id)
    {
        $documento = Documento::find($this->request->id);
        if (Storage::exists($documento->ruta)) {
            return Storage::download($documento->ruta, $documento->nombre);
        } else {
            return redirect()->back()->withErrors(["error" => "error"]);
        }
    }
}
