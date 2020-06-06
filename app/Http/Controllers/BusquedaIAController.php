<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Aws\Rekognition\RekognitionClient;
use App\Models\Nomencladores\NomSexo;
use Input;
use Image;

class BusquedaIAController extends Controller
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
    public function busquedaia()
    {
        $id = Auth::user()->id;             
        $usuario = Users::find($id);
        $candidatos =  Users::select('id','avatar')->take(0)->get();
        $img_path = url('/').'/img/perfil.png';
        return view('busqueda-ia',compact('usuario','candidatos','img_path'));
    }



    public function enviarFoto(Request $request)
    {
        $id = Auth::user()->id;             
        $usuario = Users::find($id);



        $client = new RekognitionClient([
            'region'    => 'us-east-2',
            'version'   => 'latest',
            'credentials' => [
                'key'    => 'AKIAJZCLNYVRWPOVJPLQ',
                'secret' => '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',
            ],
        ]);


        /*
        
            
        $result = $client->DetectFaces([
            'Image' => [
                'S3Object' => [
                    'Bucket' => 'ivotalent',
                    'Name' => 'files/thumbs/profile/2832/540px_foto_2832.png',
                ],
            ],
            'Attributes' => array('ALL'),
            'MinConfidence' => 50,
        ]);
       
        dd($result);   
       */
      
       
        $image = fopen($request->file('photo')->getPathName(), 'r');
        $bytes = fread($image, $request->file('photo')->getSize());
        
        
        $file = Input::file('photo');
        $imageName = $file->getClientOriginalName();

        $imgUpload = Image::make($file)->save(public_path('img/' . $imageName));



            $results = $client->DetectFaces(['Image' => ['Bytes' => $bytes],'Attributes' => array('ALL'), 'MinConfidence' => intval($request->input('confidence'))])['FaceDetails'][0];

  
            $edad_minima = $results['AgeRange']['Low'];
            $edad_maxima = $results['AgeRange']['High'];
            $genero = $results['Gender']['Value'];
            
            if($genero =="Male"){
                $sexo = 3;
            }

            if($genero =="Female"){
                $sexo = 2;
            }

            $candidatos =  Users::whereNotNull('avatar')
                                  ->whereRaw('(YEAR(CURDATE()) - anio) BETWEEN ? AND ?', [$edad_minima, $edad_maxima])
                                  ->where('sexo_id','=', $sexo)
                                  ->select('id','avatar')->orderBy('id', 'DESC')->get();


            $cart = array();
            $cort = array();
            foreach($candidatos as $comparadores){

                $result = $client->compareFaces([
                    'SimilarityThreshold' => 60,
                    'SourceImage' => ['Bytes' => $bytes],
                    'TargetImage' => [
                        'S3Object' => [
                            'Bucket' => 'ivotalent',
                            'Name' => 'files/thumbs/profile/'.$comparadores->id.'/540px_foto_'.$comparadores->id.'.png',
                        ],
                    ],

                ]);
                    
                    $FaceMatchesResult = $result['FaceMatches'];                    

                    if(isset($FaceMatchesResult[0]['Similarity'])){                        
                        array_push($cart, $comparadores->id);
                        array_push($cort,array($comparadores->id,$FaceMatchesResult[0]['Similarity']));
                    }
                    
                    
            }

        $img_path = $imageName;
        $candidatos =  Users::select('id','avatar')->whereIn('id',$cart)->get();
        return view('busqueda-ia', compact('usuario','candidatos','cart','cort','img_path'));

    }

}
