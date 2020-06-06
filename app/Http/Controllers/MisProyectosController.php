<?php

namespace App\Http\Controllers;
use App\Models\Users;
use App\Models\UsersReferidos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Castings\CastingsSeleccionados;
use App\Models\Castings\Castings;
use App\Models\Admin\Pago_planes;
use GuzzleHttp\Client;
use Redirect;
use App\Models\Nomencladores\NomPaises;
use App\Models\Nomencladores\NomCiudades;
use Illuminate\Support\Str;
use App\Models\Mensajes;
use Mail;
use App\Mail\NotificarProyecto;
use File;
use Illuminate\Support\Facades\Storage;
use Zip;

class MisProyectosController extends Controller
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


    ////PAGINA INICIAL DE LISTA DE PROYECTOS
    public function index(Request $request)
    {
        $id = Auth::user()->id;             
        $usuario = Users::find($id);
        $paises = NomPaises::all()->sortBy('nombre');
        $id_pais = $usuario->Industria->pais_id ? $usuario->Industria->pais_id  : 1;
        $pais = NomPaises::find($id_pais);

        if($pais){
            $ciudades = NomCiudades::where('codigo_pais',$pais->codigo_pais)->orderBy('nombre')->get();  
        }
        else{
            $ciudades = NomCiudades::find(0);   
        }

        $proyectos = Castings::with(['Seleccionados','Aceptados','Rechazados','Usuario'])->where('usuario_id', $id)->orderByRaw('id DESC')->paginate(10);
        
        if($request->descripcion_buscar){
            $buscar = $request->descripcion_buscar;
            $candidatos = $proyectos->where(function ($query) use ($buscar)  {
                $query->where('descripcion', 'like', '%' . $buscar . '%')
                      ->orwhere('nombre', 'like', '%' . $buscar . '%');
            });

        }


        if($request->desde_buscar){
            $proyectos =  $proyectos->where('fecha_inicio', '>=', $request->desde_buscar)->whereNotNull('fecha_inicio');

        }


        if($request->hasta_buscar){
            $proyectos =  $proyectos->where('fecha_fin', '<=', $request->hasta_buscar)->whereNotNull('fecha_fin');

        }

        if($request->evento_buscar){
            $oficios = $request->get('evento_buscar');
            $proyectos =  $proyectos->where('tipo_casting',  $oficios)->whereNotNull('tipo_casting');

        }


        return view('misproyectos',compact('usuario','proyectos','paises','ciudades'));
    }




    ////EDITAR PROYECTO
    public function editarproyecto(Request $request,$id)
    {
        $proyectos = Castings::where('id', $id)->get();
        return(json_encode($proyectos));
        
    }
    

      ////EDITAR PROYECTO
      public function editarproyectoform(Request $request,$id)
      {
          
        $Castings = Castings::find($id);
        
        $paises = NomPaises::where('codigo_pais', $request->pais_evento_edit)->first();
        $ciudades = NomCiudades::where('id',$request->ciudad_evento_edit)->first();  


        $Castings->nombre = $request->titulo_edit;
        $Castings->descripcion = $request->descripcion_breve_edit;
        $Castings->tipo_casting = $request->tipo_evento_edit;

        if($ciudades){
            $Castings->lugar = $paises->nombre.'/'.$ciudades->nombre;
        }else{
            $Castings->lugar = $paises->nombre.'/Sin Ciudad';
        }        

        $Castings->fecha_inicio = $request->fecha_desde_edit;
        $Castings->fecha_fin = $request->fecha_hasta_edit;

        $Castings->horario = $request->horario_desde_edit.' - '.$request->horario_hasta_edit;

        if($request->derechos_para_edit){
            $derechos= implode(", ",$request->derechos_para_edit);
        }else{
            $derechos= "";
        }

        $Castings->tiempo = $request->derechos_cantidad_edit.' - '.$request->derechos_tiempo_edit.' - '.$derechos;
        $Castings->fecha_pago = $request->pago_fecha_edit;

        $uid = Auth::user()->id;   
        $Castings->usuario_id = $uid;

        $Castings->uid = Str::random(32);
        
        $Castings->cantidad_talentos = $request->cantidad_talentos_edit;
        $Castings->observaciones = $request->observaciones_edit;
        $Castings->marca = $request->marca_edit;
        $Castings->save();



    
          return redirect()->back();
          
      }
      
  



     ////PAGINA INICIAL DE LISTA DE PROYECTOS
     public function buscarProyectos(Request $request)
     {
        $id = Auth::user()->id;             
        $usuario = Users::find($id);
        $paises = NomPaises::all()->sortBy('nombre');
        $id_pais = $usuario->Industria->pais_id ? $usuario->Industria->pais_id  : 1;
        $pais = NomPaises::find($id_pais);

        if($pais){
            $ciudades = NomCiudades::where('codigo_pais',$pais->codigo_pais)->orderBy('nombre')->get();  
        }
        else{
            $ciudades = NomCiudades::find(0);   
        }
 
         $proyectos = Castings::where('usuario_id', $id);

         if($request->descripcion_buscar){
            $buscar = $request->descripcion_buscar;
            $candidatos = $proyectos->where(function ($query) use ($buscar)  {
                $query->where('descripcion', 'like', '%' . $buscar . '%')
                      ->orwhere('nombre', 'like', '%' . $buscar . '%');
            });

        }


        if($request->desde_buscar){
            $proyectos =  $proyectos->where('fecha_inicio', '>=', $request->desde_buscar)->whereNotNull('fecha_inicio');

        }


        if($request->hasta_buscar){
            $proyectos =  $proyectos->where('fecha_fin', '<=', $request->hasta_buscar)->whereNotNull('fecha_fin');

        }


        if($request->evento_buscar){
            $oficios = $request->get('evento_buscar');
            $proyectos =  $proyectos->where('tipo_casting', $oficios)->whereNotNull('tipo_casting');

        }

         $proyectos = $proyectos->orderByRaw('id DESC')
         ->paginate(10);
 
         return view('misproyectos',compact('usuario','proyectos','paises','ciudades'));
     }


    ////PAGINA INICIAL DE LISTA DE PROYECTOS
    public function listarMisProyectos()
    {
        $id = Auth::user()->id;             
        $usuario = Users::find($id);

        $proyectos = Castings::where('usuario_id', $id)
        ->orderByRaw('id DESC')
        ->paginate(10);

        return view('partials._misproyectoslist',compact('proyectos'));
    }


    ////AGREGA UN NUEVO PROYECTO, ES LA FUNCION DE LA HOME, HAY OTRA AGREGAR PROYECTO EN 
    ////PROYECTOSCONTROLLER (ES UNA API: agregarporbuscador)
    public function agregarproyecto(Request $request)
    {
        $uid = Auth::user()->id;   
   
                $Castings = new Castings;  
                // guarda si el tipo de casting es con asistencia o pago   
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

                $casteado = Castings::find($Castings->id);
                $usuario = Users::find($uid);

            
                
                        $empresa = Users::find($uid);

                        
                        $client = new Client();
                        $res = $client->request('POST', 'https://eu35.chat-api.com/instance61506/sendLink?token=wai2925z4n315or1', [
                            'form_params' => [
                                'phone' => 50761344220,
                                'body' => url('/').'/ver-casting/'.$casteado->id,
                                'previewBase64' => 'data:image/png;base64,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',
                                'title' => 'Casting Creado por: '.$empresa->Industria->razon_social,
                                'description' => $casteado->nombre,
                            ]
                        ]);

                 $casteado->msj_status = $res->getBody();
                 $casteado->save();
                //}            

                return redirect('/buscar');
    }


    ////ELIMINA EL PROYECTO
    public function eliminarproyecto(Request $request,$id)
    {
        $uid = Auth::user()->id;   

        $deseado =  Castings::where('id',$id);
        $deseado->delete();
       

        $castings_seleccionadoess =  CastingsSeleccionados::where('casting_id',$id);
        $castings_seleccionadoess->delete();
    }


    ////ENVIA NOTIFICACION MASIVA EN LA SECCION DE PROYECTOS, ES PARA ENVIAR 
    ////EL MISMO MENSAJE A TODOS LOS TALENTOS QUE ESTAN CHEQUEADOS.
    public function enviarNotificacion($id)
        {
            $castings_seleccionadoess =  CastingsSeleccionados::where('casting_id',$id)->get();
            

            foreach($castings_seleccionadoess as $castings_seleccionados){

            $empresa = Users::find($castings_seleccionados->industria_id);
            $castings =  Castings::where('id',$castings_seleccionados->casting_id)->first();

            $client = new Client();

            $telefono = "";

                            

                                if($castings_seleccionados->Talentos->Manager->telefono){
                                    $telefono = str_replace("+","",$castings_seleccionados->Talentos->Manager->codigo_area). str_replace("+","",$castings_seleccionados->Talentos->Manager->telefono);
                                }
                                else{
                                    if($castings_seleccionados->Talentos->Representante->telefono){
                                        $telefono = str_replace("+","",$castings_seleccionados->Talentos->Representante->codigo_area). str_replace("+","",$castings_seleccionados->Talentos->Representante->telefono);
                                    }
                                    else{                    
                                        $telefono = str_replace("+","",$castings_seleccionados->Talentos->codigo_area). str_replace("+","",$castings_seleccionados->Talentos->telefono);
                                    }
                                
                                }
                                $res = $client->request('POST', 'https://eu35.chat-api.com/instance61506/sendLink?token=wai2925z4n315or1', [
                                    'form_params' => [
                                        'phone' => $telefono,
                                        'body' => 'https://talentos.ivotalents.com/acept-cast/'.$castings_seleccionados->uid,
                                        'previewBase64' => 'data:image/png;base64,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',
                                        'title' => 'Tenemos un Casting on line para ti:  ',
                                        'description' => ''.strtoupper($castings->nombre).',haz clic al link que se adjunta y responde.',
                                    ]
                                ]);

                                $castings_seleccionados->msj_status = "Telefono: ".$telefono." ".$res->getBody(); 
                                $castings_seleccionados->save();

           //}

           $castings->solicito_disponibilidad = 1;  
           $castings->save(); 
           
          }

            
    }


    ////ENVIA NOTIFICACION INDIVIDUAL, SIRVE POR SI HUBO UN ERROR AL ENVIAR EL MASIVO
    public function Notificar($id)
        {
            $castings_seleccionados =  CastingsSeleccionados::where('id',$id)->first();
            $empresa = Users::find($castings_seleccionados->industria_id);
            $uid = Auth::user()->id;   
            $castings =  Castings::where('id',$castings_seleccionados->casting_id)->first();

            $client = new Client();

            $telefono = "";


                    if($castings_seleccionados->Talentos->Manager->telefono){
                        $telefono = str_replace("+","",$castings_seleccionados->Talentos->Manager->codigo_area). str_replace("+","",$castings_seleccionados->Talentos->Manager->telefono);
                    }
                    else{
                        if($castings_seleccionados->Talentos->Representante->telefono){
                            $telefono = str_replace("+","",$castings_seleccionados->Talentos->Representante->codigo_area). str_replace("+","",$castings_seleccionados->Talentos->Representante->telefono);
                        }
                        else{                    
                            $telefono = str_replace("+","",$castings_seleccionados->Talentos->codigo_area). str_replace("+","",$castings_seleccionados->Talentos->telefono);
                        }
                    
                    }
        
                    $res = $client->request('POST', 'https://eu35.chat-api.com/instance61506/sendLink?token=wai2925z4n315or1', [
                        'form_params' => [
                            'phone' => $telefono,
                            'body' => 'https://talentos.ivotalents.com/acept-cast/'.$castings_seleccionados->uid,
                            'previewBase64' => 'data:image/png;base64,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',
                            'title' => 'Tenemos un Casting on line para ti:  ',
                            'description' => ''.strtoupper($castings->nombre).',haz clic al link que se adjunta y responde.',
                        ]
                    ]);

                   
                    $castings_seleccionados->msj_status = $res->getBody(); 
                    $castings_seleccionados->save();

        $ids = Auth::user()->id;  
        $castingSelect = CastingsSeleccionados::where('casting_id', $id)->first();
        $usuario = Users::find($ids);
        $industria = Users::find($castings_seleccionados->industria_id)->first();
        
        $mensaje = new Mensajes();
        $mensaje->emisor_id = Auth::user()->id;
        $mensaje->receptor_id = $castings_seleccionados->talento_id;
        $mensaje->numero_recibido = $telefono;      
        $mensaje->mensaje = url('/').'/acept-cast/'.$castings_seleccionados->uid;  
        $mensaje->status = $res->getBody(); 
        $mensaje->casting_seleccionado_id = $castings_seleccionados->id;
        $mensaje->casting_id = $castings_seleccionados->casting_id;   
        $mensaje->visto = 0;
        $mensaje->tipo_mensaje = 'REENVIO POR MENSAJE FALLIDO';

        $mensaje->save();

        $castingSelect->msj_status = $res->getBody();
        $castingSelect->save();

         
    }

    

    public function vertalentosproyectos(Request $request)
    {
        $id = Auth::user()->id;             
        $usuario = Users::find($id);
        $id_casting = $request->dependent;

        $proyectos = Castings::find($id_casting);


        return view('partials._talentosporproyecto',compact('proyectos'));
    }

    ////ENVIA PROYECTO POR MAIL 
    public function enviarpormail(Request $request,$castid)
    {
        
        $casting =  Castings::find($castid);
        $id = $casting->usuario_id;
        $user = Users::find($id);  
        Mail::to($request->email)->send(new NotificarProyecto($casting,$user));
    }


    ////ENVIA PROYECTO POR SMS
    public function enviarpormsj(Request $request,$castid)
    {
       
        $castings_seleccionadoess =  CastingsSeleccionados::where('casting_id',$castid)->where('check',1)->get();

        foreach($castings_seleccionadoess as $castings_seleccionados){

        $empresa = Users::find($castings_seleccionados->industria_id);
        $castings =  Castings::where('id',$castings_seleccionados->casting_id)->first();

        $client = new Client();

        $telefono = "";

                        
                            if($castings_seleccionados->Talentos->Manager->telefono){
                                $telefono = str_replace("+","",$castings_seleccionados->Talentos->Manager->codigo_area). str_replace("+","",$castings_seleccionados->Talentos->Manager->telefono);
                            }
                            else{
                                if($castings_seleccionados->Talentos->Representante->telefono){
                                    $telefono = str_replace("+","",$castings_seleccionados->Talentos->Representante->codigo_area). str_replace("+","",$castings_seleccionados->Talentos->Representante->telefono);
                                }
                                else{                    
                                    $telefono = str_replace("+","",$castings_seleccionados->Talentos->codigo_area). str_replace("+","",$castings_seleccionados->Talentos->telefono);
                                }
                            
                            }
                            $res = $client->request('POST', 'https://eu35.chat-api.com/instance61506/sendLink?token=wai2925z4n315or1', [
                                'form_params' => [
                                    'phone' => $telefono,
                                    'body' => url('/').'/#/',
                                    'previewBase64' => 'data:image/png;base64,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',
                                    'title' => $empresa->Industria->razon_social.': '.$request->titulo,
                                    'description' => $request->msj,
                                ]
                            ]);
                        
                            
                            $mensaje = new Mensajes();
                            $mensaje->emisor_id = Auth::user()->id;
                            $mensaje->receptor_id = $castings_seleccionados->talento_id;
                            $mensaje->numero_recibido = $telefono;      
                            $mensaje->mensaje = $request->msj; 
                            $mensaje->status = $res->getBody(); 
                            $mensaje->casting_seleccionado_id = $castings_seleccionados->id;
                            $mensaje->casting_id = $castings_seleccionados->casting_id;   
                            $mensaje->visto = 0;
                            $mensaje->tipo_mensaje = 'MENSAJE PERSONALIZADO';
                            $mensaje->save();


      }
    }
    
    ////DESCARGA LAS FOTOS DE LOS TALENTOS DE UN PROYECTO.
	public function descargarFotos(Request $request,$id)
    {
        $uid = Auth::user()->id;   

    if(file_exists(public_path().'/files/downloads/Casting_'.$id.'.zip')){
          return '<a href="'.url('/').'/files/downloads/Casting_'.$id.'.zip">Descargar Archivo</a><br>';
    }
    else{


		$path = public_path().'/files/downloads/'.$id;
		$result = File::makeDirectory($path, $mode = 0777, true, true);
		
		//OBTENGO SELECCIONADOS DEL Casting
		$castingSelect = CastingsSeleccionados::where('casting_id', $id)->where('confirmado',1)->where('check',1)->orderBy('id','ASC')->get();
		 
		 foreach($castingSelect as $cs){
				$result = File::makeDirectory($path.'/'.$cs->talento_id, $mode = 0777, true, true);
				
                $url = $cs->Talentos->avatar;
                $uri = substr($url, strpos($url, 'files'));

                if(Storage::disk('s3')->exists($uri)) {
                      $contents = file_get_contents($url);
                      $name = substr($url, strrpos($url, '/') + 1);
                      file_put_contents('files/downloads/'.$id.'/'.$cs->talento_id.'/'.$name, $contents);
         
                }

                else{
                    $complete = 'https://ivotalent.s3-accelerate.amazonaws.com/files/thumbs/profile/'.$cs->talento_id.'/'.'540px_foto_'.$cs->talento_id.'.png';
                    $partial = 'files/thumbs/profile/'.$cs->talento_id.'/'.'540px_foto_'.$cs->talento_id.'.png';
                    if(Storage::disk('s3')->exists($partial)) {
                        $contents = file_get_contents($complete);
                        file_put_contents('files/downloads/'.$id.'/'.$cs->talento_id.'/'.$cs->talento_id.'.png', $contents);
                  
                  }

                }
						
                foreach($cs->Talentos->Fotos  as $foto){
                        $complete = 'files/thumbs/images/'.$foto->usuario_id.'/'.'540px_foto_'.$foto->nombre_fisico;
                        if(Storage::disk('s3')->exists($complete)) {
                                $contents = file_get_contents('https://ivotalent.s3-accelerate.amazonaws.com/'.$complete);
                                file_put_contents('files/downloads/'.$id.'/'.$cs->talento_id.'/'.'540px_foto_'.$foto->nombre_fisico, $contents);
                        }
                
                }
				
				
		 }
		

         $zip = Zip::create('files/downloads/Casting_'.$id.'.zip');
         $zip->add('files/downloads/'.$id,true);
         $zip->close();
		
	     File::deleteDirectory(public_path('files/downloads/'.$id));
		
        return '<a href="'.url('/').'/files/downloads/Casting_'.$id.'.zip">Descargar Archivo</a><br>';

        }

    }
	



    ////ACEPTA EL CODIGO PROMOCIONAL REFERIDO
    public function aceptarcodigo(Request $request,$id)
    {
        $uid = Auth::user()->id;   
        $usuario =  Users::find($id);

        $usuarioPromocionador =  Users::where('codigo_promocional',$request->codigo_promocional)->first();

        if($usuarioPromocionador){
            $referido = new UsersReferidos();

            $referido->referente_id = $usuarioPromocionador->id;
            $referido->referido_id = $usuario->id;
            $referido->save();

            $usuario->codigo_referido =  $usuarioPromocionador->codigo_promocional;
            $usuario->save();

            return 1;

        }
        
        return 0;

    }
    
    ////RECHAZA EL CODIGO PROMOCIONAL REFERIDO
    public function cancelarcodigo(Request $request,$id)
    {
        $uid = Auth::user()->id;   

        $usuario =  Users::find($id);
        
        if(!$usuario->codigo_referido){
            $usuario->codigo_referido = 'CANCELADO';
            $usuario->save();

          }      
    }

    ////SE FIJA SI POSEE UN PAGO ACTIVO. DEBERIA ESTAR EN PAGOS CONTROLLER
    public function poseePago(Request $request)
    {
    
        /*
        $plan = Pago_planes::where('id_usuario', auth()->id())
        ->where('Activado', 1)
        ->where('Activo', 1)
        ->whereNull('id_proyecto')
        ->orderBy('id','DESC')
        ->first();
        
    
        if($plan) {
                return 1;
        }else{
                return 0;
        }
        */

        return 1;


    }

    
}
