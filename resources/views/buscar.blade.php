@extends('layouts.principal')

@section('content')
<style>
a[aria-expanded=true] .fa-chevron-right {
   display: none;
}
a[aria-expanded=false] .fa-chevron-down {
   display: none;
}
</style>
<div class="twoModels">

</div>


<div class="main main-raised">
   
  <form id="BuscarForm" method="post" action="{{ route('buscartalentos') }}">
    {{csrf_field()}}
     <div class="footer footer-black">
        <div class="container" style="min-height: 75px;">
                <div class="row">
                <div id="block-search" class="col-12 text-center"><br/>
                <a class="btn-nav-search mb-10 collapsed" id="btnAmpliar" data-toggle="collapse" href="#filtros" 
                           role="button" aria-expanded="false" aria-controls="collapseExample">
                           <p><b>Filtra por búsqueda avanzada</b></p>
                            <img src="https://www.racingclub.com.ar/campeon2019/img/down.gif" class="mb-3 ml-5" width="75px" />
                    </a><br/>
                    </div>
                  </div>
                <div class="row collapse" style="margin-top: 15px" data-target="#filtros"  id="filtros">
                    @include('partials._filtrosbuscador')
                  </div>

        </div>
      </div>

  </form>
  
  
      <div class="container">
   
        <div class="section text-center p-2">
            <div class="loader" id="loader"></div>

            <div class="row" id="resultados" style="visibility:hidden;" style="width: 98%;margin-left: 1%;">

          


        
            </div>
    </div>    
  </div>
</div>
<div class="flotante">
        <div class="flotante-line">
            <h5 class="flotante-in-line">Buscador</h5>
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


<!-- Register Modal -->
<div class="modal fade" id="elegirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-signup" style="margin-top:10px;">
            <div class="modal-content">
                <div class="card card-signup card-plain" style="padding:0px">
				  <div class="loader" id="loader2"></div>

                      <div class="modal-body" style="padding:0px;visibility:hidden;" id="mbody">
							
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
        </div>
        <div class="container"></div>
        
        <div class="modal-body">
        <h6>Proyecto</h6>
        <select class="selectpicker" id="proyecto" require data-live-search="true"  name="proyecto" data-style="select-with-transition form-control"
         data-style="color:#A1A1A1;width:100%" 
                                      title="Seleccione Proyecto" data-size="5">
                                           <option disabled> Seleccione Proyecto</option>
                                           @foreach($proyectos as $proyecto)
                                                <option  style="color:#A1A1A1;" value="{{$proyecto->id}}">{{$proyecto->nombre}}</option>
                                            @endforeach
                                       </select>
           <input type="hidden" value="" id="perfil" name="perfil" />
           <h6>Papel</h6>
  
           <select class="selectpicker"  data-live-search="true"  id="papel" name="papel" data-style="select-with-transition form-control; color:#A1A1A1;width:100%" 
           title="Seleccione Papel" data-size="5">
                                           <option disabled> Seleccione Papel</option>
                                           <option  style="color:#A1A1A1;" value="Principal">Principal</option>
                                           <option  style="color:#A1A1A1;" value="Secundario">Secundario</option>
                                           <option  style="color:#A1A1A1;" value="Figurante">Figurante</option>
                                           <option  style="color:#A1A1A1;" value="Extra">Extra</option>
                                           <option  style="color:#A1A1A1;" value="Doble">Doble</option>
                                           <option  style="color:#A1A1A1;" value="Otro">Otro</option>
                                       </select>
                                       
          <h6>Presupuesto</h6>
          <input type="number" require class="form-control" style="color:#A1A1A1;margin: 10px 1px;
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
    <!--  End Modal -->




    

<!-- small modal -->
<div class="modal fade" id="CrearProyecto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" style="margin-top: 40px;">
          <div class="modal-content" style="background-color: #464648;color:#A1A1A1;max-height: calc(100vh - 3.5rem); overflow-y:auto" >
            <div class="modal-header">
                <h4 class="modal-title">DATOS DEL PROYECTO</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
            </div>

 	             <form id="agregar_proyecto" method="post" action="{{route('agregarproyecto')}}"  autocomplete="off">
                <div class="modal-body text-center">
                  <!-- <h5 class="mb-0 mt-0">Editar Info Empresa</h5> -->          
                            {{csrf_field()}}
                        <div class="row text-left">
                          <input type="hidden" name="asistencia" id="asistencia" value="0">

                                <div class="col-lg-6 col-sm-6">
                                            <input type="text"  required style="color:#A1A1A1;margin: 10px 1px;
                                            margin-top: 20px;
                                            margin-right: 1px;
                                            margin-bottom: 10px;
                                            margin-left: 1px;" id="titulo" name="titulo" placeholder="TÍTULO" class="form-control"  autocomplete="off"/>
                                </div>  

                                <div class="col-lg-6 col-sm-6">
                                        <select class="selectpicker"  data-live-search="true"  id="tipo_evento" 
                                        required name="tipo_evento" 
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
                                            <input type="text"   required id="descripcion_breve" name="descripcion_breve"  style="color:#A1A1A1;margin: 10px 1px;
                                            margin-top: 10px;
                                            margin-right: 1px;
                                            margin-bottom: 10px;
                                            margin-left: 1px;" placeholder="EXPLICA TU EVENTO" class="form-control"  autocomplete="off"/>
                                </div>  
                              
                                <div class="col-lg-6 col-sm-6">
                                        <select class="selectpicker"  required  data-live-search="true"  id="pais_evento" name="pais_evento" required data-lugar="1" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
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
                                    <input type="text" id="pago_fecha" readonly  name="pago_fecha" placeholder="FECHA DE PAGO" class="form-control datepicker" style="
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
                                  margin-left: 1px;" id="marca" name="marca"  placeholder="(*) MARCA" class="form-control" autocomplete="off"/>
                                 </div>
                
                                <div class="col-lg-6 col-sm-6">
                                                <input type="number"  required  style="color:#A1A1A1;margin: 10px 1px;
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
      <!--    end small modal -->
</div>



@endsection



@section('scripts')

<script>


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
              $('#talentogusto').fadeIn(500).html(data);

            },
            complete: function(){
              $('#talentogusto').waitForImages(function() {
                      $('#talentogusto').css("visibility", "visible");
                 });

               $.toast({
                      heading: 'Talento Agregado',
                      text: 'El talento ha sido agregado CORRECTAMENTE.',
                      showHideTransition: 'slide',
                      icon: 'success',
                      position: 'bottom-right'
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


$(document).on('click','#btn-more',function(){
    var id = $(this).data('id');
    
    var sexo = $('#sexo').val();
    var pais = $('#pais').val();
    var ciudad = $('#ciudad').val();
    var idioma = $('#idioma').val();
    var edad_desde = $('#edad_desde').val();
    var edad_hasta = $('#edad_hasta').val();
    var talento = $('#talento').val();
    var genero = $('#genero').val();
    var categoria = $('#categoria').val();
    var especialidad = $('#especialidad').val();
    var oficios = $('#oficios').val();
    var hobbies = $('#hobbies').val();
    var piel = $('#piel').val();
    var ojos = $('#ojos').val();
    var cabello = $('#cabello').val();
    var complexion = $('#complexion').val();
    var look = $('#look').val();
    var tatuaje = $('#tatuaje').val();
    var camisa = $('#camisa').val();
    var pantalon = $('#pantalon').val();
    var zapato = $('#zapato').val();
    var nacionalidad = $('#nacionalidad').val();
    var ides = $('#ides').val();
    var offset = $('#offset').val();

      if(offset == 0){
        offset = 19;
      }
    console.log('Boton More Offset: '+offset);

    $("#btn-more").html("Cargando....");
    $.ajax({
    url: '/buscar-talentos',
 
    type:"POST",
        data : {id:id, _token:"{{csrf_token()}}",sexo:sexo,pais:pais,ciudad:ciudad,idioma:idioma,edad_desde:edad_desde,edad_hasta:edad_hasta,talento:talento,genero:genero,categoria:categoria,especialidad:especialidad,oficios:oficios,hobbies:hobbies,piel:piel,ojos:ojos,cabello:cabello,complexion:complexion,look:look,tatuaje:tatuaje,camisa:camisa,pantalon:pantalon,zapato:zapato,nacionalidad:nacionalidad,offset:offset,ides:ides},
        dataType : "text",
        success : function (data)
        {
          if(data != '')
          {
              $('#remove-row').remove();
              $('#resultados').append(data);
              $('#offset').val(parseInt(offset) + 19);
          }
          else
          {
              $('#btn-more').html("");
          }
        }
    });
});


//////////////FUNCION PARA COMBOS DE CIUDAD Y PAIS DEPENDIENTES
$('select[id="pais"]').on('change', function(){
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

                $('select[id="ciudad"]').empty();
                var options = "";

                $.each(data, function(key, value){
                    options = "<option value='"+key+"'>"+value+"</option>";
                    $('select[id="ciudad"]').append(options);
                });

                $('select[id="ciudad"]').selectpicker('refresh');

            },
            complete: function(){
                $('#loader').css("visibility", "hidden");
            }
        });
    } else {
        $('select[id="pais"]').empty();
    }

});

//////////////FUNCION PARA COMBOS DE TALENTO Y DEPENDIENTE
$('select[id="talento"]').on('change', function(){
    var talentoId = $(this).val();
    if(talentoId) {
        $.ajax({
            url: 'api/generos/portalento/'+talentoId,
            type:"GET",
            dataType:"json",
            beforeSend: function(){
                $('#loader').css("visibility", "visible");
            },

            success:function(data) {
                
                $('select[id="genero"]').empty();
                var options = "";

                $.each(data, function(key, value){
                    options = "<option value='"+key+"'>"+value+"</option>";
                    $('select[id="genero"]').append(options);
                });

                $('select[id="genero"]').selectpicker('refresh');

            },
            complete: function(){
                $('#loader').css("visibility", "hidden");
            }
        });
    } else {
        $('select[naidme="talento"]').empty();
    }

});

//////////////FUNCION PARA COMBOS DE GENERO Y DEPENDIENTE
$('select[nidame="genero"]').on('change', function(){
    var generoId = $(this).val();
    if(generoId) {
        $.ajax({
            url: 'api/categorias/porgenero/'+generoId,
            type:"GET",
            dataType:"json",
            beforeSend: function(){
                $('#loader').css("visibility", "visible");
            },

            success:function(data) {

                $('select[id="categoria"]').empty();
                var options = "";

                $.each(data, function(key, value){
                    options = "<option value='"+key+"'>"+value+"</option>";
                    $('select[id="categoria"]').append(options);
                });

                $('select[id="categoria"]').selectpicker('refresh');

            },
            complete: function(){
                $('#loader').css("visibility", "hidden");
            }
        });
    } else {
        $('select[id="genero"]').empty();
    }

});

//////////////FUNCION PARA COMBOS DE CATEGORIA Y DEPENDIENTE
$('select[id="categoria"]').on('change', function(){
    var categoriaId = $(this).val();
    if(categoriaId) {
        $.ajax({
            url: 'api/especialidades/porcategoria/'+categoriaId,
            type:"GET",
            dataType:"json",
            beforeSend: function(){
                $('#loader').css("visibility", "visible");
            },

            success:function(data) {

                $('select[id="especialidad"]').empty();
                var options = "";

                $.each(data, function(key, value){
                    options = "<option value='"+key+"'>"+value+"</option>";
                    $('select[id="especialidad"]').append(options);
                });

                $('select[id="especialidad"]').selectpicker('refresh');

            },
            complete: function(){
                $('#loader').css("visibility", "hidden");
            }
        });
    } else {
        $('select[id="categoria"]').empty();
    }

});

var frm = $('#BuscarForm');

frm.submit(function (e) {
  e.preventDefault();

  $('#offset').val(0);
  var offset = $('#offset').val();

  console.log('Boton Buscar Offset: '+offset);

  $.ajax({
      type: frm.attr('method'),
      url: frm.attr('action'),
      data: frm.serialize(),
      beforeSend: function(){
          $('#resultados').css("visibility", "hidden");
          $('#loader').css("display", "block");
          $('#loader').css("visibility", "visible");
          $('#loader').html('<div class="loading" style="opacity: .9;"><img src="https://industria.ivotalents.com/img/loader.gif" alt="loading" /><br/>Un momento, por favor...</div>');
          },
                      
          success:function(data) {
              $('#resultados').fadeIn(1000).html(data);
             
          },
          complete: function(){                
            $('#resultados').waitForImages(function() {
                      $('#loader').css("display", "none");
                      $('#resultados').css("visibility", "visible");
                      $('#offset').val(19);
                });
          }
  });
});

$('#resetear').on('click touchstart', function(){
    $.toast({
                    heading: 'Filtros Reseteados',
                    text: 'Filtros Reseteados CORRECTAMENTE.',
                    showHideTransition: 'slide',
                    icon: 'success',
                    position: 'bottom-right'
                });

  $(".selectpicker").val('default').selectpicker("refresh");
});

$('#btn_asistencia').on('click', function(e) {
  $("#asistencia").val('1');
  $("#form_oculto").css("display", "block");
  $("#solicitud_open").css("display", "none");
});

$('#CrearProyecto').on('show.bs.modal', function(e) {
  $("#form_oculto").css("display", "block");
  $("#solicitud_open").css("display", "none");
  $('#elegirmodal').modal('toggle');
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

//CARGA DE LOS RESULTADOS INICIALES DE BUSQUEDA RAPIDA.
$(document).ready(function() {

$('#tb1').on('click touchstart', function (e) {
    activaTab('info');
});

$('#tb2').on('click touchstart', function (e) {
    activaTab('talentos');
});

$('#tb3').on('click touchstart', function (e) {
    activaTab('fenotipo');
});

$('#tb4').on('click touchstart', function (e) {
    activaTab('tallas');
});

$('#tb5').on('click touchstart', function (e) {
    activaTab('medidas');
});

$('#tb6').on('click touchstart', function (e) {
    activaTab('media');
});

function activaTab(tab){
  $('.nav-tabs a[href="#' + tab + '"]').tab('show');
};



$.ajax({
        url: "{{route('talentosinicial')}}",
          type:"GET",
          beforeSend: function(){
                        $('#resultados').css("visibility", "hidden");
                        $('#loader').css("display", "block");
                        $('#loader').css("visibility", "visible");
					            	$('#loader').html('<div class="loading" style="opacity: .9;"><img src="https://industria.ivotalents.com/img/loader.gif" alt="loading" /><br/>Un momento, por favor...</div>');
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
 });



 $('#elegirmodal').on('show.bs.modal', function(e) {
    var dependent = $(e.relatedTarget).data('perfil-id');
    var _token = '{{csrf_token()}}';
	console.log('es este');
    $.ajax({
           url: "{{ route('elegirtalento')}}",
           method: "POST",
           data:{ _token:_token, dependent:dependent },
		   beforeSend: function(){
            $('#mbody').css("visibility", "hidden");
				$('#loader2').css("display", "block");
				$('#loader2').css("visibility", "visible");
				$('#loader2').html('<div class="loading" style="opacity: .9;  position: fixed;  z-index: 999;  height: 2em;  width: 2em;  overflow: visible;  margin: auto;  top: 0;  left: 0;  bottom: 20%;  right: 15%;"><img src="https://industria.ivotalents.com/img/loader.gif" alt="loading" /><br/></div>');
		    },
              
           success:function(result)
             {
               $('#mbody').html(result);
             },
			 complete: function(){
                $('#resultados').waitForImages(function() {
                        $('#loader2').css("display", "none");
                        $('#mbody').css("visibility", "visible");
                   });
			 }
          })
});

$('#agregomodal').on('show.bs.modal', function(e) {
    var dependent = $(e.relatedTarget).data('perfil-id');
    $("#perfil").val(dependent);
    var _token = '{{csrf_token()}}';
    
});

$('#CrearProyecto').on('hide.bs.modal', function(e) {
    $(".selectpicker").val('default').selectpicker("refresh");  
    $('#tempo').hide();
    $('#submio').show();
    $('#elegirmodal').modal('toggle');
});

$('.gustars').on('click touchstart', function(){
    var dependent = $(this).data('perfil-id');
    var proyecto = $('#proyecto').val();
    $.ajax({
          url: "/agregar-talento-gusto/"+ dependent,
            type:"POST",
            data: {proyecto: proyecto},
            beforeSend: function(){

                  },
                
                success:function(data) {
                  
                  $.toast({
                      heading: 'Talento Agregado',
                      text: 'El talento ha sido agregado CORRECTAMENTE.',
                      showHideTransition: 'slide',
                      icon: 'success',
                      position: 'bottom-right'
                  });


                },
                complete: function(){
                  $('#talentogusto').waitForImages(function() {
                          $('#talentogusto').css("visibility", "visible");
                      });
                }
        });
});
</script>

@endsection