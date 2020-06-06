@extends('layouts.principal')

@section('content')
<style>

input[type="file"]#nuestroinput {
 width: 0.1px;
 height: 0.1px;
 opacity: 0;
 overflow: hidden;
 position: absolute;
 z-index: -1;
 }

 label[for="photo"] {
 font-size: 14px;
 font-weight: 600;
 color: #fff;
 background-color: #106BA0;
 display: inline-block;
 transition: all .5s;
 cursor: pointer;
 padding: 15px 40px !important;
 text-transform: uppercase;
 width: fit-content;
 text-align: center;
 }

</style>

<div class="page-header" data-parallax="true" style="background-image: url('../assets/img/city-profile-two.jpg'); height: 240px;">
    <div class="col-7 ml-auto text-left align-items-end c-name"><h3 style="color: white" class="c-mini-name">
    <b>{{$usuario->industria->razon_social ? strtoupper($usuario->industria->razon_social) : "Nombre de la Empresa" }}</b>&nbsp;</h3>
             <p style="margin-top: -15px;margin-bottom: 0px; font-size: 13px; color:white" class="c-mini-subname">
             {{$usuario->industria->slogan ? strtoupper($usuario->industria->slogan) : "Slogan de la Empresa.." }}</p></div>
</div>
<div class="main main-raised bkg-ind">
  <div class="profile-content">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="profile text-left" style="height: 80px;">
            <div class="avatar">
                  @if ($usuario->avatar)
                  <a href="#modal-imgperfil" data-toggle="modal">
                    <img alt="Circle Image" style="max-height: 160px;" class="img-raised rounded-circle img-fluid" src="{{'https://ivotalent.s3-accelerate.amazonaws.com/files/thumbs/profile/'.$usuario->id.'/540px_foto_'.$usuario->id.'.png'}}">
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
                        <a class="btn-nav" href="{{ route('home') }}">
                          <i class="material-icons">account_circle</i> Perfil
                        </a>
                      </li>

                        <li class="list-horizontal">
                                <a class="btn-nav" href="{{ route('buscar') }}">
                                  <i class="material-icons">search</i> Buscar
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
            <h5 class="in-line-black">Favoritos</h5>
</div>
      </div>
      <br>

      <div class="row">         
         <div class="col-md-6 ml-auto mr-auto" style="margin-top: -100px"> 
          </div> 
        <div class="col-md-6 ml-auto mr-auto" style="margin-top: -100px">
                <div class="col-12"><h4 style="color: #1f8089"><b>BUSCAR POR FOTO</b></h4></div>
                    <form action="{{ action('BusquedaIAController@enviarFoto') }}" method="post" enctype="multipart/form-data">
                        @csrf
                      <!-- 
                        <div class="form-group">
                            <label for="confidence">Minimum Confidence</label>
                            <input type="number" id="confidence" name="confidence" class="form-control" value="50">
                        </div>

                      -->
                        <div class="form-group">
                          <label for="photo">Sube una imagen</label>
                            <input type="file" class="form-control"  name="photo" id="photo">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Submit" class="btn btn-success btn-lg">
                        </div>
                    </form>
         </div>        

         <div class="row">
            @if($candidatos)
                  @foreach($candidatos as $nuevarios)
                  <div class="col-3">
                    <div class="card card-product card-plain">
                    <div class="card-header card-header-image showhim" style="position: relative;">
                  
                            <a href="#" data-toggle="modal" data-target="#elegirmodal" data-perfil-id="1820">
                            <img height="auto" src="https://ivotalent.s3-accelerate.amazonaws.com/files/thumbs/profile/{{$nuevarios->id}}/540px_foto_{{$nuevarios->id}}.png" alt="">
                          </a>
                            <div class="colored-shadow" style="background-image: url(https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif); opacity: 1; height:auto"></div><div class="colored-shadow" style="background-image: url(https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif); opacity: 1;"></div></div>
                  
                  
                      <div class="card-footer">
                        @foreach($cort as $cortos)
                            @if($cortos[0] == $nuevarios->id)
                              <p>Coincidencia: {{$cortos[1]}} %</p>
                            @endif
                        @endforeach
                      </div>
                    </div>
                  </div>

                  @endforeach
            @endif  
        </div>
 

     
      </div>

    </div>
  </div>
</div>

<div class="flotante">
    <div class="flotante-line">
        <h5 class="flotante-in-line">Busqueda por Foto</h5>
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


@section('scripts')


@endsection
