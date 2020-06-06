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
use App\Models\Nomencladores\NomIndustriaTipo;
use Mail;
use App\Mail\NotificarProyecto;
use Intervention\Image\Facades\Image;
use PragmaRX\Countries\Package\Countries;
use PragmaRX\Countries\Package\Services\Config;
use App\Events\WebSocketDemoEvent;

class HomeController extends Controller
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

     public function guardarSobreMi(Request $request)
    {
        if(Auth::user()){

             $id = Auth::user()->id;

             $paises = NomPaises::where('codigo_pais',$request->pais_empresa)->first();


             $currentEmpresa = IndustriaDatos::updateOrCreate(['usuario_id'  => $id
                                                                        ],['sitio_web' => $request->sitio_web_empresa,
                                                                            'email1' => $request->email_empresa,
                                                                            'telefono1' => $request->telefono_empresa,
                                                                            'codigo_area1' => $request->codigo_area_empresa,
                                                                            'razon_social' => $request->razon_social_empresa,
                                                                            'ruc' => $request->ruc_empresa2,
                                                                            'pais_id' => $paises->id,
                                                                            'ciudad_id' => $request->ciudad_empresa,
                                                                            'es_rif' => $request->rif_empresa,
                                                                            'es_ruc' => $request->ruc_empresa,
                                                                            'es_cedula' => $request->cedula_empresa,
                                                                            'es_pasaporte' => $request->pasaporte_empresa,
                                                                            'usuario_id'  => $id,
                                                                            'industria_tipo_id'  => $request->tipo_rol_id]);
            
          
             $currentEmpresa->save();
  
  
              return redirect('/home')
              ->with('success','Los datos han sido modificados exitosamente.');
               }
                  else{
                      return redirect('/home');
         } 
        
    }


    public function guardarRepresentante(Request $request)
    {
        if(Auth::user()){

             $id = Auth::user()->id;
             $currentuser = Users::find($id);

             $currentuser->nombre =  $request->nombre_representante;
             $currentuser->name =  $request->nombre_representante;
             $currentuser->email =  $request->email_representante;
             $currentuser->codigo_area =  $request->codigo_area_representante1;
             $currentuser->telefono =  $request->telefono_representante1;
             $currentuser->codigo_area2 =  $request->codigo_area_representante2;
             $currentuser->telefono2 =  $request->telefono_representante2;

             $currentuser->save();

             $currentEmpresa = IndustriaDatos::updateOrCreate(['usuario_id'  => $id
             ],['usuario_cargo' => $request->cargo_empresa
                ,'usuario_id'  => $id]);
            
             $currentEmpresa->save(); 

             $currentRedes = CandidatoSocial::updateOrCreate(['usuario_id'  => $id
             ],['linkedin' => $request->linkedin_representante
                ,'usuario_id'  => $id]);
            
             $currentEmpresa->save(); 
  
              return redirect('/home')
              ->with('success','Los datos han sido modificados exitosamente.');
               }
                  else{
                      return redirect('/home');
         } 
        
    }



    public function guardarDescripcion(Request $request)
    {
        if(Auth::user()){

             $id = Auth::user()->id;
             $currentuser = Users::find($id);
             $currentuser->acercademi = $request->Acercademi;

             $currentuser->save(); 
  
              return redirect('/home')
              ->with('success','Los datos han sido modificados exitosamente.');
               }
                  else{
                      return redirect('/home');
         } 
        
    }



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
        $rolestipos = NomIndustriaTipo::all();

        $countries = new Countries();

        return view('home',compact('usuario','paises','ciudades','proyectos','telefonos','rolestipos'));
    }




    public function homeTalentosInicial()
    {

      
        $id = Auth::user()->id;      
        $talentos =  Users::whereNotNull('avatar')->whereHas('Talentos.Talento1')->orderBy('id', 'DESC')->Take(5)->get();
        
       $proyectos = Castings::where('usuario_id', $id)->get();
        return view('partials._homelistatalentos',compact('talentos','proyectos'));
    }




    public function subirFotoPerfil (Request $request)
    {

     if(Auth::user()){
            $id = Auth::user()->id;

           
            $currentuser = Users::find($id);

            if($currentuser->avatar){
                $porciones = explode("ivotalent", $currentuser->avatar);  

                $complete = $porciones[1];
          
                if(Storage::disk('s3')->exists($complete)) {
                     $t = Storage::disk('s3')->delete($complete);
                 }
   
                $complete = '/files/thumbs/profile/'.$currentuser->id.'/'.'540px_foto_'.$currentuser->id;
             
                if(Storage::disk('s3')->exists($complete)) {
                      $t = Storage::disk('s3')->delete($complete);
                 }
   
                $complete = '/files/thumbs/profile/'.$currentuser->id.'/'.'90px_foto_'.$currentuser->id;
                if(Storage::disk('s3')->exists($complete)) {
                      $t = Storage::disk('s3')->delete($complete);
                 }
   
                $complete = '/files/thumbs/profile/'.$currentuser->id.'/'.'250px_foto_'.$currentuser->id;
                if(Storage::disk('s3')->exists($complete)) {
                      $t = Storage::disk('s3')->delete($complete);
                 }
   

                
            }

        $image = $request->image;
       
        list($type, $image) = explode(';', $image);

        list(, $image)      = explode(',', $image);

        $image = base64_decode($image);


        $imageName = time().'.png';
        $complete = '/files/profile/'.$id.'/'.$imageName;


        //$path = public_path().'/temp/'.$imageName;

        //file_put_contents($path, $image);
        
        
        $t = Storage::disk('s3')->put($complete, $image, 'public');
        $complete = Storage::disk('s3')->url($complete);

        

        $path = 'https://s3.us-east-2.amazonaws.com/ivotalent'.'/files/profile/'.$id.'/'.$imageName;
        
 
         $img = Image::make($path);

         $img->resize(540, null, function ($constraint) {
             $constraint->aspectRatio();
             $constraint->upsize();
         });
 
         //$img->save(public_path('//thumbnails/images/'.$fotes->usuario_id.'/540px_'.$fotes->usuario_id. $filename, 100));
         $resource = $img->stream();
         $complete = '/files/thumbs/profile/'.$id.'/'.'540px_foto_'.$id.'.png';
         $t = Storage::disk('s3')->put($complete, $resource, 'public');
      

 
          $complete = '/files/profile/'.$id.'/'.$imageName;



          $bucketname = "ivotalent"; 

         
          $currentuser->avatar =  'https://s3.us-east-2.amazonaws.com/'.$bucketname.$complete ;
          $currentuser->save(); 


                    return  redirect('/home')
                    ->with('success','La Imagen ha sido subida exitosamente.');
            }
            else{
                return  redirect('/login');
            }

    }


    public function guardarEmpresa(Request $request)
    {

             $id = Auth::user()->id;

             $currentEmpresa = IndustriaDatos::updateOrCreate(['usuario_id'  => $id
                                                                        ],['razon_social' => $request->nombre_empresa,
                                                                            'slogan' => $request->slogan_empresa,
                                                                            'usuario_id' => $id]);

             $currentEmpresa->save();
   
              return redirect('/home')
              ->with('success','Los datos han sido modificados exitosamente.');
    
    }

}
