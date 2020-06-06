<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Talento\CandidatoFotos;
use App\Models\Castings\Castings;
use App\Models\Castings\CastingsSeleccionados;
use App\Models\Admin\AdminPlanes;
use App\Models\Admin\Planes;
use PDF;
use App\Models\Admin\Pago_planes;
use Redirect;
use App\Models\Mensajes;
use App\Models\Chats;
use Snipe\BanBuilder\CensorWords;
use Embed;
use GuzzleHttp\Client;


class CheckController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function seleccionar($id)
    {
        $deseado =  CastingsSeleccionados::find($id);

        if($deseado->check){
           if($deseado->check == 1){
                $deseado->check = 0;
            }
            else{
                $deseado->check = 1;
            }
        }
        else{
            $deseado->check = 1;
        }
        $deseado->save();
    }


    public function favoritear($id)
    {
        $deseado =  CastingsSeleccionados::find($id);

        if($deseado->favorito){
           if($deseado->favorito == 1){
                $deseado->favorito = 0;
            }
            else{
                $deseado->favorito = 1;
            }
        }
        else{
            $deseado->favorito = 1;
        }
        $deseado->save();
        return $deseado->favorito;
    }
    

}
