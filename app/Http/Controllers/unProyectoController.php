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


class unProyectoController extends Controller
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


    public function unproyecto($uId)
    {

        $id = Auth::user()->id;             
        $usuario = Users::find($id);
        $planes = Planes::all();
        $elProyecto = $uId;
        $proyectos = Castings::where('id', $uId)->first();

        $talentosProyecto = CastingsSeleccionados::with(['Talentos', 'Talentos.Talentos',
        'Talentos.Talentos.Talento1','Talentos.Talentos.Talento2','Talentos.Talentos.Talento3','MensajesNoLeidosIndustria'])->where('casting_id', $uId)->get();

        return view('unProyecto',compact('usuario', 'proyectos', 'talentosProyecto','planes', 'elProyecto'));
    }

    public function listarTalentoSeleccionado($uId)
    {
        $elProyecto = $uId;
        $uid = Auth::user()->id;   
        $proyectos = Castings::where('id', $uId)->first();
        $deseados = CastingsSeleccionados::with(['Talentos', 'Talentos.Talentos',
        'Talentos.Talentos.Talento1','Talentos.Talentos.Talento2','Talentos.Talentos.Talento3','MensajesNoLeidosIndustria'])->where('casting_id', $uId)
        ->where('castings_seleccionados.confirmado', '0')->get();

        return view('partials._talentoSeleccionado', compact('deseados', 'elProyecto', 'proyectos'));
    }

    public function listarTalentoSeleccionadoAceptado($uId)
    {
        $elProyecto = $uId;
        $uid = Auth::user()->id;  
        $proyectos = Castings::where('id', $uId)->first();
        $deseados = CastingsSeleccionados::with(['Talentos', 'Talentos.Talentos',
        'Talentos.Talentos.Talento1','Talentos.Talentos.Talento2','Talentos.Talentos.Talento3','MensajesNoLeidosIndustria'])->where('casting_id', $uId)
        ->where('confirmado', '1')->OrderBy('favorito','DESC')->OrderBy('talento_id','ASC')->get();

       return view('partials._talentoSeleccionadoAceptado', compact('deseados', 'elProyecto', 'proyectos'));
    }

    public function listarTalentoSeleccionadoRechazado($uId)
    {
        $elProyecto = $uId;
        $uid = Auth::user()->id;  
        $proyectos = Castings::where('id', $uId)->first(); 
        $deseados = Users::where('castings_seleccionados.casting_id', $uId)
        ->where('castings_seleccionados.confirmado', '-1')
        ->leftJoin('castings_seleccionados', 'castings_seleccionados.talento_id', '=', 'users.id')
        ->leftJoin('candidato_talentos AS ct', 'users.id', '=', 'ct.usuario_id')
        ->leftJoin('nom_talentos  AS t1', 't1.id', '=', 'ct.talento1_id')
        ->leftJoin('nom_talentos  AS t2', 't2.id', '=', 'ct.talento2_id')
        ->select('users.id','users.dia','users.mes','users.anio','users.name','users.nombre',
                    'users.avatar', 't1.nombre AS talento1', 'castings_seleccionados.casting_id',
                    't2.nombre AS talento2', 'castings_seleccionados.confirmado'
                    ,'castings_seleccionados.check','castings_seleccionados.favorito','castings_seleccionados.id AS castings_seleccionados_id')->get();

          return view('partials._talentoSeleccionadoRechazado', compact('deseados', 'elProyecto', 'proyectos'));
    }



    public function elegirpagos(Request $request)
    {
        $uid = Auth::user()->id;   

        $pago = Planes::find($request->dependent);
        

          return view('partials._proyectosElegirpago', compact('pago'));
    }


    public function eliminartalentoproyecto($id,$ids)
    {
        $uid = Auth::user()->id;   
        $deseado =  CastingsSeleccionados::where('casting_id',$id)->where('id',$ids);
        $deseado->delete();
        return back();
    }



    public function generatepdf(Request $request,$id)
    {
        $rangoids[] = '';
        $proyectos = Castings::find($id);
		

        $proyecto = $proyectos->nombre;

        $busqueda = 'Talentos que Aceptaron';
 
		$i = 0;
	    foreach ($proyectos->Aceptados as $value) {
			 if($value->check == 1){
				 $rangoids[$i] = $value->talento_id;
                 $i++;
                }
         }


        $users = Users::where('perfil', 1)->wherein('id', $rangoids)->get();

 
		$data = compact('users','proyecto','busqueda');

        $pdf = PDF::loadView('exportatalentos',$data);
  
         return $pdf->setPaper('a4', 'portrait')->download($proyecto.'.pdf');
         
		
		
    }



    public function perfiltalentoselec($id)
    {
        $usuario = Users::find($id);

        return view('perfiltalentoseleccionado', compact('usuario'));
    }





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
    

    public function finalizarseleccion(Request $request, $castid)
    {
        $uid = Auth::user()->id;   
        $proyectos = Castings::find($castid);


        if ($proyectos->proyecto_id == 0) {

            $proyectos->seleccion_finalizada = 1;
            $proyectos->Save();

            /////AQUI DEBERIAMOS COMUNICAR A LA GENTE DE IVO QUE 
            ////ESTE ES UN CASTING TIPO ASISTENCIA



            /////AQUI DEBERIAMOS COMUNICAR A LOS ACEPTADOS Y A LOS QUE NO

            return redirect()->back();

        }
        else{

            $plan = Pago_planes::where('Activado', 1)
            ->where('Activo', 1)
            ->where('id_proyecto',$castid)
            ->first();



            ////NOS FIJAMOS SI TIENE MENOS ACEPTADOS QUE LO QUE EL PLAN POSEE
            ////SI ES ASI ENTRA POR TRUE

            if($proyectos->Aceptados->Count() <= $plan->talentos){

                $proyectos->seleccion_finalizada = 1;
                $proyectos->Save();

                $plan->activo = 0;
                $plan->Save();

                
                /////AQUI DEBERIAMOS COMUNICAR A LOS ACEPTADOS Y A LOS QUE NO

                return redirect()->back();

            }else{

                return redirect()->back()->withErrors(['msg', 'Debe seleccionar Menos Talentos. No puede superar los: $plan->talentos']);

            }


        }

    }



    public function obtenerchat($id,$casting)
    {
        
        $emisor_id = Auth::user()->id;   
        $receptor = Users::find($id);
        $id = $receptor->id;

        $messages = Chats::where(function ($query) use ($emisor_id,$id,$casting)  {
            $query->where('emisor_id', $emisor_id) 
                  ->where('receptor_id', $id)
                  ->where('casting_id',$casting);
        });
      
        $messages = $messages->orwhere(function ($query) use ($emisor_id,$id,$casting)  {
            $query->where('receptor_id', $emisor_id) 
                  ->where('emisor_id', $id)
                  ->where('casting_id',$casting);
        });
        

    
        $messages = $messages->get();
        
        $devolver = ' <div class="contact-profile">
        <img src="https://ivotalent.s3-accelerate.amazonaws.com/files/thumbs/profile/'.$receptor->id.'/540px_foto_'.$receptor->id.'.png" alt="">
        <p> Talento '.$receptor->id.'</p>
        <div class="social-media">
         
        
        </div>
      </div>
      <div class="messages"  id="msjes">
      <ul>'; 

     

        foreach($messages as $valor){
            $parcial = "";
         $tamaño = "";

          if($valor->tipo_mensaje == 'VIDEO'){
              $tamaño = ' style="max-width: 500px;" ';
          }
            
                if($valor->Emisor->id == $emisor_id){
                    $parcial = ' <li class="sent">
                        <img  src="https://ivotalent.s3-accelerate.amazonaws.com/files/thumbs/profile/'.$valor->Emisor->id.'/540px_foto_'.$valor->Emisor->id.'.png">
                        <p '.$tamaño.'>'.$valor->mensaje.'<br><br><small style="color:white">'.$valor->created_at.'</small></p>
                    </li>
                    ';
                }
                else{
                $parcial = ' <li class="replies">
                        <img  src="https://ivotalent.s3-accelerate.amazonaws.com/files/thumbs/profile/'.$valor->Emisor->id.'/540px_foto_'.$valor->Emisor->id.'.png">
                        <p'.$tamaño.'>'.$valor->mensaje.'<br><br><small>'.$valor->created_at.'</small></p>

                    </li>
                    ';
                    $valor->visto = 1;
                    $valor->save();
                 }
        
        
           

            $devolver = $devolver.$parcial;

           
    }

    $devolver = $devolver.'</ul> </div>';
       return $devolver;

    }



    public function enviarmensajechat(Request $request, $id)
    {

        $censor = new CensorWords;
        $badwords = $censor->setDictionary('es');

       $devolucion = "";
        $cuenta = 0;
		$patron = '/[A-Za-z]+@[a-z]+\.[a-z]+/';
        $mensajillo =  preg_replace($patron,'#', $request->mensajillo,-1, $cuenta);
		
		if($cuenta>0){			
			$devolucion = $devolucion."El mensaje tiene un texto inválido: <b>No se puede enviar un EMAIL</b>.<br>";	
			goto salir;			
		}
		
		
		$cuenta = 0;
		//$mensajillo = preg_replace('/[[:digit:]]/','', $mensajillo,-1, $cuenta);	

        if($cuenta>0){			
			$devolucion = $devolucion."El mensaje tiene un texto inválido: <b>No se puede enviar Digitos Numericos</b>.<br>";	
			goto salir;			
		}
		
		//reemplazo cualquier caracter especial	
		//$mensajillo = preg_replace('/[[:punct:]]/','', $mensajillo);
		
		//reemplazo cualquier espacio
		//$mensajillo = str_ireplace(" ","",$mensajillo);
			
		
        //$string = $censor->censorString($mensajillo);
		
		
		//if(empty($string['matched'])){
			$devolucion = $request->mensajillo;
		//}else{
		//	$devolucion = $devolucion."El mensaje tiene un texto inválido: <b>Numeros en Letras o Dominio de Email";
		
		//	$devolucion = $devolucion."</b>.<br>";	
		//}
		
		
		
        salir: 
        $emisor_id = Auth::user()->id;   
        


        $primerMensaje = 0;
        $primerMensaje = Chats::where('emisor_id',$emisor_id)
                                ->where('receptor_id',$id)
                                ->where('casting_id',$request->casting_id)
                                ->count();

        $res = "";
        //if($primerMensaje <= 0){

            $emisor = Users::find($emisor_id);
            $receptor = Users::find($id);
            $casting = Castings::find($request->casting_id);

                $telefono = "";


                ///SE FIJA SI TIENE MANAGER O REPRESENTANTE
                if($receptor->Manager->telefono){
                    $telefono = str_replace("+","",$receptor->Manager->codigo_area). str_replace("+","",$receptor->Manager->telefono);
                }
                else{
                    if($receptor->Representante->telefono){
                        $telefono = str_replace("+","",$receptor->Representante->codigo_area). str_replace("+","",$receptor->Representante->telefono);
                    }
                    else{                    
                        $telefono = str_replace("+","",$receptor->codigo_area). str_replace("+","",$receptor->telefono);
                    }
                
                }


                

                $client = new Client();
                $res = $client->request('POST', 'https://eu35.chat-api.com/instance61506/sendLink?token=wai2925z4n315or1', [
                    'form_params' => [
                        'phone' => $telefono,
                        'body' => 'https://talentos.ivotalents.com/mensajes',
                        'previewBase64' => 'data:image/png;base64,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',
                        'title' => 'Tienes un nuevo mensaje del proyecto:'.$casting->nombre,
                        'description' => 'Este mensaje se relaciona al Casting: '.$casting->nombre.', puedes verlo desde el link que se adjunta a continuación.',
                    ]
                ]);


              $res =  $res->getBody(); 
             
            //}


            $mensaje =  new Chats;

            $embed = Embed::make($devolucion)->parseUrl();

             if ($embed) {
                $embed->setAttribute(['width' => 400]);

               $devolucion = $embed->getHtml();
            }

            $mensaje->emisor_id =  $emisor_id;
            $mensaje->receptor_id =  $id;
            $mensaje->mensaje =  $devolucion;
            $mensaje->casting_id =  $request->casting_id;
            $mensaje->tipo_mensaje =  'CHAT';
            $mensaje->status = $res;
            $mensaje->visto =  0;
            $mensaje->save();

        return $this->obtenerchat($id,$request->casting_id);


    }



    public static function obtenerchatNoVisto($emisor_id,$casting)
    {

   
        $receptor_id = Auth::user()->id;   

        $messages = Chats::where('emisor_id', $emisor_id)
                   ->where('receptor_id', $receptor_id)
                  ->where('casting_id',$casting)
                  ->where('visto',0);
      
        return $messages->count();
        
    }


    public function enviarchatvideo(Request $request, $id)
    {

        $censor = new CensorWords;
        $badwords = $censor->setDictionary('es');
        $devolucion = "";
        $cuenta = 0;
        $patron = '/[A-Za-z]+@[a-z]+\.[a-z]+/';
        $mensajillo =  preg_replace($patron,'#', $request->mensajillo,-1, $cuenta);
        
        if($cuenta>0){          
            $devolucion = $devolucion."El mensaje tiene un texto inválido: <b>No se puede enviar un EMAIL</b>.<br>";    
            goto salir;         
        }
        
           
        //reemplazo cualquier espacio
        $mensajillo = str_ireplace(" ","",$mensajillo);
            
        
        $string = $censor->censorString($mensajillo);
    
            
        if(empty($string['matched'])){
            $devolucion = $request->mensajillo;
        }else{
            $devolucion = $devolucion."El mensaje tiene un texto inválido: <b>Numeros en Letras o Dominio de Email";
                            
            $devolucion = $devolucion."</b>.<br>";  
        }
        
                        
        
        salir: 
        $emisor_id = Auth::user()->id;  
        $mensaje =  new Chats;


        $embed = Embed::make($devolucion)->parseUrl();

        if ($embed) {
            $embed->setAttribute(['width' => 400]);

           $devolucion = $embed->getHtml();
        }

        $mensaje->emisor_id =  $emisor_id;
        $mensaje->receptor_id =  $id;
        $mensaje->mensaje = $devolucion;        
        $mensaje->casting_id = $request->casting_id;
        $mensaje->tipo_mensaje =  'VIDEO';
        $mensaje->visto =  0;
        $mensaje->save();


        //marco todos los mensajes que me enviaron como leidos.
        $mismensajes = Chats::where('emisor_id',$id)->where('receptor_id',$emisor_id)->get();

        foreach ($mismensajes as $key => $value) {
            $value->visto = 1;
            $value->save();
        }

        //return $this->obtenerchat($id,$request->casting_id);


    }

    public function mostrarvideo($id)
    {

        return view('modals._modalVideo', compact('id'));
    }



}
