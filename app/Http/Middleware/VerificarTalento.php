<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use App\User;
class VerificarTalento
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   $id = Auth::user()->id;
            $currentuser = User::find($id);

            if($currentuser->perfil == 1){
                Auth::logout();
             return redirect('https://talentos.ivotalents.com/');
            }

        return $next($request);
    }
}
