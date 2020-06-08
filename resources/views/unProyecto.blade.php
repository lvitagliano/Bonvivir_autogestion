@extends('layouts.principal')

@section('content')

<style>

.contact-profile {
  width: 100%;
  height: 60px;
  line-height: 60px;
  background: #f5f5f5;
}
 .contact-profile img {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  float: left;
  margin: 9px 12px 0 9px;
}
.contact-profile p {
  float: left;
}
.contact-profile .social-media {
  float: right;
}
.contact-profile .social-media i {
  margin-left: 14px;
  cursor: pointer;
}
.contact-profile .social-media i:nth-last-child(1) {
  margin-right: 20px;
}
.contact-profile .social-media i:hover {
  color: #435f7a;
}

.messages {
  height: auto;
  min-height: 300px;
  max-height: 300px;
  overflow-y: scroll;
  overflow-x: hidden;
  width: 100%;
}
@media screen and (max-width: 735px) {
  .messages {
    min-height: 300px;
    max-height: 300px;
  }
}
.messages::-webkit-scrollbar {
  width: 8px;
  background: transparent;
}
.messages::-webkit-scrollbar-thumb {
  background-color: rgba(0, 0, 0, 0.3);
}
.messages ul li {
  display: inline-block;
  clear: both;
  float: left;
  margin: 15px 15px 5px 15px;
  width: calc(100% - 25px);
  font-size: 0.9em;
}
.messages ul li:nth-last-child(1) {
  margin-bottom: 20px;
}
.messages ul li.sent img {
  margin: 6px 8px 0 0;
}
.messages ul li.sent p {
  background: #435f7a;
  color: #f5f5f5;
  width: 100%;
}
.messages ul li.replies img {
  float: right;
  margin: 6px 0 0 8px;
}
.messages ul li.replies p {
  background: #f5f5f5;
  float: right;
}
.messages ul li img {
  width: 55px;
  height: 55px;
  border-radius: 50%;
  float: left;
}
.messages ul li p {
  display: inline-block;
  padding: 10px 15px;
  border-radius: 20px;
  max-width: 205px;
  line-height: 130%;
}
@media screen and (min-width: 735px) {
  .messages ul li p {
    max-width: 450px;
  }
}

@media screen and (min-width: 735px) {
   .messages ul li p {
    max-width: 450px;
  }
}
 .message-input {
  bottom: 0;
  width: 100%;
  z-index: 99;
}
 .message-input .wrap {
  position: relative;
}
 .message-input .wrap input {
  font-family: "proxima-nova",  "Source Sans Pro", sans-serif;
  float: left;
  border: none;
  width: calc(100% - 90px);
  padding: 11px 32px 10px 8px;
  font-size: 0.8em;
  color: #32465a;
}
@media screen and (max-width: 735px) {
   .message-input .wrap input {
    padding: 15px 32px 16px 8px;
  }
}
 .message-input .wrap input:focus {
  outline: none;
}
 .message-input .wrap .attachment {
  position: absolute;
  right: 60px;
  z-index: 4;
  margin-top: 10px;
  font-size: 1.1em;
  color: #435f7a;
  opacity: .5;
  cursor: pointer;
}
@media screen and (max-width: 735px) {
   .message-input .wrap .attachment {
    margin-top: 17px;
    right: 65px;
  }
}
 .message-input .wrap .attachment:hover {
  opacity: 1;
}
 .message-input .wrap button {
  float: right;
  border: none;
  width: 50px;
  padding: 12px 0;
  cursor: pointer;
  background: #32465a;
  color: #f5f5f5;
}
@media screen and (max-width: 735px) {
   .message-input .wrap button {
    padding: 16px 0;
  }
}
 .message-input .wrap button:hover {
  background: #435f7a;
}
 .message-input .wrap button:focus {
  outline: none;
}
  </style>
    <style>
small {
  font-size: 10px;
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
            <h5 class="in-line-black">{{$proyectos->nombre}}</h5>
</div>
      </div>
      <br>



      <div class="row" style="margin-top: -80px">

          @if($errors->any())
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h4>{{$errors->first()}}</h4>
            </div>
           @endif


           <form id="frmBajarPDF" method="post" action="{{ route('generatepdf',['id'=>$proyectos->id]) }}">
            {{csrf_field()}}
          </form>
        <div class="col-lg-4 col-md-4 col-sm-12"><h4 style="color: #1f8089"><b>TALENTOS INVITADOS AL PROYECTO:</b> {{$proyectos->nombre}}
        </h4>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 text-right"><h4 style="color: #1f8089">
          <b>
          <button class="btn btn-primary btn-link"  style="padding: 5px 10px 5px 0px;"
          id="bajarpdf" alt="Descargar PDF">
          <i style="font-size: 30px;margin-top:-15px" class="material-icons">picture_as_pdf</i>
        </button>

        <button class="btn btn-primary btn-link"   style="padding: 5px 10px 5px 0px;" data-toggle="modal"
        alt="Enviar Casting por Mail" data-perfil-id="{{$proyectos->id}}"
        data-target="#enviarpormail">
            <i style="font-size: 30px;margin-top:-15px" class="material-icons">email</i>
        </button>

        <button class="btn btn-primary btn-link"   style="padding: 5px 10px 5px 0px;" alt="Descargar Imagenes de Seleccionados"
        data-toggle="modal" data-perfil-id="{{$proyectos->id}}"
            data-target="#descargarFotos">
              <i style="font-size: 30px;margin-top:-15px" class="material-icons">cloud_download</i>
          </button>

          <button class="btn btn-link  @if($proyectos->seleccion_finalizada == 0)
              btn-link  btn-disabled @else  btn-primary @endif" style="padding: 5px 10px 5px 0px;"
          alt="Enviar Mensaje por WhatsApp" data-toggle="modal" data-perfil-id="{{$proyectos->id}}"
          data-target="#enviarmensajes">
             <i style="font-size: 30px;margin-top:-15px" class="material-icons">sms</i>
         </button></b></h4>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-12 text-right">
              <a class="btn-nav mr-2"
                  @if($proyectos->seleccion_finalizada == 0)
                  href="{{ route('finalizarseleccion',['castid' => $proyectos->id]) }}"
                  onclick="return confirm('Desea Finalizar la Seleccion de Talentos?')"
                  @else
                  href="#"
                  @endif

                  @if($proyectos->seleccion_finalizada == 1)
                  style="color:white;background:gray">
                  @else
                  style="color:white;background:#25B7AE">
                  @endif
                  <i class="material-icons mb-2">done_outline</i>   FINALIZAR SELECCION
                </a>

        <a href="{{ route('misproyectos') }}" class="btn btn-just-icon btn-round"> <i class="material-icons mb-2">reply</i></a>
        </div>

        <div class="card card-nav-tabs" style="width: 98%;margin-left: 1%;">
          <div class="card-header card-header-primary" style="background: linear-gradient(60deg, #056770, #056770);">
            <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">
                  <li class="nav-item" style="width:auto">
                    <a class="nav-link active show" href="#profile" data-toggle="tab">
                      <i class="material-icons">sentiment_very_satisfied</i> TALENTOS QUE ACEPTARON ({{$proyectos->Aceptados->Count()}})
                    <div class="ripple-container"></div></a>
                  </li>
                  <li class="nav-item" style="width:auto">
                    <a class="nav-link" href="#messages" data-toggle="tab">
                      <i class="material-icons">sentiment_very_dissatisfied</i> TALENTOS QUE RECHAZARON ({{$proyectos->Rechazados->Count()}})
                    <div class="ripple-container"></div></a>
                  </li>
                  <li class="nav-item" style="width:auto">
                    <a class="nav-link" href="#todos" data-toggle="tab">
                      <i class="material-icons">face</i> TALENTOS FALTANTES ({{$proyectos->Seleccionados->Count() - $proyectos->Aceptados->Count() - $proyectos->Rechazados->Count()}})
                    <div class="ripple-container"></div></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card-body " style="background: #EEEEEE;">
            <div class="tab-content text-center">
              <div class="tab-pane active show" id="profile">
                  <div class="loader" id="loader" style="background: #EEEEEE;"></div>
                <div class="row" id="resultadosAceptado" style="visibility:hidden;">

                </div>

              </div>
              <div class="tab-pane" id="messages">
                  <div class="loader" id="loader" style="background: #EEEEEE;"></div>
                <div class="row" id="resultadosRechazados" style="visibility:hidden;">

                </div>

              </div>
              <div class="tab-pane" id="todos">
                  <div class="loader" id="loader" style="background: #EEEEEE;"></div>
                <div class="row" id="resultados" style="visibility:hidden;">

                </div>

              </div>

            </div>
          </div>
        </div>


      </div>

    </div>
  </div>
</div>


<?php

$uid = md5(uniqid(rand(), true));



?>


<div class="flotante">
    <div class="flotante-line">
        <h5 class="flotante-in-line">Mis talentos</h5>
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



<!-- small modal -->
<div class="modal fade" id="enviarpormail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
          <div class="modal-content" style="background-color: #464648;color:#A1A1A1" >
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
            </div>

            <div class="modal-body text-center">
            <h5 class="mb-0 mt-0">Enviar Proyecto por email</h5>

                                <p>Una vez seleccionados todos los talentos puede enviar el proyecto por email.<p>

                                <div class="row">
                                            <div class="col-md-12">

                                                <input type="email" name="email" id="email" class="form-control input-form-pagos"
                                                style="color: beige; background-color:#464648 ">

                                  </div>
                       </div>
                  <input type="hidden" name="proyecto" id="proyecto"/>
                 <input type="button" class="btn btn-success btn-simple" id="enviar_mail" value="Enviar">


            </div>
            <div class="modal-footer text-center" style="justify-content: center; height: 75px"  id="mobodyMail">

            </div>
          </div>

        </div>

      </div>
      <!--    end small modal -->
</div>




<!-- small modal -->
<div class="modal fade" id="chatearmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="margin-top: 6px;">
    <div class="modal-content" style="background: #E6EAEA">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
      </div>

      <div class="modal-body">


        <div class=""  id="mensajes">


        </div>


        <div class="message-input mt-2">
          <div class="wrap">
          <input type="text" id="mensajillo" style=";width: calc(100% - 110px)" placeholder="Escribe tu Mensaje...">

          <button id="videar" onclick="window.open('https://meet.jit.si/{{$uid}}', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=100,width=1054,height=808');" style="float:left;margin: 2px;" class="submit"><i class="fa fa-video-camera"  aria-hidden="true"></i></button>
          <input type="hidden" id="mensajilloVideo" name="mensajilloVideo" value="{{$uid}}">
          <button id="scridere" style="float:left;margin: 2px;"   class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
          </div>
        </div>

        {{-- <div id="mensajes" class="mt-2"></div> --}}

        <input type="hidden" name="receptor_id" id="receptor_id"/>
        <input type="hidden" name="casting_id" id="casting_id"/>
      </div>

    </div>

  </div>

</div>
<!--    end small modal -->
</div>



<!-- small modal -->
<div class="modal fade" id="descargarFotos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
          <div class="modal-content" style="background-color: #464648;color:#A1A1A1" >
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
            </div>
            <div class="modal-body text-center">
            <h5 class="mb-0 mt-0">Descargar Fotos de Talentos Seleccionados.</h5>

				  <div class="modal-body" style="padding:0px;visibility:hidden; height: 45px" id="mobody">

                      </div>

				<input type="hidden" name="proyecto_foto" id="proyecto_foto"/>

                 <input type="button" class="btn btn-success btn-simple" id="bajar_foto" value="Descargar Fotos">


            </div>
            <div class="modal-footer text-center" style="justify-content: center; height: 35px">

            </div>
          </div>

        </div>

      </div>
      <!--    end small modal -->
</div>




<!-- small modal -->
<div class="modal fade" id="enviarmensajes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
          <div class="modal-content" style="background-color: #464648;color:#A1A1A1" >
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
            </div>

            <div class="modal-body text-center">
							<h5 class="mb-0 mt-0">Enviar Mensaje a Talentos Seleccionados.</h5>

                                <p>Una vez seleccionados todos los talentos puede enviar un mensaje a todos por WhatsApp.<p>

                                <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" name="titulo" id="titulo" class="form-control input-form-pagos"
                                                style="color: beige; background-color:#464648 " placeholder="Titulo..">


                                                <textarea name="msj" id="msj" class="form-control input-form-pagos"
                                                style="color: beige; background-color:#464648 " placeholder="Mensaje..."></textarea>

                                  </div>
                       </div>
                  <input type="hidden" name="proyecto_msj" id="proyecto_msj"/>
                 <input type="button" class="btn btn-success btn-simple" id="enviar_msj" value="Enviar">


            </div>
            <div class="modal-footer text-center" style="justify-content: center; height: 75px" id="mobodyMsj">

			</div>
          </div>

        </div>

      </div>
      <!--    end small modal -->




      <div class="modal fade" id="modal-videolink">
        <div class="modal-dialog">
            <div class="modal-content">
              <form id="AcercademiForm" method="post">
                {{csrf_field()}}
                <div class="modal-header">
                    <h4 class="modal-title" style="text-align: center"><img src="{{ asset('img/ivo.jpg') }}" style="width:65%; height:35%;"/></h4>
                </div>
                <div class="modal-body">
                    <h4 class="modal-title">Enviar Link de Video</h4>
                    <br>

                     <textarea class="form-control" placeholder="Ingresa aqui el link de tu Video..." required name="videolink" id="videolink"  cols="50" rows="1" id="video_link"></textarea>

                        <br /><br />
                          <input type="hidden" name="id_enviable" id="id_enviable"/>
                          <input type="hidden" name="casting_id" id="casting_id"/>
                </div>

                  </form>
                <div class="modal-footer">
                     <input type="submit"  class="btn btn-success"  style="background-color: #31B404; border-color: #31B404" id="btnVideoLink"  name="btnVideoLink"  value="ENVIAR" />

                </div>

            </div>
        </div>
    </div>

</div>
@endsection


@section('scripts')

 <script>


 $(document).on('click', '.me_caigo_acept', function(e, parameters) {
      var _token = '{{csrf_token()}}';

      $.ajax({
              url: "/seleccionar/"+this.id,
              method: "GET",
              success:function(result)
                {
                  $('#plan_elegido').html(result);
                }
              })

    });


var timeout;


$(document).on('click', '#scridere', function() {
  var dependent = $('#receptor_id').val();
  var mensajillo = $('#mensajillo').val();
  var casting_id = $('#casting_id').val();
    $.ajax({
            url: "/enviar-mensaje-chat/"+dependent,
            method: "post",
            data:{mensajillo:mensajillo,casting_id:casting_id},

            success:function(result)
              {
                $('#mensajes').html(result);
                $('#mensajillo').val('');
                  var $t = $('#msjes');
                  $t.animate({"scrollTop": $('#msjes')[0].scrollHeight}, 0);
              }
            })


  });


$(document).on('click', '#videar', function() {
  var dependent = $('#receptor_id').val();
  var mensajillo = $('#mensajilloVideo').val();
  var casting_id = $('#casting_id').val();


  mensajillo = 'Te invito a un Video Chat conmigo: <a href="https://meet.ivotalents.com/' + mensajillo +'" target="_blank" style="color:orange">  <b>Iniciar Video Chat</b></a>';
    $.ajax({
            url: "/enviar-mensaje-chat/"+dependent,
            method: "post",
            data:{mensajillo:mensajillo,casting_id:casting_id},

            success:function(result)
              {
                $('#mensajes').html(result);
                $('#mensajillo').val('');
                  var $t = $('#msjes');
                  $t.animate({"scrollTop": $('#msjes')[0].scrollHeight}, 0);
              }
            })


  });






  $('#chatearmodal').on('show.bs.modal', function(e) {
    var receptor = $(e.relatedTarget).data('perfil-id');
    var casting_id = $(e.relatedTarget).data('casting-id');
    $(e.currentTarget).find('#receptor_id').val(receptor);
    $(e.currentTarget).find('#casting_id').val(casting_id);

    var id = $(e.relatedTarget).data('perfil-id');

    $('#btn_'+id).removeClass("badge1");

    $("#videoenviar").attr("data-perfil-id",receptor);
    $("#videoenviar").attr("data-casting-id",casting_id);


    $.ajax({
              url: "/obtener-chat/"+receptor+"/"+casting_id,
              method: "get",
              success:function(result)
                {
                  $('#mensajes').html(result);

                },
                complete:function()
                  {
                    var $t = $('#msjes');
                    $t.animate({"scrollTop": $('#msjes')[0].scrollHeight}, 0);
                  }
              })

        timeout = setInterval(function(){
        $.ajax({
                url: "/obtener-chat/"+receptor+"/"+casting_id,
                method: "get",
                success:function(result)
                  {

                    $('#mensajes').html(result);

                  },
                  complete:function()
                  {
                    var $t = $('#msjes');
                    $t.animate({"scrollTop": $('#msjes')[0].scrollHeight}, 0);
                  }
                });

        }, 10000);


  });


  $('#chatearmodal').on('hide.bs.modal', function(e) {
    $('#mensajillo').val('');
    clearInterval(timeout);
});


$('#enviarpormail').on('show.bs.modal', function(e) {
    var dependent = $(e.relatedTarget).data('perfil-id');
    var _token = '{{csrf_token()}}';
	$('#btnSubmit').attr("disabled", false);
    $(e.currentTarget).find('#proyecto').val(dependent);
});


$('#enviarmensajes').on('show.bs.modal', function(e) {
    var dependent = $(e.relatedTarget).data('perfil-id');
    var _token = '{{csrf_token()}}';
	$('#enviar_msj').attr("disabled", false);
    $(e.currentTarget).find('#proyecto_msj').val(dependent);
});


$('#descargarFotos').on('show.bs.modal', function(e) {
    var dependent = $(e.relatedTarget).data('perfil-id');
    var _token = '{{csrf_token()}}';
	$('#bajar_foto').attr("disabled", false);
  $(e.currentTarget).find('#proyecto_foto').val(dependent);
  $('#mobody').html('');
});



$('#enviar_mail').on('click', function(e) {
  var dependent = $('#proyecto').val();
  var email = $('#email').val();
  $('#btnSubmit').attr("disabled", true);
  $.ajax({
           url: "/enviar-proyecto-mail/"+dependent,
           method: "post",
           data:{email,email},
		    beforeSend: function(){
                        $('#mobodyMail').css("display", "block");
                        $('#mobodyMail').css("visibility", "visible");
                        $('#mobodyMail').html('<div class="loading" style="opacity: .9;"><img src="https://industria.ivotalents.com/img/loader.gif" alt="loading"  style="height: 35px;  width: 35px;" /><br/>Un momento, por favor...</div><br/>');
                        },
           success:function(result)
             {
				 $('#mobodyMail').css("display", "none");
               $('#mobodyMail').css("visibility", "hidden");
              $('#enviarpormail').modal('toggle');
             }
          })

});


$('#enviar_msj').on('click', function(e) {
  var dependent = $('#proyecto_msj').val();
  var msj = $('#msj').val();
  var titulo = $('#titulo').val();
  $('#enviar_msj').attr("disabled", true);
  $.ajax({
           url: "/enviar-proyecto-msj/"+dependent,
           method: "post",
           data:{msj:msj,titulo:titulo},
		    beforeSend: function(){
                        $('#mobodyMsj').css("display", "block");
                        $('#mobodyMsj').css("visibility", "visible");
                        $('#mobodyMsj').html('<div class="loading" style="opacity: .9;"><img src="https://industria.ivotalents.com/img/loader.gif" alt="loading"  style="height: 35px;  width: 35px;" /><br/>Un momento, por favor...</div><br/>');
                        },

           success:function(result)
             {
				  $('#mobodyMsj').css("display", "none");
               $('#mobodyMsj').css("visibility", "hidden");
              $('#enviarmensajes').modal('toggle');
             }
          })

});


$('#bajar_foto').on('click', function(e) {
  var dependent = $('#proyecto_foto').val();

  $('#bajar_foto').attr("disabled", true);
  $.ajax({
           url: "/descargar-fotos/"+dependent,
           method: "get",
		    beforeSend: function(){
                        $('#mobody').css("display", "block");
                        $('#mobody').css("visibility", "visible");
                        $('#mobody').html('<div class="loading" style="opacity: .9;"><img src="https://industria.ivotalents.com/img/loader.gif" alt="loading"  style="height: 35px;  width: 35px;" /><br/>Un momento, por favor...</div><br/>');
                        },

           success:function(result)
             {
				  $('#mobody').html(result);

              //$('#descargarFotos').modal('toggle');
             }
          })

});


$('#bajarpdf').on('click', function(e) {
    var _token = '{{csrf_token()}}';
   if(confirm('Desea descargar el Proyecto en PDF? Esto puede tardar un tiempo dependiendo de su conexion.')){
    $('#frmBajarPDF').submit();
   }


});


$('#cancelar').on('click', function(e) {
    var dependent = $(e.relatedTarget).data('perfil-id');
    var _token = '{{csrf_token()}}';
    $('#pagos').modal('hide');
    $('#planes').modal('show');

});



//CARGA DE LOS RESULTADOS INICIALES DE BUSQUEDA RAPIDA.
$(document).ready(function() {

$.ajax({
  url: "{{route('listarTalentoSeleccionado', ['id' => $proyectos->id])}}",
        type:"GET",
        beforeSend: function(){
          $('#resultados').css("visibility", "hidden");
                      $('#loader').css("display", "block");
                      $('#loader').css("visibility", "visible");
          $('#loader').html('<div class="loading" style="opacity: .9;"><img src="https://industria.ivotalents.com/img/loader.gif" alt="loading" /><br/>Un momento, por favor...</div><br/>');
            },

            success:function(data) {

              $('#resultados').fadeIn(1000).html(data);

            },
            complete: function(){
              $('#resultados').waitForImages(function() {
                      $('#loader').css("display", "none");
                      $('#resultados').css("visibility", "visible");
                 });



            }
    });

    $.ajax({
  url: "{{route('listarTalentoSeleccionadoAceptado', ['id' => $proyectos->id])}}",
        type:"GET",
        beforeSend: function(){
          $('#resultadosAceptado').css("visibility", "hidden");
                      $('#loader').css("display", "block");
                      $('#loader').css("visibility", "visible");
          $('#loader').html('<div class="loading" style="opacity: .9;"><img src="https://industria.ivotalents.com/img/loader.gif" alt="loading" /><br/>Un momento, por favor...</div><br/>');
            },

            success:function(data) {

              $('#resultadosAceptado').fadeIn(1000).html(data);

            },
            complete: function(){
              $('#resultadosAceptado').waitForImages(function() {
                      $('#loader').css("display", "none");
                      $('#resultadosAceptado').css("visibility", "visible");
                 });



            }
    });

    $.ajax({
  url: "{{route('listarTalentoSeleccionadoRechazado', ['id' => $proyectos->id])}}",
        type:"GET",
        beforeSend: function(){
          $('#resultadosRechazados').css("visibility", "hidden");
                      $('#loader').css("display", "block");
                      $('#loader').css("visibility", "visible");
          $('#loader').html('<div class="loading" style="opacity: .9;"><img src="https://industria.ivotalents.com/img/loader.gif" alt="loading" /><br/>Un momento, por favor...</div><br/>');
            },

            success:function(data) {

              $('#resultadosRechazados').fadeIn(1000).html(data);

            },
            complete: function(){
              $('#resultadosRechazados').waitForImages(function() {
                      $('#loader').css("display", "none");
                      $('#resultadosRechazados').css("visibility", "visible");
                 });



            }
    });
});




$('#modal-videolink').on('show.bs.modal', function(e) {
  $('#chatearmodal').toggle();
    var dependent = $(e.relatedTarget).data('perfil-id');
    var casting_id =  $(e.relatedTarget).data('casting-id');
    var _token = '{{csrf_token()}}';
    $(e.currentTarget).find('#id_enviable').val(dependent);
    $(e.currentTarget).find('#casting_id').val(casting_id);
});


$('#modal-videolink').on('hide.bs.modal', function(e) {
  $('#videolink').val('');
  $('#chatearmodal').toggle();
});


$('#btnVideoLink').click(function(e, parameters) {
    var _token = '{{csrf_token()}}';
     var mensajillo = $('#videolink').val();
     var id = $('#id_enviable').val();
     var casting_id = $('#casting_id').val();

     $.ajax({
            headers: {
              'X-CSRF-Token': _token
          },
           url: "/enviar-chat-video/"+id,
           method: "post",
           data:{mensajillo:mensajillo,casting_id:casting_id},

           success:function(result)
             {
               $('#videolink').val('');
                location.reload();
             }
          })

  });





</script>


@endsection
