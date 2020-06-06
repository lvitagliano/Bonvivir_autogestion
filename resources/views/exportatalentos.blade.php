<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Ivotalents - Admin</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
<style>
.page-break {
    page-break-after: always;
}
</style>
</head>

<?php
 
function calcular_edad($fecha){
$fecha_nac = new DateTime(date('Y/m/d',strtotime($fecha))); // Creo un objeto DateTime de la fecha ingresada
$fecha_hoy =  new DateTime(date('Y/m/d',time())); // Creo un objeto DateTime de la fecha de hoy
$edad = date_diff($fecha_hoy,$fecha_nac); // La funcion ayuda a calcular la diferencia, esto seria un objeto
return $edad;
}
 
 

 
?>

<body style="font-family: 'Exo 2', sans-serif;">
        <div id="content" class="content">
            <h4 class="modal-title" style="text-align: center"><img src="https://talento.ivotalents.com/img/ivo.jpg" style="width:45%; height:25%;"></h4>
            <h4 class="modal-title" style="text-align: center">{{$proyecto}}</h4>
            <h6 class="modal-title" style="text-align: center"><?php  $today = date("d/m/Y");
                                                                echo $today; ?></h6>
            <br>
            <br>

              <h6 class="modal-title" style="text-align: center">{{$busqueda}}</h6>

            <br>
       <table class="table" style="font-size: 10px; margin-left: 12px" width="100%">
			<thead>
				<tr>
					<th width="20%" data-orderable="false">Foto</th>
					<th class="text-nowrap">Datos personales</th>
					<!-- <th class="text-nowrap">Características  Físicas</th> -->
					<th class="text-nowrap">Talentos/Oficios/Hobbies</th>
				</tr>
			</thead>
			<tbody>
				<?php $varNumTal = 0; ?>
				@foreach($users as $user)
					<?php $varNumTal = $varNumTal + 1; ?>
				<tr class="gradeA">

						<td class="with-img" width="34%">
						<br>
							@if($user->avatar)    
								<a href="#" data-lightbox="gallery-group-1" >
										<img style="width: 180px;heigth: 190px" src="{{'https://ivotalent.s3-accelerate.amazonaws.com/files/thumbs/profile/'.$user->id.'/540px_foto_'.$user->id.'.png'}}" alt="" />
								</a>
							@else
							<img style="width:180px;heigth: 190px"  src="https://ivotalents.com/img/avatar.png" alt="" />
							@endif

						</td>

						@if($user->name)
							<?php $userNombreCorto =  strstr($user->name, ' ', true)  ?>
						@else
							<?php $userNombreCorto =   strstr($user->nombre, ' ', true)  ?>
						@endif
								<td width="33%">
								<b>{{ $user->id}} - {{$userNombreCorto}}</b><br/>
								<b>Edad:</b> 
									@if($user->anio)
									<?php $edad = calcular_edad($user->anio.'-'.$user->mes.'-'.$user->dia);
									echo "{$edad->format('%Y')} años y {$edad->format('%m')} meses"; 

									?> @endif 

									( @if($user->anio)
										{{$user->dia}}/{{$user->mes}}/{{$user->anio}}

										@else
												Fecha de Nacimiento*
										@endif )<br/>

										<b>Sexo:</b>{{$user->Sexual->nombre}}<br/>
										<b>Residencia:</b>{{$user->Pais->nombre}} / {{$user->Provincia->nombre}}<br/>
										<b>Idioma Nativo:</b>{{$user->Idiomas->Idioma1->nombre}} <br/>
										<b>Otros Idiomas:</b>{{$user->Idiomas->Idioma2->nombre}}/{{$user->Idiomas->Idioma3->nombre}} <br/>
										<b>Nacionalidad:</b>{{$user->Nacionalidad->gentilicio_nac}}<br/>
										<b>Experiencia:</b>{{$user->experiencia}}<br/>
										<br>



										</td>
									
					
										<td width="33%">
										<b>Principal:</b>  {{$user->Talentos->Talento1->nombre}} | {{$user->Talentos->Genero1->nombre}} | {{$user->Talentos->Categoria1->nombre}} <br/>
										<b>Secundario:</b> {{$user->Talentos->Talento2->nombre}} | {{$user->Talentos->Genero2->nombre}} | {{$user->Talentos->Categoria2->nombre}} <br/>
										<b>Manager:</b> {{$user->Manager->nombre}}<br/>
										<b>Hobbies:</b> {{$user->Hobbies->Hobbie1->nombre}}<br/>
										<b>Deportes:</b> {{$user->Talentos->Genero3->nombre}}/{{$user->Talentos->Categoria3->nombre}}<br/>
										<b>Disponibilidad:</b>{{$user->disponibilidad}}<br/>
										<br>
									</td>
                            </tr>
							 <?php $i=0; ?>
									@foreach($user->Fotos as $foto)
									  @if($i<6)
										   @if(($i==0)||($i==3))<tr class="gradeA">@endif
											<td class="with-img p-2">
													<br>
														<img style=" height: 180px" src="{{'https://ivotalent.s3-accelerate.amazonaws.com/files/thumbs/images/'.$foto->usuario_id.'/540px_foto_'.$foto->nombre_fisico}}" alt="" />
													
												</td>
										  @if(($i==2)||($i==5))</tr>@endif										
										@endif
										   <?php $i++; ?>
									  @endforeach
									  

						@if($varNumTal < count($users))			  
						 <tr class="">
								<td colspan="4">
								
								<div class="page-break"></div>
								</td>
						</tr>
						@endif

                        @endforeach	
						
                        </tbody>
                    </table>


        </div>
    </div>
    <!-- end page container -->
    
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>
  
