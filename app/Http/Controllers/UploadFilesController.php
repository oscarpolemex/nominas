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
    public function __construct(Request $request)
    {
        $this->middleware('auth');
    }

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
        return view('uploadFiles.create');
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
            $files = [];
            foreach ($request->file as $req) {
                $nameFile = explode("_", $req->getClientOriginalName());
                if (count($nameFile) == 3) {
                    $ext = explode(".", $nameFile[2]);
                    $recibo = Recibo::where([
                        'anio' => $nameFile[1],
                        'consecutivo' => $ext[0]
                    ])->get()->first();
                    $tipoRecibo = null;
                    $tipo = substr($ext[0], 0, 1);
                    if ($tipo == 'Q') {
                        $tipoRecibo = 1;
                    } else {
                        $tipoRecibo = 2;
                    }
                    if (!$recibo) {
                        $recibo = new Recibo();
                        $recibo->tipo_recibo_id = $tipoRecibo;
                        $recibo->anio = $nameFile[1];
                        $recibo->consecutivo = $ext[0];
                        $recibo->save();
                    }
                    $idServidorPublico = ServidorPublico::select('id')->where('curp', '=', $nameFile[0])->get();
                    $path = $req->store($nameFile[1] . '/' . $ext[0]);
                    $documento = new Documento();
                    if (count($idServidorPublico)) {
                        $documento->servidor_publico_id = $idServidorPublico[0]->id;

                    } else {
                        $servidorPublico = new ServidorPublico();
                        $servidorPublico->curp = $nameFile[0];
                        $servidorPublico->save();
                        $documento->servidor_publico_id = $servidorPublico->id;
                    }
                    $documento->nombre = $req->getClientOriginalName();
                    $documento->ruta = $path;
                    $documento->recibo_id = $recibo->id;
                    $documento->save();
                    array_push($files, $path);
                }
            }
            DB::commit();
            return redirect()->route('uploadFiles.create')->with('info', '¡Se han cargado exitosamente los documentos!');
        } catch (\Exception $exception) {
            if ($exception) {
                DB::rollBack();
                Storage::delete($files);
                return $exception;
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
