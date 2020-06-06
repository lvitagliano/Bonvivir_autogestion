@extends('layouts.principal')

@section('content')
<style type="text/css">
 
  .fileUpload {
      position: relative;
      overflow: hidden;
      margin: 10px;
  }
  .fileUpload input.upload {
      position: absolute;
      top: 0;
      right: 0;
      margin: 0;
      padding: 0;
      font-size: 20px;
      cursor: pointer;
      opacity: 0;
      filter: alpha(opacity=0);
  }
  .error
  {
    color: red;
  }
  
  hr .ver{ 
  display: block;
  margin-top: 0.5em;
  margin-bottom: 0.5em;
  margin-left: auto;
  margin-right: auto;
  border-style: inset;
  border-width: 1px;
  color: antiquewhite;
}  
  </style>


<div class="page-header" data-parallax="true" style="background-image: url('../assets/img/city-profile-two.jpg'); height: 240px;">
    <div class="col-7 ml-auto text-left align-items-end c-name"><h3 style="color: white" class="c-mini-name">
    <b>{{$usuario->name ? strtoupper($usuario->name) : strtoupper($usuario->nombre) }}</b>&nbsp;</h3>
   </div>
</div>
<div class="main main-raised bkg-ind">
  <div class="profile-content">
    <div class="containerPerfil container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto mini-screen">
          <div class="profile text-left" style="height: 80px;">
            <div class="avatar">
              @if ($usuario->avatar)
              <a href="#modal-imgperfil" data-toggle="modal">
                <img alt="Circle Image" style="max-height: 160px;" class="img-raised rounded-circle img-fluid" src="{{'https://ivotalent.s3-accelerate.amazonaws.com/files/thumbs/profile/'.$usuario->id.'/250px_foto_'.$usuario->id.'.png'}}">
              </a>
               @else
               <a href="#modal-imgperfil" data-toggle="modal">
               <img alt="Circle Image" style="max-height: 160px;"  class="img-raised rounded-circle img-fluid" src="{{ asset('img/vatar2.png') }}">
              </a>
              @endif
        </div>

            <div class="menu-navegador">
              <ul class="">
                      <li class="list-horizontal">
                              <a class="btn-nav" href="{{ route('buscar') }}">
                                <i class="material-icons">search</i> Buscar
                              </a>
                            </li>
                      <li class="list-horizontal">
                        <a class="btn-nav" href="{{ route('mistalentos') }}">
                          <i class="material-icons">grade</i> Mis Talentos
                        </a>
                      </li>
                      <li class="list-horizontal">
                              <a class="btn-nav" href="#">
                                <i class="material-icons">forum</i> Chat
                              </a>
                            </li>
                    </ul>
        </div>
       
          </div>
        </div>

        <div class="line-black">
                    <h5 class="in-line-black">Perfil</h5>
        </div>
      </div>
   

      @if (Session::has('success'))
      <div class="alert alert-success">
        <div class="container">
          <div class="alert-icon">
            <i class="material-icons">check</i>
          </div>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="material-icons">clear</i></span>
          </button>
          {{ Session::get("success")}}
        </div>
      </div>
      @endif

      <div class="row" style="margin-top: -70px">  
        
        <div class="col-lg-3 col-md-6 ml-auto mr-auto">
            <div class="col-12"><h5 class="h5-naranja"><b>FOTOS</b></h5></div>
             
            <div class="card card-pricing" style="text-align: left;margin-top:5px;height:511px">
               <div class="card-body">
               <div class="row">
                    @foreach($usuario->Fotos as $foto)
                      <div class="col-6">

                              <img src="{{'https://ivotalent.s3-accelerate.amazonaws.com/files/thumbs/images/'.$foto->usuario_id.'/250px_foto_'.$foto->nombre_fisico}}">

                      </div>
                    @endforeach
               </div>
                 
               </div>
     </div> 
           </div>

      @if($usuario->Representante)
        <div class="col-lg-3 col-md-6 ml-auto mr-auto">
         <div class="col-12"><h5 class="h5-naranja"><b>REPRESENTANTE</b></h5></div>
          
         <div class="card card-pricing" style="text-align: left;margin-top:5px">
            <div class="card-body">
              <ul>
                <li>
                  <b>Nombre:</b><br>{{$usuario->Representante->email ? $usuario->Representante->email : "Sin Representante "}}
                <li>
                  <b>E-Mails:</b><br>{{$usuario->Representante->email ? $usuario->Representante->email : "correo@dominio.com "}}</li>
                <li>
                  <b>Número de Contacto:</b><br>{{$usuario->Representante->telefono  ? $usuario->Representante->area_code." ".$usuario->Representante->telefono : " +507 0000.0000"}}
              </li>   
            
              </ul>
            </div>
          </div> 
        </div>
        @else
            @if($usuario->Manager)
            <div class="col-lg-3 col-md-6 ml-auto mr-auto">
         <div class="col-12"><h5 class="h5-naranja"><b>MANAGER</b></h5></div>
          
         <div class="card card-pricing" style="text-align: left;margin-top:5px">
            <div class="card-body">
              <ul>
                <li>
                  <b>Nombre:</b><br>{{$usuario->Manager->nombre}}
                <li>
                  <b>E-Mails:</b><br>{{$usuario->Manager->email ? $usuario->Manager->email : "correo@dominio.com "}}</li>
                <li>
                  <b>Número de Contacto:</b><br>{{$usuario->Manager->telefono  ? $usuario->Manager->area_code." ".$usuario->Manager->telefono : " +507 0000.0000"}}
              </li>   
            
              </ul>
            </div>
          </div> 
        </div>
            @endif
        @endif
        <div class="col-lg-3 col-md-6 ml-auto mr-auto">
           <div class="row">
            <div class="col-6"><h5 class="h5-naranja"><b>ACERCA DE MI</b></h5> 
                </div>     
            </div>
          <div class="card card-pricing" style="text-align: left;margin-top:5px">
                  <div class="card-body">
                    <ul>
                      <li>
                        <b>Edad: </b>14 años<br>
                        <b>Género: </b>{{$usuario->Sexual->nombre}}<br>
                        <b>Nacionalidad: </b>{{$usuario->Nacionalidad->gentilicio_nac}}<br>
                      </li>
                      <li>
                      <b>Ubicación: </b>{{$usuario->Industria->Pais->nombre}},{{$usuario->Industria->Ciudad->nombre}}<br></li>
                      <li>
                      <b>Idioma Nativo: </b>{{$usuario->Idiomas->Idioma1->nombre}}<br>
                        <b>Otros Idiomas: </b><br>{{$usuario->Idiomas->Idioma2->nombre}} | {{$usuario->Idiomas->Idioma3->nombre}}<br>
                     </li> 
                      <li>
                        <b>E-Mails: </b>
                        <br>{{$usuario->Industria->email1 ? $usuario->Industria->email1 : "correo@dominio.com "}}
                        <br>{{$usuario->Industria->email2 ? $usuario->Industria->email2 : "correo@dominio.com "}}</li>
                      <li>
                        <b>Número de Contacto: </b><br>
                        {{$usuario->Industria->telefono1  ? $usuario->Industria->codigo_area1." ".$usuario->Industria->telefono1 : " +507 0000.0000"}}
                         | {{$usuario->Industria->telefono2  ? $usuario->Industria->codigo_area2." ".$usuario->Industria->telefono2 : " +507 0000.0000"}}
                    </li>   
                  <li>
                    <b>Disponibilidad: </b>{{$usuario->disponibilidad}}
                </li>             
                    </ul>
                  </div>
        </div>
          
        </div>

         <div class="col-lg-3 col-md-6 ml-auto mr-auto">
                <div class="row" >
                        <div class="col-12"><h5 class="h5-naranja"><b>CARACTERÍASTICAS</b></h5> 
                            </div>      
                        </div>
          <div class="card card-pricing" style="margin-top:5px">
                  <div class="card-body">
                  <div class="row">
                                <div class="col-12">
                                <b>Fenotipo</b>
                                </div>
                   </div>
                        <div class="row">
                                <div class="col-4">
                        <img  style="max-height: 160px;" src="../img/color-palette.png">
                   <br> {{$usuario->Fenotipos->Etnia->nombre}}
                </div>
                <hr>
                <div class="col-4">
                        <img  style="max-height: 160px;" src="../img/eye.png">
                   <br>  {{$usuario->Fenotipos->ColorOjos->nombre}}
                </div>
                <hr>
                <div class="col-4">
                        <img  style="max-height: 160px;" src="../img/man-hair.png">
                   <br>  {{$usuario->Fenotipos->ColorCabello->nombre}}
                </div>
            </div>

            <hr class="ver">
            <div class="row">
                    <div class="col-4">
            <img  style="max-height: 160px;" src="../img/muscle.png">
       <br> {{$usuario->Fenotipos->Contextura->nombre}}
    </div>
    <hr>
    <div class="col-4">
            <img  style="max-height: 160px;" src="../img/glasses.png">
       <br> {{$usuario->Fenotipos->Look->nombre}}
    </div>
    <hr>
    <div class="col-4">
            <img  style="max-height: 160px;" src="../img/tattoo.png">
       <br> {{$usuario->Fenotipos->tatuaje_id}}
    </div>
</div>

<hr class="ver">
  <div class="row">
              <div class="col-12">
              <b>Tallas</b>
              </div>
  </div>
<div class="row">
        <div class="col-4">
<img  style="max-height: 160px;" src="../img/shirt.png">
<br> {{$usuario->Tallas->TipoCamisa->nombre}}  -  {{$usuario->Tallas->Camisa->nombre}}
</div>
<hr>
<div class="col-4">
<img  style="max-height: 160px;" src="../img/clothes.png">
<br> {{$usuario->Tallas->TipoPantalon->nombre}}  -  {{$usuario->Tallas->Pantalon->nombre}}
</div>
<hr>
<div class="col-4">
<img  style="max-height: 160px;" src="../img/running-shoe.png">
<br> {{$usuario->Tallas->TipoZapato->nombre}}  -  {{$usuario->Tallas->Zapato->nombre}}
</div>
</div>
<hr class="ver">
<div class="row">
                                <div class="col-12">
                                <b>Medidas</b>
                                </div>
                   </div>
                   <div class="row">
                      <div class="col-3">
                      <b style="font-size:13px;">Altura: </b>
              <br> {{$usuario->Tallas->altura}}CM
              </div>
              <hr>
              <div class="col-3">
              <b style="font-size:13px;">Busto: </b>
              <br> {{$usuario->Tallas->busto}}CM
              </div>
              <hr>
              <div class="col-3">
              <b style="font-size:12px;">Cintura: </b>
              <br> {{$usuario->Tallas->cintura}}CM
              </div>
              <hr>
              <div class="col-3">
              <b style="font-size:12px;">Cadera: </b>
              <br> {{$usuario->Tallas->cadera}}CM
              </div>
              </div>


                  </div>
                </div>
          
        </div>

         <div class="col-lg-6 col-md-6 ml-auto mr-auto" style="float:left;">
                <div class="row">
                        <div class="col-12"><h5 class="h5-naranja"><b>DESCRIPCIÓN</b></h5> 
                            </div>       
                        </div>
              <div class="card card-pricing" style="margin-top:5px;height: 300px; overflow-y: scroll;">
                  <div class="card-body">
                    <p class="h5-naranja">{{$usuario->acercademi ? $usuario->acercademi : "Descripción ..."}}</p>
                  </div>
                </div>
          
        </div>
      </div>




    </div>
  </div>
</div>
<div class="flotante">
    <div class="flotante-line">
        <h5 class="flotante-in-line">Perfil</h5>
    </div> 
    <div style="margin-top: 30px;margin-bottom: 50px;">
    <ul class="ul-foot">
        <li class="list-horizontal">
                <a class="btn-nav-foot" href="{{ route('buscar') }}">
                  <i class="material-icons">search</i>
                </a>
              </li>
        <li class="list-horizontal">
          <a class="btn-nav-foot" href="{{ route('misproyectos') }}">
            <i class="material-icons">grade</i>
          </a>
        </li>
        <li class="list-horizontal">
                <a class="btn-nav-foot" href="#">
                  <i class="material-icons">forum</i>
                </a>
              </li>
      </ul>  
    </div> 
</div> 

@endsection


