<?php

namespace App\Http\Middleware;

use \Cache;
use Closure;

class CheckToken {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if ($request->session()->get("token")) {
            $token = base64_decode($request->session()->get("token"));
            if (!Cache::has($token)) {
                $request->session()->forget("token");
                $request->session()->forget("c_electronico");
                return redirect()->route("solicitud");
            }
        } else {
            $request->session()->forget("token");
            $request->session()->forget("c_electronico");
            return redirect()->route("solicitud");
        }
        return $next($request);
    }

}
