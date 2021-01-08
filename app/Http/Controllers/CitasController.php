<?php

namespace App\Http\Controllers;

use App\Citas;
use App\Eventos;
use App\Mail\SendCitaConfirmation;
use App\Mail\SendToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class CitasController extends Controller
{
    protected $request;

    public function __construct(Request $request)
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
        $token = base64_decode($id);
        if (Cache::has($token)) {
            $servidor = Cache::get($token);
            $idServidor = $servidor->id;
//            for ($i = 1; $i < 80; $i++) {
//                $idServidor = $i;
            $citas = Citas::where("eventos_id", '=', $request->input("evento"))->get();
            $evento = Eventos::find($request->input("evento"));
            if ($evento->estatus == false) {
                return redirect()->back()->with('info', '¡El evento ha finalizado, consulte con su administrador!');
            }
            $cita = new Citas();
            $cita->servidor_publico_id = $idServidor;
            $cita->eventos_id = $request->input("evento");
            if (count($citas)) {
                $ultimo = $citas->last();
                $citasDia = Citas::where("fecha_cita", $ultimo->fecha_cita)->get();
                $fechaCita = date_create($ultimo->fecha_hora_cita);
                $cita->fecha_cita = $ultimo->fecha_cita;
                if (count($citasDia) == 60) {
                    $fechaCita->modify('+123 minute');
                } else if (count($citasDia) == 80) {
//                    $fechaCita->modify('+1 days');
//                    $dia = date_format($fechaCita, "l");
//                    if ($dia == "Saturday") {
//                        $fechaCita->modify('+2 days');
//                    }
//                    $fechaCita->setTime(11, 30, 00);
//                    $cita->fecha_cita = date_format($fechaCita, "Y-m-d");
                    return redirect()->back()->with('info', '¡Lo sentimos no se generó la cita porque el cupo ha sido cubierto!');
                } else {
                    $fechaCita->modify('+3 minute');
                }
                $cita->fecha_hora_cita = $fechaCita;
                if (count($citasDia) == 79) {
                    $evento->estatus = 2;
                    $evento->fecha_fin = date("Y-m-d");
                    $evento->save();
                }
            } else {
                $fecha = Eventos::select("fecha_inicio")->where("id", '=', $request->input("evento"))->take(1)->get();
                $fechaCita = date_create($fecha[0]->fecha_inicio);
                $fechaCita->setTime(11, 30, 00);
                $cita->fecha_cita = $fecha[0]->fecha_inicio;
                $cita->fecha_hora_cita = $fechaCita;
            }
            $cita->save();
//            }
            Mail::to($servidor->c_electronico)->send(new SendCitaConfirmation($fechaCita, $evento->nombre_evento, $evento->descripcion_evento, $servidor->nombre));
            return redirect()->back()->with('info', '¡Se ha generado la cita, revise su correo electronico!');
        } else {
            return view('solicitudes.solicitud')->withErrors(["c_electronico" => "No existe el token, por favor solicita otro"]);
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
