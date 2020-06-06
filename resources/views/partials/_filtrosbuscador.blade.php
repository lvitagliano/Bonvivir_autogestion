<div class="col-md-11 ml-auto mr-auto">    

<ul class="nav nav-tabs nav-pills  nav-justified">
    <li class="nav-item-filtro info-basica" id="tb1"><a href="#info" data-toggle="tab">Info Básica</a></li>
    <li class="nav-item-filtro info-Talento"  id="tb2"><a href="#talentos" data-toggle="tab">Talento</a></li>
    <li class="nav-item-filtro info-Fenotipo"  id="tb3"><a href="#fenotipo" data-toggle="tab">Físico</a></li>
    <li class="nav-item-filtro info-Tallas"  id="tb4"><a href="#tallas" data-toggle="tab">Tallas</a></li>
    <li class="nav-item-filtro info-Medidas"  id="tb5"><a href="#medidas" data-toggle="tab">Medidas</a></li>
    <li class="nav-item-filtro info-Media"  id="tb6"><a href="#media" data-toggle="tab">Media</a></li>
</ul>
<div class="tab-content tab-space col-md-9 ml-auto mr-auto p-4" id="tabs">
    <div class="tab-pane active show" id="info">
    
    <div class="row">
                                    <div class="col-md-4 col-sm-6 col-xs-12"  style="color:#A1A1A1;border-right: 0px">   
                                        <select class="selectpicker "  data-live-search="true" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                          multiple title="Sexo" data-size="5" name="sexo[]" id="sexo">
                                                 <option disabled> Opción multiple</option>
                                                 @foreach($sexos as $sexo)
                                                       <option value="{{$sexo->id}}">{{$sexo->nombre}}</option>
                                                 @endforeach
                                             </select>
                                        </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12" style="color:#A1A1A1;
                                                                                    border-right: 0px">
                                        <select class="selectpicker "  data-live-search="true" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                          title="EDAD DESDE "  name="edad_desde" id="edad_desde" data-size="5">
                                        <option disabled> Edad</option>
                                        <?php for ($i = 0; $i <= 100; $i++) { ?>
                                          <option value="{{$i}}">{{$i}}</option>
                                        <?php  } ?>
                                    </select>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12" style="color:#A1A1A1;
                                    border-right: 0px">
                                        <select class="selectpicker "  data-live-search="true" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                          title="EDAD HASTA "  name="edad_hasta" id="edad_hasta" data-size="5">
                                        <option disabled> Edad</option>
                                            <?php for ($i = 1; $i <= 100; $i++) { ?>
                                              <option value="{{$i}}">{{$i}}</option>
                                            <?php  } ?>
                                        </select>
                                    </div>
                                    
                               
                                  <div class="col-md-4 col-sm-6 col-xs-12" style="color:#A1A1A1;
                                    border-right: 0px">
                                      <select class="selectpicker" data-live-search="true"  data-lugar="4"  data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                      title="Pais"  name="pais" id="pais" data-size="5">
                                            <option disabled> Pais</option>
                                            @foreach($paises as $pais)
                                                <option value="{{$pais->codigo_pais}}">{{$pais->nombre}}</option>
                                            @endforeach
                                       </select>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12" style="color:#A1A1A1;
                                                                        border-right: 0px">
                                    <select class="selectpicker"  multiple data-live-search="true"  id="ciudad" name="ciudad[]" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                    title="Elegir Ciudad" data-size="5">
                                        <option disabled>  Opción multiple</option>
                                        @foreach($ciudades as $ciudad)
                                          <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
                                        @endforeach
                                    </select>
                                    </div>

                                  <div class="col-md-4 col-sm-6 col-xs-12" style="color:#A1A1A1;  border-right: 0px">
                                      <select class="selectpicker" multiple data-live-search="true"  id="idioma" name="idioma[]" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                      title="Idiomas" data-size="5">
                                          <option disabled> Opción multiple</option>
                                          @foreach($idiomas as $idioma)
                                            <option value="{{$idioma->id}}">{{$idioma->nombre}}</option>
                                          @endforeach
                                      </select>
                                  </div>
								  
								  <div class="col-md-12 col-sm-12 col-xs-12" style="color:#A1A1A1;  border-right: 0px">
                                      <select class="selectpicker" multiple data-live-search="true"  id="nacionalidad" name="nacionalidad[]" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                      title="Nacionalidad" data-size="5">
                                          <option disabled> Opción multiple</option>
                                          @foreach($nacionalidades as $nacionalidad)
                                            <option value="{{$nacionalidad->gentilicio_nac}}">{{$nacionalidad->gentilicio_nac}}</option>
                                          @endforeach
                                      </select>
                                  </div>

                                  <div class="col-md-12 col-sm-12 col-xs-12" style="color:#A1A1A1;  border-right: 0px">
                                    <select class="selectpicker" multiple data-live-search="true"  id="ides" name="ides[]" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                    title="IDs de Talentos" data-size="5">
                                        <option disabled> Opción multiple</option>
                                        @foreach($deseados as $deseado)
                                          <option value="{{$deseado->id}}">{{$deseado->id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                              </div>

                      </div>
                      <div class="tab-pane" id="talentos">
                      <div class="row">
                                  <div class="col-md-3 col-sm-6 col-xs-12"  style="color:#A1A1A1;
                                                                                    border-right: 0px"> 
                                    <select class="selectpicker"  data-live-search="true"  name="talento" id="talento" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                    title="Talento" data-size="5">
                                           <option disabled> Talento</option>
                                           @foreach($talentos as $talento)
                                                 <option value="{{$talento->id}}">{{$talento->nombre}}</option>
                                           @endforeach
                                       </select>
                                  </div>
                                  <div class="col-md-3 col-sm-6 col-xs-12" style="color:#A1A1A1;
                                                                                  border-right: 0px">
                                      <select class="selectpicker"  data-live-search="true"  name="genero" id="genero"  data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                      title="Género" data-size="5">
                                             <option disabled> Género</option>
                                             @foreach($talentosgeneros as $talentosgenero)
                                                   <option value="{{$talentosgenero->id}}">{{$talentosgenero->nombre}}</option>
                                             @endforeach
                                         </select>
                                  </div>
                                  <div class="col-md-3 col-sm-6 col-xs-12" style="color:#A1A1A1;
                                                                                border-right: 0px">
                                      <select class="selectpicker"  data-live-search="true" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                      title="Categoría"  name="categoria" id="categoria" data-size="5">
                                             <option disabled> Categoría</option>
                                             @foreach($talentoscategorias as $talentoscategoria)
                                                   <option value="{{$talentoscategoria->id}}">{{$talentoscategoria->nombre}}</option>
                                             @endforeach
                                         </select>
                                  </div>
                                  <div class="col-md-3 col-sm-6 col-xs-12" style="color:#A1A1A1;
                                                                                  border-right: 0px">
                                      <select class="selectpicker"  data-live-search="true" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                      title="Especialidad"  name="especialidad" id="especialidad" data-size="5">
                                             <option disabled> Especialidad</option>
                                             @foreach($talentosespecialidades as $talentosespecialidad)
                                                   <option value="{{$talentosespecialidad->id}}">{{$talentosespecialidad->nombre}}</option>
                                             @endforeach
                                         </select>
                                  </div>
                                  <div class="col-md-6 col-sm-12 col-xs-12" style="color:#A1A1A1;
                                                                                border-right: 0px">
                                      <select class="selectpicker"  data-live-search="true" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                      title="Oficio"  name="oficios[]" id="oficios" data-size="5">
                                             <option disabled> Oficios</option>
                                             @foreach($oficios as $oficio)
                                                   <option value="{{$oficio->id}}">{{$oficio->nombre}}</option>
                                             @endforeach
                                         </select>
                                  </div>
                                  <div class="col-md-6 col-sm-12 col-xs-12" style="color:#A1A1A1;
                                                                                  border-right: 0px">
                                      <select class="selectpicker"  data-live-search="true" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                      title="Hobbie"  name="hobbies[]" id="hobbies" data-size="5">
                                             <option disabled> Hobbies</option>
                                             @foreach($hobbies as $hobbie)
                                                   <option value="{{$hobbie->id}}">{{$hobbie->nombre}}</option>
                                             @endforeach
                                         </select>
                                  </div>

                              </div>
    </div>
    <div class="tab-pane" id="fenotipo">
    <div class="row">
                                  <div class="col-md-4 col-sm-6 col-xs-12"  style="color:#A1A1A1;
                                                                                    border-right: 0px"> 
                                    <select class="selectpicker" data-live-search="true"  data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                    multiple title="Piel"  name="piel[]" id="piel" data-size="5">
                                           <option disabled> Opción multiple</option>
                                           @foreach($pieles as $piel)
                                                 <option value="{{$piel->id}}">{{$piel->nombre}}</option>
                                           @endforeach
                                       </select>
                                  </div>
                                  <div class="col-md-4 col-sm-6 col-xs-12" style="color:#A1A1A1;
                                                                                  border-right: 0px">
                                      <select class="selectpicker" data-live-search="true"  data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                      multiple title="Ojos" name="ojos[]" id="ojos"  data-size="5">
                                             <option disabled> Opción multiple</option>
                                             @foreach($ojos as $ojo)
                                                   <option value="{{$ojo->id}}">{{$ojo->nombre}}</option>
                                             @endforeach
                                         </select>
                                  </div>
                                  <div class="col-md-4 col-sm-6 col-xs-12" style="color:#A1A1A1;
                                                                                  border-right: 0px">
                                      <select class="selectpicker" data-live-search="true"  data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                      multiple title="Cabello"  name="cabello[]" id="cabello" data-size="5">
                                             <option disabled> Opción multiple</option>
                                             @foreach($cabellos as $cabello)
                                                   <option value="{{$cabello->id}}">{{$cabello->nombre}}</option>
                                             @endforeach
                                         </select>
                                  </div>
                                  <div class="col-md-4 col-sm-6 col-xs-12" style="color:#A1A1A1;
                                                                                  border-right: 0px">
                                      <select class="selectpicker" data-live-search="true"  data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                      multiple title="Complexión" name="complexion[]" id="complexion"  data-size="5">
                                             <option disabled> Opción multiple</option>
                                             @foreach($contexturas as $contextura)
                                                   <option value="{{$contextura->id}}">{{$contextura->nombre}}</option>
                                             @endforeach
                                         </select>
                                  </div>
                                  <div class="col-md-4 col-sm-6 col-xs-12" style="color:#A1A1A1;
                                                                                  border-right: 0px">
                                      <select class="selectpicker"  data-live-search="true" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                      multiple title="Looks" name="look[]" id="look"  data-size="5">
                                             <option disabled> Opción multiple</option>
                                             @foreach($looks as $look)
                                                   <option value="{{$look->id}}">{{$look->nombre}}</option>
                                             @endforeach
                                         </select>
                                  </div>
                                  <div class="col-md-4 col-sm-6 col-xs-12" style="color:#A1A1A1;
                                                                                  border-right: 0px">
                                      <select class="selectpicker" data-live-search="true"  data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                      multiple title="Tatuajes" name="tatuaje[]" id="tatuaje"  data-size="5">
                                             <option disabled> Opción multiple</option>
                                             <option value="Si">Si</option>
                                             <option value="No">No</option>
                                         </select>
                                  </div>
                              </div>
    </div>
    <div class="tab-pane" id="tallas">
    <div class="row">
                                    <div class="col-md-4 col-sm-6 col-xs-12"  style="color:#A1A1A1;
                                                                                      border-right: 0px"> 
                                      <select class="selectpicker"  data-live-search="true" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                      multiple title="Camisa"  name="camisa[]" id="camisa" data-size="5">
                                             <option disabled> Opción multiple</option>
                                             @foreach($camisa as $camisas)
                                                   <option value="{{$camisas->id}}">{{$camisas->nombre}}</option>
                                             @endforeach
                                         </select>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12" style="color:#A1A1A1;
                                                                                    border-right: 0px">
                                        <select class="selectpicker"  data-live-search="true" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                        multiple title="Pantalon"  name="pantalon[]" id="pantalon" data-size="5">
                                               <option disabled> Opción multiple</option>
                                               @foreach($pantalon as $pantalones)
                                                     <option value="{{$pantalones->id}}">{{$pantalones->nombre}}</option>
                                               @endforeach
                                           </select>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12" style="color:#A1A1A1;
                                                                                    border-right: 0px">
                                        <select class="selectpicker"  data-live-search="true" data-style="select-with-transition form-control" data-style="color:#A1A1A1;width:100%" 
                                        multiple title="Zapatos" name="zapato[]" id="zapato"  data-size="5">
                                               <option disabled> Opción multiple</option>
                                               @foreach($zapatos as $zapato)
                                                     <option value="{{$zapato->id}}">{{$zapato->nombre}}</option>
                                               @endforeach
                                           </select>
                                    </div>
                                </div>
    </div>
    <div class="tab-pane" id="medidas"></div>
    <div class="tab-pane" id="media"></div>
</div>


  <input type="submit"  value="buscar"  class="btn  btn-lg btn-block searchFilter">        
  </div>
<div class="col-md-2 ml-auto mr-auto p-4">                                
      <p style="cursor:pointer" class="info-reset" id="resetear">Reiniciar Busqueda</p>
</div>