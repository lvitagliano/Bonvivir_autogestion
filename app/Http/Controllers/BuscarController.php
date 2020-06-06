<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use App\Models\Nomencladores\NomSexo;
use App\Models\Nomencladores\NomPaises;
use App\Models\Nomencladores\NomCiudades;
use App\Models\Nomencladores\NomNacionalidades;

use App\Models\Nomencladores\NomOficios;
use App\Models\Nomencladores\NomHobbies;

use App\Models\Nomencladores\NomTalentos;
use App\Models\Nomencladores\NomTalentosCategoria;
use App\Models\Nomencladores\NomTalentosEspecialidad;
use App\Models\Nomencladores\NomTalentosGenero;
use App\Models\Nomencladores\NomIdiomas;

use App\Models\Nomencladores\NomTonoPiel;
use App\Models\Nomencladores\NomColorOjos;
use App\Models\Nomencladores\NomContextura;
use App\Models\Nomencladores\NomEtnias;
use App\Models\Nomencladores\NomLooks;
use App\Models\Nomencladores\NomColorCabello;

use App\Models\Nomencladores\NomTallaCamisa;
use App\Models\Nomencladores\NomTallaPantalon;
use App\Models\Nomencladores\NomTallaZapatos;

use App\Models\Admin\Porcentaje;

use App\Models\Castings\CastingsSeleccionados;
use App\Models\Castings\Castings;
use GuzzleHttp\Client;
use App\Models\Mensajes;

use App\Models\Talento\CandidatosDeseados;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Admin\Pago_planes;
use App\Models\Admin\Planes;


class BuscarController extends Controller
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
    public function index()
    {
        $id = Auth::user()->id;           
        $usuario = Users::find($id);
        $usuarios = Users::whereNotNull('avatar')->where('perfil',1)->orderBy('id', 'DESC')->select('id','avatar')->take(19)->get();
        
        $sexos = NomSexo::all(['id','nombre'])->sortBy('nombre'); 
        $paises = NomPaises::all(['codigo_pais','nombre'])->sortBy('nombre'); 
        $ciudades = NomCiudades::Take(0)->get(); 
        $nacionalidades = NomNacionalidades::all(['gentilicio_nac'])->sortBy('nombre'); 
        $idiomas = NomIdiomas::all(['id','nombre'])->sortBy('nombre'); 
        $talentos = NomTalentos::all(['id','nombre'])->sortBy('nombre'); 
        $talentoscategorias = NomTalentosCategoria::Take(0)->get(); 
        $talentosespecialidades = NomTalentosEspecialidad::Take(0)->get(); 
        $talentosgeneros = NomTalentosGenero::Take(0)->get(); 

        $pieles = NomTonoPiel::all(['id','nombre'])->sortBy('nombre');
        $ojos = NomColorOjos::all(['id','nombre'])->sortBy('nombre');
        $contexturas = NomContextura::all(['id','nombre'])->sortBy('nombre');
        $etnia = NomEtnias::all(['id','nombre'])->sortBy('nombre');
        $looks = NomLooks::all(['id','nombre'])->sortBy('nombre');
        $cabellos = NomColorCabello::all(['id','nombre'])->sortBy('nombre');

        $camisa = NomTallaCamisa::all(['id','nombre'])->sortBy('nombre');
        $pantalon = NomTallaPantalon::all(['id','nombre'])->sortBy('nombre');
        $zapatos = NomTallaZapatos::all(['id','nombre'])->sortBy('nombre');

        $oficios = NomOficios::all(['id','nombre'])->sortBy('nombre'); 
        $hobbies = NomHobbies::all(['id','nombre'])->sortBy('nombre'); 

        $proyectos = Castings::where('usuario_id', $id)->orderby('id','DESC')->get();
        $deseados =  DB::table('users')->whereNotNull('avatar')->select('users.id')->get();

        $offset = 0;
        return view('buscar',compact('usuario','sexos','paises','ciudades','nacionalidades','talentos',
        'talentoscategorias','talentosespecialidades','talentosgeneros','pieles','ojos','contexturas','etnia','looks',
        'cabellos','camisa','pantalon','zapatos','idiomas','oficios','hobbies','proyectos','usuarios','offset','deseados'));
    }



    public function talentosInicial()
    {
        $id = Auth::user()->id;     
                
         $candidatos = Users::whereNotNull('avatar')->where('perfil',1)->orderBy('id', 'DESC')->take(19)->get();
        return view('partials._resultadosbuscador',compact('candidatos'));
    }


    public function buscarTalentos(Request $request)
    {
        $sexo = $request->get('sexo');
        $pais = $request->get('pais');
        $ciudad = $request->get('ciudad');
        $idiomas = $request->get('idioma');

        $edad_desde = $request->get('edad_desde') ? $request->get('edad_desde') : 0;
        $edad_hasta = $request->get('edad_hasta') ? $request->get('edad_hasta') : 100;

        $talento = $request->get('talento');
        $genero = $request->get('genero');
        $categoria = $request->get('categoria');
        $especialidad = $request->get('especialidad');
      
        $oficios = $request->get('oficios');
        $hobbies = $request->get('hobbies');


        $piel = $request->get('piel');
        $ojos = $request->get('ojos');
        $cabello = $request->get('cabello');
        $complexion = $request->get('complexion');
        $look = $request->get('look');
        $tatuaje = $request->get('tatuaje');

        $ides = $request->get('ides');
        $camisa = $request->get('camisa');
        $pantalon = $request->get('pantalon');
        $zapato = $request->get('zapato');
		$nacionalidad = $request->get('nacionalidad');

        $candidatos =  Users::whereNotNull('avatar')->where('perfil','=', '1');
                                     
        $candidatos = $candidatos->whereRaw('edad BETWEEN ? AND ?', [$edad_desde, $edad_hasta]);            
        
        if($ides){
            $candidatos = $candidatos->wherein('id', $ides);
        }

        if($sexo){
            $candidatos = $candidatos->wherein('sexo_id', $sexo);
        }

		if($pais){
            $candidatos = $candidatos->whereHas('Pais',function ($query) use ($pais)  {
                $query->where('codigo_pais', $pais);
            });
        }

		
		if($ciudad){
            $candidatos = $candidatos->whereHas('Ciudad',function ($query) use ($ciudad)  {
                $query->where('ciudad_id', $ciudad);
            });
        }

		if($nacionalidad){
            $candidatos = $candidatos->whereHas('Nacionalidad',function ($query) use ($nacionalidad)  {
                $query->where('nacionalidad_id', $nacionalidad);
            });
        }
		
        if($talento){
            $candidatos = $candidatos->whereHas('Talentos',function ($query) use ($talento)  {
                $query->where('talento1_id', $talento)->orwhere('talento2_id', $talento);
            });
        }

                
        if($genero){
            $candidatos = $candidatos->whereHas('Talentos',function ($query) use ($genero)  {
                $query->where('genero1_id', $genero)->orwhere('genero2_id', $genero);
            });
        }

        if($categoria){
            $candidatos = $candidatos->whereHas('Talentos',function ($query) use ($categoria)  {
                $query->where('categoria1_id', $categoria)->orwhere('categoria2_id', $categoria);
            });
        }

        if($especialidad){
            $candidatos = $candidatos->whereHas('Talentos',function ($query) use ($especialidad)  {
                $query->where('especialidad1_id', $especialidad)->orwhere('especialidad2_id', $especialidad);
            });
        }



        if($oficios and $oficios[0]){
            $candidatos = $candidatos->whereHas('Oficios',function ($query) use ($oficios)  {
                $query->wherein('oficio1_id', $oficios);
                $query = $query->orwherein('oficio2_id', $oficios);
                $query = $query->orwherein('oficio3_id', $oficios);
            });
        }

        if($hobbies and $hobbies[0]){
            $candidatos = $candidatos->whereHas('Hobbies',function ($query) use ($hobbies)  {
                $query->wherein('hobbie1_id', $hobbies)
                      ->orwherein('hobbie2_id', $hobbies)
                      ->orwherein('hobbie3_id', $hobbies);
            });
        }

        if($idiomas and $idiomas[0]){
            $candidatos = $candidatos->whereHas('Idiomas',function ($query) use ($idiomas)  {
                $query->wherein('idioma1_id', $idiomas) 
                      ->orwherein('idioma2_id', $idiomas) 
                      ->orwherein('idioma3_id', $idiomas);
            });
        }


        
        if($piel){
            $candidatos = $candidatos->whereHas('Fenotipos',function ($query) use ($piel)  {
                $query->wherein('tono_piel_id', $piel);
            });

        }
        if($ojos){
            $candidatos = $candidatos->whereHas('Fenotipos',function ($query) use ($ojos)  {
                $query->wherein('color_ojos_id', $ojos);
            });
        }
        if($cabello){
            $candidatos = $candidatos->whereHas('Fenotipos',function ($query) use ($cabello)  {
                $query->wherein('color_cabello_id', $cabello);
            });
        }

        if($complexion){
            $candidatos = $candidatos->whereHas('Fenotipos',function ($query) use ($complexion)  {
                $query->wherein('contextura_id', $complexion);
            });
        }
        if($look){
            $candidatos = $candidatos->whereHas('Fenotipos',function ($query) use ($look)  {
                $query->wherein('look_id', $look);
            });
        }
        if($tatuaje){
            $candidatos = $candidatos->whereHas('Fenotipos',function ($query) use ($tatuaje)  {
                $query->wherein('tatuaje_id', $tatuaje);
            });
        }


        if($camisa){
            $candidatos = $candidatos->whereHas('Tallas',function ($query) use ($camisa)  {
                $query->wherein('camisa_id', $camisa);
            });
        }
        if($pantalon){
            $candidatos = $candidatos->whereHas('Tallas',function ($query) use ($pantalon)  {
                $query->wherein('pantalon_id', $pantalon);
            });
        }
        if($zapato){
            $candidatos = $candidatos->whereHas('Tallas',function ($query) use ($zapato)  {
                $query->wherein('zapatos_id', $zapato);
            });
        }

         $candidatos = $candidatos->orderBy('id', 'DESC')->skip($request->offset)->take(19)->get();    
          
        return view('partials._resultadosbuscador',compact('candidatos'));

        
    }


    public function elegirtalento(Request $request)
    {
        $id = Auth::user()->id;   
        $deseados =  DB::table('users')
        ->join('candidato_talentos AS ct', 'users.id', '=', 'ct.usuario_id')
        ->join('candidatos_deseados AS cd', 'users.id', '=', 'cd.talento_id')
        ->leftJoin('nom_talentos  AS t1', 't1.id', '=', 'ct.talento1_id')
        ->leftJoin('nom_talentos  AS t2', 't2.id', '=', 'ct.talento2_id')
        ->leftJoin('nom_nacionalidades', 'users.nacionalidad_id', '=', 'nom_nacionalidades.gentilicio_nac')
        ->select('users.id','users.dia','users.mes','users.anio',
                    'users.avatar','nom_nacionalidades.gentilicio_nac AS nacionalidad_id','t1.nombre AS talento1','t2.nombre AS talento2')
        ->where('cd.industria_id','=',$id)->OrderBy('cd.id','desc')->get();

        $usuario = Users::find($id);
        $candidato = Users::find($request->dependent);

        $proyectos = Castings::where('usuario_id', $id)->orderby('id','DESC')->get();

       $plano = 1;
	   return view('partials._elegirtalentobuscador',compact('candidato','deseados','proyectos','usuario','plano'));
    }



    ////AGREGA EL TALENTO DESDE EL BUSCADOR A UN PROYECTO
    public function agregarTalentoGusto(Request $request,$id)
    {

        $uid = Auth::user()->id;  
        
        $plano = 1;
        
        $castings =  Castings::where('id',$request->proyecto)->first();
        
        ////PLANES PARA VALIDACIONES SOBRE SI TIENE UN PAGO ACTIVO
        $pago = Pago_planes::where('id_usuario', $uid)
        ->where('activo', 1)
        ->where('activado', 1)
        ->where('id_proyecto', $request->proyecto)
        ->orderBy('id','DESC')
        ->first();


        ////VALIDACIONES SOBRE SI TIENE UN PAGO ACTIVO
        //PROYECTO_ID: 1 (SI ES PLAN DE PAGO) o 0 (SI ES ASISTIDO)

        if($castings->proyecto_id == 1) {
           // talentos invitados de plan pago
           //$cantidadelegido = CastingsSeleccionados::where('industria_id',$uid)
           //->where('casting_id', $request->proyecto)
           //->count();

           //talentos requeridos "talentos" en base
           //$cantidaceptado = CastingsSeleccionados::where('industria_id',$uid)
           //->where('casting_id', $request->proyecto)
           //->where('confirmado',1)
           //->count();
          
           //if($cantidadelegido < $pago->invitados){
                //$plano = 1;
            //}
            //else{
                //return '<script>window.location.href = "/planes";</script>';
            //}
            ///TIENE MAS CANDIDATOS ACEPTADOS QUE LO QUE EL PLAN ACEPTA (RETORNA: 3)
            //if($cantidaceptado < $pago->talentos){
                $plano = 1;
            //}
            //else{                  
                //return '<script>window.location.href = "/planes";</script>';
            //}

        }elseif($castings->proyecto_id == 0) {
            $plano = 2;
        }else {
            //return '<script>window.location.href = "/planes";</script>';
        }
        
    
        $candidatoelegido = CastingsSeleccionados::where('talento_id',$id)->where('casting_id',$request->proyecto);
        ////SUPERA TODAS LA VALIDACIONES
        if(($candidatoelegido->count()<=0)&&($plano > 0)){

                $porcentaje =  Porcentaje::where('activo', 1)
                ->orderby('id','DESC')
                ->first();

                
                $talento_proyecto =   new CastingsSeleccionados;
                
                $talento_proyecto->casting_id = $request->proyecto;
                $talento_proyecto->talento_id = $id;
                $talento_proyecto->industria_id = $uid;
                $talento_proyecto->confirmado = 0;
                $talento_proyecto->manager_id = 0;
                $talento_proyecto->representante_id =0;
                $talento_proyecto->uid = Str::random(32);
                $talento_proyecto->presupuesto = $request->presupuesto;

                if ($plano == 2) {
                    $talento_proyecto->porcentaje = $porcentaje->porcentaje;
                }else{
                    $talento_proyecto->porcentaje = 0;
                }
                
                $talento_proyecto->papel = $request->papel;
                $talento_proyecto->save();
                 
                
                $empresa = Users::find($uid);

                $telefono = "";


                ///SE FIJA SI TIENE MANAGER O REPRESENTANTE
                if($talento_proyecto->Talentos->Manager->telefono){
                    $telefono = str_replace("+","",$talento_proyecto->Talentos->Manager->codigo_area). str_replace("+","",$talento_proyecto->Talentos->Manager->telefono);
                }
                else{
                    if($talento_proyecto->Talentos->Representante->telefono){
                        $telefono = str_replace("+","",$talento_proyecto->Talentos->Representante->codigo_area). str_replace("+","",$talento_proyecto->Talentos->Representante->telefono);
                    }
                    else{                    
                        $telefono = str_replace("+","",$talento_proyecto->Talentos->codigo_area). str_replace("+","",$talento_proyecto->Talentos->telefono);
                    }
                
                }
                // if(Auth::user()->hasPermissionTo('enviar_whatsapp')){
                   
                            $client = new Client();
                            $res = $client->request('POST', 'https://eu35.chat-api.com/instance61506/sendLink?token=wai2925z4n315or1', [
                                'form_params' => [
                                    'phone' => $telefono,
                                    'body' => 'https://talentos.ivotalents.com/acept-cast/'.$talento_proyecto->uid,
                                    'previewBase64' => 'data:image/png;base64,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',
                                    'title' => 'Tenemos un Casting on line para ti:  ',
                                    'description' => ''.strtoupper($castings->nombre).',haz clic al link que se adjunta y responde.',
                                ]
                            ]);

                    $talento_proyecto->msj_status = $res->getBody();
                   
               // }

                $talento_proyecto->save();

                $mensaje = new Mensajes();
                $mensaje->emisor_id = Auth::user()->id;
                $mensaje->receptor_id = $talento_proyecto->talento_id;
                $mensaje->numero_recibido = $telefono;      
                $mensaje->mensaje = 'https://talento.ivotalents.com/acept-cast'.$talento_proyecto->uid;  
                $mensaje->status = $res->getBody().'  Casting Invitado: https://talento.ivotalents.com/acept-cast'.$talento_proyecto->uid; 
                $mensaje->casting_seleccionado_id = $talento_proyecto->id;
                $mensaje->casting_id = $talento_proyecto->casting_id;   
                $mensaje->visto = 0;
                $mensaje->tipo_mensaje = 'MENSAJE ENVIO DE CASTING';        
                $mensaje->save();
        }


        $deseados =  DB::table('users')
        ->leftJoin('castings_seleccionados AS cs', 'users.id', '=', 'cs.talento_id')
        ->leftJoin('candidato_talentos AS ct', 'users.id', '=', 'ct.usuario_id')
        ->leftJoin('nom_talentos  AS t1', 't1.id', '=', 'ct.talento1_id')
        ->leftJoin('nom_talentos  AS t2', 't2.id', '=', 'ct.talento2_id')
        ->leftJoin('nom_nacionalidades', 'users.nacionalidad_id', '=', 'nom_nacionalidades.gentilicio_nac')
        ->select('users.id','users.dia','users.mes','users.anio',
                    'users.avatar','nom_nacionalidades.gentilicio_nac AS nacionalidad_id','t1.nombre AS talento1',
                    't2.nombre AS talento2','cs.casting_id as casting_id')
        ->where('cs.industria_id','=',$uid)->where('cs.casting_id','=',$request->proyecto)->distinct('users.id')->get();


        $candidato = Users::find($id);



        return view('partials._talentogustobuscador',compact('candidato','deseados','plano'));
    }


    ////ELIMINA EL TALENTO DE LA LISTA DE TALENTOS EN PROYECTOS
    public function eliminarTalentoGusto(Request $request,$id)
    {
        $uid = Auth::user()->id;   

        $deseado =  CandidatosDeseados::where('talento_id',$id);
        $deseado->delete();
       

        $deseado =  CastingsSeleccionados::where('talento_id',$id);
        $deseado->delete();

        $deseados =  DB::table('users')
        ->leftJoin('castings_seleccionados AS cs', 'users.id', '=', 'cs.talento_id')
        ->leftJoin('candidato_talentos AS ct', 'users.id', '=', 'ct.usuario_id')
        ->leftJoin('nom_talentos  AS t1', 't1.id', '=', 'ct.talento1_id')
        ->leftJoin('nom_talentos  AS t2', 't2.id', '=', 'ct.talento2_id')
        ->leftJoin('nom_nacionalidades', 'users.nacionalidad_id', '=', 'nom_nacionalidades.gentilicio_nac')
        ->select('users.id','users.dia','users.mes','users.anio',
                    'users.avatar','nom_nacionalidades.gentilicio_nac AS nacionalidad_id','t1.nombre AS talento1',
                    't2.nombre AS talento2','cs.casting_id as casting_id')
        ->where('cs.industria_id','=',$uid)->where('cs.casting_id','=',$request->proyecto)->distinct('users.id')->get();


        $candidato = Users::find($id);



        return view('partials._talentogustobuscador',compact('candidato','deseados'));
    }


    ////CARGA LA LISTA DE TALENTOS QUE ESTA EN EL POPUP DE AGREGAR TALENTOS
    public function listarTalentoGusto()
    {
        $uid = Auth::user()->id;   

          $deseados =  DB::table('users')
        ->leftJoin('castings_seleccionados AS cs', 'users.id', '=', 'cs.talento_id')
        ->leftJoin('candidato_talentos AS ct', 'users.id', '=', 'ct.usuario_id')
        ->leftJoin('nom_talentos  AS t1', 't1.id', '=', 'ct.talento1_id')
        ->leftJoin('nom_talentos  AS t2', 't2.id', '=', 'ct.talento2_id')
        ->leftJoin('nom_nacionalidades', 'users.nacionalidad_id', '=', 'nom_nacionalidades.gentilicio_nac')
        ->select('users.id','users.dia','users.mes','users.anio',
                    'users.avatar','nom_nacionalidades.gentilicio_nac AS nacionalidad_id','t1.nombre AS talento1',
                    't2.nombre AS talento2','cs.casting_id as casting_id')
        ->where('cs.industria_id','=',$uid)->where('cs.casting_id','=',$request->proyecto)->distinct('users.id')->get();

        $proyectos = Castings::where('usuario_id', $uid)->get();

        return view('partials._talentogustomistalentos',compact('deseados','proyectos'));
    }


    ////CARGA LA LISTA DE TALENTOS POR PROYECTO QUE ESTA EN EL POPUP DE AGREGAR TALENTOS
    public function listarTalentoPorProyecto($id)
    {
        $uid = Auth::user()->id;   

          $deseados =  DB::table('users')
        ->leftJoin('castings_seleccionados AS cs', 'users.id', '=', 'cs.talento_id')
        ->leftJoin('candidato_talentos AS ct', 'users.id', '=', 'ct.usuario_id')
        ->leftJoin('nom_talentos  AS t1', 't1.id', '=', 'ct.talento1_id')
        ->leftJoin('nom_talentos  AS t2', 't2.id', '=', 'ct.talento2_id')
        ->leftJoin('nom_nacionalidades', 'users.nacionalidad_id', '=', 'nom_nacionalidades.gentilicio_nac')
        ->select('users.id','users.dia','users.mes','users.anio',
                    'users.avatar','nom_nacionalidades.gentilicio_nac AS nacionalidad_id','t1.nombre AS talento1',
                    't2.nombre AS talento2','cs.casting_id as casting_id')
        ->where('cs.industria_id','=',$uid)->where('cs.casting_id','=',$id)->distinct('users.id')->get();

        $candidato = Users::find($id);

        return view('partials._talentogustobuscador',compact('deseados','candidato'));
    }
}
