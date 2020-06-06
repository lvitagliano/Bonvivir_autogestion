
    @foreach($proyectos as $deseado)
    <div class="col-lg-6 col-md-12 col-sm-12">
	    						<div class="card card-blog  p-2">
	    							<div class="card-image">
                    <h5 class="media-heading mb-0" style="margin-bottom: 0px">Proyecto: {{$deseado->nombre}} &nbsp;&nbsp;&nbsp;&nbsp; <i class="material-icons eliminaros" 
                        style="color:grey; font-size: 20px; cursor:pointer" data-perfil-id="{{$deseado->id}}">highlight_off</i>
                      </h5>
    
	    							<div class="colored-shadow" style="background-image: url(&quot;assets/img/examples/card-blog1.jpg&quot;); opacity: 1;"></div></div>

	    							<div class="card-content">
                    <h4 class="card-title">
	    									<a href="#"> {{$deseado->descripcion}}</a>
	    								</h4>
	    								<p class="card-description">
                      Si has trabajado con proyectos  que compitan en el sector o marca de <b>{{$deseado->observaciones}}</b> en publicidad declinar esta oferta de casting, ya que es competencia de la marca.
                     
	    								</p>

                      <h6  style="margin-top: 0px">  <b>Lugar:</b> {{$deseado->lugar}} | <b>Fecha:</b> {{$deseado->fecha}} | <b>Hora:</b> {{$deseado->horario}} | <b>Duración:</b> {{$deseado->tiempo}} </h6> 
                      <h6  style="margin-top: 0px">  <b>Fecha Pago:</b> {{$deseado->fecha_pago}} | <b>Cantidad de Talentos:</b> {{$deseado->cantidad_talentos}} | 
                      <b>Fecha:</b> {{$deseado->fecha_inicio}} <b>a</b> {{$deseado->fecha_fin}}</h6> 

	    							</div>
                    <div class="footer">
                    <div class="stats pt-3" style="float: left;line-height: 30px;color: #999999;">
                    <ul class="">
                    <li class="list-horizontal">
                        <a class="btn-nav" href="{{ route('unproyecto', ['id'=> $deseado->id]) }}" data-perfil-id="{{$deseado->id}}">
                          <i class="material-icons">account_circle</i> Ver Talentos
                        </a>
                      </li>
			
                      </ul>
                        </div>
                       
                        <div class="stats pt-3" style="float: right;line-height: 30px;color: #999999;">
                            <i class="material-icons">account_circle</i> {{$deseado->Seleccionados->Count()}} ·
                            <i class="material-icons">thumb_up</i> {{$deseado->Aceptados->Count()}} ·
                            <i class="material-icons">thumb_down</i> {{$deseado->Rechazados->Count()}} .
                            {{-- <a href="{{ route('generandopdf',['id'=>$deseado->id]) }}"> --}}
                        </div>
                    </div>
	    		</div>
          
   </div>
    @endForeach
  

  <script>


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
</script>
