<?php

namespace App\Http\Controllers;

//use App\Citas;
//use App\Eventos;
use App\Documento;
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
                    $expiresAt = Carbon::now()->addMinutes(120);
                    Cache::put($servidor->token, $servidor, $expiresAt);
                }
                $liga = asset("/") . "validar_token/" . base64_encode($servidor->token) . "/" . base64_encode($servidor->c_electronico);
                Mail::to($this->request->c_electronico)->send(new Token($servidor, $liga, $this->request->c_electronico));
                $this->request->session()->forget("token");
                $this->request->session()->put("token", base64_encode($servidor->token));
                $this->request->session()->forget("c_electronico");
                $this->request->session()->put("c_electronico", base64_encode($servidor->c_electronico));
                return redirect()->back()->withErrors(["success" => "Se envió un enlace de validación a tu correo electrónico, revisa la bandeja de entrada e ingresa y presióna el botón \"Ver recibos de nómina.\""]);
            } else {
                return redirect()->back()->withErrors(["error" => "Su registro aún no ha sido validado. Consulte con su administrador."]);
            }
        } else {
            return redirect()->back()->withErrors(["error" => "No existe servidor publico registrado con la dirección de correo electrónico ingresada"]);
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
                    $servidor->documentos = $servidor->documentos->sortByDesc("id")->take(12);
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
                    dd("si");
                    return view('solicitudes.recibos', compact('servidor', 'tiporecibo', 'token'));
                } else {
                    return redirect()->back()->withErrors(["c_electronico" => "El correo electronico no coincide con el token asignado"]);
                }
            } else {
                return redirect()->route("solicitud")->withErrors(["c_electronico" => "El link de acceso caducó, por favor solicita uno nuevo"]);
            }
        } else {
            return redirect()->route("solicitud")->withErrors(["c_electronico" => "No existe el link de acceso, por favor solicita otro"]);
        }
    }

    public function busqueda(Request $request)
    {
        $documentos = Documento::query();
        $documentos->where("servidor_publico_id", $request->servidor_id);
        $documentos->whereHas("recibo", function ($q) {
            if (!is_null($this->request->anio)) {
                $q->where("anio", $this->request->anio);
            }

            if (!is_null($this->request->tipo_recibo_id)) {
                $q->where("tipo_recibo_id", $this->request->tipo_recibo_id);
            }

            if (!is_null($this->request->numero)) {
                $q->where("consecutivo", "like", "%" . $this->request->numero . "%");
            }
        })->with("recibo");
        $documentos = $documentos->orderBy("id", "DESC")->get()->take(5);
        if (count($documentos)) {
            return json_encode($documentos);
        } else {
            return response("No se encontrarón resultados con los criterios ingresados.", 404);
        }
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
