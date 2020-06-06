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
              @if ($industria->avatar)
              <a href="#modal-imgperfil" data-toggle="modal">
                <img alt="Circle Image" style="max-height: 160px;" class="img-raised rounded-circle img-fluid" src="{{$industria->avatar}}">
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

        <div class="col-md-6">
           <div class="row">
              <div class="col-12 ml-auto mr-auto">
                  <h3 style="color: #1f8089;text-align: center;"><b>La empresa {{$industria->Industria->razon_social}} tiene un casting activo.</b></h3> 
                  <h3 style="color: #1f8089;text-align: center;"> Detalles del Casting.</h3> 
              </div>
            </div>

          <div class="card card-pricing" style="text-align: left;margin-top:5px">
                  <div class="card-body">
                    <ul>
                    <li><b> Descripción - {{$casting->descripcion}}</b></li>
                      <li><b> Lugar - {{$casting->lugar}} </b></li>
                      <li><b> Fecha - {{$casting->fecha_inicio}} </b></li>
                      <li><b> Hora - {{$casting->horario}} </b></li>
                    </ul>
                  </div>
          </div>
          
      </div>
      <div class="col-md-6 p-10">
	   <div class="row">
              <div class="col-12 ml-auto mr-auto">
                  <h3 style="color: #1f8089;text-align: center;"><b>Talentos seleccionados por la Empresa</b></h3> 
                  <h3 style="color: #1f8089;text-align: center;"> Detalles de los talentos.</h3> 
              </div>
            </div>
     
	  <div class="card card-pricing" style="text-align: left;margin-top:5px">
                  <div class="card-body">
      @foreach($castingSelect as $castingSelection)

            <?php 
              $year = date("Y");

              $dia=date("d");
              $mes=date("m");
              $ano=date("Y");
              $dianaz=$castingSelection->Talentos->dia;
              $mesnaz=$castingSelection->Talentos->mes;
              $anonaz=$castingSelection->Talentos->anio;
              if (($mesnaz == $mes) && ($dianaz > $dia)) {
              $ano=($ano-1); }
              if ($mesnaz > $mes) {
              $ano=($ano-1);}
              $edades=($ano-$anonaz);
            ?>

            <a href="#" data-toggle="modal" data-target="#elegirmodal" data-perfil-id="{{$castingSelection->Talentos->id}}">
              <div class="media" style="margin-left: 30px" >
                <a class="float-left" href="#" data-toggle="modal" data-target="#elegirmodal" data-perfil-id="{{$castingSelection->Talentos->id}}">
                  <div class="avatar">
                    <img class="media-object" alt="64x64" src="{{$castingSelection->Talentos->avatar}}">
                  </div>
                </a>
                <div class="media-body">
                <h5>Talento {{$castingSelection->Talentos->id}}
                
                &nbsp;&nbsp;&nbsp;&nbsp;
                <?php
                    $findme   = '"sent":true';
                    $pos = strpos($castingSelection->msj_status, $findme);

                    if ($pos === false) {
                      echo "<a href='/notificar/".$castingSelection->id."'><i style='font-size: 22px; color: red; cursor:pointer' class='material-icons'  title='Mensaje No se ha podido Enviar'>sms_failed</i></a>";
                    } else {
                      echo "<a href='/notificar/".$castingSelection->id."'><i style='font-size: 22px; color: green; cursor:pointer' class='material-icons'  title='Mensaje Enviado Correctamente'>sms</i></a>";                     
                    }
                ?>
                  @if($castingSelection->confirmado == 0)
                  <a href='#'><i class="material-icons" title="Talentos Convocados">account_circle</i></a>
                  @endif
                  @if($castingSelection->confirmado == 1)
                  <a href='#'><i class="material-icons" title="Talentos que Aceptaron">thumb_up</i> </a>
                  @endif
                  @if($castingSelection->confirmado == -1)
                  <a href='#'><i class="material-icons" title="Talentos que Rechazaron">thumb_down</i> </a>
                  @endif

                </h5>
                <p style="margin-top: 20px;margin-bottom: 0px; font-size: 13px">{{strtoupper($castingSelection->Talentos->Talentos->Talento1->nombre)}} | {{strtoupper($castingSelection->Talentos->Talentos->Talento2->nombre)}}</p>             
                  <p style="margin: 0px;; font-size: 13px"><b>{{$edades}} Años | {{$castingSelection->Talentos->Ciudad->nombre}} | {{$castingSelection->Talentos->Pais->nombre}}</b></p>   
                </div>
              </div>
            </a>  
            @endforeach
			
			 </div>
          </div>
      </div>

     
        </div>
    </div>
  </div>
</div>



@endsection