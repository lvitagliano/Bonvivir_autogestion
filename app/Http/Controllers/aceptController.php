<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Nomencladores\NomPaises;
use App\Models\Nomencladores\NomCiudades;
use Illuminate\Support\Facades\DB;
use App\Models\Talento\CandidatoRepresentantes;
use Illuminate\Support\Facades\Storage;
use App\Models\Industria\IndustriaDatos;
use App\Models\Talento\CandidatoSocial;
use App\Models\Castings\CastingsSeleccionados;
use App\Models\Castings\Castings;

class aceptController extends Controller
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


    public function index($uid)
    { 
        $castingSelect = CastingsSeleccionados::where('uid', $uid)->first();
        $usuario = Users::find($castingSelect->talento_id);
        $casting = Castings::find($castingSelect->casting_id);
        $industria = Users::find($castingSelect->industria_id);
        return view('acept-cast', compact('usuario', 'castingSelect', 'casting', 'industria'));


    }

    
    public function index2($uid)
    { 
        $castingSelect = CastingsSeleccionados::where('uid', $uid)->first();
        $usuario = Users::find($castingSelect->talento_id);
        $casting = Castings::find($castingSelect->casting_id);
        $industria = Users::find($castingSelect->industria_id);
        return view('acept-cast', compact('usuario', 'castingSelect', 'casting', 'industria'));


    }

    
    public function index3($uid)
    { 
        $castingSelect = CastingsSeleccionados::where('uid', $uid)->first();
        $usuario = Users::find($castingSelect->talento_id);
        $casting = Castings::find($castingSelect->casting_id);
        $industria = Users::find($castingSelect->industria_id);
        return view('acept-cast', compact('usuario', 'castingSelect', 'casting', 'industria'));


    }


    public function aceptar($uid)
    { 
        $castingSelect = CastingsSeleccionados::where('uid', $uid)->first();
        $castingSelect->confirmado=1;
        $castingSelect->save();
        $usuario = Users::find($castingSelect->talento_id);
        $casting = Castings::find($castingSelect->casting_id)->first();
        $industria = Users::find($castingSelect->industria_id);
        return view('acept-cast2', compact('usuario', 'castingSelect', 'casting', 'industria'));


    }

    public function rechazar($uid)
    { 
        $castingSelect = CastingsSeleccionados::where('uid', $uid)->first();
        $castingSelect->confirmado=-1;
        $castingSelect->save();
        $usuario = Users::find($castingSelect->talento_id);
        $casting = Castings::find($castingSelect->casting_id)->first();
        $industria = Users::find($castingSelect->industria_id);
        return view('acept-cast3', compact('usuario', 'castingSelect', 'casting', 'industria'));

    }

    public function vercasting($uid)
    {   
        $castingSelect = CastingsSeleccionados::where('casting_id', $uid)->get();
        $casting = Castings::find($uid);
        $industria = Users::find($casting->usuario_id);
        return view('ver-casting', compact('castingSelect', 'casting', 'industria'));


    }



    
    public function castingcompleto($id)
    {
        $proyectos = Castings::find($id);
        $users = CastingsSeleccionados::with('Talentos','Talentos.Fenotipos','Talentos.Talentos','Talentos.Oficios','Talentos.Hobbies','Talentos.Tallas',
        'Talentos.Fotos','Talentos.Fotos','Talentos.Talentos.Talento1','Talentos.Talentos.Talento2','Talentos.Talentos.Talento3'
        ,'Talentos.Talentos.Genero1','Talentos.Talentos.Genero2','Talentos.Talentos.Genero3'
        ,'Talentos.Talentos.Categoria1','Talentos.Talentos.Categoria2','Talentos.Talentos.Categoria3'
        ,'Talentos.Talentos.Especialidad1','Talentos.Talentos.Especialidad2','Talentos.Talentos.Especialidad3'
        ,'Talentos.Oficios.Oficio1','Talentos.Hobbies.Hobbie1','Talentos.Sexual','Talentos.Pais','Talentos.Ciudad',
        'Talentos.Nacionalidad','Talentos.Idiomas','Talentos.Tallas','Talentos.Tallas.TipoAltura','Talentos.Tallas.TipoBusto','Talentos.Tallas.TipoCadera',
        'Talentos.Tallas.TipoCadera','Talentos.Tallas.TipoCintura','Talentos.Idiomas.Idioma1','Talentos.Idiomas.Idioma2','Talentos.Idiomas.Idioma3',
        'Talentos.Tallas.Camisa','Talentos.Tallas.TipoCamisa','Talentos.Tallas.Pantalon','Talentos.Tallas.TipoPantalon',
        'Talentos.Tallas.Zapato','Talentos.Tallas.TipoZapato','Talentos.Fenotipos.ColorCabello','Talentos.Fenotipos.ColorOjos','Talentos.Fenotipos.Contextura',
        'Talentos.Fenotipos.Etnia','Talentos.Fenotipos.Look','Talentos.Fenotipos.TonoPiel')->where('casting_id', $id)->where('confirmado','=',1)->get();

		return view('ver-casting-completo',compact('users','proyectos'));

		
    }


    public function castingenviado($id)
    {
        $proyectos = Castings::where('uid',$id)->first();
        $users = CastingsSeleccionados::with('Talentos','Talentos.Fenotipos','Talentos.Talentos','Talentos.Oficios','Talentos.Hobbies','Talentos.Tallas',
        'Talentos.Fotos','Talentos.Fotos','Talentos.Talentos.Talento1','Talentos.Talentos.Talento2','Talentos.Talentos.Talento3'
        ,'Talentos.Talentos.Genero1','Talentos.Talentos.Genero2','Talentos.Talentos.Genero3'
        ,'Talentos.Talentos.Categoria1','Talentos.Talentos.Categoria2','Talentos.Talentos.Categoria3'
        ,'Talentos.Talentos.Especialidad1','Talentos.Talentos.Especialidad2','Talentos.Talentos.Especialidad3'
        ,'Talentos.Oficios.Oficio1','Talentos.Hobbies.Hobbie1','Talentos.Sexual','Talentos.Pais','Talentos.Ciudad',
        'Talentos.Nacionalidad','Talentos.Idiomas','Talentos.Tallas','Talentos.Tallas.TipoAltura','Talentos.Tallas.TipoBusto','Talentos.Tallas.TipoCadera',
        'Talentos.Tallas.TipoCadera','Talentos.Tallas.TipoCintura','Talentos.Idiomas.Idioma1','Talentos.Idiomas.Idioma2','Talentos.Idiomas.Idioma3',
        'Talentos.Tallas.Camisa','Talentos.Tallas.TipoCamisa','Talentos.Tallas.Pantalon','Talentos.Tallas.TipoPantalon',
        'Talentos.Tallas.Zapato','Talentos.Tallas.TipoZapato','Talentos.Fenotipos.ColorCabello','Talentos.Fenotipos.ColorOjos','Talentos.Fenotipos.Contextura',
        'Talentos.Fenotipos.Etnia','Talentos.Fenotipos.Look','Talentos.Fenotipos.TonoPiel')->where('casting_id', $proyectos->id)->where('confirmado','=',1)->get();

		return view('ver-casting-enviado',compact('users','proyectos'));

		
    }
    

}
