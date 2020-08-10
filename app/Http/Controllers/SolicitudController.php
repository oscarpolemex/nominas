<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\ServidorPublico;
use App\Mail\SendToken;

class SolicitudController extends Controller
{
    protected $request;
    public function __construct(Request $request) {
        $this->request = $request;
    }
    public function enviarToken(){
        $servidor = ServidorPublico::where('c_electronico',$this->request->c_electronico)->first();
        if($servidor != null){
            $token = $this->random_number(6);
            if(Cache::has($servidor->id)){
                return view('solicitudes.solicitud')->withErrors(["c_electronico" => "Ya se ha enviado la liga previemente"]);
            }else{
                $servidor->token = $token;
                $expiresAt = Carbon::now()->addMinutes(5);
                Cache::put($servidor->token, $servidor, $expiresAt);
            }
            $liga = "https://nomina.test/validar_token/".$servidor->token."/".$servidor->c_electronico;
            Mail::to('eduardo_sz5k4@hotmail.com', 'Eduardo Sánchez Zarco')->send(new SendToken($servidor,$liga));
            return view('solicitudes.solicitud')->withErrors(["c_electronico" => "Te enviamos a tu correo electronico el enlace para consultar tus recibos"]);
        }else{
            return view('solicitudes.solicitud')->withErrors(["c_electronico" => "No existe servidor publico con ese correo"]);
        }
    }
    public function validarToken(){
        if($this->request->token != ""){
            if (Cache::has($this->request->token)){
                $servidor = Cache::get($this->request->token);
                if($servidor->c_electronico == $this->request->c_electronico){
                    return view('solicitudes.recibos');
                }else{
                    return view('solicitudes.solicitud')->withErrors(["c_electronico" => "El correo electronico no coincide con el token asignado"]);
                }
            }else{
                return view('solicitudes.solicitud')->withErrors(["c_electronico" => "El token caduco, por favor solicita uno"]);
            }
        }else{
            return view('solicitudes.solicitud')->withErrors(["c_electronico" => "No existe el token, por favor solicita otro"]);
            
        }
        dd($this->request->token);
    }
    private function random_number($length)
    {
        return join('', array_map(function($value) { return $value == 1 ? mt_rand(1, 9) : mt_rand(0, 9); }, range(1, $length)));
    }
}
