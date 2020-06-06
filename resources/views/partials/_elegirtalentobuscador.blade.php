@if($plano)
  @if($plano == 0)
  <script>window.location.href = "/planes";</script>
  @endif
  @if($plano == 2)
  <script>window.location.href = "/planes";</script>
  @endif
  @if($plano == 3)
  <script>window.location.href = "/planes";</script>
  @endif
@endif
<div class="row">
<div class="col-lg-6 col-md-6 col-md-12">
        
        <?php 
		$edades= 0;
        $year = date("Y");

        $dia=date("d");
        $mes=date("m");
        $ano=date("Y");
	

        $dianaz=$candidato->dia;
        $mesnaz=$candidato->mes;
        $anonaz=$candidato->anio;
        if (($mesnaz == $mes) && ($dianaz > $dia)) {
        $ano=($ano-1); }
        if ($mesnaz > $mes) {
        $ano=($ano-1);}
		
        $edades=($ano-$anonaz);
        
      ?>


<div class="card card-raised card-carousel">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000" 
              style="width: 100%;margin:5px;">
              @if($candidato->Manager->id != 0 )
              <a href="#acept" class="btn btn-lg btn-just-icon btn-round btn-elegir btn-animation-blue" style="position: fixed; z-index:999;">
                  <i class="material-icons" title="Manager: {{$candidato->Manager->nombre}}">contact_phone</i>
                <div class="ripple-container"></div></a>
              @endif
               @if($candidato->Representante->id != 0 )
              <a href="#acept" class="btn btn-lg btn-just-icon btn-round btn-elegir btn-animation-blue" style="position: fixed; z-index:999;">
              <i class="material-icons" title="Representante: {{$candidato->Representante->nombre}}">contact_phone</i>
                <div class="ripple-container"></div></a>
              @endif
              
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <?php $i = 1; ?>
                  @if($candidato->Fotos)
                      @foreach($candidato->Fotos as $foto)
                          <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class=""></li>
                          <?php $i++; ?>
                      @endforeach
                  @endif
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-99" style="width: 98%; border-radius: 6px;" src=" {{'https://ivotalent.s3-accelerate.amazonaws.com/files/thumbs/profile/'.$candidato->id.'/540px_foto_'.$candidato->id.'.png'}}" alt="First slide">
                    <div style="padding:5px; margin:5px; border-radius:10px; background-color:white; opacity: 0.7; position: absolute;
                  bottom: 0 ;width: 97%">
                  <div class="row">
                      <div class="col-5"><h4 style="margin-top:0px;margin-bottom:0px">Talento <b>{{$candidato->id}}</b></h4></div>
                      <div class="col-1"><h4 style="margin-top:0px;margin-bottom:0px">|</h4></div>
                      <div class="col-4" style="padding-left: 3px;"><h5 style="margin-top:0px;margin-bottom:0px"><small>Reputación</small> <b>4.5</b> 
                        </h5> </div>
                            <div class="col-1"><h4 style="margin-top:0px;margin-bottom:0px;cursor:pointer"><i class="material-icons" style="float:left"   data-toggle="collapse" href="#collapseExample0" role="button" aria-expanded="false" aria-controls="collapseExample0">
                                keyboard_arrow_down
                                </i></h4></div>
                    </div>
                    <div class="row">
                    <div class="col-md-12"> <h6 style="margin-top:0px;margin-bottom:0px">{{$candidato->Talentos->Talento1->nombre}} - {{$candidato->Talentos->Genero1->nombre}} | {{$candidato->Talentos->Talento2->nombre}}- {{$candidato->Talentos->Genero2->nombre}} </h6></div>
                      </div>
                      <div class="row" >
                      <div class="col-3 text-center p-0"><h6>Edad:<br><b><strong>{{$edades}} Años <br>({{$candidato->dia}}/{{$candidato->mes}}/{{$candidato->anio}})</strong></b></h6></div>
                          <div class="col-2 text-center p-0"><h6>Sexo:<br><b>{{$candidato->Sexual->nombre}}</b></h6></div> 
                          <div class="col-3 text-center p-0"><h6>Ubicación:<br><b>{{$candidato->Pais->nombre}}/{{$candidato->Ciudad->nombre}}</b></h6></div> 
                          <div class="col-4 text-center p-0"><h6>Nacionalidad:<br><b>{{$candidato->Nacionalidad->gentilicio_nac}}</b></h6></div> 
                        </div>
                        <div class="collapse" id="collapseExample0">
                            <div class="card card-body" style="margin:unset">
                            <div class="row" >
                                <div class="col-4 text-center p-0"><h6>Experiencia:<br><b><strong>{{$candidato->experiencia}}</strong></b></h6></div>
                                <div class="col-4 text-center p-0"><h6>Hobbies:<br><b>{{$candidato->Hobbies->Hobbie1->nombre}}</b></h6></div> 
                                <div class="col-4 text-center p-0"><h6>Deportes:<br><b>{{$candidato->Talentos->Talento3->nombre}}</b></h6></div> 
                                <div class="col-4 text-center p-0"><h6>Disponibilidad:<br><b>{{$candidato->disponibilidad}}</b></h6></div> 
                                <div class="col-4 text-center p-0"><h6>Idioma Nativo:<br><b>{{$candidato->Idiomas->Idioma1->nombre}}</b></h6></div>
                                <div class="col-4 text-center p-0"><h6>Otro Idioma:<br><b>{{$candidato->Idiomas->Idioma2->nombre}}/{{$candidato->Idiomas->Idioma3->nombre}}</b></h6></div>  
                            </div>
                            </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12 text-center"> 
                              <br><br>
                            </div>
                      </div>
                </div>
                  </div>
                  @if($candidato->Fotos)
                  @foreach($candidato->Fotos as $foto)
                    <div class="carousel-item">
                      <img class="d-block w-99 imagen" style="width: 98%;  border-radius: 6px;"  
                      src="{{'https://ivotalent.s3-accelerate.amazonaws.com/files/thumbs/images/'.$foto->usuario_id.'/540px_foto_'.$foto->nombre_fisico}}" 
                      alt="{{$foto->nombre}}">
                      <div style="padding:5px; margin:5px; border-radius:10px; background-color:white; opacity: 0.7; position: absolute;
                  bottom: 0 ;width: 97%">
                  <div class="row">
                      <div class="col-5"><h4 style="margin-top:0px;margin-bottom:0px">Talento <b>{{$candidato->id}}</b></h4></div>
                      <div class="col-1"><h4 style="margin-top:0px;margin-bottom:0px">|</h4></div>
                      <div class="col-4" style="padding-left: 3px;"><h5 style="margin-top:0px;margin-bottom:0px"><small>Reputación</small> <b>4.5</b> 
                        </h5> </div>
                            <div class="col-1"><h4 style="margin-top:0px;margin-bottom:0px;cursor:pointer"><i class="material-icons" style="float:left"   data-toggle="collapse" href="#collapseExample{{$foto->id}}" role="button" aria-expanded="false" aria-controls="collapseExample{{$foto->id}}">
                                keyboard_arrow_down
                                </i></h4></div>
                    </div>
                    <div class="row">
                    <div class="col-md-12"> <h6 style="margin-top:0px;margin-bottom:0px">{{$candidato->Talentos->Talento1->nombre}} - {{$candidato->Talentos->Genero1->nombre}} | {{$candidato->Talentos->Talento2->nombre}}- {{$candidato->Talentos->Genero2->nombre}} </h6></div>
                      </div>
                      <div class="row" >
                      <div class="col-3 text-center p-0"><h6>Edad:<br><b>{{$edades}} Años</b></h6></div>
                          <div class="col-2 text-center p-0"><h6>Sexo:<br><b>{{$candidato->Sexual->nombre}}</b></h6></div> 
                          <div class="col-3 text-center p-0"><h6>Ubicación:<br><b>{{$candidato->Ciudad->nombre}}</b></h6></div> 
                          <div class="col-4 text-center p-0"><h6>Nacionalidad:<br><b>{{$candidato->Nacionalidad->gentilicio_nac}}</b></h6></div> 
                        </div>
                        <div class="collapse" id="collapseExample{{$foto->id}}">
                            <div class="card card-body" style="margin:unset">
                            <div class="row" >
                                <div class="col-4 text-center p-0"><h6>Edad:<br><b><strong>{{$edades}} Años</strong></b></h6></div>
                                <div class="col-4 text-center p-0"><h6>Sexo:<br><b>{{$candidato->Sexual->nombre}}</b></h6></div> 
                                <div class="col-4 text-center p-0"><h6>Ubicación:<br><b>{{$candidato->Ciudad->nombre}}</b></h6></div> 
                                <div class="col-6 text-center p-0"><h6>Ubicación:<br><b>{{$candidato->Ciudad->nombre}}</b></h6></div> 
                                <div class="col-6 text-center p-0"><h6>Nacionalidad:<br><b>{{$candidato->Nacionalidad->gentilicio_nac}}</b></h6></div> 
                            </div>
                            </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12 text-center"> 
          
                           <br><br>
                            </div>
                      </div>
                </div>
                    </div>  
                    @endforeach
                  @endif
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" style="height: 50px;margin-top: 175px;margin-bottom: 0px;" role="button" data-slide="prev">
                  <i class="material-icons">keyboard_arrow_left</i>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators"  style="height: 50px;margin-top: 175px;margin-bottom: 0px;" role="button" data-slide="next">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span class="sr-only">Next</span>
                </a>
                
              </div>
              <div class="row">
                              <div class="col-md-12 text-center"> 
   
                            <a data-toggle="modal" href="#agregomodal" data-perfil-id="{{$candidato->id}}"  style="cursor:pointer" class="btn btn-primary btn-block ">Elige</a>
                            </div>
                      </div>
            </div>
    </div>

    <div class="col-lg-6 col-md-12 gustorioDiv">
            <div class="">
                        <div class="description p-1">
                        <h4 class="info-title" style="margin-top:5px">Talento {{$candidato->id}}</b></h4>
                             <hr />
                        <div class="row" style="margin-top:-15px;text-align: center;">
                          <div class="col-12">
                          <p style="font-size: medium;">Si ya acabaste con tu selección</p>
                        </div>
                          <div class="col-6">
                         
                        @if(count($usuario->Castings->Seleccionados)>0 or count($usuario->Castings->Aceptados)>0 or count($usuario->Castings->Rechazados)>0)
                        <a href="{{ route('misproyectos') }}" class="btn btn-animation-blue btn-elegir float-left" style="padding-top: 7px;"> 
                        Ir a proyectos </a>
                        @else
                        <a href="{{ route('misproyectos') }}" class="btn btn-elegir float-left" style="padding-top: 7px;"> 
                          Ir a proyectos </a>
                        @endif
                      </div>

                        <div class="col-6">
                        <a class="btn btn-primary btn-link btn-animation-blue" style="color: #ffffff;background-color:#1f8089" href="#" data-toggle="modal" data-target="#CrearProyecto">
                          <i class="material-icons">assignment</i> Crear Proyecto
                        <div class="ripple-container"></div></a>
                      </div>


                        <div class="col-md-12 col-sm-12 col-xs-12 p-1" style="color:#A1A1A1;
                                                                                    border-right: 0px">
                                        <select class="selectpicker "  data-live-search="true" data-style="select-with-transition form-control" 
                                        data-style="color:#A1A1A1;width:100%" 
                                          title="PROYECTOS"  name="proyectos" id="proyectos" data-size="5">
                                        <option disabled> Proyecto</option>
                                        @foreach($proyectos as $proyecto)
                                          <option value="{{$proyecto->id}}">{{$proyecto->nombre}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    
                        </div>

                        <div class="row" style="overflow-x: auto;width:100%; height: 340px;" id="talentogusto">
                                ELEGIR PROYECTO DE LA LISTA Y PODRAS VER LOS TALENTOS AGREGADOS AL MISMO
                        </div>

                    </div>
                </div>
    </div>
</div>


<script>
$('.imagen').waitForImages(function() {
    // All descendant images have loaded, now slide up.
    $(this).slideUp();
});


//CARGA DE LOS RESULTADOS INICIALES DE BUSQUEDA RAPIDA.
$('#agregar_proyecto').on('submit', function(e){
  e.preventDefault();
  
  var form = $(this);
  $('#submio').attr("disabled", true);
$.ajax({

        url: 'api/proyectos/agregarporbuscador/{{Auth::user()->id}}',
        dataType:"json",
        type:"POST",
        data: form.serialize(),  
            success:function(data) {
                 
                     

                       $('select[id="proyectos"]').empty();
                        var options = "";
                        $.each(data, function(key, value){
                            options = "<option value='"+key+"'>"+value+"</option>";
                            $('select[id="proyectos"]').append(options);
                        });
                        $('select[id="proyectos"]').selectpicker('refresh');


                        $('select[id="proyecto"]').empty();
                        var options = "";
                        $.each(data, function(key, value){
                            options = "<option value='"+key+"'>"+value+"</option>";
                            $('select[id="proyecto"]').append(options);
                        });
                        $('select[id="proyecto"]').selectpicker('refresh');

                      


                        
                        $.toast({
                          heading: 'Proyecto agregado',
                          text: 'El proyecto ha sido AGREGADO correctamente.',
                          showHideTransition: 'slide',
                          icon: 'success',
                          position: 'bottom-right'
                      });

            },
            complete: function(){
              $('#submio').attr("disabled", true);
               $('#CrearProyecto').modal('toggle');
            }
    });
});



//CARGA DE LOS RESULTADOS INICIALES DE BUSQUEDA RAPIDA.
$('.eliminar').on('click', function(){
  var proyectos = $('#proyectos').val();
    var dependent = $(this).data('perfil-id');
$.ajax({
      url: "/eliminar-talento-gusto/"+ dependent,
        type:"POST",
        data: {proyecto: proyectos},
        beforeSend: function(){

             },
            
            success:function(data) {

              $.toast({
                heading: 'Talento Eliminado',
                text: 'El talento ha sido QUITADO de Favoritos.',
                showHideTransition: 'slide',
                icon: 'error',
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
});


$('#proyectos').on('change', function(){    
     var proyectos = $('#proyectos').val();

     $.ajax({
      url: "/listar-talento-gusto/"+ proyectos,
        type:"POST",
        data: {proyecto: proyectos},
        beforeSend: function(){

             },
            success:function(data) {

              $('#talentogusto').fadeIn(1000).html(data);

            },
            complete: function(){
              $('#talentogusto').waitForImages(function() {
                      $('#talentogusto').css("visibility", "visible");
                 });

              
              
            }
    });

     
});

if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
  $('.selectpicker').selectpicker('mobile');
}
else{
$('.selectpicker').selectpicker();
}







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





</script>