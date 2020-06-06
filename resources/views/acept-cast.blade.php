@extends('layouts.aceptLayout')

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
    
    .absolute {
      position: fixed;
      float: right;
}
    </style>


<div class="page-header" data-parallax="true" style="background-image: url('../assets/img/city-profile-two.jpg'); height: 240px;">

</div>
<div class="main main-raised bkg-ind">
  <div class="profile-content">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto mini-screen">
          <div class="profile" style="height: 80px;">
            <div class="avatar" style="float: initial;">
              @if ($usuario->avatar)
              <a href="#modal-imgperfil" data-toggle="modal">
                <img alt="Circle Image" style="max-height: 160px;" class="img-raised rounded-circle img-fluid" src="{{$usuario->avatar}}">
              </a>
               @else
               <a href="#modal-imgperfil" data-toggle="modal">
               <img alt="Circle Image" style="max-height: 160px;"  class="img-raised rounded-circle img-fluid" src="{{ asset('img/vatar2.png') }}">
              </a>
              @endif
        </div>
          </div>
        </div>
      </div>
 

      <div class="row" style="margin-top: 0px ml-auto mr-auto">   
        
          <div class="row" style="z-index:999; width:100%">
              <div class="col-1">
            </div>
            <div class="col-9">
            </div>
            <div class="col-2">
                <a href="#acept" class="btn btn-lg btn-just-icon btn-round btn-elegir btn-animation-blue" style="position: fixed; z-index:999;">
                    <i class="material-icons" title="Aceptar">expand_more</i>
                  <div class="ripple-container"></div></a>
            </div>
          </div>

        <div class=" ml-auto mr-auto">
           <div class="row">
            <div class="col-12 ml-auto mr-auto">
                <h2 class="text-link-cast"><b>HOLA {{$usuario->name?$usuario->name:$usuario->nombre}}!</b></h2> 
                <h3 class="text-link-cast"><b>La empresa "{{$industria->Industria->razon_social}}" tiene un casting activo.</b></h3> 
                <h3 class="text-link-cast"><b>Lee las indicaciones y confirma si quieres participar en "{{$casting->nombre}}"</b></h3> 
                <h3 class="text-link-cast">Tipo de evento:<b> {{$casting->tipo_casting}}</b></h3> 
                <h3 class="text-link-cast">Descripción:<b> {{$casting->descripcion}}</b></h3> 
                <h3 class="text-link-cast">Lugar:<b> {{$casting->lugar}}  &nbsp</b>&nbsp  Fecha:<b> {{$casting->fecha_inicio}}</b></h3>
                <h3 class="text-link-cast">Desde:<b> {{$casting->fecha_inicio}}  &nbsp</b>&nbsp  Hasta:<b> {{$casting->fecha_fin}}</b></h3>
                <h3 class="text-link-cast"> En caso de estar en la selección se contactarán contigo.</h3> 
            </div>
            </div>
          <div class="card card-pricing" style="text-align: left;margin-top:-5px">
                  <div class="card-body">
                    <ul>
                      <li><H3> Derechos</H3>
                        <b>{{$casting->tiempo}}</b>
                      </li>
                      <li><H3> Información general</H3>
                        <b> Papel - {{$castingSelect->papel}} </b>
                      </li>
                      <li><b> Presupuesto - $ {{$castingSelect->presupuesto - (round(($castingSelect->presupuesto * $castingSelect->porcentaje) / 100,2))}}</b></li>
                      <li><b> Fecha pago - {{$casting->fecha_pago}} </b></li>
                    </ul>
                  </div>
        </div>
  
		  
		  <div class="col-12 col-offset-2" style="text-align: center;">
        
		<b style="color:red">Advertencia:</b> Si tienes algún contrato firmado con algún proyecto similar o competencia de lo indicado en el título de esta propuesta favor rechazar está invitación a casting. 
		Si usted acepta este casting y tiene algún contrato de derechos con algún proyecto similar a esta propuesta, <b>Ivotalents no se hace responsable por la falta incurrida de su parte</b>.
	
            </div>
        </div>
        
   
   
    

        <div id="acept" class="col-12 col-offset-2" style="text-align: center; margin-top:10px; margin-bottom:10px">
            <a class="btn btn-success btn-lg" style="color:white" href="{{ route('aceptar', ['id'=>$castingSelect->uid]) }}">Aceptar<div class="ripple-container"></div></a>
            <a class="btn btn-danger btn-lg" style="color:white" href="{{ route('rechazar', ['id'=>$castingSelect->uid]) }}">Rechazar</a>
            </div>
          
        </div>
      </div>


      <div class="row">          
        <div class="col-md-4 ml-auto mr-auto">
		
        </div>


      </div>


    </div>
  </div>
</div>



@endsection