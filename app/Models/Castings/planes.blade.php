@extends('layouts.principal')

@section('content')

<div class="page-header" data-parallax="true" style="background-image: url('../assets/img/city-profile-two.jpg'); height: 240px;">
    <div class="col-7 ml-auto text-left align-items-end c-name"><h3 style="color: white" class="c-mini-name">
    <b>{{$usuario->industria->razon_social ? strtoupper($usuario->industria->razon_social) : "Nombre de la Empresa" }}</b>&nbsp;
          <a href="#" data-toggle="modal" data-target="#NombreEmpresa"><i class="material-icons" style="font-size:14px; cursor: pointer;color:white">border_color</i></a></h3>
             <p style="margin-top: -15px;margin-bottom: 0px; font-size: 13px; color:white" class="c-mini-subname">
             {{$usuario->industria->slogan ? strtoupper($usuario->industria->slogan) : "Slogan de la Empresa.." }}</p></div>
</div>
<div class="main main-raised bkg-ind" >
  <div class="profile-content">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto mini-screen" style="height:90px;">
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
           

                  <li class="list-horizontal ml-5">
                          <a class="btn-nav" href="<?=$_SERVER['HTTP_REFERER'] ?>">
                            <i class="material-icons">arrow_back</i> Volver
                          </a>
                        </li>
                
               
                </ul>
    </div>
          </div>
        </div>
        <div class="container col-12">
        <router-view></router-view>
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
@section('scripts')
<script type="text/javascript" src="{{ asset('js/app.js') }}" refer></script>
@endsection
