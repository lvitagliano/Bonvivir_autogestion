

@foreach($proyectos as $proyecto)
<div class="col-12">
      <h5>{{$proyecto->nombre}}</h5>
</div>
        @foreach($deseados as $deseado)
      @if($deseado->casting_id == $proyecto->id)
        <div class="col-lg-5 col-md-5 col-sm-12 xol-xs-12">
            <div class="media" style="width:97%;background-color:#E9F1FF; margin-bottom: 5px; border-radius: 2px">
              <a class="float-left" href="#">
                <div class="avatar" style=" margin-left: 25px;">
                  <img class="media-object" alt="64x64" src="{{'https://ivotalent.s3-accelerate.amazonaws.com/files/thumbs/profile/'.$deseado->id.'/540px_foto_'.$deseado->id.'.png'}}">
                </div>
              </a>
              <div class="media-body">
                <h5 class="media-heading mb-0;" style="margin-bottom: 0px">Talentos {{$deseado->id}} &nbsp;&nbsp;&nbsp;&nbsp; <i class="material-icons eliminar" 
                  style="color:grey; font-size: 20px; cursor:pointer" data-perfil-id="{{$deseado->id}}">highlight_off</i>
                </h5>
                <h4  style="margin-top: 0px"> {{$deseado->talento1}} | {{$deseado->talento2}}</h4> 
              </div>
            </div>
          </div>  
          @endif
        @endForeach
    @endForeach
<script>



//CARGA DE LOS RESULTADOS INICIALES DE BUSQUEDA RAPIDA.
$('.eliminar').on('click', function(){
    var dependent = $(this).data('perfil-id');
$.ajax({
      url: "/eliminar-talento-gusto/"+ dependent,
        type:"POST",
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


              location.href="/mis-talentos";
            },
            complete: function(){
             
              
            }
    });
});
</script>
  
