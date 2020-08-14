<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServidorPublico;
use Yajra\Datatables\Datatables;

class ServidorPublicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        if (!$this->request->is('externo/*')) {
            $this->middleware('auth');
        }
    }

    public function index()
    {
        $servidoresPublicos = ServidorPublico::all();
        return view('ServidoresPublicos.index', compact('servidoresPublicos'));
    }
    public function getServidores(){
        $servidoresPublicos = ServidorPublico::select(['id','nombre','curp','c_electronico','verificado']);
        return Datatables::of($servidoresPublicos)->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('ServidoresPublicos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if ($request) {
            $servidorPublico = new ServidorPublico();
            $servidorPublico->nombre = $request->nombre;
            $servidorPublico->curp = strtoupper($request->curp);
            $servidorPublico->c_electronico = $request->c_electronico;
            $servidorPublico->telefono_celular = $request->telefono_celular;
            $servidorPublico->telefono_contacto = $request->telefono_contacto;
            $servidorPublico->extension_contacto = $request->extension_contacto;
            $servidorPublico->save();
            if (auth()->user()) {
                return redirect()->route('ServidoresPublicos.index')->with('info', '¡Se ha registrado el servidor público!');
            } else {
                return redirect()->back()->with('info', '¡Se ha registrado el servidor público!');
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $servidorPublico = ServidorPublico::find($id);
        return view('ServidoresPublicos.edit', compact('servidorPublico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $servidorPublico = ServidorPublico::find($id);
        if ($request) {
            $servidorPublico->nombre = $request->nombre;
            $servidorPublico->curp = strtoupper($request->curp);
            $servidorPublico->c_electronico = $request->c_electronico;
            $servidorPublico->telefono_celular = $request->telefono_celular;
            $servidorPublico->telefono_contacto = $request->telefono_contacto;
            $servidorPublico->extension_contacto = $request->extension_contacto;
            $servidorPublico->verificado = $request->verificado;
            $servidorPublico->save();
            return redirect()->route('ServidoresPublicos.index')->with('info', '¡Se ha actualizado la información del servidor público!');
        }
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

    public function validaEmail($crit)
    {
        $exist = ServidorPublico::where('c_electronico', '=', $crit)->get();
        if (count($exist)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function validaCurp($crit)
    {
        $exist = ServidorPublico::where('curp', '=', $crit)->get();
        if (count($exist)) {
            return 1;
        } else {
            return 0;
        }
    }
}
