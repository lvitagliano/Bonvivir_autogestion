<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Nomencladores\NomPaises;
use App\Models\Nomencladores\NomCiudades;
use App\Models\Nomencladores\NomTalentos;
use Illuminate\Support\Facades\DB;
use App\Models\Talento\CandidatoRepresentantes;
use Illuminate\Support\Facades\Storage;
use App\Models\Industria\IndustriaDatos;
use App\Models\Talento\CandidatoSocial;
use App\Models\Castings\Castings;
use App\Models\Castings\CastingsSeleccionados;
use App\Models\Nomencladores\RolesTipos;
use Mail;
use App\Mail\NotificarProyecto;
use Intervention\Image\Facades\Image;
use PragmaRX\Countries\Package\Countries;
use PragmaRX\Countries\Package\Services\Config;
use App\Events\WebSocketDemoEvent;
use App\Models\Castings\CastingsVideos;
use Embed;
use League\Flysystem\Filesystem;
use League\Flysystem\ZipArchive\ZipArchiveAdapter;


class VideosController extends Controller
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


    public function index()
    {
        $id = Auth::user()->id;             
        $usuario = Users::find($id);       
        $paises = NomPaises::all()->sortBy('nombre');
        $telefonos = NomPaises::all()->sortBy('area_code');
        
        $id_pais = $usuario->Industria->pais_id ? $usuario->Industria->pais_id  : 1;
        $pais = NomPaises::find($id_pais);

        if($pais){
            $ciudades = NomCiudades::where('codigo_pais',$pais->codigo_pais)->orderBy('nombre')->get();  
        }
        else{
            $ciudades = NomCiudades::find(0);   
        }
        $proyectos = Castings::where('usuario_id', $id)->orderBy('id','DESC')->get();
        $rolestipos = RolesTipos::all();

        $countries = new Countries();

        $videos = CastingsVideos::orderBy('created_at','DESC')->get();

        return view('subir-videos',compact('usuario','paises','ciudades','proyectos','telefonos','rolestipos','videos'));
    }


    public function subirvideosupdaload (Request $request)
    {

      
        $cast_id = "".$request->casting_id;

        foreach ($request->videos as $video) {
            $videoName = $video->getClientOriginalName();
            //$nombrearchivo = time().'.mp4';
            //$complete = '/files/videos/'.$request->casting_id.'/'.$fileName;
            //$t = Storage::disk('s3')->put($complete, $video, 'public');
            //$complete = Storage::disk('s3')->url($complete);
            $filename = Storage::disk('s3');

            $filename = $filename->put('files/videos/'.$cast_id, $video,'public');

            CastingsVideos::create([
                'casting_id' => $cast_id,
                'nombre' => $videoName,
                'archivo' => $filename,
            ]);

        }
        return back()->withSuccess('Videos Subidos con Exito');

    }



    public function listavideos()
    {
        $videos = Storage::disk('s3')->allFiles('/files/videos/BANCO GENERAL/');
        return view('lista-videos',compact('videos'));
    }

    public function bajavideos()
    {
        $videos = Storage::disk('s3')->allFiles('/files/videos/BANCO GENERAL/');
        $zip = new Filesystem(new ZipArchiveAdapter(public_path('archive.zip')));


        foreach($videos as $file_name){
            $file_content = Storage::disk('s3')->get($file_name);
            $zip->put($file_name, $file_content);
        }


        $zip->getAdapter()->getArchive()->close();
        dd($zip);
    }

}
