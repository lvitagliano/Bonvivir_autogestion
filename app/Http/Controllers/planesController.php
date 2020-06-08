<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Planes;
use App\Models\Admin\Pago_planes;
use App\Models\Admin\Planes_Items;
use App\Models\Admin\Plan_configurable;

use App\Mail\NotificarProyecto;
use Mail;
use App\Mail\NotificarTransferencia;

class planesController extends Controller
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


    public function planes()
    {
        $id = Auth::user()->id;
        $usuario = Users::find($id);
        $planes = Planes::all();
        $pago = Pago_planes::where('id_usuario', $id)
        ->where('activo', 1)
        ->orderBy('id','DESC')
        ->first();
    return view('planes',compact('usuario', 'planes', 'pago'));
    }
    
    public function pagos(Request $request) {
        $id = Auth::user()->id;  
        $idProj = $request->id;
        $usuario = Users::find($id);
        $planes = Planes::get();
        $idplan = 5;
        $planes_items = Planes_Items::all();
        return view('pagos',compact('usuario', 'planes', 'planes_items', 'idProj'));
    }   
    
    public function compras()
    {
        $id = Auth::user()->id;
        $usuario = Users::find($id);
        $planes = Planes::all();
        $pago = Pago_planes::where('id_usuario', $id)
        ->where('activo', 1)
        ->orderBy('id','DESC')
        ->get();
    return view('compras',compact('usuario', 'planes', 'pago'));
    }

    public function planesConfigurables()
    {
        $id = Auth::user()->id;
        $usuario = Users::find($id);
        $planes = Planes::all();
        $planesConfig = Plan_configurable::all();
        $pago = Pago_planes::where('id_usuario', $id)
        ->where('activo', 1)
        ->orderBy('id','DESC')
        ->first();
    return view('planesConfigurables',compact('usuario', 'planes', 'pago', 'planesConfig'));
    }


    public function guardarPago(Request $request)
    {

        if(Auth::user()){
             $id = Auth::user()->id;
             $Pago = new Pago_planes;
             $file = $request->imagebanco;
             $complete = '/files/comprobantes/'.$id;
             $upload = Storage::disk('s3')->put($complete, $file, 'public');

                $Pago->id_usuario =  $id;
                $Pago->id_plan =  $request->idPlanPago;
                $Pago->tipo_pago = $request->tipo_pago;
                $Pago->imagen_pago = 'https://ivotalent.s3.us-east-2.amazonaws.com/'.$upload;
                $Pago->activo =  1;
                $Pago->Activado =  0;
                $Pago->save();
                $laImagen = 'https://ivotalent.s3.us-east-2.amazonaws.com/'.$upload;
                $usuario = Users::find($id);
               // Mail::to('lukasvitagliano@gmail.com')->send(new NotificarTransferencia($usuario, $laImagen));

               return redirect('/unproyecto/'.$request->project)
              ->with('success','Los datos han sido modificados exitosamente.');
               }
                  else{
                    return redirect('/unproyecto/'.$request->project);

         }

    }




}
