<?php

namespace App\Http\Controllers;

//use App\Citas;
//use App\Eventos;
use App\Mail\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\ServidorPublico;
use App\TipoRecibo;
use App\Mail\SendToken;

class SolicitudController extends Controller
{

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        if ($this->request->is('solicitud/*')) {
            $this->middleware('CheckToken');
        }
    }

    public function enviarToken()
    {
        $servidor = ServidorPublico::where('c_electronico', $this->request->c_electronico)->first();
        if ($servidor != null) {
            if ($servidor->verificado == true) {
                $token = $this->random_number(6);
                if (Cache::has($servidor->id)) {
                    return view('solicitudes.solicitud')->withErrors(["c_electronico" => "Ya se ha enviado la liga previemente"]);
                } else {
                    $servidor->token = $token;
                    $expiresAt = Carbon::now()->addMinutes(60);
                    Cache::put($servidor->token, $servidor, $expiresAt);
                }
                $liga = asset("/") . "validar_token/" . base64_encode($servidor->token) . "/" . base64_encode($servidor->c_electronico);
                Mail::to($this->request->c_electronico)->send(new Token($servidor, $liga, $this->request->c_electronico));
                $this->request->session()->forget("token");
                $this->request->session()->put("token", base64_encode($servidor->token));
                $this->request->session()->forget("c_electronico");
                $this->request->session()->put("c_electronico", base64_encode($servidor->c_electronico));
                return view('solicitudes.solicitud')->withErrors(["success" => "Se envió un enlace de validación a tu correo electrónico, revisa la bandeja de entrada e ingresa y presión el botón \"Ver recibos de nómina.\""]);
            } else {
                return view('solicitudes.solicitud')->withErrors(["error" => "Su registro aún no ha sido validado. Consulte con su administrador."]);
            }
        } else {
            return view('solicitudes.solicitud')->withErrors(["error" => "No existe servidor publico registrado con la dirección de correo electrónico ingresada"]);
        }
    }

    public function validarToken()
    {
        if ($this->request->token != "") {
            $token = base64_decode($this->request->token);
            $correo = base64_decode($this->request->c_electronico);
            if (Cache::has($token)) {
                $servidor = Cache::get($token);
                if ($servidor->c_electronico == $correo) {
                    $servidor->documentos = $servidor->documentos->sortByDesc(true)->take(12);
                    $tiporecibo = TipoRecibo::all();
//                    $evento = Eventos::where("estatus", "!=", 0)->get();
//                    for ($i = 0; $i < count($evento); $i++) {
//                        $cita = Citas::where("eventos_id", $evento[$i]->id)->where("servidor_publico_id", $servidor->id)->first();
//                        if ($cita) {
//                            $evento[$i]->cita = $cita;
//                        } else {
//                            $evento[$i]->cita = null;
//                        }
//                    }
                    $token = $this->request->token;
                    return view('solicitudes.recibos', compact('servidor', 'tiporecibo', 'token'));
                } else {
                    return view('solicitudes.solicitud')->withErrors(["c_electronico" => "El correo electronico no coincide con el token asignado"]);
                }
            } else {
                return view('solicitudes.solicitud')->withErrors(["c_electronico" => "El token caducó, por favor solicita uno"]);
            }
        } else {
            return view('solicitudes.solicitud')->withErrors(["c_electronico" => "No existe el token, por favor solicita otro"]);
        }
    }

    public function busqueda()
    {
        $servidor = ServidorPublico::find($this->request->servidor_id);
        if ($servidor != null) {
            foreach ($servidor->documentos as $documento) {
                if ($documento->recibo->tipo_recibo_id == $this->request->tipo_recibo_id) {
                    if ($documento->recibo->anio == $this->request->anio) {
                        $tipo = "A";
                        if ($this->request->tipo_recibo_id == 1) {
                            $tipo = "Q";
                        }
                        $consecutivo = $tipo . sprintf("%02d", $this->request->consecutivo);
                        if ($documento->recibo->consecutivo == $consecutivo) {
                            $documento->recibo->nombre = $documento->recibo->tipoRecibo->nombre;
                            return $documento;
                            break;
                        }
                    }
                }
            }
            return response('No se encuentran datos', 500);
        }
        return response('No se encuentro al servidor público', 500);
    }

    private function random_number($length)
    {
        return join('', array_map(function ($value) {
            return $value == 1 ? mt_rand(1, 9) : mt_rand(0, 9);
        }, range(1, $length)));
    }

    public function Recibos($crit)
    {

    }

}
