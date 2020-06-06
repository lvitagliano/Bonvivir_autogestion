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
  
   </style>


<div class="page-header" data-parallax="true" style="background-image: url('../assets/img/city-profile-two.jpg'); height: 240px;">
    <div class="col-7 ml-auto text-left align-items-end c-name"><h3 style="color: white" class="c-mini-name">
    <b>{{$usuario->industria->razon_social ? strtoupper($usuario->industria->razon_social) : "Nombre de la Empresa" }}</b>&nbsp;
          <a href="#" data-toggle="modal" data-target="#NombreEmpresa"><i class="material-icons" style="font-size:14px; cursor: pointer;color:white">border_color</i></a></h3>
             <p style="margin-top: -15px;margin-bottom: 0px; font-size: 13px; color:white" class="c-mini-subname">
             {{$usuario->industria->slogan ? strtoupper($usuario->industria->slogan) : "Slogan de la Empresa.." }}</p></div>
</div>
<div class="main main-raised bkg-ind">
  <div class="profile-content">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto mini-screen">
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
                              <a class="btn-nav" href="{{ route('buscar') }}">
                                <i class="material-icons  mb-2">search</i> Buscar
                              </a>
                            </li>
                      <li class="list-horizontal">
                        <a class="btn-nav" href="{{ route('misproyectos') }}">
                          <i class="material-icons  mb-2">grade</i> Mis Proyectos
                        </a>
                      </li>
                      <li class="list-horizontal">
                              <a class="btn-nav btn btn-animation-blue" style="color: #ffffff;background-color:#1f8089" href="#" data-toggle="modal" data-target="#CrearProyecto">
                                <i class="material-icons">assignment</i> Crear Proyecto
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
   

    

      <div class="row" style="margin-top: -30px">          
        <div class="col-md-4 ml-auto mr-auto">
         <div class="col-12"><h4 style="color: #1f8089"><b>NUEVOS TALENTOS</b></h4></div>
          
         <div class="loader" id="loader"></div>
          <div class="media-area" id="listatalentos" style="visibility:hidden;">            
           
          </div>   
        </div>

        <div class="col-md-4 ml-auto mr-auto">
           <div class="row">
            <div class="col-6 ml-4"><h4 style="color: #1f8089"><b>EMPRESA</b></h4> 
                </div>
                <div class="col-5  mt-3 text-right">
                    <button class="btn btn-primary btn-link" data-toggle="modal" data-target="#AcercaDeMi">
                        <i class="material-icons">border_color</i>
                    </button>
                </div>       
            </div>
          <div class="card card-pricing" style="text-align: left;margin-top:5px">
                  <div class="card-body">
                    <ul>
                       <li>
                        <b>Tipo:</b><br>{{$usuario->Industria->Tipo->nombre}}</li>
                      <li>
                        <b>Ubicación:</b><br>{{$usuario->Industria->Pais->nombre}},
                        {{$usuario->Industria->Ciudad->nombre}}</li>
                      <li>
                        <b>Web Site:</b><br>{{$usuario->Industria->sitio_web ? $usuario->Industria->sitio_web : "http://www.dominio.com "}}</li>
                      <li>
                        <b>E-Mails:</b><br>{{$usuario->Industria->email1 ? $usuario->Industria->email1 : "correo@dominio.com "}}</li>
                      <li>
                        <b>Número de Contacto:</b><br>{{$usuario->Industria->telefono1  ? $usuario->Industria->codigo_area1." ".$usuario->Industria->telefono1 : " +507 0000.0000"}}
                    </li>   
                    <li>
                      <b>Razón Social:</b><br>{{$usuario->Industria->razon_social ? $usuario->Industria->razon_social  : "RAZÓN SOCIAL"}}
                  </li> 
                  <li>
                    <b>{{$usuario->Industria->es_ruc ? "RUC" : ""}}{{$usuario->Industria->es_rif ? "/RIF" : ""}}{{$usuario->Industria->es_cedula ? "/CEDULA" : ""}}{{$usuario->Industria->es_pasaporte ? "/PASAPORTE" : ""}}:</b><br>{{$usuario->Industria->ruc ? $usuario->Industria->ruc : "000000000"}}
                </li>             
                    </ul>
                  </div>
        </div>
          
        </div>

         <div class="col-md-4 ml-auto mr-auto">
                <div class="row">
                        <div class="col-6 ml-4"><h4 style="color: #1f8089"><b>ADMINISTRADOR</b></h4> 
                            </div>
                            <div class="col-5  mt-3 text-right">
                                <button class="btn btn-primary btn-link" data-toggle="modal" data-target="#Representante">
                                    <i class="material-icons">border_color</i>
                                </button>
                            </div>       
                        </div>
              <div class="card card-pricing" style="margin-top:5px">
                  <div class="card-body">
                    <ul>
                      <li>
                        <b>Nombre Completo:</b><br> {{$usuario->nombre ? $usuario->nombre : $usuario->name}}</li>
                      <li>
                        <b>Cargo en la Empresa:</b><br> {{$usuario->Industria->usuario_cargo ? $usuario->Industria->usuario_cargo : "Cargo en la empresa"}}</li>
                        <li>
                        <b>Números de Contacto:</b><br> {{$usuario->telefono ? $usuario->codigo_area." ".$usuario->telefono : " +507 0000.0000"}}
                                                   <br> {{$usuario->telefono2 ? $usuario->codigo_area2." ".$usuario->telefono2: " +507 0000.0000"}}</li>
                      <li>
                        <b>E-Mail:</b><br> {{$usuario->email ? $usuario->email : "correo@dominio.com"}}</li>
                      <li>
                        <b>Perfil de Linkedin:</b><br> {{$usuario->Social->linkedin ? $usuario->Social->linkedin : "Linkedin"}} </li>
                      <li>
                        <b></b><br></li>               
                    </ul>
                  </div>
                </div>
          
        </div>
      </div>


      <div class="row">          
        <div class="col-md-4 ml-auto mr-auto">
        </div>

         <div class="col-md-8 ml-auto mr-auto">
                <div class="row">
                        <div class="col-6 ml-4"><h4 class="descrip-blanco"><b>DESCRIPCIÓN</b></h4> 
                            </div>
                            <div class="col-5 text-right">
                                <button class="btn btn-primary btn-link" data-toggle="modal" data-target="#Descripcion">
                                    <i class="material-icons icon-blanco">border_color</i>
                                </button>
                            </div>       
                        </div>

                
              <div class="card card-pricing" style="margin-top:5px">
                  <div class="card-body">
                    <p>{{$usuario->acercademi ? $usuario->acercademi : "Descripción de la Empresa..."}}</p>
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
                <a class="btn-nav-foot  btn-animation-blue"  href="#" data-toggle="modal" data-target="#CrearProyecto">
                  <i class="material-icons">library_add_check</i>
                </a>
              </li>
      </ul>  
    </div> 
</div> 



<!-- small modal -->
<div class="modal fade" id="AcercaDeMi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-small ">
          <div class="modal-content" style="background-color: #464648;color:#A1A1A1" >
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
            </div>
            <form id="NombreForm" method="post" action="{{route('guardarsobremi')}}">
            <div class="modal-body text-center">
               <!-- <h5 class="mb-0 mt-0">Editar Info Empresa</h5> -->          
                        {{csrf_field()}}
                    <div class="row text-left">
                    <div class="col-lg-12 col-sm-12">
                                    <select class="selectpicker"  data-live-search="true"  id="tipo_rol_id" 
                                    name="tipo_rol_id" required data-lugar="1" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                      title="Tipo Industria" data-size="5">
                                           <option disabled> Tipo Industria</option>
                                           @foreach($rolestipos as $roltipo)
                                                 <option value="{{$roltipo->id}}" @if($roltipo->id == $usuario->Industria->industria_tipo_id) selected @endif>{{$roltipo->nombre}}</option>
                                           @endforeach
                                       </select>
                            </div>
                            <div class="col-lg-12 col-sm-12">
                                    <select class="selectpicker"  data-live-search="true"  id="pais_empresa" name="pais_empresa" required data-lugar="1" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                      title="Elegir País" data-size="5">
                                           <option disabled> Elegir País</option>
                                           @foreach($paises as $pais)
                                                 <option value="{{$pais->codigo_pais}}" @if($pais->codigo_pais == $usuario->Industria->Pais->codigo_pais) selected @endif>{{$pais->nombre}}</option>
                                           @endforeach
                                       </select>
                            </div>
                            <div class="col-lg-12 col-sm-12">
                                    <select class="selectpicker"  data-live-search="true"  id="ciudad_empresa" name="ciudad_empresa" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                      title="Elegir Ciudad" data-size="5">
                                           <option disabled> Elegir Ciudad</option>
                                           @foreach($ciudades as $ciudad)
                                           <option value="{{$ciudad->id}}"  @if($ciudad->id == $usuario->Industria->Ciudad->id) selected @endif>{{$ciudad->nombre}}</option>
                                           @endforeach
                                       </select>
                            </div>
                            <div class="col-lg-12 col-sm-12">
                                        <input type="text" style="color:#A1A1A1;margin: 10px 1px;
                                        margin-top: 10px;
                                        margin-right: 1px;
                                        margin-bottom: 10px;
                                        margin-left: 1px;" id="sitio_web_empresa" value="{{$usuario->Industria->sitio_web}}" name="sitio_web_empresa" placeholder="SITIO WEB" class="form-control" />
                            </div>  
                            <div class="col-lg-12 col-sm-12">
                                        <input type="text"  id="email_empresa" value="{{$usuario->Industria->email1}}" name="email_empresa"  style="color:#A1A1A1;margin: 10px 1px;
                                        margin-top: 10px;
                                        margin-right: 1px;
                                        margin-bottom: 10px;
                                        margin-left: 1px;" placeholder="EMAIL" class="form-control" />
                            </div>  
                            <div class="col-lg-4 col-sm-4">
                                    <select class="selectpicker" id="codigo_area_empresa"  data-live-search="true"  name="codigo_area_empresa" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                      title="Area Code" data-size="5">
                                           <option disabled> Area Code</option>
                                           @foreach($telefonos as $pais)
                                                 <option value="{{$pais->area_code}}"  @if($pais->area_code == $usuario->codigo_area) selected @endif>+{{$pais->area_code}}</option>
                                           @endforeach
                                       </select>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                                            <input type="text" data-inputmask="'mask': '9999 9999 9999 9999'"
                                            style="color:#A1A1A1;margin: 10px 1px;
                                            margin-top: 10px;
                                            margin-right: 1px;
                                            margin-bottom: 10px;
                                            margin-left: 1px;" value="{{$usuario->Industria->telefono1}}" id="telefono_empresa" name="telefono_empresa"   placeholder="Teléfono" class="form-control" />
                            </div>
                            <div class="col-lg-12 col-sm-12">
                                        <input type="text" style="color:#A1A1A1;margin: 10px 1px;
                                        margin-top: 10px;
                                        margin-right: 1px;
                                        margin-bottom: 10px;
                                        margin-left: 1px;" id="razon_social_empresa" value="{{$usuario->Industria->razon_social}}" name="razon_social_empresa" placeholder="RAZÓN SOCIAL" class="form-control" />
                            </div> 

                            <div class="col-5 ml-2 mt-2">
                              <div class="form-check mb-3">
                                <label class="form-check-label">
                                  <input class="form-check-input" style="border: 1px solid #A1A1A1;" {{$usuario->Industria->es_ruc ? " checked " : ""}} type="checkbox" value="ruc"  id="ruc_empresa[]" name="ruc_empresa"> RUC
                                  <span class="form-check-sign">
                                    <span class="check" style="border: 1px solid #A1A1A1;" ></span>
                                  </span>
                                </label>
                              </div>
                              </div>

                              <div class="col-5 ml-2 mt-2">
                              <div class="form-check mb-3">
                                <label class="form-check-label">
                                  <input class="form-check-input"  style="border: 1px solid #A1A1A1;" {{$usuario->Industria->es_rif ? " checked " : ""}}  type="checkbox" value="rif"  id="rif_empresa[]" name="rif_empresa"> RIF
                                  <span class="form-check-sign">
                                    <span class="check" style="border: 1px solid #A1A1A1;" ></span>
                                  </span>
                                </label>
                              </div>
                            </div>  

                            <div class="col-5 ml-2 mt-2">
                            <div class="form-check mb-3">
                                <label class="form-check-label">
                                  <input class="form-check-input" style="border: 1px solid #A1A1A1;"  {{$usuario->Industria->es_dcedula ? " checked " : ""}}   type="checkbox" value="cedula"  id="cedula_empresa[]" name="cedula_empresa"> Cédula
                                  <span class="form-check-sign">
                                    <span class="check" style="border: 1px solid #A1A1A1;" ></span>
                                  </span>
                                </label>
                              </div>
                              </div>
                              <div class="col-5 ml-2 mt-2">
                              <div class="form-check mb-3">
                                <label class="form-check-label">
                                  <input class="form-check-input" style="border: 1px solid #A1A1A1;"  type="checkbox" {{$usuario->Industria->es_pasaporte ? " checked " : ""}}  value="pasaporte"  id="pasaporte_empresa[]" name="pasaporte_empresa"> Pasaporte
                                  <span class="form-check-sign">
                                    <span class="check" style="border: 1px solid #A1A1A1;" ></span>
                                  </span>
                                </label>
                              </div>
                            </div>  
                            <div class="col-lg-12 col-sm-12">
                                        <input type="text" maxlength="16" style="color:#A1A1A1;margin: 10px 1px;
                                        margin-top: 10px;
                                        margin-right: 1px;
                                        margin-bottom: 10px;
                                        margin-left: 1px;" id="ruc_empresa2" value="{{$usuario->Industria->ruc}}" name="ruc_empresa2" placeholder="Número" class="form-control" />
                            </div> 
                    </div>  
                  
            </div>
            <div class="modal-footer text-center" style="justify-content: center;">
              <button type="submit" class="btn btn-success btn-simple">Guardar</button>
            </div>
          </form>  
          </div>
        </div>
      </div>
      <!--    end small modal -->
</div>



<div class="modal fade" id="Representante" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-small ">
          <div class="modal-content" style="background-color: #464648;color:#A1A1A1" >
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
            </div>
          <form id="NombreForm" method="post" action="{{route('guardarrepresentante')}}">
            <div class="modal-body text-center">
                <h5>Editar Info Representante</h5>
               
                        {{csrf_field()}}
                    <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                    <input type="text" style="color:#A1A1A1;margin: 10px 1px;
                                    margin-top: 10px;
                                    margin-right: 1px;
                                    margin-bottom: 10px;
                                    margin-left: 1px;" id="nombre_representante" name="nombre_representante" 
                                    value="{{$usuario->nombre ? $usuario->nombre : $usuario->name }}" placeholder="Nombre y Apellido" 
                                    class="form-control" />
                        </div>  
                        <div class="col-lg-12 col-sm-12">
                                    <input type="text" style="color:#A1A1A1;margin: 10px 1px;
                                    margin-top: 10px;
                                    margin-right: 1px;
                                    margin-bottom: 10px;
                                    margin-left: 1px;"  value="{{$usuario->Industria->cargo_empresa ? $usuario->Industria->cargo_empresa : ''}}"  
                                    id="cargo_empresa" name="cargo_empresa" placeholder="Cargo en la Empresa" class="form-control" />
                        </div>  
                       
                        <div class="col-lg-12 col-sm-12">
                                    <input type="text" style="color:#A1A1A1;margin: 10px 1px;
                                    margin-top: 10px;
                                    margin-right: 1px;
                                    margin-bottom: 10px;
                                    margin-left: 1px;"  value="{{$usuario->email ? $usuario->email : ''}}"  
                                    id="email_representante" name="email_representante" placeholder="Email" class="form-control" />
                        </div>  

                        <div class="col-lg-4 col-sm-4">
                                    <select class="selectpicker" id="codigo_area_representante1"  data-live-search="true"  name="codigo_area_representante1" 
                                    data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                      title="Area Code" data-size="5">
                                           <option disabled> Area Code</option>
                                           @foreach($telefonos as $pais)
                                                 <option value="{{$pais->area_code}}"  @if($pais->area_code == $usuario->codigo_area) selected @endif>+{{$pais->area_code}}</option>
                                           @endforeach
                                       </select>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                                            <input type="number" style="color:#A1A1A1;margin: 10px 1px;
                                            margin-top: 10px;
                                            margin-right: 1px;
                                            margin-bottom: 10px;
                                            margin-left: 1px;" value="{{$usuario->telefono}}" id="telefono_representante1" name="telefono_representante1"   placeholder="2do TELÉFONO" class="form-control" />
                            </div>
                            <div class="col-lg-4 col-sm-4">
                                    <select class="selectpicker" id="codigo_area_representante2"  data-live-search="true"  name="codigo_area_representante2" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                      title="Area Code" data-size="5">
                                           <option disabled> Area Code</option>
                                           @foreach($telefonos as $pais)
                                                 <option value="{{$pais->area_code}}"  @if($pais->area_code == $usuario->codigo_area2) selected @endif>+{{$pais->area_code}}</option>
                                           @endforeach
                                       </select>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                                            <input type="number" style="color:#A1A1A1;margin: 10px 1px;
                                            margin-top: 10px;
                                            margin-right: 1px;
                                            margin-bottom: 10px;
                                            margin-left: 1px;" value="{{$usuario->telefono2}}" id="telefono_representante2" name="telefono_representante2" 
                                              placeholder="MOVIL PRIVADO" class="form-control" />
                            </div>

                            <div class="col-lg-12 col-sm-12">
                                    <input type="text" style="color:#A1A1A1;margin: 10px 1px;
                                    margin-top: 10px;
                                    margin-right: 1px;
                                    margin-bottom: 10px;
                                    margin-left: 1px;"  value="{{$usuario->Social->linkedin ? $usuario->Social->linkedin : ''}}"  
                                    id="linkedin_representante" name="linkedin_representante" placeholder="Linkedin" class="form-control" />
                        </div>  
                    </div>  
              
            </div>
            <div class="modal-footer text-center" style="justify-content: center;">
              <button type="submit" class="btn btn-success btn-simple">Guardar</button>
            </div>
          </form>  
          </div>
        </div>
      </div>
      <!--    end small modal -->
</div>

<div class="modal fade" id="Descripcion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-small ">
          <div class="modal-content" style="background-color: #464648;color:#A1A1A1" >
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
            </div>
            <form id="NombreForm" method="post" action="{{route('guardardescripcion')}}">
            <div class="modal-body text-center">
                <h5>Editar Info Basica</h5>
               
                        {{csrf_field()}}
                    <div class="row">
                            <div class="col-lg-12 col-sm-12">

                                    <textarea class="form-control" style="color:#A1A1A1"  id="Acercademi" name="Acercademi" 
                                    placeholder="{{$usuario->acercademi ? $usuario->acercademi : 'INFORMACIÓN DE LA EMPRESA...'}}" 
                                    rows="6">{{$usuario->acercademi}}</textarea>
                        </div>  
                    </div>  
                  
            </div>
            <div class="modal-footer text-center" style="justify-content: center;">
              <button type="submit" class="btn btn-success btn-simple">Guardar</button>
            </div>
          </form> 
          </div>
        </div>
      </div>
      <!--    end small modal -->
</div>


<div class="modal fade" id="NombreEmpresa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-small ">
          <div class="modal-content" style="background-color: #464648;color:#A1A1A1" >
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
            </div>
            <form id="NombreForm" method="post" action="{{route('guardarempresa')}}">
            <div class="modal-body text-center">
                <h5>Editar Info Basica</h5>
               
                        {{csrf_field()}}
                    <div class="row">
                    <div class="col-lg-12 col-sm-12">
                                    <input type="text" style="color:#A1A1A1;margin: 10px 1px;
                                    margin-top: 10px;
                                    margin-right: 1px;
                                    margin-bottom: 10px;
                                    margin-left: 1px;"  value="{{$usuario->Industria->nombre_empresa ? $usuario->Industria->nombre_empresa : ''}}"  
                                    id="nombre_empresa" name="nombre_empresa" placeholder="Nombre Empresa" class="form-control" />
                        </div>  

                        <div class="col-lg-12 col-sm-12">
                                    <input type="text" style="color:#A1A1A1;margin: 10px 1px;
                                    margin-top: 10px;
                                    margin-right: 1px;
                                    margin-bottom: 10px;
                                    margin-left: 1px;"  value="{{$usuario->Industria->slogan_empresa ? $usuario->Industria->slogan_empresa : ''}}"  
                                    id="slogan_empresa" name="slogan_empresa" placeholder="Slogan Empresa" class="form-control" />
                        </div>  
                    </div>  
                  
            </div>
            <div class="modal-footer text-center" style="justify-content: center;">
              <button type="submit" class="btn btn-success btn-simple">Guardar</button>
            </div>
          </form> 
          </div>
        </div>
      </div>
      <!--    end small modal -->
</div>

<!-- Register Modal -->
<div class="modal fade" id="elegirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-signup">
            <div class="modal-content">
                <div class="card card-signup card-plain" style="padding:0px">
                      <div class="modal-body" style="padding:0px" id="mbody">
                        
                      </div>
                </div>
            </div>
        </div>
    </div>
    <!--  End Modal -->



    <!-- Register Modal -->
 <div class="modal fade" id="agregomodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
      <div class="modal-content"  style="background-color: #464648;color:#A1A1A1" >
        <div class="modal-header">
          <h4 class="modal-title">Seleccionar Proyecto</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div><div class="container"></div>
        <div class="modal-body">
        <h6>Proyecto</h6>
        <select class="selectpicker" id="proyecto"  data-live-search="true"  name="proyecto" data-style="select-with-transition form-control"
         data-style="color:#A1A1A1;width:100%" 
                                      title="Seleccione Proyecto" data-size="5">
                                           <option disabled> Seleccione Proyecto</option>
                                           @foreach($proyectos as $proyecto)
                                                <option  style="color:#A1A1A1;" value="{{$proyecto->id}}">{{$proyecto->nombre}}</option>
                                            @endforeach
                                       </select>
           <input type="hidden" value="" id="perfil" name="perfil" />
           <h6>Papel</h6>
        <select class="selectpicker" id="papel"  data-live-search="true"  name="papel" data-style="select-with-transition form-control"
         data-style="color:#A1A1A1;width:100%" 
                                      title="Seleccione Papel" data-size="5">
                                           <option disabled> Seleccione Papel</option>
                                           <option  style="color:#A1A1A1;" value="Primario">Primario</option>
                                           <option  style="color:#A1A1A1;" value="Secundario">Secundario</option>
                                           <option  style="color:#A1A1A1;" value="Terciario">Terciario</option>
                                           <option  style="color:#A1A1A1;" value="Doble">Doble</option>
                                       </select>
          <h6>Presupuesto</h6>
          <input type="number" class="form-control" style="color:#A1A1A1;margin: 10px 1px;
                                    margin-top: 10px;
                                    margin-right: 1px;
                                    margin-bottom: 10px;
                                    margin-left: 1px;"   value="" id="presupuesto" name="presupuesto" />
        </div>
        <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn">Cerrar</a>
          <a href="#"  id="gustar"  class="btn btn-primary">Confirmar</a>
        </div>
      </div>
    </div>
</div>
 


    
<div class="modal fade" id="CodigoPromocional" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-small" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
          <form id="AceptarForm" method="post">
      <h5>¿Eres <b>Referido</b> de alguien?</h5>
        <h6>Ingresa tu código PROMOCIONAL aquí para recibir tu Casting Gratis.</h6>
        <input type="hidden" value="{{$usuario->id}}" id="codigo_hidden"/>
        {{csrf_field()}}
        <div class="row">
        <div class="col-lg-12 col-sm-12">
                        <input type="text" style="color:#A1A1A1;margin: 10px 1px;
                        margin-top: 10px;
                        margin-right: 1px;
                        margin-bottom: 10px;
                        margin-left: 1px;"  
                        id="codigo_promocional" name="codigo_promocional" />
            </div>  
        </div>
          </form>
      </div>
      <div class="modal-footer">
        <a href="#" data-dismiss="modal" id="cancelar_codigo" class="btn">Cerrar</a>
        <a href="#"  id="confirmar_codigo"  class="btn btn-primary">Confirmar</a>
      </div>
    </div>
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
<form id="NombreForm" method="post" action="{{route('agregarproyecto')}}"  autocomplete="off">
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
                        <select class="selectpicker"  data-live-search="true" required 
                        id="tipo_evento" name="tipo_evento" 
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
                               <option value="VIDEOS MUSICALES">VIDEOS MUSICALES</option>
                           </select>
                </div>


                <div class="col-lg-12 col-sm-12">
                            <input type="text"  required  id="descripcion_breve" name="descripcion_breve"  
                            style="color:#A1A1A1;margin: 10px 1px;
                            margin-top: 10px;
                            margin-right: 1px;
                            margin-bottom: 10px;
                            margin-left: 1px;" placeholder="EXPLICA TU EVENTO" class="form-control"  autocomplete="off"/>
                </div>  
              
                <div class="col-lg-6 col-sm-6">
                        <select class="selectpicker" required   data-live-search="true"  id="pais_evento" name="pais_evento" required data-lugar="1" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                          title="Elegir País" data-size="5">
                               <option disabled> Elegir Pais</option>
                               @foreach($paises as $pais)
                                     <option value="{{$pais->codigo_pais}}" @if($pais->codigo_pais == $usuario->Industria->Pais->codigo_pais) selected @endif>{{$pais->nombre}}</option>
                               @endforeach
                           </select>
                </div>
                <div class="col-lg-6 col-sm-6">
                        <select class="selectpicker"  required  data-live-search="true"  id="ciudad_evento" name="ciudad_evento" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                          title="Elegir Ciudad" data-size="5">
                               <option disabled> Elegir Ciudad</option>
                               @foreach($ciudades as $ciudad)
                               <option value="{{$ciudad->id}}"  @if($ciudad->id == $usuario->Industria->Ciudad->id) selected @endif>{{$ciudad->nombre}}</option>
                               @endforeach
                           </select>
                </div>

                <div class="col-lg-6 col-sm-6">
                    <input type="text" id="fecha_desde" required  readonly  name="fecha_desde" 
                    placeholder="FECHA DESDE" class="form-control datepicker" style="
                            color:#A1A1A1;
                            margin: 10px 1px;
                            margin-top: 10px;
                            margin-right: 1px;
                            margin-bottom: 10px;
                            margin-left: 1px;
                            "  autocomplete="off"/>
                </div> 


                <div class="col-lg-6 col-sm-6">
                    <input type="text" id="fecha_hasta" readonly  
                    name="fecha_hasta" placeholder="FECHA HASTA" class="form-control datepicker" style="
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
                <select class="selectpicker"  data-live-search="true" multiple  id="derechos_para" name="derechos_para[]" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
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
                    <input type="text" readonly id="pago_fecha" name="pago_fecha" placeholder="FECHA DE PAGO" class="form-control datepicker" style="
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
                                margin-left: 1px;" id="cantidad_talentos" name="cantidad_talentos" 
                                placeholder="CANTIDAD DE TALENTOS" class="form-control" autocomplete="off"/>
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
  <button type="submit" class="btn btn-success btn-simple">Guardar</button>
</div>
</form>
</div>

    </div>
  </div>
</div>
<!--    end small modal -->
</div>



</div>




    
@include('modals._modalImgperfil')



@endsection


@section('scripts')


<script type="text/javascript">

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

var resize;
$("#phone").inputmask({"mask": "(999) 999-9999"});
///////FUNCION DE SUBIDA DE IMAGEN DE PERFIL CON CROP DE LA MISMA
$('#imageperfil').on('change', function () {
  var reader = new FileReader();
    reader.onload = function (e) {

       $('#ima1').css('display','none');
        $('#r-90').css('display','block');
        $('#r90').css('display','block');


      if(!$('#upload-demo').data('croppie')) {

       resize = $('#upload-demo').croppie({
           showZoomer: true,
           enableExif: true,
           enableOrientation: true,
           enableZoom:true,
            viewport: {
                width: 300,
                height: 350,
                type: 'square'
            },
            boundary: {
                width: 300,
                height: 350
            },
            size:   {
              width:  540,
              height: undefined
            },
             //url: '{{ asset('img/perfil.png') }}'
        });

     }

      resize.croppie('bind',{
        url: e.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });

    }
    reader.readAsDataURL(this.files[0]);
});



$('.vanilla-rotate').on('click', function(ev) {
    resize.croppie('rotate', parseInt($(this).data('deg')));
});

var progressbar     = $('.progress-bar');

$('#upload-image').on('click', function (ev) {
  var _token = '{{csrf_token()}}';
 // ShowLoading();


  resize.croppie('result', {
    type: 'canvas',
    quality: '1',
    size: 'original'
  }).then(function (img) {
    $("#FotoperfilForm").ajaxForm({
      url: "{{route('subirfotoperfil')}}",
      type: "POST",
      data: {"image":img,"_token":_token},
      success: function (data) {
         $("#btnimgperfilCanc").attr("disabled", false);
          $("#upload-image").attr("disabled", false);
          $("#ima1").attr("disabled", false);
          $("#imageperfil").attr("disabled", false);
         location.reload();
        //html = '<img src="' + img + '" />';
        //$("#preview-crop-image").html(html);
      },
      beforeSend: function() {
          $(".progress").css("display","block");
          progressbar.width('0%');
          progressbar.text('0%');
          $("#btnimgperfilCanc").attr("disabled", true);
          $("#upload-image").attr("disabled", true);
          $("#ima1").attr("disabled", true);
          $("#imageperfil").attr("disabled", true);
                    },
        uploadProgress: function (event, position, total, percentComplete) {
            progressbar.width(percentComplete + '%');
            progressbar.text(percentComplete + '%');
         },
    }).submit();

  });

});
///////FIN FUNCION DE SUBIDA DE IMAGEN DE PERFIL CON CROP DE LA MISMA



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



  
//////////////FUNCION PARA COMBOS DE CIUDAD Y PAIS DEPENDIENTES

$('select[id="pais_empresa"]').on('change', function(){
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

                $('select[id="ciudad_empresa"]').empty();
                var options = "";

                $.each(data, function(key, value){
                    options = "<option value='"+key+"'>"+value+"</option>";
                    $('select[id="ciudad_empresa"]').append(options);
                });

                $('select[id="ciudad_empresa"]').selectpicker('refresh');

            },
            complete: function(){
                $('#loader').css("visibility", "hidden");
            }
        });
    } else {
        $('select[id="pais"]').empty();
    }

});




//CARGA DE LOS RESULTADOS INICIALES DE BUSQUEDA RAPIDA.
$(document).ready(function() {

  $.ajax({
        url: "{{route('hometalentosinicial')}}",
          type:"GET",
          beforeSend: function(){
                       $('#listatalentos').css("visibility", "hidden");
                            $('#loader').css("display", "block");
                            $('#loader').css("visibility", "visible");
                            $('#loader').html('<div class="loading" style="opacity: .9; margin-left: 25px"><img src="https://industria.ivotalents.com/img/loader.gif" style=" margin-left: 55px" alt="loading" /><br/>Un momento, por favor...</div>');
                        },
              
              success:function(data) {
                  $('#listatalentos').fadeIn(1000).html(data);

              },
              complete: function(){
                $('#listatalentos').waitForImages(function() {
                                   $('#loader').css("display", "none");
                                    $('#listatalentos').css("visibility", "visible");
                             });
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


$('#agregomodal').on('show.bs.modal', function(e) {
    var dependent = $(e.relatedTarget).data('perfil-id');
    $("#perfil").val(dependent);
    var _token = '{{csrf_token()}}';
});




function deshabilitar3Seg() {
  return new Promise(resolve => {
    setTimeout(() => {
      resolve('resolved');
      $('#boton').attr("disabled", false);
    }, 3000);
  });
}

async function asyncCall() {
  var result = await deshabilitar3Seg();
}
//CLICK AN AGREGAR UN TALENTO DE LA BUSQUEDA
$('#gustar').on('click', function(){
    $('#boton').attr("disabled", true);
    asyncCall();
    //var dependent = $(this).data('perfil-id');
     var dependent = $('#perfil').val();
     var proyecto = $('#proyecto').val();
     var presupuesto = $('#presupuesto').val();
     var papel = $('#papel').val();

     if(proyecto){

        $.ajax({
      url: "/agregar-talento-gusto/"+ dependent,
        type:"POST",
        data: {proyecto: proyecto, presupuesto: presupuesto, papel: papel},
        beforeSend: function(){

             },
            
            success:function(data) {
              $('#agregomodal').modal('toggle');
              $.toast({
                      heading: 'Talento Agregado',
                      text: 'El talento ha sido agregado CORRECTAMENTE.',
                      showHideTransition: 'slide',
                      icon: 'success',
                      position: 'bottom-right'
                  });

              $('#talentogusto').fadeIn(1000).html(data);

            },
            complete: function(){
              $('#talentogusto').waitForImages(function() {
                      $('#talentogusto').css("visibility", "visible");
                 });

              
              
            }
    });


     }
     else{
         
        $.toast({
                heading: 'Seleccionar Proyecto',
                text: 'Se debe Seleccionar un PROYECTO.',
                showHideTransition: 'slide',
                icon: 'error',
                position: 'bottom-right'
            });
     }
});


//SI NO TIENE NADA EN CODIGO PROMOCIONAL MUESTRO POPUP

@if((strlen($usuario->codigo_referido) <= 0))
  $('#CodigoPromocional').modal({
            backdrop: 'static'
            });
  $('#CodigoPromocional').addClass("show");
@endif
//SI DA CANCELAR SIN INGRESAR UN CODIGO PROMOCIONAL Y NO HABIA NADA PREVIAMENTE SE INSERTA: CANCELADO
//SI HABIA ALGO SE CONSERVA ESE ALGO


$('#cancelar_codigo').click(function(e, parameters) {
  var _token = '{{csrf_token()}}';
  var usuario = $('#codigo_hidden').val();

  $('#CodigoPromocional').hide();
  
  $.ajax({
           url: "/cancelar-codigo/"+usuario,
           method: "GET",
           success:function(result)
             {

              
              
             }
          })

});



$('#confirmar_codigo').click(function(e, parameters) {
  var _token = '{{csrf_token()}}';
  var usuario = $('#codigo_hidden').val();
  var codigo_promocional = $('#codigo_promocional').val();
  $('#CodigoPromocional').hide();
  $.ajax({
           url: "/aceptar-codigo/"+usuario,
           method: "POST",
           data: {usuario:usuario,codigo_promocional:codigo_promocional},
           success:function(result)
             {
             
              alert("El codigo PROMOCIONAL ha sido ingresado correctamente.");
              window.location.href = "/home";

             }
          })

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

</script>




@endsection