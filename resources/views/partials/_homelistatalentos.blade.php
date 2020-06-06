@foreach($talentos as $talento)
<?php 
   $year = date("Y");

   $dia=date("d");
   $mes=date("m");
   $ano=date("Y");
   $dianaz=$talento->dia;
   $mesnaz=$talento->mes;
   $anonaz=$talento->anio;
   if (($mesnaz == $mes) && ($dianaz > $dia)) {
   $ano=($ano-1); }
   if ($mesnaz > $mes) {
   $ano=($ano-1);}
   $edades=($ano-$anonaz);
?>

<a href="#" data-toggle="modal" data-target="#elegirmodal" data-perfil-id="{{$talento->id}}">
   <div class="media">
     <a class="float-left" href="#" data-toggle="modal" data-target="#elegirmodal" data-perfil-id="{{$talento->id}}">
       <div class="avatar">
         <img class="media-object" alt="64x64" src="{{'https://ivotalent.s3-accelerate.amazonaws.com/files/thumbs/profile/'.$talento->id.'/540px_foto_'.$talento->id.'.png'}}">
       </div>
     </a>
     <div class="media-body">
       <p style="margin-top: 20px;margin-bottom: 0px; font-size: 13px">{{strtoupper($talento->Talentos->Talento1->nombre)}} | {{strtoupper($talento->Talentos->Talento2->nombre)}}</p>             
       <p style="margin: 0px;; font-size: 13px"><b>{{$edades}} Años | {{$talento->Pais->nombre}} | {{$talento->Ciudad->nombre}}</b></p>   
     </div>
   </div>
 </a>  
@endforeach