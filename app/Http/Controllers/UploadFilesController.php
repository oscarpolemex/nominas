<?php

namespace App\Http\Controllers;

use App\Documento;
use App\Recibo;
use App\ServidorPublico;
use App\TipoRecibo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UploadFilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        return redirect()->route('uploadFiles.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $tipoRecibo = TipoRecibo::select('id', 'nombre')->get();
        $ultimoRecibo = Recibo::select('consecutivo')->where('tipo_recibo_id', '=', 1)
            ->orderBy('created_at', 'DESC')->take(1)->get();
        $numeroRecibo = 1;
        if (count($ultimoRecibo)) {
            $numeroRecibo = $ultimoRecibo[0]->consecutivo + 1;
        }
        return view('uploadFiles.create', compact('tipoRecibo', 'numeroRecibo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Request
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $year = date('yy');
            $recibo = new Recibo();
            $recibo->tipo_recibo_id = $request->tipo_pago;
            $recibo->anio = $year;
            $recibo->consecutivo = $request->consecutivo;
            $recibo->save();
            foreach ($request->file as $req) {
                $nameFile = explode("_", $req->getClientOriginalName());
                $curp = $nameFile[0];
                $idServidorPublico = ServidorPublico::select('id')->where('curp', '=', $curp)->get();
                $path = $req->store($year . '/' . $request->consecutivo);
                $documento = new Documento();
                $documento->servidor_publico_id = $idServidorPublico[0]->id;
                $documento->nombre = $req->getClientOriginalName();
                $documento->ruta = $path;
                $documento->recibo_id = $recibo->id;
                $documento->save();
                DB::commit();
            }
            return redirect()->route('uploadFiles.create');
        } catch (\Exception $exception) {
            if ($exception) {
                DB::rollBack();
                Storage::deleteDirectory($year . '/' . $request->consecutivo);
                return redirect()->back();
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
