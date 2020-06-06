<?php

namespace App\Http\Controllers\planes;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\Plan_configurable;
use App\Models\Admin\Pago_planes;
use App\Models\Nomencladores\RolesTipos;
use App\Models\Industria\IndustriaDatos;
use App\Models\Users;
use Mail;
use App\Mail\NotificarTransferencia;

class pagosActivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planAsist = Pago_planes::where('id_usuario', auth()->id())
        ->where('Activado', 1)
        ->orderBy('id','DESC')
        ->where('Activo', 1)
        ->where('id_plan', 0)
        ->get();

        $planConf = Pago_planes::where('id_usuario', auth()->id())
        ->where('Activado', 1)
        ->orderBy('id','DESC')
        ->where('Activo', 1)
        ->where('id_plan', 1)
        ->first();

        return compact('planConf', 'planAsist');
    }

    public function store(Request $request)
    {
        // Id_plan son 1 si es pago 0 si es asistencia
        $id = Auth::user()->id; 
        $currentPlan = new Pago_planes();
        
        $currentPlan->id_plan = 1;
        $currentPlan->tipo_pago = 'Transferencia';
        $currentPlan->Activado = 0;
        
        $currentPlan->save();

        // $laImagen = 'https://ivotalent.s3.us-east-2.amazonaws.com/'.$complete;
        // $usuario = Users::find(auth()->id());

        // Mail::to('lukasvitagliano@gmail.com')->send(new NotificarTransferencia($usuario, $laImagen));


        return $currentPlan;
    }
    


}
