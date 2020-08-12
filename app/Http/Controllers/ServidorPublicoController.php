<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServidorPublico;

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
        //$this->middleware('auth', ['except' => ['externo/ServidoresPublicos']]);
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
            return redirect()->route('ServidoresPublicos.index')->with('info', 'El empleado fue eliminado');
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
            $servidorPublico->save();
            return redirect()->route('ServidoresPublicos.index');
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
}
