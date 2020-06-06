<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Castings\CastingsSeleccionados;
use App\Models\Castings\Castings;
use GuzzleHttp\Client;
use Redirect;
use App\Models\Nomencladores\NomPaises;
use App\Models\Nomencladores\NomCiudades;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Pago_planes;

class ProyectosController extends Controller
{
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    ////AGREGA UN TALENTO A UN PROYECTO DESDE EL POPUP DEL BUSCADOR.
    public function agregarporbuscador(Request $request,$id)
    {

        $uid = $id;   
            
        $Castings = new Castings;     
        if($request->asistencia == 1){
            $Castings->proyecto_id = 0;
        }else{
            $Castings->proyecto_id = 1;
        }

        $paises = NomPaises::where('codigo_pais', $request->pais_evento)->first();
        $ciudades = NomCiudades::where('id',$request->ciudad_evento)->first();  


        $Castings->nombre = $request->titulo;
        $Castings->descripcion = $request->descripcion_breve;
        $Castings->tipo_casting = $request->tipo_evento;

        if($ciudades){
            $Castings->lugar = $paises->nombre.'/'.$ciudades->nombre;
        }else{
            $Castings->lugar = $paises->nombre.'/Sin Ciudad';
        }
        

        $Castings->fecha_inicio = $request->fecha_desde;
        $Castings->fecha_fin = $request->fecha_hasta;

        $Castings->horario = $request->horario_desde.' - '.$request->horario_hasta;

        if($request->derechos_para){
            $derechos= implode(", ",$request->derechos_para);
        }else{
            $derechos= "";
        }
        $Castings->tiempo = $request->derechos_cantidad.' - '.$request->derechos_tiempo.' - '.$derechos;
        $Castings->fecha_pago = $request->pago_fecha;
        $Castings->usuario_id = $uid;
        $Castings->uid = Str::random(32);
        $Castings->cantidad_talentos = $request->cantidad_talentos;
        $Castings->observaciones = $request->observaciones;
        $Castings->save();
        
        $casteado = Castings::find($Castings->id);
        
        $usuario = Users::find($uid);

        if ($Castings->proyecto_id == 0) {
            $currentPlan = new Pago_planes();
            $currentPlan->id_proyecto = $Castings->id;
            $currentPlan->id_plan = 0;
            $currentPlan->tipo_pago = 'Asistencia';
            $currentPlan->Activado = 1;
            $currentPlan->Activo = 1;
            $currentPlan->id_usuario = $Castings->usuario_id;
            $currentPlan->save();
        }else{
            $plan = Pago_planes::where('id_usuario', auth()->id())
            ->where('Activado', 1)
            ->where('Activo', 1)
            ->whereNull('id_proyecto')
            ->orderBy('id','DESC')
            ->update(['id_proyecto' => $Castings->id]);
        }

        $proyectos = Castings::where('usuario_id', $uid)->orderBy('id')->pluck("nombre","id");

        //if(false){

                
                $client = new Client();
                $res = $client->request('POST', 'https://eu35.chat-api.com/instance61506/sendLink?token=wai2925z4n315or1', [
                    'form_params' => [
                        'phone' => 50761344220, //'+542664856336', 
                        'body' => url('/').'/ver-casting/'.$casteado->id,
                        'previewBase64' => 'data:image/png;base64,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',
                        'title' => 'Casting Creado por: '.$usuario->Industria->razon_social,
                        'description' => $casteado->nombre,
                    ]
                ]);

                //echo "<script>console.log('Numero de telefono: ".str_replace("+","",$castings_seleccionados->Talentos->codigo_area). str_replace("+","",$castings_seleccionados->Talentos->telefono)."');</script>";
                //echo "<script>console.log('".$res->getStatusCode()."');</script>";
                //echo $res->getStatusCode();
                // 200
                //echo "<script>console.log('".$res->getBody()."');</script>";
                // {"type":"User"...'

         $casteado->msj_status = $res->getBody();
         $casteado->save();
        //}            




        return $proyectos;
    }

}
