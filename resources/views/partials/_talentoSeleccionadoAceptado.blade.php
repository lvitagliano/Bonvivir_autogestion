   <style>
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
}</style>

<?php
 
function calcular_edad($fecha){
$fecha_nac = new DateTime(date('Y/m/d',strtotime($fecha))); // Creo un objeto DateTime de la fecha ingresada
$fecha_hoy =  new DateTime(date('Y/m/d',time())); // Creo un objeto DateTime de la fecha de hoy
$edad = date_diff($fecha_hoy,$fecha_nac); // La funcion ayuda a calcular la diferencia, esto seria un objeto
return $edad;
}
 
?>

   @foreach($deseados as $deseado)
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="card card-profile">
          <div style="align-self: flex-end; margin: .2rem">
          <button 
           class="btn btn-just-icon btn-round @if($deseado->seleccionado_final == 0) btn-grey @else btn-behance btn-disabled @endif"
           data-target="#confirmModal" data-toggle="modal"
           data-perfil-id="{{$deseado->Talentos->id}}" data-casting-id="{{$deseado->casting_id}}" data-table-id="{{$deseado->id}}"
           id="btnConfirm_{{$deseado->Talentos->id}}" name="btnConfirm_{{$deseado->Talentos->id}}">
           <i class="fa fa-check"></i><div class="ripple-container"></div>
           </button>
           </div>
              <div class="card-header card-avatar">
                <a href="#pablo">
                  <img class="img" src="{{'https://ivotalent.s3-accelerate.amazonaws.com/files/thumbs/profile/'.$deseado->Talentos->id.'/540px_foto_'.$deseado->Talentos->id.'.png'}}">
                </a>
              </div>

              <div class="card-body">

                   @if($deseado->Talentos->name)
                        <?php $userNombreCorto =   strstr($deseado->Talentos->name, ' ', true)  ?>
                      @else
                        <?php $userNombreCorto =  strstr($deseado->Talentos->nombre, ' ', true)  ?>
                      @endif

                <h4 class="card-title">Talento {{$deseado->Talentos->id}} - {{$userNombreCorto }}</h4>
               
                          
                <h6 class="card-category text-muted">{{$deseado->Talentos->Talentos->Talento1->nombre}} 
                  | {{$deseado->Talentos->Talentos->Genero1->nombre}} | {{$deseado->Talentos->Talentos->Categoria1->nombre}}</h6>
                <h6 class="card-category text-muted">{{$deseado->Talentos->Talentos->Talento2->nombre}} 
                  | {{$deseado->Talentos->Talentos->Genero2->nombre}} | {{$deseado->Talentos->Talentos->Categoria2->nombre}}</h6>
                <p class="card-description">
                  <?php 
                  
                  $edad = calcular_edad($deseado->Talentos->anio.'-'.$deseado->Talentos->mes.'-'.$deseado->Talentos->dia);
                  echo "{$edad->format('%Y')} años y {$edad->format('%m')} meses"; 

                  ?> | {{$deseado->Talentos->Sexual->nombre}} | {{$deseado->Talentos->Nacionalidad->gentilicio_nac}}
                </p>
                <p class="card-description">
                  <b>Residencia:</b> {{$deseado->Talentos->Pais->nombre}}/{{$deseado->Talentos->Ciudad->nombre}} |  
                  <b>Idiomas:</b> {{$deseado->Talentos->Idiomas->idioma1->nombre}}/{{$deseado->Talentos->Idiomas->idioma1->nombre}}/{{$deseado->Talentos->Idiomas->idioma3->nombre}}  |  
                  <b>Experiencia:</b> {{$deseado->Talentos->experiencia}} | <b>Disponibilidad:</b> {{$deseado->Talentos->disponibilidad}}  | <b>Hobbie:</b> {{$deseado->Talentos->Hobbies->nombre}}
                  | <b>Deporte:</b> {{$deseado->Talentos->Talentos->Talento3->nombre}}  
                </p>
              </div>
              <div class="card-footer justify-content-center">
                    <div class="togglebutton">
                        <label>
                          <input type="checkbox" class="me_caigo_acept"
                          @if($proyectos->seleccion_finalizada == 1) disabled @endif  
                          data-id="{{$deseado->id}}" 
                          id="{{$deseado->id}}" name="{{$deseado->id}}"  
                          @if($deseado->check == 1) checked  @endif />
                          <span class="toggle"></span>
                          
                        </label>
                      </div>
                    <button class="btn btn-just-icon btn-round @if(($proyectos->seleccion_finalizada == 0)or($proyectos->proyecto_id == 0)) btn-disabled @else btn-linkedin @endif ">
                      <i class="fa fa-address-card"></i><div class="ripple-container"></div>
                    </button>
                    <button class="btn btn-just-icon btn-round btn-behance  
                    @if(App\Http\Controllers\unProyectoController::obtenerchatNoVisto($deseado->talento_id,$deseado->casting_id)>0) 
                    badge1 btn-animation-blue @endif " 
                      style="overflow:visible"
                      @if(App\Http\Controllers\unProyectoController::obtenerchatNoVisto($deseado->talento_id,$deseado->casting_id)>0)
                       data-badge="{{App\Http\Controllers\unProyectoController::obtenerchatNoVisto($deseado->talento_id,$deseado->casting_id)}}" @endif 
                      data-toggle="modal" @if($proyectos->seleccion_finalizada == 1) btn-disabled @endif data-target="#chatearmodal"
                      data-perfil-id="{{$deseado->Talentos->id}}" data-casting-id="{{$deseado->casting_id}}"  id="btn_{{$deseado->Talentos->id}}">
                        <i class="fa fa-comments"></i><div class="ripple-container "> </div>
                      </button>
                    <button class="btn btn-just-icon btn-round @if($proyectos->seleccion_finalizada == 1) btn-disabled @endif
                        @if($deseado->favorito == 1) btn-rose @else btn-grey  @endif"
                        data-id="{{$deseado->Talentos->id}}" 
                        id="{{$deseado->Talentos->id}}" name="{{$deseado->Talentos->id}}">
                      <i class="fa fa-heart"></i><div class="ripple-container"></div>
                    </button>

                <a href="{{ route('eliminartalentoproyecto', ['id'=> $elProyecto, 'ids'=> $deseado->id]) }}" 
                  onclick="return confirm('Desea quitar el Talento de la lista?')" alt="Eliminar" 
                  class="btn btn-just-icon btn-round @if($proyectos->seleccion_finalizada == 1) btn-disabled @else btn-pinterest  @endif">
                  <i class="fa fa-trash"></i></a>
              </div>
            </div>
      
          </div>  
        @endForeach



