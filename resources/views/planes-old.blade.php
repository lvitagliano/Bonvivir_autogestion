@extends('layouts.principal')

@section('content')
<style type="text/css">

#selectPlan {
  display: none;
}
#tipoPagos div {
  display: none;
}
hr.new3 {
  border: 1px solid white;
}
hr.new4 {
  border: 1px solid ;
}
  </style>

<div class="page-header" data-parallax="true" style="background-image: url('../assets/img/city-profile-two.jpg'); height: 240px;">
    <div class="col-7 ml-auto text-left align-items-end c-name"><h3 style="color: white" class="c-mini-name">
    <b>{{$usuario->industria->razon_social ? strtoupper($usuario->industria->razon_social) : "Nombre de la Empresa" }}</b>&nbsp;
          <a href="#" data-toggle="modal" data-target="#NombreEmpresa"><i class="material-icons" style="font-size:14px; cursor: pointer;color:white">border_color</i></a></h3>
             <p style="margin-top: -15px;margin-bottom: 0px; font-size: 13px; color:white" class="c-mini-subname">
             {{$usuario->industria->slogan ? strtoupper($usuario->industria->slogan) : "Slogan de la Empresa.." }}</p></div>
</div>
<div class="main main-raised bkg-ind">
  <div class="profile-content">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto mini-screen">
          <div class="profile text-left" style="height: 80px;">
            <div class="avatar">
              @if ($usuario->avatar)
              <a href="#modal-imgperfil" data-toggle="modal">
                <img alt="Circle Image" style="max-height: 160px;" class="img-raised rounded-circle img-fluid" src="{{'https://ivotalent.s3-accelerate.amazonaws.com/files/thumbs/profile/'.$usuario->id.'/540px_foto_'.$usuario->id.'.png'}}">
              </a>
               @else
               <a href="#modal-imgperfil" data-toggle="modal">
               <img alt="Circle Image" style="max-height: 160px;"  class="img-raised rounded-circle img-fluid" src="{{ asset('img/vatar2.png') }}">
              </a>
              @endif
        </div>
            <div class="menu-navegador">
              <ul class="">
                      <li class="list-horizontal">
                              <a class="btn-nav" href="{{ route('buscar') }}">
                                <i class="material-icons">search</i> Buscar
                              </a>
                            </li>
                      <li class="list-horizontal">
                        <a class="btn-nav" href="{{ route('misproyectos') }}">
                          <i class="material-icons">grade</i> Mis Proyectos
                        </a>
                      </li>
                      <li class="list-horizontal">
                              <a class="btn-nav" href="#">
                                <i class="material-icons">forum</i> Chat
                              </a>
                            </li>
                    </ul>
        </div>
          </div>
        </div>
   
@if (!$pago)
{{$top = 0}}
@else 
{{$top = $pago->id_plan}}
@endif
        <div class="line-black">
                    <h5 class="in-line-black">Planes</h5>
        </div>
      </div>
      <div class="row" style="margin-top: -100px">          
        <div class="card card-signup card-plain mb-4" style="padding:0px">
              <div id="planes" class="row align-content-center " style="justify-content: center;">

              @foreach($planes as $deseado)
             
              <div class="col-md-4" >
                <div class="card card-pricing card-raised" style="font-size: 1.155rem;
                box-shadow:2px 4px 3px 3px rgba(0, 0, 0, .14), 1px 3px 1px -2px rgba(0, 0, 0, .2), 0 1px 5px 0 rgba(0, 0, 0, .12)
                ">
                  <div class="card-content">
                    <p class="card-title" style="
                    padding-top: 0.6em;
                    font-size: 2.005rem;
                    padding-bottom: 0.6em;
                    margin-top: auto;
                    color:white;
                    @if ($deseado->id === $top)
                    background: transparent linear-gradient(180deg, #446296 0%, #b2d9ef 100%) 0% 0% no-repeat padding-box;
                    @else 
                    background: transparent linear-gradient(180deg, #3272D9 0%, #2BAAF0 100%) 0% 0% no-repeat padding-box; 
                    @endif 

                    "><b>{{$deseado->nombre}} 
                
                  </b></p>
                    <h1 class="card-title"><small>$</small>{{$deseado->monto}}</h1>
                    <ul style="
                    padding-top: 0.1em;
                    padding-bottom: 0.1em;">
                      <li><i class="material-icons text-success">check</i><b>{{$deseado->elegidos}}</b> Elegidos</li>
                      <li><i class="material-icons text-success">check</i><b>{{$deseado->nro_invitados}}</b> Invitados</li>
                      <li><i class="material-icons text-success">check</i>{{$deseado->tiempo}}</li>
                      <li><i class="material-icons text-success">check</i>{{$deseado->descripcion}}</li>
                    </ul>
                    <div style="
                    padding-top:0.1em;
                    padding-bottom:0.1em;">
                    @if ($deseado->id === $top)
                    <button href="javascript:elegirPlan({{$deseado->id}}, '{{$deseado->nombre}}', '{{$deseado->monto}}')" disabled class="btn btn-elegir-cancel"
                    style="background: transparent linear-gradient(180deg, #446296 0%, #b2d9ef 100%) 0% 0% no-repeat padding-box;">
                      Su plan actual</button>
                    </a>
                    @else 
                    <a href="javascript:elegirPlan({{$deseado->id}}, '{{$deseado->nombre}}', '{{$deseado->monto}}')" class="btn btn-elegir">
                      Elegir Plan
                    </a>
                    @endif  
                  </div>
                  </div>
                </div>
              </div>
      @endforeach
            </div>


  <div id="selectPlan" class="row align-content-center pl-3 pt-1 ml-2" style="min-height: 250px; justify-content: center;">
    <form id="pagoForm" method="post" enctype="multipart/form-data" action="{{route('guardarPago')}}">
                  {{csrf_field()}}
    
    
    <h2>MÉTODOS DE PAGO</h2>
       <div class="row text-left pl-3 pr-3 pb-2">
              <div class="col-lg-7 mr-1">
                    <div class="col-lg-12 align-content-center">
                        <select class="selectpicker"  data-live-search="true"  id="tipo_pago" name="tipo_pago" data-style="select-with-transition form-control; color:#A1A1A1;width:100%" 
                          title="TIPO DE PAGO" data-size="5">
                               <option disabled> TIPO DE PAGO</option>
                               <option value="Transferencia">Transferencia Bancaria</option>
                               <option value="Otros">Otros Pagos</option>
                           </select>
                </div>
    <div id="tipoPagos" class="col-lg-12 align-content-center">
        <div id="Transferencia">
            <h3>Transferencia bancaria</h3>
    
            <ul style="color:black">
              <li>Hacer el ACH a la cuenta: IvoTalents</li>
              <li>Nombre de la cuenta : Cuenta bancaria Acm Four Company   </li>
              <li>Nombre del Banco: Credicorpbank </li>
              <li>Tipo de cuenta : Cuenta Corriente </li>
              <li>Nro : # 4010314895 </li>
            </ul>

            <br />
            <h4 style="float:left">Adjuntar comprobante de recibo</h4>
            <br />
            <input type="file" style="float:right" name="imagebanco" accept="image/x-png,image/gif,image/jpeg,image/jpg,image/JPG,image/PNG,image/pdf,image/PDF"  id="imagebanco" >
            <br />
            <hr class="new4">

            <h4 align="center">
                Los pagos realizados vía ACH tienen un período de comprobación de 12 horas. <br />
                Una vez comprobado usted podrá acceder a su solicitud.
                </h4>
     </div>
    <div id="Otros">
    <h3>No se encuentra displonible</h3>    
    </div> 
    </div>
  </div>
  <div class="col-lg-4 p-2 ml-3 mr-4">
      <div class="col-12 p-2  ml-2" style="border-radius:10%;
      box-shadow:2px 2px 2px 2px rgba(249, 249, 249, 0.14), 1px 2px 1px -2px rgba(255, 255, 255, 0.2), 0 1px 5px 0 rgba(255, 255, 255, 0.12);
      background: transparent linear-gradient(180deg, #3272D9 0%, #2BAAF0 100%) 0% 0% no-repeat padding-box;
      ">
      <div row class="mr-2"> 
          <h3 id="input_titulo" style="color: ghostwhite;"> </h3>
      <br /><br />
          <div style="font-size: 1.2rem;color: ghostwhite;"><span id="montoPlan" class="pl-2 pr-2" style="float:right;"></span>Monto del plan</div>
          <hr class="new3">
          <div style="font-size: 1.2rem;color: ghostwhite;"><span id="totalPlan" style="float:right"></span>Total</div>
          <br />
      </div>
         
        </div>
      
<input type="text" id="idPlanPago" name="idPlanPago" value="" hidden>
    </div>
        </div>
        <div class="align-content-center text-center pt-2">
            <a href="javascript:volvePlan()" class="btn btn-simple">
                Volver
              </a>
            <input type="submit" class="btn btn-success btn-simple" id="pedido" name="pedido" value="Continuar Pedido">
          </div>

    </form>
      </div>
    </div>

 
      </div>
    </div>
  </div>
</div>
<div class="flotante">
    <div class="flotante-line">
        <h5 class="flotante-in-line">Perfil</h5>
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
                <a class="btn-nav-foot" href="#">
                  <i class="material-icons">forum</i>
                </a>
              </li>
      </ul>  
    </div> 
</div> 


@endsection


@section('scripts')

<script type="text/javascript">


$( document ).ready(function() {
  $('#planes').show();
  $('#selectPlan').hide();
  $('#pedido').attr('disabled', true);
});

$(document).ready(function(){
    $('#tipo_pago').on('change', function() {
      if ( this.value == 'Transferencia')
      {
        $('#imagebanco').on('change', function() {
      if ( this.value != '')
      {
        $('#pedido').attr('disabled', false);
      }
      else
      {
        $('#pedido').attr('disabled', true);
      }
    });
      }
      else
      {
        $('#pedido').attr('disabled', true);
      }
    });
});

function volvePlan(){
  $('#planes').show();
  $('#selectPlan').hide();
};

function elegirPlan(id, name, price){
  $('#planes').hide();
  $('#selectPlan').show();
  document.getElementById("input_titulo").innerHTML = "Plan elegido:<br /><b>"+name+" </b> ";
  document.getElementById("montoPlan").innerHTML = "<b><small style='color:white;'>$</small>"+price+" </b> ";
  document.getElementById("totalPlan").innerHTML = "<b><small style='color:white;'>$</small>"+price+" </b> ";
  document.getElementById("idPlanPago").value = id;  
};

$(document).ready(function(){
  $('#tipo_pago').on('change', function(){
    var selectValor = '#'+$(this).val();
    $('#tipoPagos').children('div').hide();
    $('#tipoPagos').children(selectValor).show();
  })
});
</script>




@endsection