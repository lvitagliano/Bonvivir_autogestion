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
  
.badge1 {
   position:relative;
}
.badge1[data-badge]:after {
   content:attr(data-badge);
   position:absolute;
   top:-5px;
   right:-2px;
   font-size:.7em;
   background:red;
   color:white;
   width:18px;height:18px;
   text-align:center;
   line-height:18px;
   border-radius:50%;
   box-shadow:0 0 1px #333;
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
                    <img alt="Circle Image" style="max-height: 160px;" class="img-raised rounded-circle img-fluid" 
                    src="{{'https://ivotalent.s3-accelerate.amazonaws.com/files/thumbs/profile/'.$usuario->id.'/540px_foto_'.$usuario->id.'.png'}}">
                  </a>
                   @else
                   <a href="#modal-imgperfil" data-toggle="modal">
                   <img alt="Circle Image" style="max-height: 160px;"  class="img-raised rounded-circle img-fluid" 
                   src="{{ asset('img/vatar2.png') }}">
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
            <h5 class="in-line-black">Proyectos</h5>
        </div>
      </div>
      <br>

      <div class="row">          
        <div class="col-md-12 ml-auto mr-auto" style="margin-top: -80px">
                <div class="row">
                    <div class="col-md-8 col-sm-12"><h4 style="color: #1f8089;margin-left:15px"><b>MIS PROYECTOS</b></h4> 
                    </div>
                  <div class="col-md-4   col-sm-12 mt-0 text-right" style="padding-right:25px">
                    <a class="btn btn-primary btn-block btn-link btn-animation-blue" style="color: #ffffff;background-color:#1f8089" 
                    href="#" data-toggle="modal" data-target="#CrearProyecto">
                      <i class="material-icons">assignment</i> Crear Proyecto
                    <div class="ripple-container"></div></a>

                  </div> 

                 <div class="card card-nav-tabs"  style="width: 98%;margin-left: 1%;">
                  <div class="card-header card-header-primary" style="background: linear-gradient(60deg, #056770, #056770);">
                    <div class="nav-tabs-navigation">
                      <div class="nav-tabs-wrapper">
                        <ul class="nav nav-tabs" data-tabs="tabs">
                          <li class="nav-item" style="width:50%">
                            <a class="nav-link active show" href="#profile" data-toggle="tab">
                              <i class="material-icons">face</i> PROYECTOS ACTIVOS
                            <div class="ripple-container"></div></a>
                          </li>
                          <li class="nav-item" style="width:50%">
                            <a class="nav-link" href="#messages" data-toggle="tab">
                              <i class="material-icons">chat</i> PROYECTOS FINALIZADOS
                            <div class="ripple-container"></div></a>
                          </li>
                         
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="card-body " style="background: #EEEEEE;">
                    <div class="tab-content text-center">
                      <div class="tab-pane active show" id="profile">
                        <div class="row">                         
                          <div class="col-lg-12 col-md-12 col-sm-12">
                            <form id="buscarForm" method="post" action="{{route('buscarproyectos')}}"  autocomplete="off"> 
                              {{csrf_field()}}
                              <div class="card">
                                        <div class="row ml-1">
                                          <div class="col-lg-3 col-md-3 col-sm-12">
                                            <input type="text"  id="descripcion_buscar" name="descripcion_buscar"  
                                            style="width:100%;color:#A1A1A1; 
                                            margin-top: 15px;
                                            margin-right: 1px;
                                            margin-bottom: 10px;
                                            margin-left: 1px;
                                            background: no-repeat bottom, 50% calc(100% - 1px);
                                            background-size: 0 100%, 100% 100%;
                                            border: 0;
                                            height: 36px;
                                            transition: background 0s ease-out;
                                            padding-left: 0;
                                            padding-right: 0;
                                            border-radius: 0;
                                            font-size: 12px;
                                            background-image: linear-gradient(0deg, #fff 2px, #464648 0), linear-gradient(0deg, #d2d2d2 1px, hsla(0, 0%, 82%, 0) 0);" 
                                            placeholder="NOMBRE,PARTE DEL NOMBRE O DESCRIPCION..."  
                                          value="{{strtoupper(request()->descripcion_buscar)}}"
                                            autocomplete="off"/>                                                
                                            
                                          </div>


                                          <div class="col-lg-2 col-md-2 col-sm-12">
                                            <select class="selectpicker"  data-live-search="true"  
                                             value="{{strtoupper(request()->evento_buscar)}}"
                                            id="evento_buscar" name="evento_buscar"   
                                            data-style="select-with-transition" 
                                            data-style="font-size: 14px;" 
                                            title="TIPO DE EVENTO" data-size="5">
                                                 <option disabled> TIPO DE EVENTO</option>
                                                 <option value="PUBLICIDAD">PUBLICIDAD</option>
                                                 <option value="TELEVISION">TELEVISION</option>
                                                 <option value="CINE">CINE</option>
                                                 <option value="EVENTO EN VIVO">EVENTO EN VIVO</option>
                                                 <option value="EVENTO GRABADO">EVENTO GRABADO</option>
                                                 <option value="PERTENECER A UN GRUPO">PERTENECER A UN GRUPO</option>
                                                 <option value="BODA">BODA</option>
                                                 <option value="BAUTIZO">BAUTIZO</option>
                                                 <option value="CUMPLEAÑOS">CUMPLEAÑOS</option>
                                                 <option value="ANIVERSARIO">ANIVERSARIO</option>
                                                 <option value="LANZAMIENTO">LANZAMIENTO</option>
                                                 <option value="INAUGURACION">INAUGURACION</option>
                                                 <option value="DESFILE">DESFILE</option>
                                                 <option value="PASARELA">PASARELA</option>
                                                 <option value="FESTIVAL">FESTIVAL</option>
                                                 <option value="CONCIERTO">CONCIERTO</option>
                                                 <option value="TEATRO">TEATRO</option>
                                                 <option value="VIDEOS MUSICALES">VIDEOS MUSICALES</option>
                                             </select>
                                            
                                            </div>

                                            <div class="col-lg-2 col-md-2 col-sm-12">
                                            
                                              <input type="text" id="desde_buscar" name="desde_buscar" placeholder="FECHA DESDE" 
                                              style="width:100%;color:#A1A1A1; 
                                              margin-top: 15px;
                                              margin-right: 1px;
                                              margin-bottom: 10px;
                                              margin-left: 1px;
                                              background: no-repeat bottom, 50% calc(100% - 1px);
                                              background-size: 0 100%, 100% 100%;
                                              border: 0;
                                              height: 36px;
                                              transition: background 0s ease-out;
                                              padding-left: 0;
                                              padding-right: 0;
                                              border-radius: 0;
                                              font-size: 12px;
                                              background-image: linear-gradient(0deg, #fff 2px, #464648 0), linear-gradient(0deg, #d2d2d2 1px, hsla(0, 0%, 82%, 0) 0);"
                                               class="datepicker" 
                                               value="{{strtoupper(request()->desde_buscar)}}"
                                               autocomplete="off"/>

                                              </div>

                                             <div class="col-lg-2 col-md-2 col-sm-12">
                                              <input type="text" id="hasta_buscar" name="hasta_buscar" placeholder="FECHA HASTA" 
                                              style="width:100%;color:#A1A1A1; 
                                              margin-top: 15px;
                                              margin-right: 1px;
                                              margin-bottom: 10px;
                                              margin-left: 1px;
                                              background: no-repeat bottom, 50% calc(100% - 1px);
                                              background-size: 0 100%, 100% 100%;
                                              border: 0;
                                              height: 36px;
                                              transition: background 0s ease-out;
                                              padding-left: 0;
                                              padding-right: 0;
                                              border-radius: 0;
                                              font-size: 12px;
                                              background-image: linear-gradient(0deg, #fff 2px, #464648 0), linear-gradient(0deg, #d2d2d2 1px, hsla(0, 0%, 82%, 0) 0);" 
                                               class="datepicker" 
                                               value="{{strtoupper(request()->hasta_buscar)}}"
                                               autocomplete="off"/>
                                                
                                            
                                              </div>

                                              <div class="col-lg-2 col-md-2 col-sm-12">
                                                <select class="selectpicker"  data-live-search="true"  
                                                d="marca_buscar" name="marca_buscar" 
                                                data-style="select-with-transition" 
                                                data-style="font-size: 14px;" 
                                                title="MARCA" data-size="5"
                                                value="{{strtoupper(request()->marca_buscar)}}">
                                                    <option disabled> MARCA</option>
                                                </select>
                                                  
                                              
                                                </div>

                                                <div class="col-lg-1 col-md-1 col-sm-12">

                                                  <button class="btn btn-just-icon btn-round btn-primary" 
                                                  style="margin-top: 12px" id="buscar_proyecto">
                                                    <i class="fa fa-search"> </i>
                                                  <div class="ripple-container"></div><div class="ripple-container"></div></button>

 
                                                  </div>

                                                  <div class="col-md-12 ml-auto mr-auto p-0">                                
                                                    <p style="cursor:pointer" class="info-reset" id="resetear">Reiniciar Busqueda</p>
                                                </div>
                                     </div>
                              
                                </div>
                            </form>
                          </div>
                        </div>
                          <div class="col-lg-12 col-md-12 col-sm-12">
                            {{ $proyectos->appends(request()->except('page'))->links() }}
                       </div>

                       
                        <div class="row col-12" id="resultados" style="margin-top: -30px">
                         
                          @foreach($proyectos as $proyecto)

                          
                          <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="card card-blog  p-2">
                                          <div class="card-image">
                                          <h5 class="media-heading mb-0" style="margin-bottom: 0px">Proyecto: {{$proyecto->nombre}} &nbsp;&nbsp;&nbsp;&nbsp; 
                                            <i class="material-icons eliminaros" 
                                              style="color:grey; font-size: 20px; cursor:pointer" data-perfil-id="{{$proyecto->id}}">highlight_off</i>
                                            </h5>
                          
                                          <div class="colored-shadow" style="background-image: url(&quot;assets/img/examples/card-blog1.jpg&quot;); opacity: 1;"></div></div>
                      
                                          <div class="card-content">
                                          <h4 class="card-title">
                                              <a href="#"> {{$proyecto->descripcion}}</a>
                                            </h4>
                                            <p class="card-description">
                                            Si has trabajado con proyectos  que compitan en el sector de <b>{{$proyecto->observaciones}}</b> en publicidad declinar esta oferta de casting, ya que es competencia del Sector.
                                           
                                            </p>
                      
                                            <h6  style="margin-top: 0px">  <b>Lugar:</b> {{$proyecto->lugar}} | <b>Fecha:</b> {{$proyecto->fecha_inicio}}| <b>Hora:</b> {{$proyecto->horario}} | <b>Duración:</b> {{$proyecto->tiempo}} </h6> 
                                            <h6  style="margin-top: 0px">  <b>Fecha Pago:</b> {{$proyecto->fecha_pago}} | <b>Cantidad de Talentos:</b> {{$proyecto->cantidad_talentos}} | 
                                            <b>Fecha:</b> {{$proyecto->fecha_inicio}} <b>a</b> {{$proyecto->fecha_fin}}</h6> 
                                            <h6  style="margin-top: 0px">  <b>Tipo Evento:</b> {{$proyecto->tipo_casting}}  </h6> 
                                          </div>
                                          <div class="footer">
                                          <div class="stats pt-3" style="float: left;line-height: 30px;color: #999999;">
                                          <ul class="">
                                          <li class="list-horizontal">
                                              <a class="btn-nav @if(count($proyecto->MensajesNoReceptor)>0) badge1 @endif" @if(count($proyecto->MensajesNoReceptor)>0) data-badge="{{count($proyecto->MensajesNoReceptor)}} @endif" href="{{ route('unproyecto', ['id'=> $proyecto->id]) }}" data-perfil-id="{{$proyecto->id}}">
                                                <i class="material-icons">account_circle</i> Ver Talentos
                                              </a>
                                            </li>
                                            <li class="list-horizontal">
                                              <a class="btn-nav" href="#" data-toggle="modal" data-target="#editarProyecto"
                                               data-perfil-id="{{$proyecto->id}}">
                                                <i class="material-icons">account_circle</i> Editar
                                              </a>
                                            </li>
                                            </ul>
                                              </div>
                                             
                                              <div class="stats pt-3" style="float: right;line-height: 30px;color: #999999;">
                                                  <i class="material-icons">account_circle</i> {{$proyecto->Seleccionados->Count()}} ·
                                                  <i class="material-icons">thumb_up</i> {{$proyecto->Aceptados->Count()}} ·
                                                  <i class="material-icons">thumb_down</i> {{$proyecto->Rechazados->Count()}} .
                                                  {{-- <a href="{{ route('generandopdf',['id'=>$proyecto->id]) }}"> --}}
                                              </div>
                                          </div>
                                </div>
                                
                         </div>
                          @endForeach
                        
                          {{ $proyectos->appends(request()->except('page'))->links() }}
                        </div>
                        <div class="loader" id="loader" style="background: #EEEEEE;"></div>
                      </div>
                      <div class="tab-pane" id="messages">

                      </div>

                      </div>
                     
                    </div>
                  </div>
                </div>


                
                
                <div style="height: 155px"></div>
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
          <a class="btn-nav-foot" href="{{ route('mistalentos') }}">
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




 
<!-- small modal -->
<div class="modal fade" id="CrearProyecto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" style="margin-top: 40px;">
    <div class="modal-content" style="background-color: #464648;color:#A1A1A1" >
      <div class="modal-header">
        <h4 class="modal-title">DATOS DEL PROYECTO</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
      </div>

  <div id="form_oculto" style="display:none">
<form id="agregar_proyecto" method="post" action="{{route('agregarproyecto')}}"  autocomplete="off">
      <div class="modal-body text-center">
         <!-- <h5 class="mb-0 mt-0">Editar Info Empresa</h5> -->          
                  {{csrf_field()}}
              <div class="row text-left">
                <input type="hidden" name="asistencia" id="asistencia" value="0">

                      <div class="col-lg-6 col-sm-6">
                                  <input type="text" required  style="color:#A1A1A1;margin: 10px 1px;
                                  margin-top: 20px;
                                  margin-right: 1px;
                                  margin-bottom: 10px;
                                  margin-left: 1px;" id="titulo" name="titulo" placeholder="TÍTULO" class="form-control"  autocomplete="off"/>
                      </div>  

                      <div class="col-lg-6 col-sm-6">
                              <select class="selectpicker" required data-live-search="true"  id="tipo_evento" name="tipo_evento" 
                              data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                title="TIPO DE EVENTO" data-size="5">
                                     <option disabled> TIPO DE EVENTO</option>
                                     <option value="PUBLICIDAD">PUBLICIDAD</option>
                                     <option value="TELEVISION">TELEVISION</option>
                                     <option value="CINE">CINE</option>
                                     <option value="EVENTO EN VIVO">EVENTO EN VIVO</option>
                                     <option value="EVENTO GRABADO">EVENTO GRABADO</option>
                                     <option value="PERTENECER A UN GRUPO">PERTENECER A UN GRUPO</option>
                                     <option value="BODA">BODA</option>
                                     <option value="BAUTIZO">BAUTIZO</option>
                                     <option value="CUMPLEAÑOS">CUMPLEAÑOS</option>
                                     <option value="ANIVERSARIO">ANIVERSARIO</option>
                                     <option value="LANZAMIENTO">LANZAMIENTO</option>
                                     <option value="INAUGURACION">INAUGURACION</option>
                                     <option value="DESFILE">DESFILE</option>
                                     <option value="PASARELA">PASARELA</option>
                                     <option value="FESTIVAL">FESTIVAL</option>
                                     <option value="CONCIERTO">CONCIERTO</option>
                                     <option value="TEATRO">TEATRO</option>
                                 </select>
                      </div>


                      <div class="col-lg-12 col-sm-12">
                                  <input type="text"  required  id="descripcion_breve" name="descripcion_breve"  style="color:#A1A1A1;margin: 10px 1px;
                                  margin-top: 10px;
                                  margin-right: 1px;
                                  margin-bottom: 10px;
                                  margin-left: 1px;" placeholder="EXPLICA TU EVENTO" class="form-control"  autocomplete="off"/>
                      </div>  
                    
                      <div class="col-lg-6 col-sm-6">
                              <select class="selectpicker"   required data-live-search="true"  id="pais_evento" name="pais_evento" required data-lugar="1" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                title="Elegir País" data-size="5">
                                     <option disabled> Elegir Pais</option>
                                     @foreach($paises as $pais)
                                           <option value="{{$pais->codigo_pais}}" @if($pais->codigo_pais == $usuario->Industria->Pais->codigo_pais) selected @endif>{{$pais->nombre}}</option>
                                     @endforeach
                                 </select>
                      </div>
                      <div class="col-lg-6 col-sm-6">
                              <select class="selectpicker"   required data-live-search="true"  id="ciudad_evento" name="ciudad_evento" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                title="Elegir Ciudad" data-size="5">
                                     <option disabled> Elegir Ciudad</option>
                                     @foreach($ciudades as $ciudad)
                                     <option value="{{$ciudad->id}}"  @if($ciudad->id == $usuario->Industria->Ciudad->id) selected @endif>{{$ciudad->nombre}}</option>
                                     @endforeach
                                 </select>
                      </div>

                      <div class="col-lg-6 col-sm-6">
                          <input type="text" id="fecha_desde" required  readonly  name="fecha_desde" placeholder="FECHA DESDE" class="form-control datepicker" style="
                                  color:#A1A1A1;
                                  margin: 10px 1px;
                                  margin-top: 10px;
                                  margin-right: 1px;
                                  margin-bottom: 10px;
                                  margin-left: 1px;
                                  "  autocomplete="off"/>
                      </div> 


                      <div class="col-lg-6 col-sm-6">
                          <input type="text" id="fecha_hasta" readonly  name="fecha_hasta" placeholder="FECHA HASTA" class="form-control datepicker" style="
                                  color:#A1A1A1;
                                  margin: 10px 1px;
                                  margin-top: 10px;
                                  margin-right: 1px;
                                  margin-bottom: 10px;
                                  margin-left: 1px;
                                  "  autocomplete="off"/>
                      </div> 

    
                      <div class="col-lg-6 col-sm-6">
                                      <input type="text" style="color:#A1A1A1;margin: 10px 1px;
                                      margin-top: 10px;
                                      margin-right: 1px;
                                      margin-bottom: 10px;
                                      margin-left: 1px;" id="horario_desde" name="horario_desde" placeholder="HORARIO DESDE" class="form-control"  autocomplete="off"/>
                      </div>

                      <div class="col-lg-6 col-sm-6">
                                      <input type="text" style="color:#A1A1A1;margin: 10px 1px;
                                      margin-top: 10px;
                                      margin-right: 1px;
                                      margin-bottom: 10px;
                                      margin-left: 1px;" id="horario_hasta" name="horario_hasta" placeholder="HORARIO HASTA" class="form-control"  autocomplete="off"/>
                      </div>
                      <div class="col-lg-12 col-sm-12">
                                      <label style="color:#A1A1A1;margin: 10px 1px;
                                      margin-top: 25px;
                                      margin-right: 1px;
                                      margin-bottom: 10px;
                                      margin-left: 1px; vertical-align: middle">DURACIÓN DE DERECHOS</label>
                      </div>


                      <div class="col-lg-4 col-sm-4">
                                      <input type="number" style="color:#A1A1A1;margin: 10px 1px;
                                      margin-top: 20px;
                                      margin-right: 1px;
                                      margin-bottom: 10px;
                                      margin-left: 1px;" id="derechos_cantidad" name="derechos_cantidad" placeholder="CANTIDAD" class="form-control"  autocomplete="off"/>
                      </div>

                      <div class="col-lg-4 col-sm-4">
                      <select class="selectpicker"  data-live-search="true"  id="derechos_tiempo" name="derechos_tiempo" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                title="TIPO TIEMPO" data-size="5">
                                     <option disabled> TIPO TIEMPO</option>
                                     <option value="DIAS">DIAS</option>
                                     <option value="SEMANAS">SEMANAS</option>
                                     <option value="MES">MES</option>
                                     <option value="AÑO">AÑO</option>
                                     <option value="INDEFINIDO">INDEFINIDO</option>
                                 </select>
                      </div>

                      <div class="col-lg-4 col-sm-4">
                              <select class="selectpicker"  data-live-search="true" multiple   id="derechos_para" name="derechos_para[]" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                title="DERECHOS PARA" data-size="5">
                                     <option disabled> DERECHOS PARA</option>
                                     <option value="REDES">REDES</option>
                                     <option value="TV">TV</option>
                                     <option value="CINE">CINE</option>
                                     <option value="PRENSA">PRENSA</option>
                                     <option value="VALLAS">VALLAS</option>
                                     <option value="PANTALLAS DIGITALES">PANTALLAS DIGITALES</option>
                                     <option value="CATALOGOS">CATALOGOS</option>
                                 </select>
                      </div>

                      <div class="col-lg-6 col-sm-6">
                          <input type="text" id="pago_fecha"  readonly name="pago_fecha" placeholder="FECHA DE PAGO" class="form-control datepicker" style="
                                  color:#A1A1A1;
                                  margin: 10px 1px;
                                  margin-top: 10px;
                                  margin-right: 1px;
                                  margin-bottom: 10px;
                                  margin-left: 1px;
                                  "  autocomplete="off"/>
                      </div> 

                      <div class="col-lg-6 col-sm-6">
                        <input type="text" style="color:#A1A1A1;margin: 10px 1px;
                        margin-top: 10px;
                        margin-right: 1px;
                        margin-bottom: 10px;
                        margin-left: 1px;" id="marca" name="marca" placeholder="(*) MARCA" class="form-control" autocomplete="off"/>
                       </div>
      
                      <div class="col-lg-6 col-sm-6">
                                      <input type="number" required  style="color:#A1A1A1;margin: 10px 1px;
                                      margin-top: 10px;
                                      margin-right: 1px;
                                      margin-bottom: 10px;
                                      margin-left: 1px;" id="cantidad_talentos" name="cantidad_talentos" placeholder="CANTIDAD DE TALENTOS" class="form-control" autocomplete="off"/>
                      </div>
                    
                     <div class="col-lg-6 col-sm-6">
                         <p>*Este dato solo lo ves tú.</p>
                    </div>

                      <div class="col-lg-12 col-sm-12 p-t-10">
                     <br>
                      <p>Si has trabajado con proyectos  que compitan en el sector de  <input type="text" 
                      style="color:#A1A1A1;margin: 10px 1px;
                                  margin-top: 10px;
                                  margin-right: 1px;
                                  margin-bottom: 10px;
                                  margin-left: 1px; 
                                  background: no-repeat bottom, 50% calc(100% - 1px);
                                  background-size: 0 100%, 100% 100%;
                                  border: 0;
                                  height: 36px;
                                  transition: background 0s ease-out;
                                  padding-left: 0;
                                  padding-right: 0;
                                  border-radius: 0;
                                  font-size: 14px;
                                  background-image: linear-gradient(0deg, #fff 2px, #464648 0), linear-gradient(0deg, #d2d2d2 1px, hsla(0, 0%, 82%, 0) 0);" 
                                  id="observaciones" name="observaciones" placeholder="SECTOR" autocomplete="off"/> en publicidad declinar esta oferta de casting, ya que es competencia del Sector.</p>

                      </div>

              </div>  
            
      </div>
      <div class="modal-footer text-center" style="justify-content: center;">
      {{-- <button class="btn btn-primary"  id="tempo"  type="button" style="visible:false;" disabled>
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
          Espere...
          </button> --}}
        <button type="submit" id="submio" class="btn btn-success btn-simple">Guardar</button>
      </div>
    </form> 
  </div> 
    </div>
  </div>
</div>
<!--    end small modal -->
</div>






 
<!-- small modal -->
<div class="modal fade" id="editarProyecto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" style="margin-top: 40px;">
    <div class="modal-content" style="background-color: #464648;color:#A1A1A1" >
      <div class="modal-header">
        <h4 class="modal-title">DATOS DEL PROYECTO</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
      </div>
  <div id="form_oculto">
    <form id="editar_proyecto_form" method="post" action=""  autocomplete="off">
      <div class="modal-body text-center">
                  {{csrf_field()}}
              <div class="row text-left">
                <input type="hidden" name="id_edit" id="id_edit" value="0">

                      <div class="col-lg-6 col-sm-6">
                                  <input type="text" required  style="color:#A1A1A1;margin: 10px 1px;
                                  margin-top: 20px;
                                  margin-right: 1px;
                                  margin-bottom: 10px;
                                  margin-left: 1px;" id="titulo_edit" name="titulo_edit" placeholder="TÍTULO" class="form-control"  autocomplete="off"/>
                      </div>  

                      <div class="col-lg-6 col-sm-6">
                              <select class="selectpicker" required data-live-search="true"  id="tipo_evento_edit" name="tipo_evento_edit" 
                              data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                title="TIPO DE EVENTO" data-size="5">
                                     <option disabled> TIPO DE EVENTO</option>
                                     <option value="PUBLICIDAD">PUBLICIDAD</option>
                                     <option value="TELEVISION">TELEVISION</option>
                                     <option value="CINE">CINE</option>
                                     <option value="EVENTO EN VIVO">EVENTO EN VIVO</option>
                                     <option value="EVENTO GRABADO">EVENTO GRABADO</option>
                                     <option value="PERTENECER A UN GRUPO">PERTENECER A UN GRUPO</option>
                                     <option value="BODA">BODA</option>
                                     <option value="BAUTIZO">BAUTIZO</option>
                                     <option value="CUMPLEAÑOS">CUMPLEAÑOS</option>
                                     <option value="ANIVERSARIO">ANIVERSARIO</option>
                                     <option value="LANZAMIENTO">LANZAMIENTO</option>
                                     <option value="INAUGURACION">INAUGURACION</option>
                                     <option value="DESFILE">DESFILE</option>
                                     <option value="PASARELA">PASARELA</option>
                                     <option value="FESTIVAL">FESTIVAL</option>
                                     <option value="CONCIERTO">CONCIERTO</option>
                                     <option value="TEATRO">TEATRO</option>
                                 </select>
                      </div>


                      <div class="col-lg-12 col-sm-12">
                                  <input type="text"  required  id="descripcion_breve_edit" name="descripcion_breve_edit"  style="color:#A1A1A1;margin: 10px 1px;
                                  margin-top: 10px;
                                  margin-right: 1px;
                                  margin-bottom: 10px;
                                  margin-left: 1px;" placeholder="EXPLICA TU EVENTO" class="form-control"  autocomplete="off"/>
                      </div>  
                    
                      <div class="col-lg-6 col-sm-6">
                              <select class="selectpicker"   required data-live-search="true"  id="pais_evento_edit" name="pais_evento_edit" required data-lugar="1" 
                              data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                title="Elegir Pais" data-size="5">
                                     <option disabled> Elegir Pais</option>
                                     @foreach($paises as $pais)
                                           <option value="{{$pais->codigo_pais}}" @if($pais->codigo_pais == $usuario->Industria->Pais->codigo_pais) selected @endif>{{$pais->nombre}}</option>
                                     @endforeach
                                 </select>
                      </div>
                      <div class="col-lg-6 col-sm-6">
                              <select class="selectpicker"   required data-live-search="true"  id="ciudad_evento_edit" name="ciudad_evento_edit" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                title="Elegir Ciudad" data-size="5">
                                     <option disabled> Elegir Ciudad</option>
                                     @foreach($ciudades as $ciudad)
                                     <option value="{{$ciudad->id}}"  @if($ciudad->id == $usuario->Industria->Ciudad->id) selected @endif>{{$ciudad->nombre}}</option>
                                     @endforeach
                                 </select>
                      </div>

                      <div class="col-lg-6 col-sm-6">
                          <input type="text" id="fecha_desde_edit" required  readonly  name="fecha_desde_edit" placeholder="FECHA DESDE" class="form-control datepicker" style="
                                  color:#A1A1A1;
                                  margin: 10px 1px;
                                  margin-top: 10px;
                                  margin-right: 1px;
                                  margin-bottom: 10px;
                                  margin-left: 1px;
                                  "  autocomplete="off"/>
                      </div> 


                      <div class="col-lg-6 col-sm-6">
                          <input type="text" id="fecha_hasta_edit" readonly  name="fecha_hasta_edit" placeholder="FECHA HASTA" class="form-control datepicker" style="
                                  color:#A1A1A1;
                                  margin: 10px 1px;
                                  margin-top: 10px;
                                  margin-right: 1px;
                                  margin-bottom: 10px;
                                  margin-left: 1px;
                                  "  autocomplete="off"/>
                      </div> 

    
                      <div class="col-lg-6 col-sm-6">
                                      <input type="text" style="color:#A1A1A1;margin: 10px 1px;
                                      margin-top: 10px;
                                      margin-right: 1px;
                                      margin-bottom: 10px;
                                      margin-left: 1px;" id="horario_desde_edit" name="horario_desde_edit" 
                                      placeholder="HORARIO DESDE" class="form-control"  autocomplete="off"/>
                      </div>

                      <div class="col-lg-6 col-sm-6">
                                      <input type="text" style="color:#A1A1A1;margin: 10px 1px;
                                      margin-top: 10px;
                                      margin-right: 1px;
                                      margin-bottom: 10px;
                                      margin-left: 1px;" id="horario_hasta_edit" name="horario_hasta_edit" 
                                      placeholder="HORARIO HASTA" class="form-control"  autocomplete="off"/>
                      </div>
                      <div class="col-lg-12 col-sm-12">
                                      <label style="color:#A1A1A1;margin: 10px 1px;
                                      margin-top: 25px;
                                      margin-right: 1px;
                                      margin-bottom: 10px;
                                      margin-left: 1px; vertical-align: middle">DURACION DE DERECHOS</label>
                      </div>


                      <div class="col-lg-4 col-sm-4">
                                      <input type="number" style="color:#A1A1A1;margin: 10px 1px;
                                      margin-top: 20px;
                                      margin-right: 1px;
                                      margin-bottom: 10px;
                                      margin-left: 1px;" id="derechos_cantidad_edit" name="derechos_cantidad_edit" placeholder="CANTIDAD" class="form-control"  autocomplete="off"/>
                      </div>

                      <div class="col-lg-4 col-sm-4">
                      <select class="selectpicker"  data-live-search="true"  id="derechos_tiempo_edit" name="derechos_tiempo_edit" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                title="TIPO TIEMPO" data-size="5">
                                     <option disabled> TIPO TIEMPO</option>
                                     <option value="DIAS">DIAS</option>
                                     <option value="SEMANAS">SEMANAS</option>
                                     <option value="MES">MES</option>
                                     <option value="AÑO">AÑO</option>
                                     <option value="INDEFINIDO">INDEFINIDO</option>
                                 </select>
                      </div>

                      <div class="col-lg-4 col-sm-4">
                              <select class="selectpicker"  data-live-search="true" multiple   id="derechos_para_edit" name="derechos_para_edit[]" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                title="DERECHOS PARA" data-size="5">
                                     <option disabled> DERECHOS PARA</option>
                                     <option value="REDES">REDES</option>
                                     <option value="TV">TV</option>
                                     <option value="CINE">CINE</option>
                                     <option value="PRENSA">PRENSA</option>
                                     <option value="VALLAS">VALLAS</option>
                                     <option value="PANTALLAS DIGITALES">PANTALLAS DIGITALES</option>
                                     <option value="CATALOGOS">CATALOGOS</option>
                                 </select>
                      </div>

                      <div class="col-lg-6 col-sm-6">
                          <input type="text" id="pago_fecha_edit"  readonly name="pago_fecha_edit" placeholder="FECHA DE PAGO" class="form-control datepicker" style="
                                  color:#A1A1A1;
                                  margin: 10px 1px;
                                  margin-top: 10px;
                                  margin-right: 1px;
                                  margin-bottom: 10px;
                                  margin-left: 1px;
                                  "  autocomplete="off"/>
                      </div> 

                      <div class="col-lg-6 col-sm-6">
                        <input type="text" style="color:#A1A1A1;margin: 10px 1px;
                        margin-top: 10px;
                        margin-right: 1px;
                        margin-bottom: 10px;
                        margin-left: 1px;" id="marc_edit" name="marca_edit" placeholder="(*) MARCA" class="form-control" autocomplete="off"/>
                       </div>
      
                      <div class="col-lg-6 col-sm-6">
                                      <input type="number" required  style="color:#A1A1A1;margin: 10px 1px;
                                      margin-top: 10px;
                                      margin-right: 1px;
                                      margin-bottom: 10px;
                                      margin-left: 1px;" id="cantidad_talentos_edit" name="cantidad_talentos_edit" placeholder="CANTIDAD DE TALENTOS" class="form-control" autocomplete="off"/>
                      </div>

                       <div class="col-lg-6 col-sm-6">
                           <p>*Este dato solo lo ves tú.</p>
                      </div>

                    
                       <div class="col-lg-12 col-sm-12 p-t-10">
                     <br>
                      <p>Si has trabajado con proyectos  que compitan en el sector de  <input type="text" 
                      style="color:#A1A1A1;margin: 10px 1px;
                                  margin-top: 10px;
                                  margin-right: 1px;
                                  margin-bottom: 10px;
                                  margin-left: 1px; 
                                  background: no-repeat bottom, 50% calc(100% - 1px);
                                  background-size: 0 100%, 100% 100%;
                                  border: 0;
                                  height: 36px;
                                  transition: background 0s ease-out;
                                  padding-left: 0;
                                  padding-right: 0;
                                  border-radius: 0;
                                  font-size: 14px;
                                  background-image: linear-gradient(0deg, #fff 2px, #464648 0), linear-gradient(0deg, #d2d2d2 1px, hsla(0, 0%, 82%, 0) 0);" 
                                  id="observaciones_edit" name="observaciones_edit" placeholder="SECTOR" autocomplete="off"/> en publicidad declinar esta oferta de casting, ya que es competencia del Sector.</p>

                      </div>

              </div>  
            
      </div>
      <div class="modal-footer text-center" style="justify-content: center;">
         <button type="submit" id="submio_edit" class="btn btn-success btn-simple">Guardar Cambios</button>
      </div>
    </form> 
  </div> 
    </div>
  </div>
</div>
</div>





<!-- Ver Talentos modal -->
<div class="modal fade" id="vertalentosmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
          <div class="modal-content" style="background-color: #464648;color:#A1A1A1" >
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
            </div>
            <div class="modal-body text-center">
               <!-- <h5 class="mb-0 mt-0">Editar Info Empresa</h5> -->          
                        {{csrf_field()}}
                    <div class="row text-left" id="VerTalentosDiv">
                                
                      
                    </div>  
                  
            </div>
            <div class="modal-footer text-center" style="justify-content: center; height: 35px">
     
     </div>
          </div>
        
        </div>
    
      </div>
      <!--    end small modal -->
</div>



<!-- Solicitar Casting modal -->
<div class="modal fade" id="solicitarcastingmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
          <div class="modal-content" style="background-color: #464648;color:#A1A1A1" >
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
            </div>
            <div class="modal-body text-center">
            <h5 class="mb-0 mt-0">Solicitar Casting</h5>         
                        {{csrf_field()}}
                   <form id="SolicitarForm" method="post">
                                <p>Una vez seleccionados todos los talentos puede solicitar el casting haciendo click en el boton a continuacion.<p>
                                <button type="submit" class="btn btn-success btn-simple" id="solicitar">Solicitar</button>
                                 <button class="btn btn-primary"  id="tempo"  type="button" style="display:none;" disabled>
                                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                  Espere...
                                 </button>
                      
                    </form>  
                  
            </div>
            <div class="modal-footer text-center" style="justify-content: center; height: 35px">
     
     </div>
          </div>
        
        </div>
    
      </div>
      <!--    end small modal -->




</div>

@endsection


@section('scripts')

 <script>


$('#editarProyecto').on('show.bs.modal', function(e) {  
     var dependent = $(e.relatedTarget).data('perfil-id');

     $('#editar_proyecto_form').attr('action', 'editar-proyecto-guardado/'+dependent);
     

      $.ajax({
           url: "/editar-proyecto/"+dependent,
           method: "get",
           success:function(result)
             {
               console.log(result);
              var obj = jQuery.parseJSON(result.replace('[', '').replace(']', ''));
              $("#id_edit").val(obj.id);
              $("#titulo_edit").val(obj.nombre.toUpperCase());
              $('select[name=tipo_evento_edit]').val(obj.tipo_casting.toUpperCase());
              $("#descripcion_breve_edit").val(obj.descripcion.toUpperCase());
              var res = obj.lugar.split("/");
              $('select[name=pais_edit]').val(res[0]);
              $('select[name=ciudad_edit]').val(res[1]);

              $("#fecha_desde_edit").val(obj.fecha_inicio);
              $("#fecha_hasta_edit").val(obj.fecha_fin);

              var horario = obj.horario.split("-");
              $("#horario_desde_edit").val(horario[0]);
              $("#horario_hasta_edit").val(horario[1]);

              var tiempo = obj.tiempo.split("-");
              $("#derechos_cantidad_edit").val(parseInt(tiempo[0],10));
              $('select[name=derechos_tiempo_edit]').val(tiempo[1].toUpperCase().trimStart().trimEnd());

              var derechos_para = tiempo[2].split(",");
              
              let optArr = [];
              
                for (var i = 0; i < derechos_para.length; i++) {
                  optArr.push(derechos_para[i]);
                }

              $("#derechos_para_edit").selectpicker('val', optArr);
              $('#derechos_para_edit').selectpicker('refresh');
 
 
              $("#pago_fecha_edit").val(obj.fecha_pago);
              $("#pago_marca_edit").val(obj.marca);
              $("#cantidad_talentos_edit").val(parseInt(obj.cantidad_talentos,10));
              $("#observaciones_edit").val(obj.observaciones);

              $('.selectpicker').selectpicker('refresh')
             }
          })
});



$("#cantidad_talentos").on('keyup keypress focusout change', function(e) {
  var valor = $("#cantidad_talentos").val();
  var pago = 0;
  if(valor == 1){
    pago = 50;
  }
  if(valor == 2){
    pago = 70;
  }
  if(valor > 2){
    pago = valor * 35;
  }
  $("#precio_total").html('El precio por estos talentos es: $'+pago);
});

//CARGA DE LOS RESULTADOS INICIALES DE BUSQUEDA RAPIDA.



$('#solicitarcastingmodal').on('show.bs.modal', function(e) {
    var dependent = $(e.relatedTarget).data('perfil-id');
    var _token = '{{csrf_token()}}';

    $('#SolicitarForm').attr('action', 'enviar-notificacion/'+dependent);

});




var frm = $('#SolicitarForm');

frm.submit(function (e) {

    e.preventDefault();
    $('#tempo').show();
   $('#solicitar').hide();
    $.ajax({
        type: frm.attr('method'),
        url: frm.attr('action'),
        data: frm.serialize(),
                        
            success:function(data) {
               $.toast({
                heading: 'Notificacion enviada',
                text: 'El  pedido ha sido enviado correctamente.',
                showHideTransition: 'slide',
                icon: 'success',
                position: 'bottom-right'
            });

           

            },
            complete: function(){                
              setTimeout(function(){
                  location.href="/mis-proyectos";
                },3000); 
            }
    });
});




$('#elegirmodal').on('show.bs.modal', function(e) {
    var dependent = $(e.relatedTarget).data('perfil-id');
    var _token = '{{csrf_token()}}';
    $.ajax({
           url: "{{ route('elegirtalento')}}",
           method: "POST",
           data:{ _token:_token, dependent:dependent },
           success:function(result)
             {
               $('#mbody').html(result);
             }
          })
});



$(document).ready(function() {
  $(function() {
    $('.datepicker').datepicker({
      dateFormat: 'dd/mm/yy',
      showButtonPanel: false,
      changeMonth: false,
      changeYear: false,
      /*showOn: "button",
      buttonImage: "images/calendar.gif",
      buttonImageOnly: true,
      minDate: '+1D',
      maxDate: '+3M',*/
      inline: true
    });
  });
  $.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: '<Ant',
    nextText: 'Sig>',
    currentText: 'Hoy',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
    dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
    weekHeader: 'Sm',
    dateFormat: 'dd/mm/yy',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
  };
  $.datepicker.setDefaults($.datepicker.regional['es']);
});



  
//////////////FUNCION PARA COMBOS DE CIUDAD Y PAIS DEPENDIENTES

$('select[id="pais_evento"]').on('change', function(){
            var countryId = $(this).val();
            if(countryId) {
                $.ajax({
                    url: 'api/ciudades/porpais/'+countryId,
                    type:"GET",
                    dataType:"json",
                    beforeSend: function(){
                        $('#loader').css("visibility", "visible");
                    },

                    success:function(data) {

                        $('select[id="ciudad_evento"]').empty();
                        var options = "";

                        $.each(data, function(key, value){
                            options = "<option value='"+key+"'>"+value+"</option>";
                            $('select[id="ciudad_evento"]').append(options);
                        });

                        $('select[id="ciudad_evento"]').selectpicker('refresh');

                    },
                    complete: function(){
                        $('#loader').css("visibility", "hidden");
                    }
                });
            } else {
                $('select[id="pais"]').empty();
            }

        });


        $('select[id="pais_evento_edit"]').on('change', function(){
            var countryId = $(this).val();
            if(countryId) {
                $.ajax({
                    url: 'api/ciudades/porpais/'+countryId,
                    type:"GET",
                    dataType:"json",
                    beforeSend: function(){
                        $('#loader').css("visibility", "visible");
                    },

                    success:function(data) {

                        $('select[id="ciudad_evento_edit"]').empty();
                        var options = "";

                        $.each(data, function(key, value){
                            options = "<option value='"+key+"'>"+value+"</option>";
                            $('select[id="ciudad_evento_edit"]').append(options);
                        });

                        $('select[id="ciudad_evento_edit"]').selectpicker('refresh');

                    },
                    complete: function(){
                        $('#loader').css("visibility", "hidden");
                    }
                });
            } else {
                $('select[id="pais_evento_edit"]').empty();
            }

        });




		
 $('#CrearProyecto').on('hide.bs.modal', function(e) {
    $(".selectpicker").val('default').selectpicker("refresh");  
    $('#tempo').hide();
    $('#submio').show();
    //$('#elegirmodal').modal('toggle');
});


$('#btn_asistencia').on('click', function(e) {
  $("#asistencia").val('1');
  $("#form_oculto").css("display", "block");
  $("#solicitud_open").css("display", "none");
});

$('#CrearProyecto').on('show.bs.modal', function(e) {
  $("#form_oculto").css("display", "block");
  $("#solicitud_open").css("display", "none");
});


$('#btn_configurable').on('click', function(e) {  
      $.ajax({
           url: "{{ route('poseePago')}}",
           method: "get",
           success:function(result)
             {
              if(result == 1){
                $("#asistencia").val('0');
                $("#form_oculto").css("display", "block");
                $("#solicitud_open").css("display", "none");
              }else{
                window.location.href = '/planes'
              }
             }
          })
});





$('#bajarpdf').on('click', function(e) {
    var _token = '{{csrf_token()}}';
  $('#frmBajarPDF').submit();
    
});


//CARGA DE LOS RESULTADOS INICIALES DE BUSQUEDA RAPIDA.
$('.eliminaros').on('click', function(){
    var dependent = $(this).data('perfil-id');

    if (! confirm('Desea eliminar el Proyecto?')) { return false; }
$.ajax({
      url: "/eliminar-proyecto/"+ dependent,
        type:"POST",
        beforeSend: function(){

             },
            
            success:function(data) {


              $.toast({
                heading: 'Proyecto Eliminado',
                text: 'El proyecto ha sido QUITADO de Favoritos.',
                showHideTransition: 'slide',
                icon: 'error',
                position: 'bottom-right'
            });

              
              
            },
            complete: function(){
             
              setTimeout(function(){
                  location.href="/mis-proyectos";
                },500); 
            }
    });
});



$("#buscarForm").click(function() {
  $("#buscar_proyecto").submit();
});



$('#resetear').on('click touchstart', function(){

  

    $.toast({
                    heading: 'Filtros Reseteados',
                    text: 'Filtros Reseteados CORRECTAMENTE.',
                    showHideTransition: 'slide',
                    icon: 'success',
                    position: 'bottom-right'
                });
  $("#descripcion_buscar").attr('value', '');   
  $(".selectpicker").val('default').selectpicker("refresh");
   $("#buscarForm")[0].reset();
});

$('select[name=evento_buscar]').val('{{strtoupper(request()->evento_buscar)}}');
$('.selectpicker').selectpicker('refresh'); 

</script>




@endsection
