    @foreach($deseados as $deseado)
      @if($deseado->confirmado == '-1')
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">            
          <div class="card card-profile">
              <div class="card-header card-avatar">
                <a href="#pablo">
                  <img class="img" src="{{'https://ivotalent.s3-accelerate.amazonaws.com/files/thumbs/profile/'.$deseado->id.'/540px_foto_'.$deseado->id.'.png'}}">
                </a>
              </div>
              <div class="card-body">
                <h4 class="card-title">Talento {{$deseado->id}}</h4>
                <h6 class="card-category text-muted">{{$deseado->talento1}} | {{$deseado->talento2}}</h6>
                <p class="card-description">
                  
                </p>
              </div>
              <div class="card-footer justify-content-center">
                 <!-- <div class="togglebutton">
                      <label>
                        <input type="checkbox" class="me_caigo_rech"
                        @if($proyectos->seleccion_finalizada == 1) disabled @endif  
                        data-id="{{$deseado->castings_seleccionados_id}}" 
                        id="{{$deseado->castings_seleccionados_id}}" name="{{$deseado->castings_seleccionados_id}}"  
                        @if($deseado->check == 1) checked  @endif>
                        <span class="toggle"></span>
                        
                      </label>
                    </div> -->
                <a href="#" class="btn btn-just-icon btn-round  @if($proyectos->seleccion_finalizada == 1) btn-disabled btn-gray @else  btn-github  @endif" style="background-color:white;
                border-color: white;"> <?php
                  $findme   = '"sent":true';
                  $pos = strpos($deseado->msj_status, $findme);

                  if ($pos === false) { ?>
                   <i style="font-size: 22px; color: red; cursor:pointer" class="material-icons giniu" data-perfil-id="{{$deseado->id}}" title="Mensaje No se ha podido Enviar: {{$deseado->msj_status}}">sms_failed</i>
              <?php } else { ?>
                   <i style="font-size: 22px; color: green; cursor:pointer" class="material-icons"   title="Mensaje Enviado Correctamente">sms</i>    
              <?php } ?></a>
              
              <a href="{{ route('eliminartalentoproyecto', ['id'=> $elProyecto, 'ids'=> $deseado->id]) }}" 
                  onclick="return confirm('Desea quitar el Talento de la lista?')" alt="Eliminar" 
                  class="btn btn-just-icon btn-round @if($proyectos->seleccion_finalizada == 1) btn-disabled @else btn-pinterest  @endif">
                  <i class="fa fa-trash"></i></a>
              </div>
            </div>
          </div>  
          @endif
        @endForeach
    <script>


$('.me_caigo_rech').click(function(e, parameters) {
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

$('.giniu').click(function(e, parameters) {
  var _token = '{{csrf_token()}}';
  if (! confirm('Desea volver a enviar el mensaje?')) { return false; }
  var dependent = $(this).data('perfil-id');
  $.ajax({
           url: "/notificar/"+dependent,
           method: "GET",
           success:function(result)
             {
              $.toast({
                heading: 'Mensaje Enviado Nuevamente',
                text: 'El Mensaje ha sido ENVIADO de Correctamente.',
                showHideTransition: 'slide',
                icon: 'success',
                position: 'bottom-right'
            });
             }
          })

});
</script>
  
