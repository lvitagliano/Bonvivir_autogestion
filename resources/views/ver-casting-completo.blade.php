<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Ivotalents - Casting</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    
	<link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/material-kit.css?v=2.1.1') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/material-kit.css?v=2.1.1') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  
  <link href="{{ asset('assets/demo/vertical-nav.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Exo+2:300,400,700&display=swap" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="{{ asset('assets/js/core/jquery.min.js') }}" type="text/javascript"></script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" integrity="sha256-zlmAH+Y2JhZ5QfYMC6ZcoVeYkeo0VEPoUnKeBd83Ldc=" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js" integrity="sha256-SVfZ7rfF8boo4UH6df28wTQeoPEpoQ+xdInu0K2ulYk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
.page-break {
    page-break-after: always;
}
</style>
</head>
<body>



<?php
 
function calcular_edad($fecha){
$fecha_nac = new DateTime(date('Y/m/d',strtotime($fecha))); // Creo un objeto DateTime de la fecha ingresada
$fecha_hoy =  new DateTime(date('Y/m/d',time())); // Creo un objeto DateTime de la fecha de hoy
$edad = date_diff($fecha_hoy,$fecha_nac); // La funcion ayuda a calcular la diferencia, esto seria un objeto
return $edad;
}
 
 

 
?>

 <div id="content" class="content">

 <div class="section">
    <div class="container" style="max-width: 98%">
      <div class="main main-raised main-product">
        <div class="row" style="padding: 15px">
          <div class="col-md-4 col-sm-4">

            <img src="https://talentos.ivotalents.com/img/ivo.jpg" style="width:100%;margin-top:55px">

          </div>
          <div class="col-md-8 col-sm-8">
            <h2 class="title"> {{$proyectos->nombre}}</h2>
            <h3 class="main-price">{{$proyectos->descripcion}}</h3>
            <div id="accordion" role="tablist">
              <div class="card card-collapse">
                <div class="card-header" role="tab" id="headingOne">
                  <h5 class="mb-0">
                    <a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                      Descripcion
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h5>
                </div>
                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                  <ul>
                      <li><b>Lugar:</b> {{$proyectos->lugar}} </li>
                      <li><b>Fecha:</b> {{$proyectos->fecha}}</li>
                      <li><b>Hora:</b> {{$proyectos->horario}}</li>
                      <li><b>Duración:</b> {{$proyectos->tiempo}}</li>
                      <li><b>Fecha Pago:</b> {{$proyectos->fecha_pago}}</li>
                      <li><b>Cantidad de Talentos:</b> {{$proyectos->cantidad_talentos}}</li>
                      <li><b>Fecha:</b> {{$proyectos->fecha_inicio}} <b>a</b> {{$proyectos->fecha_fin}}</li>
                    </ul>                 
                     </div>
                </div>
              </div>
              <div class="card card-collapse">
                <div class="card-header" role="tab" id="headingTwo">
                  <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Declaración
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h5>
                </div>
                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                    <p>Si has trabajado con proyectos que compitan en el sector o marca de <b>{{$proyectos->observaciones}}</b> en publicidad declinar esta oferta de casting, ya que es competencia de la marca.</p>
                  </div>
                </div>
              </div>
             
            </div>
         
		 
            <div class="row pull-right" style="height: 25px">
              
			  
            </div>
          </div>
        </div>
      </div>
      
      <div class="related-products">
        <h3 class="title text-center">Talentos seleccionados para el Casting:</h3>

        <div class="row" style="margin:20px">
        @foreach($users as $user)
          <div class="col-lg-3 col-md-6">
            <div class="card card-product">
              <div class="card-header card-header-image">
			  <div class="card card-raised card-carousel" style="margin-top:0px;margin-bottom:0px">
              <div id="carouselExampleIndicators{{$user->Talentos->id}}" class="carousel slide" data-ride="carousel" data-interval="5000">
                <ol class="carousel-indicators">
                <?php $i = 0; ?>
                @foreach($user->Talentos->Fotos as $foto)
                  <li data-target="#carouselExampleIndicators{{$user->Talentos->id}}" data-slide-to="{{$i}}" class=" <?php if($i == 0){ ?>active<?php } ?>"></li>
                  <?php $i++; ?>
                @endforeach
                </ol>
                <div class="carousel-inner">
                <?php $i = 0; ?>
                <div class="carousel-item <?php if($i == 0){ ?>active<?php } ?>">
           

                          <img class="d-block w-100" src="{{'https://ivotalent.s3-accelerate.amazonaws.com/files/thumbs/profile/'.$user->Talentos->id.'/540px_foto_'.$user->Talentos->id.'.png'}}" alt="Third slide">
						
                           
                    <div class="carousel-caption d-none d-md-block">
                      
                    </div>
                  </div>
                  <?php $i++; ?>
                  
                @foreach($user->Talentos->Fotos as $foto)
                  <div class="carousel-item <?php if($i == 0){ ?>active<?php } ?>">
                  <img class="d-block w-100" src="{{'https://ivotalent.s3-accelerate.amazonaws.com/files/thumbs/images/'.$foto->usuario_id.'/540px_foto_'.$foto->nombre_fisico}}" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                    
                    </div>
                  </div>
                  <?php $i++; ?>
                  @endforeach
                </div>
                @if($user->Talentos->Fotos->count()>0)
                <a class="carousel-control-prev" href="#carouselExampleIndicators{{$user->Talentos->id}}" role="button" data-slide="prev">
                  <i class="material-icons">keyboard_arrow_left</i>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators{{$user->Talentos->id}}" role="button" data-slide="next">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span class="sr-only">Next</span>
                </a>
                @endif
              </div>
            </div>
              <div class="colored-shadow" style="background-image: url(https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif); opacity: 1;"></div></div>
              <div class="card-body">
              <h4 class="card-category text-rose">
                       @if($user->Talentos->name)
                        <?php $userNombreCorto =   strstr($user->Talentos->name, ' ', true)  ?>
                      @else
                        <?php $userNombreCorto =  strstr($user->Talentos->nombre, ' ', true)  ?>
                      @endif

                      <b>{{ $user->Talentos->id}} - {{ $userNombreCorto}}</b>
                      </h4>
                <h6 class="card-category text-rose">
                
                @if($user->Talentos->anio)
													  <?php $edad = calcular_edad($user->Talentos->anio.'-'.$user->Talentos->mes.'-'.$user->Talentos->dia);
													echo "{$edad->format('%Y')} años y {$edad->format('%m')} meses"; 

													?> @endif 

													 ( @if($user->Talentos->anio)
															{{$user->Talentos->dia}}/{{$user->Talentos->mes}}/{{$user->Talentos->anio}}

															@else
																 Fecha de Nacimiento*
															@endif )</h6>
                <h4 class="card-title">
                  <a href="#pablo">{{$user->Talentos->Talentos->Talento1->nombre}} | {{$user->Talentos->Talentos->Genero1->nombre}} | {{$user->Talentos->Talentos->Categoria1->nombre}}</a>
                </h4>
                <h4 class="card-title">
                  <a href="#pablo">{{$user->Talentos->Talentos->Talento2->nombre}} | {{$user->Talentos->Talentos->Genero2->nombre}} | {{$user->Talentos->Talentos->Categoria2->nombre}}</a>
                </h4>
                <div class="card-description">
                {{$user->Talentos->Sexual->nombre}} | {{$user->Talentos->Pais->nombre}} / {{$user->Talentos->Provincia->nombre}} | {{$user->Talentos->Nacionalidad->gentilicio_nac}}
                </div>

		  		<div id="accordion" role="tablist">
              <div class="card card-collapse">
                <div class="card-header" role="tab" id="headingOne">
                  <h5 class="mb-0">
                    <a data-toggle="collapse" href="#collapseOne{{$user->Talentos->id}}" aria-expanded="false" aria-controls="collapseOne{{$user->Talentos->id}}">
                    Talentos/Oficios/Hobbies
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h5>
                </div>
                <div id="collapseOne{{$user->Talentos->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                  <ul>
                      <li><b>Principal:</b>  {{$user->Talentos->Talentos->Talento1->nombre}} </li>
                      <li><b>Secundario:</b>   {{$user->Talentos->Talentos->Talento2->nombre}}</li>
                      <li><b>Oficios:</b> {{$user->Talentos->Oficios->Oficio1->nombre}}</li>
                      <li><b>Hobbies:</b> {{$user->Talentos->Hobbies->Hobbie1->nombre}}</li>
                      <li><b>Deportes:</b> {{$user->Talentos->Talentos->Genero3->nombre}}/{{$user->Talentos->Talentos->Categoria3->nombre}}</li>
                      <li><b>Idiomas:</b> {{$user->Talentos->Idiomas->Idioma1->nombre}}/{{$user->Talentos->Idiomas->Idioma2->nombre}}/{{$user->Talentos->Idiomas->Idioma3->nombre}}</li>
                      <li><b>Disponibilidad:</b> {{$user->Talentos->disponibilidad}}</li>
                      <li><b>Experiencia:</b> {{$user->Talentos->experiencia}}</li>
                      <li><b>Manager:</b> {{$user->Talentos->Manager->nombre}}</li>
                    </ul> 
                    </div>
                </div>
              </div>
            </div>
              </div>
               <div class="card-footer justify-content-between">
                <div class="price">
                  <h4>{{$user->papel}}</h4>
                </div>
                <div class="stats">
                  <button type="button" rel="tooltip" data-id="{{$user->id}}" 
                    id="{{$user->id}}" name="{{$user->id}}" 
                    class="btn btn-just-icon btn-link me_caigo @if($user->favorito == 1) btn-rose @else btn-grey  @endif" data-original-title="Saved to Wishlist">
                    <i class="material-icons">favorite</i>
                  </button>
                </div>
              </div>  
            </div>
          </div>
    
       
          @endforeach
        
        
        </div>
      </div>
    </div>
  </div>
    </div>
    <!-- end page container -->
    
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>
  


<script>


$(document).on('click touchend', '.me_caigo', function(event) {
    event.preventDefault();
    

           var _token = '{{csrf_token()}}';
        var a = this.id;
        $.ajax({
                 url: "/favoritear/"+this.id,
                 method: "GET",
                 success:function(result)
                   {
                     if(result == 1){
                      $("#"+a).removeClass("btn-grey");
                      $("#"+a).addClass("btn-rose");
                     

                      $.toast({
                          heading: 'Talento Seleccionado',
                          text: 'Talento Seleccionado CORRECTAMENTE.',
                          showHideTransition: 'slide',
                          icon: 'success',
                          position: 'bottom-right'
                      });

                     }
                     else{
                      $("#"+a).removeClass("btn-rose");
                      $("#"+a).addClass("btn-grey");

                       $.toast({
                          heading: 'Talento Quitado',
                          text: 'Talento Quitado CORRECTAMENTE.',
                          showHideTransition: 'slide',
                          icon: 'error',
                          position: 'bottom-right'
                      });
                       
                     }
                   }
                })

});


  </script>
  
