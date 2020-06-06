<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Talento\CandidatoFotos;
use App\Models\Castings\Castings;
use App\Models\Castings\CastingsSeleccionados;
use App\Models\Admin\AdminPlanes;
use PDF;

class unComposeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('auth'); 
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function composetalentoselec($id)
    {

        //$id = Auth::user()->id;             
        $usuario = Users::find($id);


        return view('unTalentoCompose',compact('usuario'));
    }

}
